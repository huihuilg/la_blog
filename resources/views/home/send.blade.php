<html>
	<head>
		<title>注册界面</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="{{ URL::asset('editor/css/editormd.css')}}" />
		<script src="{{ URL::asset('editor/js/jquery.min.js')}}"></script>
		<script src="{{ URL::asset('editor/editormd.min.js')}}"></script>
		<script type="text/javascript">
			$(function() {
				testEditor = editormd("test-editormd", {
						width   : "90%",
						height  : 600,
						syncScrolling : "single",
						path    : "/editor/lib/"
					});

			});
		</script>
	</head>
	<body>
		<form action="doSend" method="post"  enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<table width="800" border="1" align="center">
				<tr>
					<td>标题</td>
					<td><input type="text" name="title"></td>
				</tr>
				<tr>
					<td>内容</td>
					<td>
						<div class="editormd" id="test-editormd">
							<textarea style="display:none;" name="content"></textarea>
						</div>
					</td>
				</tr>
				<tr>
					<td>上传图片</td>
					<td><input type="file" name="pic"></td>
				</tr>
				<tr>
					<td>板块名称</td>
					<td>
						<select name="select">
							<option  value="文章">文章</option>
							<option  value="说说">说说</option>	
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="发表"></td>
				</tr>
			</table>
		</form>
	</body>
</html>