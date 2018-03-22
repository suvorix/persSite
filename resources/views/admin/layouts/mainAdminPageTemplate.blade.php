<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
			@include('admin.includes.head')
	</head>
	<body class="top-navigation">
		<div id="wrapper">
			<div id="page-wrapper" class="gray-bg">
       @include('admin.includes.header')
        <div class="wrapper wrapper-content">
          <div class="container">
						@yield('adminPageContent')
        	</div>
        </div>
       @include('admin.includes.footer')
			</div>
		</div>
		@include('admin.includes.scripts')
		@yield('adminPageScripts')
	</body>
</html>