<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


	<link href="{{asset('css/classic.css')}}" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

	<link rel="preconnect" href="http://fonts.gstatic.com/" crossorigin>

	
	<!-- <script src="{{ asset('js/setting.js') }}" defer></script> -->
</head>

<body>
	<main class="main d-flex w-100">
	@yield('content')
	</main>

    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

</body>



</html>