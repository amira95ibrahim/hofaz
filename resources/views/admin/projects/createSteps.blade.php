@extends('admin.layouts.app')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">@lang('dashboard.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">@lang('models/projects.plural')</a>
        </li>
        <li class="breadcrumb-item active">@lang('crud.add_new')</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                @include('adminlte-templates::common.errors')
                    <div class="card">
                        <div class="panel-body wizard-content">
                            <div class="card-block">
                                <div class="row">
                                    {!! Form::open(['route' => 'admin.projects.store', 'id' => 'projectForm', 'class' => 'tab-wizard wizard-circle wizard clearfix']) !!}
                                    @include('admin.projects.fields')
                                    {!! Form::close() !!}
                                </div>
                            </div>

                            <div class="card-footer">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('admin.projects.index') }}" class="btn btn-default">
                                    @lang('crud.cancel')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

