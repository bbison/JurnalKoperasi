@extends('layouts.sidebar')
@section('body')

    <div class="d-flex justify-content-center">
        <div class="col-6 mt-3">
            <h3 class="text-center">  LAPORAN SALDO REKENING <br>KOPERASI {{$profil->nama_koperasi}}</h3>
            <table class="table">
                <tr>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Rekening</th>
                    <th class="text-center">Debit</th>
                    <th class="text-center">Kredit</th>
                </tr>
                @foreach ($rekenings as $rekening)
                <tr>
                    <td >{{ $rekening->kode_rekening}}</td>
                    <td >{{ $rekening->nama_rekening}}</td>
                    <td class="text-end">@format( $rekening->saldo)</td>
                    <td></td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection
