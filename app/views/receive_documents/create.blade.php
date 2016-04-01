@extends('layout.main')
@section('content')

    <script src="{{ url() }}/ckeditor/ckeditor.js"></script>

    <h3>SOẠN CÔNG VĂN ĐẾN</h3>
    <br>
    <br>
    <form role="form" action="{{ URL::route('document-receive-store') }}" method="post">

        <div class="form-group">
            <label 4for="document_type">Loại công văn:</label>
            <select name="document_type" id="document_type">
                @foreach( DB::table('document_types')->get() as $document_type )
                    <option value="{{ $document_type->id }}">{{ $document_type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="document_code">Số công văn:</label>
            <input type="text" name="document_code">
        </div>
        <div class="form-group">
            <label for="from_department">Đơn vị gửi:</label>
            <input type="text" name="from_department">
        </div>
        <div class="form-group">
            <label for="from_staff"> Người gửi:</label>
            <input type="text" name="from_staff">
        </div>
        <div class="form-group">
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title">
        </div>
        <div class="form-group">
            <label for="content">Nội dung:</label>
            <textarea type="text" name="content" id="content"></textarea>
        </div>
        <div class="form-group">
            <label for="title">Ngày gửi</label>
            <input type="date" name="time_send">
        </div>

        <div class="form-group">
            <label for="title">Ngày nhận</label>
            <input type="date" name="time_receive">
        </div>

        <div class="form-group">
            <label for="title">Trích yếu</label>
            <input type="text" name="short_content">
        </div>


        <input class="btn btn-success" type="submit" value="Tạo công văn đến">
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