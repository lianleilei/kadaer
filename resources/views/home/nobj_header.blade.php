  <!--=== Header Start ======-->
  <nav class="navbar navbar-default navbar-fixed white bootsnav on no-full">
    
    <div class="container">      
      <!--=== Start Header Navigation ===-->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="icofont icofont-navigation-menu"></i> </button>
        <div class="logo"> <a href="index.html"> <img class="logo logo-display" src="/home/images/logo-white.png" alt=""> <img class="logo logo-scrolled" src="/home/images/logo-black.png" alt=""> </a> </div>
      </div>
      <!--=== End Header Navigation ===-->
      
      <!--=== Collect the nav links, forms, and other content for toggling ===-->
      <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="nav navbar-nav" data-in="fadeIn" data-out="fadeOut">
          <li class="dropdown megamenu-fw"> <a href="/">网站首页</a>
          </li>
          <li class="dropdown"> <a href="/product" class="dropdown-toggle" data-toggle="dropdown">产品中心</a>
            <ul class="dropdown-menu">
              @foreach($key as $vo)
              <li><a href="/product/{{$vo->english}}">{{$vo->name}}</a></li>
              @endforeach
            </ul>
          </li>
          <li class="dropdown"> <a href="/type/news" class="dropdown-toggle" data-toggle="dropdown">新闻资讯</a>
            <ul class="dropdown-menu">
              @foreach($new_type as $vo)
              <li><a href="/type/{{$vo->english}}">{{$vo->name}}</a></li>
              @endforeach
            </ul>
          </li>
          <li class="dropdown"><a href="/video">改装视频</a>
          <li class="dropdown"> <a href="/company/about">关于我们</a></li>
          
          </li>
          <li class="dropdown"> <a href="/company/zhaopin">招贤纳士</a>
          </li>
          <li class="dropdown megamenu-fw"> <a href="/company/zhaoshang">招商加盟</a>
          </li>
        </ul>
      </div>
      <!--=== /.navbar-collapse ===-->
    </div>
  </nav>
  <!--=== Header End ======-->