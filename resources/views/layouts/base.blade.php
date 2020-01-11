<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('inc.head')
<body>
	<div class="wrapper">
		@include('inc.side')

		<div class="main">
			@include('inc.nav')
			<main class="content">

				@yield('content')

			</main>

			<!-- @include('inc.footer') -->
		</div>
	</div>


	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>	
	<!-- <script src="{{ asset('js/settings.js') }}" defer></script> -->
	@yield('scripts')
</body>

</html>