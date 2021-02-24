@extends('layouts.index')

@section('title')
    Add Data
@endsection

@section('content')
<div class="row">

  <div class="col-lg-9 mb-4">

      <!-- Illustrations -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
          </div>
          <div class="card-body">
            <form action="/task"  method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleFormControlInput1">Uraian Kegiatan</label>
                <input type="text" name="uraian_kegiatan" class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Sumber</label>
                <input type="text" name="sumber" class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Jatuh Tempo</label>
                <input type="date" name="jatuh_tempo" class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Berkas</label>
                <input type="file" name="berkas" class="form-control">
              </div>
              
              
              <div class="form-group">
                <label for="exampleFormControlSelect1">Delegasikan Tugas Ke:</label>
                <div class="form-row">
                  <div class="col">
                    <select class="form-control" id="seksi">
                      <option value="1">Kepala Seksi Pelayanan</option>
                      <option value="2">Kepala Subbagian Umum dan Kepatuhan Internal</option>
                      <option value="3">Kepala Seksi Pengolahan Data dan Informasi</option>
                      <option value="4">Kepala Seksi Penagihan</option>
                      <option value="5">Kepala Seksi Pemeriksaan</option>
                      <option value="6">Kepala Seksi Pengawasan dan Konsultasi I</option>
                      <option value="7">Kepala Seksi Pengawasan dan Konsultasi II</option>
                      <option value="8">Kepala Seksi Pengawasan dan Konsultasi III</option>
                      <option value="9">Kepala Seksi Pengawasan dan Konsultasi IV</option>
                      <option value="10">Kepala Seksi Ekstensifikasi dan Penyuluhan</option>
                      <option value="11">Supervisor Pemeriksa Pajak 1</option>
                      <option value="12">Supervisor Pemeriksa Pajak 2</option>
                      <option value="13">Supervisor Pemeriksa Pajak 3</option>
                    </select>
                  </div>
                  <div class="col">
                    <button class="btn btn-info" type="button" onclick="myFunction()">Tambah</button>
                  </div>
                </div>
              </div>
              <ul id="myList">
                
              </ul>
              
              <button class="btn btn-primary" type="submit" id="addTask">Simpan</button>
            </form>
          </div>
        </div>
  </div>
</div>
@endsection

{{-- 
@push('scripts')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
    function sendData() {
        var data = [
            1,
            2,
            3
        ];
        $.ajax({
            url:'/test',
            type: 'POST',
            dataType:'json',
            contentType: 'json',
            data: JSON.stringify(listSeksi),
            contentType: 'application/json; charset=utf-8',
        });
    }
  </script>
@endpush --}}