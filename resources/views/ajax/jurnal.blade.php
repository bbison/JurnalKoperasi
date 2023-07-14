<tr>
        <input type="hidden" name="rekening_id[]" value="{{$rekening_id}}">
    <td><input  class="d-inline col-12  border-0" type="text" value="{{ $kode }}" name="kode[]"
            id="kode"></td>
    {{-- <td><textarea disabled name="ket[]" id="" class="border-0" cols="30" rows="1">{{$nama.' '.$ket}}</textarea></td> --}}
    <td><input  class="d-inline col-12 border-0" type="text" value="{{ $nama . ' ' . $ket }}" name="ket[]"
            id="ket"></td>
    @if ($debit == '')
        <td><input  class="d-inline col-12 text-end border-0" type="text" value="" name="debit[]"
                id="debit-jurnal"></td>
    @else
        <td><input  class="d-inline col-12 text-end border-0" type="text"
                value="{{ number_format($debit, 0, ',', '.') }}" name="debit[]" id="debit-jurnal"></td>
    @endif
    @if ($kredit == '')
        <td><input  class="d-inline col-12 text-end border-0" type="text" value="" name="kredit[]"
                id="kredit-jurnal"></td>
    @else
        <td><input  class="d-inline col-12 text-end border-0" type="text"
                value="{{ number_format($kredit, 0, ',', '.') }}" name="kredit[]" id="kredit-jurnal"></td>
    @endif
</tr>
