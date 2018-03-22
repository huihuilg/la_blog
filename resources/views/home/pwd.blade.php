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
	<!-- ==================密码安全========================= -->
	<div class="aq">
		<div class="aq_head clearFix">
			<ul>
				<li class="neihe_head_a"></li>
				<li class="neihe_head_b"></li>
				<li><a class="neihe_head_c" href="{{url('home/index')}}">回到首页</a></li>
				<li class="neihe_head_b"></li>
				<li><a class="neihe_head_c" href="">密码安全</a></li>
			</ul>
		</div>
		<!-- ===================密码安全 content========================= -->
		<div class="aq_content clearFix">
			<!-- ================left start=============================== -->
			<div class="aq_lf clearFix">
				<ul>
					<li class="upd_lf_li1">设置</li>
					<li class="upd_lf_li4"><a href="{{url('home/toux')}}">修改头像</a></li>
					<li class="upd_lf_li4"><a href="{{url('home/gr')}}">个人资料</a></li>
					
					<li class="upd_lf_li2"><a href="{{url('home/pwd')}}">密码安全</a></li>
				</ul>
			</div>
			<!-- ==================right start=============================== -->
			<div class="aq_ri">
				<form action="pwdsub" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<div class="aq_ri_hd">
						<span>您必须填写旧密码才能修改下面的资料</span>
					</div>
					<div class="aq_ri_pass">
						<span>旧密码</span>
						<span class="aq_pass_a">*</span>
						<input class="aq_pass_b" type="password" name="pwd"/>
					</div>
					<div class="aq_ri_pwd clear">
						<span>新密码</span>
						<input class="aq_pwd_a" type="password" name="newpwd"/>
						<p class="aq_pwd_b">如不需要更改密码，此处请留空 </p>
					</div>
					<div class="aq_ri_pwd">
						<span>确认新密码</span>
						<input class="aq_pwd_aa" type="password" name="replypwd"/>
						<p class="aq_pwd_b">如不需要更改密码，此处请留空 </p>
					</div>
				
					<div class="aq_ri_sub">
						<input class="aq_sub_a" type="submit" name="sub" value="保存">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>