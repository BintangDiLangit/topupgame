<?php

namespace App\Http\Controllers;

use App\Helpers\TransaksiHelper;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function transaksi()
    {
        $transaksis = new TransaksiHelper();
        $transaksis = $transaksis->getDataTransaksi();
        return view('admin.transaksi.transaksi', compact('transaksis'));
    }

    public function riwayatTransaksis()
    {
        $riwayatTransaksis = new TransaksiHelper();
        $riwayatTransaksis = $riwayatTransaksis->getDataRiwayatTransaksi();
        return view('admin.transaksi.riwayat', compact('riwayatTransaksis'));
    }
}
