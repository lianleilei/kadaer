<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{$types->name}}-产品中心-皮卡车改装-郑州喀达尔</title>
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
  <section class="title-hero-bg shop-cover-bg" data-stellar-background-ratio="0.2">
    <div class="container">
      <div class="page-title text-center">
        <h1>{{$types->name}}</h1>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===-->
  
  <!--=== Products Start ======-->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-10">
        @foreach($data['product'] as $vo)
          <div class="col-md-4 col-sm-4">
            <div class="product">
              <div class="product-wrap"> <img src="{{$vo->thumb}}" class="img-responsive" alt="team-01">
                <div class="product-caption">
                  <div class="product-description text-center">
                    <div class="product-description-wrap">
                      <div class="product-title"> <a href="/product/{{$vo->id}}.html" class="btn btn-color btn-circle" target="_blank">查看详情 <span class="icon"><i class="mdi mdi-cart"></i></span></a> </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="product-detail">
                <h4>{{str_limit($vo->title,25,'..')}}</h4>
                <p>￥{{$vo->price}}</p>
              </div>
            </div>
          </div>
        @endforeach
          <div class="row">
            <div class="col-md-12">
              <div class="clearfix">
                {{ $data['product']->links() }}
              </div>
            </div>
          </div>
        </div>
        <!--=== Left Side End===-->
        <div class="col-md-1">
          <div class="widget sidebar_widget widget_categories">
            <ul>
            @foreach($data['group'] as $vo)
              <li>
                <div> <a href="/product/{{$vo->english}}" class="btn btn-yellow btn-circle btn-animate" style="color: #fff;"><span>{{$vo->name}}<i class="icofont icofont-simple-right"></i></span></a> </div>
              </li>
            @endforeach
            </ul>
          </div>
        </div>
        <!--=== Right Side End ===-->
      </div>
    </div>
  </section>
  <!--=== Products End ======-->
  
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