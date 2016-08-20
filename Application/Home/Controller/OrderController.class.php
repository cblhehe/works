<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class OrderController extends Controller {
    public function index(){
       
    }

    //获取用户id
    function getUserId(){
            return session("userid")?session("userid"):1;
    }

    
    public function user_order_list(){

    	$this->display();//加载视图

    }
        public function master_myorder_list(){

    	$this->display();//加载视图

    }
    public function master_myorder_list_end(){

    	$this->display();//加载视图

    }
}