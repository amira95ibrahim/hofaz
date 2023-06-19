<!-- Name Ar Field -->
<div class="col-sm-12">
    {!! Form::label('name_ar', __('models/achievements.fields.name_ar').':') !!}
    <p>{{ $achievement->name_ar }}</p>
</div>

<!-- Name En Field -->
<div class="col-sm-12">
    {!! Form::label('name_en', __('models/achievements.fields.name_en').':') !!}
    <p>{{ $achievement->name_en }}</p>
</div>

<!-- Number Field -->
<div class="col-sm-12">
    {!! Form::label('number', __('models/achievements.fields.number').':') !!}
    <p>{{ $achievement->number }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', __('models/achievements.fields.image').':') !!}
    <p>{{ $achievement->image }}</p>
</div>

