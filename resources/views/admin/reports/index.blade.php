@extends('admin.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">الرئيسية</a>
        </li>
        <li class="breadcrumb-item active">تقارير المشاريع</li>

        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                {{-- <a class="btn btn-secondary" href="{{ route('admin.marketers.create') }}">
                    <i class="icon-plus"></i> إضافة مندوب جديد
                </a> --}}
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
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="start_date">تاريخ البدء:</label>
                                    <select class="form-control" name="start_date" id="start_date">
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="end_date">تاريخ الانتهاء:</label>
                                    <select class="form-control" name="end_date" id="end_date">
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>طريقة الدفع</label>
                                    <select class="form-control" name="payment_method">
                                        <option value="">طريقة الدفع</option>
                                        <option value="cash">Cash</option>
                                        <option value="credit_card">Credit Card</option>
                                        <option value="credit_card">Knet</option>
                                        <option value="credit_card">apple pay</option>
                                        <option value="credit_card">Google pay</option>

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>المسوق</label>
                                    <select class="form-control select2" name="marketer">
                                        <option value="">المسوق</option>
                                        @foreach ($marketers as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>اسم المشروع</label>
                                    <select class="form-control select2" name="project">
                                        <option value="">اسم المشروع</option>
                                        @foreach ($projects as $id => $name_ar)
                                            <option value="{{ $id }}">{{ $name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>الحاله</label>
                                    <select class="form-control" name="status">
                                        <option value="">الحالة</option>
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approved</option>
                                        <option value="approved">INITIATED</option>
                                        <option value="approved">Failed</option>

                                    </select>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-4"></div>

                                <div class="col-md-2 mr-4 text-left">
                                    <br>
                                    <button class="btn btn-primary" type="submit">بحث</button>
                                </div>
                            </div>
                            <br><br>
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
