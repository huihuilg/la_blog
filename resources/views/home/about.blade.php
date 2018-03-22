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
                        <li><a href="{{url('home/index')}}" >首页</a></li>
                        <li><a href="{{url('home/about')}}" class="active">关于</a></li>
                        <li><a href="{{url('home/article')}}">文章</a></li>
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
				
				<ol class="breadcrumb w_breadcrumb">
				  <li><a href="#">首页</a></li>
				  <li class="active">关于我</li>
				  <span class="w_navbar_tip">像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span>
				</ol>
				
				<div class="col-lg-9 col-md-9 w_main_left" style="height: 1000px;">
					<div class="about">
					  <h2>Just about me</h2>
					    <ul> 
					    	<p>{{$about[0]->content}}</p>
							<!--<p>看了很多博主的帖子，我深受鼓舞。想到自己当年大学刚入学，老师要求我们几人一组做一个网站。那个时候我们都是0基础，很多人傻乎乎的不知如何入手。时间是一个月的时间，我几乎是天天泡在图书馆，晚上11点宿舍断电，我就抱着电脑去旁边的咖啡厅通宵。没用20天的时间，我一个人，几乎看扁了所有图书馆有关PS，DW，FLASH等的书籍，粗糙的做出了属于自己的第一个网站。虽然不是那么整齐，也不是那么美观，但是我一个人做到了，老师也很惊讶。大学毕业后各种压力让我不得不放弃当初的梦想。工作碌碌无为，不是没有精神，而是觉得自己只是一个喘气的人，而不是一个为了一个目标而活着的人。几次拿起早就尘封了多年的网站设计类书本，但是迫于生活无奈又放下。多少次纠结。直到今天无意中看到博主的文章，让我心里一震。一辈子也就是几十年的时间吧，如果不能把自己无限的精力投入到有限的青春中，追寻自己的梦，那么活着和喘气又有什么区别</p>-->
					    </ul>
					  <h2>About my blog</h2>
					    <ul>
					    	<p>域  名：{{$about[0]->bolg_content}} <a href="/" class="blog_link" target="_blank">注册域名</a></p>
						    <p>服务器：{{$about[0]->server}}<a href="/" class="blog_link" target="_blank">购买空间</a></p>
						    <!--<p>备案号：***************</p>-->
					    </ul>
					</div>
				</div>
				<!--<div class="col-lg-3 col-md-3 w_main_right">
					<div class="about_c">
					    <p>昵称：<span>wilco</span> | 即步非烟</p>
					    <p>姓名：王风宇 </p>
					    <p>生日：1991-03-07</p>
					    <p>邮箱：wfyv@qq.com</p>
					    <p>籍贯：安徽省—六安市</p>
					    <p>现居：合肥市—蜀山区</p>
					    <p>职业：JavaWeb开发</p>
					</div>
				</div>-->
			
			
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