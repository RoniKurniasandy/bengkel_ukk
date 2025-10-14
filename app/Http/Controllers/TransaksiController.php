<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with(['servis.booking.user','pembayaran'])->get();
        return view('transaksi.index', compact('transaksi'));
    }
}

