<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{$data['news']->title}}</title>
<link rel="shortcut icon" href="/home/images/favicon.ico">
<link rel="stylesheet" href="/home/css/master.css">
<link rel="stylesheet" href="/home/css/responsive.css">
</head>
<body>

<!--=== Loader Start ======-->
<div id="loader-overlay">
  <div class="loader-wrapper">
    <div class="scoda-pulse"></div>
  </div>
</div>
<!--=== Loader End ======-->

<!--=== Wrapper Start ======-->
<div class="wrapper">

  <!--=== Header Start ======-->
    @include('home.header')
  <!--=== Header End ======-->

  <!--=== page-title-section start ===-->
  <section class="title-hero-bg blog-cover-bg" data-stellar-background-ratio="0.2">
    <div class="container">
      <div class="page-title text-center">
        <h1>News Detail</h1>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===-->

  <!--=== Blogs Start ======-->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="post">
            <div class="post-info">
              <h3><a href="#">{{$data['news']->title}}</a></h3>
              <h6>{{date("Y-m-d H:i:s",$data['news']->created_at)}}</h6>
            </div>
          </div>
          <div class="blog-standard">
            <p>{!! $data['news']->content !!}</p>
          </div>

          <div class="row">
            <div class="col-sm-6">
              @foreach($data['prev'] as $vo)
              <div class="panel-group accordion-color mt-50" id="accordion-color">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"> <a class="collapsed"  data-parent="#accordion-color" href="/type/news/{{$vo->id}}.html"> {{$vo->title}} </a> </h3>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
             <div class="col-sm-6">
             @foreach($data['next'] as $vo)
              <div class="panel-group accordion-color mt-50" id="accordion-color">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"> <a data-parent="#accordion-color" href="/type/news/{{$vo->id}}.html"> {{$vo->title}} </a> </h3>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="post-controls">
            <!-- 分享<div class="post-share">
              <ul>
                <li> Share: </li>
                <li> <a href="#"><i class="icofont icofont-facebook"></i></a> </li>
                <li> <a href="#"><i class="icofont icofont-twitter"></i></a> </li>
                <li> <a href="#"><i class="icofont icofont-linkedin"></i></a> </li>
              </ul>
            </div> -->
          </div>
        </div>
        <!--=== Left Side End===-->
        <div class="col-md-3 col-md-offset-1 right-col-rv">
          <div class="widget sidebar_widget widget_archive">
            <h4 class="widget-title">资讯热榜</h4>
            <ul>
            @foreach($data['news_click'] as $vo)
              <li> -<a href="#">{{$vo->title}}</a> </li>
            @endforeach
            </ul>
          </div>
        </div>

        <div class="col-sm-3 col-md-offset-1 right-col-rv">
          <div class="banner-box help-bg mt-30">
            <div class="red-overlay-bg"></div>
            <div class="relative white-color text-center">
              <h4 class="text-uppercase">We're Here to Help!</h4>
              <p>We're friendly and available to chat. Reach out to us anytime and we'll happily answer your questions.</p>
              <a class="btn btn-outline-white btn-square mt-10">Contact Us</a> </div>
          </div>
        </div>
        <!--=== Right Side End ===-->
      </div>
    </div>
  </section>
  <!--=== Blogs End ======-->

  <!--=== Footer Start ======-->
  @include('home.footer')
  <!--=== Footer End ======-->

  <!--=== GO TO TOP  ===-->
  <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
  <!--=== GO TO TOP End ===-->

</div>
<!--=== Wrapper End ======-->

<!--=== Javascript Plugins ======-->
<script src="/home/js/jquery.min.js"></script>
<script src="/home/js/validator.js"></script>
<script src="/home/js/plugins.js"></script>
<script src="/home/js/master.js"></script>
<script src="/home/js/bootsnav.js"></script>
<!--=== Javascript Plugins End ======-->

</body>
</html>
