<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelompok_rekening;
use App\Models\profil;
class kelompok_rekening_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rekening.KelompokRekening.index',[
            'kelompok_rekenings'=>kelompok_rekening::all(),
            'profil'=>profil::find(1)
        ]);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        kelompok_rekening::create([
            'nama_kelompok'=>$request->nama_kelompok_rekening
        ]);
        return back()->with('Berhasil','Behasil Menambahkan Kelompok Rekening');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        kelompok_rekening::find($id)->update([
            'nama_kelompok'=>$request->nama_kelompok_rekening
        ]);

        return back()->with('Berhasil', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
