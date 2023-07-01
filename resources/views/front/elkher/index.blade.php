@extends('front.elkher.app')
@section('content_elkher')
 <!-- BEGIN PAGE CONTENT -->
 <div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">

            <li>
                <a href="SDefault.aspx" class="pp" style="font-size: 16px;">حسابي الخيري</a><i style="font-size: 16px;" class="fa fa-angle-left"></i>
            </li>
            <li class="active"><span class="pp" style="font-size: 16px;">الرئيسية</span>
            </li>


        </ul>
        <!-- END PAGE BREADCRUMB -->
        <div id="ctl00_ContentPlaceHolder1_RadAjaxPanel1">
            <!-- 2014.2.724.45 -->
           <div class="alert alert-info" style=" font-family: GSSLight; font-size: 12px;padding:5px;padding-right:10px;">
            أخر تحديث للبيانات منذ
                <strong style="font-family: Arial;"> <span id="ctl00_ContentPlaceHolder1_lbltime">40</span></strong>
                 دقيقة

           </div>
            <div class="row margin-top-10">
                <!-- BEGIN DASHBOARD STATS -->
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row " style="text-align: left">

                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
                        <!-- small box -->
                        <div class="small-box bg_inffo">
                          <div class="inner">
                            <h4>KD</h4><h2>{{$kfalatys}}</h2>

                            <h5>كفالاتى</h5>
                          </div>
                          <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                          </div>
                          <a href="{{route('elkherkafalat')}}" class="small-box-footer"><span id="ctl00_ContentPlaceHolder1_lblOrfCount">0</span><span class="pp"> مكفول / مساهمات كفالات </span>  <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
                        <!-- small box -->
                        <div class="small-box bg_semon">
                          <div class="inner">
                            <h4>KD</h4><h2>{{$tabratys}}</h2>

                            <h5>تبرعاتى</h5>
                          </div>
                          <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                          </div>
                          <a href="{{route('elkhertabraat')}}" class="small-box-footer"><span id="ctl00_ContentPlaceHolder1_lblOrfCount"></span><span class="pp"> المزيد</span>  <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
                        <!-- small box -->
                        <div class="small-box bg_azraa">
                          <div class="inner">

                            <h2>مسيرة </h2>

                            <h2>الخير</h2>

                          </div>
                          <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                          </div>
                          <a href="{{route('elkhermasert')}}" class="small-box-footer"><span id="ctl00_ContentPlaceHolder1_lblOrfCount"></span><span class="pp"> المزيد</span>  <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="row " style="text-align: left">
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
                        <!-- small box -->
                        <div class="small-box bg_azraa">
                          <div class="inner">
                            <h2>ارشيف</h2>

                            <h2> تقاريري</h2>

                          </div>
                          <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                          </div>
                          <a href="{{route('elkherarshef')}}" class="small-box-footer"><span id="ctl00_ContentPlaceHolder1_lblOrfCount"></span><span class="pp"> المزيد</span>  <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
                        <!-- small box -->
                        <div class="small-box bg_move">
                          <div class="inner">
                            <h4>KD</h4><h2>{{$wakfyats}}</h2>

                            <h5>وقفياتى</h5>
                          </div>
                          <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                          </div>
                          <a href="{{route('elkherwakfyat')}}" class="small-box-footer"><span id="ctl00_ContentPlaceHolder1_lblWaqCount">0</span>
                            <span class="pp">وقفية / مساهمات الوقفيات</span>  <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
                        <!-- small box -->
                        <div class="small-box bg_orange">
                          <div class="inner">
                            <h4>KD</h4><h2>{{$mashroatys}}</h2>

                            <h5>مشروعاتى</h5>
                          </div>
                          <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                          </div>
                          <a href="{{route('elkhermashroat')}}" class="small-box-footer"><span id="ctl00_ContentPlaceHolder1_lblOrfCount">0</span><span class="pp"> مشروع </span>  <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                    </div>
                    <!-- /.row -->
                  </div><!-- /.container-fluid -->

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                &nbsp;
            </div>

            </div>

            <div id="DateTime" style="font-size: 18px">
            </div>

        </div>

    </div>
 </div>
@endsection

