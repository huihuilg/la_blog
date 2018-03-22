@include('header')
<div class="sidebar-nav">
						<div class="sidebar-title">
							<a href="#">
								<span class="icon"><b class="fl icon-arrow-down"></b></span>
								<span class="text-normal">站点管理</span>
							</a>
						</div>
						<ul class="sidebar-trans">
							<li>
								<a href="index.php?m=admin&a=bowen">
									<b class="sidebar-icon"><img src="public/images/icon_cost.png" width="16" height="16" /></b>
									<span class="text-normal">博文管理</span>
								</a>
							</li>
							<li>
								<a href="index.php?m=admin&a=bowenhs">
									<b class="sidebar-icon"><img src="public/images/icon_cost.png" width="16" height="16" /></b>
									<span class="text-normal">博文回收站</span>
								</a>
							</li>
						
							<li>
								<a href="index.php?m=admin&a=reply">
									<b class="sidebar-icon"><img src="public/images/icon_gold.png" width="16" height="16" /></b>
									<span class="text-normal">回复管理</span>
								</a>
							</li>
							<li>
								<a href="index.php?m=admin&a=replyhs">
									<b class="sidebar-icon"><img src="public/images/icon_gold.png" width="16" height="16" /></b>
									<span class="text-normal">回复回收站</span>
								</a>
							</li>
							<li>
								<a href="index.php?m=admin&a=ly">
									<b class="sidebar-icon"><img src="public/images/icon_order.png" width="16" height="16" /></b>
									<span class="text-normal">留言管理</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
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
									
									
									
									<div class="th w15">
										发表时间
									</div>
									
								</div>
								<form method="post" action="bowendel">
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
									
									
									<div class="td w15">
									{{$value->created_at}}
						
									</div>
								
								</div>
						@endforeach
						@endif
							</div>
						</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<input type="submit" class="btn" name="bowenhs" value="放入回收站" style="border:1px solid;"/>		</form>
						<div class="show-page padding-big-right">
							<div class="page">
								<div class="page">
									<ul class="offcial-page margin-top margin-big-right">
										<li>共<em class="margin-small-left margin-small-right">{{$count}}</em>条数据</li>
										<li>每页显示<em class="margin-small-left margin-small-right">3</em>条</li>
										
										<li><span class="fl"></li>
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