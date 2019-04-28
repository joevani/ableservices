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
                                                     #{{ $message->id }} - {{ $message->message }}
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


            <div class="ticket-info">

              <p>{{ $message->message}}</p>
              </p>
              <p>Created on: </p>
            </div>
            <hr>
            <div class="comments">
              @foreach ($replys as $comment)
                <div class="panel">
                  <div class="panel panel-heading">
                    {{DB::table('users')->where('id',$comment->user_id)->first(['name'])->name}} <br> - <i>({{DB::table('users')->where('id',$comment->user_id)->first(['user_type'])->user_type}})</i>
                    <span class="pull-right">{{ date('F d, Y h:s A',strtotime(DB::table('chat')->where('id',$message->id)->first(['created_at'])->created_at)) }}</span>
                  </div>
                  <div class="panel panel-body">
                    {{ $comment->comment }}
                  </div>
                </div>
              @endforeach
            </div>
            <div class="comment-form">


              <form action="{{ url('messages/reply') }}" method="POST" class="form">
                {!! csrf_field() !!}

                <input type="hidden" name="ticket_id" value="{{ $message->id }}">

                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                          <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

                              @if ($errors->has('comment'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('comment') }}</strong>
                                  </span>
                              @endif
                        </div>
                        <div class="form-group">
                              <button type="submit" class="btn btn-primary">reply</button>
                        </div>
              </form>

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
