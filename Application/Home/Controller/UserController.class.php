<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class UserController extends Controller {
    public function index(){
       
    }


    //获取用户id
	function getUserId(){
	        return session("userid")?session("userid"):1;
	}



    public function life(){

    	$this->display();//加载视图

    }

    
    public function advice(){







    	$this->display();//加载视图

    }
}