@extends('layout.admin')
@section('content')
<div class="row">
<div class="col-xs-6 col-centered">
    <form action="{{ URL::route('donhangxkld.store') }}" method="POST">
    <h5>Quốc gia</h5>
  
@foreach( Config::get('donhangxkld.quocgia') as $attribute => $value)
<label class="radio-inline">
  <input type="radio" name="quocgia" id="" value="{{ $value }}"> {{ $attribute }}
</label>
@endforeach

  <div class="form-group">
    <input type="text" class="form-control"  name="tenngan" placeholder="Tên ngắn">
  </div>
  <div class="form-group">
    <input type="text" class="form-control"  name="mota" placeholder="Mô tả">
  </div>
  <div class="form-group">
  <h5>hạn nộp hồ sơ</h5>
    <input type="date" class="form-control"  name="hannophoso" placeholder="Hạn nộp hồ sơ">
  </div>
  <div class="form-group">
    <input type="text" class="form-control"  name="soluongcantuyen" placeholder="Số lượng cần tuyển">
  </div>
  <div class="form-group">
    <input type="number" class="form-control"  name="dotuoibatdau" placeholder="Độ tuổi từ">
  </div>
  <div class="form-group">
    <input type="number" class="form-control"  name="dotuoiketthuc" placeholder="đến">
  </div>
  <div class="form-group">
    <input type="number" class="form-control"  name="chieucao" placeholder="Chiều cao">
  </div>
  <div class="form-group">
    <input type="number" class="form-control"  name="cannang" placeholder="Cân nặng">
  </div>

    <div class="form-group">
    <input type="string" class="form-control"  name="yeucaukhac" placeholder="Yêu cầu khác">
  </div>

<h5>Giới tính</h5>
  
@foreach( Config::get('donhangxkld.gioitinh') as $attribute => $value)
<label class="radio-inline">
  <input type="radio" name="gioitinh" id="" value="{{ $value }}"> {{ $attribute }}
</label>
@endforeach

<h5>Tình trạng hôn nhân</h5>
@foreach( Config::get('donhangxkld.tinhtranghonnhan') as $attribute => $value)
<label class="radio-inline">
  <input type="radio" name="tinhtranghonnhan" id="" value="{{ $value }}"> {{ $attribute }}
</label>
@endforeach

<h5>Trình độ</h5>
@foreach( Config::get('donhangxkld.trinhdo') as $attribute => $value)
<label class="radio-inline">
  <input type="radio" name="trinhdo" id="" value="{{ $value }}"> {{ $attribute }}
</label>
@endforeach

<div class="form-group">
    <input type="string" class="form-control"  name="loaihinhthoigian" placeholder="loaihinhthoigian">
  </div>
  <div class="form-group">
    <input type="string" class="form-control"  name="luongthuclinh" placeholder="luongthuclinh">
  </div>
  <div class="form-group">
    <input type="string" class="form-control"  name="luongcoban" placeholder="luongcoban">
  </div>
   <div class="form-group">
    <input type="string" class="form-control"  name="tangca" placeholder="tăng ca">
  </div>

<div class="form-group">
    <input type="string" class="form-control"  name="chedokhac" placeholder="chedokhac">
  </div>

  
<div class="form-group">
<h5>thời gian sơ tuyển</h5>
    <input type="date" class="form-control"  name="thoigiansotuyen" placeholder="thoigiansotuyen">
  </div>
  
    <div class="form-group">
    <h5>Thời gian thi tuyển</h5>
    <input type="date" class="form-control"  name="thoigianthituyen" placeholder="thoigianthituyen">
  </div>

   <div class="form-group">
    <input type="string" class="form-control"  name="hinhthucphongvan" placeholder="hinh thuc phong van">
  </div>

  <div class="form-group">
    <input type="string" class="form-control"  name="tencongty" placeholder="ten cty">
  </div>

  <div class="form-group">
    <input type="string" class="form-control"  name="diadiemlamviec" placeholder="dia diem lam viec">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>

</div>
@endsection