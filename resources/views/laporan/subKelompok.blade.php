@extends('layouts.sidebar')
@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-10 mt-3">
            <h3 class="text-center">Laporan Sub Rekening</h3>

            {{-- @dd($subKelompokRekenings) --}}

            <table class="table">
                <tr>
                    <th>Sub Kelompok Rekening</th>
                </tr>
                @foreach ($subKelompokRekenings->sub_kelompok_rekening as $subKelompokRekening)
                <tr>
                    <td>
                        <a href="/laporan-kelompok-rekening?kelompok_rekening_id={{request('kelompok_rekening_id')}}&sub_kelompok_id={{$subKelompokRekening->id}}&nama_rekening={{$subKelompokRekening->nama_sub_kelompok}}"> {{$subKelompokRekening->nama_sub_kelompok}} </a>
                    </td>
                </tr>
                    
                @endforeach

            </table>

         

        </div>
    </div>
@endsection
