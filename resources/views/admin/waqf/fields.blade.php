<div class="row">
    <div class="col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h4>بيانات الوقف</h4>
                <div class="card-header-action">
                    <a data-collapse="#collapseExample" class="btn btn-icon btn-primary" href="#"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="card-block collapse in" id="collapseExample">
                <div class="row">
                    <!-- Name En Field -->
                    {{--<div class="form-group col-sm-6">--}}
                    {{--    <div class="form-group col-sm-6"><div class="form-group col-sm-6">--}}
                    {{--    {!! Form::text('name_en', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
                    {{--</div>--}}

                    {{--<!-- Name Ar Field -->--}}
                    {{--<div class="form-group col-sm-6">--}}
                    {{--    {!! Form::label('name_ar', __('models/projects.fields.name_ar').':') !!}--}}
                    {{--    {!! Form::text('name_ar', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
                    {{--</div>--}}

                    <div class="form-group col-sm-12">
                        {!! Form::label('name_ar', 'اسم الوقف:') !!}
                        @include('admin.components.nameInput')
                    </div>

                    <!-- Description En Field -->
                    {{--<div class="form-group col-sm-6">--}}
                    {{--{!! Form::label('description_en', __('models/projects.fields.description_en').':') !!}--}}
                    {{--{!! Form::text('description_en', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
                    {{--</div>--}}

                    {{--<!-- Description Ar Field -->--}}
                    {{--<div class="form-group col-sm-6">--}}
                    {{--{!! Form::label('description_ar', __('models/projects.fields.description_ar').':') !!}--}}
                    {{--{!! Form::text('description_ar', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
                    {{--</div>--}}

                    <div class="form-group col-sm-12">
                        {!! Form::label('description_ar', 'تفاصيل الوقف:') !!}
                        @include('admin.components.descriptionInput')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card card-warning">
            <div class="card-header">
                <h4>البيانات المالية</h4>
                <div class="card-header-action">
                    <a data-collapse="#collapseExample2" class="btn btn-icon btn-warning" href="#"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="card-block collapse in" id="collapseExample2">
                <div class="row">

                    <!-- Cost Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('cost', 'قيمة الوقف:') !!}
                        <div class="input-group">
                            {!! Form::number('cost', null, ['class' => 'form-control']) !!}
                            <span class="input-group-addon">د.ك</span>
                        </div>
                    </div>

                    <!-- Paid Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('paid', 'المحصل من التبرعات:') !!}
                        <div class="input-group">
                            {!! Form::number('paid', null, ['class' => 'form-control']) !!}
                            <span class="input-group-addon">د.ك</span>
                        </div>
                    </div>

                    <!-- Initial Amount Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('initial_amount', 'القيمة الافتراضية للتبرع:') !!}
                        <div class="input-group">
                            {!! Form::number('initial_amount', null, ['class' => 'form-control']) !!}
                            <span class="input-group-addon">د.ك</span>
                        </div>
                    </div>

                    <!-- Show Remaining Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::hidden('show_remaining', 0, ['class' => 'form-check-input']) !!}
                        {!! Form::label('show_remaining', 'عرض المتبقي:') !!}
                        <label class="switch switch-icon switch-primary-outline-alt">
                            {!! Form::checkbox('show_remaining', '1', null, ['class' => 'switch-input']) !!}
                            <span class="switch-label" data-on="&#xf00c" data-off="&#xf00d"></span>
                            <span class="switch-handle"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="card card-success">
            <div class="card-header">
                <h4>صورة الوقف</h4>
                <div class="card-header-action">
                    <a data-collapse="#collapseExample3" class="btn btn-icon btn-success" href="#"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="card-block collapse in" id="collapseExample3">
                <div class="row">
                    <!-- Image Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('image', 'الصورة:') !!}
                        {{--{!! Form::text('image', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
                        @include('admin.components.imageInput', ['image' => (isset($waqf)) ? asset($waqf->image) : null])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card card-danger">
            <div class="card-header">
                <h4>بيانات اضافية</h4>
                <div class="card-header-action">
                    <a data-collapse="#collapseExample2" class="btn btn-icon btn-danger" href="#"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="card-block collapse in" id="collapseExample2">
                <div class="row">
                    <!-- Country Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('country_id', 'الدولة:') !!}
                        @include('admin.countries.activeList', ['selectedCountry' => (isset($waqf)) ? $waqf->country_id : null, 'disable_multiselect' => (isset($waqf))])
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
