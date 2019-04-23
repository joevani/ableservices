<div class="side_bar dark_blue side_bg_img scroll_auto">
				<div class="user-panel">
						<div class="user_image">
							<img src="{{ asset('capstone/Template/assets/images/about-1.jpg')}}" class="img-circle mCS_img_loaded" alt="User Image">
						</div>
						<div class="info">
							<p>
							{{Auth::user()->name}}
							</p>
							<a href="#"> <i class="fa fa-circle text-success"></i> 	{{ strtoupper(Auth::user()->user_type)}}</a>
						</div>
					</div>
				 <ul id="dc_accordion" class="sidebar-menu tree">
					<li class="menu_sub">
						<a href="{{ URL::to('dashboard')}}"> <i class="fa fa-home"></i> <span>Dashboard</span></a>
					</li>

					@if(Auth::user()->user_type=='management')
          <li class="menu_sub">
            <a href="#"> <i class="fa fa-file text-aqua"></i> <span>Setup</span> <span class="icon-arrow-down styleicon"></span> </a>
            <ul class="down_menu">
              <li>
                <a href="{{URL::to('setup/users')}}">Users</a>
              </li>
              <!-- <li>
                <a href="{{URL::to('setup/categories')}}">Issue Categories</a>
              </li> -->
              <li>
                <a href="{{URL::to('setup/supervisors')}}">Supervisor Assignment</a>
              </li>
              <li>
                <a href="{{URL::to('setup/teamleaders')}}">Team Lead Assignment</a>
              </li>
              <!-- <li>
                <a href="{{URL::to('setup/clients')}}">Clients</a>
              </li> -->
            </ul>
          </li>
					@endif
          <li class="menu_sub">
            <a href="{{ URL::to('upadtes')}}"> <i class="fa fa-bullhorn"></i> <span>News/Updates</span></a>
          </li>
					@if(Auth::user()->user_type !="client")
          <li class="menu_sub">
							@if(Auth::user()->user_type=='worker')
            	<a href="{{ URL::to('issues')}}"> <i class="fa fa-ticket"></i> <span>Issues/Concerns</span></a>
							@endif
							@if(Auth::user()->user_type !='worker')
									<a href="{{ URL::to('issues/list')}}"> <i class="fa fa-ticket"></i> <span>Issues/Concerns</span></a>
							@endif
          </li>

					@endif


					<li class="menu_sub">
						<a href="#"> <i class="fa fa-table"></i> <span>Memos </span> <span class="badge badge-pill badge-danger float-right">2</span> </a>
						<ul class="down_menu">
								@if(Auth::user()->user_type=='management')
							<li>
								<a href="{{URL::to('memos/create')}}">Create Memo</a>
							</li>
							@endif
							<li>
								<a href="{{URL::to('memos/list')}}">Memo List</a>
							</li>
						</ul>
					</li>
          <li class="menu_sub">
            <a href="#"> <i class="fa fa-comments-o"></i> <span>My Messages </span> <span class="badge badge-pill badge-danger float-right">2</span> </a>
            <ul class="down_menu">
              <li>
                <a href="{{URL::to('messages/create')}}">Create New</a>
              </li>
              <li>
                <a href="{{URL::to('messages/inbox')}}">Inbox </a>
								<a href="{{URL::to('messages/sent')}}">Sent </a>
              </li>
            </ul>
          </li>
						@if(Auth::user()->user_type=='management')
		          <li class="menu_sub">
		            <a href="{{ URL::to('feedback')}}"> <i class="fa fa-newspaper-o"></i> <span>Client Feedbacks</span></a>
		          </li>
					@endif
          <li class="menu_sub">
						<a class="dropdown-item" href="{{ route('logout') }}"
							 onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
							 <i class="fa fa-arrow-left"></i>	{{ __('Logout') }}
						</a>
          </li>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
					</form>


				</ul>

			</div>
