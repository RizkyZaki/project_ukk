<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
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
            'titlePage' => 'History Pembayaran',
            'titleCard' => 'Table History Pembayaran',
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

    public function store(Request $request)
    {

        $siswa = $request->input('nisn');
        $siswa = Siswa::where('nisn', $siswa)->first();
        $spp = Spp::where('id', $siswa->id_spp)->first();
        $validatedData = $request->validate([
            'nisn' => 'required',
            'tgl_bayar' => 'required',
            'bulan_bayar' => 'required',
            'tahun_bayar' => 'required',
            'jumlah_bayar' => 'required',
        ]);


        $validatedData['id_petugas'] = auth()->user()->id;
        $validatedData['id_spp'] = $spp->id;
        Pembayaran::create($validatedData);
        return redirect('history/pembayaran')->with('success', 'Transaksi Sukses');
    }
}
