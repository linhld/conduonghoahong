@extends('home.admin')
@section('department')

<form action="{{ URL::route('departments-store') }}" method="post">

    <div class="field">
        Tên: <input type="text" name="name">
    </div>

    <input class="button success" type="submit" value="Tạo phòng ">
    {{ Form::token() }}
</form>

@endsection