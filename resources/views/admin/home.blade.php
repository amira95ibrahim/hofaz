@extends('admin.layouts.app')



@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @lang('dashboard.home')
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{ url('admin/home') }}">@lang('dashboard.home')</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua boxx">
            <div class="inner text-right">
                <h3>310715</h3>
                <p >@lang('dashboard.number_of_sucessful_donations')</p>
            </div>
            <div class="icon text-left">
                <i class='fa fa-shopping-bag'></i>
            </div>


          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green boxx">
            <div class="inner text-right">
                <h3>320</h3>
                <p>  @lang('dashboard.number_of_projects')</p>
            </div>
            <div class="icon text-left">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow boxx">
            <div class="inner text-right">
               <h3> 26563   </h3>
               <p>@lang('dashboard.doners')</p>
            </div>
            <div class="icon text-left">
                <i class="fa  fa-user-plus "></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red boxx">
            <div class="inner text-right">
               <h3> 545 </h3>
               <p> @lang('dashboard.Ended_projects')</p>
            </div>
            <div class="icon text-left">
                <i class="fa fa-pie-chart"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
	    <div>
		</div>


		<div class="row">
	        <!-- Left col -->
	        <div class="col-md-12">

	          <!-- TABLE: LATEST ORDERS -->
	          <div class="box box-info">
	            <div class="box-header with-border">
	              <h3 class="box-title">آخر التبرعات</h3>

	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                </button>
	                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	              </div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <div class="table-responsive">
	                <table class="table no-margin">
	                  <thead>
                        <tr>

                            <th style="text-align:right">@lang('dashboard.donation_number')</th>
                            <th style="text-align:right">@lang('dashboard.project')</th>
                            <th style="text-align:right">@lang('dashboard.status')</th>
                            <th style="text-align:right">@lang('dashboard.amount')</th>

                        </tr>
	                  </thead>
	                  <tbody >

                        <tr>
                            <td>254</td>
                            <td>قران</td>
                            <td><h6> <span class="badge bg-success">ناجح</span></h6></td>
                            <td>240ك ب</td>
                        </tr>
                        <tr>
                            <td><a href="donates/getpayinfo/chg_LV02H0720230707Mc2q1706163">501489</a></td>
                            <td>عشرة الخير- مشاريع الصدقة الجارية</td>
                            <td><span class="label bg-red">فشلت</span></td>
                            <td>
                            <div class="sparkbar" data-color="#00a65a" data-height="20">500د.ك.</div>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="donates/getpayinfo/chg_LV02H0720230707Mc2q1706163">501490</a></td>
                            <td>مساعدات مسلمي الروهينغيـا </td>
                            <td><span class="label bg-red">فشلت</span></td>
                            <td>
                            <div class="sparkbar" data-color="#00a65a" data-height="20">500د.ك.</div>
                            </td>
                        </tr>

	                  </tbody>
	                </table>
	              </div>
	              <!-- /.table-responsive -->
	            </div>
	            <!-- /.box-body -->
	            <div class="box-footer clearfix">
	              <a href="donates" class="btn btn-sm btn-info btn-flat pull-left">عرض الكل</a>
	            </div>
	            <!-- /.box-footer -->
	          </div>
	          <!-- /.box -->
	        </div>
	        <!-- /.col -->

	        <div class="col-md-4" style="display:none;">
	          <!-- Info Boxes Style 2 -->
	          <div class="info-box bg-yellow">
	            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Inventory</span>
	              <span class="info-box-number">5,200</span>

	              <div class="progress">
	                <div class="progress-bar" style="width: 50%"></div>
	              </div>
	              <span class="progress-description">
	                    50% Increase in 30 Days
	                  </span>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	          <div class="info-box bg-green">
	            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Mentions</span>
	              <span class="info-box-number">92,050</span>

	              <div class="progress">
	                <div class="progress-bar" style="width: 20%"></div>
	              </div>
	              <span class="progress-description">
	                    20% Increase in 30 Days
	                  </span>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	          <div class="info-box bg-red">
	            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Downloads</span>
	              <span class="info-box-number">114,381</span>

	              <div class="progress">
	                <div class="progress-bar" style="width: 70%"></div>
	              </div>
	              <span class="progress-description">
	                    70% Increase in 30 Days
	                  </span>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	          <div class="info-box bg-aqua">
	            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Direct Messages</span>
	              <span class="info-box-number">163,921</span>

	              <div class="progress">
	                <div class="progress-bar" style="width: 40%"></div>
	              </div>
	              <span class="progress-description">
	                    40% Increase in 30 Days
	                  </span>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->


	        </div>

	    </div>

    </section>





@endsection
