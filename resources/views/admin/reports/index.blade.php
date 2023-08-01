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
                        <form id="searchForm" class="row">
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

                                <div class="col-md-2  text-left">
                                    <br>
                                    <button class="btn btn-primary" type="submit">بحث</button>
                                </div>
                            </div></form>
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
<script>
    // $(document).ready(function() {
    //     var dataTable = $('#dataTable').DataTable({
    //         // Add your existing DataTable options here
    //         // ...
    //     });

    //     // Handle form submission on button click
    //     $('#searchForm button[type="submit"]').on('click', function(event) {
    //         event.preventDefault();
    //         dataTable.ajax.reload();
    //     });

    //     // Handle form submission on select change (optional)
    //     $('#searchForm select').on('change', function() {
    //         dataTable.ajax.reload();
    //     });

    //     // Initialize Select2 for select elements
    //     $('.select2').select2();

    //     // Datepicker setup for start_date and end_date (if applicable)
    //     // Example: $('#start_date').datepicker({ ... });

    //     // DataTable server-side processing setup
    //     dataTable = $('#dataTable').DataTable({
    //         serverSide: true,
    //         processing: true,
    //         ajax: {
    //             url: "{{ route('admin.reports') }}", // Replace with your actual data endpoint
    //             type: "GET",
    //             data: function (d) {
    //                 d.start_date = $('#start_date').val();
    //                 d.end_date = $('#end_date').val();
    //                 d.payment_method = $('select[name="payment_method"]').val();
    //                 d.marketer = $('select[name="marketer"]').val();
    //                 d.project = $('select[name="project"]').val();
    //                 d.status = $('select[name="status"]').val();
    //             }
    //         },
    //         columns: [
    //             // Define your DataTable columns here, matching the keys in the JSON response
    //             // Example: { data: 'model_id', name: 'model_id' },
    //             // ...
    //         ],
    //         // Add your existing DataTable options here
    //         // ...
    //     });
    // });
</script>


@push('page_scripts')
{{-- <script>
    $(document).ready(function() {
        // DataTable server-side processing setup
        var dataTable = $('#dataTable').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route('admin.reports') }}", // Replace with your actual data endpoint
                type: "GET",
                data: function(d) {
                    // Get the form values and pass them to the server
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                    d.payment_method = $('select[name="payment_method"]').val();
                    d.marketer = $('select[name="marketer"]').val();
                    d.project = $('select[name="project"]').val();
                    d.status = $('select[name="status"]').val();
                }
            },
            columns: [
                // Define your DataTable columns here, matching the keys in the JSON response
                // For example:
                { data: 'id', name: 'id' },
                { data: 'project', name: 'project' },
                { data: 'donor_id', name: 'donor_id' },
                { data: 'payment_method', name: 'payment_method' },
                { data: 'status', name: 'status' },
                { data: 'amount', name: 'amount' },
                { data: 'created_at', name: 'created_at' },
                { data: 'marketer_id', name: 'marketer_id' },
            ],
            // Add your existing DataTable options here (e.g., order, language, etc.)
            // ...
        });

        // Handle form submission on button click
        $('#searchForm button[type="submit"]').on('click', function(event) {
            event.preventDefault();
            dataTable.ajax.reload();
        });

        // Handle form submission on select change (optional)
        $('#searchForm select').on('change', function() {
            dataTable.ajax.reload();
        });
    });
</script> --}}
@endpush
