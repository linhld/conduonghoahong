@extends('layout.main')
@section('content')
<div class="getlead">

        <!-- =========================
            HEADER 
        ============================== -->
        <header id="nav3-1">
            
            <nav class="navbar navMenuCollapse">
            
                <div class="container">
                    <!-- Call Us -->
                    <div class="col-md-4 hidden-sm hidden-xs text-left nav-3cols nav-callus p-l-0">
                        Liên hệ <span class="phone-number"> 01679.001.005 </span>
                    </div>
                    <!-- Logo -->
                    <div class="col-md-4 col-xs-6 nav-3cols-logo">
						<h3>CONDUONGHOAHONG HUMAN RESOURCE</h3>
                    </div>

                </div><!-- /End Container -->
            </nav><!-- /End Nav -->
        </header>
        </div>
    

	<!-- vui long de lai thong tin -->
	<div class="row" id="register-form-wrap">
		<div class="opacity-class">
			<div class="row" id="register-form">
				<div class="col-xs-8 col-centered">
					<legend>Vui lòng để lại thông tin, khi có đơn hàng phù hợp chúng tôi sẽ gọi lại cho bạn</legend>
					<div class="row">
						<form class="well form-horizontal" action="index.php" method="post"  id="contact_form">
						<fieldset>

						<!-- Nhom thong tin-->

						<div class="col-xs-10 col-lg-4">

								<div class="form-group"> 
								  <div class="input-group">
								  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								  <input  name="first_name" placeholder="Họ và tên" class="form-control"  type="text">
								    </div>
								</div>

								<!-- Text input-->

								<div class="form-group">
								
								    <div class="input-group">
									  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									  <input name="last_name" placeholder="Tuổi + Nơi ở hiện tại" class="form-control"  type="text">
								    </div>
								</div>

								<!-- Text input-->
								<div class="form-group">  
								 
								    <div class="input-group">
								        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
								  	<input name="email" placeholder="Số điện thoại" class="form-control"  type="text">
								   </div>
								</div>
						</div>

						<!-- Nhom dia chi nghe nghiep-->
						<div class="col-xs-10 col-lg-4">

								<div class="form-group">
								
								    <div class="input-group">
								        <span class="input-group-addon"><i class="glyphicon glyphicon-scale"></i></span>
								  	<input name="phone" placeholder="Chiều cao, cân nặng" class="form-control" type="text">
								  	</div>
								   
								</div>

								<!-- Text input-->
								      
								<div class="form-group">
								 
								    <div class="input-group">
								        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								  <input name="address" placeholder="Nghề nghiệp hiện tại" class="form-control" type="text">
								  </div>
								</div>

								<!-- Text input-->
								 
								<div class="form-group">
									<div class="input-group">
								        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								  <input name="city" placeholder="Muốn đi đơn hàng ntn" class="form-control"  type="text">
								   	</div>
								</div>
						</div>


						<!-- Text input-->
						<div class="col-xs-10 col-lg-4">
								<div class="form-group">
								  
								    <div class="input-group">
								        <span class="input-group-addon"><i class="glyphicon glyphicon-plane"></i></span>
								  		<input name="zip" placeholder="Nước bạn muốn đi" class="form-control"  type="text">
								 	</div>
								</div>

						</div>

						<div class="col-xs-10 col-lg-4">
								<div class="form-group">
								  
								    <div class="input-group">
								        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
								  		<input name="degree" placeholder="Trình độ học vấn cao nhất" class="form-control"  type="text">
								 	</div>
								</div>

						</div>

						<!-- Button -->
						<div class="form-group">
						  <div class="col-md-4 text-center">
						    <button type="submit" class="btn btn-warning">GỬI <span class="glyphicon glyphicon-send"></span></button>
						  </div>
						</div>

						</fieldset>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="col-xs-10 col-lg-10 col-centered">
		<div class="item-wrapper">
	  <div class="row">
		  <div class="col-xs-4">
			<div class="panel panel-default">
				<div class="panel-heading">NHẬT BẢN</div>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-xs-4">
			<div class="panel panel-default">
				<div class="panel-heading">ĐÀI LOAN</div>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-xs-4">
			<div class="panel panel-default">
				<div class="panel-heading">SINGAPORE</div>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
						<li class="list-group-item" job-id="1">Tuyển 3 công nhân tai Ibaraki lương cao</li>
					</ul>
				</div>
			</div>
		</div>
	  </div>
		</div>
	</div>
@endsection