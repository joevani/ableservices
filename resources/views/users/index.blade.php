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
                                                    Employees
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

                                                                      <a href="/setup/users/create" class="btn btn-success pull-right">Add User</a>
                                                                </div>

                                                            </div>
                                                            <div class="card-body">
                                                                <div id="msg"></div>
                                                                <div class="table-responsive">
                                                              <table id="bs4-table" class="table table-bordered table-striped">
                                                                  <thead>
                                                                    <tr>
                                                                      <th>Profile Pic</th>
                                                                      <th>Username</th>
                                                                      <th>Email</th>
                                                                      <th>Name</th>
                                                                      <th>User Type</th>
                                                                      <th>Assigned To</th>
                                                                      <th>Action</th>
                                                                    </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                  @foreach ($users as $user)
                                                                <tr>
                                                                    <td><img src="{{ asset('capstone/Template/assets/images/')}}/{{$user->user_pic}}" class="img-circle mCS_img_loaded" alt="User Image"></td>
                                                                    <td>{{$user->username}}</td>
                                                                    <td>{{$user->email}}</td>
                                                                    <td>{{$user->name}}</td>
                                                                    <td>{{$user->user_type}}</td>
                                                                    <td>
                                                                        <?php
                                                                            $count =DB::table('location_assigment')->where('user_id',$user->id)->count('id');

                                                                        ?>
                                                                        @if($count > 0 )
                                                                            <?php $assigned= DB::table('location_assigment')->where('location_assigment.user_id',$user->id)
                                                                              ->join('locations','location_assigment.location_id','=','locations.id')->select('locations.*')->first(['company','location']);
                                                                              ?>
                                                                              {{$assigned->company}} -  {{$assigned->location}}

                                                                            @else
                                                                                N/A
                                                                        @endif
                                                                    </td>
                                                                    <td><a href="{{URL::to('setup/employee')}}/{{$user->id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                                      <a href="{{URL::to('setup/employee/show')}}/{{$user->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                                    </td>
                                                                </tr>
                                                                  @endforeach
                                                                  </tbody>
                                                                </table>

                                                              </div>

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
