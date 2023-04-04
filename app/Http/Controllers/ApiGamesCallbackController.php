<?php

namespace App\Http\Controllers;

use App\Helpers\HistoryTransHelper;
use App\Models\Transaction;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Spatie\WebhookServer\WebhookCall;

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
                    $transaction->update([
                        'status_payment_vendor' => 'GAGAL'
                    ]);
                    WebhookCall::create()
                        ->url(env('URL_WEBHOOK_DISCORD_PAYMENT_GAGAL'))
                        ->payload(['key' => 'value'])
                        ->useSecret('sign-using-this-secret')
                        ->dispatch();
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