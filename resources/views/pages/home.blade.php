@extends('layouts.index')

@section('title')
    Home
@endsection

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Task Belum Proses </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Task Sedang Proses</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Task Selesai
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">28</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: {{ 28/30*100 }}%" aria-valuenow="28" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Task</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
        @if (session('status'))
            <div class="col-lg-6 alert alert-success mx-auto" id="flash-message">{{ session('status') }}</div>   
        @endif
    <div class="col-lg-12 mb-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Summary Data</h6>
            </div>
            <div class="card-body">
                 <a href="/task/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2"><i
                                class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a>
                <table class="table table-bordered table">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Uraian Kegiatan</th>
                            <th>Sumber</th>
                            <th>Jatuh Tempo</th>
                            <th>Status Disposisi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $loop->iteration  }}</td>
                                <td>{{ $item->uraian_kegiatan }}</td>
                                <td>{{ $item->sumber }}</td>
                                <td class="text-center"> <span class="badge badge-" . 
                                    @if (App\Task::diffInDaysFilter($item->jatuh_tempo) > 0)
                                     'primary';
                                    @endif
                                    {{
                                        if(){
                                            
                                        } else if(App\Task::diffInDaysFilter($item->jatuh_tempo) < 0) {
                                            return 'danger';
                                        } else {
                                            return 'warning';
                                        }
                                    }} ">
                                        {{ App\Task::diffInDaysFilter($item->jatuh_tempo) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if (App\TaskUser::taskId($item->id))
                                        <a href="#" class="btn btn-success btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text">Sudah</span>
                                        </a>
                                    @else
                                        <a href="#" class="btn btn-danger btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-times"></i>
                                            </span>
                                            <span class="text">Belum</span>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{-- @if () --}}
                                        <a href="#" class="btn btn-primary btn-sm {{App\TaskUser::taskId($item->id) ? 'disabled' : '' }} "><i
                                                class="fas fa-edit"></i> Disposisi</a>
                                    {{-- @else
                                        <a href="#" class="btn btn-primary btn-sm"><i
                                                class="fas fa-edit"></i> Disposisi</a>
                                    @endif --}}
                                    <a href="/task/{{ $item->id }}" class="btn btn-warning btn-sm"><i
                                            class="fas fa-edit"></i> Edit</a>
                                    <a href="/download/{{$item->id}}" class="btn btn-info btn-sm "><i
                                        class="fas fa-file"></i> Berkas</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mx-auto">
                  {{ $data ?? ''->links() }}
                </div>
                {{-- {{ App\Task::first()->getFirstMedia('berkas') }} --}}
            </div>
        </div>
    </div>
</div>
 <!-- Content Row -->
<div class="row justify-content-center">

  <div class="col-lg-6 mb-4">

      <!-- Illustrations -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Task Management App</h6>
          </div>
          <div class="card-body">
              <div class="text-center">
                  <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                      src="{{ asset('theme/img/undraw_posting_photo.svg') }}" alt="">
              </div>
              <p>Selamat Datang di KPP Pratama Baturaja</p>
              <a target="_blank" rel="nofollow" href="https://undraw.co/">Get to Know the App &rarr;</a>
          </div>
      </div>

  </div>
</div>

<!-- Logout Modal-->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    const flashMessage = document.getElementById("flash-message");
    document.addEventListener("DOMContentLoaded", () => {
        if (flashMessage.innerText.length > 0) {
            setTimeout(() => {
                flashMessage.style.display = 'none'
            }, 3000);
        } else {
            flashMessage.remove();
        }
    });
</script>
@endsection
