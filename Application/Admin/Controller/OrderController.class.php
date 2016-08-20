<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends BaseController {
    //订单状态：1-待接单，2-待完成，3-待评价，4-已完成，5-已退款
    /**********住宿订单************/
    //住宿待接单列表
    public function stayWaitReceive(){
        $oOb=M('Order');
        $re=$oOb->alias('o')
                ->join('__USER__ u on u.user_id=o.user_id')
                ->join('__ROOM__ r on r.room_id=o.goods_id')
                ->field('o.order_id,o.order_num,o.days,o.rental,o.gold_money,o.total_amount,o.service_time,o.pay_time,r.room_id,r.room_name,u.nickname')
                ->where('o.goods_type=1 and o.order_status=1')
                ->order('o.pay_time asc')
                ->select();
        $data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }
     //住宿待入住列表
    public function waitCheck(){
        $oOb=M('Order');
        $re=$oOb->alias('o')
                ->join('__USER__ u on u.user_id=o.user_id')
                ->join('__ROOM__ r on r.room_id=o.goods_id')
                ->field('o.order_id,o.order_num,o.days,o.rental,o.gold_money,o.total_amount,o.service_time,o.pay_time,o.get_time,r.room_id,r.room_name,u.nickname')
                ->where('o.goods_type=1 and o.order_status=2')
                ->order('o.get_time asc')
                ->select();
        $data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }
     //住宿已完成，入住结束列表
    public function stayCompleted(){
        $oOb=M('Order');
        $re=$oOb->alias('o')
                ->join('__USER__ u on u.user_id=o.user_id')
                ->join('__ROOM__ r on r.room_id=o.goods_id')
                ->field('o.order_id,o.user_id,o.order_num,o.order_status,o.days,o.rental,o.gold_money,o.total_amount,o.service_time,o.end_time,r.room_id,r.room_name,u.nickname')
                ->where('o.goods_type=1 and (o.order_status=3 or o.order_status=4)')
                ->order('o.order_status asc,o.end_time asc')
                ->select();
        $data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }
     //住宿已退款列表
    public function refundList(){
        $oOb=M('Order');
        $re=$oOb->alias('o')
                ->join('__USER__ u on u.user_id=o.user_id')
                ->join('__ROOM__ r on r.room_id=o.goods_id')
                ->field('o.order_id,o.order_num,o.order_status,o.days,o.rental,o.gold_money,o.total_amount,o.pay_time,o.refund_time,o.admin_note,r.room_name,u.nickname')
                ->where('o.goods_type=1 and o.order_status=5')
                ->order('o.refund_time asc')
                ->select();
        $data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }

    /**********服务订单************/

    //生活服务待接单列表
    public function serviceWaitReceive(){
        $oOb=M('Order');
        $re=$oOb->alias('o')
                ->join('__USER__ u on u.user_id=o.user_id')
                ->join('__USER__ a on a.user_id=o.sifu_id')
                ->join('__SERVICE_CATE__ s on s.service_id=o.goods_id')
                ->field('o.order_id,o.order_num,o.deposit,o.gold_money,o.total_amount,o.service_time,o.pay_time,s.service_name,u.true_name username,a.true_name sifuname')
                ->where('o.goods_type<>1 and o.order_status=1')
                ->order('o.pay_time asc')
                ->select();
        $data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }
     //生活服务待完成列表
    public function waitFinish(){
        $oOb=M('Order');
        $re=$oOb->alias('o')
                ->join('__USER__ u on u.user_id=o.user_id')
                ->join('__USER__ a on a.user_id=o.sifu_id')
                ->join('__SERVICE_CATE__ s on s.service_id=o.goods_id')
                ->field('o.order_id,o.order_num,o.deposit,o.gold_money,o.total_amount,o.service_time,o.pay_time,o.get_time,s.service_name,u.true_name username,a.true_name sifuname')
                ->where('o.goods_type<>1 and o.order_status=2')
                ->order('o.get_time asc')
                ->select();
        $data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }
     //生活服务已完成列表
    public function serviceCompleted(){
        $oOb=M('Order');
        $re=$oOb->alias('o')
                ->join('__USER__ u on u.user_id=o.user_id')
                ->join('__USER__ a on a.user_id=o.sifu_id')
                ->join('__SERVICE_CATE__ s on s.service_id=o.goods_id')
                ->field('o.order_id,o.order_num,o.deposit,o.gold_money,o.total_amount,o.service_time,o.end_time,s.service_name,u.true_name username,a.true_name sifuname')
                ->where('o.goods_type<>1 and o.order_status=4')
                ->order('o.order_status asc,o.end_time asc')
                ->select();
        $data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }
     //生活服务已取消列表
    public function cancelList(){
        $oOb=M('Order');
        $re=$oOb->alias('o')
                ->join('__USER__ u on u.user_id=o.user_id')
                ->join('__USER__ a on a.user_id=o.sifu_id')
                ->join('__SERVICE_CATE__ s on s.service_id=o.goods_id')
                ->field('o.order_id,o.order_num,o.deposit,o.gold_money,o.total_amount,o.pay_time,o.refund_time,o.user_note,s.service_name,u.true_name username,a.true_name sifuname')
                ->where('o.goods_type<>1 and o.order_status=5')
                ->order('o.refund_time asc')
                ->select();
        $data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }
    //接单，改数据库订单状态
    public function receive(){
        $order_id=$_GET['order_id'];
        $order_status=$_GET['order_status'];
        if ($order_status==2) {
            $data=array('order_status'=>$order_status,'get_time'=>time());
        }else if ($order_status==3){
            $data=array('order_status'=>$order_status,'end_time'=>time());
        }
        $oOb=M('Order');
        $re=$oOb->where('order_id='.$order_id)->save($data);
        if ($re) {
            $msg='success';
        }else{
            $msg='error';
        }
        $this->ajaxReturn($msg);
    }
    //退款，改数据库订单状态
    public function refund(){
        $order_id=$_GET['order_id'];
        $admin_note=I('admin_note')?I('admin_note'):'';
        $oOb=M('Order');
        $re=$oOb->where('order_id='.$order_id)->save(array('admin_note'=>$admin_note,'order_status'=>5,'refund_time'=>time()));
        if ($re) {
            $msg='success';
        }else{
            $msg='error';
        }
        $this->ajaxReturn($msg);
    }
    //删除已退款订单
    public function orderDelete(){
        $order_id=$_GET['order_id'];
        $oOb=M('Order');
        $re=$oOb->where('order_id='.$order_id)->delete();
        if ($re) {
           $this->success('删除成功');
        }else{
            $this->error('删除失败!');
        }
    }
    //订单评价列表
    public function commentList(){
        $cOb=M('Comment_response');
        $re=$cOb->alias('c')
                ->join('LEFT JOIN __USER__ u on u.user_id=c.commenter_id')
                
                ->join('LEFT JOIN __ROOM__  r on r.room_id=c.room_id ')
                ->join('LEFT JOIN __ADMIN__ a on a.admin_id=c.responser_id')
                ->field('c.comment_id,c.comment_content,c.response_content,c.comment_time,c.response_time,r.room_name,u.nickname commenter,a.username responser')
                ->order('status asc,comment_time asc')
                ->select();
        $data=$this->showPage($re);
        $arr=$data['arr'];
        $str=$data['pageStr'];
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();

    }
    //订单评论回复
    public function commentResponse(){
        $comment_id=$_GET['comment_id'];
        $cOb=M('Comment_response');
        $data=array('response_time'=>time(),'responser_id'=>session('adminid'),'response_content'=>I('response_content'),'status'=>1);
        $re=$cOb->where('comment_id='.$comment_id)->save($data);
        if ($re) {
            $msg='success';
        }else{
            $msg='error';
        }
        $this->ajaxReturn($msg);
    }
    //删除订单评论
    public function commentDelete(){
        $comment_id=$_GET['comment_id'];
        $cOb=M('Comment_response');
        $re=$cOb->where('comment_id='.$comment_id)->delete();
        if ($re) {
           $this->success('删除成功');
        }else{
            $this->error('删除失败!');
        }
    }

}