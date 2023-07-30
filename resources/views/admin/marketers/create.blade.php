@extends('admin.layouts.app')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.marketers.index') }}">المندوبين</a>
        </li>
        <li class="breadcrumb-item active">إضافة مندوب  جديد</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    @include('adminlte-templates::common.errors')
                    {!! Form::open(['route' => 'admin.marketers.store', 'enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        @include('admin.marketers.fields')
                    </div>

                    {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('admin.marketers.index') }}" class="btn btn-default">
                        رجوع
                    </a>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

