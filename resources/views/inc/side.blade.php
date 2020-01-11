<nav id="sidebar" class="sidebar">
			<div class="sidebar-content ">
				<a class="sidebar-brand" href="{{route('home')}}">
					<i class="align-middle" data-feather="box"></i>
					<span class="align-middle">{{ config('app.name', 'Laravel') }}</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Main
					</li>
					<li class="sidebar-item">
						<a href="#dashboards" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
						<ul id="dashboards" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="dashboard-default.html">Default</a></li>
						</ul>
					</li>
					<li class="sidebar-item active">
						<a href="#pages" data-toggle="collapse" class="sidebar-link">
							<i class="align-middle" data-feather="layout"></i> <span class="align-middle">Pages</span>
						</a>
						<ul id="pages" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('profile.setting')}}">Profile</a></li>

						</ul>
					</li>
				</ul>


				<div class="sidebar-bottom d-none d-lg-block">
					<div class="media">
						<img class="rounded-circle mr-3" src="{{asset('img/avatars/avatar.jpg')}}" alt="james wood" width="40" height="40">
						<div class="media-body">
							<h5 class="mb-1">{{auth()->user()->name}}</h5>
							<div>
								<i class="fas fa-circle text-success"></i> Online
							</div>
						</div>
					</div>
				</div>

			</div>
		</nav>
