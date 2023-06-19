@extends('admin.layouts.app')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.zakat.index') }}">زكاة</a>
        </li>
        <li class="breadcrumb-item active">إضافة وجه زكاة جديد</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                @include('adminlte-templates::common.errors')
                    <div class="card">
                        {!! Form::open(['route' => 'admin.zakat.store']) !!}

                        <div class="card-block">
                            <div class="row">
                                @include('admin.zakat.fields')
                            </div>
                        </div>

                        <div class="card-footer">
                            {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('admin.zakat.index') }}" class="btn btn-default">
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
