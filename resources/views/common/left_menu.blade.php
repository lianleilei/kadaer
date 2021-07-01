<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<div class="page-sidebar navbar-collapse collapse">
				<!-- BEGIN SIDEBAR MENU -->
				<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
				<ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
					@php
						$url_path = Request::getPathInfo();
					@endphp
					<li class="start {{Request::getPathInfo() == '/manage'?'active':''}}">
						<a href="/manage">
						<i class="icon-home"></i>
						<span class="title">概况</span>
						<span class="selected"></span>
						</a>
					</li>
					<li class="{{strpos($url_path,'website')?'active':''}}">
						<a href="/manage/website">
						<i class="icon-settings"></i>
						<span class="title">系统设置</span>
						<span class="selected "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="/manage/links">
								管理员</a>
							</li>							
						</ul>
					</li>
					<li class="{{strpos($url_path,'company')?'active':''}}">
						<a href="/manage/company/about">
						<i class="icon-grid"></i>
						<span class="title">网站介绍</span>
						<span class="selected "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="/manage/company/about">
								关于我们</a>
							</li>
							<li>
								<a href="/manage/company/contact">
								联系我们</a>
							</li>
							<li>
								<a href="/manage/company/zhaopin">
								招聘信息</a>
							</li>							
						</ul>
					</li>
					<li class="{{strpos($url_path,'type')?'active':''}}">
						<a href="/manage/type">
						<i class="icon-list"></i>
						<span class="title">栏目管理</span>
						<span class="selected "></span>
						</a>
					</li>
					<li class="{{strpos($url_path,'article')?'active':''}}">
						<a href="/manage/article">
						<i class="icon-docs"></i>
						<span class="title">文章管理</span>
						<span class="selected "></span>
						</a>
					</li>
					<li class="{{strpos($url_path,'product')?'active':''}}">
						<a href="/manage/product">
						<i class="icon-handbag"></i>
						<span class="title">产品管理</span>
						<span class="selected "></span>
						</a>
					</li>
					<li class="{{strpos($url_path,'pic')?'active':''}}">
						<a href="/manage/pic">
						<i class="icon-picture"></i>
						<span class="title">图片管理</span>
						<span class="selected "></span>
						</a>
					</li>
					<li class="{{strpos($url_path,'video')?'active':''}}">
						<a href="/manage/video">
						<i class="icon-control-play"></i>
						<span class="title">视频管理</span>
						<span class="selected "></span>
						</a>
					</li>

				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>
		<!-- END SIDEBAR -->