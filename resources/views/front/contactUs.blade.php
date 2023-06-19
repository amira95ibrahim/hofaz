@extends('front.layout.main')

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
        <!-- Section: inner-header -->
        <section class="inner-header divider layer-overlay overlay-dark-8"
                 data-bg-img="{{ asset('images/bg/bg2.jpg') }}">
            <div class="container pt-90 pb-40">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6 float-{{ $reverseFloat }}">
                            <h2 class="text-white font-36">@lang('breadcrumbs.contact_us')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">@lang('breadcrumbs.contact_us')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Divider: Contact -->
        <section class="divider">
            <div class="container">
                <div class="row pt-10">
                    <div class="col-md-7">
                        <h4 class="mt-0 mb-30 line-bottom">@lang('contactUs.interested')</h4>
                        <!-- Contact Form -->
                        <form id="contact_form" name="contact_form" class=""
                              action="https://kodesolution.com/html/2017/helpingpro-html/demo/includes/sendmail.php"
                              method="post">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="form_name">@lang('contactUs.name') <small>*</small></label>
                                        <input id="form_name" name="form_name" class="form-control" type="text"
                                               placeholder="@lang('contactUs.enter_name')" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="form_email">@lang('contactUs.email') <small>*</small></label>
                                        <input id="form_email" name="form_email" class="form-control required email"
                                               type="email" placeholder="@lang('contactUs.enter_email')">
                                    </div>
                                    <div class="form-group">
                                        <label for="form_name">@lang('contactUs.subject') <small>*</small></label>
                                        <input id="form_subject" name="form_subject" class="form-control required"
                                               type="text" placeholder="@lang('contactUs.enter_subject')">
                                    </div>
                                    <div class="form-group">
                                        <label for="form_phone">@lang('contactUs.phone')</label>
                                        <input id="form_phone" name="form_phone" class="form-control" type="text"
                                               placeholder="@lang('contactUs.enter_phone')">
                                    </div>
                                    <div class="form-group">
                                        <label for="form_name">@lang('contactUs.message')</label>
                                        <textarea id="form_message" name="form_message" class="form-control required"
                                                  rows="5" placeholder="@lang('contactUs.enter_message')"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control"
                                               type="hidden" value=""/>
                                        <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5"
                                                data-loading-text="Please wait...">@lang('contactUs.send_your_message')</button>
                                        <button type="reset"
                                                class="btn btn-default btn-flat btn-theme-colored">@lang('contactUs.reset')</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <div class="contact-info text-center pt-40 pb-40 mt-10 bg-light border-bottom border-theme-colored">
                            <i class="fa fa-phone font-36 mb-10 text-theme-colored"></i>
                            <h4>@lang('contactUs.call_us')</h4>
                            <h6 class="text-gray">@lang('contactUs.our_phone')</h6>
                        </div>
                        <div class="contact-info text-center pt-40 pb-40 mt-10 bg-light border-bottom border-theme-colored">
                            <i class="fa fa-envelope font-36 mb-10 text-theme-colored"></i>
                            <h4>@lang('contactUs.email')</h4>
                            <h6 class="text-gray">@lang('contactUs.our_email')</h6>
                        </div>
                        <div class="contact-info text-center pt-40 pb-40 mt-10 bg-light border-bottom border-theme-colored">
                            <i class="fa fa-map-marker font-36 mb-10 text-theme-colored"></i>
                            <h4>@lang('contactUs.address')</h4>
                            <h6 class="text-gray">@lang('contactUs.our_address')</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <!-- Google Map HTML Codes -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5456.163483134849!2d144.95177475051227!3d-37.81589041361766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4dd5a05d97%3A0x3e64f855a564844d!2s121+King+St%2C+Melbourne+VIC+3000%2C+Australia!5e0!3m2!1sen!2sbd!4v1556130803137!5m2!1sen!2sbd"
                    width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </section>
    </div>
    <!-- end main-content -->
@endsection

@push('scripts')
    <!-- Contact Form Validation-->
    <script type="text/javascript">
        $("#contact_form").validate({
            submitHandler: function (form) {
                var form_btn = $(form).find('button[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();
                form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                var form_btn_old_msg = form_btn.html();
                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                $(form).ajaxSubmit({
                    dataType: 'json',
                    success: function (data) {
                        if (data.status == 'true') {
                            $(form).find('.form-control').val('');
                        }
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        $(form_result_div).html(data.message).fadeIn('slow');
                        setTimeout(function () {
                            $(form_result_div).fadeOut('slow')
                        }, 6000);
                    }
                });
            }
        });
    </script>
@endpush
