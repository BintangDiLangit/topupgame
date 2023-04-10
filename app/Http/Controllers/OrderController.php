<?php

namespace App\Http\Controllers;

use App\Helpers\ApiGamesHelper;
use App\Helpers\HistoryTransHelper;
use App\Helpers\ProdukHelper;
use App\Helpers\ResellerAPIHelper;
use App\Helpers\TransaksiHelper;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Xendit\Xendit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'game_code' => 'required|string',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|string',
            'total_amount' => 'required|string',
            'id_user' => 'required|string',
            'zone_user' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $resellerApiHelper = new ResellerAPIHelper();
        $resellerApiHelper = $resellerApiHelper->cekKoneksiVendor('smileone');

        $productHelper = new ProdukHelper();
        $secretXendit = env('API_KEY_XENDIT');
        Xendit::setApiKey($secretXendit);

        $str = $request->game_code;
        $parts = explode(';', $str);
        $code = $parts[0];
        $hargaJual = 0;
        $produkId = '';
        $namaProd = '';

        if ($productHelper->getDetailPClientByCode($code)) {
            $value = $productHelper->getDetailPClientByCode($code);
            $hargaJual = $value['harga_jual'];
            $produkId = $value['id'];
            $namaProd = $value['nama'];
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $amount = $hargaJual;

        $email = $request->email;
        $phoneNumber = $request->phone_number;
        if(empty($email)){
            $email = 'team@bimy-store.com';
            $phoneNumber = '+6287881377842';
        }

        try {
            DB::beginTransaction();
            Xendit::setApiKey(env('API_KEY_XENDIT'));
            $externalId = 'mobile_legends_diamond' . uniqid() . time();
            $params = [
                "external_id" => $externalId,
                "payer_email" => $email,
                'amount' => $amount,
                'invoice_duration' => 86400,
                'customer_notification_preference' => [
                    'invoice_created' => [
                        'whatsapp',
                        'sms',
                        'email'
                    ],
                    'invoice_reminder' => [
                        'whatsapp',
                        'sms',
                        'email'
                    ],
                    'invoice_paid' => [
                        'whatsapp',
                        'sms',
                        'email'
                    ],
                    'invoice_expired' => [
                        'whatsapp',
                        'sms',
                        'email'
                    ]
                ],
                'customer' => [
                    'email' => $email,
                    'mobile_number' => $phoneNumber,
                ],
                'description' => 'Mobile Legends Top Up',
                'success_redirect_url' => env('APP_URL') . '/checkout/success',
                'failure_redirect_url' => env('APP_URL') . '/checkout/failed',
                'currency' => 'IDR',
                'items' => [
                    [
                        'name' => $namaProd,
                        'quantity' => 1,
                        'price' => $amount,
                        'category' => 'Mobile Legends',
                    ]
                ],
            ];

            $createTransaction = \Xendit\Invoice::create($params);

            $insertTransToDb = Transaction::create([
                'transaction_id' => $externalId,
                'payment_channel' => 'Payment Link',
                'email' => $email,
                'produk_id'=> $produkId,
                'amount' => $amount,
                'id_user' => $request->id_user,
                'zone_user' => $request->zone_user,
                'message' => 'Top Up Diamond',
                'game_name' => 'Mobile Legends',
                'service' => $code,
            ]);

            $historyTrans = new HistoryTransHelper();
            $historyTrans->insertToHistoryTrans($insertTransToDb->id, json_encode($createTransaction) . json_encode($insertTransToDb));

            $redirectUrl = $createTransaction['invoice_url'];
            DB::commit();
            return redirect()->to($redirectUrl);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }


    public function checkoutPage($transactionId, $status)
    {
        try {
            $transaksi = new TransaksiHelper();
            $apiGamesHelper = new ApiGamesHelper();
            sleep(3);
            $refId = $transaksi->getTransaksiById($transactionId)->ref_id;
            $data = $apiGamesHelper->checkStatusOrder($refId);
            return view('payment-success');
        } catch (\Throwable $th) {
            return view('payment-failed');
        }
    }
}
