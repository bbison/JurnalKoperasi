@extends('layouts.sidebar')
@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-10 mt-3">
            <h3 class="text-center">  LAPORAN REKENING <br>KOPERASI {{$profil->nama_koperasi}}</h3>

            @if (session('Berhasil'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> {{ session('Berhasil') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('Gagal'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> {{ session('Gagal') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Rekening
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="/rekening" method="post">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Rekening</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="foo" class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Sub Rekening</label>
                                    <select name="kodesub" id="" class="form-control" onchange="kode(this.value)">
                                        <option value="">=Pilih Kode Sub Rekening</option>
                                        @foreach ($subRekenings as $subkelompok)
                                            <option value="{{ $subkelompok->kode_sub_rekening }}">
                                                {{ '(' . $subkelompok->kode_sub_rekening . ') ' . $subkelompok->nama_rekening }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kode Rekening</label>
                                    <div class="col-12 d-flex">
                                        <div class="col-2">
                                            <input type="text" readonly id="kodesub" class="form-control" value="">
                                        </div>
                                        <div class="col-10">
                                            <input type="text" class="form-control" name="kode_rekening" readonly id="kode_rekening" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Rekening</label>
                                    <input type="text" id="kodesub" class="form-control" name="nama_rekening">
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Saldo Awal</label>
                                    <input type="text" id="kodesub" class="form-control" name="saldo_awal">
                                </div> --}}

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-start">
                <div class="col-10">
                    <table class="table">
                        <tr>
                            <th>Kode Rekening</th>
                            <th>Nama</th>
                            {{-- <th>Saldo</th> --}}
                
                        </tr>
                        @foreach ($rekenings as $rekening)
                            <tr>
                                <td>{{$rekening->kode_rekening}}</td>
                                <td>{{ $rekening->nama_rekening }}</td>
                                {{-- <td>{{ $rekening->saldo }}</td> --}}
                                
                            </tr>
                           
                            </div>
                        @endforeach
                    </table>
                </div>

            </div>



        </div>
    </div>

    <script>
        function kode(kode) {
            data = document.getElementById('kodesub').value = kode;
            data = document.getElementById('kode_rekening').removeAttribute('readonly')

        


        }
    </script>
@endsection
