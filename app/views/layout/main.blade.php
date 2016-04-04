<!DOCTYPE html>
<html>
<head>
	@include('include/head')
</head>
<body>
		@include('include/navBar')

		@if (Session::has('global'))

			<div class="row">
				<div  class="message row col-xs-4 row-centered" style="color: white; background: red;">
					{{ Session::get('global') }}
				</div>
			</div>
			<br>

		@endif

		<div class="row row-centered col-xs-8">
			@yield('content')
		</div>
</body>
</html>