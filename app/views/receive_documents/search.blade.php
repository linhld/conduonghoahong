@extends('layout.main')
@section('content')

    <h1>tìm kiếm Công văn đến</h1>

   <form class="navbar-form navbar-left" action="{{ URL::route('document-receive-search') }}" method='post' role="search">
		<div class="form-group">
			<input type="text" name="query" class="form-control" placeholder="tìm kiếm công văn">
		</div>
		<button type="submit" class="btn btn-default">Tìm</button>
	</form>

	@if( !empty($documents) )
		@foreach( $documents as $document )
			{{ $document->title }}
		@endforeach

	@endif
@endsection