<!-- Name En Field -->
<div class="col-sm-12">
    {!! Form::label('name_en', __('models/countries.fields.name_en').':') !!}
    <p>{{ $country->name_en }}</p>
</div>

<!-- Name Ar Field -->
<div class="col-sm-12">
    {!! Form::label('name_ar', __('models/countries.fields.name_ar').':') !!}
    <p>{{ $country->name_ar }}</p>
</div>

<!-- Code Field -->
<div class="col-sm-12">
    {!! Form::label('code', __('models/countries.fields.code').':') !!}
    <p>{{ $country->code }}</p>
</div>

<!-- Phone Code Field -->
<div class="col-sm-12">
    {!! Form::label('phone_code', __('models/countries.fields.phone_code').':') !!}
    <p>{{ $country->phone_code }}</p>
</div>

<!-- Active Field -->
<div class="col-sm-12">
    {!! Form::label('active', __('models/countries.fields.active').':') !!}
    <p>{{ $country->active }}</p>
</div>

