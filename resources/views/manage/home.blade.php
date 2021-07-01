<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>喀达尔后台管理</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{'/manage/assets/global/plugins/font-awesome/css/font-awesome.min.css'}}'}}" rel="stylesheet" type="text/css"/>
<link href="{{'/manage/assets/global/plugins/simple-line-icons/simple-line-icons.min.css'}}" rel="stylesheet" type="text/css"/>
<link href="{{'/manage/assets/global/plugins/bootstrap/css/bootstrap.min.css'}}" rel="stylesheet" type="text/css"/>
<link href="{{'/manage/assets/global/plugins/uniform/css/uniform.default.css'}}" rel="stylesheet" type="text/css"/>
<link href="{{'/manage/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css'}}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="{{'/manage/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css'}}" rel="stylesheet" type="text/css"/>
<link href="{{'/manage/assets/global/plugins/fullcalendar/fullcalendar.min.css'}}" rel="stylesheet" type="text/css"/>
<link href="{{'/manage/assets/global/plugins/jqvmap/jqvmap/jqvmap.css'}}" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="{{'/manage/assets/admin/pages/css/tasks.css'}}" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css'}}' stylesheet instead of 'components.css'}}' in the below style tag -->
<link href="{{'/manage/assets/global/css/components.css'}}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{'/manage/assets/global/css/plugins.css'}}" rel="stylesheet" type="text/css"/>
<link href="{{'/manage/assets/admin/layout2/css/layout.css'}}" rel="stylesheet" type="text/css"/>
<link href="{{'/manage/assets/admin/layout2/css/themes/grey.css'}}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{'/manage/assets/admin/layout2/css/custom.css'}}" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-boxed page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner container">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<img src="/manage/assets/admin/layout2/img/logo-default.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN PAGE ACTIONS -->
		<!-- DOC: Remove "hide" class to enable the page header actions -->
		<!-- BEGIN PAGE TOP -->
		@include('common.page_top')
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="container">
	<div class="page-container">
		@include('common.left_menu')
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<!-- BEGIN DASHBOARD STATS -->
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light blue-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								 ￥222元
							</div>
							<div class="desc">
								 总销售额
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light red-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-trophy"></i>
						</div>
						<div class="details">
							<div class="number">
								 333
							</div>
							<div class="desc">
								 总订单量
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light green-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								 44
							</div>
							<div class="desc">
								 客户数量
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light purple-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								 4555
							</div>
							<div class="desc">
								 维修总费用
							</div>
						</div>
						</a>
					</div>
				</div>
				<!-- END DASHBOARD STATS -->
				<div class="clearfix">
				</div>
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN PORTLET-->
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-share font-red-sunglo hide"></i>
									<span class="caption-subject font-red-sunglo bold uppercase">每月收入统计</span>
									<span class="caption-helper">...</span>
								</div>
								<!-- <div class="actions">
									<div class="btn-group">
										<a href="" class="btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										过滤范围&nbsp;<span class="fa fa-angle-down">
										</span>
										</a>
										<ul class="dropdown-menu pull-right">
											<li>
												<a href="javascript:;">
												Q1 2014 <span class="label label-sm label-default">
												past </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												Q2 2014 <span class="label label-sm label-default">
												past </span>
												</a>
											</li>
											<li class="active">
												<a href="javascript:;">
												Q3 2014 <span class="label label-sm label-success">
												current </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												Q4 2014 <span class="label label-sm label-warning">
												upcoming </span>
												</a>
											</li>
										</ul>
									</div>
								</div> -->
							</div>
							<div class="portlet-body">
								<div id="site_activities_loading">
									<img src="/manage/assets/admin/layout2/img/loading.gif" alt="loading"/>
								</div>
								<div id="site_activities_content" class="display-none">
									<div id="site_activities" style="height: 228px;">
									</div>
								</div>
								<div style="margin: 20px 0 10px 30px">
									<div class="row">
										<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
											<span class="label label-sm label-success">
											销售总额: </span>
											<h3>￥13,234</h3>
										</div>
										<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
											<span class="label label-sm label-danger">
											订单总量: </span>
											<h3>2999</h3>
										</div>
										<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
											<span class="label label-sm label-primary">
											利润: </span>
											<h3>￥235090</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
				</div>
				<div class="clearfix">
				</div>
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- BEGIN QUICK SIDEBAR -->
		<!--Cooming Soon...-->
		<!-- END QUICK SIDEBAR -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	@include('common.page_footer')
	<!-- END FOOTER -->
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/manage/assets/global/plugins/respond.min.js"></script>
<script src="/manage/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="/manage/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/manage/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/manage/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/manage/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/manage/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/manage/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/manage/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/manage/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/manage/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/manage/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="/manage/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>

<script src="/manage/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>


<script src="/manage/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="/manage/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="/manage/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="/manage/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/manage/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/manage/assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>
<script src="/manage/assets/admin/layout2/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/manage/assets/admin/layout2/scripts/demo.js" type="text/javascript"></script>
<script src="/manage/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="/manage/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Demo.init(); // init demo features 
   QuickSidebar.init(); // init quick sidebar
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>