{{-- {!! Form::open(['route' => ['admin.Kafarah.status', $id], 'method' => 'post']) !!} --}}
<div class='btn-group'>
     {!! Form::open(['route' => ['admin.iftar.destroy', $id], 'method' => 'delete', 'style' => 'display:inline']) !!}
    @csrf
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-outline-info btn-xs',
        'onclick' => 'return confirm("هل انت متاكد؟")',
    ]) !!}
    {!! Form::close() !!}

    <a href="{{ route('admin.iftar.edit', $id) }}" class='btn btn-outline-warning btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {{-- @if($active)
        {!! Form::button('<i class="fa fa-close"></i> إيقاف ', [
            'type' => 'submit',
            'class' => 'btn btn-outline-danger btn-xs',
            'onclick' => 'return confirm("هل انت متاكد؟")',
            'style' => 'margin-right:5px'
        ]) !!}
    @else
        {!! Form::button('<i class="fa fa-check"></i> تفعيل', [
            'type' => 'submit',
            'class' => 'btn btn-outline-success btn-xs',
            'onclick' => 'return confirm("هل انت متاكد؟")',
            'style' => 'margin-right:5px'
        ]) !!}
    @endif --}}
</div>
{{-- {!! Form::close() !!} --}}
