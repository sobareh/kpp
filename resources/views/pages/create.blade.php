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
          <form action="/task" method="POST" id="form" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Uraian Kegiatan</label>
              <input type="text" name="uraian_kegiatan" class="form-control" />
            </div>
            <div class="form-group">
              <label>Sumber</label>
              <input list="sumbers" name="sumber" id="sumber" class="form-control col-lg-6" />
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
  </script>
@endsection