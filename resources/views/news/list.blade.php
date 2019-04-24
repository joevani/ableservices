@extends('layouts.app')

@section('styles')

<link href="{{ asset('capstone/Template/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{ asset('capstone/Template/assets/css/style.css')}}" rel="stylesheet">
<link href="{{ asset('capstone/Template/assets/css/responsive.css')}}" rel="stylesheet">

@endsection

@section('content')
<div class="d-flex align-items-center">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="search_box">

                </div>
              </div>
            </div>
          </div>
        </div>
<div class="course_listhome mt-30">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 mb-3">
              <div class="heading_view">
                <h2>News & Updates</h2>
              </div>
              <a href="{{URL::to('news/create')}}" class="btn btn-info btn-sm pull-right">Create</a>
            </div>
            <div class="col-12 mb-4">
              <div class="card border-none">

                <div class="card-body p-0">

                  <div class="media brdr-b mb-3 pb-3">
                    <div class="course_picture">
                      <a href="courses-details.html"><img class="align-self-center mr-3" src="{{asset('capstone/Template/assets/images/course_list1.jpg')}}" alt=""></a>
                    </div>
                    <div class="media-body">
                      <p class="mb-0">
                        <a href="courses-details.html" class="course_title"> Philosopphy</a>
                      </p>
                      <div class="class_time">
                        Classes <i class="fa fa-clock-o"></i> 10 am - 11 am
                      </div>
                      <ul class="courses-info">

                        <li class="courses-info__price">
                          <a href="" class="btn btn-success btn-sm" >Read more . .</a>
                        </li>
                        <li>
                          <!-- <span><i class="fa fa-users txt-warning"></i> 200</span>
                          <span class="heart_icon"> <i class="fa fa-heart-o"></i></span> -->
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>

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
