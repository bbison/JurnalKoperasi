@extends('layouts.sidebar')
@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-10 mt-3">
            <h3 class="text-center"> Sub Rekening</h3>

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
                Tambah Sub Rekening
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="/sub-rekening" method="post">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Sub Rekening</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="foo" class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Sub Kelompok Rekening</label>
                                    <select name="kodesub" id="" class="form-control" onchange="kode(this.value)">
                                        <option value="">=Pilih Kode Sub Rekenig</option>
                                        @foreach ($subKelompokRekenings as $subkelompok)
                                            <option value="{{ $subkelompok->kode_sub_kelompok }}">
                                                {{ '(' . $subkelompok->kode_sub_kelompok . ') ' . $subkelompok->nama_sub_kelompok }}
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
                                            <input type="text" class="form-control" name="kode_rekening" id="kode_rekening" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Rekening</label>
                                    <input type="text" id="kodesub" class="form-control" name="nama_rekening">
                                </div>
                               

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
                            <th>Action</th>
                        </tr>
                        @foreach ($subRekenings as $rekening)
                            <tr>
                                <td>{{ $rekening->kode_sub_rekening }}</td>
                                <td>{{ $rekening->nama_rekening }}</td>
                                <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $rekening->id }}">
                                        Update
                                    </button></td>
                            </tr>
                            <div class="modal fade" id="exampleModal{{ $rekening->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="/rekening/{{ $rekening->id }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">update sub Rekening</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="foo" class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Sub Kelompok Rekening</label>
                                                    <select name="kodesub" id="" class="form-control"
                                                        onchange="kode(this.value)">
                                                        <option value="">=Pilih Kode Sub Rekenig</option>
                                                        {{-- @foreach ($subkelompoks as $subkelompok)
                                                            <option value="{{ $subkelompok->kode_sub_kelompok }}"
                                                                @if ($subkelompok->kode_sub_kelompok == $rekening->sub_kelompok_rekening->kode_sub_kelompok) @selected(true) @endif>
                                                                {{ '(' . $subkelompok->kode_sub_kelompok . ') ' . $subkelompok->nama_sub_kelompok }}
                                                            </option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Kode
                                                        Rekening</label>
                                                    <input type="text" id="kodesub" class="form-control"
                                                        name="kode_rekening" value="{{ $rekening->kode_rekening }}">

                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nama
                                                        Rekening</label>
                                                    <input type="text" id="kodesub" class="form-control"
                                                        name="nama_rekening" value="{{ $rekening->nama_rekening }}">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="simpan" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
            data = document.getElementById('kode_rekening').removeAttribute('readonly');


        }
    </script>
@endsection
