<?php


namespace App\Helpers;
use App\Models\HistoryTransaction;
use App\Models\Transaction;

class TransaksiHelper{
    public function getDataTransaksi()
    {
        $transaksis = Transaction::orderBy('created_at','desc')->get();
        return $transaksis;
    }

    public function getDataRiwayatTransaksi()
    {
        $riwayatTransaksis = HistoryTransaction::orderBy('created_at','desc')->get();
        return $riwayatTransaksis;
    }

    public function getTransaksiById($transaksiId)
    {
        $transaksi = Transaction::where('transaction_id',$transaksiId)->first();
        return $transaksi;
    }
}