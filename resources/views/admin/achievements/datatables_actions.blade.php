{{--{!! Form::open(['route' => ['admin.achievements.destroy', $id], 'method' => 'delete']) !!}--}}
<div class='btn-group'>
    <!-- <a href="{{ route('admin.achievements.show', $id) }}" class='btn btn-outline-info btn-xs'>
        <i class="fa fa-eye"></i>
    </a> -->
    <a href="{{ route('admin.achievements.edit', $id) }}" class='btn btn-outline-warning btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
{{--    {!! Form::button('<i class="fa fa-trash"></i>', [--}}
{{--        'type' => 'submit',--}}
{{--        'class' => 'btn btn-outline-danger btn-xs',--}}
{{--        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'--}}
{{--    ]) !!}--}}
</div>
{{--{!! Form::close() !!}--}}
