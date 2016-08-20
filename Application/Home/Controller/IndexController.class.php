<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class IndexController extends Controller {
    public function index(){
       
    }
    //获取用户id
	function getUserId(){
		$user=M('user');
		$data=$user->select();
		var_dump('$data');die;
	        return session("userid")?session("userid"):1;
	        $session=session("userid");
	       
	}



    public function person(){

    	

    	$this->display();//加载视图

    }
}