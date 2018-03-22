<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>辉个人博客</title>
        <style type="text/css">

        	.div{
        		padding: 10px;
        		width: 500px;background: #5acabf;
        		border-radius: 25px 0px;
        		vertical-align: middle;
        		margin-top:50px;	
        	}
        	.div1{
        		padding: 10px;
        		width: 600px;height:100px;background: #5acabf;
        		border-radius: 25px 0px;
        		vertical-align: middle;
        		float: left;
        		margin-top:30px;
        		overflow: hidden;
        	}

        </style>
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
                        <li><a href="{{url('home/index')}}">首页</a></li>
                        <li><a href="{{url('home/about')}}" >关于</a></li>
                        <li><a href="{{url('home/article')}}">文章</a></li>
                        <li><a href="{{url('home/moodList')}}">说说</a></li>
                        <li><a href="{{url('home/comment')}}" class="active">留言</a></li>
                    </ul>
                </span>
                    <div class="w_search">
                        <div class="w_searchbox">
                            <form action="/home/search" method="post">
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
				<ol class="breadcrumb w_breadcrumb">
				  <li><a href="#">首页</a></li>
				  <li class="active">评论</li>
				  <span class="w_navbar_tip">你，生命中最重要的过客，之所以是过客，因为你未曾为我停留。</span>
				</ol>
				
				<div class="col-lg-9 col-md-9 w_main_left">
					
					@if (empty($ly[0]))
						<div style="color:red; text-align: center;">查询到的数据为空</div>
					@else
					@foreach ($ly as $val)

					<div class="dd">
						<img style="margin-top:30px;width: 80px;height: 80px; border-radius: 50px;float: left;" src="{{ URL::asset("$val->picture") }}">
						<div class="div1">
							{{$val->content}}
						</div> 
						<div style="clear: both"></div>
						<div style=" margin-left: 18px;margin-top: 0px;">{{$val->user_name}}
						</div>
					</div>
					@endforeach
					@endif
					<form method="post" action="liuy">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<div class="d">
						<textarea class="div" name="ly" rows="4" cols="10">
						</textarea> 
						
					</div>
					<input style="background: #a6a6a6;" type="submit" name="sub" value="留言">
					</form>
					<!--PC版-->
					<!--<div id="SOHUCS" sid="5eab7e4c363e4cb8bed0efa3604e6b42"></div>
					<script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
					<script type="text/javascript">
					window.changyan.api.config({
					appid: 'cysPwLFm1',
					conf: 'prod_6c6350e206c502f569b865b4bf121e60'
					});
					</script>-->
					
					<!-- 多说评论框 start -->
					<div class="ds-thread" data-thread-key="5eab7e4c363e4cb8bed0efa3604e6b42" data-title="请替换成文章的标题" data-url="请替换成文章的网址"></div>
					<!-- 多说评论框 end -->
					<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
					<script type="text/javascript">
					var duoshuoQuery = {short_name:"wfyvv"};
						(function() {
							var ds = document.createElement('script');
							ds.type = 'text/javascript';ds.async = true;
							ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
							ds.charset = 'UTF-8';
							(document.getElementsByTagName('head')[0] 
							 || document.getElementsByTagName('body')[0]).appendChild(ds);
						})();
						</script>
					<!-- 多说公共JS代码 end -->

					
					<div>{!! $ly->links() !!}</div>
				</div>
				<div class="col-lg-3 col-md-3 w_main_right">
					<img src="{{ URL::asset('img/slider/aboutphoto.png') }}" />
				</div>


			
			
			</div>
		</div>
	</div>
	<div class="w_foot">
		<!--<div class="w_foot_copyright">© 2015~2016 版权所有 | <a target="_blank" href="http://www.miitbeian.gov.cn/" rel="nofollow">京ICP备15010892号-1</a></div>-->
		<div class="w_foot_copyright">Copyright © 2017-2020, www.wfyvv.com. All Rights Reserved. </div>
	</div>
	<!--toTop-->
	<div id="shape">
		<div class="shapeColor">
			<div class="shapeFly">
			</div>
		</div>
	</div>
	<!--snow-->
	<!--<div class="snow-container"></div>-->
</body>
</html>