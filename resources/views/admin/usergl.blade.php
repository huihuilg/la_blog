@include ('header');
<div class="view-product">
				<div class="authority">
					<div class="authority-head">
						<div class="manage-head">
							<h6 class="layout padding-left manage-head-con">用户管理
						
							</h6>
						</div>
					</div>
					<div class="authority-content">
						<div class="list-content show">
							<div class="offcial-table tr-border margin-big-top clearfix">
								<div class="tr-th clearfix">
									<div class="th w20">
										用户名
									</div>
									<div class="th w30">
										注册时间
									</div>
									<div class="th w15">
										用户类型
									</div>
									
									<div class="th w15">
										操作
									</div>
								</div>
								@if (!empty($result[0]))
								@foreach ($result as $val)
								<div class="tr clearfix border-bottom-none">
									<div class="td w20">
										{{$val->user_name}}
									</div>
									<div class="td w30">
										{{$val->created_at}}
									</div>
									<div class="td w15">
									@if ($val->is_admin==1)
									
										管理员
									@else
									普通用户
									@endif
									</div>
									
									@if ($val->is_lock==0)
									<div class="td w15">
										<a href="{{url("admin/userLock?id=$val->id")}}" msg="您是否删除此站点，如果删除会影响站点通信导致部分功能无法使用？" callback="del_site(624)" data-id="" class="button-word2 btn_ajax_confirm">点击锁定</a>
									</div>
									@else
									<div class="td w15">
										<a href="{{url("admin/disLock?id=$val->id")}}" msg="您是否删除此站点，如果删除会影响站点通信导致部分功能无法使用？" callback="del_site(624)" data-id="" class="button-word2 btn_ajax_confirm">点击解锁</a>
									</div>
									@endif
									@if($val->is_admin==0)
									<a href="{{url("admin/userdel?id=$val->id")}}">删除</a>
									@endif
								</div>
								@endforeach
								@endif
							</div>
						</div>
						<div class="show-page padding-big-right">
							<div class="page">
								<div class="page">
									<ul class="offcial-page margin-top margin-big-right">
										<li>共<em class="margin-small-left margin-small-right">{{$count}}</em>条数据</li>
										<li>每页显示<em class="margin-small-left margin-small-right">2</em>条</li>
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