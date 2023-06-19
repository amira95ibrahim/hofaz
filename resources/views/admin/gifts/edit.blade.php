@extends('admin.layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.gifts.index') }}">هدايا</a>
        </li>
        <li class="breadcrumb-item active">تعديل مشاريع الهدايا</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">

                    @include('adminlte-templates::common.errors')

                    <div class="card">

                        {!! Form::model($gift, ['route' => ['admin.gifts.update', $gift->id], 'method' => 'patch']) !!}

                        <div class="card-block">
                            <div class="row">
                                @include('admin.gifts.fields')
                            </div>
                        </div>

                        <div class="card-footer">
                            {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('admin.gifts.edit') }}" class="btn btn-default">
                                الغاء
                            </a>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
