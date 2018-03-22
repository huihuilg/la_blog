
<html>
<head>
<meta charset="utf-8">
<title>html5个人博客模板主题《心蓝时间轴》</title>


	<meta charset="UTF-8">
	<title>用户签名-10分钟学院</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/zhu.css')}}"/>
	<!-- <link href="{{ URL::asset('plugin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link href="{{ URL::asset('css/common.css') }}" rel="stylesheet" type="text/css"/>
    <link href="logo.ico" rel="shortcut icon" />
    <script src="{{ URL::asset('plugin/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('plugin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/jquery.page.js')}}"></script>
    <script src="{{ URL::asset('js/common.js')}}"></script>
    <script src="{{ URL::asset('js/snowy.js')}}"></script> -->
</head>

<body>
	<!-- ==================修改用户信息 strat======================= -->
	<div class="upd">
		<div class="upd_head">
			<div class="neihe_head clearFix">
				<ul>
					<li class="neihe_head_a"></li>
					<li class="neihe_head_b"></li>
					<li><a class="neihe_head_c" href="{{url('home/index')}}" style="color:red;">回到首页</a></li>
					<li class="neihe_head_b"></li>
					<li><a class="neihe_head_c" href="">修改头像</a></li>
				</ul>
			</div>
		</div>
		<!-- ====================修改头像 content================== -->
		<div class="upd_content  clearFix">
			<!-- ============left start============ -->
			<div class="upd_lf">
				<ul>
					<li class="upd_lf_li1">设置</li>
					<li class="upd_lf_li2"><a href="{{url('home/toux')}}">修改头像</a></li>
					<li class="upd_lf_li3"><a href="{{url('home/gr')}}">个人资料</a></li>
					
					<li class="upd_lf_li4"><a href="{{url('home/pwd')}}">密码安全</a></li>
				</ul>
			</div>
			<!-- =====================right start================= -->
			<div class="upd_rt">
				<p class="upd_rt_my">当前我的头像</p>
				<p class="upd_rt_my1">如果您还没有设置自己的头像，系统会显示为默认头像，您需要自己上传一张新照片来作为自己的个人头像 </p>
				<form action="touxsub" enctype="multipart/form-data" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					

					<img class="upd_rt_img" src="{{$result[0]->picture}}">
					<p class="upd_rt_sz">设置我的新头像</p>
					
					<input class="upd_rt_file" type="file" name="picture">
					<p class="upd_rt_sub">
						<input class="upd_rt_sub1"  type="submit" name="sub" value="保存">
					</p>
				</form>
			</div>
		</div>
	</div>
</body>
</html>