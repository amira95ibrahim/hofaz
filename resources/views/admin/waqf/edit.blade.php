@extends('admin.layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.waqf.index') }}">وقف</a>
        </li>
        <li class="breadcrumb-item active">تعديل: {{ $waqf->name }}</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">

                    @include('adminlte-templates::common.errors')

                    <div class="card">

                        {!! Form::model($waqf, ['route' => ['admin.waqf.update', $waqf->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        <div class="card-block">
                            <div class="row">
                                @include('admin.waqf.fields')
                            </div>
                        </div>

                        <div class="card-footer">
                            {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('admin.waqf.index') }}" class="btn btn-default">
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
