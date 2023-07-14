<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profil;
use App\Models\jurnal;
use App\Models\rekening;
use App\Models\kelompok_rekening;
use App\Models\sub_kelompok_rekening;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;



class laporanController extends Controller
{
    public function kelompokRekening(Request $request)
    {

    
      

        if($request->kelompok_rekening_id && !$request->sub_kelompok_id  ){
            return view('laporan.subKelompok',[
                'profil'=>profil::find(1),
                'subKelompokRekenings'=>kelompok_rekening::find($request->kelompok_rekening_id)
            ]);
        }

        elseif($request->kelompok_rekening_id && $request->sub_kelompok_id ){

            return view('laporan.rekening',[
                'profil'=>profil::find(1),
                'rekenings'=>sub_kelompok_rekening::where('kelompok_rekening_id', $request->kelompok_rekening_id)->get()
            ]);
        }
        return view('laporan.kelompokRekening',[
            'profil'=>profil::find(1),
            'kelompokRekenings'=>kelompok_rekening::all()
        ]);
    } 

    public function neraca(Request $request)
    {
        return view('laporan.neraca',[
            'profil'=>profil::find(1),
        ]);
    }

    public function printJurnal(Request $request)
    {
        if(!$request->tanggal_awal){
            return back()->with('Gagal','Silahkan Pilih Tanggal Awal Dan Tanggal Akhir Terlebih Dahulu Untuk Di Filter');
        }
      

        $data = jurnal::whereBetween('created_at',[$request->tanggal_awal,$request->tanggal_akhir])
        ->get();
    
      
        return view('print.jurnal',[
            'jurnals'=>$data
        ]);

    }
    public function downloadJurnal(Request $request)
    {
        if(!$request->tanggal_awal){
            return back()->with('Gagal','Silahkan Pilih Tanggal Awal Dan Tanggal Akhir Terlebih Dahulu Untuk Di Filter');
        }
        $data = jurnal::whereBetween('created_at',[$request->tanggal_awal,$request->tanggal_akhir])
        ->get();

        $pdf = Pdf::loadView('download.jurnal',[
            'jurnals'=>$data
        ]);
        return $pdf->download('Jurnal '.$request->tanggal_awal.' / ' .$request->tanggal_awal.'.pdf');
    }
    public function neracaSaldo()
    {
        return view('laporan.neracasaldo',[
            'rekenings'=>rekening::All(),
            'profil'=>profil::find(1),
        ]);
    }
}
