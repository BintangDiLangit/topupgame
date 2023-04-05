<?php

namespace App\Http\Controllers;

use App\Helpers\HistoryTransHelper;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ApiGamesCallbackController extends Controller
{
    public function transaksi(Request $request)
    {
        try {

            $transaction = Transaction::where([
                'trx_id' => $request->get('trx_id'),
                'status_payment_vendor' => 'PENDING'
            ])->first();
            if (isset($transaction)) {
                if ($request->get('status') == 'Sukses') {
                    \DB::beginTransaction();
                    $transaction->update([
                        'status_payment_vendor' => 'SUKSES',
                        'message_vendor' => $request->get('message')
                    ]);
                    $historyTrans = new HistoryTransHelper();
                    $historyTrans->insertToHistoryTrans($transaction->id, json_encode($request->all()) . json_encode($transaction));
                    \DB::commit();
                    return $transaction;
                } else {
                    \Http::post(env('URL_WEBHOOK_DISCORD_PAYMENT_GAGAL'), [
                        'content' => "Top Up ke Customer Gagal",
                        'embeds' => [
                            [
                                'title' => "Coba Cek Api gamesnya BROO",
                                'description' => "ini bro transaksi id nya : " . $transaction->transaction_id
                            ]
                        ],
                    ]);
                    $transaction->update([
                        'status_payment_vendor' => 'GAGAL'
                    ]);
                    $historyTrans = new HistoryTransHelper();
                    $historyTrans->insertToHistoryTrans($transaction->id, json_encode($request->all()) . json_encode($transaction));
                    \DB::commit();
                    return $transaction;
                }
            } else {
                return response()->json([
                    'data' => 'Data not Found'
                ])->setStatusCode(200);
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}