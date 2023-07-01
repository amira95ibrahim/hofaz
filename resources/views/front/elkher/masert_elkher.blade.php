@extends('front.elkher.app')
@section('css')

@endsection
@section('content_elkher')

     <!-- BEGIN PAGE CONTENT -->
 <div class="page-content  ">
    <div class="container" style="margin-bottom: 10rem">
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">

            <li>
                <a href="SDefault.aspx" class="pp" style="font-size: 16px;">حسابي الخيري</a><i style="font-size: 16px;" class="fa fa-angle-left"></i>
            </li>
            <li class="active"><span class="pp" style="font-size: 16px;">مسيرتى</span>
            </li>


        </ul>
        <!-- END PAGE BREADCRUMB -->
        <div style="width:100% ;text-align: center">
         <img src="{{asset('images/404page.png')}}" alt="" style=" width:70% ; ">
         <h2 style="color:#f2784b">نــأسف لتعرضكم لــهذا الموقـف...</h2>
        </div>
    </div>
 </div>




@endsection
@section('js')

@endsection

