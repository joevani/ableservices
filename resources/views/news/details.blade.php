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
        <div class="content_wrapper">
					<div class="course__details_block">
				<div class=" mb-4"></div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="course__text_details mb-4">
                  <img class="" src="{{asset('capstone/Template/assets/images')}}/{{$details->thumbnail}}" alt="">
                  <br>
            			<h1 class="mb-2">{{$details->subject}}</h1>
                    			<p>{{$details->content}}</p>
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
