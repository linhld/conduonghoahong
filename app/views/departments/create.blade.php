@extends('layout.main')
@section('content')

<form role="form" action="{{ URL::route('departments-store') }}" method="post">
    <div class="form-group">
        <label for="name">Tên phòng ban:</label>
        <input type="text" name="name">
    </div>
    <input class="btn btn-success" type="submit" value="Tạo phòng ">
    {{ Form::token() }}
</form>

@endsection