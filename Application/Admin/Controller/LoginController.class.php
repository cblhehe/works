<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    //登录页面
    public function login(){
    	layout(false);
        $this->display();
    }
   
    //登录验证
    function check(){
		$username=I('username');
		$password=md5(I('password'));
		$adminOb=M('Admin');
		$re=$adminOb->where("username='{$username}' and password='{$password}'")->find();
		if ($re) {
			session('adminname',$username);  
			session('adminid',$re['admin_id']);  
			adminLog('登录');
			$data=array('msg'=>'success');
			$this->ajaxReturn($data);
		}else{
			$data=array('msg'=>'false');
			$this->ajaxReturn($data);
		}
	}

	//退出登录
	function out(){
		adminLog('退出登录');
		session('adminname',null);
		session('adminid',null);
		header("location:".U('Admin/Login/login'));
	}
}