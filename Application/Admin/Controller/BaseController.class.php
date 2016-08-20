<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
	//初始化，判断是否登录
    public function _initialize(){
    	if (!session('adminname')) {
    		header('location:'.U('Admin/Login/login'));
    	}
    	$this->assign('adminname',session('adminname'));
    }
    /**
    *获取分页
    *@param $re array 要分页的结果集
    *@param $pageSize int 每页的记录数
    *@param return array('pageStr'=>$str,分页信息
    					 'arr'=>$arr   分页后的结果集
    					 )
    */
    public function showPage($re,$pageSize=''){
		$count=count($re);
		$pageSize=$pageSize?$pageSize:10;		
		$pageOb=new \Think\Page($count,$pageSize);
		$pageOb->setConfig('header','<span class="rows">共 %TOTAL_ROW% 条记录&nbsp; %NOW_PAGE%/%TOTAL_PAGE%页</span>');
		$pageOb->setConfig('first','首页');
		$pageOb->setConfig('prev','上一页');
		$pageOb->setConfig('next','下一页');		
		$pageOb->setConfig('last','最后一页');
		$pageOb->setConfig('theme','%HEADER%  %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        if (empty($_GET['p'])) {
           $_GET['p']=1;
        }
		$offset=($_GET['p']-1)*$pageSize;
		$arr=array_slice($re,$offset,$pageSize);
		$str=$pageOb->show();
		if ($str=='') {
			$str='共 0 条记录';
		}
		$data=array('pageStr'=>$str,'arr'=>$arr);
		return $data;
		/*$this->assign('str',$str);
		$this->assign('arr',$arr);
        $this->assign('p',$_GET['p']);*/
    }

}