<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function history()
    {
        return view('admin.pembayaran.history', [
            'header' => 'SPP | Pembayaran',
            'titlePage' => 'Data Pembayaran',
            'titleCard' => 'Table Pembayaran',
            'collection' => Pembayaran::with(['siswa', 'petugas'])->get(),
        ]);
    }
    public function bayar()
    {
        return view('admin.pembayaran.bayar', [
            'header' => 'SPP | Pembayaran',
            'titlePage' => 'Data Pembayaran',
            'titleCard' => 'Form Pembayaran',
            'siswa' => Siswa::all(),
            'spp' => Spp::all()
        ]);
    }
}
