@extends('layout.main')
@section('content')

    <script src="{{ url() }}/ckeditor/ckeditor.js"></script>

    <h3>SOẠN CÔNG VĂN ĐI</h3>
    <br>
    <br>
    <form role="form" action="{{ URL::route('document-out-store') }}" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="document_code">Số công văn đi:</label>
            <input type="text" name="document_out_code" value="{{ Input::old('document_out_code') }}">
        </div>

        <div class="form-group">
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title" value="{{ Input::old('title') }}">
        </div>
        <div class="form-group">
            <label for="content">Nội dung:</label>
            <textarea type="text" name="content" id="content">{{ Input::old('content') }}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Ngày gửi</label>
            <input type="date" name="time_send" value="{{ Input::old('time_send') }}">
        </div>

        <div class="form-group">
            <label for="title">Trích yếu</label>
            <input type="text" name="short_content" value="{{ Input::old('short_content') }}">
        </div>

        <div class="form-group">
            <label for="title">Văn bản gốc:</label>
            <input type="file" name="origin_document" accept="application/pdf,application/msword,
  application/vnd.ms-powerpoint,.docx,image/*">
        </div>


        <input class="btn btn-success" type="submit" value="Tạo công văn đi">

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