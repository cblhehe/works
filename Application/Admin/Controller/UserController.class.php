<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {
    //会员列表页面
    public function userList(){
    	$uOb=M('User');
        // $oOb=M('Order');
        $lOb=M('Level');
        $lRe=$lOb->order('amount asc')->select();
    	$re=$uOb->select();
        foreach ($re as $k => $v) {
            // $re[$k]['total_amount']=$oOb->where('user_id='.$v['user_id'])->sum('total_amount');
            foreach ($lRe as $k1 => $v1) {
                if ($lRe[$k1+1]['amount']) {
                    if ($re[$k]['total_amount']>=$v1['amount'] && $re[$k]['total_amount']<$lRe[$k1+1]['amount']) {
                        $re[$k]['level']=$v1['level_name'];
                    }
                }else{
                    if ($re[$k]['total_amount']>=$v1['amount']) {
                        $re[$k]['level']=$v1['level_name'];
                    }
                }
                
            }
        }
    	$data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }
    //师傅列表页面
    public function sifuList(){
        $sOb=M('Sifu');
        $ssOb=M('Sifu_service');
        $re=$sOb->select();
        foreach ($re as $k => $v) {
            $r=$ssOb->alias('ss')
                    ->join('__SERVICE_CATE__ sc on sc.service_id=ss.service_id')
                    ->where('ss.user_id='.$v['user_id'])
                    ->field('sc.service_name')
                    ->select();
            if ($r) {
                foreach ($r as $k1 => $v1) {
                    $service_name[]=$v1['service_name'];
                }
                $re[$k]['service_cate']=join('，',$service_name);
            }

        }
        $data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }
    //会员等级添加页面
    public function levelAdd(){
         $this->display();
    }
    //会员等级修改页面
    public function levelModify(){
        $level_id=$_GET['level_id'];
        $lOb=M('Level');
        $re=$lOb->where('level_id='.$level_id)->find();
        $this->assign('re',$re);
        $this->display();
    }
    //会员等级列表
    public function levelList(){
        $lOb=M('Level');
        $re=$lOb->select();
        // var_dump($re)
        $this->assign('re',$re);
        $this->display();
    }
    //会员等级保存
    public function levelSave(){
        $lOb=M('Level');
        $re=$lOb->where('level_name="'.I('level_name').'"')->find();
        if ($re) {
           $this->ajaxReturn('exist');
        }else{
            $r=$lOb->add(I('post.'));
            if ($r) {
                $msg='success';
            }else{
                $msg='error';
            }
            $this->ajaxReturn($msg);
        }
    }
    //会员等级数据修改保存
    public function reSave(){
        $lOb=M('Level');
        $level_id=$_GET['level_id'];
        if (I('oldName')!=I('level_name')) {
            $re=$lOb->where('level_name="'.I('level_name').'"')->find();
            if ($re) {
                $this->ajaxReturn('exist');
            }
        }
        $r=$lOb->where('level_id='.$level_id)->save(I('post.'));
        if ($r) {
            $msg='success';
        }else{
            $msg='error';
        }
        $this->ajaxReturn($msg);
    }
    //会员等级删除
    public function levelDel(){
        $level_id=$_GET['level_id'];
        $lOb=M('Level');
        $re=$lOb->where('level_id='.$level_id)->delete();
        if ($re) {
            $msg='success';
        }else{
            $msg='error';
        }
        $this->ajaxReturn($msg);
    }
    //会员积分信息列表页面
    /*public function integral(){
    	$iOb=M('Integral');
        $re=$iOb->alias('i')->join('__USER__ u on u.id=i.userid')->field('u.id userid,u.nickname,SUM(i.integral) integral')->group('i.userid')->select();
        $data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }
    //会员积分信息删除
    public function integralDel(){
        $userid=I('userid');
        $iOb=M('Integral');
        $re=$iOb->where('userid='.$userid)->delete();
        if ($re) {
        	$this->success('删除成功！');
        }else{
            $this->error('删除失败!');
        }
    }*/
  
}