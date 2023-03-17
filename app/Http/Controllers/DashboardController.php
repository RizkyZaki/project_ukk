<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $pembayaranPerbulan = Pembayaran::select(DB::raw("CAST(SUM(jumlah_bayar)as int)as totalPerbulan"))
            ->GroupBy(DB::raw("bulan_bayar"))
            ->pluck('totalPerbulan');
        $bulan = Pembayaran::select(DB::raw("bulan_bayar as bulan"))
            ->GroupBy(DB::raw("bulan_bayar"))
            ->pluck('bulan');


        // dd($bulan, $pembayaranPerbulan);
        return view('admin.dashboard', [
            'header' => 'SPP | Dashboard',
            'siswa' => Siswa::count(),
            'kelas' => Kelas::count(),
            'petugas' => User::where('level', '=', 'petugas')->count(),
            'bulan' => $bulan,
            'pembayaranPerbulan' => $pembayaranPerbulan
        ]);
    }
}
