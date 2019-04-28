@extends('layouts.app')

@section('styles')


@endsection

@section('content')

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
                                                Users
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
          </div>



@endsection



@section('scripts')



@endsection
