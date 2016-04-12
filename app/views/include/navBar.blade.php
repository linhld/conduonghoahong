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

					<!-- lay role cua User đang đăng nhập -->
					<?php $user_role 	= Auth::user()->role; 		?>
					<!-- lay role cua mảng config role -->
					<?php $config_role 	= Config::get('user.role'); ?>

					@if( $user_role == $config_role["admin"] )
					<!-- Menu danh cho Admin -->
						<ul class="nav navbar-nav">
							
							<li><a href="{{ URL::route("users-index") }}">Quản lí tài khoản</a></li>
							<li><a href="{{ URL::route("departments-index") }}">Quản lí phòng ban</a></li>

							<form class="navbar-form navbar-left" action="{{ URL::route('department-search') }}" method='get' role="search">
								<div class="form-group">
									<input type="text" name="query" class="form-control" placeholder="tìm kiếm phòng ban">
								</div>
								<button type="submit" class="btn btn-default">Tìm</button>
							</form>
						</ul>


					<!-- Menu danh cho van thu -->
					@elseif( $user_role == $config_role["writer"] )
							<ul class="nav navbar-nav">
								<li><a href="{{ URL::route("document-receive-create") }}">Soạn CV đến</a></li>
								<li><a href="{{ URL::route("document-receive-waiting-apply") }}">CV đến đang chờ duyệt</a></li>
								<li><a href="{{ URL::route("document-receive-ejected") }}">CV đến bị từ chối</a></li>
								<li><a href="{{ URL::route("document-receive-applied") }}">CV đến đã duyệt</a></li>


								<!-- <li><a href="{{ URL::route("document-out-waiting-accept") }}">CV đi đang chờ xem lại</a></li> -->
								<li><a href="{{ URL::route("document-out-applied") }}">CV đi đã duyệt</a></li>
								<li><a href="{{ URL::route("document-out-ejected") }}">CV đi đã từ chối</a></li>

								<li><a href="{{ URL::route("document-receive-search") }}">Tìm CV đến</a></li>
								<li><a href="{{ URL::route("document-out-search") }}">Tìm CV đi</a></li>
							</ul>

					@elseif( $user_role == $config_role["chef"])
							<ul class="nav navbar-nav">

								<li><a href="{{ URL::route("document-receive-create") }}">Soạn CV đi</a></li>
								<li><a href="{{ URL::route("document-receive-waiting-apply") }}">CV đến đang chờ duyệt</a></li>
								<li><a href="{{ URL::route("document-receive-applied") }}">CV đến đã duyệt</a></li>
								<li><a href="{{ URL::route("document-receive-ejected") }}">CV đến bị từ chối</a></li>

								<li><a href="{{ URL::route("document-out-waiting-apply") }}">CV đi chờ duyệt</a></li>
								<li><a href="{{ URL::route("document-out-applied") }}">CV đi đã duyệt</a></li>
								<li><a href="{{ URL::route("document-out-ejected") }}">CV đi bị từ chối</a></li>

								<li><a href="{{ URL::route("document-receive-search") }}">Tìm CV đến</a></li>
								<li><a href="{{ URL::route("document-out-search") }}">Tìm CV đi</a></li>

							</ul>
					@elseif( $user_role == $config_role["staff"])
							<ul class="nav navbar-nav">
								<li><a href="{{ URL::route("document-out-create") }}">Soạn CV đi</a></li>
								<li><a href="{{ URL::route("document-receive-applied") }}">CV gửi cho bạn</a></li>

								<li><a href="{{ URL::route("document-receive-search") }}">Tìm CV đến</a></li>
								<li><a href="{{ URL::route("document-out-search") }}">Tìm CV đi</a></li>
							</ul>
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