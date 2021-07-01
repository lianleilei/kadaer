<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{$typeinfo->name}}-新闻资讯-皮卡车改装-郑州喀达尔</title>
<meta content="{{$typeinfo->keywords}}" name="keywords">
<meta content="{{$typeinfo->description}}" name="description">
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
        <h1>{{$typeinfo->name}}</h1>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===-->

  <!--=== Blogs Start ======-->
  <section class="pt-100 pb-100">
    <div class="container">
      <div class="row">
        <div id="blogMasonry">
        @foreach($data['news'] as $vo)
          <div class="col-xs-12 col-sm-6 col-md-4 blog-masonry-item">
            <div class="post">
              <div class="post-img"> <img class="img-responsive" src="{{$vo->thumb}}" alt="{{$vo->title}}" width="360" height="240" /> </div>
              <div class="post-info">
                <h3><a href="/type/{{$name}}/{{$vo->id}}.html" target="_blank">{{$vo->title}}</a></h3>
                <h6>{{date("Y-m-d H:i:s",$vo->created_at)}}</h6>
              </div>
            </div>
          </div>
          <!--=== Post End ===-->
        @endforeach
        </div>
        <div class="blog-pagination">
          {{ $data['news']->links() }}
        </div>
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
