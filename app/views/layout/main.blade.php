<!DOCTYPE html>
<html>
<head>
	@include('include/head')
</head>
<body>
		@include('include/navBar')

		<div class="row row-centered col-xs-8">
			@yield('content')
		</div>
</body>
</html>