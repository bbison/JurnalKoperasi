<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profil;
use App\Models\sub_kelompok_rekening;
use App\Models\subRekening;

class subRekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('rekening.subRekening.index',[
        'profil'=>profil::find(1),
        'subKelompokRekenings'=>sub_kelompok_rekening::all(),
        'subRekenings'=>subRekening::All()
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
    
        $kode = sub_kelompok_rekening::firstWhere('kode_sub_kelompok',$request->kodesub)->id;
        subRekening::create([
            'sub_kelompok_rekening_id'=>$kode,
            'kode_sub_rekening'=>$request->kodesub.$request->kode_rekening,
            'nama_rekening'=>$request->nama_rekening
        ]);

        return back()->with('Berhasil', 'Sub Rekening Berhasil Ditambahkan');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
