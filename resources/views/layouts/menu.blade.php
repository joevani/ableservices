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


          <li class="menu_sub">
            <a href="#"> <i class="fa fa-file text-aqua"></i> <span>Setup</span> <span class="icon-arrow-down styleicon"></span> </a>
            <ul class="down_menu">
              <li>
                <a href="{{URL::to('setup/users')}}">Users</a>
              </li>
              <li>
                <a href="{{URL::to('setup/categories')}}">Issue Categories</a>
              </li>
              <li>
                <a href="{{URL::to('setup/supervisors')}}">Supervisor Assignment</a>
              </li>
              <li>
                <a href="contact.html">Team Lead Assignment</a>
              </li>
              <li>
                <a href="page-login.html">Clients</a>
              </li>
            </ul>
          </li>
          <li class="menu_sub">
            <a href="{{ URL::to('issues')}}"> <i class="fa fa-bullhorn"></i> <span>News/Updates</span></a>
          </li>
          <li class="menu_sub">
            <a href="{{ URL::to('issues')}}"> <i class="fa fa-ticket"></i> <span>Issues/Concerns</span></a>
          </li>

					<li class="menu_sub">
						<a href="#"> <i class="fa fa-table"></i> <span>Memos </span> <span class="badge badge-pill badge-danger float-right">2</span> </a>
						<ul class="down_menu">
							<li>
								<a href="widgets-base.html">Create Memo</a>
							</li>
							<li>
								<a href="widgets-chart.html">Memo List</a>
							</li>
						</ul>
					</li>
          <li class="menu_sub">
            <a href="#"> <i class="fa fa-comments-o"></i> <span>My Messages </span> <span class="badge badge-pill badge-danger float-right">2</span> </a>
            <ul class="down_menu">
              <li>
                <a href="widgets-base.html">Create New</a>
              </li>
              <li>
                <a href="widgets-chart.html">Messages </a>
              </li>
            </ul>
          </li>
          <li class="menu_sub">
            <a href="{{ URL::to('dashboard')}}"> <i class="fa fa-newspaper-o"></i> <span>Client Feedbacks</span></a>
          </li>
          <li class="menu_sub">
            <a href="{{ URL::to('dashboard')}}"> <i class="fa fa-arrow-left"></i> <span>LOG OUT</span></a>
          </li>




				</ul>

			</div>
