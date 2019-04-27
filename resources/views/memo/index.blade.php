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
                                                      Memo
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
                                                              @if (count($memo) == 0)
                                                          <p>There are currently no issues.</p>
                                                            @else
                                                              <table id="bs4-table" class="table table-bordered table-striped">
                                                                <thead>
                                                                  <tr>
                                                                    <th>Subject</th>
                                                                    <th>Date </th>
                                                                    <th>Action</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                              @foreach ($memo as $memo)
                                                                      <tr>
                                                                        <td>{{$memo->subject}}</td>
                                                                        <td>{{date('F d, Y',strtotime($memo->created_at))}}</td>
                                                                        <td><a href="" class="btn btn-info"><i class="fa fa-download"></i></a></td>
                                                                      </tr>
                                                                @endforeach
                                                                </tbody>
                                                              </table>

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
