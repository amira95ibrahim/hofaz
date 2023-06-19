@extends('admin.layouts.app')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.publications.index') }}">المكتبة الاعلامية</a>
        </li>
        <li class="breadcrumb-item active">اضافة كتاب جديد</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    @include('adminlte-templates::common.errors')
                    <div class="card">
                        {!! Form::open(['route' => 'admin.publications.store', 'enctype' => 'multipart/form-data']) !!}

                        <div class="card-block">
                            <div class="row">
                                @include('admin.publications.fields')
                            </div>
                        </div>

                        <div class="card-footer">
                            {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('admin.publications.index') }}" class="btn btn-default">
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
