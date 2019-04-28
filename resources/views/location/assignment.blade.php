@extends('layouts.app')

@section('styles')

<link href="{{ asset('capstone/Template/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{ asset('capstone/Template/assets/css/style.css')}}" rel="stylesheet">
<link href="{{ asset('capstone/Template/assets/css/responsive.css')}}" rel="stylesheet">

@endsection

@section('content')
      <main class="content_wrapper">
      <div class="page-heading">
                              <div class="container-fluid">
                                  <div class="row d-flex align-items-center">
                                      <div class="col-12 justify-content-md-end d-flex">
                                          <div class="breadcrumb_nav">
                                              <ol class="breadcrumb">
                                                  <li>
                                                      <i class="fa fa-home"></i>
                                                      <a class="parent-item" href="{{URL::to('dashboard')}}">Home</a>
                                                      <i class="fa fa-angle-right"></i>
                                                  </li>
                                                  <li class="active">
                                                    Location Assignment
                                                  </li>
                                              </ol>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                </div>

                <div class="container-fluid">
                                      <!-- state start-->
                                      <div class="row">
                                          <div class=" col-12">
                                              <div class="card card-shadow mb-4">
                                                  <div class="card-header">
                                                      <div class="card-title">
                                                      </div>
                                                  </div>
                                                  <div class="card-body">
                                                    @include('includes.flash')
                                                        @if ( $errors->any() )
                                                               @foreach ($errors->all() as $error)
                                                                <div class="alert alert-danger">{{$error}}</div>
                                                              @endforeach
                                                      @endif
                                                      <form class="form-horizontal" role="form" method="POST" action="{{ url('locations/assigment') }}" enctype="multipart/form-data">
                                                     {!! csrf_field() !!}
                                                     <div class="form-group">
                                                        <label>Worker</label>
                                                        <select class="form-control" required name="worker_id">
                                                          <option>Select worker</option>
                                                          @foreach($workers as $worker)
                                                                  <option value="{{$worker->id}}">{{$worker->name}}</option>
                                                          @endforeach

                                                        </select>
                                                     </div>
                                                     <div class="form-group">
                                                        <label>Assign To</label>

                                                        <select class="form-control" required name="location_id">
                                                            <option>Select location</option>
                                                            @foreach($locations as $location)
                                                                    <option value="{{$location->id}}">{{$location->location}}</option>
                                                            @endforeach
                                                        </select>
                                                     </div>



                                                     <div class="form-group">
                                                         <div class="col-md-6 col-md-offset-4">
                                                             <button type="submit" class="btn btn-info">
                                                                 <i class="fa fa-btn fa-ticket"></i> Assign
                                                             </button>
                                                         </div>
                                                     </div>
                                                 </form>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- state end-->
                                </div>
                      </main>

@endsection

@section('scripts')
<script src="{{ asset('capstone/Template/assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('capstone/Template/assets/js/dataTables.bootstrap4.min.js')}}"></script>

<script>
       $(document).ready(function () {
           $('#bs4-table').DataTable();
       });
</script>

@endsection
