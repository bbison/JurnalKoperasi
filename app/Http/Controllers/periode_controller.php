<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profil;
use App\Models\periode;

class periode_controller extends Controller
{

    public function index()
    {
       return view('periode.index',[
        'profil'=>profil::find(1),
        'periodes'=>periode::all()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'sss';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        periode::create([
            'tanggal_mulai'=>$request->tanggal_mulai,
            'tanggal_selesai'=>$request->tanggal_selesai
        ]);

        return back()->with('Berhasil', 'Periode Berhasil DItambahkan');
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
        periode::find($id)->update([
            'tanggal_mulai'=>$request->tanggal_mulai,
            'tanggal_selesai'=>$request->tanggal_selesai
        ]);
        
        return back()->with('Berhasil', 'Periode Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
