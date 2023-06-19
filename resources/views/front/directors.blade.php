@extends('front.layout.main')

@push('styles')
    <style>
        .single-news-list {
            overflow: hidden;
            float: right;
        }

        .single-news-list .wrap {
            background-color: #fff;
            border-radius: 20px;
            border: 2px solid #dfdfdf;
            overflow: hidden;
        }

        .single-news-list h3 a {
            font-size: 20px;
            color: #F26522;
        }

        .single-news-list h3 {
            height: 70px;
        }

    </style>
@endpush

@section('content')
    <div class="main-content">
        <!-- Section: inner-header -->
        <section class="inner-header divider layer-overlay overlay-dark-8" data-bg-img="images/bg/bg2.webp">
            <div class="container pt-40 pb-40">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6 float-{{ $reverseFloat }}">
                            <h2 class="text-white font-36">@lang('breadcrumbs.directors')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">@lang('breadcrumbs.directors')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 single-news-list mb-10">
                        <div class="p-3 wrap">
                            <a href="#"><img src="https://hofath.org/dist/MANAGERS_PNG/photo5.png" alt="تجربة"
                                             srcset=""></a>
                            <h3><a href="#">المحامى / عبدالعزيز سيد عبدالله الرفاعى</a></h3>
                            <p>رئيس مجلس الإدارة </p>
                            <!-- <div class="d-flex align-items-center justify-content-between">
                                <div class="date">تفاصيل</div>
                                <div class="share"></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-4 single-news-list mb-10">
                        <div class="p-3 wrap">
                            <a href="#"><img src="https://hofath.org/dist/MANAGERS_PNG/photo2.png" alt="تجربة"
                                             srcset=""></a>
                            <h3><a href="#">المهندس / أحمد عبدالمحسن عبدالله المرشد</a></h3>
                            <p>نائب رئيس مجلس الإدارة </p>
                            <!-- <div class="d-flex align-items-center justify-content-between">
                                <div class="date">تفاصيل</div>
                                <div class="share"></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-4 single-news-list mb-10">
                        <div class="p-3 wrap">
                            <a href="#"><img src="https://hofath.org/dist/MANAGERS_PNG/photo3.png" alt="تجربة"
                                             srcset=""></a>
                            <h3><a href="#">السيد / أسـامه راشـد محمد على</a></h3>
                            <p>أمين السـر </p>
                            <!-- <div class="d-flex align-items-center justify-content-between">
                                <div class="date">تفاصيل</div>
                                <div class="share"></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-4 single-news-list mb-10">
                        <div class="p-3 wrap">
                            <a href="#"><img src="https://hofath.org/dist/MANAGERS_PNG/photo4.png" alt="تجربة"
                                             srcset=""></a>
                            <h3><a href="#">السيد / عادل محمد خلف الدريبـان</a></h3>
                            <p>أمين الصندوق </p>
                            <!-- <div class="d-flex align-items-center justify-content-between">
                                <div class="date">تفاصيل</div>
                                <div class="share"></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-4 single-news-list mb-10">
                        <div class="p-3 wrap">
                            <a href="#"><img src="https://hofath.org/dist/MANAGERS_PNG/photo1.png" alt="تجربة"
                                             srcset=""></a>
                            <h3><a href="#">الدكتور / عبدالله محمد عبدالله العلي</a></h3>
                            <p>عضو مجلس الإدارة </p>
                            <!-- <div class="d-flex align-items-center justify-content-between">
                                <div class="date">بيانات</div>
                                <div class="share"></div>
                            </div> -->
                        </div>
                    </div>

                    <div class="col-md-4 single-news-list mb-10">
                        <div class="p-3 wrap">
                            <a href="#"><img src="https://hofath.org/dist/MANAGERS_PNG/photo6.png" alt="تجربة"
                                             srcset=""></a>
                            <h3><a href="#">عميد متقاعد / حسن يوسف حسن اليوسف</a></h3>
                            <p>عضو مجلس الإدارة </p>
                            <!-- <div class="d-flex align-items-center justify-content-between">
                                <div class="date">تفاصيل</div>
                                <div class="share"></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-4 single-news-list mb-10">
                        <div class="p-3 wrap">
                            <a href="#"><img src="https://hofath.org/dist/MANAGERS_PNG/photo7.png" alt="تجربة"
                                             srcset=""></a>
                            <h3><a href="#">المهندس / محمود إسحق محمود حسن</a></h3>
                            <p>عضو مجلس الإدارة </p>
                            <!-- <div class="d-flex align-items-center justify-content-between">
                                <div class="date">تفاصيل</div>
                                <div class="share"></div>
                            </div> -->
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
