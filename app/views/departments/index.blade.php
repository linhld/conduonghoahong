@extends('layout.main')
@section('content')


    <a class="btn btn-success" href="{{ URL::route('departments-create') }}">Tạo phòng ban </a>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Mã phòng ban</td>
            <td>Tên</td>
            <td>Sửa/ xóa</td>
        </tr>
        </thead>
        <tbody>
        @foreach($departments as $index => $department)
            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->name }}</td>
                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::route("departments-edit", $department->id) }}">Sửa</a>
                    <a class="delete btn btn-small btn-danger" href="{{ URL::route("departments-destroy", $department->id ) }}">Xóa</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection