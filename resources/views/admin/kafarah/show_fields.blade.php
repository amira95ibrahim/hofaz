<!-- Name En Field -->
<div class="col-sm-12">
    {!! Form::label('name_en', __('models/kafarah.fields.name_en').':') !!}
    <p>{{ $sadaqah->name_en }}</p>
</div>

<!-- Name Ar Field -->
<div class="col-sm-12">
    {!! Form::label('name_ar', __('models/kafarah.fields.name_ar').':') !!}
    <p>{{ $sadaqah->name_ar }}</p>
</div>

<!-- Active Field -->
<div class="col-sm-12">
    {!! Form::label('active', __('models/kafarah.fields.active').':') !!}
    <p>{{ $sadaqah->active }}</p>
</div>

