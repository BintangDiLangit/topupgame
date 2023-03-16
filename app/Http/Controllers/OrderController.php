<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Xendit\Xendit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $secretXendit = env('API_KEY_XENDIT');
        $eWallets = array('GOPAY','OVO','DANA','Link Aja');
        Xendit::setApiKey($secretXendit);


        dd($request->all());
        try {
            DB::beginTransaction();
            Xendit::setApiKey(env('API_KEY_XENDIT'));
            $externalId = 'mobile_legends_' . uniqid() . time();
            $params = [
                "external_id" => $externalId,
                "payer_email" => 'bintang@b.com',
                'amount' => $request->total_amount,
                'invoice_duration' => 1200,
                'description' => 'Mobile Legends Top Up',
            ];

            $createTransaction = \Xendit\Invoice::create($params);

            // $insertTransToDb = Transaction::insert([
            //     'transaction_id' => $externalId,
            //     'payment_channel' => 'Payment Link',
            //     'email' => $request->email,
            //     'name' => $request->name,
            //     'amount' => $request->amount,
            //     'id_user' => $request->id_user,
            //     'zone_user' => $request->zone_user,
            //     'amount' => $request->total_amount,
            //     'message' => $request->message,
            // ]);

            dd($createTransaction);
            
            // $data = Http::asForm()->post(env('API_URL_RESELLER').'/game-feature', [
            //     'key' => env('API_KEY_RESELLER'),
            //     'sign' => md5(env('API_ID_RESELLER').env('API_KEY_RESELLER')),
            //     'type' => 'order',
            //     'service' => $request->service_id,
            //     'data_no' => $request->data_id_tujuan,
            //     'data_zone' => $request->data_zone
            // ]);
            DB::commit();
            
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }


        return;
    }

    public function statusOrder(Request $request)
    {
        $data = Http::asForm()->post(env('API_URL_RESELLER').'/game-feature', [
            'key' => env('API_KEY_RESELLER'),
            'sign' => md5(env('API_ID_RESELLER').env('API_KEY_RESELLER')),
            'type' => 'status',
            'trxid' => $request->transaksi_id, // id transaksi
            // 'limit' => $request->data_id_tujuan, // integer
        ]);

        // dd(env('API_ID_RESELLER').env('API_KEY_RESELLER'));
        dd($data->body());
    }
}