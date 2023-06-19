<!-- Name En Field -->
<div class="col-sm-12">
    {!! Form::label('name_en', __('models/kafalaFields.fields.name_en').':') !!}
    <p>{{ $kafalaFields->name_en }}</p>
</div>

<!-- Name Ar Field -->
<div class="col-sm-12">
    {!! Form::label('name_ar', __('models/kafalaFields.fields.name_ar').':') !!}
    <p>{{ $kafalaFields->name_ar }}</p>
</div>

<!-- Datatype Field -->
<div class="col-sm-12">
    {!! Form::label('datatype', __('models/kafalaFields.fields.datatype').':') !!}
    <p>{{ $kafalaFields->datatype }}</p>
</div>

<!-- Active Field -->
<div class="col-sm-12">
    {!! Form::label('active', __('models/kafalaFields.fields.active').':') !!}
    <p>{{ $kafalaFields->active }}</p>
</div>

