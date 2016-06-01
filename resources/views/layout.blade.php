<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{Lang::get('app.meta_title')}}</title>
	<link href="{{ asset('/css/all.css') }}" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
</head>
<body>
	@include('_header')
	@yield('content')
	@include('_footer')
	<link href="{{ asset('/js/all.js') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>
