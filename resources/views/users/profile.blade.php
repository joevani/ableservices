@extends('layouts.app')

@section('styles')

<link href="{{ asset('capstone/Template/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{ asset('capstone/Template/assets/css/style.css')}}" rel="stylesheet">
<link href="{{ asset('capstone/Template/assets/css/responsive.css')}}" rel="stylesheet">

@endsection

@section('content')
<!--main contents start-->
  <main class="content_wrapper">
    <!--page title start-->
    <div class="page-heading">
      <div class="container-fluid">
        <div class="row d-flex align-items-center">
          <div class="col-12">
            <div class="page-breadcrumb">
              <h1>Profile</h1>
            </div>
          </div>
          <div class="col-12  d-md-flex">
            <div class="breadcrumb_nav">
              <ol class="breadcrumb">
                <li>
                  <i class="fa fa-home"></i>
                  <a class="parent-item" href="index.html">Home</a>
                  <i class="fa fa-angle-right"></i>
                </li>
                <li class="active">
                  Profile
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--page title end-->
    <div class="container-fluid">
      <!-- state start-->
      <div class="row">
        <div class="col-12">
          <div class="panel profile-cover">
            <div class="profile-cover__img">
                <img src="{{ asset('capstone/Template/assets/images/')}}/{{Auth::user()->user_pic}}" class="img-circle mCS_img_loaded" alt="User Image">
              <h3 class="h3">{{Auth::user()->name}}</h3>
            </div>
            <div class="profile-cover__action bg--img" data-overlay="0.3"></div>
            <!-- <div class="profile-cover__info">
              <ul class="nav">
                <li>
                  <strong>26</strong>Projects
                </li>
                <li>
                  <strong>33</strong>Followers
                </li>
                <li>
                  <strong>136</strong>Following
                </li>
              </ul>
            </div> -->
          </div>
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Personal Info</h3>
            </div>
            <div class="panel-content panel-activity">
              @include('includes.flash')
                @if ( $errors->any() )
                         @foreach ($errors->all() as $error)
                          <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                @endif
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('profile/updatephoto') }}" enctype="multipart/form-data">
                       {!! csrf_field() !!}
                         <input type="hidden" name="id" value="{{Auth::user()->id}}">
                 <div class="form-group">
                     <label>Update Photo</label>
                       <input type="file" name="photo">
                 </div>
                 <div class="form-group">
                     <div class="col-md-6 col-md-offset-4">
                         <button type="submit" class="btn btn-info">
                             <i class="fa fa-btn fa-ticket"></i> upload
                         </button>
                     </div>
                 </div>
               </form>
                 <hr>
                @if(Auth::user()->user_type !='client')
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/setup/users/update') }}" enctype="multipart/form-data">

                @endif
                @if(Auth::user()->user_type =='client')
                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/setup/clients/update') }}" enctype="multipart/form-data">
                @endif
               {!! csrf_field() !!}
                  <input type="hidden" name="id" value="{{Auth::user()->id}}">
               <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="{{Auth::user()->username}}">
               </div>
               <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
               </div>
               <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
               </div>
               <div class="form-group">
                    <label>Birthday</label>
                    <input type="date" class="form-control" name="dob" value="{{Auth::user()->dob}}">
               </div>
               <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}">
               </div>
              @if(Auth::user()->user_type =='client')
              <div class="form-group">
                   <label>Company</label>
                   <input type="text" class="form-control" name="address" value="{{Auth::user()->company}}">
              </div>
              @endif
               <div class="form-group">
                   <div class="col-md-6 col-md-offset-4">
                       <button type="submit" class="btn btn-info">
                           <i class="fa fa-btn fa-ticket"></i> Update
                       </button>
                   </div>
               </div>
           </form>
           <hr>
           <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/updatepassword') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                  <input type="hidden" name="id" value="{{Auth::user()->id}}">
          <div class="form-group">

              <label>Update Password</label>
                <input type="password" class="form-control" name="password">
          </div>
          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-info">
                      <i class="fa fa-btn fa-ticket"></i> update
                  </button>
              </div>
          </div>
        </form>
          <hr>
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
