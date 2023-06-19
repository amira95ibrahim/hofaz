@extends('admin.layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.zakat.index') }}">اوجه الزكاة</a>
        </li>
        <li class="breadcrumb-item active">تعديل: {{ $zakah->name }}</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">

                    @include('adminlte-templates::common.errors')

                    <div class="card">

                        {!! Form::model($zakah, ['route' => ['admin.zakat.update', $zakah->id], 'method' => 'patch']) !!}

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
