<div class="side_bar dark_blue side_bg_img scroll_auto">
				<div class="user-panel">
						<div class="user_image">


											<img src="{{ asset('capstone/Template/assets/images/')}}/{{Auth::user()->user_pic}}" class="img-circle mCS_img_loaded" alt="User Image">


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
					<li class="menu_sub">
						<a href="{{ URL::to('profile')}}"> <i class="fa fa-user"></i> <span>Profile</span></a>
					</li>

					@if(Auth::user()->user_type=='management')
          <li class="menu_sub">
            <a href="#"> <i class="fa fa-file text-aqua"></i> <span>Setup</span> <span class="icon-arrow-down styleicon"></span> </a>
            <ul class="down_menu">
              <li>
                <a href="{{URL::to('setup/users')}}">Employees</a>
              </li>
							<li>
								<a href="{{URL::to('setup/clients')}}">Clients</a>
							</li>
              <li>
                <a href="{{URL::to('setup/locations')}}">Area/Location</a>
              </li>
							<li>
                <a href="{{URL::to('locations/assigment')}}">Worker Area Assignment</a>
              </li>
              <li>
                <a href="{{URL::to('setup/supervisors')}}">Supervisor Assignment</a>
              </li>
              <li>
                <a href="{{URL::to('setup/teamleaders')}}">Team Lead Assignment</a>
              </li>

            </ul>
          </li>
					@endif
          <li class="menu_sub">
            <a href="{{ URL::to('news')}}"> <i class="fa fa-bullhorn"></i> <span>News/Updates</span></a>
          </li>
					@if(Auth::user()->user_type !="client")
          <li class="menu_sub">
							@if(Auth::user()->user_type=='worker')
									<a href="{{ URL::to('issues')}}"> <i class="fa fa-ticket"></i> <span>Issues/Concerns</span></a>
							@endif


							@if(Auth::user()->user_type=='worker' && Auth::user()->user_type =="team lead")
            	<a href="{{ URL::to('issues')}}"> <i class="fa fa-ticket"></i> <span>Issues/Concerns</span></a>
							@endif
							@if(Auth::user()->user_type !='worker' &&  Auth::user()->user_type !='team lead')
									<a href="{{ URL::to('issues/list')}}"> <i class="fa fa-ticket"></i> <span>Issues/Concerns</span></a>
							@endif
          </li>

					@endif

					@if(Auth::user()->user_type !='client')
					<?php
						$mem = DB::table('memo')->where('user_id',Auth::user()->id)->where('is_read',0)->count('id');
					 ?>
					<li class="menu_sub">
						<a href="#"> <i class="fa fa-table"></i> <span>Memos </span> @if($mem > 0)<span class="badge badge-pill badge-danger float-right __web-inspector-hide-shortcut__">{{ $mem }}</span> @endif </a>
						<ul class="down_menu">
						@if(Auth::user()->user_type =="management")
							<li>
								<a href="{{URL::to('memo/create')}}">Create Memo</a>
							</li>
							@endif
							<li>
								<a href="{{URL::to('memo')}}">Memo @if($mem > 0)<span class="badge badge-pill badge-danger float-right __web-inspector-hide-shortcut__">{{ $mem }}</span> @endif</a>
							</li>
						</ul>
					</li>
					@endif
					<?php
						$message = DB::table('reply')->where('user_id',Auth::user()->id)->where('status',0)->count('id');
						$chat = DB::table('chat')->where('to_user',Auth::user()->id)->count('id');

					 ?>
          <li class="menu_sub">
            <a href="#"> <i class="fa fa-comments-o"></i> <span>My Messages </span>

								@if($message < 1) @if($chat > 0)<span class="badge badge-pill badge-danger float-right __web-inspector-hide-shortcut__">{{ $chat }}</span> @endif @endif
							 @if($message > 0) <span class="badge badge-pill badge-danger float-right __web-inspector-hide-shortcut__">{{ $message }}</span> @endif  </a>
            <ul class="down_menu">
              <li>
                <a href="{{URL::to('messages/create')}}">Create New</a>
              </li>
              <li>
                <a href="{{URL::to('messages/inbox')}}">	@if($message < 1) @if($chat > 0)<span class="badge badge-pill badge-danger float-right __web-inspector-hide-shortcut__">{{ $chat }}</span> @endif @endif
								 @if($message > 0) <span class="badge badge-pill badge-danger float-right __web-inspector-hide-shortcut__">{{ $message }}</span> @endif   </a>
								<a href="{{URL::to('messages/sent')}}">Sent </a>
              </li>
            </ul>
          </li>

					@if(Auth::user()->user_type=='supervisor')
						<li class="menu_sub">
							<a href="{{URL::to('teamleaders')}}"> <i class="fa fa-users"></i> <span>Team Leaders</span></a>
						</li>
					@endif
						@if(Auth::user()->user_type=='team lead')
							<li class="menu_sub">
								<a href="{{URL::to('workers')}}"> <i class="fa fa-users"></i> <span>Workers</span></a>
							</li>
					@endif
					<!-- @if(Auth::user()->user_type=='team lead')
						<li class="menu_sub">
							<a href="{{URL::to('workers')}}"> <i class="fa fa-users"></i> <span>Workers</span></a>
						</li>
				 @endif -->
				 	@if(Auth::user()->user_type =='client' || Auth::user()->user_type =='management')
						<li class="menu_sub">
							<?php
								$feed = DB::table('feedbacks')->where('user_id',Auth::user()->id)->where('is_read',0)->count('id');
								$feeds = DB::table('feedbacks')->where('is_read',0)->count('id');
							 ?>
							<a href="#"> <i class="fa fa-comments-o"></i> <span>Feedbacks </span> @if($feed > 0)<span class="badge badge-pill badge-danger float-right __web-inspector-hide-shortcut__">{{ $feed }}</span> @endif </a>
							<ul class="down_menu">
								@if(Auth::user()->user_type=='client')
											<li class="menu_sub">
												<a href="{{URL::to('feedbacks/create')}}"> <i class="fa fa-newspaper-o"></i> <span>Submit Feedback</span></a>
											</li>
											<li class="menu_sub">
												<a href="{{URL::to('feedbacks')}}"> <i class="fa fa-newspaper-o"></i> <span>Feedbacks</span></a>
											</li>
									@endif
									@if(Auth::user()->user_type=='management')
										<li class="menu_sub">
											<a href="{{URL::to('feedbacks')}}"> <i class="fa fa-newspaper-o"></i> <span>Client Feedbacks @if($feeds > 0)<span class="badge badge-pill badge-danger float-right __web-inspector-hide-shortcut__">{{ $feeds }}</span> @endif</span></a>
										</li>
								@endif

							</ul>
						</li>

						@endif

						@if(Auth::user()->user_type =='supervisor' || Auth::user()->user_type =='management')
						<li class="menu_sub">
							<?php
								$reports = DB::table('reports')->where('is_read',0)->count('id');

							 ?>
							<a href="#"> <i class="fa fa-comments-o"></i> <span>Reports </span> @if(Auth::user()->user_type =='management')@if($reports > 0)<span class="badge badge-pill badge-danger float-right __web-inspector-hide-shortcut__">{{ $reports }}</span> @endif @endif </a>
							<ul class="down_menu">
								@if(Auth::user()->user_type =='supervisor')
								<li class="menu_sub">
									<a href="{{URL::to('reports/create')}}"> <i class="fa fa-newspaper-o"></i> <span>Create report</span></a>
								</li>
								@endif
										<li class="menu_sub">
											<a href="{{URL::to('reports')}}"> <i class="fa fa-newspaper-o"></i> <span>Reports </span></a>
										</li>


							</ul>
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
