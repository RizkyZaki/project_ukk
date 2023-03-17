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
        $totalPemasukkan = Pembayaran::select(DB::raw("CAST(SUM(jumlah_bayar)as int)as total"))
            ->pluck('total');
        $bulan = Pembayaran::select(DB::raw("bulan_bayar as bulan"))
            ->GroupBy(DB::raw("bulan_bayar"))
            ->pluck('bulan');

        $siswa = Siswa::select(DB::raw("COUNT(nisn) as totalSiswaPerkelas"))
            ->GroupBy(DB::raw('id_kelas'))
            ->pluck('totalSiswaPerkelas');
        $kelas = Kelas::select(DB::raw('kompetensi_keahlian as jurusan'))
            ->GroupBy(DB::raw('kompetensi_keahlian'))
            ->pluck('jurusan');


        // dd($siswa);
        return view('admin.dashboard', [
            'header' => 'SPP | Dashboard',
            'siswa' => Siswa::count(),
            'kelas' => Kelas::count(),
            'petugas' => User::where('level', '=', 'petugas')->count(),
            'bulan' => $bulan,
            'pembayaranPerbulan' => $pembayaranPerbulan,
            'totalPemasukkan' => $totalPemasukkan,
            'totalSiswa' => $siswa,
            'jurusan' => $kelas
        ]);
    }
}
