<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>حفاظ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="{{asset('backend/css/dashboard.css')}}">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://hofath.org/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://hofath.org/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Icons -->
    <link href="{{ asset('backend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/_icons.scss') }}" rel="stylesheet">

    <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/png">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://hofath.org/dist/css/hoffath.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="https://hofath.org/dist/css/skins/_all-skins-rtl.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="https://hofath.org/dist/css/custom.css">
  <link rel="stylesheet" href="https://hofath.org/dist/css/jquery.toast.min.css">
  <link rel="stylesheet" href="https://hofath.org/dist/bootstrap/css/fileinput.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="https://hofath.org/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="https://hofath.org/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="https://hofath.org/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <script src="/bower_components/ckeditor/ckeditor.js"></script>
  <link rel="stylesheet" href="/bower_components/select2/dist/css/select2.min.css">

  <link rel="shortcut icon" href="https://hofath.org/">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- jQuery 3 -->
    <script src="https://hofath.org/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://hofath.org/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script src="https://hofath.org/bower_components/select2/dist/js/select2.full.min.js"></script>


    @stack('third_party_stylesheets')

    @stack('page_css')

</head>
<body class="hold-transition skin-blue sidebar-mini">
  
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">حفاظ</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">جمعية حفاظ</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">تصغير القائمة</span>
        </a>

        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav pull-left hidden-md-down">
                <li class="ml-20 nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('images/favicon.png') }}" class="img-avatar" alt="admin@bootstrapmaster.com">
                      {{--  <span class="hidden-md-down">{{ Auth::user()->name }}</span>--}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-xs-center">
                          {{--  <small>عضو منذ {{ Auth::user()->created_at->format('M. Y') }}</small>--}}
                        </div>
                            {{--<a class="dropdown-item" href="#"><i class="fa fa-user"></i> @lang('auth.profile')</a>--}}
                            {{--<div class="divider"></div>--}}
                        <a href="#" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-lock"></i>
                            تسجيل خروج
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>
        </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <footer class="main-footer">
        <div class="pull-left hidden-xs">
          <b>الاصدار الاول</b> 
        </div>
        <strong>الجمعية الخيرية الكويتية لخدمة القران الكريم وعلومه</strong> .
    </footer>

</div> 



<!-- Bootstrap 3.3.7 -->
<script src="https://hofath.org/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://hofath.org/bower_components/raphael/raphael.min.js"></script>

<!-- Sparkline -->
<script src="https://hofath.org/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<!-- jQuery Knob Chart -->
<script src="https://hofath.org/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="https://hofath.org/bower_components/moment/min/moment.min.js"></script>
<script src="https://hofath.org/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="https://hofath.org/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="https://hofath.org/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="https://hofath.org/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="https://hofath.org/dist/js/adminlte.min.js"></script>

<script src="https://hofath.org/dist/js/jquery.toast.min.js"></script>

@stack('third_party_scripts')

@stack('page_scripts')
<script>
  $(function() {
    sayHi();

    function sayHi() {
    setTimeout(sayHi,6000);
    $.ajax({url: "donates/lastdonat",
    success: function(result){
        $("#tbody").html(result);
        //console.log(result);
    }});
    }}
    );
</script>
<script>
$(document).ready(function() { 
 $.toast({
    heading: '',
    text: 'اهلا بك' ,
    position: 'bottom-left',
    showHideTransition: 'slide',
    icon: 'success'
     })});
</script>
</body>
</html>
