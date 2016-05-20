@extends('layout.main')
@section('content')

    <form role='form' action="{{ URL::route('users-update', $user->id ) }}" method="post">

        <div class="form-group">
            <label for="name"> Tên:</label>
            <input type="text" name="name" value="{{ $user->name }}">
        </div>

        <div class="form-group">
           <label for="password"> Email:</label>
           <input type="text" name="email" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label for="password"> SĐT:</label>
            <input type="text" name="tel" value="{{ $user->tel }}">
        </div>

        <div class="form-group">
            <label for="password"> Ngày sinh:</label>
            <input type="date" name="birth_date" value="{{ $user->birth_date }}">
        </div>

        <div class="form-group">
            <label for="password"> Giới tính:</label>
            <select name="gender">
                <option
                	@if( $user->gender == Config::get('user.gender')['male'] )
                		selected
                	@endif
                	value="{{ Config::get('user.gender')['male'] }}">nam
                </option>
                <option
                	@if( $user->gender == Config::get('user.gender')['female'] )
                		selected
                	@endif
                	value="{{ Config::get('user.gender')['female'] }}">nữ
                </option>
        </select>
        </div>

		<div class="form-group">
	        <label for="password"> Phòng ban:</label>
	        <select name="department">
	            @foreach( Department::all() as $department )
	                <option 
	                	@if( $user->department == $department->id )
                			selected
                		@endif
	                	value="{{ $department->id }}">{{ $department->name }}
	                </option>
	            @endforeach
	        </select>
	    </div>

	    <div class="form-group">
        <label for="password"> Chức vụ:</label>
        <select name="role">
                <option
                	@if( $user->role == Config::get('user.role')['staff'] )
                		selected
                	@endif
                 	value="{{ Config::get("user.role")["staff"] }}">Nhân viên
                 </option>
                <option 
                	@if( $user->role == Config::get('user.role')['manager'] )
                		selected
                	@endif
                	value="{{ Config::get("user.role")["manager"] }}">Trưởng phòng
                </option>
                <option
                	@if( $user->role == Config::get('user.role')['writer'] )
                		selected
                	@endif
                	value="{{ Config::get("user.role")["writer"] }}">Văn thư
                </option>
                <option 
                	@if( $user->role == Config::get('user.role')['chef'] )
                		selected
                	@endif
                	value="{{ Config::get("user.role")["chef"] }}">Giám đốc
                </option>
        </select>
    </div>

        <input class="btn btn-success" type="submit" value="Cập nhật">
        {{ Form::token() }}
    </form>

@endsection