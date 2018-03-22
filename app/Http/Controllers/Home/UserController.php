<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use DB;
use Storage;
use App\Http\Models\Article ;
use App\Http\Models\Comment ;
use App\Http\Models\User ;
use App\Http\Models\Ly ;
class UserController extends Controller
{
	//搜索
	public function search(Request $request)
	{
		$article = new Article;
		$search = $request->input('search');
		if($search == ''){
			return showMessage(['message'=>'输入的数据为空','url'=>'/home/index']);
		}
		DB::enableQueryLog(); 
		$result1 = $article->where('title','like','%'.$search.'%')->paginate(2);
		//dd(DB::getQueryLog());

		return view('home.search',['result1'=>$result1,'search'=>$search]);
	}
	//注册页面
	public function register()
	{

		return view('home.register');
	}
	//注册
	public function doRegister(Request $request)
	{
		$user = new User;
		$name = $request->input('name');
		$re = $user->where('user_name',$name)->first();
		if($re){
			return showMessage(['message'=>'用户名已存在']);
		}
		$password = $request->input('password');
		$repwd = $request->input('repwd');
		if($password != $repwd){
			return showMessage(['message'=>'两次密码不一样']);
		}
		if (strlen($name) < 3) {
			return showMessage(['message'=>'用户名小于3个字符']);
		}
		//验证密码长度
		if (strlen($password) < 3) {
			return showMessage(['message'=>'密码小于3个字符']);
		}
		$phone = $request->input('phone');
		if(!preg_match("/^1[34578]\d{9}$/", $phone)){
			return showMessage(['message'=>'手机号格式不正确']);
		}
		$pwd = md5($password);
		$data = ['user_name'=>$name,'password'=>$pwd,'phone'=>$phone];
		$result = $user->create($data);
		$res = $user->where('user_name',$name)->first();
		$id = $res->id;
		$is_admin = $res->is_admin;
		$request->session()->put('name', $name);
		$request->session()->put('id', $id);
		$request->session()->put('is_admin', $is_admin);
		if($result){
			return showMessage(['message'=>'注册成功','url'=>'index']);
		}
		//return view('home.index');
	}
	//登录
	public function login()
	{
		return view('home.login');
	}
	//登录
	public function doLogin(Request $request)
	{
		$user = new User;
		$name = $request->input('name');
		$password = $request->input('password');
		$pwd = md5($password);
		$res = $user->where('user_name',$name)->first();
		if($res){
			if($pwd==$res->password){
				$id = $res->id;
				$is_lock = $res->is_lock;
				if($is_lock == 1){
					return showMessage(['message'=>'你的账号已被锁定，请联系管理员','url'=>'index']);

				}
				$is_admin = $res->is_admin;
				$picture = $res->picture;
				$request->session()->put('name', $name);
				$request->session()->put('id', $id);
				$request->session()->put('picture', $picture);
				$request->session()->put('is_admin', $is_admin);
				return showMessage(['message'=>'登录成功','url'=>'index']);

			}else{
				return showMessage(['message'=>'密码错误']);
			}
		}else{
			return showMessage(['message'=>'用户名错误']);
		}
	}
	//登出
	public function loginOut(Request $request)
	{
		$request->session()->flush();
		return showMessage(['message'=>'退出成功','url'=>'index']);
	}
	// 发表文章
	public function send()
	{
		return view('home.send');
	}
	// 发表文章
	public function doSend(Request $request)
	{
		$send = new Comment;
		$article = new Article;
		$select = $request->input('select');
		if($select == '说说'){
			$content = $request->input('content');
			$file = $request->file('pic');
			//var_dump($file);
			$path = null;
			if(!empty($file)){
			if ($file->isValid()) {

                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg

                // 上传文件
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                $path = '/uploads/'.$filename;
                // var_dump($path);
                // var_dump($bool);

            }
        	}
        	if($path == null){
				if($content == ''){
					return showMessage(['message'=>'内容不能为空']);
					}
				$data = ['content'=>$content];
				$result = $send->create($data);
				if($result){
					return showMessage(['message'=>'发表成功','url'=>'moodList']);
				}else{
					return showMessage(['message'=>'发表失败','url'=>'moodList']);
				}
			}else{
				if($content == ''){
					return showMessage(['message'=>'内容不能为空']);
					}
				$data = ['content'=>$content,'picture'=>$path];
				$result = $send->create($data);
				if($result){
					return showMessage(['message'=>'发表成功','url'=>'moodList']);
				}else{
					return showMessage(['message'=>'发表失败','url'=>'moodList']);
				}
			}
		}
		elseif($select == '文章'){
			$title = $request->input('title');
			if($title == ''){
				return showMessage(['message'=>'标题为空']);
			}
			$content = $request->input('content');
			if($content == ''){
				return showMessage(['message'=>'内容为空']);
			}
			$file = $request->file('pic');
			if(!empty($file)){
				if ($file->isValid()) {

	                // 获取文件相关信息
	                $originalName = $file->getClientOriginalName(); // 文件原名
	                $ext = $file->getClientOriginalExtension();     // 扩展名
	                $realPath = $file->getRealPath();   //临时文件的绝对路径
	                $type = $file->getClientMimeType();     // image/jpeg

	                // 上传文件
	                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
	                // 使用我们新建的uploads本地存储空间（目录）
	                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
	                $path = '/uploads/'.$filename;
	                // var_dump($path);
	                // var_dump($bool);

	            }
        	}else{
        		return showMessage(['message'=>'图片为空']);
        	}
        	$id = $request->session()->get('id');
        	$data = ['title'=>$title,'content'=>$content,'picture'=>$path,'uid'=>$id];
        	$result = $article->create($data);
        	if($result){
        		return showMessage(['message'=>'发表成功','url'=>'article']);
        	}else{
        		return showMessage(['message'=>'发表失败','url'=>'article']);
        	}
		}
	}
	//首页
	public function index(Request $request)
	{
		$id = $request->session()->get('id');
		$is_admin = $request->session()->get('is_admin');

		$name = $request->session()->get('name');
		$article = new Article;
		$result = $article->where('istop', '1')->get();
		DB::enableQueryLog();  
		//$r = $article->create(['title'=>'6','content'=>'5','uid'=>'1'],['title'=>'6','content'=>'5','uid'=>'1']);
		// $re = $article->destroy(10);
		// $re = User::find(1)->article;
		
		$result1 = $article->join('user','article.uid','=','user.id')->where('article.istop', '0')->where('rid','=','0')->orderBy('article.id','desc')->select('article.*','user.user_name')->paginate(3);
		//dd(DB::getQueryLog());
		return view('home.index',['result'=>$result,'result1'=>$result1,'id'=>$id,'is_admin'=>$is_admin]);
	}
	//关于我
	public function about()
	{
		$about = DB::table('about')->get();
		//var_dump($about);
		return view('home.about',['about'=>$about]);
	}
	//文章
	public function article()
	{
		$article = new Article;
		$result = $article->join('user','article.uid','=','user.id')->where('rid','=','0')->orderBy('count','desc')->select('article.*','user.user_name')->paginate(5);
		$result1 = $article->join('user','article.uid','=','user.id')->where('rid','=','0')->orderBy('article.id','desc')->select('article.*','user.user_name')->limit(4)->get();
		return view('home.article',['result'=>$result,'result1'=>$result1]);
	}
	//留言
	public function comment()
	{
		DB::enableQueryLog(); 
		$comment = new Ly;
		$ly = $comment->join('user','ly.uid','=','user.id')->orderBy('ly.id','desc')->select('ly.*','user.user_name','user.picture')->paginate(2);
		//dd(DB::getQueryLog());
		return view('home.comment',['ly'=>$ly]);
	}
	//发留言
	public function liuy(Request $request)
	{
		$ly = new Ly;
		$id = $request->session()->get('id');
		if(empty($id)){
			return showMessage(['message'=>'登录后才能留言']);
		}
		$con = $request->input('ly');

		if(empty(trim($con))){
			return showMessage(['message'=>'内容不能为空']);
		}
		$data = ['content'=>$con,'uid'=>$id];
		$result = $ly->create($data);
		if($result){
			return showMessage(['message'=>'留言成功']);
		}else{
			return showMessage(['message'=>'留言失败']);
		}
	}
	//说说
	public function moodlist()
	{
		$moodlist = DB::table('comment')->orderBy('id','desc')->paginate(3);
		return view('home.moodList',['moodlist'=>$moodlist]);

	}
	//详情
	public function articledetail(Request $request)
	{

		//return showMessage(['message'=>'失败！','url' =>url('home/index')]); 
		$article = new Article;
		$id = $request->input('id');
		DB::enableQueryLog(); 
		$re = $article->where('id',$id)->increment('count', 1);

		
		$result = $article->join('user','article.uid','=','user.id')->where('rid','=','0')->where('article.id',$id)->select('article.*','user.user_name')->get();
		//dd(DB::getQueryLog());
		// var_dump($result);
	
		// if(empty($result['items'])){
			
		// 	return redirect('home/index');
		// }

		//上一篇
		$prev = $article->join('user','article.uid','=','user.id')->where('rid','=','0')->where('article.id','<',$id)->orderBy('article.id','desc')->limit('1')->select('article.*','user.user_name')->get();
		//dd(DB::getQueryLog());
		//下一篇
		$next = $article->join('user','article.uid','=','user.id')->where('rid','=','0')->where('article.id','>',$id)->limit('1')->select('article.*','user.user_name')->get();

		//最新发布
		$new = $article->join('user','article.uid','=','user.id')->where('rid','=','0')->orderBy('article.id','desc')->select('article.*','user.user_name')->get();


		//评论
		$pingl = $article->join('user','article.uid','=','user.id')->where('rid','=',$id)->orderBy('article.id','desc')->select('article.*','user.user_name','user.picture')->paginate(2);
		return view('home.articledetail',['result'=>$result,'prev'=>$prev,'next'=>$next,'new'=>$new,'pingl'=>$pingl,'id'=>$id]);
	}
	//发表评论
	public function pingl(Request $request)
	{
		$article = new Article;
		$uid = $request->session()->get('id');
		$id = $request->get('id');
		if(empty($uid)){
			return showMessage(['message'=>'登录后才能留言']);
		}
		$con = $request->input('content');

		if(empty(trim($con))){
			return showMessage(['message'=>'内容不能为空']);
		}
		$data = ['content'=>$con,'uid'=>$uid,'rid'=>$id];
		$result = $article->create($data);
		$result = $article->where('id',$id)->increment('reply_count', 1);
		if($result){
			return showMessage(['message'=>'评论成功']);
		}else{
			return showMessage(['message'=>'评论失败']);
		}
	}
	//修改头像
	public function toux(Request $request)
	{
		$user = new User;
		$id = $request->session()->get('id');
		$result = $user->where('id',$id)->get();
		if(!empty($id)){

		}else{
			return showMessage(['message'=>'请先登录','url'=>'index']);
		}
		return view('home.toux',['result'=>$result]);
	}
	//提交头像
	public function touxsub(Request $request)
	{
		$user = new User;
		$id = $request->session()->get('id');
		$file = $request->file('picture');
			if(!empty($file)){
				if ($file->isValid()) {

	                // 获取文件相关信息
	                $originalName = $file->getClientOriginalName(); // 文件原名
	                $ext = $file->getClientOriginalExtension();     // 扩展名
	                $realPath = $file->getRealPath();   //临时文件的绝对路径
	                $type = $file->getClientMimeType();     // image/jpeg

	                // 上传文件
	                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
	                // 使用我们新建的uploads本地存储空间（目录）
	                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
	                $path = '/uploads/'.$filename;
	                // var_dump($path);
	                // var_dump($bool);
	               $data = ['picture'=>$path];
	               $result = $user->where('id',$id)->update($data);
	               if($result){
	               		return showMessage(['message'=>'修改成功','url'=>'toux']);
	               }else{
	               		return showMessage(['message'=>'修改失败']);
	               }
	            }
        	}else{
        		return showMessage(['message'=>'图片为空']);
        	}
	}
	//个人资料
	public function gr(Request $request)
	{
		$user = new User;
		$id = $request->session()->get('id');
		$name = $request->session()->get('name');
		$result = $user->where('id',$id)->get();
		if(!empty($id)){

		}else{
			return showMessage(['message'=>'请先登录','url'=>'index']);
		}
		return view('home.gr',['id'=>$id,'name'=>$name,'result'=>$result]);
	}
	//提交资料
	public function grsub(Request $request)
	{
		$user = new User;
		$id = $request->session()->get('id');
		$sex = $request->input('sex');
		$email = $request->input('email');
		if(!preg_match("/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/", $email)){
			return showMessage(['message'=>'邮箱格式不正确']);
		}
		$qm = $request->input('qm');
		$data = ['sex'=>$sex,'email'=>$email,'qm'=>$qm];
		$result = $user->where('id',$id)->update($data);
		if($result){
       		return showMessage(['message'=>'修改成功','url'=>'gr']);
       }else{
       		return showMessage(['message'=>'修改失败']);
       }
	}
	//修改密码
	public function pwd(Request $request)
	{
		$id = $request->session()->get('id');
		if(!empty($id)){

		}else{
			return showMessage(['message'=>'请先登录','url'=>'index']);
		}
		return view('home.pwd');
	}
	//提交
	public function pwdsub(Request $request)
	{
		$user = new User;
		$id = $request->session()->get('id');
		$pwd = $request->input('pwd');
		//验证密码长度
		if (strlen($pwd) < 3) {
			return showMessage(['message'=>'密码小于3个字符']);
		}
		$newpwd = $request->input('newpwd');
		$replypwd = $request->input('replypwd');
		$pwd1 = md5($pwd);
		$res = $user->where('id',$id)->get();
		if($pwd1 != $res[0]->password){
			return showMessage(['message'=>'旧密码不正确']);
		}
		if($newpwd != $replypwd){
			return showMessage(['message'=>'两次密码不一样']);
		}
		$password = md5($newpwd);
		
		$data = ['password'=>$password];
		$result = $user->where('id',$id)->update($data);
		if($result){
       		return showMessage(['message'=>'修改成功','url'=>'pwd']);
       }else{
       		return showMessage(['message'=>'修改失败']);
       }
	}

}