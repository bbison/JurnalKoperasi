@extends('layouts.sidebar')
@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-10 mt-3">
            <h3 class="text-center"> Sub Kelompok Rekening</h3>

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
                Tambah Sub Kelompok
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="/sub-kelompok-rekening" method="post">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Sub Kelompok Rekening</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kelompok Rekening</label>
                                    <select name="kodekelompoksubrek" id="kelompok" class="form-control"
                                        onchange="kodekelompok(this.value)">
                                        <option value="">=Pilih Kelompok Rekening=</option>
                                        @foreach ($kelompok_rekenings as $kelompok_rekening)
                                            <option value="{{ $kelompok_rekening->id }}">
                                                {{ '(' . $kelompok_rekening->id . ') ' . $kelompok_rekening->nama_kelompok }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kode Sub Rekening</label>
                                    <div class="col-12 d-flex">
                                        <div class="col-2">
                                            <input type="text" class="form-control"  id="kkelompok" value="" readonly
                                            name="kelompok">
                                        </div>
                                        <div class="col-10">
                                            <input type="text"   id="kodesub" onkeyup="validasi()" class="form-control" readonly
                                            name="kode_sub_kelompok_rekening">
                                        </div>
                                    </div>
                                   
                                </div>
                                <div id="foo" class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Sub Rekening</label>
                                    <input type="text" name="namasubrek" class="form-control" name="nama_sub_kelompok_rekening">
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


            <div class="col-6">
                <table class="table">
                    <tr>
                        <th>Kode</th>
                        <th>Nama Kelompok</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($sub_kelompok_rekenings as $sub_kelompok_rekening)
                    {{-- @dd($kelompok_rekening) --}}
                        <tr>
                            <td>{{ $sub_kelompok_rekening->kode_sub_kelompok }}</td>
                            <td>{{ $sub_kelompok_rekening->nama_sub_kelompok }}</td>
                            <td> <button type="button" class="border-0 btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $sub_kelompok_rekening->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                        <path
                                            d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                    </svg>
                                </button>
                            </td>

                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$sub_kelompok_rekening->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="/sub-kelompok-rekening/{{$sub_kelompok_rekening->id}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Sub Kelompok Rekening</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Kelompok Rekening</label>
                                                <select name="kodekelompoksubrek" id="kelompok" class="form-control"
                                                    onchange="kodekelompok(this.value)">
                                                    <option value="">=Pilih Kelompok Rekening=</option>
                                                    @foreach ($kelompok_rekenings as $kelompok_rekening)
                                                        <option value="{{ $kelompok_rekening->id }}" @if ( $kelompok_rekening->id == $sub_kelompok_rekening->kelompok_rekening_id)
                                                            @selected(true)
                                                        @endif>
                                                            {{ '(' . $kelompok_rekening->id . ') ' . $kelompok_rekening->nama_kelompok }}
                                                        </option>
                                                    @endforeach
                                                </select>
            
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Kode Sub Rekening</label>
                                                <input type="text" name="kodesubrek" value="{{$sub_kelompok_rekening->kode_sub_kelompok}}" id="kodesub" onkeyup="validasi()" class="form-control"
                                                    name="kode_sub_kelompok_rekening">
                                            </div>
                                            <div id="foo" class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nama Sub Rekening</label>
                                                <input type="text" name="namasubrek"  value="{{$sub_kelompok_rekening->nama_sub_kelompok}}" class="form-control" name="nama_sub_kelompok_rekening">
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
                    @endforeach
                </table>
            </div>

        </div>
    </div>

    <script>
        function kodekelompok(id) {
           kelompok = document.getElementById('kkelompok').value = id;
           document.getElementById('kodesub').removeAttribute('readonly')
          
        }


        // function validasi() {
        //     kodesub = document.getElementById('kodesub')
        //     kelompok = document.getElementById('kelompok')
        //     console.log(kelompok.value)

        //     if (!kelompok.value) {
        //         alert("Silahkan Pilih Kode Kelompok");
        //     }
        //     else if(kodesub.value[0] != kelompok.value) {
        //         alert("Kode Sub Kelompok Menyesuaikan Kode Kelompok Yang Telah Dipilih");
        //         data = document.getElementById('kodesub').value = kelompok.value;
               
        //     }
        // }
    </script>
@endsection
