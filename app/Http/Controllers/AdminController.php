<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Servis;
use App\Models\Transaksi;

class AdminController extends Controller
{
    public function index()
    {
        // Statistik utama
        $servis_aktif = Servis::where('status', 'proses')->count();
        $transaksi_hari_ini = Transaksi::whereDate('created_at', now())->count();
        $jumlah_user = User::where('role', 'user')->count();
        $jumlah_mekanik = User::where('role', 'mekanik')->count();

        // Servis terbaru
        $servis_terbaru = Servis::latest()->take(5)->get();

        return view('dashboard.admin', compact(
            'servis_aktif',
            'transaksi_hari_ini',
            'jumlah_user',
            'jumlah_mekanik',
            'servis_terbaru'
        ));
    }
}
