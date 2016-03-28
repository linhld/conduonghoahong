@extends('layout.main')
@section('content')

    <form action="{{ URL::route('users-update', $department->id ) }}" method="post">

        <div class="field">
            Tên: <input type="text" name="name" value="{{ $department->name }}">
        </div>

        <input class="button success" type="submit" value="Cập nhật">
        {{ Form::token() }}
    </form>

@endsection