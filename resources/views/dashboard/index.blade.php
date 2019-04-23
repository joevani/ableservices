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

        <div class="row">
          <div class="col-12 mb-3">
            <div class="heading_view">
              <h2>Quick Access</h2>
            </div>
          </div>
<div class="col-12 d-flex flex-wrap plr">
            <div class="fl-col">
            <div class="course_box">
              <a href="course-list.html">
                <div class="icon_relative">
                  <i class="la la-users" aria-hidden="true"></i>
                  <span>Users</span>
                </div>

              </a>
            </div>
          </div>

          <div class="fl-col">
            <div class="course_box">
              <a href="course-list.html">
                <div class="icon_relative">
                  <i class="la la-list" aria-hidden="true"></i>
                  <span>Supervisor Assignment</span>
                </div>

              </a>
            </div>
          </div>

          <div class="fl-col">
            <div class="course_box">
              <a href="course-list.html">
                <div class="icon_relative">
                  <i class="la la-flask" aria-hidden="true"></i>
                  <span>Team Lead Assignment</span>
                </div>

              </a>
            </div>
          </div>


          <div class="fl-col">
            <div class="course_box">
              <a href="course-list.html">
                <div class="icon_relative">
                  <i class="la la-desktop" aria-hidden="true"></i>
                  <span>KDKS</span>
                </div>

              </a>
            </div>
          </div>







          </div>



        </div>


        <div class="row">
          <div class="col-12 mb-3 mt-30">
            <div class="heading_view">
              <h2>popular course</h2>
            </div>
          </div>

        </div>


        </div>

        <div class="mb-4">

              <div class="popular_couse owl-carousel">

            <div class="items_test">
              <a href="courses-details.html">
                <div class="say_client">
                  <img src="{{ asset('assets/images/course_de1.jpg')}}" alt="" />
                  <span class="price_top bg_red">$ 48</span>
                </div>
                <div class="saying_box">
                  <h3>Development</h3>
                </div>
                </a>
            </div>

            <div class="items_test">
              <a href="courses-details.html">
                <div class="say_client">
                  <img src="{{ asset('capstone/Template/assets/images/course_de2.jpg')}}" alt="" />
                  <span class="price_top bg_red">$ 32</span>
                </div>
                <div class="saying_box">
                  <h3>Web Design</h3>
                </div>
                </a>
            </div>

            <div class="items_test">
              <a href="courses-details.html">
                <div class="say_client">
                  <img src="{{ asset('capstone/Template/assets/images/course_de3.jpg')}}" alt="" />
                  <span class="price_top bg_green">Free</span>
                </div>
                <div class="saying_box">
                  <h3>SEO</h3>
                </div>
                </a>
            </div>

            <div class="items_test">
              <a href="courses-details.html">
                <div class="say_client">
                  <img src="{{ asset('capstone/Template/assets/images/course_de4.jpg')}}" alt="" />
                  <span class="price_top bg_red">$ 72</span>
                </div>
                <div class="saying_box">
                  <h3>Marketing</h3>
                </div>
                </a>
            </div>


            <div class="items_test">
              <a href="courses-details.html">
                <div class="say_client">
                  <img src="{{ asset('capstone/Template/assets/images/course_de5.jpg')}}" alt="" />
                  <span class="price_top bg_green">Free</span>
                </div>
                <div class="saying_box">
                  <h3>Branding</h3>
                </div>
                </a>
            </div>

            <div class="items_test">
              <a href="courses-details.html">
                <div class="say_client">
                  <img src="{{ asset('capstone/Template/assets/images/course_de6.jpg')}}" alt="" />
                  <span class="price_top bg_red">$ 64</span>
                </div>
                <div class="saying_box">
                  <h3>Digital marketing</h3>
                </div>
                </a>
            </div>


          </div>

            </div>

      </div>

@endsection
