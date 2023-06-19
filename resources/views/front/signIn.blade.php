@extends('front.layout.main')

@push('styles')
@endpush


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
                            <h2 class="font-28 text-white">@lang('signIn.login_register')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active text-theme-colored">@lang('breadcrumbs.sign_in')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <form name="reg-form" class="register-form" method="POST" action="{{ route('register') }}">
                        
                            @csrf
                            <div class="icon-box mb-0 p-0">
                                {{--                            <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">--}}
                                {{--                                <i class="pe-7s-users"></i>--}}
                                {{--                            </a>--}}
                                <h4 class="text-gray mt-0">@lang('signIn.dont_have_account')</h4>
                            </div>
                            <hr>
                            {{--                        <p class="text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi id perspiciatis facilis nulla possimus quasi, amet qui. Ea rerum officia, aspernatur nulla neque nesciunt alias.</p>--}}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>@lang('signIn.name')</label>
                                    
                                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"  require>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>@lang('signIn.email_address')</label>
                                    <input name="email" class="form-control" type="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                           
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="form_choose_password">@lang('signIn.choose_password')</label>
                                    <input id="password" name="password" class="form-control"  type="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>@lang('signIn.enter_password')</label>
                                    <input id="password-confirm" name="password_confirmation" class="form-control" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark btn-theme-colored btn-lg btn-block mt-15 w-100"
                                        type="submit">@lang('signIn.register_now')</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 mb-40 col-md-offset-1">
                        <h4 class="text-gray mt-0 pt-5"> @lang('signIn.login')</h4>
                        <hr>
                        {{--                    <p>Lorem ipsum dolor sit amet, consectetur elit.</p>--}}
                        <form name="login-form" class="clearfix" method="post" action="{{ route('login') }}">
                              @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="form_username_email">@lang('signIn.username_email')</label>
                                    <input id="email" name="email" class="form-control"
                                           type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="form_password">@lang('signIn.password')</label>
                                    <input id="password" name="password" class="form-control" type="passwoed">
                                </div>
                            </div>
                            <div class="checkbox pull-left mt-15">
                                <label for="form_checkbox">
                                    @lang('signIn.remember_me')
                                    <input class="mr-5" id="form_checkbox" name="form_checkbox" type="checkbox">
                                </label>

                            </div>
                            <div class="form-group pull-right mt-10">
                                <button type="submit"
                                        class="btn btn-dark btn-theme-colored btn-sm"> @lang('signIn.login')</button>
                            </div>
                            <div class="clear pt-10">
                                <a class="text-theme-colored font-weight-600 font-12 mr-10 pt-5"
                                   href="#"> @lang('signIn.forgot_your_password')</a>
                            </div>
                            <div class="clear text-center pt-10">
                                <a class="btn btn-dark btn-lg btn-block no-border mt-15 mb-15" href="#"
                                   data-bg-color="#3b5998"> @lang('signIn.login_with_facebook')</a>
                                <a class="btn btn-dark btn-lg btn-block no-border" href="#"
                                   data-bg-color="#00acee"> @lang('signIn.login_with_twitter')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->
@endsection
