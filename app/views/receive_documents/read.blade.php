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
            {{ $document->time_receive }}
        </div>

        <div class="form-group">
            <label for="title">Trích yếu</label>
            {{ $document->short_content }}
        </div>

        <div>
            <button id="prev" onclick="return false;">trước</button>
            <button id="next" onclick="return false;">sau</button>
            &nbsp; &nbsp;
            <span>Trang: <span id="page_num">1</span> / <span id="page_count">14</span></span>
        </div>

        <div>
            <canvas id="the-canvas" style="border:1px solid black" height="633" width="489"></canvas>
        </div>

        <script src="{{ url() }}/pdfjs/build/pdf.js"></script>

        <script id="script">
            //
            // If absolute URL from the remote server is provided, configure the CORS
            // header on that server.
            //
            var url = '{{ url() }}/origin_receive/{{ $document->origin_document }}';


            //
            // Disable workers to avoid yet another cross-origin issue (workers need
            // the URL of the script to be loaded, and dynamically loading a cross-origin
            // script does not work).
            //
            // PDFJS.disableWorker = true;

            //
            // In cases when the pdf.worker.js is located at the different folder than the
            // pdf.js's one, or the pdf.js is executed via eval(), the workerSrc property
            // shall be specified.
            //
            // PDFJS.workerSrc = '../../build/pdf.worker.js';

            var pdfDoc = null,
                    pageNum = 1,
                    pageRendering = false,
                    pageNumPending = null,
                    scale = 0.8,
                    canvas = document.getElementById('the-canvas'),
                    ctx = canvas.getContext('2d');

            /**
             * Get page info from document, resize canvas accordingly, and render page.
             * @param num Page number.
             */
            function renderPage(num) {
                pageRendering = true;
                // Using promise to fetch the page
                pdfDoc.getPage(num).then(function(page) {
                    var viewport = page.getViewport(scale);
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render PDF page into canvas context
                    var renderContext = {
                        canvasContext: ctx,
                        viewport: viewport
                    };
                    var renderTask = page.render(renderContext);

            // Wait for rendering to finish
            renderTask.promise.then(function () {
                pageRendering = false;
                if (pageNumPending !== null) {
                    // New page rendering is pending
                    renderPage(pageNumPending);
                    pageNumPending = null;
                }
            });
        });

        // Update page counters
        document.getElementById('page_num').textContent = pageNum;
    }

    /**
     * If another page rendering in progress, waits until the rendering is
     * finised. Otherwise, executes rendering immediately.
     */
    function queueRenderPage(num) {
        if (pageRendering) {
            pageNumPending = num;
        } else {
            renderPage(num);
        }
    }

    /**
     * Displays previous page.
     */
    function onPrevPage() {
        if (pageNum <= 1) {
            return;
        }
        pageNum--;
        queueRenderPage(pageNum);
    }
    document.getElementById('prev').addEventListener('click', onPrevPage);

    /**
     * Displays next page.
     */
    function onNextPage() {
        if (pageNum >= pdfDoc.numPages) {
            return;
        }
        pageNum++;
        queueRenderPage(pageNum);
    }
    document.getElementById('next').addEventListener('click', onNextPage);

    /**
     * Asynchronously downloads PDF.
     */
    PDFJS.getDocument(url).then(function (pdfDoc_) {
        pdfDoc = pdfDoc_;
        document.getElementById('page_count').textContent = pdfDoc.numPages;

        // Initial/first page rendering
        renderPage(pageNum);
    });
</script>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'content' );

        $("#to_department").change( function() {
            var department_id = $(this).val();

        });
    </script>
sau
<br><br><br>