<?php
if ($_SERVER['HTTP_HOST']=='localhost') {
    $db_user='root';
    $db_pwd='root';
    $db_name='sylm';
    $yuming='http://localhost/sy';
}else{
    $db_user='test5';
    $db_pwd='y7K3N3T7';
    $db_name='test5';
    $yuming='http://test5.angkebrand.com';
}
return array(
	//'配置项'=>'配置值'
	'MODULE_ALLOW_LIST'=>array('Admin','Home'),//允许的分组列表
    'DEFAULT_MODULE'=>'Home', //默认分组
    'DEFAULT_CONTROLLER'=>'Index',//默认控制器
	'DEFAULT_ACTION'=>'index',//默认方法
    'DB_TYPE'=>'mysql',     //数据库类型
    'DB_HOST'=>'localhost',//服务器地址
    'DB_NAME'=>$db_name,       //数据库名称
    'DB_CHARSET'=>'utf8',   //数据库编码方式默认为utf8
    'DB_PORT'=>'3306',      //端口
    'DB_USER'=>$db_user,      //用户名
    'DB_PWD'=>$db_pwd,       //密码
    'DB_PREFIX'=>'sy_',   //数据库表前缀
    'UPLOADS'=>dirname(dirname(dirname(dirname(__FILE__)))).'/Public/Uploads/',//图片文件上传保存地址
    'YUMING'=>$yuming,//域名

);