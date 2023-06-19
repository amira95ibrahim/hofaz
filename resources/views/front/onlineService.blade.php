<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>Online Services</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!--	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('onlineService/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('onlineService/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('onlineService/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('onlineService/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('onlineService/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('onlineService/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('onlineService/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('onlineService/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('onlineService/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('onlineService/css/main.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2&display=swap" rel="stylesheet">
    <!--===============================================================================================-->
</head>
<body bgcolor="orange">
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <form class="login100-form validate-form">
                <img class="login100-form-img p-b-49" src="{{ asset('images/logo-wide.png') }}">

                <span class="login100-form-title p-b-49">
						@lang('onlineService.Login_to_charitable')
					</span>

                <div class="wrap-input100 validate-input m-b-23" data-validate="@lang('onlineService.email_required')">
                    <span class="label-input100">@lang('onlineService.email')</span>
                    <input class="input100" type="text" name="username" placeholder="@lang('onlineService.registered_email')">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="@lang('onlineService.password_required')">
                    <span class="label-input100">@lang('onlineService.password')</span>
                    <input class="input100" type="password" name="pass" placeholder="@lang('onlineService.type_your_password')">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                <div class="text-right flex-sb-m p-t-8 p-b-31">
                    <a href="#">
                        @lang('onlineService.forgot_password')
                    </a>
                    <div class="contact100-form-checkbox">
                        <label class="label-input100" for="ckb1">
                            @lang('onlineService.remember_me')
                        </label>
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            @lang('onlineService.login')
                        </button>
                    </div>
                </div>

                <div class="flex-c-m p-b-20 p-t-20">
                    <a href="#" class="login100-social-item bg1">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="login100-social-item bg2">
                        <i class="fa fa-twitter"></i>
                    </a>

                    <a href="#" class="login100-social-item bg3">
                        <i class="fa fa-instagram"></i>
                    </a>
                </div>

{{--                <div class="flex-col-c">--}}
{{--						<span class="txt1 p-b-17">--}}
{{--							Or Sign Up Using--}}
{{--						</span>--}}

{{--                    <a href="#" class="txt2">--}}
{{--                        Sign Up--}}
{{--                    </a>--}}
{{--                </div>--}}
            </form>
        </div>
    </div>
</div>
<!--===============================================================================================-->
<script src="{{ asset('onlineService/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('onlineService/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('onlineService/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('onlineService/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('onlineService/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('onlineService/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('onlineService/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('onlineService/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('onlineService/js/main.js') }}"></script>
</body>
</html>
