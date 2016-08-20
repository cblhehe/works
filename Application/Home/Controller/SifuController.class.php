<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class SifuController extends Controller {
    public function index(){
       
    }
    //获取用户id
	function getUserId(){
	    return session("userid")?session("userid"):1;
	}

    //师傅申请页面
    public function master_apply(){
        //$id=$_SESSION['user']['user_id'];
        $se=M('service_cate');
        //$ser=$se->where('id='$id)->find();

        $this->display();
    }
    //用户申请服务页面
    public function server_apply(){

    	$this->display();//加载视图

    }
    public function zuche_apply(){

    	$this->display();//加载视图

    }   
    //租车信息页面显示
    public function car_inp(){
        
        $this->display();
    }

    //设置上传路径
    public function upload(){
        if($_FILES&&$_FILES['sifu_car']['error'][0]==0){
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =     3145728 ;// 设置附件上传大小    
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
            $upload->savePath  =      '/Public/Uploads/'; // 设置附件上传目录
            $upload->rootPath  =     './';
            $upload->saveName = array('uniqid','');//设置文件上传子目录
            $upload->autoSub  = true;        
            $info = $upload->upload();
            if(!$info) {// 上传错误提示错误信息    
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息    
                foreach($info as $file){
                //echo $file['savepath'].$file['savename'];
                }
            }
        } 
        
        //var_dump($info);die;
        $car=M('sifu_car');
        $driving_license=$info['driving_license']['urlpath'];

        $car_image=$info['car_image']['urlpath'];

        $data['car_brand']=I('post.car_brand');
        $data['driving_license']= $driving_license;
        $data['rental']=I('post.rental');
        $data['deposit']=I('post.deposit');
        $data['price']=I('post.price');
        $data['car_image']=$car_image;
        $data['car_id']=I('post.car_id');
        $data['user_id']=I('post.user_id');

        //var_dump($data);die;
        
        $car_info=$car->save();  
 
               
    }

    
}

    