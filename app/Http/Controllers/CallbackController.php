<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Xendit\Xendit;

class CallbackController extends Controller
{
    public function inCallback(Request $request)
    {
        Xendit::setApiKey(env('API_KEY_XENDIT'));

        try {

            $transaction = Transaction::where([
                'external_id' => $request->get('external_id'),
                'status' => 'PENDING'
            ])->first();
            if ($transaction) {
                DB::beginTransaction();

                if ($request->get('status') == 'PAID' || $request->get('status') == 'SETTLED') {
                    $transaction->update([
                        'status' => 'PAID'
                    ]);
                    DB::commit();
                    return redirect()->route('payment.success',['id' => $transaction->get('external_id'), 'game' => $transaction->get('game_name')]);
                } else {
                    $transaction->update([
                        'status' => 'EXPIRED'
                    ]);
                }
            }

            return response()->json([
                'data' => 'Data not Found'
            ])->setStatusCode(200);
        } catch (\Exception $e) {
            DB::rollBack();
            var_dump($e);
            die;
            // return false;
        }
    }
}