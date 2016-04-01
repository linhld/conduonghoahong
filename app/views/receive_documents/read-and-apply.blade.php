@extends('layout.main')
@section('content')

    <form role="form" action="{{ URL::route('document-receive-action', $document->id) }}?action=apply">

        <? echo $document_body ?>

        @foreach( Department::all() as $department )
            {{ $department->name }}
        @endforeach

        <input class="btn btn-success" type="submit" value="Duyệt">
        {{ Form::token() }}
    </form>
@endsection