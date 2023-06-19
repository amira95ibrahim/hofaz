<!-- Name En Field -->
<div class="col-sm-12">
    {!! Form::label('name_en', __('models/kafalaTypes.fields.name_en').':') !!}
    <p>{{ $kafalaType->name_en }}</p>
</div>

<!-- Name Ar Field -->
<div class="col-sm-12">
    {!! Form::label('name_ar', __('models/kafalaTypes.fields.name_ar').':') !!}
    <p>{{ $kafalaType->name_ar }}</p>
</div>

<!-- Description En Field -->
<div class="col-sm-12">
    {!! Form::label('description_en', __('models/kafalaTypes.fields.description_en').':') !!}
    <p>{{ $kafalaType->description_en }}</p>
</div>

<!-- Description Ar Field -->
<div class="col-sm-12">
    {!! Form::label('description_ar', __('models/kafalaTypes.fields.description_ar').':') !!}
    <p>{{ $kafalaType->description_ar }}</p>
</div>

<!-- Active Field -->
<div class="col-sm-12">
    {!! Form::label('active', __('models/kafalaTypes.fields.active').':') !!}
    <p>{{ $kafalaType->active }}</p>
</div>

