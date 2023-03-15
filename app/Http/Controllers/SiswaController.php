<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.siswa.index', [
            'header' => 'SPP | Siswa',
            'titlePage' => 'Data Siswa',
            'titleCard' => 'Table Siswa',
            'collection' => Siswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.siswa.create', [
            'header' => 'SPP | Siswa',
            'titlePage' => 'Data Siswa',
            'titleCard' => 'Form Siswa',
            'kelas' => Kelas::all(),
            'spp' => Spp::all()
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nisn' => 'required|unique:siswa',
            'nis' => 'required|unique:siswa',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
        ]);
        Siswa::create($validatedData);
        return redirect('siswa')->with('success', 'Data Berhasil Masuk');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.update', [
            'header' => 'SPP | Siswa',
            'titlePage' => 'Data Siswa',
            'titleCard' => 'Form Siswa',
            'kelas' => Kelas::all(),
            'spp' => Spp::all(),
            'siswa' => $siswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validatedData = $request->validate([
            'nisn' => 'required|unique:siswa',
            'nis' => 'required|unique:siswa',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
        ]);
        Siswa::create($validatedData);
        return redirect('siswa')->with('success', 'Data Berhasil Masuk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        Siswa::destroy($siswa->id);
        return redirect('siswa')->with('success', 'Data Berhasil DIhapus');
    }
}
