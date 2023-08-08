@extends('front.layout.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs.css') }}">
    <style>
        .button-plus {
            padding-right: 0%;
        }
    </style>
@endpush

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
        <!-- Section: inner-header -->
        <section class="inner-header divider layer-overlay overlay-dark-8" data-bg-img="{{ asset('images/bg/bg2.webp') }}">
            <div class="container pt-40 pb-40">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6 float-{{ $reverseFloat }}">
                            <h2 class="text-white font-36">@lang('breadcrumbs.iftar')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">@lang('breadcrumbs.iftar')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section>
            <div class="container pt-70 pb-70">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrapper">

                            <div class="tab-wrapper">
                                <ul class="tabs">
                                    @foreach ($iftar as $index => $item)
                                        <li class="tab-list" data-tab="{{ $index + 1 }}">
                                            <div class="icon tab-link{{ $index === 0 ? ' active' : '' }} mb-5">
                                                <span>{{ $item['amount'] }}</span>
                                                <span>@lang('iftar.dinar')</span>
                                            </div>
                                            <p>
                                                <span class="ssad2"><span id="Label26"
                                                        style="font-family:GSSLight;font-weight:bold;">@lang('iftar.for')</span></span>
                                                <br>
                                                <span class="sad2"><span id="Label3"
                                                        style="font-family:GSSLight;font-weight:bold;">@lang($item['duration'])</span></span><br>
                                            </p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="content-wrapper bg-grey br-20 mt-50">
                                @foreach ($iftar as $index => $item)
                                    <div id="tab-{{ $index + 1 }}"
                                        class="tab-content{{ $index === 0 ? ' active' : '' }} clearfix">
                                        <div class="one-circle">
                                            <div class="text-center"><span class="big-text">{{ $item['amount'] }}</span>
                                                <br>
                                                <p>@lang('iftar.dinar')</p>
                                            </div>
                                        </div>
                                        <form action="{{ route('payment') }}" method="GET">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>@lang('iftar.number_of_shares')<small>*</small></label>
                                                    <div class="input-group plus-minus-input mb-15">
                                                        <div class="input-group-button button-plus">
                                                            <button type="button" class="btn custom-btn-success"
                                                                data-quantity="plus" data-field="quantity">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                        <input class="input-group-field form-control" type="number"
                                                            name="quantity" value="1">
                                                        <div class="input-group-button button-minus">
                                                            <button type="button" class="btn custom-btn-success"
                                                                data-quantity="minus" data-field="quantity">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>@lang('iftar.country')</label>
                                                <select class="form-control" id="select_country" required name="country">
                                                    <option selected disabled value="">@lang('iftar.select_country')</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('country')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-4">
                                                <label>@lang('iftar.amount')</label>
                                                <input type="number" class="form-control" name="amount">
                                            </div>
                                            <div class="col-md-12">
                                                <label>@lang('iftar.comments')</label>
                                                <textarea class="form-control" rows="5" placeholder="@lang('iftar.your_comments_here')"></textarea>
                                            </div>
                                            <div class="col-md-12 text-center mt-10">
                                                <button type="submit" id="pay" class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5 btnFullwidth">@lang('iftar.donate_now')</button>

                                            </div>
                                        </form>
                                    </div>
                                @endforeach
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->
@endsection


@push('scripts')
    <script type="text/javascript">
        // Define tab values
        var tabValues = {
            1: 1,
            2: 7.5,
            3: 15,
            4: 30
        };

        function updateAmount() {
            var activeTab = $('.tab-link.active').parent().data('tab');
            var quantity = parseInt($('input[name="quantity"]').val());
            $('input[name="amount"]').val(tabValues[activeTab] * quantity);
        }

        $('.tab-list').click(function() {
            var tabID = $(this).attr('data-tab');

            $('.tab-link').removeClass('active');
            $(this).find('div').addClass('active');
            $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

            updateAmount(); // Update the amount based on selected tab
        });

        jQuery(document).ready(function() {
            // Set the initial amount based on the active tab
            updateAmount();

            // This button will increment the value
            $('[data-quantity="plus"]').click(function(e) {
                e.preventDefault();
                fieldName = $(this).attr('data-field');
                var currentVal = parseInt($('input[name=' + fieldName + ']').val());
                if (!isNaN(currentVal)) {
                    $('input[name=' + fieldName + ']').val(currentVal + 1);
                } else {
                    $('input[name=' + fieldName + ']').val(0);
                }

                updateAmount(); // Update the amount based on the incremented quantity
            });

            // This button will decrement the value till 0
            $('[data-quantity="minus"]').click(function(e) {
                e.preventDefault();
                fieldName = $(this).attr('data-field');
                var currentVal = parseInt($('input[name=' + fieldName + ']').val());
                if (!isNaN(currentVal) && currentVal > 0) {
                    $('input[name=' + fieldName + ']').val(currentVal - 1);
                } else {
                    $('input[name=' + fieldName + ']').val(0);
                }

                updateAmount(); // Update the amount based on the decremented quantity
            });
        });
    </script>
    <script>
        $('.btnFullwidth').click(function() {
            let price = $('input[name="amount"]').val();
            let model = 'iftar';
            let model_id = 1;
            let selectedCountry = $('#select_country').val(); // Get the selected country

            if (price > 0 && selectedCountry !== "") {
                sessionStorage.setItem('model', model);
                sessionStorage.setItem('model_id', model_id);
                sessionStorage.setItem('amount', price);
                sessionStorage.setItem('country', selectedCountry); // Store the selected country in sessionStorage
            } else {
                iziToast.error({
                    title: '{{ __('common.add_amount_first') }}',
                    position: 'topCenter'
                });
            }
        });
    </script>
@endpush
