@extends('layouts.sidebar')
@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-11 mt-3">
            <h3 class="text-center">Jurnal</h3>

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

            <form action="/jurnal" method="post">
                <div class="col-12 row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomer Jurnal</label>
                            <input type="text" id="nojurnal" class="form-control" name="no_jurnal" readonly>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                            <input type="date" id="kodesub" class="form-control" name="tanggal" required
                                onchange="nomer(this.value)">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                            <textarea  id="ket" class="form-control"></textarea>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kode Rekening</label>
                            <select  id="koderek" class="form-control">
                                <option value="">=Pilih Rekening=</option>
                                @foreach ($rekenings as $rekening)
                                    <option value="{{ $rekening->id }}">
                                        {{ '(' . $rekening->kode_rekening . ') ' . $rekening->nama_rekening }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="exampleInputEmail1" class="form-label">Debit</label>
                                <input type="text" id="debit" class="form-control"  onkeyup="disablekredit(this.value)">
                            </div>
                            <div class="col-6">
                                <label for="exampleInputEmail1" class="form-label">Kredit</label>
                                <input type="text" id="kredit" class="form-control"   onkeyup="disabledebit(this.value)">
                            </div>
                        </div>
                        @csrf


                

                    </div>
                    <div class="col-8">
                        <div class="hasil" id="hasil">
                            <table class="table" id="table">
                                <tr class="d-none" id="row">
                                    <th class="col-2">Kode</th>
                                    <th class="col-5">Keterangan</th>
                                    <th class="col-2">Debit</th>
                                    <th class="col-2">Kredit</th>
                                </tr>
                                <tbody id="body">

                                </tbody>
                                <tr class="d-none" id="sldo">
                                    <th colspan="2">Saldo</th>
                                    <th id="saldo-debit" class="text-end"></th>
                                    <th id="saldo-kredit" class="text-end"></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" id="simpan" class="btn btn-primary d-none">Simpan</button>
                    <button type="button" onclick="update()" class="btn btn-success">Lanjut</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function nomer(tanggal) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    let tahun = new Date(tanggal).getFullYear()

                    let bulan = new Date(tanggal).getMonth()
                    document.getElementById("nojurnal").value = tahun + "." + bulan + "." + this.responseText;

                    let table = document.getElementById("table")
                }
            };
            xmlhttp.open("GET", "/ajax-kode", true);
            xmlhttp.send();
        }

        function update() {




            let koderek = document.getElementById("koderek").value
            let debit = document.getElementById("debit").value
            let kredit = document.getElementById("kredit").value
            let ket = document.getElementById("ket").value

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    let table = document.getElementById("body")
                    row.classList.remove('d-none');

                    let sldo = document.getElementById("sldo")
                    sldo.classList.remove('d-none');
                    table.innerHTML += this.response

                    if (document.querySelectorAll('input[type="text"][name="debit"]')) {
                        var debits = document.querySelectorAll('input[type="text"][id="debit-jurnal"]');
                        var kredits = document.querySelectorAll('input[type="text"][id="kredit-jurnal"]');


                        var saldo_debit = 0
                        var saldo_kredit = 0

                        for (let x = 0; x < debits.length; x++) {

                            angka_debit = debits[x].value.replaceAll('.','')
                            angka_kredit = kredits[x].value.replaceAll('.','')

                            nilai_debit = parseFloat(  angka_debit)
                            nilai_kredit = parseFloat(angka_kredit)

                            if (!isNaN(nilai_debit)) {
                                saldo_debit += nilai_debit
                            }
                            if (!isNaN(nilai_kredit)) {
                                saldo_kredit += nilai_kredit
                            }
                            console.log(angka_debit)
                           
                        }

                      



                        var upsaldodebit = document.getElementById("saldo-debit")
                        var upsaldokredit = document.getElementById("saldo-kredit")

                        upsaldodebit.innerHTML= saldo_debit.toLocaleString('id-ID', { style: 'decimal', useGrouping: true })
                        upsaldokredit.innerHTML= saldo_kredit.toLocaleString('id-ID', { style: 'decimal', useGrouping: true })

                        if (saldo_debit == saldo_kredit) {

                            let simpan = document.getElementById("simpan")
                            simpan.classList.remove('d-none');
                        }
                        else{
                            let simpan = document.getElementById("simpan")
                            simpan.classList.add('d-none');
                        }

                    }

                    document.getElementById("debit").value= ""
                    document.getElementById("kredit").value= ""
                    document.getElementById("ket").value= ""
                    document.getElementById("koderek").value= ""
                    document.getElementById('kredit').disabled= false
                    document.getElementById('debit').disabled= false



           
                }
            };

            xmlhttp.open("GET", "/ajax-jurnal-sesuaikan?kode=" + koderek + "&debit=" + debit + "&kredit=" + kredit +
                "&ket=" + ket, true);
            xmlhttp.send();

      
        }

        function disablekredit(data){
            if (data.length != 0) {
                document.getElementById('kredit').disabled= true
                console.log(data)
            } else {
                document.getElementById('kredit').disabled= false
            }

            
        }
        function disabledebit(data){
            if (data.length != 0) {
                document.getElementById('debit').disabled= true
                console.log(data)
            } else {
                document.getElementById('debit').disabled= false
            }

            
        }
    </script>
@endsection
