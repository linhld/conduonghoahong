@extends('layout.main')
@section('content')

    <h1>tìm kiếm Công văn đến</h1>

   <form class="navbar-form navbar-left" action="{{ URL::route('document-stat') }}" method='post' role="search">
		<div class="form-group">
			<input type="date" name="start_date" class="form-control" value="{{ Input::old('start_date')}}" >
			<input type="date" name="end_date" class="form-control" value="{{Input::old('end_date')}}" >

			<select name="document_type" id="document_type">
                @foreach( DB::table('document_types')->get() as $document_type )
                    <option value="{{ $document_type->id }}">{{ $document_type->name }}</option>
                @endforeach
            </select>

			<select name="document">
				<option value="receive">CV đến</option>
				<option value="out">CV đi</option>
			</select>
		</div>
		<button type="submit" class="btn btn-default">Thống kê</button> 
		<br>
		
	</form>
	<br>
	<br>

	<h3>{{ $report or "" }}</h3>

	
@endsection