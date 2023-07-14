@extends('layouts.sidebar')
@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-10 mt-3">
            <h3 class="text-center">Laporan Rekening</h3>

            <table class="table">
                <tr>
                    <th>kelompok Rekening</th>
                </tr>
                @foreach ($kelompokRekenings as $kelompokRekening)
                <tr>
                    <td>
                        <a href="/laporan-kelompok-rekening?kelompok_rekening_id={{$kelompokRekening->id}}"> {{$kelompokRekening->nama_kelompok}} </a>
                    </td>
                </tr>
                    
                @endforeach

            </table>

         

        </div>
    </div>
@endsection
