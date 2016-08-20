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
    <li><a  class="active">分销设置</a></li>
    
  </ul>
  <!--tabCont1-->
  <div class="admin_tab_cont" style="display:block;" id="tab1">
    <ul class="ulColumn2">
      <li>
        <span class="item_name" style="width:150px;">一级分销商分佣比例：</span>
        <input type="text" class="textbox textbox_70 content" name="first_scale" id="first_scale" <?php if(!empty($re["first_scale"])): ?>value="<?php echo ($re["first_scale"]); ?>"<?php endif; ?> />&nbsp;%
        <span class="errorTips" id="t1">分佣比例不能为空！</span>
      </li>
      <li>
        <span class="item_name" style="width:150px;">二级分销商分佣比例：</span>
        <input type="text" class="textbox textbox_70 content" name="second_scale" id="second_scale" <?php if(!empty($re["second_scale"])): ?>value="<?php echo ($re["second_scale"]); ?>"<?php endif; ?>/>&nbsp;%
        <span class="errorTips" id="t2">分佣比例不能为空！</span>
      </li>
      <li>
        <span class="item_name" style="width:150px;">三级分销商分佣比例：</span>
        <input type="text" class="textbox textbox_70 content" name="third_scale" id="third_scale" <?php if(!empty($re["third_scale"])): ?>value="<?php echo ($re["third_scale"]); ?>"<?php endif; ?>/>&nbsp;%
        <span class="errorTips" id="t3">分佣比例不能为空！</span>
      </li>
      <li>
        <span class="item_name" style="width:150px;">提现条件：</span>
        <input type="text" class="textbox textbox_70 content" name="condition" id="condition" <?php if(!empty($re["condition"])): ?>value="<?php echo ($re["condition"]); ?>"<?php endif; ?>/>&nbsp;元
        <span style="color:gray;padding-left:30px;font-size:12px;">备注：佣金达到多少才可以提现！</span>
        <span class="errorTips" id="t4">提现条件不能为空！</span>
      </li>
      <li>
        <span class="item_name" style="width:150px;">最少提现额度：</span>
        <input type="text" class="textbox textbox_70 content" name="least_condition" id="least_condition" value="<?php if(!empty($re["least_condition"])): echo ($re["least_condition"]); else: ?>1.00<?php endif; ?>"/>&nbsp;元
        <span class="errorTips" id="t5">提现条件不能为空！</span>
      </li>
      <li>
        <span class="item_name" style="width:150px;"></span>
        <input type="submit" class="link_btn" id="submit" value="提交" />
      </li>
    </ul>
  </div>

</section>
<!--tabStyle-->
<script>
$(document).ready(function(){
$('#fenxiao').addClass('active');

//  提交前
$('#submit').click(function(){
  if ($.trim($('#first_scale').val())=='') {
    $('#t1').show();
    $('#first_scale').focus();
    return false;
  }else{
    $('#t1').hide();
  }
  if ($.trim($('#second_scale').val())=='') {
    $('#t2').show();
    $('#second_scale').focus();
    return false;
  }else{
    $('#t2').hide();
  }
  if ($.trim($('#third_scale').val())=='') {
    $('#t3').show();
    $('#third_scale').focus();
    return false;
  }else{
    $('#t3').hide();
  }
  if ($.trim($('#condition').val())=='') {
    $('#t4').show();
    $('#condition').focus();
    return false;
  }else{
    $('#t4').hide();
  }
  if ($.trim($('#least_condition').val())=='') {
    $('#t5').show();
    $('#least_condition').focus();
    return false;
  }else{
    $('#t5').hide();
  }

  var params = $("input").serialize();  
  var url = "<?php echo U('Admin/Fenxiao/fenxiaoSave');?>?fenxiao_id=<?php echo ($re["fenxiao_id"]); ?>";  
    $.ajax({  
        type: "post",  
        url: url,  
        dataType: "json",  
        data: params,  
        success: function(data){  
            alert(data);
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