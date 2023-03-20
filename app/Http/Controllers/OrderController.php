<?php

namespace App\Http\Controllers;

use App\Helpers\ResellerAPIHelper;
use App\Helpers\XenditHelper;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Xendit\Xendit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'game_code' => 'required|string',
            'email' => 'nullable|string',
            'total_amount' => 'required|string',
            'id_user' => 'required|string',
            'zone_user' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $resellerHelper = new ResellerAPIHelper();
        $secretXendit = env('API_KEY_XENDIT');
        // $eWallets = array('GOPAY','OVO','DANA','Link Aja');
        Xendit::setApiKey($secretXendit);

        $str = $request->game_code;
        $parts = explode(';', $str);
        $code = $parts[0];
        $value = 0;
        if ($resellerHelper->findMobileLegendB($code)) {
            $value = $resellerHelper->findMobileLegendB($code);
            $value = $value['price']['basic'];
        } else {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $keuntungan = 0.03;
        $amount = ($value * $keuntungan) + $value;

        try {

            // $getNickName = $resellerHelper->getNickName($request->zone_user, $request->id_user);
            // sleep(5);
            // if ($getNickName['result'] == false) {
            //     return response()->json(['error' => 'account not found'], 400);
            // }

            DB::beginTransaction();
            Xendit::setApiKey(env('API_KEY_XENDIT'));
            $externalId = 'mobile_legends_diamond' . uniqid() . time();
            $params = [
                "external_id" => $externalId,
                "payer_email" => 'bintang@b.com',
                'amount' => $amount,
                'invoice_duration' => 1200,
                'description' => 'Mobile Legends Top Up',
            ];

            $createTransaction = \Xendit\Invoice::create($params);

            $insertTransToDb = Transaction::insert([
                'transaction_id' => $externalId,
                'payment_channel' => 'Payment Link',
                'email' => $request->email,
                'amount' => $amount,
                'id_user' => $request->id_user,
                'zone_user' => $request->zone_user,
                'message' => 'Top Up Diamond',
                'game_name' => 'Mobile Legends',
                'service' => $code,
            ]);

            $redirectUrl = $createTransaction['invoice_url'];
            DB::commit();
            return $redirectUrl;
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'server error'], 501);
        }
    }

    public function statusOrder(Request $request)
    {
        $data = Http::asForm()->post(env('API_URL_RESELLER') . '/game-feature', [
            'key' => env('API_KEY_RESELLER'),
            'sign' => md5(env('API_ID_RESELLER') . env('API_KEY_RESELLER')),
            'type' => 'status',
            'trxid' => $request->transaksi_id, // id transaksi
            // 'limit' => $request->data_id_tujuan, // integer
        ]);

        // dd(env('API_ID_RESELLER').env('API_KEY_RESELLER'));
        dd($data->body());
    }
}