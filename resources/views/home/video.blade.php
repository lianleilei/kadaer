<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>改装视频</title>
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
  <section class="title-hero-bg portfolio-cover-bg" data-stellar-background-ratio="0.2">
    <div class="container">
      <div class="page-title text-center">
        <h1>皮卡车改装视频</h1>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===-->
  
  <!--=== Portfolio Start ======-->
  <section class="pt-100 pt-100">
    <div class="container">
      <div class="row">
        <div class="portfolio-container text-center">
          <ul id="portfolio-grid" class="three-column hover-two">
            @foreach($data['video'] as $vo)
            <li class="portfolio-item gutter-space" data-groups='["all", "print", "branding"]'>
              <div class="arcon-video-box"> 
                <img class="img-responsive" src="{{$vo->thumb}}" alt="">
                <div class="arcon-video-box_overlay">
                  <div class="center-layout">
                    <div class="v-align-middle"> <a class="popup-youtube" href="{{$vo->url}}">
                      <div class="play-button"><i class="icofont-youtube-play"></i> </div>
                      </a> </div>
                  </div>
                </div>
              </div>
              <!--=== /.portfolio ===-->
            </li>
            @endforeach            
          </ul>
        </div>
      </div>
      <div class="blog-pagination">
          {{ $data['video']->links() }}
      </div>
    </div>
  </section>
  <!--=== Portfolio End ======-->
  
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