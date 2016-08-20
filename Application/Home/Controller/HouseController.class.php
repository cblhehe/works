<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class HouseController extends Controller {
    public function index(){
       
    }

	//住宿首页
    public function quarter(){
        $room=M('room');
        $name=I('post.room_name','','htmlspecialchars');//采用htmlspecialchars方法对$_POST['room_name'] 进行过滤，如果不存在则返回空字符串
        $hot=$room->limit(10)->select();//倒序查询10条酒店客房数据
        //$hot1=$room->where("room_cate='".$wee."'")->limit(10)->select();//倒序查询10条民宿酒店数据
        //var_dump($hot);die;





        $this->assign('hot',$hot);//显示查询出来的数据

        $this->display('Public:header');//加载头部
    	$this->display();//加载视图

    }
    //住宿详情页面
    public function faxian_detail(){
		

        $room=M('room');
        $room_detail=$room->where('room_id = 1')->find();
        //print_r($room_detail);die;
        $room_img=M('room_images');
        $img=$room_img->where('room_id = 1')->find();


        $this->assign('img',$img);
        $this->assign('room',$room_detail);

        $this->display('Public:header');//加载头部
    	$this->display();//加载视图

    }
    //发现页面，搜索页面
    public function quarter_search(){

        $room=M('room');
        



        $this->display('Public:header');//加载头部
        $this->display();//加载视图

    }

    
    public function quarter_apply(){

        

        $this->display('Public:header');//加载头部
        $this->display();//加载视图

    }
    //房间描述详情页
    public function quarter_desc_detail(){

        

        $this->display('Public:header2');//加载头部
        $this->display();//加载视图

    }

    //评论详情页
    public function quarter_rated_list(){

        

        $this->display('Public:header2');//加载头部
        $this->display();//加载视图

    }
}
