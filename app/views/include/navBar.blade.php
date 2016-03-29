<div class="contain-to-grid">

@if(Auth::check())

		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">HOME</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				@if(Auth::user()->role == Config::get('user.role')["admin"] )

					<ul class="nav navbar-nav">
						<li><a href="{{ URL::route("departments-index") }}">Quản lí phòng ban</a></li>
						<li><a href="{{ URL::route("users-index") }}">Thêm tài khoản</a></li>
					</ul>

					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
						<!-- Menu danh cho van thu -->
				@elseif(Auth::user()->role == Config::get('user.role')["writer"] )
						<ul class="nav navbar-nav">
							<li><a href="{{ URL::route("document-create") }}">Soạn công văn</a></li>
							<li><a href="{{ URL::route("document-waiting-apply") }}">Công văn đang chờ duyệt</a></li>
							<li><a href="{{ URL::route("document-has-ejected") }}">Công văn bị từ chối</a></li>
						</ul>
				@elseif(Auth::user()->role == Config::get('user.role')["chef"])
					for chef
				@else
					else
				@endif


					<ul class="nav navbar-nav navbar-right">
						<li><a>{{ Auth::user()->name  }}</a></li>
						<li><a href="{{ URL::route("user-sign-out") }}">Đăng xuất</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

@endif

</div>