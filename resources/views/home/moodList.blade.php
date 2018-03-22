<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>辉个人博客</title>
    </head>

	<script src="{{ URL::asset('plugin/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('plugin/bootstrap/js/bootstrap.min.js') }}"></script>
	<link href="{{ URL::asset('plugin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('css/common.css') }}" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/moodList.css')}}"/>
	<link rel="stylesheet" href="{{ URL::asset('plugin/jquery.page.css')}}">
	<link href="logo.ico" rel="shortcut icon"/>
	<script type="text/javascript" src="{{ URL::asset('plugin/jquery.page.js')}}"></script>
	<script src="{{ URL::asset('js/common.js')}}"></script>
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
                        <li><a href="{{url('home/moodList')}}" class="active">说说</a></li>
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
				<ol class="breadcrumb w_breadcrumb">
				  <li><a href="#">首页</a></li>
				  <li class="active">说说</li>
				  <span class="w_navbar_tip">删删写写，回回忆忆，虽无法行云流水，却也可碎言碎语</span>
				</ol>
					

			<div class="bloglist">
				@if (empty($moodlist[0]))
				<br>
				<div style="color:red; text-align: center;">查询到的数据为空</div>
				@else
				@foreach ($moodlist as $val)
			    <ul class="arrow_box">
			     <div class="sy">
			     	@if (empty($val->picture))
			     	@else
				         <img src="{{ URL::asset("$val->picture") }}">
				    @endif
			      <p style="width: 450px;height: 100px; overflow: hidden;"> {{$val->content}}</p>
			     </div>
		      	<!-- <p class="bloglist_count"><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span> <span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:22</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:0</span></p> -->
			      <span class="dateview"><?php echo date('Y-m-d',strtotime($val->created_at))?></span>
			    </ul>
			    @endforeach
			    @endif
		  	</div>

			<div id="page">
				{!! $moodlist->links() !!}
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