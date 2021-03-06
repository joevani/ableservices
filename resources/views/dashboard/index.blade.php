@extends('layouts.app')


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


      @if(Auth::user()->user_type=='management')
        <div class="row">
          <div class="col-12 mb-3">
            <div class="heading_view">
              <h2>Quick Access</h2>
            </div>
          </div>
         <div class="col-12 d-flex flex-wrap plr">
            <div class="fl-col">
            <div class="course_box">
              <a href="{{URL::to('setup/users')}}">
                <div class="icon_relative">
                  <i class="la la-users" aria-hidden="true"></i>
                  <span>Users</span>
                </div>

              </a>
            </div>
          </div>
          <div class="fl-col">
            <div class="course_box">
              <a href="{{URL::to('memo')}}">
                <div class="icon_relative">
                  <i class="la la-desktop" aria-hidden="true"></i>
                  <span>Memos</span>
                </div>
              </a>
            </div>
          </div>
          <div class="fl-col">
            <div class="course_box">
              <a href="{{URL::to('setup/supervisors')}}">
                <div class="icon_relative">
                  <i class="la la-list" aria-hidden="true"></i>
                  <span>Supervisor Assignment</span>
                </div>
              </a>
            </div>
          </div>
          <div class="fl-col">
            <div class="course_box">
              <a href="{{URL::to('setup/teamleaders')}}">
                <div class="icon_relative">
                  <i class="la la-flask" aria-hidden="true"></i>
                  <span>Team Lead Assignment</span>
                </div>
              </a>
            </div>
          </div>

          </div>



        </div>


        @endif


              @if(Auth::user()->user_type=='team lead')
                <div class="row">
                  <div class="col-12 mb-3">
                    <div class="heading_view">
                      <h2>Quick Access</h2>
                    </div>
                  </div>
                 <div class="col-12 d-flex flex-wrap plr">
                    <div class="fl-col">
                    <div class="course_box">
                      <a href="{{URL::to('workers')}}">
                        <div class="icon_relative">
                          <i class="la la-users" aria-hidden="true"></i>
                          <span>Workers</span>
                        </div>

                      </a>
                    </div>
                  </div>
                  <div class="fl-col">
                    <div class="course_box">
                      <a href="{{URL::to('memo')}}">
                        <div class="icon_relative">
                          <i class="la la-desktop" aria-hidden="true"></i>
                          <span>Memos</span>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="fl-col">
                    <div class="course_box">
                      <a href="{{URL::to('messages/inbox')}}">
                        <div class="icon_relative">
                          <i class="fa fa-comment-o" aria-hidden="true"></i>
                          <span>Messages</span>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="fl-col">
                    <div class="course_box">
                      <a href="{{URL::to('profile')}}">
                        <div class="icon_relative">
                          <i class="fa fa-user" aria-hidden="true"></i>
                          <span>Profile</span>
                        </div>
                      </a>
                    </div>
                  </div>

                  </div>



                </div>

            @endif



                          @if(Auth::user()->user_type=='supervisor')
                            <div class="row">
                              <div class="col-12 mb-3">
                                <div class="heading_view">
                                  <h2>Quick Access</h2>
                                </div>
                              </div>
                             <div class="col-12 d-flex flex-wrap plr">
                                <div class="fl-col">
                                <div class="course_box">
                                  <a href="{{URL::to('news')}}">
                                    <div class="icon_relative">
                                      <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                      <span>News</span>
                                    </div>

                                  </a>
                                </div>
                              </div>
                              <div class="fl-col">
                                <div class="course_box">
                                  <a href="{{URL::to('memo')}}">
                                    <div class="icon_relative">
                                      <i class="la la-desktop" aria-hidden="true"></i>
                                      <span>Memos</span>
                                    </div>
                                  </a>
                                </div>
                              </div>
                              <div class="fl-col">
                                <div class="course_box">
                                  <a href="{{URL::to('messages/inbox')}}">
                                    <div class="icon_relative">
                                      <i class="fa fa-comment-o" aria-hidden="true"></i>
                                      <span>Messages</span>
                                    </div>
                                  </a>
                                </div>
                              </div>
                              <div class="fl-col">
                                <div class="course_box">
                                  <a href="{{URL::to('profile')}}">
                                    <div class="icon_relative">
                                      <i class="fa fa-user" aria-hidden="true"></i>
                                      <span>Profile</span>
                                    </div>
                                  </a>
                                </div>
                              </div>

                              </div>

                            </div>

                        @endif


                                      @if(Auth::user()->user_type=='worker')
                                        <div class="row">
                                          <div class="col-12 mb-3">
                                            <div class="heading_view">
                                              <h2>Quick Access</h2>
                                            </div>
                                          </div>
                                         <div class="col-12 d-flex flex-wrap plr">
                                            <div class="fl-col">
                                            <div class="course_box">
                                              <a href="{{URL::to('news')}}">
                                                <div class="icon_relative">
                                                  <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                                  <span>News</span>
                                                </div>

                                              </a>
                                            </div>
                                          </div>
                                          <div class="fl-col">
                                            <div class="course_box">
                                              <a href="{{URL::to('memo')}}">
                                                <div class="icon_relative">
                                                  <i class="la la-desktop" aria-hidden="true"></i>
                                                  <span>Memos</span>
                                                </div>
                                              </a>
                                            </div>
                                          </div>
                                          <div class="fl-col">
                                            <div class="course_box">
                                              <a href="{{URL::to('messages/inbox')}}">
                                                <div class="icon_relative">
                                                  <i class="fa fa-comment-o" aria-hidden="true"></i>
                                                  <span>Messages</span>
                                                </div>
                                              </a>
                                            </div>
                                          </div>
                                          <div class="fl-col">
                                            <div class="course_box">
                                              <a href="{{URL::to('profile')}}">
                                                <div class="icon_relative">
                                                  <i class="fa fa-user" aria-hidden="true"></i>
                                                  <span>Profile</span>
                                                </div>
                                              </a>
                                            </div>
                                          </div>

                                          </div>


                                        </div>

                                    @endif
        @if(Auth::user()->user_type=='client')
          <div class="row">
            <div class="col-12 mb-3">
              <div class="heading_view">
                <h2>Quick Access</h2>
              </div>
            </div>
           <div class="col-12 d-flex flex-wrap plr">
              <div class="fl-col">
              <div class="course_box">
                <a href="{{URL::to('news')}}">
                  <div class="icon_relative">
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                    <span>News</span>
                  </div>

                </a>
              </div>
            </div>
            <div class="fl-col">
              <div class="course_box">
                <a href="{{URL::to('feedbacks/create')}}">
                  <div class="icon_relative">
                    <i class="la la-desktop" aria-hidden="true"></i>
                    <span>Submit Feedback</span>
                  </div>
                </a>
              </div>
            </div>

            <div class="fl-col">
              <div class="course_box">
                <a href="{{URL::to('messages/inbox')}}">
                  <div class="icon_relative">
                    <i class="la la-list" aria-hidden="true"></i>
                    <span>Messages</span>
                  </div>
                </a>
              </div>
            </div>

            <div class="fl-col">
              <div class="course_box">
                <a href="{{URL::to('profile')}}">
                  <div class="icon_relative">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Profile</span>
                  </div>
                </a>
              </div>
            </div>


            </div>

          </div>

          @endif


        <div class="row">
          <div class="col-12 mb-3 mt-30">
            <div class="heading_view">
              <h2>Latest News/Updates</h2>
            </div>
          </div>

        </div>


        </div>

        <div class="mb-4">

              <div class="popular_couse owl-carousel">
                @if(count($news) > 0)
                    @foreach($news as $new)
            <div class="items_test">
              <a href="{{URL::to('news')}}/{{$new->id}}">
                <div class="say_client">
                  <img src="{{asset('capstone/Template/assets/images')}}/{{$new->thumbnail}}" style="width:100px;height:100px;" alt="" />

                </div>
                <div class="saying_box">
                  <h3>{{$new->subject}}</h3>
                </div>
                </a>
            </div>

            @endforeach
              {{$news->links()}}
              @else
                No news being posted
            @endif


          </div>

            </div>

      </div>

@endsection
