@extends('layout.main')
@section('content')

    <h1>Thống kê Công văn đến</h1>

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

	@if( !empty($documents) )
	@if( count($documents) )
		<table class="table table-striped table-bordered">
			<thead>
			<tr>
				<td>Số công văn</td>
				<td>Tiêu đề</td>
				<td>Sửa/ Xóa</td>
			</tr>
			</thead>
			<tbody>
			@foreach($documents as $index => $document)
				<tr>
					<td>{{ $document->document_code ? $document->document_code : $document->document_out_code }}</td>
					<td>{{ $document->title }}</td>
					<!-- we will also add show, edit, and delete buttons -->
					<td>

						<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
						<!-- we will add this later since its a little more complicated than the other two buttons -->

						<!-- show the nerd (uses the show method found at GET /nerds/{id} -->

						<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
						<?php $user_role = Auth::user()->role; ?>
						<?php $config_role = Config::get("user.role"); ?>
								<!-- neu user la Van thu thi hien nut sut va  -->
						@if( $user_role == $config_role["writer"] )
							<a class="btn btn-small btn-info" href="{{ URL::route("document-receive-edit", $document->id) }}">Sửa</a>
							<a class="delete btn btn-small btn-danger" href="{{ URL::route("document-receive-destroy", $document->id ) }}">Xóa</a>
							<!-- neu user la Giam doc thi hien nut Duyet hoac Tu choi -->
						@else

						@endif

						<a class="btn btn-small btn-info" href="{{ URL::route("document-receive-read", $document->id) }}">Xem</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	@endif

	@endif

	
@endsection