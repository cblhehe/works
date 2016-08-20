<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends BaseController {

    /*******房屋操作******/

    //房屋列表
    public function roomList(){
        $rOb=M('Room');
        $re=$rOb->select();
        $data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }
	//房屋添加页面
    public function roomAddPage(){
        for ($i=1; $i <= 30; $i++) { 
            $day[$i]['day']=$i;
        }
        $this->assign('day',$day);
        $this->display();
    }
    //房屋修改页面
    public function roomModifyPage(){
        for ($i=1; $i <= 30; $i++) { 
            $day[$i]['day']=$i;
        }
        $room_id=$_GET['room_id'];
        $rOb=M('Room');
        $re=$rOb->where('room_id='.$room_id)->find();
        $iOb=M('Room_images');
        $r=$iOb->where('room_id='.$room_id)->select();
        $this->assign('day',$day);
        $this->assign('re',$re);
        $this->assign('images',$r);
        $this->display();
    }
    //房屋信息添加修改数据保存页面
    public function roomSave(){
        if ($_FILES && $_FILES['room_images']['error'][0]==0) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 1024*1024*100 ;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = C('UPLOADS'); // 设置文件上传根目录、
            $upload->subName = array(); // 设置文件上传子目录
            $len=(count($_FILES['room_images'],1)-5)/5;
            for ($i=0; $i < $len; $i++) {
                if ($_FILES['room_images']['name'][$i]) {
                    $f[$i]['name']=$_FILES['room_images']['name'][$i];
                    $f[$i]['type']=$_FILES['room_images']['type'][$i];
                    $f[$i]['tmp_name']=$_FILES['room_images']['tmp_name'][$i];
                    $f[$i]['error']=$_FILES['room_images']['error'][$i];
                    $f[$i]['size']=$_FILES['room_images']['size'][$i];
                }
            }
            $info = $upload->upload($f);
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                $room_images=array();
                $image = new \Think\Image(); 
                $path=make_dir();
                foreach ($info as $k => $v) {
                    $room_images[$k]['room_image']=$info[$k]['savename'];
                    $image->open(C('UPLOADS').$room_images[$k]['room_image']);
                    $image->thumb(420, 420)->save($path.$room_images[$k]['room_image']);
                    @unlink(C('UPLOADS').$room_images[$k]['room_image']);
                }
            }
        }
        $data=I('post.');
        $rOb=M('Room');
        $room_id=$_GET['room_id']?$_GET['room_id']:'';
        if ($room_id) {
            if ($_FILES && $_FILES['room_images']['error'][0]==0 || $data) {
                $data['modify_time']=time();
                $re=$rOb->where('room_id='.$room_id)->save($data);
                $url=U('Admin/Goods/roomList');
                $msg='修改成功！';
            }     
        }else{
            $data['add_time']=time();
            $re=$rOb->add($data);
            $room_id=$rOb->getLastInsID();
            $url=U('Admin/Goods/roomAddPage');
            $msg='添加成功,继续添加！';
        }
        
        if ($re) {
            foreach ($room_images as $k1 => $v1) {
               $room_images[$k1]['room_id']=$room_id;
               $room_images[$k1]['room_image']=date('Y-m-d').'/'.$room_images[$k1]['room_image'];
            }
            $iOb=M('Room_images');
            $r=$iOb->addAll($room_images);
            $this->success($msg,$url);
        }else{
            if ($room_images) {
                foreach ($room_images as $k2 => $v2) {
                    @unlink($path.$v2['room_image']);
                }
                rm_empty_dir(C('UPLOADS'));
            }
            $this->error('操作失败!');
        }
    }

    
    //房屋删除
    public function roomDelete(){
        $room_id=$_GET['room_id'];
        $rOb=M('Room');
        $re=$rOb->where('room_id='.$room_id)->delete();
        if ($re) {
            //房屋删除成功后删除该房屋所有图片
            $iOb=M('Room_images');
            $arr=$iOb->where('room_id='.$room_id)->select();
            $r=$iOb->where('room_id='.$room_id)->delete();
            if ($r) {
                foreach ($arr as $k => $v) {
                    @unlink(C('UPLOADS').$v['room_image']);
                }
                rm_empty_dir(C('UPLOADS'));
            }
           
           $this->success('删除成功');
        }else{
            $this->error('删除失败!');
        }

    }
    //判断该房间是否已被交易过
    public function hasOrder(){
        $goods_id=$_GET['goods_id'];
        $oOb=M('Order');
        $re=$oOb->where('goods_id='.$goods_id.' and goods_type=1')->find();
        if ($re) {
            $this->ajaxReturn('success');
        }else{
            $this->ajaxReturn('error');
        }
    }

    //删除房屋图片
    public function imageDelete(){
        $image_id=$_GET['image_id'];
        $iOb=M('Room_images');
        $re=$iOb->where('image_id='.$image_id)->delete();
        if ($re) {
            $rOb=M('Room');
            $room_id=$_GET['room_id'];
            $r=$rOb->where('room_id='.$room_id)->save(array('modify_time'=>time()));
            @unlink(C('UPLOADS').I('room_image'));
            rm_empty_dir(C('UPLOADS'));
            $this->ajaxReturn('success');
        }else{
             $this->ajaxReturn('error');
        }
    }

    /*******服务类型操作******/

   //服务类型列表
    public function serviceList(){
        $sOb=M('Service_cate');
        $re=$sOb->select();
        $res=oneL($re,$pid=0,$deli='━',$num=0);
        $data=$this->showPage($res);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }
    //服务类型添加页面
    public function serviceAddPage(){
        $sOb=M('Service_cate');
        $re=$sOb->select();
        $arr=oneL($re,$pid=0,$deli='━',$num=0);
        $this->assign('arr',$arr);
        $this->display();
    }
    //服务类型修改页面
    public function serviceModifyPage(){
        $service_id=$_GET['service_id'];
        $sOb=M('Service_cate');
        $res=$sOb->select();
        $arr=oneL($res,$pid=0,$deli='━',$num=0);
        $re=$sOb->where('service_id='.$service_id)->find();
        $this->assign('arr',$arr);
        $this->assign('re',$re);
        $this->display();
    }
    //服务类型信息添加修改数据保存页面
    public function serviceSave(){

        if ($_FILES && $_FILES['service_image']['error']==0) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 1024*1024*100 ;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = C('UPLOADS'); // 设置文件上传根目录、
            $upload->subName = array(); // 设置文件上传子目录
            $info = $upload->uploadOne($_FILES['service_image']);
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                $image = new \Think\Image(); 
                $path=make_dir();
                $service_image=$info['savename'];
                $image->open(C('UPLOADS').$service_image);
                $image->thumb(420, 420)->save($path.$service_image);
                @unlink(C('UPLOADS').$service_image);
                
            }
        }

        $data=I('post.');
        if ($service_image) {
            $data['service_image']=date('Y-m-d').'/'.$service_image;
        }
        $sOb=M('Service_cate');
        $service_id=$_GET['service_id']?$_GET['service_id']:'';
        if ($service_id) {
            $data['modify_time']=time();
            $re=$sOb->where('service_id='.$service_id)->save($data);
            $url=U('Admin/Goods/serviceList');
            $msg='修改成功！';
        }else{
            $data['add_time']=time();
            $re=$sOb->add($data);
            $service_id=$sOb->getLastInsID();
            $url=U('Admin/Goods/serviceAddPage');
            $msg='添加成功,继续添加！';
        }
        if ($re) {
            if ($data['service_image'] && I('oldImg')) {
                @unlink(C('UPLOADS').I('oldImg'));
            }
            $this->success($msg,$url);
        }else{
            if ($service_image) {
                @unlink($path.$service_image);
                rm_empty_dir(C('UPLOADS'));
            }
            $this->error('操作失败!');
        }
    }

    
    //服务类型删除
    public function serviceDelete(){
        $service_id=$_GET['service_id'];
        $sOb=M('Service_cate');
        $re=$sOb->where('service_id='.$service_id)->delete();
        if ($re) {
            @unlink(C('UPLOADS').I('service_image'));
            rm_empty_dir(C('UPLOADS'));
           $this->success('删除成功');
        }else{
            $this->error('删除失败!');
        }

    }
    //删除服务类型图片
    public function serviceImgDel(){
        $service_id=$_GET['service_id'];
        $sOb=M('Service_cate');
        $re=$sOb->where('service_id='.$service_id)->save(array('service_image'=>'','modify_time'=>time()));
        if ($re) {
            @unlink(C('UPLOADS').I('service_image'));
            rm_empty_dir(C('UPLOADS'));
            $this->ajaxReturn('success');
        }else{
             $this->ajaxReturn('error');
        }
    }
}