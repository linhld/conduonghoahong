@extends('layout.main')
@section('content')

    <h1>Công văn đến bị từ chối</h1>

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
                <td>{{ $document->document_code }}</td>
                <td>{{ $document->title }}</td>
                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::route("document-receive-read", $document->id) }}">Xem</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection