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
                                                      Sent
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
                                                                <div id="msg"></div>


                                                              <table id="bs4-table" class="table table-bordered table-striped">
                                                                  <thead>
                                                                    <tr>

                                                                      <th>From</th>
                                                                      <th>Message</th>
                                                                      <th>Date</th>
                                                                      <th></th>
                                                                    </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                  @foreach ($messages as $inbox)
                                                                    <tr>
                                                                        <td>{{DB::table('users')->where('id',$inbox->from_user)->first(['name'])->name}}</td>
                                                                        <td>{{$inbox->message}}</td>
                                                                        <td>{{date('F d, Y h:s A',strtotime($inbox->created_at))}}</td>
                                                                        <td><a href="{{URL::to('messages/reply')}}/{{$inbox->id}}" class="btn btn-info btn-sm"><i class="fa fa-reply"></i> Reply</a></td>
                                                                    </tr>

                                                                  @endforeach
                                                                  </tbody>
                                                                </table>



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
