{!! Form::open(['route' => ['admin.homepageSliders.status', $id], 'method' => 'post', 'id' => 'changeStatusForm_' . $id]) !!}
{!! Form::close() !!}
{!! Form::open(['route' => ['admin.homepageSliders.destroy', $id], 'method' => 'delete', 'id' => 'deleteRowForm_' . $id]) !!}
{!! Form::close() !!}
<div class='btn-group'>
{{--    <!-- <a href="{{ route('admin.homepageSliders.show', $id) }}" class='btn btn-outline-info btn-xs'>--}}
{{--        <i class="fa fa-eye"></i>--}}
{{--    </a> -->--}}

    @if($active)
        {!! Form::button('<i class="fa fa-close"></i> إيقاف ', [
            'type' => 'submit',
            'class' => 'btn btn-outline-danger btn-xs',
            'onclick' => 'updateStatus("'. $id . '")',
            'style' => 'margin-right:5px'
        ]) !!}
    @else
        {!! Form::button('<i class="fa fa-check"></i> تفعيل', [
            'type' => 'submit',
            'class' => 'btn btn-outline-success btn-xs',
            'onclick' => 'updateStatus("'. $id . '")',
            'style' => 'margin-right:5px'
        ]) !!}
    @endif

    <a href="{{ route('admin.homepageSliders.edit', $id) }}" class='btn btn-outline-warning btn-xs'>
        <i class="fa fa-edit"></i>
    </a>

    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-outline-danger btn-xs',
        'onclick' => 'deleteRow("'. $id . '")'
    ]) !!}

</div>

<script>
    function updateStatus(id){
        if(confirm("هل انت متاكد؟") === true){
            return $('#changeStatusForm_' + id).submit();
        }
    }

    function deleteRow(id){
        if(confirm("هل انت متاكد؟") === true){
            return $('#deleteRowForm_' + id).submit();
        }
    }
</script>

