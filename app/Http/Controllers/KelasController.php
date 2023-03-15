<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kelas.index', [
            'header' => 'SPP | Data Kelas',
            'titlePage' => 'Data Kelas',
            'titleCard' => 'Table Kelas',
            'collection' => Kelas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kelas.create', [
            'header' => 'SPP | Data Kelas',
            'titlePage' => 'Data Kelas',
            'titleCard' => 'Form Kelas',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);
        Kelas::create($validatedData);
        return redirect('kelas')->with('success', 'Data Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kela)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kela)
    {
        return view('admin.kelas.update', [
            'header' => 'SPP | Data Kelas',
            'titlePage' => 'Data Kelas',
            'titleCard' => 'Form Kelas',
            'item' => $kela
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kela)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);
        Kelas::find($kela->id)->update($validatedData);
        return redirect('kelas')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kela)
    {
        Kelas::destroy($kela->id);
        return redirect('kelas')->with('success', 'Data Berhasil Dihapus');
    }
}
