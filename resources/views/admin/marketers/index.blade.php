@extends('admin.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">الرئيسية</a>
        </li>
        <li class="breadcrumb-item active">المندوبين</li>

        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <a class="btn btn-secondary" href="{{ route('admin.marketers.create') }}">
                    <i class="icon-plus"></i> إضافة مندوب جديد
                </a>
            </div>
        </li>
    </ol>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                @include('flash::message')

                <div class="clearfix"></div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-block">
                            @include('admin.marketers.table')
                            <nav>

                            </nav>
                        </div>
                    </div>
                </div>
                <!--/col-->
            </div>
            <!--/row-->
        </div>
    </div>

@endsection


