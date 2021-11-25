<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@300;400;500;600;700&family=Ubuntu:wght@300;400;500;700&display=swap">
	
	<title>{{ $title }}</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="{{ $keywords }}" />
	<meta name="description" content="{{ $description }}" />
	<meta name="theme-color" content="#e32727">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="{{ asset('images/site/favicon.ico') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/site/plugins.min.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/site/custom.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/site/responsive.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/site/development.css') }}"/>
 
    <!--[if IE 7]> <html class="ie7"> <![endif]-->
    <!--[if IE 8]> <html class="ie8"> <![endif]-->
    <!--[if IE 9]> <html class="ie9"> <![endif]-->
</head>

<body>
	<div class="bodyOverlay"></div>
	<div class="responsive_nav"></div>
	<a class="scrollup" href="javascript:void(0);" aria-label="Scroll to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

	<div class="mainBody">
		<main class="mainContainer header_tr">
			@yield('content')
		</main>
	</div>

	@stack('scripts')

</body>
</html>