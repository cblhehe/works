<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8"/>
<title>素叶联盟后台管理系统</title>
<link rel="stylesheet" type="text/css" href="/sy/Public/admin/css/style.css" />
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="/sy/Public/admin/js/jquery.js"></script>
<script src="/sy/Public/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/sy/Public/admin/js/My97DatePicker/WdatePicker.js" language="javascript" type="text/javascript"></script>
<script>
	(function($){
		$(window).load(function(){
			
			$("a[rel='load-content']").click(function(e){
				e.preventDefault();
				var url=$(this).attr("href");
				$.get(url,function(data){
					$(".content .mCSB_container").append(data); 
					$(".content").mCustomScrollbar("scrollTo","h2:last");
				});
			});
			
			$(".content").delegate("a[href='top']","click",function(e){
				e.preventDefault();
				$(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
			});
			
		});
	})(jQuery);
</script>
</head>
<body>
<!--header-->
<header>
 <h1><span style="font-size:24px;">素叶联盟 </span>后台管理系统</span></h1>
 <ul class="rt_nav">
  <li><a href="<?php echo U('Home/Index/index');?>" target="_blank" class="website_icon">站点首页</a></li>
  <li><a href="#" class="admin_icon"><?php echo ($adminname); ?></a></li>
  <!-- <li><a href="#" class="set_icon">账号设置</a></li> -->
  <li><a href="<?php echo U('Admin/Login/out');?>" class="quit_icon">安全退出</a></li>
 </ul>
</header>

<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
 <ul>
   <li>
   <dl>
    <dt><a href="<?php echo U('Admin/Index/index');?>" id="operating_instructions">后台管理系统操作说明</a></dt>
   </dl>
  </li>
  <li>
   <dl>
    <dt>商品管理</dt>
    <!--当前链接则添加class:active-->
     <dd><a href="<?php echo U('Admin/Goods/roomList');?>" id="room">住房信息</a></dd>
     <dd><a href="<?php echo U('Admin/Goods/serviceList');?>" id='service'>服务分类</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>广告管理</dt>
    <dd><a href="<?php echo U('Admin/Ad/adList');?>" id="ad">广告列表</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>会员管理</dt>
    <dd><a href="<?php echo U('Admin/User/userList');?>" id="user">会员信息</a></dd>
    <dd><a href="<?php echo U('Admin/User/levelList');?>" id="level">等级设置</a></dd>
    <dd><a href="<?php echo U('Admin/User/sifuList');?>" id="sifu">师傅信息</a></dd>
   </dl>
   </li>
   <li>
   <dl>
    <dt>订单管理</dt>
    <dd><a href="<?php echo U('Admin/Order/stayWaitReceive');?>" id="stay_order">住宿订单</a></dd>
    <dd><a href="<?php echo U('Admin/Order/serviceWaitReceive');?>" id="service_order">服务订单</a></dd>
    <dd><a href="<?php echo U('Admin/Order/commentList');?>" id="comment">订单评价</a></dd>
   </dl>
  </li>
   <li>
   <dl>
    <dt>分销管理</dt>
    <dd><a href="<?php echo U('Admin/Fenxiao/fenxiaoSet');?>" id="fenxiao">分销设置</a></dd>
    <dd><a href="<?php echo U('Admin/Fenxiao/fenxiao');?>" id="fenxiao">分销商</a></dd>
   </dl>
  </li>
  <li>
   <dl>
    <dt>管理员管理</dt>
    <dd><a href="<?php echo U('Admin/Admin/adminList');?>" id="admin">管理员列表</a></dd>
    <dd><a href="<?php echo U('Admin/Admin/adminLog');?>" id="log">管理员日志</a></dd>
   </dl>
  </li>

 </ul>
</aside>

<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
 <section>
	<ul class="admin_tab">
		<li><a href="<?php echo U('Admin/Admin/adminList');?>">管理员列表</a></li>
		<li><a class="active" >添加管理员</a></li>
	</ul>
	<!--tabCont1-->
	<div class="admin_tab_cont" style="display:block;" id="tab1">
		<ul class="ulColumn2">
			<li>
				<span class="item_name" style="width:120px;">管理员账号：</span>
				<input type="text" class="textbox textbox_225" name="username" id="username" />
				<span class="errorTips" id="w1">管理员账号不能为空！</span>
				<span class="errorTips" id="w11">该管理员名称已存在！</span>
			</li>
			<li>
				<span class="item_name" style="width:120px;">密码：</span>
				<input type="text" class="textbox textbox_225" name="password" id="password" />
				<span class="errorTips" id="w2">密码不能为空！</span>
			</li>
			<li>
		        <span class="item_name" style="width:120px;">管理员角色：</span>
		        <label class="single_selection"><input type="radio" name="role" value="0" checked="checked" />普通管理员</label>
		        <label class="single_selection"><input type="radio" name="role" value="2"/>中级管理员</label>
		        <label class="single_selection"><input type="radio" name="role" value="1"/>超级管理员</label>
	       	</li>
	       	<li style="color:gray;font-size:12px;padding-left:50px;margin-top:30px;">
	       	<p>管理员权限说明：</p><br/>
	       	<p>1、普通管理员可操作功能模块为：商品管理、广告管理</p><br/>
	       	<p>2、中级管理员可操作功能模块为：会员管理、订单管理</p><br/>
	       	<p>3、超级管理员具有最高权限，可操作所有模块</p>
	       	</li>
			<li>
				<span class="item_name" style="width:120px;"></span>
				<input type="button" class="link_btn" id="submit" value="添加"/>
			</li>
		</ul>
	</div>
	
	
</section>
<!--tabStyle-->
<script>
$(document).ready(function(){

$('#admin').addClass('active');

/*$('input[name=username]').change(function(){
	var url="<?php echo U('Admin/Admin/isexist');?>";
	var username=$.trim($('input[name=username]').val());
	if (username!='') {
	$.ajax({  
	    type: "post",  
	    url: url,  
	    dataType: "json",  
	    data: {username:username},  
	    success: function(data){  
	      if (data=='exist') {
	      	 $('#w11').show();
	      	 return false;
	      }else{
	      	console.log(data);
	      	 $('#w11').hide();
	      }
	    }  
	  });  
	}
})*/
//	提交前
$('#submit').click(function(){
	if ($.trim($('#username').val())=='') {
		$('#w1').show();
		return false;
	}else{
		$('#w1').hide();
	}
	if ($.trim($('#password').val())=='') {
		$('#w2').show();
		return false;
	}else{
		$('#w2').hide();
	}
	var params = $("input").serialize();  
    var url = "<?php echo U('Admin/Admin/save');?>";  
    $.ajax({  
        type: "post",  
        url: url,  
        dataType: "json",  
        data: params,  
        success: function(data){  
          if (data=='success') {
          	 alert('添加成功!');
            window.location.href="<?php echo U('Admin/Admin/adminList');?>";
          }else if(data=='exist'){
          	$('#w11').show();
          	setTimeout(function(){$('#w11').hide();},2000);
          	return false;
          }else{
          	alert('添加失败！');
          }
        }  
      });  
	
})



});
</script>
 <!--tabStyle-->
<script>
$(document).ready(function(){
  //tab
  $(".admin_tab_cont").eq(0).fadeIn(150).siblings(".admin_tab_cont").hide();
  $(".admin_tab li a").click(function(){
    var liindex = $(".admin_tab li a").index(this);
    $(this).addClass("active").parent().siblings().find("a").removeClass("active");
    $(".admin_tab_cont").eq(liindex).fadeIn(150).siblings(".admin_tab_cont").hide();
  });
/*$('#admin').click(function(){
  var url = "<?php echo U('Admin/Admin/checkRole');?>";  
    $.ajax({  
        type: "post",  
        url: url,  
        dataType: "json",  
        success: function(data){  
          if (data=='success') {
            location.href="<?php echo U('Admin/Admin/admin');?>";
          }else{
            alert('对不起，您没有该权限！');
          }
        }  
      }); 
})
$('#userList').click(function(){
  var url = "<?php echo U('Admin/Admin/checkRole');?>";  
    $.ajax({  
        type: "post",  
        url: url,  
        dataType: "json",  
        success: function(data){  
          if (data=='success') {
            location.href="<?php echo U('Admin/User/userList');?>";
          }else{
            alert('对不起，您没有该权限！');
          }
        }  
      }); 
}) */
});
</script>
     
 </div>
</section>
</body>
</html>