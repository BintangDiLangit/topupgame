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
                'status_payment_vendor' => 'Pending'
            ])->first();

            if (isset($transaction)) {
                $historyTrans = new HistoryTransHelper();
                if ($request->get('status') == 'PAID' || $request->get('status') == 'SETTLED') {
                    $transaction->update([
                        'status' => 'PAID'
                    ]);
                    DB::beginTransaction();
                    $apiGamesHelper = new ApiGamesHelper();
                    $balanceAdmin = $apiGamesHelper->profile();

                    if ($balanceAdmin['message'] == 'Sukses') {
                        if ($balanceAdmin['message'] == 'Sukses') {
                            // if (env('APP_URL')=='https://bimy-store.com') {
                                $apiGamesHelper->placeOrder(
                                    $transaction->transaction_id,
                                    $transaction->service,
                                    $transaction->id_user,
                                    $transaction->zone_user
                                );
                                DB::commit();
                                return $transaction;
                            // }
                        } else {
                            $historyTrans->insertToHistoryTrans($transaction->id, json_encode($transaction));
                            DB::commit();
                            return $transaction;
                        }
                    }
                    $historyTrans->insertToHistoryTrans($transaction->id, json_encode($transaction));
                    DB::commit();
                    return $transaction;
                } else {
                    $transaction->update([
                        'status' => 'EXPIRED'
                    ]);
                    $historyTrans->insertToHistoryTrans($transaction->id, json_encode($transaction));
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
            return false;
        }
    }
}
