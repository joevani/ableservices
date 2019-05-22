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
                                                    Add Employee
                                                  </li>
                                              </ol>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                </div
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
                                                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/setup/users/create') }}" enctype="multipart/form-data">
                                                     {!! csrf_field() !!}
                                                     <div class="input-group">
                                                        <div class="input-group-prepend">
                                                          <span class="input-group-text" id="inputGroupFileAddon01">Profile Pic</span>
                                                        </div>
                                                        <div class="custom-file">
                                                          <input type="file" class="custom-file-input" name="photo" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                        </div>
                                                      </div>
                                                      <hr>
                                                     <div class="form-group">
                                                          <label>Username</label>
                                                          <input type="text" class="form-control" name="username">
                                                     </div>
                                                     <div class="form-group">
                                                          <label>Fullname</label>
                                                          <input type="text" class="form-control" name="name">
                                                     </div>
                                                     <div class="form-group">
                                                          <label>Email</label>
                                                          <input type="email" class="form-control" name="email">
                                                     </div>
                                                     <div class="form-group">
                                                          <label>Birthday</label>
                                                          <input type="date" class="form-control" name="dob">
                                                     </div>
                                                     <div class="form-group">
                                                          <label>Address</label>
                                                          <input type="text" class="form-control" name="address">
                                                     </div>
                                                     <div class="form-group">
                                                       <label for="message-text" class="col-form-label">User Type :</label>
                                                       <select class="form-control" name="user_type" >
                                                         <option value="management">Management Staff</option>
                                                         <option value="supervisor">Supervisor</option>
                                                         <option value="team lead">Team Lead</option>
                                                         <option value="worker">Worker</option>
                                                       </select>
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
