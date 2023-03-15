<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function bayar()
    {
        return view('admin.pembayaran.bayar', [
            'header' => 'SPP | Siswa',
            'titlePage' => 'Data Siswa',
            'titleCard' => 'Table Siswa',
            'collection' => Pembayaran::all()
        ]);
    }
}
