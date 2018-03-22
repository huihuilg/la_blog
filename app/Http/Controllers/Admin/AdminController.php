<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use DB;
use Storage;
use App\Http\Models\Article ;
use App\Http\Models\Comment ;
use App\Http\Models\User ;
use App\Http\Models\Ly ;
use Session;
class AdminController extends Controller
{
	//用户管理
	public function usergl(Request $request)
	{
		if(Session::get('is_admin') != 1){
			return showMessage(['message'=>'非法操作','url'=>'/']);
		}
		$user = new User;
		$name = $request->session()->get('name');
		$result = $user->paginate(2);
		$count = $user->count('id');
		return view('admin.usergl',['name'=>$name,'result'=>$result,'count'=>$count]);
	}
	//用户锁定
	public function userLock(Request $request)
	{
		if(Session::get('is_admin') != 1){
			return showMessage(['message'=>'非法操作','url'=>'/']);
		}
		$user = new User;
		$id = $request->input('id');
		$result = $user->where('id',$id)->update(['is_lock'=>1]);
		if($result){
			return showMessage(['message'=>'锁定成功','url'=>'usergl']);
		}else{
			return showMessage(['message'=>'锁定失败','url'=>'usergl']);
		}
	}
	//用户解锁
	public function disLock(Request $request)
	{
		if(Session::get('is_admin') != 1){
			return showMessage(['message'=>'非法操作','url'=>'/']);
		}
		$user = new User;
		$id = $request->input('id');
		$result = $user->where('id',$id)->update(['is_lock'=>0]);
		if($result){
			return showMessage(['message'=>'解锁成功','url'=>'usergl']);
		}else{
			return showMessage(['message'=>'解锁失败','url'=>'usergl']);
		}
	}
	//用户删除
	public function userdel(Request $request)
	{
		if(Session::get('is_admin') != 1){
			return showMessage(['message'=>'非法操作','url'=>'/']);
		}
		$user = new User;
		$id = $request->input('id');
		$result = $user->destroy($id);
		if($result){
			return showMessage(['message'=>'删除成功','url'=>'usergl']);
		}else{
			return showMessage(['message'=>'删除失败','url'=>'usergl']);
		}
	}
	//header头
	public function header(Request $request)
	{
		if(Session::get('is_admin') != 1){
			return showMessage(['message'=>'非法操作','url'=>'/']);
		}
		return view('header');
	}
	//博文管理
	public function bowen(Request $request)
	{
		if(Session::get('is_admin') != 1){
			return showMessage(['message'=>'非法操作','url'=>'/']);
		}
		$article = new Article;
		$name = $request->session()->get('name');
		$result = $article->join('user','article.uid','=','user.id')->where('rid','=','0')->orderBy('article.id','desc')->select('article.*','user.user_name')->paginate(3);
		$count = $article->where('rid','=','0')->count('id');
		return view('admin.bowen',['name'=>$name,'count'=>$count,'result'=>$result]);
	}
	//博文删除
	public function bowendel(Request $request)
	{
		if(Session::get('is_admin') != 1){
			return showMessage(['message'=>'非法操作','url'=>'/']);
		}
		$article = new Article;
		$id = $request->input('id');
		$result = $article->destroy($id);
		if($result){
			return showMessage(['message'=>'删除成功']);
		}else{
			return showMessage(['message'=>'删除失败']);
		}
	}
	//博文回收
	public function bowenhs(Request $request)
	{
		if(Session::get('is_admin') != 1){
			return showMessage(['message'=>'非法操作','url'=>'/']);
		}
		$article = new Article;
		$name = $request->session()->get('name');
		$result = $article->onlyTrashed()->join('user','article.uid','=','user.id')->where('rid','=','0')->orderBy('article.id','desc')->select('article.*','user.user_name')->paginate(3);
		$count = $article->onlyTrashed()->count('id');
		return view('admin.bowenhs',['name'=>$name,'count'=>$count,'result'=>$result]);
	}
	//博文恢复、删除
	public function bowenEdit(Request $request)
	{
		if(Session::get('is_admin') != 1){
			return showMessage(['message'=>'非法操作','url'=>'/']);
		}
		$article = new Article;
		$bowendel = $request->input('bowendel');
		$bowenhf = $request->input('bowenhf');
		
		if(!empty($bowendel)){
			$id = $request->input('id');
			if(empty($id)){
				return showMessage(['message'=>'数据为空']);
			}
			//var_dump($id);
			DB::enableQueryLog(); 
			foreach ($id as $key => $value) {
				$result = $article->where('id',$value)->forceDelete();
			}
			// dd(DB::getQueryLog());
			if($result){
				return showMessage(['message'=>'删除成功']);
			}else{
				return showMessage(['message'=>'删除失败']);
			}
		}elseif(!empty($bowenhf)){
			$id = $request->input('id');
			if(empty($id)){
				return showMessage(['message'=>'数据为空']);
			}
			foreach ($id as $value) {
				$result = $article->withTrashed()->where('id', $value)->restore();
			}
			if($result){
				return showMessage(['message'=>'恢复成功']);
			}else{
				return showMessage(['message'=>'恢复失败']);
			}
		}else{
			return showMessage(['message'=>'数据为空']);
		}
	}
	//回复管理
	public function reply(Request $request)
	{
		if(Session::get('is_admin') != 1){
			return showMessage(['message'=>'非法操作','url'=>'/']);
		}
		$reply = new Article;
		$result = $reply->join('user','article.uid','=','user.id')->where('rid','<>','0')->orderBy('article.id','desc')->select('article.*','user.user_name')->paginate(3);
		$count = $reply->where('rid','<>','0')->count('id');
		$name = $request->session()->get('name');
		return view('admin.reply',['name'=>$name,'result'=>$result,'count'=>$count]);
	}
	//回复放入回收站

	public function replydel(Request $request)
	{
		if(Session::get('is_admin') != 1){
			return showMessage(['message'=>'非法操作','url'=>'/']);
		}
		$reply = new Article;
		$id = $request->input('id');
		$result = $reply->destroy($id);
		if($result){
			return showMessage(['message'=>'删除成功']);
		}else{
			return showMessage(['message'=>'删除失败']);
		}
	}
	//回复回收管理
	public function replyhs(Request $request)
	{
		if(Session::get('is_admin') != 1){
			return showMessage(['message'=>'非法操作','url'=>'/']);
		}
		$reply = new Article;
		$result = $reply->onlyTrashed()->join('user','article.uid','=','user.id')->where('rid','<>','0')->orderBy('article.id','desc')->select('article.*','user.user_name')->paginate(3);
		$name = $request->session()->get('name');
		$count = $reply->onlyTrashed()->where('rid','<>','0')->count('id');
		return view('admin.replyhs',['name'=>$name,'result'=>$result,'count'=>$count]);
	}
	//回复恢复、删除
	public function replyEdit(Request $request)
	{
		if(Session::get('is_admin') != 1){
			return showMessage(['message'=>'非法操作','url'=>'/']);
		}
		$article = new Article;
		$replydel = $request->input('replydel');
		$replyhf = $request->input('replyhf');
		if(!empty($replydel)){
			$id = $request->input('id');
			if(empty($id)){
				return showMessage(['message'=>'数据为空']);
			}
			//var_dump($id);
			DB::enableQueryLog(); 
			foreach ($id as $key => $value) {
				$result = $article->where('id',$value)->forceDelete();
			}
			// dd(DB::getQueryLog());
			if($result){
				return showMessage(['message'=>'删除成功']);
			}else{
				return showMessage(['message'=>'删除失败']);
			}
		}elseif(!empty($replyhf)){
			$id = $request->input('id');
			if(empty($id)){
				return showMessage(['message'=>'数据为空']);
			}
			foreach ($id as $value) {
				$result = $article->withTrashed()->where('id', $value)->restore();
			}
			if($result){
				return showMessage(['message'=>'恢复成功']);
			}else{
				return showMessage(['message'=>'恢复失败']);
			}
		}else{
			return showMessage(['message'=>'数据为空']);
		}
	}
	//留言管理
	public function ly(Request $request)
	{
		if(Session::get('is_admin') != 1){
			return showMessage(['message'=>'非法操作','url'=>'/']);
		}
		$ly = new Ly;
		$name = $request->session()->get('name');
		$result = $ly->join('user','ly.uid','=','user.id')->orderBy('ly.id','desc')->select('ly.*','user.user_name','user.picture')->paginate(3);
		$count = $ly->count('id');
		return view('admin.ly',['result'=>$result,'name'=>$name,'count'=>$count]);
	}
	//留言删除
	public function lydel(Request $request)
	{
		if(Session::get('is_admin') != 1){
			return showMessage(['message'=>'非法操作','url'=>'/']);
		}
		$id = $request->input('id');
		if(empty($id)){
			return showMessage(['message'=>'数据为空']);
		}

		foreach ($id as $key => $value) {
			$result = DB::table('ly')->where('id',$value)->delete();
		}
		
		if($result){
				return showMessage(['message'=>'删除成功']);
			}else{
				return showMessage(['message'=>'删除失败']);
			}
	}
}