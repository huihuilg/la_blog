@include('header')
<div class="view-product">
				<div class="authority">
					<div class="authority-head">
						<div class="manage-head">
							<h6 class="layout padding-left manage-head-con">博文管理
						
							</h6>
						</div>
					</div>
					<div class="authority-content">
						<div class="list-content show">
							<div class="offcial-table tr-border margin-big-top clearfix">
								<div class="tr-th clearfix">
								<div class="th w20">
										操作
									</div>
									<div class="th w20">
										标题
									</div>
									<div class="th w15">
										浏览量
									</div>
									<div class="th w15">
										作者
									</div>
									
									<!-- <div class="th w15">
										回复
									</div> -->
									
									<div class="th w15">
										发表时间
									</div>
									
								</div>
								<form method="post" action="bowenEdit">
								@if (!empty($result[0]))
								@foreach ($result as $key=>$value)
								<div class="tr clearfix border-bottom-none">
									<div class="td w20">
									<input class="checkbox" type="checkbox" name="id[]" value="{{$value['id']}}">
									</div>
									<div class="td w20">
										{{$value->title}}
									</div>
									<div class="td w15">
										{{$value->count}}
									</div>
									<div class="td w15">
										{{$value->user_name}}
									</div>
									<!-- <div class="td w15">
										{$value['replycount']}
									</div> -->
									
									<div class="td w15">
									{{$value->created_at}}
						
									</div>
								
								</div>@endforeach
						@endif
								
							</div>
						</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<input type="submit" class="btn" name="bowendel" value="删除博文" style=" border:1px solid;"/>	<input type="submit" class="btn" name="bowenhf" value="恢复博文" style="border:1px solid;"/>		</form>
						<div class="show-page padding-big-right">
							<div class="page">
								<div class="page">
									<ul class="offcial-page margin-top margin-big-right">
										<li>共<em class="margin-small-left margin-small-right">{{$count}}</em>条数据</li>
										<li>每页显示<em class="margin-small-left margin-small-right">3</em>条</li>
										<li></span></li>
									</ul>
								</div>
							</div>
						</div>
						<div >
							{!! $result->links() !!}
						</div>
					</div>
				</div>
			</div>
		</div>

		<script>
			$(".sidebar-title").live('click', function() {
				if ($(this).parent(".sidebar-nav").hasClass("sidebar-nav-fold")) {
					$(this).next().slideDown(200);
					$(this).parent(".sidebar-nav").removeClass("sidebar-nav-fold");
				} else {
					$(this).next().slideUp(200);
					$(this).parent(".sidebar-nav").addClass("sidebar-nav-fold");
				}
			});
		</script>
	</body>

</html>