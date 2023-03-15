<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.spp.index', [
            'header' => 'SPP | Data SPP',
            'titlePage' => 'Data Spp',
            'titleCard' => 'Table Spp',
            'collection' => Spp::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.spp.create', [
            'header' => 'SPP | Form SPP',
            'titlePage' => 'Data SPP',
            'titleCard' => 'Form SPP',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tahun' => 'required',
            'nominal' => 'required',
        ]);
        Spp::create($validatedData);
        return redirect('spp')->with('success', 'Data Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spp $spp)
    {
        return view('admin.spp.update', [
            'header' => 'SPP | Form SPP',
            'titlePage' => 'Data SPP',
            'titleCard' => 'Form SPP',
            'item' => $spp
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spp $spp)
    {
        $validatedData = $request->validate([
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        Spp::find($spp->id)->update($validatedData);
        return redirect('spp')->with('success', 'data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spp $spp)
    {
        Spp::destroy($spp->id);
        return redirect('spp')->with('success', 'Data Berhasil Dihapus');
    }
}
