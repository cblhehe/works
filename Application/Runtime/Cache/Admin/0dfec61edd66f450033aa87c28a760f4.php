<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8"/>
<title>后台登录</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/sy/Public/admin/css/style.css" />
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="/sy/Public/admin/js/jquery.js"></script>
<script src="/sy/Public/admin/js/verificationNumbers.js"></script>
<script src="/sy/Public/admin/js/Particleground.js"></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
  $(".submit_btn").click(function(){
    if ($.trim($("#username").val())=='') {
      alert('请填写账号！');
      return false;
    }
    if ($.trim($("#password").val())=='') {
      alert('请填写密码！');
      return false;
    }
    var params = $("input").serialize();  
    var url = "<?php echo U('Admin/Login/check');?>";  
    $.ajax({  
        type: "post",  
        url: url,  
        dataType: "json",  
        data: params,  
        success: function(data){  
          if (data.msg=='success') {
            window.location.href="<?php echo U('Admin/Index/index');?>";
          }else{
            alert('账号或密码错误！');
          }
        }  
      });  

	  
	});
});
</script>
</head>
<body>
<dl class="admin_login">
 <dt>
  <strong>素叶联盟后台管理系统</strong>
  <em>Management System</em>
 </dt>
 <dd class="user_icon">
  <input type="text" placeholder="账号" class="login_txtbx" name="username" id="username" />
 </dd>
 <dd class="pwd_icon">
  <input type="password" placeholder="密码" class="login_txtbx" name="password" id="password" />
 </dd>
 <dd>
  <input type="button" value="立即登陆" class="submit_btn"/>
 </dd>
</dl>
</body>
</html>