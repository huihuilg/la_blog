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
                        <li><a href="{{url('home/index')}}" >首页</a></li>
                        <li><a href="{{url('home/about')}}" >关于</a></li>
                        <li><a href="{{url('home/article')}}" class="active">文章</a></li>
                        <li><a href="{{url('home/moodList')}}">说说</a></li>
                        <li><a href="{{url('home/comment')}}">留言</a></li>
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
				@if (empty($result[0]))
				<br>
				<div style="color:red; text-align: center;">查询到的数据为空</div>
				@else
				<ol class="breadcrumb w_breadcrumb">
				  <li><a href="{{url('home/index')}}">首页</a></li>
				  <li><a href="{{url('home/article')}}">文章</a></li>

				  <li class="active">{{$result[0]['title']}}</li>
				  <span class="w_navbar_tip">我们长路漫漫，只因学无止境。</span>
				</ol>
				
				<div class="col-lg-9 col-md-9 w_main_left">
					<div class="panel panel-default">
						<div class="panel-body">
							@foreach ($result as $val)
							<div style="text-align: center;">
								<h2 class="c_titile">{{$val->title}}</h2>
								<p class="box_c"><span class="d_time">发布时间：{{$val->created_at}}</span>&nbsp;&nbsp;<span>作者：{{$val->user_name}}</span>&nbsp;&nbsp;<span></span></p>
							</div>
							<ul class="infos">
								 {{$val->content}}
							</ul>
																							
							<div class="nextinfo">
								@if  (empty($prev[0]))
								@else
								@foreach ($prev as $v)
								<p class="last">上一篇：<a href="{{url("home/articledetail?id=$v->id")}}">{{$v->title}}</a></p>
								@endforeach
								@endif

								@if  (empty($next[0]))
								@else
								@foreach ($next as $v)
								<p class="next">下一篇：<a href="{{url("home/articledetail?id=$v->id")}}">{{$v->title}}</a></p>
								@endforeach
								@endif
						    </div>
							@endforeach
						</div>
					</div>
					@endif
					

					@if (empty($pingl[0]))
						<div style="color:red; text-align: center;">查询到的数据为空</div>
					@else
					@foreach ($pingl as $val)
					<img style="margin-top:30px;width: 80px;height: 80px; border-radius: 50px;float: left;" src="{{ URL::asset("$val->picture") }}">
						<div class="div1">
							{{$val->content}}
						</div> 
						<div style="clear: both"></div>
						<div style=" margin-left: 18px;margin-top: 0px;">{{$val->user_name}}
						</div>
					@endforeach
					@endif
					@if (empty($result[0]))
					<br>
					<div style="color:red; text-align: center;">查询到的数据为空</div>
					@else
					<form method="post" action="pingl?id={{$result[0]->id}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<div class="d">
						<textarea class="div" name="content" rows="4" cols="10">
						</textarea> 
						
					</div>
					<input style="background: #a6a6a6;" type="submit" name="sub" value="评论">
					</form>
					@endif
					<div>{!! $pingl->appends(['id' => $id])->links() !!}</div>
				</div>
					

				<div class="col-lg-3 col-md-3 w_main_right">
					
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">最新发布</h3>
					  </div>
					  <div class="panel-body">
					    	<ul class="list-unstyled sidebar">	
					    		@if (empty($new[0]))
								<br>
								<div style="color:red; text-align: center;">查询到的数据为空</div>
								@else
					    		@foreach ($new as $val)			
								<li><a href="{{url("home/articledetail?id=$val->id")}}">{{$val->title}}</a></li>
								@endforeach
								@endif				
						</ul>
					  </div>
					</div>
					
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">友情链接</h3>
					  </div>
					  <div class="panel-body">
					    <div class="newContent">
					    	<ul class="list-unstyled sidebar shiplink">				
								<li><a href="https://www.baidu.com/" target="_blank">百度</a></li>
								<li><a href="https://www.oschina.net/" target="_blank">开源中国</a></li>							
								<li><a href="http://www.ulewo.com/" target="_blank">有乐网</a></li>							
								<li><a href="http://www.sina.com.cn/" target="_blank">新浪网</a></li>							
								<li><a href="http://www.qq.com/" target="_blank">腾讯网</a></li>							
							</ul>
					    </div>
					  </div>
					</div>
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