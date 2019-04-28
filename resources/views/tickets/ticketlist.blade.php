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
                                                      Issues/Concerned
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
                                                                @if ($tickets->isEmpty())
                                                          <p>There are currently no issues.</p>
                                                            @else
                                                              <table id="bs4-table" class="table table-bordered table-striped">
                                                                <thead>
                                                                  <tr>
                                                                    <th>Category</th>
                                                                    <th>Title</th>
                                                                    <th>Status</th>
                                                                    <th>Resolved By</th>
                                                                    <th>Last Updated</th>

                                                                    <th>Actions</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                              @foreach ($tickets as $ticket)
                                                                <tr>
                                                                    <td>
                                                                    @foreach ($categories as $category)
                                                                      @if ($category->id === $ticket->category_id)
                                                                    {{ $category->name }}
                                                                      @endif
                                                                    @endforeach
                                                                    </td>
                                                                    <td>
                                                                      <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                                                        #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                                                      </a>
                                                                    </td>
                                                                    <td>
                                                                    @if ($ticket->status === 'Open')
                                                                      <span class="label label-success">{{ $ticket->status }}</span>
                                                                    @else
                                                                      <span class="label label-danger">{{ $ticket->status }}</span>
                                                                    @endif
                                                                    </td>
                                                                    <td>
                                                                      @if ($ticket->status === 'Open')
                                                                         PENDING
                                                                        @endif
                                                                      @if($ticket->status === 'Solved')
                                                                        {{DB::table('users')->where('id',$ticket->resolved_by)->first(['name'])->name}}
                                                                      @endif
                                                                    </td>
                                                                    <td>{{ $ticket->updated_at }}</td>

                                                                    <td>
                                                                    @if(Auth::user()->user_type=='team lead')
                                                                          @if($ticket->is_escalated_to_supervisor == 0)
                                                                                <a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-primary btn-sm">Comment</a>
                                                                                @if(Auth::user()->user_type=='team lead')
                                                                                <form action="{{ url('close_ticket/' . $ticket->ticket_id) }}" method="POST">
                                                                                  {!! csrf_field() !!}
                                                                                  <button type="submit" class="btn btn-danger btn-sm">Solve</button>
                                                                                </form>
                                                                                <form action="{{ url('escalate_ticket/' . $ticket->ticket_id) }}" method="POST">
                                                                                  {!! csrf_field() !!}
                                                                                  <button type="submit" class="btn btn-error btn-sm">Escalate</button>
                                                                                </form>
                                                                                @endif
                                                                              @endif
                                                                      @endif
                                                                      @if(Auth::user()->user_type=='supervisor')
                                                                          @if($ticket->is_escalated_to_supervisor == 1)
                                                                          <a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-primary btn-sm">Comment</a>
                                                                          @if(Auth::user()->user_type=='supervisor')
                                                                          <form action="{{ url('close_ticket/' . $ticket->ticket_id) }}" method="POST">
                                                                            {!! csrf_field() !!}
                                                                            <button type="submit" class="btn btn-danger btn-sm">Solve</button>
                                                                          </form>
                                                                          <form action="{{ url('escalate_ticket_admin/' . $ticket->ticket_id) }}" method="POST">
                                                                            {!! csrf_field() !!}
                                                                            <button type="submit" class="btn btn-error btn-sm">Escalate to management</button>
                                                                          </form>
                                                                          @endif
                                                                        @endif
                                                                      @endif
                                                                      @if(Auth::user()->user_type=='management')
                                                                            @if($ticket->is_escalated_to_management == 1)
                                                                            <a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-primary btn-sm">Comment</a>
                                                                                @if(Auth::user()->user_type=='management')
                                                                                <form action="{{ url('close_ticket/' . $ticket->ticket_id) }}" method="POST">
                                                                                  {!! csrf_field() !!}
                                                                                  <button type="submit" class="btn btn-danger btn-sm">Solve</button>
                                                                                </form>

                                                                                @endif
                                                                          @endif
                                                                      @endif
                                                                    </td>
                                                                  </tr>
                                                                @endforeach
                                                                </tbody>
                                                              </table>
                                                            {{ $tickets->render() }}
                                                            @endif
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
