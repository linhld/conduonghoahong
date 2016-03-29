@extends('layout.main')
@section('content')

<form role="form" action="{{ URL::route('users-store') }}" method="post">

    <div class="form-group">
        <label for="name">Họ tên:</label>
        <input class="form-control" type="text" name="name">
    </div>
    <div class="form-group">
        <label for="username">Tên đăng nhập:</label>
          <input class="form-control" type="text" name="username">
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu:</label>
         <input class="form-control" type="text" name="password">
    </div>

    <div class="form-group">
        <label for="password"> Phòng ban:</label>
        <select name="department">
            @foreach( Department::all() as $department )
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="password"> Chức vụ:</label>
        <select name="role">
                <option value="{{ Config::get("user.role")["staff"] }}">Nhân viên</option>
                <option value="{{ Config::get("user.role")["manager"] }}">Trưởng phòng</option>
                <option value="{{ Config::get("user.role")["writer"] }}">Văn thư</option>
                <option value="{{ Config::get("user.role")["chef"] }}">Giám đốc</option>
        </select>
    </div>

    <input class="btn btn-success" type="submit" value="Tạo tài khoản">
    {{ Form::token() }}
</form>

@endsection