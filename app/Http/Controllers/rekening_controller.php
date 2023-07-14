<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rekening;
use App\Models\sub_kelompok_rekening;
use App\Models\profil;
use App\Models\subRekening;

class rekening_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rekening.rekening.index',[
            'rekenings'=>rekening::all(),
            'profil'=>profil::find(1),
            'subRekenings'=>subRekening::all()
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

       $kode = subRekening::firstWhere('kode_sub_rekening',$request->kodesub)->id;
        rekening::create([
            'subRekening_id'=>$kode,
            'kode_rekening'=>$request->kodesub.$request->kode_rekening,
            'nama_rekening'=>$request->nama_rekening,
            // 'saldo'=>$request->saldo_awal
        ]);

        return back()->with('Berhasil', 'Berhasil Menambah Rekening');
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
