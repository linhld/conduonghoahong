@extends('layout.main')
@section('content')

    <script src="{{ url() }}/ckeditor/ckeditor.js"></script>

    <h3>SỬA CÔNG VĂN ĐI</h3>
    <br>
    <br>
    <form role="form" action="{{ URL::route('document-out-update', $document->id) }}" method="post">

        <div class="form-group">
            <label for="document_type">Loại công văn:</label>
            <select name="document_type" id="document_type">
                @foreach( DB::table('document_types')->get() as $document_type )
                    <!-- chon mac dinh cua selectbox là type của document này -->
                    <option
                        @if($document_type->id == $document->document_type)
                        selected
                        @endif
                        value="{{ $document_type->id }}">
                        {{ $document_type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="document_code">Số công văn đi:</label>
            <input type="text" name="document_out_code"  value="{{ $document->document_out_code }}">
        </div>
        <div class="form-group">
            <label for="from_department">Đơn vị gửi:</label>
            <input type="text" name="from_department" value="{{ $document->from_department }}">
        </div>
        <div class="form-group">
            <label for="from_staff"> Người gửi:</label>
            <input type="text" name="from_staff"  value="{{ $document->from_staff }}">
        </div>

        <div class="form-group">
            <label for="from_department">Đơn vị nhận:</label>
            <input type="text" name="from_department" value="{{ $document->to_department }}">
        </div>
        <div class="form-group">
            <label for="from_staff"> Người nhận:</label>
            <input type="text" name="from_staff"  value="{{ $document->to_staff }}">
        </div>

        <div class="form-group">
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title"  value="{{ $document->title }}">
        </div>
        <div class="form-group">
            <label for="content">Nội dung:</label>
            <textarea type="text" name="content" id="content">{{ $document->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Ngày gửi</label>
            <input type="date" disabled name="time_send" value="{{ $document->time_send }}">
        </div>

        <div class="form-group">
            <label for="title">Trích yếu</label>
            <input type="text" name="short_content" value="{{ $document->short_content }}">
        </div>

        <input class="btn btn-success" type="submit" value="Cập nhật">
        {{ Form::token() }}
    </form>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'content' );

    </script>
@endsection