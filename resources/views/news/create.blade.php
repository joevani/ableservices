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
                                                      <a class="parent-item" href="">Home</a>
                                                      <i class="fa fa-angle-right"></i>
                                                  </li>
                                                  <li class="active">
                                                    Create Updates
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
                                                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/news/create') }}" enctype="multipart/form-data">
                                                     {!! csrf_field() !!}
                                                     <div class="form-group">
                                                      <label>Select Thumbnail</label>
                                                      <input type="file" name="thumbail" class="form-control">
                                                  </div>
                                                     <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                                         <label for="title" class="col-md-4 control-label">Title</label>
                                                         <div class="col-md-6">
                                                             <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                                                             @if ($errors->has('title'))
                                                                 <span class="help-block">
                                                                     <strong>{{ $errors->first('title') }}</strong>
                                                                 </span>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="form-group">
                                                           <label>Visible to :</label> <br>
                                                           <label class="checkbox-inline">
                                                            <input type="checkbox" name="supervisor" value="1">Supervisor
                                                          </label>
                                                          <label class="checkbox-inline">
                                                            <input type="checkbox" name="teamlead" value="1">Team Lead
                                                          </label>
                                                          <label class="checkbox-inline">
                                                            <input type="checkbox" name="worker" value="1"> Worker
                                                          </label>
                                                          <label class="checkbox-inline">
                                                            <input type="checkbox" name="client" value="1">Client
                                                          </label>
                                                     </div>
                                                     <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                                         <label for="message" class="col-md-4 control-label">Content</label>

                                                         <div class="col-md-6">
                                                             <textarea rows="10" id="message" class="form-control" name="content"></textarea>

                                                             @if ($errors->has('message'))
                                                                 <span class="help-block">
                                                                     <strong>{{ $errors->first('message') }}</strong>
                                                                 </span>
                                                             @endif
                                                         </div>
                                                     </div>

                                                     <div class="form-group">
                                                         <div class="col-md-6 col-md-offset-4">
                                                             <button type="submit" class="btn btn-info">
                                                                 <i class="fa fa-btn fa-ticket"></i> Submit
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
