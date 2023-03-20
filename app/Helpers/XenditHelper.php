<?php
namespace App\Helpers;

use App\Models\TransactionOut;
use Illuminate\Support\Facades\DB;
use Xendit\Xendit;

class XenditHelper
{
    public function payoutDanaInternal($amount, $desc, $reference_id, $transaction_id)
    {
        try {
            DB::beginTransaction();
            $params = [
                'external_id' => $payoutID,
                'amount' => $transaction->amount,
                'bank_code' => 'DANA',
                'account_holder_name' => 'BINTANG',
                'account_number' => '087881377842',
                'description' => $desc,
            ];
            $payout = \Xendit\Disbursements::create($params);
            $dataTransactionOut = TransactionOut::create([
                'transaction_id'=> $transaction->transaction_id,
                'transaction_out_id'=> $payout,
                'payment_channel'=> 'DANA Forwarder',
                'amount'=> $transaction->amount,
                'email'=> 'konsulinaja.id@gmail.com',
                'message'=> $desc
            ]);
            DB::commit();
            return $payout;
        } catch (\Throwable $th) {
            DB::calback();
            return $th->getMessage();
        }
    }
}