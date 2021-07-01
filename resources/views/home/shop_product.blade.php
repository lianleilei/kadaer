<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{$data['product']->title}}-产品中心-皮卡车改装-郑州喀达尔信息科技有限公司</title>
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
  @include('home.nobj_header')
  <!--=== Products Start ======-->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="product-slider flexslider">
            <ul class="slides">
              <li data-thumb="{{$data['product']->thumb}}"> <img src="{{$data['product']->thumb}}" class="img-responsive" alt="single-product" /> </li>
            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <h2>{{$data['product']->title}}</h2>
          <h3 class="grey">￥{{$data['product']->price}} <span class="old-price font-18px">￥{{$data['product']->price + 400}}</span></h3>
          <div class="single-product-qty">
            <form>
              <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4">
              <span class="input-group-btn"><a href="https://www.tmall.com" class="btn btn-dark" target="_blank">购买 <i class="icofont icofont-cart"></i></a></span>
            </form>
          </div>
          <div class="product-fabric-detail">
            <p>{!! $data['product']->content !!}</p>
          </div>
        </div>
      </div>
      <div class="row mt-50">
        @foreach($data['relevant'] as $vo)
        <div class="col-md-3 col-sm-6">
          <div class="product">
            <div class="product-wrap"> <img src="{{$vo->thumb}}" class="img-responsive" alt="team-01">
              <div class="product-caption">
                <div class="product-description text-center">
                  <div class="product-description-wrap">
                    <div class="product-title"> <a href="/product/{{$vo->id}}.html" class="btn btn-color btn-circle">查看详情 <span class="icon"><i class="mdi mdi-cart"></i></span></a> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-detail">
              <h4>{{$vo->title}}</h4>
              <p>￥{{$vo->price}}</p>
            </div>
          </div>
        </div>
      @endforeach
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