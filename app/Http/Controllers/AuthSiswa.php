<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class AuthSiswa extends Controller
{
    public function loginSiswa()
    {
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
            return redirect('/')->with('success', 'Kamu Berhasil Masuk');
        } else {
            return redirect('login/siswa');
        }
    }
    public function logout()
    {
        session_unset();
        return redirect('login');
    }
}
