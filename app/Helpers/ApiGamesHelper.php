<?php

namespace App\Helpers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class ApiGamesHelper
{

    private $signature;

    public function __construct()
    {
        $this->signature = md5(env('API_GAMES_MERCHANT_ID') . env('API_GAMES_SECRET_KEY'));
    }

    public function cekAkunGame($gameCode, $userId)
    {
        $url = env('API_GAMES_URL') . '/merchant/' . env('API_GAMES_MERCHANT_ID') . '/cek-username/' .
            $gameCode . '?user_id=' . $userId . '&signature=' . $this->signature;
        $data = Http::get($url);
        $data = $data->json();
        if ($data['data']['is_valid']) {
            return $data;
        }
        return false;
    }
    public function profile()
    {
        $url = env('API_GAMES_URL') . '/merchant/' . env('API_GAMES_MERCHANT_ID') . '?signature=' . $this->signature;
        $data = Http::get($url);
        $data = $data->json();
        if ($data['message'] == 'Sukses') {
            return $data;
        }
        return false;
    }

    public function deposit($amount)
    {
        try {
            \DB::beginTransaction();
            $url = env('API_GAMES_URL') . '/v2/deposit-get?merchant=' . env('API_GAMES_MERCHANT_ID') . '&nominal='
                . $amount . '&secret=' . env('API_GAMES_SECRET_KEY');
            $data = Http::get($url);
            $data = $data->json();
            if ($data['rc'] == 200) {
                \DB::commit();
                return $data;
            }
        } catch (\Throwable $th) {
            \DB::rollBack();
            return false;
        }
    }

    public function placeOrder($transactionId, $produk, $tujuan, $serverId)
    {
        try {
            \DB::beginTransaction();
            $url = env('API_GAMES_URL') . '/v2/transaksi';
            $refId = 'mobile_legends_' . Str::random(10) . uniqid() . time();
            $data = Http::post($url, [
                'ref_id' => $refId,
                'merchant_id' => env('API_GAMES_MERCHANT_ID'),
                'produk' => $produk,
                'tujuan' => $tujuan,
                'server_id' => $serverId,
                'signature' => md5(env('API_GAMES_MERCHANT_ID') . ':' . env('API_GAMES_SECRET_KEY') . ':' . $refId),
            ]);
            $data = $data->json();

            $data = $data['data'];
            $transaksi = Transaction::where('transaction_id', $transactionId)->first();
            $transaksi->forceFill([
                'trx_id' => $data['trx_id'],
                'ref_id' => $refId,
                'price_rp_vendor' => $data['product_detail']['price_rp'],
                'rate_vendor' => $data['product_detail']['rate'],
                'message_vendor' => $data['message'],
                'sn_vendor' => $data['sn'],
                'destination_vendor' => $data['destination'],
                'product_code_vendor' => $data['product_code'],
            ])->save();
            $historyTrans = new HistoryTransHelper();
            $historyTrans->insertToHistoryTrans($transaksi->id, json_encode($data) . json_encode($transaksi));
            \DB::commit();
            return $refId;
        } catch (\Throwable $th) {
            \DB::rollBack();
            return false;
        }

    }

    public function checkStatusOrder($refId)
    {
        $url = env('API_GAMES_URL') . '/v2/transaksi/status';
        $data = Http::post($url, [
            'ref_id' => $refId,
            'merchant_id' => env('API_GAMES_MERCHANT_ID'),
            'signature' => md5(env('API_GAMES_MERCHANT_ID') . ':' . env('API_GAMES_SECRET_KEY') . ':' . $refId),
        ]);
        $data = $data->json();

        $data = $data['data'];
        

        $transaction = Transaction::where([
            'ref_id' => $refId,
            'status_payment_vendor' => 'PENDING'
        ])->first();
        if (isset($transaction)) {
            if ($data['status'] == 'Sukses') {
                \DB::beginTransaction();
                $transaction->update([
                    'status_payment_vendor' => 'SUKSES',
                    'message' => $data['message']
                ]);

                \DB::commit();
                return $transaction;
            } elseif ($data['status'] == 'Proses') {
                $transaction->update([
                    'status_payment_vendor' => 'PROSES',
                    'message' => $data['message']
                ]);
            } else {
                $transaction->update([
                    'status' => 'GAGAL'
                ]);
                \DB::commit();
                return $transaction;
            }
        }
    }
}
