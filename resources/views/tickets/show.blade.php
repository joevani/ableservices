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
                                                     #{{ $ticket->ticket_id }} - {{ $ticket->title }}
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
              <p>{{ $ticket->message }}</p>
              <p>Categry: {{ $category->name }}</p>
              <p>
              @if ($ticket->status === 'Open')
              Status: <span class="label label-success">{{ $ticket->status }}</span>
            @else
              Status: <span class="label label-danger">{{ $ticket->status }}</span>
            @endif
              </p>
              <p>Created on: {{ $ticket->created_at->diffForHumans() }}</p>
            </div>

            <hr>

            <div class="comments">
              @foreach ($comments as $comment)
                <div class="panel panel-@if($ticket->user->id === $comment->user_id){{"default"}}@else{{"success"}}@endif">
                  <div class="panel panel-heading">
                      {{ $comment->user->username }}  <br> - <i>({{DB::table('users')->where('id',$comment->user_id)->first(['user_type'])->user_type}})</i>
                    <span class="pull-right">{{ $comment->created_at->format('F d , Y h:s A') }}</span>
                  </div>
                  <div class="panel panel-body">
                    {{ $comment->comment }}
                  </div>
                </div>
              @endforeach
            </div>
            <div class="comment-form">

              @if($ticket->status !='Solved')
              <form action="{{ url('comment') }}" method="POST" class="form">
                {!! csrf_field() !!}

                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                          <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

                              @if ($errors->has('comment'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('comment') }}</strong>
                                  </span>
                              @endif
                        </div>

                        <div class="form-group">
                              <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
              </form>

              @endif
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
