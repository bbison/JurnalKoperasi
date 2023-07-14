@extends('layouts.sidebar')
@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-10 mt-3">
            <h3 class="text-center">Jurnal</h3>
<br>
            @if (session('Berhasil'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> {{ session('Berhasil') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('Gagal'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> {{ session('Gagal') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="d-flex">


                <a href="/jurnal/create" class=" btn d-inline me-4 btn-primary"> Tambah Jurnal </a>
                <form action="/jurnal" method="get">
                    @csrf
                    <div class="d-flex">
                        <input type="date" required name="tanggal_awal" class="form-control me-2">
                        <input type="date" required name="tanggal_akhir" class="form-control me-2">
                        <input type="submit" value="Filter" class="btn btn-danger">
                    </div>
                </form>

                <a class="ms-5" href="/print-jurnal?@if(request('tanggal_awal'))tanggal_awal={{request('tanggal_awal')}}&tanggal_akhir={{request('tanggal_akhir')}} @endif" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                        <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                      </svg>
                </a>
                <a class="ms-1" href="/download-jurnal?@if(request('tanggal_awal'))tanggal_awal={{request('tanggal_awal')}}&tanggal_akhir={{request('tanggal_akhir')}} @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                      </svg>
                </a>
            </div>
            <br>




            <div class="col-9">
                <table class="table">
                    <tr>
                        <th>Tanggal</th>
                        <th>Kode</th>
                        <th>Keterangan</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                    </tr>

                    @php
                        $previousData = null;
                    @endphp

                    @foreach ($jurnals as $jurnal)
                        <tr>
                            @if ($previousData == $jurnal->created_at)
                                <td></td>
                            @else
                                <td>{{ date('d/m/y', strtotime($jurnal->created_at)) }}</td>
                            @endif
                            <td>{{ $jurnal->kode_rekening }}</td>
                            <td>{{ $jurnal->keterangan }}</td>
                            <td>{{ $jurnal->saldo_debit }}</td>
                            <td>{{ $jurnal->saldo_kredit }}</td>
                        </tr>

                        @php
                            $previousData = $jurnal->created_at;
                        @endphp
                    @endforeach

                </table>
            </div>

        </div>
    </div>
@endsection
