<?php
//获取用户id
function getUserId(){
        return session("userid")?session("userid"):1;
}
//无限极分类
function oneL($arr,$pid=0){
	$carr=array();
	foreach ($arr as $v) {
		if ($v['pid']==$pid) {
			$carr[]=$v;
			$carr=array_merge($carr,oneL($arr,$v['id']));
		}
	}
	return $carr;
}