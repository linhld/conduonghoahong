@extends('layout.main')
@section('content')

    <script src="{{ url() }}/ckeditor/ckeditor.js"></script>

    <h3>SOẠN CÔNG VĂN ĐI</h3>
    <br>
    <br>
    <form role="form" action="{{ URL::route('document-out-store') }}" method="post">

        <div class="form-group">
            <label 4for="document_type">Loại công văn:</label>
            <select name="document_type" id="document_type">
                @foreach( DB::table('document_types')->get() as $document_type )
                    <option value="{{ $document_type->id }}">{{ $document_type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="document_code">Số công văn đi:</label>
            <input type="text" name="document_out_code" value="{{ Input::old('document_out_code') }}">
        </div>

        <div class="form-group">
            <label for="from_department">Đơn vị gửi:</label>
            <input type="text" name="from_department" value="{{ Input::old('from_department') }}">
        </div>
        <div class="form-group">
            <label for="from_staff"> Người gửi:</label>
            <input type="text" name="from_staff" value="{{ Input::old('from_staff') }}">
        </div>

        <div class="form-group">
            <label for="from_department">Đơn vị nhận :</label>
            <input type="text" name="to_department" value="{{ Input::old('to_department') }}">
        </div>
        <div class="form-group">
            <label for="from_staff"> Người nhận:</label>
            <input type="text" name="to_staff" value="{{ Input::old('to_staff') }}">
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