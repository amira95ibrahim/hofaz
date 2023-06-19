<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} |  @lang('auth.login.title')</title>
    <!-- Icons -->
    <link href="{{ asset('backend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/png">
    <!-- Main styles for this application -->
    <link href="{{ asset('backend/dest/style.css') }}" rel="stylesheet">
    <style>
        body{
            min-height: auto;
            background-color: rgb(7, 59, 86);
        }
    </style>
</head>

<body class="">
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-x-auto pull-xs-none vamiddle">
                <div class="card-group ">
                    <div class="card card-inverse p-y-3" style="width:44%">
                        <div class="card-block text-xs-center">
                            <img src="{{ asset('images/logo-wide.png') }}" style="margin-bottom: 7%" />
                        </div>
                    </div>
                    <div class="card p-a-2">
                        <div class="card-block">
{{--                            <h1>تسجيل الدخول</h1>--}}
                            <form method="post" action="{{ url('/login') }}">
                                @csrf
                            <div class="input-group m-b-1">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                                <input type="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="@lang('auth.email')"
                                       class="form-control en @error('email') is-invalid @enderror">
                                @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group m-b-2">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input type="password"
                                       name="password"
                                       placeholder="@lang('auth.password')"
                                       class="form-control en @error('password') is-invalid @enderror">
                                @error('password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <button type="submit" class="btn btn-primary p-x-2">
                                        <i class="icon-login"></i>
                                        تسجيل الدخول</button>
                                </div>
{{--                                <div class="col-xs-6 text-xs-right">--}}
{{--                                    <a href="{{ route('password.request') }}" class="btn btn-link p-x-0">@lang('auth.login.forgot_password')</a>--}}
{{--                                </div>--}}
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('backend/js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/tether.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/bootstrap.min.js') }}"></script>
    <script>
        function verticalAlignMiddle()
        {
            var bodyHeight = $(window).height();
            var formHeight = $('.vamiddle').height();
            var marginTop = (bodyHeight / 2) - (formHeight / 2);
            if (marginTop > 0)
            {
                $('.vamiddle').css('margin-top', marginTop);
            }
        }
        $(document).ready(function()
        {
            verticalAlignMiddle();
        });
        $(window).bind('resize', verticalAlignMiddle);
    </script>
    <!-- Grunt watch plugin -->
    <!-- <script src="//localhost:35729/livereload.js"></script> -->
</body>

</html>
