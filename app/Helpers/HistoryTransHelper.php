<?php

namespace App\Helpers;

use App\Models\HistoryTransaction;

class HistoryTransHelper
{
    public function insertToHistoryTrans($transactionIdRef, $dataEncoded)
    {
        HistoryTransaction::create([
            'transaction_id' => $transactionIdRef,
            'dataencoded' => $dataEncoded,
        ]);
        return true;
    }
}