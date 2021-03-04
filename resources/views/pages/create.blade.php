@extends('layouts.index')

@section('title')
    Add Data
@endsection

@section('content')
<div class="row">

  <div class="col-lg-9 mb-4 mx-auto">

      <!-- Illustrations -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
          </div>
          <div class="card-body">
            <div class="col-lg-8 col-md-6 mx-auto">
              <form action="/task"  method="POST">
                @csrf
                <div class="form-group">
                  <label>Uraian Kegiatan</label>
                  <input type="text" name="uraian_kegiatan" class="form-control">
                </div>
                <div class="form-group">
                  <label>Sumber</label>
                  <input type="text" name="sumber" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jatuh Tempo</label>
                  <input type="date" name="jatuh_tempo" class="form-control">
                </div>
                <div class="form-group">
                  <label>Berkas</label>
                  <input type="file" name="berkas" class="form-control">
                </div>              
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Delegasikan Tugas Ke:</label>
                  <div class="form-row">
                    <div class="col">
                      <select class="form-control" id="seksi">
                        <option value="1">Seksi Pelayanan</option>
                        <option value="2">Subbagian Umum dan Kepatuhan Internal</option>
                        <option value="3">Seksi Pengolahan Data dan Informasi</option>
                        <option value="4">Seksi Penagihan</option>
                        <option value="5">Seksi Pemeriksaan</option>
                        <option value="6">Seksi Pengawasan dan Konsultasi I</option>
                        <option value="7">Seksi Pengawasan dan Konsultasi II</option>
                        <option value="8">Seksi Pengawasan dan Konsultasi III</option>
                        <option value="9">Seksi Pengawasan dan Konsultasi IV</option>
                        <option value="10">Seksi Ekstensifikasi dan Penyuluhan</option>
                        <option value="11">Supervisor Pemeriksa Pajak 1</option>
                        <option value="12">Supervisor Pemeriksa Pajak 2</option>
                        <option value="13">Supervisor Pemeriksa Pajak 3</option>
                      </select>
                    </div>
                    
                      <button class="d-sm-block btn btn-sm btn-info shadow-sm mb-2" type="button" onclick="myFunction()">Tambah</button>
                    
                  </div>
                </div>
                <ul id="myList"></ul>
                <div class="form-group">
                <button class="btn btn-sm btn-primary btn-block shadow-sm mb-2" type="submit" id="addTask">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
  </div>
</div>
@endsection


@section('scripts')
<script>
  let listSeksi = [];
  function myFunction() {
    const data = document.getElementById("seksi");
    const kasi = {
        userId: data.options[data.selectedIndex].value,
        priority: null
    } 
     
    listSeksi.push(kasi);    
    const priorityNum = listSeksi.findIndex(object => object.userId === data.options[data.selectedIndex].value);
    listSeksi[priorityNum].priority = priorityNum + 1; 
    console.log(listSeksi);
    addList();
    return;
  }

  function addList() {
      const list = document.getElementById("myList");
      list.innerHTML = '';
      for( i=0 ; i < listSeksi.length ?? 0 ; i++) {
          list.innerHTML += `<li> ${document.querySelector(`option[value="${listSeksi[i].userId}"`).textContent} : Urutan Pengerjaan ke- ${listSeksi[i].priority}</li>`;
      }
      
      document.querySelector(`option[value="${listSeksi[listSeksi.length - 1].priority + 1}"]`).setAttribute('selected','true');          
      document.querySelector(`option[value="${listSeksi[listSeksi.length - 1].userId}"]`).style.display = "none";          
      return;
  }

  const fetchData = async () => {
      let response = await fetch("/api/tasklist",
              {
                  headers: {
                      'Accept': 'application/json',
                      'Content-Type': 'application/json'
                  },
                  method: "POST",
                  body: JSON.stringify(listSeksi)
              });
              const content = await response.json();
              console.log(content);
              return;
  }

  document.getElementById('addTask').addEventListener('submit', (event) => {
    event.preventDefault();
    fetchData();
  });
</script>
@endsection