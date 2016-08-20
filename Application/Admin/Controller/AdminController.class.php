<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends BaseController {
    //判断管理员权限
    public function checkRole(){
        $aOb=M('Admin');
        $re=$aOb->field('role')->where('username="'.session('adminname').'"')->find();
        if ($re['role']==0) {
            $msg='error';
        }else{
             $msg='success';
        }
        $this->ajaxReturn($msg);
    }
    public function admin(){
        $this->display();

        
    }
    //管理员数据保存
    public function save(){
    	$aOb=M('Admin');
    	$re=$aOb->where('username="'.I('username').'"')->find();
        if ($re) {
           $this->ajaxReturn('exist');
        }else{
            $data=I('post.');
            $data['password']=md5($data['password']);
            $data['add_time']=time();
			$r=$aOb->add($data);
			if ($r) {
		        $msg='success';
		    }else{
		        $msg='error';
		    }
            $this->ajaxReturn($msg);
		}
        
    }

    //管理员数据修改保存
    public function reSave(){
    	$aOb=M('Admin');
        $admin_id=$_GET['admin_id'];
        if (I('oldName')!=I('username')) {
            $re=$aOb->where('username="'.I('username').'"')->find();
            if ($re) {
                $this->ajaxReturn('exist');
            }
        }
        //     else{
        //         $data['username']=I('username');
        //     }
        // }else{
        $data['username']=I('username');
        if (I('oldPwd')!=I('password')) {
            $data['password']=md5(I('password'));
        }
        $data['role']=I('role');
    	$r=$aOb->where('admin_id='.$admin_id)->save($data);
    	if ($r) {
            $msg='success';
        }else{
            $msg='error';
        }
        $this->ajaxReturn($msg);
        // }
    }
     //管理员列表
    public function adminList(){
    	$aOb=M('Admin');
    	$re=$aOb->select();
    	$data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }
     //管理员修改页面
    public function modify(){
    	$admin_id=$_GET['admin_id'];
    	$aOb=M('Admin');
    	$re=$aOb->where('admin_id='.$admin_id)->find();
    	$this->assign('re',$re);
        $this->display();
    }
     //管理员删除
    public function del(){
    	$admin_id=$_GET['admin_id'];
    	$aOb=M('Admin');
    	$re=$aOb->where('admin_id='.$admin_id)->delete();
    	if ($re) {
            $msg='success';
        }else{
            $msg='error';
        }
        $this->ajaxReturn($msg);
    }
    //管理员日志
    public function adminLog(){
        $lOb=M('admin_log');
        $re=$lOb->order('log_time desc')->select();
        $data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }
    //日志删除
    public function logDel(){
        $log_id=$_GET['log_id'];
        $lOb=M('Admin_log');
        $re=$lOb->where('log_id='.$log_id)->delete();
        if ($re) {
            $msg='success';
        }else{
            $msg='error';
        }
        $this->ajaxReturn($msg);
    }
}