@extends('layout.main')
@section('content')

    <script src="{{ url() }}/ckeditor/ckeditor.js"></script>

    <h3>SOẠN CÔNG VĂN ĐẾN</h3>
    <br>
    <br>
    <form role="form" action="{{ URL::route('document-store') }}" method="post">
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
            <label for="to_department">Đơn vị xử lí</label>
            <select name="to_department" id="to_department">
                @foreach( Department::all() as $department )
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="to_staff">Người xử lí</label>
            <select name="to_staff" id="to_staff">
            </select>
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