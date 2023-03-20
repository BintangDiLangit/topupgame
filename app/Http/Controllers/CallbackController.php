<?php

namespace App\Http\Controllers;

use App\Helpers\ApiGamesHelper;
use App\Helpers\HistoryTransHelper;
use App\Models\Transaction;
use App\Models\TransactionOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Xendit\Xendit;
use Illuminate\Support\Str;

class CallbackController extends Controller
{
    public function inCallback(Request $request)
    {

        try {

            Xendit::setApiKey(env('API_KEY_XENDIT'));
            $transaction = Transaction::where([
                'transaction_id' => $request->get('external_id'),
                'status' => 'PENDING'
            ])->first();

            if (isset($transaction)) {
                if ($request->get('status') == 'PAID' || $request->get('status') == 'SETTLED') {
                    $transaction->update([
                        'status' => 'PAID'
                    ]);
                    DB::beginTransaction();
                    $apiGamesHelper = new ApiGamesHelper();
                    $balanceAdmin = $apiGamesHelper->profile();

                    if ($balanceAdmin['message'] == 'Sukses') {
                        if ($balanceAdmin['data']['saldo'] >= $transaction->amount) {
                            $apiGamesHelper->placeOrder(
                                $transaction->transaction_id,
                                $transaction->service,
                                $transaction->id_user,
                                $transaction->zone_user
                            );
                            DB::commit();
                            return $transaction;
                        } else {

                            $desc = 'Melanjukan dana customer ke reseller VIP';
                            $payoutID = 'disb_payout_' . Str::random(10) . uniqid() . time();
                            HistoryTransHelper::insertToHistoryTrans($transaction->id, json_encode($transaction));
                            DB::commit();
                            return $transaction;
                        }
                    }
                    HistoryTransHelper::insertToHistoryTrans($transaction->id, json_encode($transaction));
                    DB::commit();
                    return $transaction;
                } else {
                    $transaction->update([
                        'status' => 'EXPIRED'
                    ]);
                    HistoryTransHelper::insertToHistoryTrans($transaction->id, json_encode($transaction));
                    DB::commit();
                    return $transaction;
                }
            } else {
                return response()->json([
                    'data' => 'Data not Found'
                ])->setStatusCode(200);
            }


        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function outCallback(Request $request)
    {

        try {

            Xendit::setApiKey(env('API_KEY_XENDIT'));
            $transactionOut = TransactionOut::where([
                'transaction_out_id' => $request->get('external_id'),
                'status' => 'PENDING'
            ])->first();

            if (isset($transactionOut)) {
                if ($request->get('status') == 'SUCCESS' || $request->get('status') == 'SETTLED') {
                    $transactionOut->update([
                        'status' => 'SUCCESS'
                    ]);
                    return $transactionOut;
                } else {
                    $transactionOut->update([
                        'status' => 'FAILED'
                    ]);
                }
            }

            return response()->json([
                'data' => 'Data not Found'
            ])->setStatusCode(200);
        } catch (\Exception $e) {
            var_dump($e);
            die;
            return false;
        }
    }
}