<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <link href="{{ url('') }}/css/styles.css" rel="stylesheet" />
    <link href="{{ url('') }}/css/bootstraps.css" rel="stylesheet" />
</head>

{{-- <style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style> --}}
<body>
    
<h3 style="text-align: center">Jurnal {{date('d F Y', strtotime(request('tanggal_awal'))).'-'.date('d F Y', strtotime(request('tanggal_akhir')))}}</h3>
<br>
<table class="table table-bordered border-dark border-2">
    <tr class=" border-dark border-2">
        <th  class=" border-dark border-2" >Tanggal</th>
        <th class=" border-dark border-2" >Kode</th>
        <th class=" border-dark border-2" >Keterangan</th>
        <th class=" border-dark border-2" >Debit</th>
        <th class=" border-dark border-2" >Kredit</th>
    </tr>

    @php
        $previousData = null;
    @endphp

    @foreach ($jurnals as $jurnal)
        <tr class=" border-dark border-2">
            @if ($previousData == $jurnal->created_at)
                <td></td>
            @else
                <td >{{ date('d/m/y', strtotime($jurnal->created_at)) }}</td>
            @endif
            <td class=" border-dark border-2">{{ $jurnal->kode_rekening }}</td>
            <td class=" border-dark border-2">{{ $jurnal->keterangan }}</td>
            <td class=" border-dark border-2" style="text-align: right">{{ $jurnal->saldo_debit }}</td>
            <td class=" border-dark border-2" style="text-align: right">{{ $jurnal->saldo_kredit }}</td>
        </tr>

        @php
            $previousData = $jurnal->created_at;
        @endphp
    @endforeach

</table>

<script>
    window.print()
</script>

</body>
</html>