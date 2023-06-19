{{--<!-- Name Ar Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('name_ar', __('models/testimonials.fields.name_ar').':') !!}--}}
{{--    {!! Form::text('name_ar', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

{{--<!-- Name En Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('name_en', __('models/testimonials.fields.name_en').':') !!}--}}
{{--    {!! Form::text('name_en', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

<div class="form-group col-sm-6">
    {!! Form::label('name_ar', 'الاسم:') !!}
    @include('admin.components.nameInput')
</div>

{{--<!-- Job Ar Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('job_ar', __('models/testimonials.fields.job_ar').':') !!}--}}
{{--    {!! Form::text('job_ar', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

{{--<!-- Job En Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('job_en', __('models/testimonials.fields.job_en').':') !!}--}}
{{--    {!! Form::text('job_en', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

<div class="form-group col-sm-6">
    {!! Form::label('job_ar', 'الوظيفة:') !!}
    @include('admin.components.jobInput')
</div>

{{--<!-- Testimonial Ar Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('testimonial_ar', __('models/testimonials.fields.testimonial_ar').':') !!}--}}
{{--    {!! Form::text('testimonial_ar', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

{{--<!-- Testimonial En Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('testimonial_en', __('models/testimonials.fields.testimonial_en').':') !!}--}}
{{--    {!! Form::text('testimonial_en', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

<div class="form-group col-sm-12">
    {!! Form::label('testimonial_ar', 'قال:') !!}
    @include('admin.components.testimonialInput')
</div>

<div class="form-group col-sm-6">
    {!! Form::label('image', 'الصورة:') !!}
    @include('admin.components.imageInput', ['image' => (isset($testimonial)) ? asset($testimonial->image) : null])
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('active', 0, ['class' => 'form-check-input']) !!}
    {!! Form::label('active', __('models/testimonials.fields.active').':') !!}
    <label class="switch switch-icon switch-primary-outline-alt">
   {!! Form::checkbox('active', '1', null, ['class' => 'switch-input']) !!}
   <span class="switch-label" data-on="&#xf00c" data-off="&#xf00d"></span>
   <span class="switch-handle"></span>
    </label>
</div>
