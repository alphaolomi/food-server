<nav id="sidebar" class="sidebar">
			<div class="sidebar-content ">
				<a class="sidebar-brand" href="{{route('home')}}">
					<i class="align-middle" data-feather="box"></i>
					<span class="align-middle">{{ config('app.name', 'Laravel') }}</span>
				</a>

				<ul class="sidebar-nav">
                    @include('layouts.menu')
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
