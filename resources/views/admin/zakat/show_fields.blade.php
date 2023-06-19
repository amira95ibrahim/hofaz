<!-- Name En Field -->
<div class="col-sm-12">
    {!! Form::label('name_en', __('models/zakat.fields.name_en').':') !!}
    <p>{{ $zakah->name_en }}</p>
</div>

<!-- Name Ar Field -->
<div class="col-sm-12">
    {!! Form::label('name_ar', __('models/zakat.fields.name_ar').':') !!}
    <p>{{ $zakah->name_ar }}</p>
</div>

<!-- Active Field -->
<div class="col-sm-12">
    {!! Form::label('active', __('models/zakat.fields.active').':') !!}
    <p>{{ $zakah->active }}</p>
</div>

