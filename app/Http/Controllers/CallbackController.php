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
                    
                } else {
                    $transaction->update([
                        'status' => 'EXPIRED'
                    ]);
                }

                DB::commit();
                return response()->json([
                    'data' => $transaction
                ])->setStatusCode(200);
            }

            return response()->json([
                'data' => 'Data not Found'
            ])->setStatusCode(200);
        } catch (\Exception $e) {
            DB::rollBack();
            $e->getMessage();
            return false;
        }
    }

}
