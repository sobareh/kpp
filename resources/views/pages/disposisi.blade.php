@extends('layouts.index')

@section('title')
    Disposisi Tugas
@endsection

@section('content')
<div class="form-group">
  <label htmlFor="exampleFormControlSelect1">Delegasikan Tugas Ke:</label>
  <div class="form-row">
    <div class="col-7">
      <select class="form-control" name="seksi" id="seksi">
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

  

        
        // if (sessionStorage.getItem('message')) {
        //     flashMessage.innerText = `${sessionStorage.getItem('message')}`;
        //     setTimeout(() => {
        //         flashMessage.style.display = "none";
        //         sessionStorage.removeItem('message')
        //     }, 3000);
        // } else {
        //     flashMessage.style.display = "none";
        // }
</script>
@endsection