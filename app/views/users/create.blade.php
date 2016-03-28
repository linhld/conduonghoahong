@extends('layout.main')
@section('content')

<form action="{{ URL::route('users-store') }}" method="post">

    <div class="field">
        Tên: <input type="text" name="name">
    </div>

    <input class="button success" type="submit" value="Tạo tài khoản">
    {{ Form::token() }}
</form>

@endsection