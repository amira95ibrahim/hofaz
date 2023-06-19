@push('page_css')
    <link rel="stylesheet" href="{{ asset('vendor/tagify/tagify.css') }}">
@endpush
<div class="row">
    <div class="col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h4>بيانات الموقع</h4>
                <div class="card-header-action">
                    <a data-collapse="#collapseExample" class="btn btn-icon btn-primary" href="#"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="card-block collapse in" id="collapseExample">
                <div class="row">
                    <div class="form-group col-sm-12">
                        {!! Form::label('name_ar', 'اسم الموقع:') !!}
                        @include('admin.components.siteTitleInput')
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('adminFooter', 'تذييل لوحة التحكم:') !!}
                        {!! Form::text('adminFooter', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('frontWebsiteFooter_ar', 'تذييل الموقع:') !!}
                        @include('admin.components.frontWebsiteFooterInput')
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('location', 'الموقع:') !!}
                        {!! Form::text('location', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('phoneNumber', 'الهاتف:') !!}
                        {!! Form::text('phoneNumber', null, ['class' => 'form-control', 'maxlength' => 30]) !!}
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('postalCode', 'صندوق البريد:') !!}
                        {!! Form::text('postalCode', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('address', 'العنوان:') !!}
                        {!! Form::text('address', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('keywords', 'كلمات مفتاحية للموقع :') !!}
                        @include('admin.components.keywordsInput')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card card-warning">
            <div class="card-header">
                <h4>سوشيال ميديا</h4>
                <div class="card-header-action">
                    <a data-collapse="#collapseExample2" class="btn btn-icon btn-warning" href="#"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="card-block collapse in" id="collapseExample2">
                <div class="row">

                    <div class="form-group col-sm-12">
                        {!! Form::label('facebook', 'فيس بوك:') !!}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                            {!! Form::text('facebook', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('whatsapp', 'واتس:') !!}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-whatsapp"></i></span>
                            {!! Form::text('whatsapp', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('googlePlus', 'جوجل:') !!}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                            {!! Form::text('googlePlus', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('instagram', 'انستغرام:') !!}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                            {!! Form::text('instagram', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('twitterAddress', 'تويتر:') !!}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                            {!! Form::text('twitterAddress', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('youtubeAddress', 'يوتيوب:') !!}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                            {!! Form::text('youtubeAddress', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

