<!-- Name Ar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_ar', __('models/achievements.fields.name_ar').':') !!}
    {!! Form::text('name_ar', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Name En Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_en', __('models/achievements.fields.name_en').':') !!}
    {!! Form::text('name_en', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', __('models/achievements.fields.number').':') !!}
    {!! Form::number('number', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'الصورة:') !!}
    @include('admin.components.imageInput', ['image' => (isset($achievement)) ? asset($achievement->image) : null])
</div>
