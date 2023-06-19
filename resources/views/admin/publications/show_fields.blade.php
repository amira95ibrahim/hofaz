<!-- Name Ar Field -->
<div class="col-sm-12">
    {!! Form::label('name_ar', __('models/publications.fields.name_ar').':') !!}
    <p>{{ $publication->name_ar }}</p>
</div>

<!-- Name En Field -->
<div class="col-sm-12">
    {!! Form::label('name_en', __('models/publications.fields.name_en').':') !!}
    <p>{{ $publication->name_en }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', __('models/publications.fields.image').':') !!}
    <p>{{ $publication->image }}</p>
</div>

<!-- Pdf Field -->
<div class="col-sm-12">
    {!! Form::label('pdf', __('models/publications.fields.pdf').':') !!}
    <p>{{ $publication->pdf }}</p>
</div>

