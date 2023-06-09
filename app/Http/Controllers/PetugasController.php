<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::where('level', '=', 'petugas')->get();
        return view('admin.petugas.index', [
            'header' => 'SPP | Petugas',
            'titlePage' => 'Data Petugas',
            'titleCard' => 'Table Petugas',
            'collection' => $petugas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.petugas.create', [
            'header' => 'SPP | Petugas',
            'titlePage' => 'Data Petugas',
            'titleCard' => 'Table Petugas',
        ]);
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);
        $validatedData['password'] = Hash::make($request->input('password'));
        $validatedData['level'] = 'petugas';
        User::create($validatedData);
        return redirect('petugas')->with('success', 'Data Berhasil Dibuat');
    }
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $petuga)
    {
        return view('admin.petugas.update', [
            'header' => 'SPP | Petugas',
            'titlePage' => 'Data Petugas',
            'titleCard' => 'Table Petugas',
            'petugas' => $petuga
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $petuga)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($request->input('password')) {
            $validatedData['password'] = Hash::make($request->input('password'));
        }
        User::find($petuga->id)->update($validatedData);
        return redirect('petugas')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $petuga)
    {
        User::destroy($petuga->id);
        return redirect('petugas')->with('success', 'Data Berhasil Dihapus');
    }
}
