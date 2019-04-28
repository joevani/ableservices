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
                                                    Send Message
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
                                                      <form class="form-horizontal" role="form" method="POST" action="{{ url('messages/create') }}">
                                                     {!! csrf_field() !!}

                                                     <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                                         <label for="title" class=" control-label">Reciever</label>
                                                            <select class="form-control" name="to_user">
                                                                <option value="">Select Reciever</option>
                                                                  @foreach($users as $user)
                                                                    @if(Auth::user()->user_type=='management')
                                                                        @if($user->user_type =='supervisor' || $user->user_type =='client')
                                                                          <option value="{{$user->id}}">{{$user->name}}</option>
                                                                        @endif
                                                                    @endif
                                                                        <?php

                                                                          $supervisormembers = DB::table('supervisor_members')
                                                                                        ->where('supervisor_userid',Auth::user()->id)
                                                                                        ->where('teamlead_userid',$user->id)
                                                                                        ->count('id');
                                                                          $supervisormembersteam = DB::table('supervisor_members')
                                                                                                      ->where('supervisor_userid',$user->id)
                                                                                                      ->where('teamlead_userid',Auth::user()->id)
                                                                                                      ->count('id');

                                                                          $membersteam = DB::table('team_lead_members')
                                                                                                   ->where('teamlead_userid',Auth::user()->id)
                                                                                                    ->where('worker_userid',$user->id)
                                                                                                    ->count('id');

                                                                            $workerteamleaders = DB::table('team_lead_members')
                                                                                                          ->where('teamlead_userid',$user->id)
                                                                                                          ->where('worker_userid',Auth::user()->id)
                                                                                                          ->count('id');
                                                                        ?>
                                                                      @if(Auth::user()->user_type=='supervisor')
                                                                            @if($user->user_type =='management')
                                                                              <option value="{{$user->id}}">{{$user->name}}</option>
                                                                            @endif
                                                                            @if($supervisormembers > 0)
                                                                                  <option value="{{$user->id}}">{{$user->name}}</option>
                                                                            @endif
                                                                      @endif

                                                                      @if(Auth::user()->user_type=='team lead')
                                                                            @if($user->user_type =='management')
                                                                              <option value="{{$user->id}}">{{$user->name}}</option>
                                                                            @endif
                                                                            @if($supervisormembersteam > 0)
                                                                                  <option value="{{$user->id}}">{{$user->name}}</option>
                                                                            @endif
                                                                            @if($membersteam > 0)
                                                                                  <option value="{{$user->id}}">{{$user->name}}</option>
                                                                            @endif

                                                                      @endif
                                                                      @if(Auth::user()->user_type=='client')
                                                                            @if($user->user_type =='management')
                                                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                                            @endif


                                                                      @endif
                                                                      @if(Auth::user()->user_type=='worler')
                                                                            @if($$workerteamleaders > 0 )
                                                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                                            @endif


                                                                      @endif
                                                                  @endforeach
                                                            </select>
                                                        </div>

                                                     <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                                         <label for="message" class=" control-label">Message</label>


                                                             <textarea rows="10" id="message" class="form-control" name="message"></textarea>

                                                             @if ($errors->has('message'))
                                                                 <span class="help-block">
                                                                     <strong>{{ $errors->first('message') }}</strong>
                                                                 </span>
                                                             @endif

                                                     </div>

                                                     <div class="form-group">
                                                         <div class="col-md-6 col-md-offset-4">
                                                             <button type="submit" class="btn btn-info">
                                                                 <i class="fa fa-btn fa-send"></i> Send
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
