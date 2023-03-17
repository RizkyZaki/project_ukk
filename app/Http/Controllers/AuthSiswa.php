<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthSiswa extends Controller
{
    public function loginSiswa()
    {
        if (session('nisn')) {
            return redirect('my-history/transaction');
        }
        return view('admin.auth.login-siswa');
    }

    public function store(Request $request)
    {
        $cek = Siswa::where('nisn', $request->input('nisn'));
        if ($cek->exists()) {
            $siswa = $cek->first();
            session([
                'nama' => $siswa->nama,
                'nisn' => $siswa->nisn
            ]);
            return redirect('my-history/transaction')->with('success', 'Kamu Berhasil Masuk');
        } else {
            return redirect('login/siswa');
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect('login');
    }

    public function siswaDashboard()
    {
        if (!session('nisn')) {
            return redirect('login');
        }
        return view('admin.dashboard-siswa', [
            'header' => 'SPP | Siswa Dashboard',
            'titleCard' => 'Riwayat Pembayaran Saya',
            'collection' => Pembayaran::where('nisn', session('nisn'))->get()
        ]);
    }
}
