@extends('layouts.index')

@section('title')
    Detail Data
@endsection

@section('content')
    <div class="row">
      <div class="col-lg-10 col-md-6 col-sm-3 mx-auto">
        <div class="card shadow">
          <div class="card-header">
            <h5 class="text-primary">
              Detail Data Header
            </h5>
          </div>
          <div class="card-body">
            <div class="timeline text-center">
              @foreach ($data as $item)
                <div class="timeline-item">
                  <div class="timeline-item-marker">
                    <div class="timeline-item-marker-text">{{ $item->pivot->created_at }}</div>
                    <div class="timeline-item-marker-indicator bg-success-soft text-success">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
                    </div>
                  </div>
                  <div class="timeline-item-content pt-0">
                    <div class="card shadow-sm">
                      <div class="card-body">
                        <h5 class="text-success">{{ $item->position }}</h5>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item d-flex justify-content-between align-items-center ml-3">
                            Prioritas Pengerjaan: 
                            <span class="badge badge-primary badge-pill">{{ $item->pivot->priority }}</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center ml-3">
                            Dikerjakan Pada: 
                            <span class="badge badge-{{$item->pivot->process_at ? 'success' : 'danger'}} badge-pill">{{ $item->pivot->process_at ?? "BELUM PROSES" }}</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center ml-3">
                            Selesai Pada:
                            <span class="badge badge-{{$item->pivot->done_at ? 'success' : 'danger'}} badge-pill">{{ $item->pivot->done_at ?? "BELUM SELESAI" }}</span>
                          </li>
                        </ul>                                 
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
    
@endsection