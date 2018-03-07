<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('includes.head')
</head>

<body>
	@include('includes.header')
	@yield('headerBottom')
	
	@yield('pageContent')
	
	@include('includes.footer')
	
	@include('includes.scripts')
	@yield('pageScripts')
</body>
</html>