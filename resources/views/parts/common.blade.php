<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	@isset($title)
        <title>{{ $title }} - </title>
        @else
        <title></title>
	@endisset
	<!-- Favicon-->
	<link rel="icon" href="/favicon.svg" sizes="any" type="image/svg+xml">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	
	{{-- <!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" /> --}}

	@vite(['resources/css/app.css'])

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	@include('parts.nav')
	@yield('content')
	@include('parts.footer')
	@vite(['resources/js/app.js'])
</body>
</html>