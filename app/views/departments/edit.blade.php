@extends('layout.main')
@section('content')

 <form action="{{ URL::route('departments-update', $department->id ) }}" method="post">
<div class="form-group">
    <div class="field">
     Tên phòng ban: <input type="text" name="name" class="form-control" style="width: 250px;" value="{{ $department->name }}">
        </div>
</div>
<div class="form-group">
        <input class="btn btn-success" type="submit" value="Cập nhật">
        {{ Form::token() }}
 </div>
</form>

@endsection