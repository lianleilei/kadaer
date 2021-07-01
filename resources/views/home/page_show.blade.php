<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{$data['page']->title}}</title>
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
        <h1>{{$data['page']->title}}</h1>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===-->

  <!--=== Blogs Start ======-->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <div class="post">
            <div class="post-info">
              <h3><a href="#">{{$data['page']->title}}</a></h3>
            </div>
          </div>
          <div class="blog-standard">
            <p>{!! $data['page']->content !!}</p>
          </div>

        </div>
        <!--=== Left Side End===-->
        <div class="col-md-1">
          <div class="widget sidebar_widget widget_categories">
            <ul>
              <li>
                <div> <a href="/company/about" class="btn btn-yellow btn-circle btn-animate" style="color: #fff;"><span>关于我们<i class="icofont icofont-simple-right"></i></span></a> </div>
              </li>
              <li>
                <div> <a href="/company/contact" class="btn btn-yellow btn-circle btn-animate" style="color: #fff;"><span>联系我们<i class="icofont icofont-simple-right"></i></span></a> </div>
              </li>
              <li>
                <div> <a href="/company/zhaopin" class="btn btn-yellow btn-circle btn-animate" style="color: #fff;"><span>招贤纳士<i class="icofont icofont-simple-right"></i></span></a> </div>
              </li>
              <li>
                <div> <a href="/company/zhaoshang" class="btn btn-yellow btn-circle btn-animate" style="color: #fff;"><span>招商加盟<i class="icofont icofont-simple-right"></i></span></a> </div>
              </li>
            </ul>
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
