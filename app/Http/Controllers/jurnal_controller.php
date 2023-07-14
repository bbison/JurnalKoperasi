<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profil;
use App\Models\jurnal;
use App\Models\rekening;

class jurnal_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if($request->tanggal_awal && $request->tanggal_akhir){

            $data = jurnal::whereBetween('created_at',[$request->tanggal_awal,$request->tanggal_akhir])
            ->get();
        }

        else{
            $data = jurnal::all();
        }
        return view('jurnal.index',[
            'profil'=>profil::find(1),
            'jurnals'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurnal.create',[
            'profil'=>profil::find(1),
            'rekenings'=>rekening::all()
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
         $nojurnal = explode('.',$request->no_jurnal );
         $no_jurnal = intval($nojurnal[2]);
        for($x= 0 ; $x< count($request->kode); $x++) {

            $kode = str_pad($no_jurnal + $x, 3, '0', STR_PAD_LEFT);
            
                jurnal::create([
                    'no_jurnal'=>$nojurnal[0].'.'.$nojurnal[1].'.'.$kode,
                    'tanggal'=>$request->tanggal,
                    'keterangan'=>$request->ket[$x],
                    'rekening_id'=>$request->rekening_id[$x],
                    'kode_rekening'=>$request->kode[$x],
                    'saldo_debit'=>$request->debit[$x],
                    'saldo_kredit'=>$request->kredit[$x],
                    'created_at'=>$request->tanggal,
                ]);
        }

        return redirect('/jurnal');
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

    public function ajaxkode(Request $request){
        if(jurnal::all()->count() == 0){
            $jurnal = 1;
        }
        else{
            $jurnal = jurnal::latest()->first()->id;
        }

        return str_pad($jurnal, 3, '0', STR_PAD_LEFT);
    }

    public function ajaxjurnal(Request $request)
    {
        $rekening = rekening::find($request->kode);
        return view('ajax.jurnal',[
            'nama'=>$rekening->nama_rekening,
            'kode'=>$rekening->kode_rekening,
            'debit'=>$request->debit,
            'kredit'=>$request->kredit,
            'ket'=>$request->ket,
            'rekening_id'=>$rekening->id,
           
        ]);
    }
    public function ajaxjurnallawan(Request $request)
    {
        $rekening = rekening::find($request->kode);
        return view('ajax.jurnallawan',[
            'nama'=>$rekening->nama_rekening,
            'kode'=>$rekening->kode_rekening,
            'debit'=>$request->debit,
            'kredit'=>$request->kredit,
            'rekenings'=>rekening::all()
        ]);
    }
}
