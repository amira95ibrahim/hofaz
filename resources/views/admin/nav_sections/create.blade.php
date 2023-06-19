@extends('admin.layouts.app')

@section('content')

    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">@lang('dashboard.home')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.navSections.index') }}">@lang('models/navSections.plural')</a>
            </li>
            <li class="breadcrumb-item active">@lang('crud.add_new')</li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                @include('adminlte-templates::common.errors')
                    <div class="card">
                         {!! Form::open(['route' => 'admin.navSections.store']) !!}

                                   <div class="card-block">
                                       <div class="row">
                                           @include('admin.nav_sections.fields')
                                       </div>
                                   </div>

                                   <div class="card-footer">
                                       {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                       <a href="{{ route('admin.navSections.index') }}" class="btn btn-default">
                                        @lang('crud.cancel')
                                       </a>
                                   </div>

                         {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
