<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profil;
use App\Models\sub_kelompok_rekening;
use App\Models\kelompok_rekening;
class sub_kelompok_rekening_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rekening.subKelompokRekening.index',[
            'sub_kelompok_rekenings'=>sub_kelompok_rekening::all(),
            'profil'=>profil::find(1),
            'kelompok_rekenings'=>kelompok_rekening::all()
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
    
        sub_kelompok_rekening::create([
            'kelompok_rekening_id'=>$request->kodekelompoksubrek,
            'nama_sub_kelompok'=>$request->namasubrek,
            'kode_sub_kelompok'=>$request->kodekelompoksubrek.$request->kode_sub_kelompok_rekening,
        ]);

        return back()->with('Berhasil','Berhasil Menambahkan Data');
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
        sub_kelompok_rekening::find($id)->update([
            'kelompok_rekening_id'=>$request->kodekelompoksubrek,
            'nama_sub_kelompok'=>$request->namasubrek,
            'kode_sub_kelompok'=>$request->kodesubrek
        ]);

        return back()->with('Berhasil','Berhasil Menambahkan Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
