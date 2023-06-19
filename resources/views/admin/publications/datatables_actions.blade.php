{!! Form::open(['route' => ['admin.publications.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <!-- <a href="{{ route('admin.publications.show', $id) }}" class='btn btn-outline-info btn-xs'>
        <i class="fa fa-eye"></i>
    </a> -->
    <a href="{{ route('admin.publications.edit', $id) }}" class='btn btn-outline-warning btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-outline-danger btn-xs',
        'onclick' => 'return confirm("هل انت متأكد؟")'
    ]) !!}
</div>
{!! Form::close() !!}

<script>
    $('.homepage').on('change', function(event) {
        event.stopPropagation();
        event.stopImmediatePropagation();
        if(confirm('هل انت متأكد؟') == true){
            $.ajax({
                url: '{{ url('admin/publications/homepage') }}' + '/' + $(this).attr('data-id'),
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
