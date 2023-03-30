<?php


namespace App\Helpers;
use App\Models\HistoryTransaction;
use App\Models\Transaction;

class TransaksiHelper{
    public function getDataTransaksi()
    {
        $transaksis = Transaction::all();
        return $transaksis;
    }

    public function getDataRiwayatTransaksi()
    {
        $riwayatTransaksis = HistoryTransaction::all();
        return $riwayatTransaksis;
    }

    public function getTransaksiById($transaksiId)
    {
        $transaksi = Transaction::where('transaction_id',$transaksiId)->first();
        return $transaksi;
    }
}