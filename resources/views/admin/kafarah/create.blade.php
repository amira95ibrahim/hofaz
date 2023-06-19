@extends('admin.layouts.app')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.sadaqat.index') }}">اوجه الصدقات</a>
        </li>
        <li class="breadcrumb-item active">إضافة وجه صدقة جديد</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    @include('adminlte-templates::common.errors')
                    <div class="card">
                        {!! Form::open(['route' => 'admin.sadaqat.store']) !!}

                        <div class="card-block">
                            <div class="row">
                                @include('admin.sadaqat.fields')
                            </div>
                        </div>

                        <div class="card-footer">
                            {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('admin.sadaqat.index') }}" class="btn btn-default">
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
