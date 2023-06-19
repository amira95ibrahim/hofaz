{!! Form::open(['route' => ['admin.testimonials.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <!-- <a href="{{ route('admin.testimonials.show', $id) }}" class='btn btn-outline-info btn-xs'>
        <i class="fa fa-eye"></i>
    </a> -->
    <a href="{{ route('admin.testimonials.edit', $id) }}" class='btn btn-outline-warning btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-outline-danger btn-xs',
        'onclick' => 'return confirm("هل انت متاكد؟")'
    ]) !!}
</div>
{!! Form::close() !!}
