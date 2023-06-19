{{--<!-- Type Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('type_id', __('models/kafalat.fields.type_id').':') !!}--}}
{{--    {!! Form::number('type_id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Country Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('country_id', __('models/kafalat.fields.country_id').':') !!}--}}
{{--    {!! Form::number('country_id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Name En Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('name_en', __('models/kafalat.fields.name_en').':') !!}--}}
{{--    {!! Form::text('name_en', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

{{--<!-- Name Ar Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('name_ar', __('models/kafalat.fields.name_ar').':') !!}--}}
{{--    {!! Form::text('name_ar', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

{{--<!-- Monthly Amount Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('monthly_amount', __('models/kafalat.fields.monthly_amount').':') !!}--}}
{{--    {!! Form::number('monthly_amount', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


{{--<!-- Image Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('image', __('models/kafalat.fields.image').':') !!}--}}
{{--    {!! Form::text('image', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}--}}
{{--</div>--}}

<div class="row">
    <div class="col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h4>اسم المكفول</h4>
                <div class="card-header-action">
                    <a data-collapse="#collapseExample" class="btn btn-icon btn-primary" href="#"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="card-block collapse in" id="collapseExample">
                <div class="row">
                    <div class="form-group col-sm-12">
                        {!! Form::label('name_ar', 'اسم المكفول:') !!}
                        @include('admin.components.nameInput')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card card-warning">
            <div class="card-header">
                <h4>دولة المكفول و القيمة الشهرية للكفالة</h4>
                <div class="card-header-action">
                    <a data-collapse="#collapseExample" class="btn btn-icon btn-warning" href="#"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="card-block collapse in" id="collapseExample">
                <div class="row">
                    <div class="form-group col-sm-12">
                        {!! Form::label('country_id', 'الدولة:') !!}
                        @include('admin.countries.activeList', ['selectedCountry' => (isset($kafala)) ? $kafala->country_id : null , 'disable_multiselect' => true])
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('monthly_amount', 'القيمة الشهرية للكفالة:') !!}
                        <div class="input-group">
                            {!! Form::number('monthly_amount', null, ['class' => 'form-control']) !!}
                            <span class="input-group-addon">د.ك</span>
                        </div>
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
                <h4>صورة المكفول</h4>
                <div class="card-header-action">
                    <a data-collapse="#collapseExample3" class="btn btn-icon btn-success" href="#"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="card-block collapse in" id="collapseExample3">
                <div class="row">
                    <!-- Image Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('image', 'الصورة:') !!}
                        @include('admin.components.imageInput', ['image' => (isset($kafala)) ? asset($kafala->image) : null])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card card-danger">
            <div class="card-header">
                <h4>بيانات المكفول</h4>
                <div class="card-header-action">
                    <a data-collapse="#collapseExample2" class="btn btn-icon btn-danger" href="#"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="card-block collapse in" id="collapseExample2">
                <div class="row">
                    <!-- Country Id Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('type_id', 'نوع الكفالة:') !!}
                        @include('admin.kafala_types.activeList', ['selectedType' => (isset($kafala)) ? $kafala->type_id : null])
                    </div>

                    @if(isset($kafala))
                        <input type="hidden" id="kafalaValues" value="{{ $kafala->kafalatValues }}">
                    @endif

                    <div class="appendBefore"></div>

                    <!-- Active Field -->
                    <div class="form-group col-sm-12">
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
