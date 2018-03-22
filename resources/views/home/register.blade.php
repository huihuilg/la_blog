<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>短信验证</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/register.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datetime.css')}}">
	<script type="text/javascript" src="{{ URL::asset('js2/jquery-1.8.1.min.js')}}"></script>
	<style>
		.butt{
			width:274px;
		}
		#code{
			width:116px;
		}
	</style>
</head>
<body class = "body">
	<br><br><br>
	<div style="text-align:center;">
		<form class="form-inline" role="form" action="doRegister" method='post'>
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
  			<div class="form-group">
    			<label class="sr-only" for="name">用户名:</label>
    			<input type="text" class="form-control" name="name" placeholder="请输入用户名">
  			</div><br><br>
  			<div class="form-group">
    			<label for="lastname" class="col-sm-2 control-label">
    				密&nbsp;&nbsp;&nbsp;&nbsp;码:
    			</label>
      			<input type="password" class="form-control"  name="password" placeholder="请输入密码">
  			</div><br><br>
			<div class="form-group">
    			<label for="lastname" class="col-sm-2 control-label">
    				确认密码:
    			</label>
      			<input type="password" class="form-control"  name="repwd" placeholder="请输入密码">
  			</div><br><br>
  			<div class="form-group">
    			<label class="sr-only" for="name">手机号: </label>
    			<input type="text" class="form-control" id="phone" name="phone" placeholder="请输入手机号">
  			</div><br><br>
			<!-- <div class="form-group">
    			<label class="sr-only" for="name">验证码:</label>
    			<input type="text" class="form-control" name='yzm' placeholder="请输入验证码">
    			<img src="index.php?m=user&a=verify" onclick = "this.src='index.php?m=user&a=verify'"/>
  			</div><br><br> -->
  			 <!-- <div class="form-group">
    			<label class="sr-only" for="name">验证码:</label>
    			<input type="text" class="form-control" id="code" name='code' placeholder="请输入手机验证码">
    			<a href='javascript:;'  class="btn btn-info" id='getcode' name='scode' onclick='getcode()'>获取验证码</a>
  			</div><br><br> --> 

  			<button type="submit" class="btn btn-primary butt">确认提交</button>
		</form>
		

	</div>
</body>
<script>
	function getcode()
	{
		$('#getcode').text('60秒后重新获取');
		$('#getcode').removeAttr('onclick');
		var phone = $('#phone').val();
		//写个定时修改文本settime
		var time = 59;
		var into = setInterval(function(){

			$('#getcode').text(time+'秒后重新获取');
			time =time -1;
			if(time<=-1){
				clearInterval(into);
				$('#getcode').text('获取验证码');
				$('#getcode').attr('onclick');
			}
		},1000);
		//ajax    参数1,url  index1.php   参数2, 数据   1234565432
		$.get('app/controller/index1.php',{phone:phone},function(date){
			console.log(date);
		});
	}
</script>
</html>