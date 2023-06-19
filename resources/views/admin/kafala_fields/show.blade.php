@extends('admin.layouts.app')

@section('content')

    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">@lang('dashboard.home')</a>
                    </li>
                    <li class="breadcrumb-item active">@lang('models/kafalaFields.singular')</li>

                    <!-- Breadcrumb Menu-->
                    <li class="breadcrumb-menu">
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <a class="btn btn-secondary" href="{{ route('admin.kafalaFields.index') }}">
                            <i class="icon-arrow-left-circle"></i> &nbsp;@lang('crud.back')
                            </a>
                        </div>
                    </li>
                </ol>

    <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
                <div class="row">
                    @include('admin.kafala_fields.show_fields')
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
