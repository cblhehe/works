<?php
//获取用户id
function getUserId(){
        return session("userid")?session("userid"):1;
}
//无限极分类
function oneL($cate,$pid=0,$deli='',$num=0){
		$carr=array();
		$num+=1;
		$deli=$deli;
		$deli1=str_repeat($deli,$num);
		
		foreach ($cate as $v) {
			if ($v['pid']==$pid) {
				$v['deli']=$deli1;
				$carr[]=$v;
				$carr=array_merge($carr,oneL($cate,$v['service_id'],$deli,$num));
			}
		}
	return $carr;
}
//管理员日志
function adminLog($action){
	$data['admin_id']=session("adminid");
	$data['admin_action']=$action;
	$data['log_time']=time();
	$data['log_ip']=get_real_ip();
	$aOb=M('Admin_log');
	$aOb->add($data);
}

function get_real_ip(){ 
	$ip=false; 
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){ 
		$ip=$_SERVER['HTTP_CLIENT_IP']; 
	}
	if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ 
		$ips=explode (', ', $_SERVER['HTTP_X_FORWARDED_FOR']); 
		if($ip){ array_unshift($ips, $ip); $ip=FALSE; }
		for ($i=0; $i < count($ips); $i++){
			if(!eregi ('^(10│172.16│192.168).', $ips[$i])){
				$ip=$ips[$i];
				break;
			}
		}
	}
	return ($ip ? $ip : $_SERVER['REMOTE_ADDR']); 
}
 
// 首先需要检测b目录是否存在 
function make_dir(){
	$dir=date('Y-m-d');
	if (!is_dir(C('UPLOADS').$dir.'/')){
		mkdir(C('UPLOADS').$dir.'/',0777); 
	}
	return C('UPLOADS').$dir.'/';
}

/** 删除所有空目录 
* @param String $path 目录路径 
*/
function rm_empty_dir($path){ 
  if(is_dir($path) && ($handle = opendir($path))!==false){ 
    while(($file=readdir($handle))!==false){// 遍历文件夹 
      if($file!='.' && $file!='..'){ 
        $curfile = $path.'/'.$file;// 当前目录 
        if(is_dir($curfile)){// 目录 
          rm_empty_dir($curfile);// 如果是目录则继续遍历 
          if(count(scandir($curfile))==2){//目录为空,=2是因为.和..存在
            rmdir($curfile);// 删除空目录 
          } 
        } 
      } 
    } 
    closedir($handle); 
  } 
} 

