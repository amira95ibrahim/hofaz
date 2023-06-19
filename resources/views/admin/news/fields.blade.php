{{--<!-- Title En Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('title_en', __('models/news.fields.title_en').':') !!}--}}
{{--    {!! Form::text('title_en', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

{{--<!-- Title Ar Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('title_ar', __('models/news.fields.title_ar').':') !!}--}}
{{--    {!! Form::text('title_ar', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

{{--<!-- Details En Field -->--}}
{{--<div class="form-group col-sm-12 col-lg-12">--}}
{{--    {!! Form::label('details_en', __('models/news.fields.details_en').':') !!}--}}
{{--    {!! Form::textarea('details_en', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Details Ar Field -->--}}
{{--<div class="form-group col-sm-12 col-lg-12">--}}
{{--    {!! Form::label('details_ar', __('models/news.fields.details_ar').':') !!}--}}
{{--    {!! Form::textarea('details_ar', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Image Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('image', __('models/news.fields.image').':') !!}--}}
{{--    {!! Form::text('image', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

{{--<!-- Slug En Field -->--}}
{{--<div class="form-group col-sm-12 col-lg-12">--}}
{{--    {!! Form::label('slug_en', __('models/news.fields.slug_en').':') !!}--}}
{{--    {!! Form::textarea('slug_en', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Slug Ar Field -->--}}
{{--<div class="form-group col-sm-12 col-lg-12">--}}
{{--    {!! Form::label('slug_ar', __('models/news.fields.slug_ar').':') !!}--}}
{{--    {!! Form::textarea('slug_ar', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Active Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::hidden('active', 0, ['class' => 'form-check-input']) !!}--}}
{{--    {!! Form::label('active', __('models/news.fields.active').':') !!}--}}
{{--    <label class="switch switch-icon switch-primary-outline-alt">--}}
{{--   {!! Form::checkbox('active', '1', null, ['class' => 'switch-input']) !!}--}}
{{--   <span class="switch-label" data-on="&#xf00c" data-off="&#xf00d"></span>--}}
{{--   <span class="switch-handle"></span>--}}
{{--    </label>--}}
{{--</div>--}}

<div class="row">
    <div class="col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h4>عنوان و تفاصيل الخبر</h4>
                <div class="card-header-action">
                    <a data-collapse="#collapseExample" class="btn btn-icon btn-primary" href="#"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="card-block collapse in" id="collapseExample">
                <div class="row">
                    <div class="form-group col-sm-12">
                        {!! Form::label('name_ar', 'العنوان:') !!}
                        @include('admin.components.nameInput')
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('description_ar', 'التفاصيل:') !!}
                        @include('admin.components.descriptionInput')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card card-success">
            <div class="card-header">
                <h4>تاريخ و صورة الخبر</h4>
                <div class="card-header-action">
                    <a data-collapse="#collapseExample3" class="btn btn-icon btn-success" href="#"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="card-block collapse in" id="collapseExample3">
                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('publishing_date', 'تاريخ الخبر:') !!}
                        <input type="date" name="publishing_date" class="form-control" value="{{ (isset($news)) ? $news->publishing_date : null }}">
                    </div>

                    <!-- Image Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('image', 'الصورة:') !!}
                        @include('admin.components.imageInput', ['image' => (isset($news)) ? asset($news->image) : null])
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
                </div>
            </div>
        </div>
    </div>
</div>
