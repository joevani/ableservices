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

              @if(Auth::user()->user_type=="management")
                  <a href="{{URL::to('news/create')}}" class="btn btn-info btn-sm pull-right">Create</a>
              @endif
              @if(Auth::user()->user_type=="supervisor")
                  <a href="{{URL::to('news/create')}}" class="btn btn-info btn-sm pull-right">Create</a>
              @endif
            </div>
            <div class="col-12 mb-4">
              <div class="card border-none">
                @include('includes.flash')
                <div class="card-body p-0">
                  @if(count($news) > 0)
                      @foreach($news as $new)
                      <div class="media brdr-b mb-3 pb-3">
                        <div class="course_picture">
                          <a href="{{URL::to('news/')}}/{{$new->id}}"><img class="align-self-center mr-3" width="50" height="50" src="{{asset('capstone/Template/assets/images')}}/{{$new->thumbnail}}" alt=""></a>
                        </div>
                        <div class="media-body">
                          <p class="mb-0">
                            <a href="{{URL::to('news/')}}/{{$new->id}}" class="course_title"> {{$new->subject}}</a>
                          </p>
                          <div class="class_time">
                            Posted : <i class="fa fa-clock -o"></i> {{date('F d, Y h:s A',strtotime($new->created_at))}}
                          </div>
                          <ul class="courses-info">

                            <li class="courses-info__price">
                              <a href="{{URL::to('news/')}}/{{$new->id}}" class="btn btn-success btn-sm" >Read more . .</a>
                            </li>
                            @if(Auth::user()->user_type =='management')
                            <li>

                              <span><a href="{{URL::to('news/delete')}}/{{$new->id}}"> <i class="fa fa-trash fa-2x text-danger"></i></a></span>
                            </li>
                            @endif
                          </ul>
                        </div>
                      </div>
                      @endforeach

                      {{$news->links()}}
                  @else
                       No news being posted
                  @endif
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
