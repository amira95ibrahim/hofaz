<!-- Name En Field -->
<div class="col-sm-12">
    {!! Form::label('amount', __('models/iftar.fields.amount').':') !!}
    <p>{{ $sadaqah->amount }}</p>
</div>

<!-- Name Ar Field -->
<div class="col-sm-12">
    {!! Form::label('duration', __('models/iftar.fields.duration').':') !!}
    <p>{{ $sadaqah->duration }}</p>
</div>

<!-- Active Field -->
<div class="col-sm-12">
    {!! Form::label('active', __('models/kafarah.fields.active').':') !!}
    <p>{{ $sadaqah->active }}</p>
</div>

