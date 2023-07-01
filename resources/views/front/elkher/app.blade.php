
@extends('front.layout.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs.css') }}">
     <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("asst/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->



<style>
  @font-face {
            font-family: GSSLight;
            src: url(../styles/GESSTwoLight.ttf);
        }

        @font-face {
            font-family: GSSMedium;
            src: url(../styles/GESSTwoMedium.ttf);
        }

        @font-face {
            font-family: GSSBold;
            src: url(../styles/GESSTwoBold.ttf);
        }

        .pp {
            font-family: GSSLight;
        }

        .pplighter {
            font-family: GSSLight;
            font-weight: lighter;
            font-size: 16px;
        }

        .pp2 {
            font-family: GSSMedium;
        }

        .pp3 {
            font-family: GSSBold;
        }
         /*@font-face {
            font-family: 'Segoe UI';
            src: url('../Styles/segoe-ui-webfont.eot');
            src: url('../Styles/segoe-ui-webfont.eot?#iefix') format('embedded-opentype'), url('../Styles/segoe-ui-webfont.woff') format('woff'), url('../Styles/segoe-ui.otf') format("opentype");
        }*/

        .FontEltany {
            font-family: Greta; font-size: 15px; font-weight: lighter;/*'Segoe UI';*/
        }



.del-goods,
.add-goods {
	width: 17px;
	height: 17px;
	color: #fff !important;
	border-radius: 22px !important;
	float: left;
	margin: 10px 5px 0 0;
	line-height: 1;
	font-size: 12px;
}
.del-goods:hover,
.add-goods:hover {
	text-decoration: none;
}
.del-goods {
	background: #d7dde3 url(../../assets/frontend/layout/img/icons/del-goods.png) no-repeat 50% 50%;
}
.del-goods:hover {
	background: #E94D1C url(../../assets/frontend/layout/img/icons/del-goods.png) no-repeat 50% 50%;
}


 @font-face {
            font-family: Greta;
            src: url('../../Fonts/Greta_Arabic_Regular.eot');
            src: url('../../Fonts/Greta_Arabic_Regular.eot?#iefix') format('embedded-opentype'), url('../../Fonts/Greta_Arabic_Regular.woff') format('woff'), url('../../Fonts/Greta_Arabic_Regular.otf') format("opentype");
        }

        .Fontadmin {
            font-family: Greta;
            font-size: 15px;
            font-weight: lighter;
        }


        .small-box {
    border-radius: 0.25rem;
    box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
    display: block;
    margin-bottom: 20px;
    position: relative;
}
.small-box > .inner {
    padding: 10px;
}
.small-box > .small-box-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.8);
    display: block;
    padding: 3px 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    z-index: 10;
}
.small-box > .small-box-footer:hover {
    background-color: rgba(0, 0, 0, 0.15);
    color: #fff;
}
.small-box h3 {
    font-size: 2.2rem;
    font-weight: 700;
    margin: 0 0 10px;
    padding: 0;
    white-space: nowrap;
}
@media (min-width: 992px) {
    .col-lg-2 .small-box h3,
    .col-md-2 .small-box h3,
    .col-xl-2 .small-box h3 {
        font-size: 1.6rem;
    }
    .col-lg-3 .small-box h3,
    .col-md-3 .small-box h3,
    .col-xl-3 .small-box h3 {
        font-size: 1.6rem;
    }
}
@media (min-width: 1200px) {
    .col-lg-2 .small-box h3,
    .col-md-2 .small-box h3,
    .col-xl-2 .small-box h3 {
        font-size: 2.2rem;
    }
    .col-lg-3 .small-box h3,
    .col-md-3 .small-box h3,
    .col-xl-3 .small-box h3 {
        font-size: 2.2rem;
    }
}
.small-box p {
    font-size: 1rem;
}
.small-box p > small {
    color: #f8f9fa;
    display: block;
    font-size: 0.9rem;
    margin-top: 5px;
}
.small-box h3,
.small-box p {
    z-index: 5;
}
.small-box .icon {
    color: rgba(0, 0, 0, 0.15);
    z-index: 0;
}
.small-box .icon > i {
    font-size: 90px;
    position: absolute;
    right: 15px;
    top: 15px;
    transition: -webkit-transform 0.3s linear;
    transition: transform 0.3s linear;
    transition: transform 0.3s linear, -webkit-transform 0.3s linear;
}
.small-box .icon > i.fa,
.small-box .icon > i.fab,
.small-box .icon > i.fad,
.small-box .icon > i.fal,
.small-box .icon > i.far,
.small-box .icon > i.fas,
.small-box .icon > i.ion {
    font-size: 70px;
    top: 20px;
}
.small-box .icon svg {
    font-size: 70px;
    position: absolute;
    right: 15px;
    top: 15px;
    transition: -webkit-transform 0.3s linear;
    transition: transform 0.3s linear;
    transition: transform 0.3s linear, -webkit-transform 0.3s linear;
}
.small-box:hover {
    text-decoration: none;
}
.small-box:hover .icon > i,
.small-box:hover .icon > i.fa,
.small-box:hover .icon > i.fab,
.small-box:hover .icon > i.fad,
.small-box:hover .icon > i.fal,
.small-box:hover .icon > i.far,
.small-box:hover .icon > i.fas,
.small-box:hover .icon > i.ion {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
.small-box:hover .icon > svg {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
@media (max-width: 767.98px) {
    .small-box {
        text-align: center;
    }
    .small-box .icon {
        display: none;
    }
    .small-box p {
        font-size: 12px;

    }

}





.bg_firoz{
    background-color: #4B77BE ;
}

.bg_inffo{
    background-color: #44b6ae;
}

.bg_semon{
    background-color: #e35b5a;
}

.bg_azraa{
    background-color: #578ebe;
}

.bg_orange{
    background-color: #f2784b;
}

.bg_move{
    background-color: #8775a7;
}

    </style>
@endpush
@yield('css')

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
        <nav class="navbar navbar-default navbar-fixed-bottom hidden-lg hidden-md" style="background-color: gray">
            <div class="container">
                <div class="col-sm-1 col-xs-1 "></div>
                <div class="col-sm-2 col-xs-2 ">
                    <a href="/Default.aspx" class="btn btn-link">
                        <img src="../../img/Icon/ic_home_off.png" class="imgBtn" id="img_home" /></a>
                </div>
                <div class="col-sm-2 col-xs-2">
                    <a href="/Payment/basket.aspx" class="btn btn-link">
                        <img src="../../img/Icon/ic_cart_off.png" class="imgBtn" id="img_cart" />
                        <span class="badge" style="top: -10px; left: 9px;">
                            <span id="ctl00_CartbadgeCount">0</span></span>
                    </a>
                </div>
                <div class="col-sm-2 col-xs-2 ">
                    <a href="/SharedProjects/DonateForSharedProject.aspx" class="btn btn-link">
                        <img src="../../img/Icon/ic_donate_off.png" class="imgBtn" id="img_donate" /></a>
                </div>
                <div class="col-sm-2 col-xs-2 ">
                    <a href="/OnlineService/Pages/SDefault.aspx" class="btn btn-link">
                        <img src="../../img/Icon/ic_profile_on.png" class="imgBtn" id="img_user" /></a>
                </div>
                <div class="col-sm-2 col-xs-2 ">

                    <div class="btn-group dropup">
                        <a href="../OnlineService/Pages/SDefault.aspx" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../img/Icon/more.png" class="imgBtn" id="img_more" /></a>
                        <ul class="dropdown-menu" style="min-width: 70px !important;">
                            <li class="pp"><a href="/Sadqat/Sadqat.aspx">صدقة</a></li>
                            <li class="pp"><a href="/Zakah/Zakah.aspx">زكاة</a></li>
                            <li class="pp"><a href="/Orphans/OrphansList.aspx">كفالة</a></li>
                            <li class="pp"><a href="/Relief/Relief_list.aspx">إغاثة</a></li>
                            <li class="pp"><a href="/Waqf/WaqfList.aspx">وقف</a></li>
                            <li class="pp"><a href="/Aqeeqah/Aqeeqah.aspx">العقيقة</a></li>
                            <li class="pp"><a href="/Contact/ContactUS.aspx">اتصل بنا</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-1 col-xs-1 "></div>
            </div>
        </nav>

        <input name="ctl00$ActiveLink" type="hidden" id="ctl00_ActiveLink" value="home" />

        <!-- BEGIN HEADER -->
        <div class="page-header">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top" style="display:block">
                <div class="container">
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->



                             <li class="dropdown dropdown-extended  dropdown-notification" id="header_notification_bar1" style="display:none;">


                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" style=" background-color:#ededed;border-color: #b3b3b3;border-radius: 20px 20px 20px 20px !important;padding:5px 5px 5px 5px;margin-top:5px;" data-hover="dropdown" data-close-others="true">
                                     &nbsp;&nbsp;
                            <span id="ctl00_lblItemCount">0</span>
                                    &nbsp;&nbsp;
                                   <span style="border:solid 1px #808080; margin-left:5px;"></span>
                                    &nbsp;
                            <span id="ctl00_lblAmount">0</span>
                            <span class="pp">د.ك</span>
                               &nbsp;
                                    <i class="fa fa-shopping-cart shopping-cart " style="color:#fff;border-radius: 50px 50px 50px 50px !important;padding:5px 5px 5px 5px;background-color:#f36a5a"></i>

                                </a>

                                <ul class="dropdown-menu">
                                    <li class="external" style="padding:6px;">
                                        <h3><strong class="Fontadmin">سلة التبرعات</strong> </h3>
                                          <a href="javascript:;"> <i class="fa fa-shopping-cart shopping-cart"></i></a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 300px;" data-handle-color="#637283">
                          <div class="top-cart-content-wrapper">
                        <div class="top-cart-content">
                            <ul class="dropdown-menu-list scrolle" style="height: 250px;" ><li  >
                                  <table style="width:100%;">

                          </table>  </li> </ul>
                            <div class="text-right" style="padding-left:15px;">
                                <a href="../../Payment/basket.aspx" class="btn btn-default pplighter">مشاهدة السلة</a>
                                <a id="ctl00_lnk_Pay" class="btn btn-primary pplighter" href="javascript:__doPostBack(&#39;ctl00$lnk_Pay&#39;,&#39;&#39;)">الدفع</a>


                            </div>
                        </div>
                    </div>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->
                                           <!-- BEGIN CART -->
               <!-- BEGIN CART -->

                <!--END CART -->
                <!--END CART -->


                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN TODO DROPDOWN -->

                            <li class="dropdown dropdown-extended  dropdown-tasks" id="header_task_bar" style="display:block;" >

                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-calendar"></i>

                                </a>
                                <ul class="dropdown-menu extended tasks">
                                    <li class="external">
                                        <h3><strong>الحملات الإغاثية</strong> </h3>

                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">

                                                    <li>
                                                        <a href="https://www.khaironline.net/SharedProjects/DonateForSharedProject.aspx" target="_blank">
                                                            <span class="task">

                                                                    <i class="fa fa-minus" style="font-size: 8px;"></i>

                                                                <span class="desc FontEltany"> ساهم في مشروع  جرار زراعى /البوسنة </span>
                                                                <span class="percent">
                                                                    <img alt="" src='../Handler.ashx?id=024035150047217213160213109008096168138247025048' width="30px" height="30px" /></span>
                                                            </span>

                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="https://www.khaironline.net/SharedProjects/DonateForSharedProject.aspx" target="_blank">
                                                            <span class="task">

                                                                    <i class="fa fa-minus" style="font-size: 8px;"></i>

                                                                <span class="desc FontEltany"> ساهم في مشروع  مدرسه التقوى /بنغلاديش </span>
                                                                <span class="percent">
                                                                    <img alt="" src='../Handler.ashx?id=216008214041089094222165061049156056104170217240' width="30px" height="30px" /></span>
                                                            </span>

                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="https://www.khaironline.net/SharedProjects/DonateForSharedProject.aspx" target="_blank">
                                                            <span class="task">

                                                                    <i class="fa fa-minus" style="font-size: 8px;"></i>

                                                                <span class="desc FontEltany">إغاثة ذكية للاجئين الفلسطينيين/الأردن </span>
                                                                <span class="percent">
                                                                    <img alt="" src='../Handler.ashx?id=085046061138082056206025083005157212109033229051' width="30px" height="30px" /></span>
                                                            </span>

                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="https://www.khaironline.net/SharedProjects/DonateForSharedProject.aspx" target="_blank">
                                                            <span class="task">

                                                                    <i class="fa fa-minus" style="font-size: 8px;"></i>

                                                                <span class="desc FontEltany">صدقة لأجلها | لكفالة النازحات السوريات/سوريا </span>
                                                                <span class="percent">
                                                                    <img alt="" src='../Handler.ashx?id=154172070235226193180223106168085069080068212215' width="30px" height="30px" /></span>
                                                            </span>

                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="https://www.khaironline.net/SharedProjects/DonateForSharedProject.aspx" target="_blank">
                                                            <span class="task">

                                                                    <i class="fa fa-minus" style="font-size: 8px;"></i>

                                                                <span class="desc FontEltany">صدقة تغيثهم | تطعمهم وتنقذ أطفالهم/اليمن </span>
                                                                <span class="percent">
                                                                    <img alt="" src='../Handler.ashx?id=100144015235197016001223134093087229108119243207' width="30px" height="30px" /></span>
                                                            </span>

                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="https://www.khaironline.net/SharedProjects/DonateForSharedProject.aspx" target="_blank">
                                                            <span class="task">

                                                                    <i class="fa fa-minus" style="font-size: 8px;"></i>

                                                                <span class="desc FontEltany">صدقة تُغيثهم | إغاثة عاجلة لمتضرري الأعاصير والأمطار/بنغلاديش </span>
                                                                <span class="percent">
                                                                    <img alt="" src='../Handler.ashx?id=206022140112248061005090163067206008144075133245' width="30px" height="30px" /></span>
                                                            </span>

                                                        </a>
                                                    </li>



                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END TODO DROPDOWN -->


                            <!-- BEGIN USER LOGIN DROPDOWN -->

                            {{-- <li class="dropdown dropdown-extended quick-sidebar-toggler">

                               <a href="../Login.aspx?M=Out" style ="padding :0px;margin :0px;"> <i class="icon-logout" style ="font-size :20px;color : #C1CCD1"></i></a>
                            </li> --}}
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- END HEADER TOP -->


            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu" style="background: #42454C !important; margin-bottom:2.5rem;  width:100% ;  height: 3rem;">
                <div class="container"  style="" >
                    <!-- BEGIN HEADER SEARCH BOX -->

                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN MEGA MENU -->
                    <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                    <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                    <div class="" style="position: relative ;">
                        <div>
                           <ul class="nav navbar-nav" style="position: absolute; top: 0px; right: 0; display: flex; justify-content: flex-end; list-style-type: none; margin: 0; padding: 0;">
                               <li class="active" style=" margin-left: 0;">
                                   <a href="{{route('onlineService')}}" class="pplighter" style="font-size: 15px">الرئيسية</a>
                               </li>
                               <li class="menu-dropdown mega-menu-dropdown ">
                                   <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle"><span class="pplighter">إحصاءات</span> <i class="fa fa-angle-down"></i>
                                   </a>
                                   <ul class="dropdown-menu" style="min-width: 510px">
                                       <li>
                                           <div class="mega-menu-content">
                                               <div class="row">
                                                   <div class="col-md-5">
                                                       <ul class="mega-menu-submenu ">
                                                           <li>
                                                               <a href="{{route('elkhertabraat')}}" class="iconify ">
                                                                   <i class="icon-basket"></i><span class="" style="font-family: 'Segoe UI' !important; font-size: 20px;">تبرعاتي</span>
                                                               </a>
                                                           </li>
                                                           <li>
                                                               <a href="{{route('elkhermasert')}}" class="iconify ">
                                                                   <i class="icon-home"></i>
                                                                   <span class="" style="font-family: 'Segoe UI' !important; font-size: 20px;"> مسيرة الخير</span>   </a>
                                                           </li>

                                                       </ul>
                                                   </div>


                                               </div>
                                           </div>
                                       </li>
                                   </ul>
                               </li>
                               <li class="menu-dropdown">
                                   <a href="{{route('elkhermashroat')}}" class="tooltips" data-container="body" data-placement="bottom" data-html="true"><span class="pplighter">مشروعاتي</span>
                                   </a>

                               </li>
                               <li class="menu-dropdown">
                                   <a href="{{route('elkherkafalat')}}" class="tooltips" data-container="body" data-placement="bottom" data-html="true"><span class="pplighter">كفالاتي</span>
                                   </a>

                               </li>
                               <li class="menu-dropdown">
                                   <a href="{{route('elkherarshef')}}" class="tooltips" data-container="body" data-placement="bottom" data-html="true"><span class="pplighter">تقاريري</span>
                                   </a>

                               </li>

                               <li class="menu-dropdown">
                                   <a href="#" class="tooltips" data-container="body" data-placement="bottom" data-html="true" ><span class="pplighter" style="font-size: 16px">أسئلة شائعة</span> </a>
                               </li>
                               <li class="menu-dropdown classic-menu-dropdown ">
                                   <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;"><span class="pplighter">تواصل </span><i class="fa fa-angle-down"></i>
                                   </a>
                                   <ul class="dropdown-menu pull-left">



                                       <li>
                                           <a href="#" style="font-family: 'Segoe UI' !important; font-size: 12px;">قائمة الشكاوي
                                           </a></li>

                                   </ul>
                               </li>
                                <li class="menu-dropdown">
                                   <a href="#" class="tooltips" data-container="body" data-placement="bottom" data-html="true" ><span class="pplighter">تعديل بياناتي </span> </a>
                               </li>




                           </ul>
                        </div>
                       </div>
                    <!-- END MEGA MENU -->
                </div>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <!-- END HEADER -->



          <!-- BEGIN PAGE HEAD -->
          <div class="page-head">
          </div>
         <!-- END PAGE HEAD -->

         @yield('content_elkher')

    </div>
@endsection

@yield('js')
