@extends('layout.main')
@section('content')

    <h1>Công văn đến đang chờ duyệt</h1>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Số công văn</td>
            <td>Tiêu đề</td>
            <td>duyệt</td>
        </tr>
        </thead>
        <tbody>
        @foreach($documents as $index => $document)
            <tr>
                <td>{{ $document->document_out_code }}</td>
                <td>{{ $document->title }}</td>
                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <?php $user_role = Auth::user()->role; ?>
                            <!-- neu user la Van thu thi hien nut sut va  -->
                    @if( $user_role == Config::get("user.role")["writer"] )
                        <a class="btn btn-small btn-info" href="{{ URL::route("document-out-edit", $document->id) }}">Sửa</a>
                        <a class="delete btn btn-small btn-danger" href="{{ URL::route("document-out-destroy", $document->id ) }}">Xóa</a>
                        <!-- neu user la Giam doc thi hien nut Duyet hoac Tu choi -->
                    @elseif($user_role== Config::get("user.role")["chef"] )
                        <a class="btn btn-small btn-info" href="{{ URL::route("document-out-read-and-apply", $document->id) }}">Xem</a>
                    @else

                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection