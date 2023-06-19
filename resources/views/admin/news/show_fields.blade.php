<!-- Title En Field -->
<div class="col-sm-12">
    {!! Form::label('title_en', __('models/news.fields.title_en').':') !!}
    <p>{{ $news->title_en }}</p>
</div>

<!-- Title Ar Field -->
<div class="col-sm-12">
    {!! Form::label('title_ar', __('models/news.fields.title_ar').':') !!}
    <p>{{ $news->title_ar }}</p>
</div>

<!-- Details En Field -->
<div class="col-sm-12">
    {!! Form::label('details_en', __('models/news.fields.details_en').':') !!}
    <p>{{ $news->details_en }}</p>
</div>

<!-- Details Ar Field -->
<div class="col-sm-12">
    {!! Form::label('details_ar', __('models/news.fields.details_ar').':') !!}
    <p>{{ $news->details_ar }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', __('models/news.fields.image').':') !!}
    <p>{{ $news->image }}</p>
</div>

<!-- Slug En Field -->
<div class="col-sm-12">
    {!! Form::label('slug_en', __('models/news.fields.slug_en').':') !!}
    <p>{{ $news->slug_en }}</p>
</div>

<!-- Slug Ar Field -->
<div class="col-sm-12">
    {!! Form::label('slug_ar', __('models/news.fields.slug_ar').':') !!}
    <p>{{ $news->slug_ar }}</p>
</div>

<!-- Active Field -->
<div class="col-sm-12">
    {!! Form::label('active', __('models/news.fields.active').':') !!}
    <p>{{ $news->active }}</p>
</div>

