{!! Form::open(['route' => ['admin.projects.status', $id], 'method' => 'post']) !!}
<div class='btn-group'style=" width:200px">


    <a href="{{ route('project.show', $id) }}" class='btn btn-outline-info btn-xs'>
       <i class="fa fa-share"></i>  رابط المشروع
   </a>


    @if($active)
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
    @endif
    <a href="{{ route('admin.projects.edit', $id) }}" class='btn btn-outline-warning btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
</div>
{!! Form::close() !!}

<script>
    $('.homepage').on('change', function(event) {
        event.stopPropagation();
        event.stopImmediatePropagation();
        if(confirm('هل انت متأكد؟') == true){
            $.ajax({
                url: '{{ url('admin/projects/homepage') }}' + '/' + $(this).attr('data-id'),
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function () {
                    console.log('succ');
                },
            });
        }
    });
</script>
