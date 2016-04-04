@extends('layout.main')
@section('content')

    <form role="form" action="{{ URL::route('document-receive-action', $document->id) }}?action=apply">

        <? echo $document_body ?>

        @foreach( Department::all() as $department )
            <input type="checkbox" class="to_department" name="to_department" value="{{ $department->id  }}">{{ $department->name }}<br>

        @endforeach

        <input class="btn btn-success" type="submit" value="Duyệt">
        {{ Form::token() }}
    </form>

    <script>
        $(".to_department").change( function(){
            var department_id = $(this).val();

            if(this.checked) {
                $.ajax({
                            method: "POST",
                            url: "{{ url() }}/get_department_staff",
                            data: {department_id: department_id}
                        })
                        .done(function (msg) {
                            $(this).closest("br").append("<fdf");
                        });
            }
            else{
                alert("uncheck");
            }
        });
    </script>
@endsection