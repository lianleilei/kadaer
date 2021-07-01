<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>喀达尔管理员登录</title>
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
  <section class="title-hero-bg login-cover-bg" data-stellar-background-ratio="0.2">
    <div class="table-display">
      <div class="login v-align text-center">
        <div class="signup-box">
          <ul id="signup-tabs" class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#login">管理员登录</a></li>
          </ul>
          <div id="signup-content" class="tab-content">
            <div id="login" class="tab-pane fade in active">
              <!--=== Form ===-->
              <form method="post" class="form login_type text-center" action="{{ url('/manage/doLogin') }}">
              {{ csrf_field() }}
                <!--=== Username ===-->
                <input type="text" name="name" class="form-control mb-20" placeholder="账号" >
                <!--=== Password ===-->
                <input type="password" name="password" class="form-control mb-20" placeholder="密码">
                <!--=== Submit ===-->
                <button type="submit" name="login" class="btn btn-color btn-circle full-width">登录</button>
                <!--=== Signup Text ===-->
              </form>
              <!--=== End Form ===-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===-->
  
  <!--=== GO TO TOP  ===-->
  <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
  <!--=== GO TO TOP End ===-->
  
</div>
<!--=== Wrapper End ======-->

<!--=== Javascript Plugins ======-->
<script src="/home/js/jquery.min.js"></script><script src="/home/js/smoothscroll.js"></script>
<script src="/home/js/validator.js"></script>
<script src="/home/js/plugins.js"></script>
<script src="/home/js/master.js"></script>
<script src="/home/js/bootsnav.js"></script>
<!--=== Javascript Plugins End ======-->

</body>
</html>