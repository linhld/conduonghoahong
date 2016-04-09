@extends('layout.main')
@section('content')

    <form role="form" method="POST" action="{{ URL::route('document-out-action', $document->id) }}">

        <?php echo $document_body ?>

            <button class="btn btn-success" type="submit" name="action" value="apply"> Chấp nhận</button>
            <button class="btn btn-alert" type="submit" name="action" value="eject">từ chối</button>

            {{ Form::token() }}
    </form>

    {{--<script>--}}
        {{--$(".to_department").change( function(){--}}
            {{--var department_id = $(this).val();--}}

            {{--if(this.checked) {--}}
                {{--$.ajax({--}}
                            {{--method: "POST",--}}
                            {{--url: "{{ url() }}/get_department_staff",--}}
                            {{--data: {department_id: department_id}--}}
                        {{--})--}}
                        {{--.done(function (msg) {--}}
                            {{--$(this).closest("br").append("<fdf");--}}
                        {{--});--}}
            {{--}--}}
            {{--else{--}}
                {{--alert("uncheck");--}}
            {{--}--}}
        {{--});--}}
    {{--</script>--}}
@endsection