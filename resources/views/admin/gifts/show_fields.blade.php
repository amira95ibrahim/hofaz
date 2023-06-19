<!-- Model Field -->
<div class="col-sm-12">
    {!! Form::label('model', __('models/gifts.fields.model').':') !!}
    <p>{{ $gift->model }}</p>
</div>

<!-- Model Id Field -->
<div class="col-sm-12">
    {!! Form::label('model_id', __('models/gifts.fields.model_id').':') !!}
    <p>{{ $gift->model_id }}</p>
</div>

<!-- Active Field -->
<div class="col-sm-12">
    {!! Form::label('active', __('models/gifts.fields.active').':') !!}
    <p>{{ $gift->active }}</p>
</div>

