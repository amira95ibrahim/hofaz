<!-- amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', __('models/iftar.fields.amount').':') !!}
    <p>{{ $iftar->amount }}</p>
</div>

<!-- duration Field -->
<div class="col-sm-12">
    {!! Form::label('duration', __('models/iftar.fields.duration').':') !!}
    <p>{{ $iftar->duration }}</p>
</div>

<!-- Active Field -->
{{-- <div class="col-sm-12">
    {!! Form::label('active', __('models/kafarah.fields.active').':') !!}
    <p>{{ $sadaqah->active }}</p>
</div> --}}

