@extends('layouts.index')

@section('title')
    Add Data
@endsection

@section('content')
<div class="row">
  <div class="col-lg-9 mb-4 mx-auto">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
      </div>
      <div class="card-body">
        <div class="col-lg-8 col-md-6 mx-auto">
          <form action="#" method="POST" id="form" autoComplete="off" encType="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Uraian Kegiatan</label>
              <input type="text" name="uraian_kegiatan" class="form-control" />
            </div>
            <div class="form-group">
              <label>Sumber</label>
              <input list="sumbers" name="sumber" id="sumber" class="form-control" />
              <datalist id="sumbers">
                <option value="Nadine">
                </option><option value="Risalah Rapat">
                </option><option value="Nota Dinas">
                </option><option value="Memo">
                </option><option value="Perintah Langsung">
                </option>
              </datalist>
            </div>
            <div class="form-group">
              <label>Jatuh Tempo</label>
              <input type="date" name="jatuh_tempo" class="form-control col-4" />
            </div>
            <div class="form-group">
              <label>Berkas</label>
              <input type="file" name="berkas" id="berkas" class="col-lg-6 col-md-8" />
            </div>              
            <div class="form-group">
              <label htmlFor="exampleFormControlSelect1">Delegasikan Tugas Ke:</label>
              <div class="form-row">
                <div class="col-7">
                  <select class="form-control" name="seksi[]" id="seksi" multiple="multiple">
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
                <button class="d-sm-block btn btn-sm btn-primary shadow-sm mt-1 mb-1" type="button" onclick="myFunction()">Tambah</button>
              </div>
            </div>
            <ul id="myList"> </ul>
            <div class="form-group">
              <button class="btn btn-sm btn-danger btn-inline-block shadow-sm px-4 py-2 mt-2 mb-5" type="submit">Simpan</button>
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

  const inputElement = document.querySelector("input[id='berkas']");
  const pond = FilePond.create(inputElement);
  FilePond.setOptions({
    server: {
      url: '/upload',
      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
    }
  });
  
  
  const form = document.getElementById("form");
  form.addEventListener("submit", (e) => {
    const uraianKegiatan = document.querySelector("input[name='uraian_kegiatan']").value;
    const sumber = document.querySelector("input[name='sumber']").value;
    const jatuhTempo = document.querySelector("input[name='jatuh_tempo']").value;
    const data = {
      uraianKegiatan,
      sumber,
      jatuhTempo,
      listSeksi
    }  
    const options = { 
                      headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                      },
                      method: "POST",
                      body: JSON.stringify(data),
                    } 
      e.preventDefault()
      fetch("/api/tasklist", options)
      .then(response => response.json())
      .then(data => {
        console.log(data);
        if (data.success === true) {
          setTimeout(() => window.location = "/task" ,3000) 
        }
      })
      .catch(error => console.log(error))
  });



</script>
@endsection