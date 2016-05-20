<!DOCTYPE html>
<html>
<head>
	@include('include/head')
</head>
<body>
	<div class="row logo">
		<img src="{{ url() }}\logo.jpg">
	</div>

	<div class="row">
		<div class="contain-to-grid">
				@if(Auth::check())

				<nav class="navbar navbar-inverse">
					<div class="container-fluid" style="background: #08455D">

				 	<div class="col-xs-8 row-centered">
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>                        
					      </button>
					      <a class="navbar-brand" href="#"></a>
					    </div>
				    <div class="collapse navbar-collapse" id="myNavbar">
				      <ul class="nav navbar-nav">
				        <li class="active"><a href="{{ URL::route('home') }}">Trang chủ</a></li>
				        <li><a href="#">Giới thiệu</a></li>
				        <li><a href="#">Trợ giúp</a></li>
				        <li><a href="#">Liên hệ</a></li>
				      </ul>
					      <ul class="nav navbar-nav navbar-right">
					        <li>
					        	<a href="#"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</a>
					        </li>
					        <li>
					        	<a href="{{ URL::route("user-sign-out") }}"><span class="glyphicon glyphicon-off"></span> Đăng xuất</a>
					        </li>
					      </ul>
					    </div>
					  </div>
				  </div>
				</nav>

				@endif
		</div>
	</div>

	@if(Auth::check())

	<div class='row'>

		<div class='col-xs-3' id='sideBar'>
			@include('include/navBar')
		</div>

		<div class="row col-xs-8" style="padding-top:20px; padding-left: 30px">

			@if (Session::has('global'))
				<div   class="alert alert-info" style="color: #fcf8e3;
	    												background-color: #2289E2;
	    												border-color: #bce8f1;
	    												margin-left: 550px;
	    												margin-right: 550px">
						{{ Session::get('global') }}
	             </div>
			@endif
			
			@yield('content')
		</div>

	</div>

	@else
		@yield('content')
	@endif

	<div class='row col-xs-12'>
			@include('include/footer')
	</div>
</body>
</html>