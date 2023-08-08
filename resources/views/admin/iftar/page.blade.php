@extends('admin.layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item active">تعديل وصف افطار</li>
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

                        {!! Form::model($kafarahDetails, ['route' => ['admin.iftar.update', $kafarahDetails->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        <div class="card-block">
                            <div class="row">


                                <!-- duration  Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('duration', ' المدة:') !!}
                                    {!! Form::textarea('duration', null, ['class' => 'form-control textarea', 'required']) !!}
                                </div>

                                <!-- amount  Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('amount', 'سعر السهم :') !!}
                                    {!! Form::textarea('amount', null, ['class' => 'form-control textarea', 'required']) !!}
                                </div>

                                <div class="form-group col-sm-6">
                                    @include('admin.components.imageInput', ['image' => asset($kafarahDetails->image)])
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
