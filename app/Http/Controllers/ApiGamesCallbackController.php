<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ApiGamesCallbackController extends Controller
{
    public function transaksi(Request $request)
    {
        try {
            $transaction = Transaction::where([
                'ref_id' => $request->get('ref_id'),
                'status_payment_apigames' => 'Pending'
            ])->first();
            if (isset($transaction)) {
                if ($request->get('status') == 'Sukses') {
                    \DB::beginTransaction();
                    $transaction->update([
                        'status_payment_apigames' => 'Sukses',
                        'message' => $request->get('message')
                    ]);

                    \DB::commit();
                    return $transaction;
                } else {
                    $transaction->update([
                        'status' => 'Gagal'
                    ]);
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