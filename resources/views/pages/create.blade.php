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
            <form action="/test"  method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleFormControlInput1">Uraian Kegiatan</label>
                <input type="email" name="kegiatan" class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Sumber</label>
                <input type="email" name="sumber" class="form-control">
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
                <label for="exampleFormControlSelect1">Example select</label>
                <div class="form-row">
                  <div class="col">
                    <select class="form-control" name="listTugas[]" id="seksi">
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
                    <button class="btn btn-info" type="submit" id="addList" onclick="add()">Add</button>
                  </div>
                </div>
                <div id="result"></div>
              </div>
              <button class="btn btn-primary" type="submit" id="addList" onClick="sendData()">Simpan</button>
            </form>
            <select id="select1" class="selectVal">
              <option value="1">test1</option>
              <option value="2" selected="selected">test2</option>
              <option value="3">test3</option>
            </select>
            
            <select id="select2" class="selectVal">
              <option value="1">asdf</option>
              <option value="2" selected="selected">fdsa</option>
              <option value="3">asdf</option>
            </select>
            
            <button onClick="getSelectedItems()">Get Selected Item</button>
          </div>
        </div>
  </div>
</div>

<script>
  let listSeksi = [];
  var array = ["slide 1", "slide 2", "slide 3", "slide 4", "slide 5"]

  function add() {
    event.preventDefault();
    let data = document.getElementById("seksi");
    let kasi = data.options[data.selectedIndex].value;
    console.log(kasi);

    listSeksi.push(kasi);
  }

  function getSelectedItems() {
  var elements = document.getElementsByClassName('selectVal');

  var results = [];

  for (var i = 0; i < elements.length; i++) {
    var element = elements[i];
    var strSel = element.options[element.selectedIndex].text;
    results.push(strSel);
  }
  console.log(results);
}

</script>
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
    
@endsection