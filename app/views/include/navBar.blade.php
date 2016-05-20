<div class="contain-to-grid">

@if(Auth::check())

		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="panel-group">

					<!-- lay role cua User đang đăng nhập -->
					<?php $user_role 	= Auth::user()->role; 		?>
					<!-- lay role cua mảng config role -->
					<?php $config_role 	= Config::get('user.role'); ?>

					@if( $user_role == $config_role["admin"] )
					<!-- Menu danh cho Admin -->

					<div class="panel panel-primary">
						<div class="panel-heading">Quản lí công văn</div>
						<div class="panel-body">

							<ul class="nav navbar-nav">
								<li><a href="{{ URL::route("users-index") }}">Quản lý tài khoản</a></li>
								<li><a href="{{ URL::route("departments-index") }}">Quản lý phòng ban</a></li>

								<form class="navbar-form navbar-left" action="{{ URL::route('department-search') }}" method='get' role="search">
									<div class="form-group">
										<input type="text" name="query" class="form-control" placeholder="Tìm kiếm phòng ban">
									</div>
									<button type="submit" class="btn btn-info">Tìm</button>
								</form>
							</ul>

						</div>
					</div>

					<!-- Menu danh cho van thu -->
					@elseif( $user_role == $config_role["writer"] )

					<div class="panel panel-primary">
						<div class="panel-heading">Quản lý công văn đến</div>
						<div class="panel-body">

							<ul class="nav navbar-nav">
								<li><a href="{{ URL::route("document-receive-create") }}">Nhập CV đến</a></li>
								<li>
									<a href="{{ URL::route("document-receive-waiting-apply") }}">CV đến đang chờ duyệt</a>
								</li>
								<li>
									<a href="{{ URL::route("document-receive-ejected") }}">CV đến bị từ chối</a>
								</li>
								<li>
									<a href="{{ URL::route("document-receive-applied") }}">CV đến đã duyệt</a>
								</li>	
								<li>
									<a href="{{ URL::route("document-receive-search") }}">Tìm CV đến</a>
								</li>
								
							</ul>
						</div>
					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">Quản lý công văn đi</div>
						<div class="panel-body">

							<ul class="nav navbar-nav">
								<li>
									<a href="{{ URL::route("document-out-waiting-accept") }}">CV đi chờ duyệt</a>
								</li>
								<li>
									<a href="{{ URL::route("document-out-ejected") }}">CV đi bị từ chối</a>
								</li>
								<li>
									<a href="{{ URL::route("document-out-applied") }}">CV đi đã duyệt</a>
								</li>	

								<li>
									<a href="{{ URL::route("document-out-search") }}">Tìm CV đi</a>
								</li>
								
							</ul>
						</div>
					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">Thống kê</div>
						<div class="panel-body">

							<ul class="nav navbar-nav">
								<li>
									<a href="{{ URL::route("document-stat") }}">Thống kê công văn</a>
								</li>
								
							</ul>
						</div>
					</div>

					
					@elseif( $user_role == $config_role["chef"])

					<div class="panel panel-primary">
						<div class="panel-heading">Quản lý công văn đến</div>
						<div class="panel-body">
							<ul class="nav navbar-nav">
								<li>
									<a href="{{ URL::route("document-receive-waiting-apply") }}">CV đến đang chờ duyệt</a></li>
								<li>
									<a href="{{ URL::route("document-receive-applied") }}">CV đến đã duyệt</a>
								</li>
								<li>
									<a href="{{ URL::route("document-receive-ejected") }}">CV đến bị từ chối</a>
								</li>
								<li>
									<a href="{{ URL::route("document-receive-search") }}">Tìm CV đến</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">Quản lý công văn đi</div>
						<div class="panel-body">
							<ul class="nav navbar-nav">
								<li>
									<a href="{{ URL::route("document-out-waiting-apply") }}">CV đi chờ duyệt</a>
								</li>
								<li>
									<a href="{{ URL::route("document-out-applied") }}">CV đi đã duyệt</a>
								</li>
								<li>
									<a href="{{ URL::route("document-out-ejected") }}">CV đi bị từ chối</a>
								</li>
								<li>
									<a href="{{ URL::route("document-out-search") }}">Tìm CV đi</a>
								</li>
							</ul>
						</div>
					</div>
					@elseif( $user_role == $config_role["staff"])

					<div class="panel panel-primary">
						<div class="panel-heading">Quản lý công văn</div>
						<div class="panel-body">
							<ul class="nav navbar-nav">
								<li><a href="{{ URL::route("document-out-create") }}">Soạn CV đi</a></li>
								<li><a href="{{ URL::route("document-receive-sent-staff") }}">CV gửi cho bạn</a></li>

								<li><a href="{{ URL::route("document-receive-search") }}">Tìm CV đến</a></li>
								<li><a href="{{ URL::route("document-out-search") }}">Tìm CV đi</a></li>
							</ul>
						</div>
					</div>
					@else
						<div class="panel panel-primary">
						<div class="panel-heading">Quản lý công văn</div>
						<div class="panel-body">
							vui lòng đăng nhập
						</div>
					</div>
					@endif

				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

@endif

</div>