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
                                                      <a class="parent-item" href="index.html">Home</a>
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
                                                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/updates/create') }}">
                                                     {!! csrf_field() !!}

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



                                    

                                                     <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                                         <label for="message" class="col-md-4 control-label">Content</label>

                                                         <div class="col-md-6">
                                                             <textarea rows="10" id="message" class="form-control" name="message"></textarea>

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
