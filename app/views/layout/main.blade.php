<!DOCTYPE html>
<html>
<head>
	@include('include/head')
</head>
<body>
		@include('include/navBar')

		@if (Session::has('global'))

			
			
			<div   class="alert alert-info" style="color: #fcf8e3;
    												background-color: #2289E2;
    												border-color: #bce8f1;
    												margin-left: 550px;
    												margin-right: 550px">
					{{ Session::get('global') }}
             </div>
		@endif

		<div class="row row-centered col-xs-12">
			@yield('content')
		</div>
</body>
</html>