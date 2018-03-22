<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>辉个人博客</title>
    </head>

    <link href="{{ URL::asset('plugin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link href="{{ URL::asset('css/common.css') }}" rel="stylesheet" type="text/css"/>
    <link href="logo.ico" rel="shortcut icon" />
    <script src="{{ URL::asset('plugin/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('plugin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/jquery.page.js')}}"></script>
    <script src="{{ URL::asset('js/common.js')}}"></script>
    <script src="{{ URL::asset('js/snowy.js')}}"></script>
    <body>
        <div class="w_header">
            <div class="container">
                <div class="w_header_top">
                    <a href="#" class="w_logo"></a>
                    <span class="w_header_nav">
                    <ul>
                        <li><a href="{{url('home/index')}}" class="active">首页</a></li>
                        <li><a href="{{url('home/about')}}" >关于</a></li>
                        <li><a href="{{url('home/article')}}">文章</a></li>
                        <li><a href="{{url('home/moodList')}}">说说</a></li>
                        <li><a href="{{url('home/comment')}}">留言</a></li>
                    </ul>
                </span>

                    <div class="w_search">
                        <div class="w_searchbox">
                        	<form action="search" method="post">
                        		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                           		 <input type="text" placeholder="search" name="search"/>
                            	<button type="submit" >搜索</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<div class="w_container">
			<div class="container">
				<div class="row w_main_row">
					<div class="col-lg-9 col-md-9 w_main_left">			
			

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">最新发布</h3>
							</div>

							<div class="panel-body">

								<!--文章列表开始-->
								<div class="contentList">
								@if (empty($result1[0]))
								<br>
								<div style="color:red; text-align: center;">查询到的数据为空</div>
								@else
									@foreach ($result1 as $val)
									<div class="panel panel-default">
										<div class="panel-body">

											<h4><a class="title" href="{{url("home/articledetail?id=$val->id")}}">{{$val->title}}</a></h4>
											<!-- <p>
												<a class="label label-default">UUID</a>
												<a class="label label-default">java</a>
											</p> -->
											<div class="overView" style="height: 40px; overflow: hidden;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$val->content}}</div>
											<p><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">{{$val->user_name}}</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:{{$val->count}}</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:{{$val->reply_count}}</span><span class="count"><i class="glyphicon glyphicon-time"></i>{{$val->created_at}}</span></p>
										</div>
									</div>
									@endforeach
								@endif
								</div>
								<!--文章列表结束-->
								<div>{!! $result1->appends(['search' => $search])->links() !!}</div>
							</div>
						</div>
					</div>

					<!--左侧开始-->
					<div class="col-lg-3 col-md-3 w_main_right">

						


						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">友情链接</h3>
							</div>
							<div class="panel-body">
								<div class="newContent">
									<ul class="list-unstyled sidebar shiplink">
										<li>
											<a href="https://www.baidu.com/" target="_blank">百度</a>
										</li>
										<li>
											<a href="https://www.oschina.net/" target="_blank">开源中国</a>
										</li>
										<li>
											<a href="http://www.ulewo.com/" target="_blank">有乐网</a>
										</li>
										<li>
											<a href="http://www.sina.com.cn/" target="_blank">新浪网</a>
										</li>
										<li>
											<a href="http://www.qq.com/" target="_blank">腾讯网</a>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">关注微信公众号</h3>
							</div>
							<div class="panel-body">
								<img src="{{ URL::asset('img/0.jpg') }}" style="height: 230.5px;width: 230.5px;" />
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="w_foot">
			<div class="w_foot_copyright">Copyright &copy; 2017-2020, www.wfyvv.com. All Rights Reserved. <span>|</span>
				<a target="_blank" href="http://www.miitbeian.gov.cn/" rel="nofollow">皖ICP备17002922号</a>
			</div>
		</div>
	</body>
	<script type="text/javascript">
		var $backToTopEle = $('<a href="javascript:void(0)" class="Hui-iconfont toTop" title="返回顶部" alt="返回顶部" style="display:none">^</a>').appendTo($("body")).click(function() {
			$("html, body").animate({ scrollTop: 0 }, 120);
		});
		var backToTopFun = function() {
			var st = $(document).scrollTop(),
				winh = $(window).height();
			(st > 0) ? $backToTopEle.show(): $backToTopEle.hide();
			/*IE6下的定位*/
			if(!window.XMLHttpRequest) {
				$backToTopEle.css("top", st + winh - 166);
			}
		};

		$(function() {
			$(window).on("scroll", backToTopFun);
			backToTopFun();
		});
	</script>

</html>