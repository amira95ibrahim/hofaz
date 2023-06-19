@extends('admin.layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.kafalaFields.index') }}">حقول الكفالة</a>
        </li>
        <li class="breadcrumb-item active">تعديل: {{ $kafalaFields->name }}</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">

                    @include('adminlte-templates::common.errors')

                    <div class="card">

                        {!! Form::model($kafalaFields, ['route' => ['admin.kafalaFields.update', $kafalaFields->id], 'method' => 'patch']) !!}

                        <div class="card-block">
                            <div class="row">
                                @include('admin.kafala_fields.fields')
                            </div>
                        </div>

                        <div class="card-footer">
                            {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('admin.kafalaFields.index') }}" class="btn btn-default">
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
