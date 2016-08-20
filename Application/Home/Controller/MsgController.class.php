<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class MsgController extends Controller {
    public function index(){
       
    }

    //获取用户id
	function getUserId(){
	        return session("userid")?session("userid"):1;
	}

	
    public function message(){

    	$this->display();//加载视图

    }
}