<script src="{{ url() }}/ckeditor/ckeditor.js"></script>

        <div class="form-group">
            <label for="document_type">Loại công văn:</label>
            {{ $document->get_name_of_type() }}

        </div>

        <div class="form-group">
            <label for="document_code">Số công văn:</label>
            {{ $document->document_code }}
        </div>
        <div class="form-group">
            <label for="from_department">Đơn vị gửi:</label>
            {{ $document->from_department }}
        </div>
        <div class="form-group">
            <label for="from_staff"> Người gửi:</label>
            {{ $document->from_staff }}
        </div>
        <div class="form-group">
            <label for="title">Tiêu đề:</label>
            {{  $document->title }}
        </div>
        <div class="form-group">
            <label for="content">Nội dung:</label>
            {{ $document->content }}
        </div>
        <div class="form-group">
            <label for="title">Ngày gửi</label>
            {{  $document->time_send }}
        </div>

        <div class="form-group">
            <label for="title">Ngày nhận</label>
            {{ $document->time_out }}
        </div>

        <div class="form-group">
            <label for="title">Trích yếu</label>
            {{ $document->short_content }}
        </div>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'content' );

        $("#to_department").change( function() {
            var department_id = $(this).val();

        });
    </script>
