@extends('admin.layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item active">تعديل وصف المشاريع </li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    @include('adminlte-templates::common.errors')

                    <div class="card">

                        {!! Form::model($projectsDetails, ['route' => ['admin.projectsPage.update', $projectsDetails->id], 'method' => 'patch']) !!}

                        <div class="card-block">
                            <div class="row">
                                <!-- Name En Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('title_en', 'العنوان بالانجليزية:') !!}
                                    {!! Form::text('title_en', null, ['class' => 'form-control', 'required']) !!}
                                </div>

                                <!-- Name Ar Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('title_ar', 'العنوان بالعربية:') !!}
                                    {!! Form::text('title_ar', null, ['class' => 'form-control', 'required']) !!}
                                </div>

                                <!-- Name En Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('details_en', 'التفاصيل بالانجليزية:') !!}
                                    {!! Form::textarea('details_en', null, ['class' => 'form-control textarea', 'required']) !!}
                                </div>

                                <!-- Name Ar Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('details_ar', 'التفاصيل بالعربية:') !!}
                                    {!! Form::textarea('details_ar', null, ['class' => 'form-control textarea', 'required']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('admin.home') }}" class="btn btn-default">
                                رجوع
                            </a>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
