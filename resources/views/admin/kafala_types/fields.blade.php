{{--<!-- Name En Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('name_en', __('models/kafalaTypes.fields.name_en').':') !!}--}}
{{--    {!! Form::text('name_en', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

{{--<!-- Name Ar Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('name_ar', __('models/kafalaTypes.fields.name_ar').':') !!}--}}
{{--    {!! Form::text('name_ar', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

<div class="form-group col-sm-6">
    {!! Form::label('name_ar', 'نوع الكفالة:') !!}
    @include('admin.components.nameInput')
</div>

{{--<!-- Description En Field -->--}}
{{--<div class="form-group col-sm-12 col-lg-12">--}}
{{--    {!! Form::label('description_en', __('models/kafalaTypes.fields.description_en').':') !!}--}}
{{--    {!! Form::textarea('description_en', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Description Ar Field -->--}}
{{--<div class="form-group col-sm-12 col-lg-12">--}}
{{--    {!! Form::label('description_ar', __('models/kafalaTypes.fields.description_ar').':') !!}--}}
{{--    {!! Form::textarea('description_ar', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<div class="form-group col-sm-6">
    {!! Form::label('name_ar', 'وصف النوع:') !!}
    @include('admin.components.descriptionInput')
</div>

<div class="form-group col-sm-12">
    {!! Form::label('field_id', 'الحقول:') !!}
    @include('admin.kafala_fields.activeList', ['selectedFields' => (isset($kafalaType)) ? $kafalaType->kafalaFields->pluck('id')->toArray() : null])
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('active', 0, ['class' => 'form-check-input']) !!}
    {!! Form::label('active', 'نشط:') !!}
    <label class="switch switch-icon switch-primary-outline-alt">
   {!! Form::checkbox('active', '1', null, ['class' => 'switch-input']) !!}
   <span class="switch-label" data-on="&#xf00c" data-off="&#xf00d"></span>
   <span class="switch-handle"></span>
    </label>
</div>
