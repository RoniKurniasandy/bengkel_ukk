<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Servis;

class MekanikDashboardController extends Controller
{
    public function index()
    {
        $mekanik_id = Auth::id();
        $servis_dikerjakan = Servis::where('status', 'dikerjakan')
            ->where('mekanik_id', $mekanik_id)
            ->get();

        return view('dashboard.mekanik', compact('servis_dikerjakan'));
    }
}
