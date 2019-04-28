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
                                                    Locations
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
                                                                  <a href="{{URL::to('setup/locations/create')}}" class="btn btn-success btn-sm pull-right" >Add Location</a>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                             @include('includes.flash')
                                                             @if ($locations->isEmpty())
                                                          <p>There are currently no locations.</p>
                                                            @else
                                                              <table id="bs4-table" class="table table-bordered table-striped">
                                                                <thead>
                                                                  <tr>
                                                                    <th>Company</th>
                                                                    <th>Address</th>

                                                                    <th>Actions</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>

                                                              @foreach ($locations as $loc)
                                                                    <tr>
                                                                        <td>{{$loc->company}}</td>
                                                                        <td>{{$loc->location}}</td>
                                                                        <td><a href="{{URL::to('setup/locations/')}}/{{$loc->id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> EDIT</a></td>
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
