<?php

/** 
 * 跳转提示函数 
 */ 
function showMessage(Array $array){ 
 
    //验证参数 
    if(!empty($array['message']) && !empty($array['url'])){ 
        $data = [ 
            'message' => $array['message'], 
            'url' => $array['url'], 
            'jumpTime' => !empty($array['time']) ? $array['time'] : 3000, 
            'ok'=>!empty($array['ok']) ? $array['ok'] : true 
        ]; 
    }elseif(!empty($array['message']) ){
        $data = [ 
            'message' => $array['message'], 
            'url' => $_SERVER['HTTP_REFERER'], 
            'jumpTime' => 3000, 
            'ok'=>!empty($array['ok']) ? $array['ok'] : true 
        ]; 
    } else { 
        $data = [ 
            'message' => '非法访问！', 
            'url' => $_SERVER['HTTP_REFERER'], 
            'jumpTime' => 3000, 
            'ok'=>!empty($array['ok']) ? $array['ok'] : true 
        ]; 
    } 
    return view('notice',['data' => $data]); 
 
  //  return redirect('/message')->with($array); 
} 