<!-- Name En Field -->
<div class="col-sm-12">
    {!! Form::label('name_en', __('models/navSections.fields.name_en').':') !!}
    <p>{{ $navSection->name_en }}</p>
</div>

<!-- Name Ar Field -->
<div class="col-sm-12">
    {!! Form::label('name_ar', __('models/navSections.fields.name_ar').':') !!}
    <p>{{ $navSection->name_ar }}</p>
</div>

<!-- Active Field -->
<div class="col-sm-12">
    {!! Form::label('active', __('models/navSections.fields.active').':') !!}
    <p>{{ $navSection->active }}</p>
</div>

