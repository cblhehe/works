<?php
namespace Admin\Controller;
use Think\Controller;
class AdController extends BaseController {
   //广告列表
    public function adList(){
        $aOb=M('Ad');
        $re=$aOb->select();
        $data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }
    //广告添加页面
    public function adAddPage(){
        $this->display();
    }
    //广告修改页面
    public function adModifyPage(){
        $ad_id=$_GET['ad_id'];
        $aOb=M('Ad');
        $re=$aOb->where('ad_id='.$ad_id)->find();
        $this->assign('re',$re);
        $this->display();
    }
    //广告信息添加修改数据保存页面
    public function adSave(){

        if ($_FILES && $_FILES['ad_image']['error']==0) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 1024*1024*100 ;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = C('UPLOADS'); // 设置文件上传根目录、
            $upload->subName = array(); // 设置文件上传子目录
            $info = $upload->uploadOne($_FILES['ad_image']);
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                $image = new \Think\Image(); 
                $path=make_dir();
                $ad_image=$info['savename'];
                $image->open(C('UPLOADS').$ad_image);
                $image->thumb(420, 420)->save($path.$ad_image);
                @unlink(C('UPLOADS').$ad_image);
                
            }
        }

        $data=I('post.');
        $data['start_time']=strtotime($data['start_time']);
        if ($data['end_time']) {
           $data['end_time']=strtotime($data['end_time']);
        }
        if ($ad_image) {
            $data['ad_image']=date('Y-m-d').'/'.$ad_image;
        }
        $aOb=M('Ad');
        $ad_id=$_GET['ad_id']?$_GET['ad_id']:'';
        if ($ad_id) {
            if ($_FILES && $_FILES['ad_image']['error']==0 || $data) {
                $data['modify_time']=time();
                $re=$aOb->where('ad_id='.$ad_id)->save($data);
                $url=U('Admin/Ad/adList');
                $msg='修改成功！';
            }     
        }else{
            $data['add_time']=time();
            $re=$aOb->add($data);
            $ad_id=$aOb->getLastInsID();
            $url=U('Admin/Ad/adAddPage');
            $msg='添加成功,继续添加！';
        }
        if ($re) {
            if ($data['ad_image'] && I('oldImg')) {
                @unlink(C('UPLOADS').I('oldImg'));
            }
            $this->success($msg,$url);
        }else{
            if ($ad_image) {
                @unlink($path.$ad_image);
                rm_empty_dir(C('UPLOADS'));
            }
            $this->error('操作失败!');
        }
    }

    
    //广告删除
    public function adDelete(){
        $ad_id=$_GET['ad_id'];
        $aOb=M('Ad');
        $re=$aOb->where('ad_id='.$ad_id)->delete();
        if ($re) {
            @unlink(C('UPLOADS').I('ad_image'));
            rm_empty_dir(C('UPLOADS'));
           $this->success('删除成功');
        }else{
            $this->error('删除失败!');
        }

    }
    //删除广告图片
    public function adImgDel(){
        $ad_id=$_GET['ad_id'];
        $aOb=M('Ad');
        $re=$aOb->where('ad_id='.$ad_id)->save(array('ad_image'=>'','modify_time'=>time()));
        if ($re) {
            @unlink(C('UPLOADS').I('ad_image'));
            rm_empty_dir(C('UPLOADS'));
            $this->ajaxReturn('success');
        }else{
             $this->ajaxReturn('error');
        }
    }
}