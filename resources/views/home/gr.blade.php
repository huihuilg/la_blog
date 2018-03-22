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
<body style="background:top1.jpg;">
    <!-- ==================个人资料================ -->
    <div class="grz">
        <div class="upd_head">
            <div class="neihe_head clearFix">
                <ul>
                    <li class="neihe_head_a"></li>
                    <li class="neihe_head_b"></li>
                    <li><a class="neihe_head_c" href="{{url('home/index')}}">回到首页</a></li>
                    <li class="neihe_head_b"></li>
                    <li><a class="neihe_head_c" href="">个人资料</a></li>
                </ul>
            </div>
        </div>
        <!-- ==================个人资料 content===================== -->
        <div class="grz_content clearFix">
        <!-- ====================left start=============== -->
            <div class="upd_lf">
                <ul>
                    <li class="upd_lf_li1">设置</li>
                    <li class="upd_lf_li3"><a href="{{url('home/toux')}}">修改头像</a></li>
                    <li class="upd_lf_li2"><a href="{{url('home/gr')}}">个人资料</a></li>
                    
                    <li class="upd_lf_li4"><a href="{{url('home/pwd')}}">密码安全</a></li>
                </ul>
            </div>
            <!-- ===================right start=================== -->
            <div class="grz_ri">
                <form action="grsub" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="grz_ri_hd">
                        <p class="grz_ri_a"></p>
                        <p class="grz_ri_b">基本资料</p>
                        <p class="grz_ri_c"></p>
                    </div>
                    <div class="grz_ri_user">
                        <span class="grz_user_a">用户名</span>
                        <span  class="grz_user_b">{{$name}}</span>
                    </div>
                    <div class="grz_ri_name">
                        <span>&nbsp;邮&nbsp;箱&nbsp;&nbsp;</span>
                        <input class="grz_name_a" type="text" name="email" value="{{$result[0]['email']}}"/>
                    </div>
                    <div class="grz_ri_name">
                        <span>个性签名</span>
                        <input class="grz_name_a" type="text" name="qm" value="{{$result[0]['qm']}}"/>
                    </div>
                    <div class="grz_ri_sex" name="sex">
                        <span>性别</span>
                        <select name="sex" class="grz_sex_a">
                            <option value="2" @if ($result[0]['sex']=='2')selected="selected"
                            @endif>保密</option>
                            <option value="0" @if ($result[0]['sex']=='0')selected="selected"
                            @endif>女</option>
                            <option value="1" @if ($result[0]['sex']=='1')selected="selected"
                            @endif>男</option>
                        </select>
                    </div>
                
                    <div class="grz_ri_sub">
                        <input class="grz_sub_a" type="submit" name="sub" value="保存">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>