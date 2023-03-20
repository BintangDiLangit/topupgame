<?php

namespace App\Http\Controllers;

use App\Helpers\ResellerAPIHelper;
use App\Models\Transaction;
use App\Models\TransactionOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Xendit\Xendit;
use App\Helpers\XenditHelper;
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
                    DB::beginTransaction();
                    $transaction->update([
                        'status' => 'PAID'
                    ]);
                    $resellerHelper = new ResellerAPIHelper();
                    $balanceAdmin = $resellerHelper->profile();

                    if ($balanceAdmin['result'] == true || $balanceAdmin['result'] == 1) {
                        if ($balanceAdmin['data']['balance'] >= $transaction->amount) {
                            $resellerHelper->placeOrder(
                                $transaction->service,
                                $transaction->id_user,
                                $transaction->zone_user
                            );
                            DB::commit();
                        } else {

                            $xenditHelper = new XenditHelper();
                            $desc = 'Melanjukan dana customer ke reseller VIP';
                            $payoutID = 'disb_payout_' . Str::random(10) . uniqid() . time();
                            // $payoutDana = $xenditHelper->payoutDanaInternal($transaction->amount, 
                            // $desc, $payoutID, 
                            // $transaction->transaction_id);
                            // print_r($transaction->amount.'-'.$payoutID.$desc);
                            // die;
                            $params = [
                                'external_id' => $payoutID,
                                'amount' => $transaction->amount,
                                'bank_code' => 'ID_DANA',
                                'account_holder_name' => 'BINTANG MIFTAQUL HUDA',
                                'account_number' => '087881377842',
                                'description' => $desc,
                            ];
                            $payout = \Xendit\Disbursements::create($params);
                            $dataTransactionOut = TransactionOut::create([
                                'transaction_id'=> $transaction->transaction_id,
                                'transaction_out_id'=> $payoutID,
                                'payment_channel'=> 'DANA Forwarder',
                                'amount'=> $transaction->amount,
                                'email'=> 'konsulinaja.id@gmail.com',
                                'message'=> $desc
                            ]);
                            // print_r($payout);
                            // die;
                            // sleep(20);
                            // $resellerHelper->placeOrder(
                            //     $request->service_id,
                            //     $request->data_id_tujuan,
                            //     $request->data_zone
                            // );
                            DB::commit();
                            return $dataTransactionOut;
                        }
                        // return response()->json(['balance' => 'admin ga duwe duwek'], 208);
                    }
                    DB::commit();
                    return $transaction;
                } else {
                    $transaction->update([
                        'status' => 'EXPIRED'
                    ]);
                }
            } else {
                return response()->json([
                    'data' => 'Data not Found'
                ])->setStatusCode(200);
            }


        } catch (\Exception $e) {
            var_dump($e);
            die;
            return false;
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