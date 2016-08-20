<?php
namespace Admin\Controller;
use Think\Controller;
class FenxiaoController extends BaseController {
    //分销设置页面
    public function fenxiaoSet(){
    	$fOb=M('Fenxiao');
        $re=$fOb->find();
        if ($re) {
            $this->assign('re',$re);
        }
        $this->display();
    }
    //分销设置数据保存
    public function fenxiaoSave(){
        $fOb=M('Fenxiao');
        $fenxiao_id=$_GET['fenxiao_id']?$_GET['fenxiao_id']:'';
        if ($fenxiao_id) {
            $re=$fOb->where('fenxiao_id='.$fenxiao_id)->save(I('post.'));
        }else{
            $re=$fOb->add(I('post.'));
        }
        if ($re) {
            $this->ajaxReturn('操作成功！');
        }else{
            $this->ajaxReturn('操作失败！');
        }
    }
    //分销商列表
    public function fenxiaoUser(){
    }
  
}