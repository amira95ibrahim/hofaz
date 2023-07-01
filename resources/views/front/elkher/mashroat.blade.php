@extends('front.elkher.app')
@section('css')

@endsection
@section('content_elkher')

<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="container" style="margin-bottom: 10rem">
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">

            <li>
                <a href="SDefault.aspx" class="pp" style="font-size: 16px;">حسابي الخيري</a><i style="font-size: 16px;" class="fa fa-angle-left"></i>
            </li>
            <li class="active"><span class="pp" style="font-size: 16px;">مشروعاتى</span>
            </li>


        </ul>
        <!-- END PAGE BREADCRUMB -->
<!-- BEGIN ACCORDION PORTLET-->
<div id="dvPortlet " class="portlet box" style="background-color: #f2784b; border: 1px solid #f2784b; position: static; zoom: 1; padding:0 30px ; ">
    <div class="portlet-title row" style="padding: 10px ;">
    <div class="col" style="margin-top: 3px;  display:inline-block " >
        <h4 style="color:white">
         <i class="fa fa-sort" style="font-size: 20px; padding: 0 0px;"></i>
         <span> ترتيب حسب :</span>
        </h4>
    </div>
    <div class="col row btn-group" data-toggle="buttons" style="margin: 7px 10px;">
        <label id="btnShowCountry" class="btn btn-default  pp2 btnSort" style="width: 150px; font-size: 15px;">
            <input class="toggle" type="radio">
            <i class="fa fa-flag" style="color: #000; margin-left: 10px; font-size: 15px; color: #008aff;"></i>
            الدولة
        </label>
        <label id="btnShowYears" class="btn btn-default pp2 btnSort active" style="width: 150px; font-size: 15px;">
            <input class="toggle" type="radio">
            <i class="fa fa-sort-amount-desc" style="color: #000; margin-left: 10px; font-size: 15px; color: #008aff;"></i>
            السنة
        </label>
    </div>
    </div>
    <div class="portlet-body">
    <div class="panel-group accordion" id="accordion">
    </div>
    </div>
</div>
<div style="border: #f2784b solid  2px ; padding:20px">
  <span></span>
</div>
<!-- END ACCORDION PORTLET-->

    </div>
 </div>


@endsection
@section('js')

@endsection

