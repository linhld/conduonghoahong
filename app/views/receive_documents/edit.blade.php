@extends('layout.main')
@section('content')

    <script src="{{ url() }}/ckeditor/ckeditor.js"></script>

    <h3>SỬA CÔNG VĂN ĐẾN</h3>
    <br>
    <br>
    <form role="form" action="{{ URL::route('document-receive-update', $document->id) }}" method="post">

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
            <label for="document_code">Số công văn:</label>
            <input type="text" name="document_code"  value="{{ $document->document_code }}">
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
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title"  value="{{ $document->title }}">
        </div>
        <div class="form-group">
            <label for="content">Nội dung:</label>
            <textarea type="text" name="content" id="content">{{ $document->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Ngày gửi</label>
            <input type="date" name="time_send" value="{{ $document->time_send }}">
        </div>

        <div class="form-group">
            <label for="title">Ngày nhận</label>
            <input type="date" name="time_receive" value="{{ $document->time_receive }}">
        </div>

        @if( Auth::user()->role == Config::get("user.role")["staff"] )
            <div class="form-group">
                <label for="to_department">Đơn vị xử lí</label>
                <select name="to_department" id="to_department">
                    @foreach( Department::all() as $document )
                        <option value="{{ $document->id }}">{{ $document->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="to_staff">Người xử lí</label>
                <select name="to_staff" id="to_staff">
                </select>
            </div>
        @endif

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


        $("#to_department").change( function(){
            var department_id = $(this).val();

            $.ajax({
                        method: "POST",
                        url: "{{ url() }}/get_department_staff",
                        data: { department_id : department_id }
                    })
                    .done(function( msg ) {
                        $("#to_staff").html(msg);
                    });
        });


    </script>
@endsection