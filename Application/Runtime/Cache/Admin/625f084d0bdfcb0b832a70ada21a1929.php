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
		<li><a href="<?php echo U('Admin/Ad/adList');?>">广告列表</a></li>
		<li><a  href="<?php echo U('Admin/Ad/adAddPage');?>">广告添加</a></li>
		<li><a  class="active">服务修改</a></li>
		
	</ul>
	<!--tabCont1-->
	<div class="admin_tab_cont" style="display:block;" id="tab1">
	<form action="<?php echo U('Admin/Ad/adSave');?>?ad_id=<?php echo ($re["ad_id"]); ?>"  method="post" enctype="multipart/form-data">
		<ul class="ulColumn2">
			<li>
				<span class="item_name" style="width:120px;">广告名称：</span>
				<input type="text" class="textbox textbox_295 content" name="ad_name" id="ad_name" value="<?php echo ($re["ad_name"]); ?>" />
				<span class="errorTips" id="t1">广告名称不能为空！</span>
			</li>
			<li>
		        <span class="item_name" style="width:120px;">广告位置：</span>
		        <select class="select" name="pid" id="pid">
		         	<option value="0">请选择广告位</option>
		         	<option value="1" <?php if($re["pid"] == 1 ): ?>selected='selected'<?php endif; ?>>住宿首页</option>
		         	<option value="2" <?php if($re["pid"] == 2 ): ?>selected='selected'<?php endif; ?>>服务首页</option>
		         	<span class="errorTips" id="t2">请选择广告位置！</span>
		        </select>
	       </li>
			<li>
		        <span class="item_name" style="width:120px;">是否显示</span>
		        <label class="single_selection"><input type="radio" name="isshow" value="1" <?php if($re["isshow"] == 1 ): ?>checked='checked'<?php endif; ?> />是</label>
		        <label class="single_selection"><input type="radio" name="isshow" value="0" <?php if($re["isshow"] == 0 ): ?>checked='checked'<?php endif; ?>/>否</label>
	       </li>
			<li>
				<span class="item_name" style="width:120px;">排序：</span>
				<input type="text" class="textbox textbox_70 content" name="order" id="order" value="<?php echo ($re["order"]); ?>"/>
			</li>
			<li>
				<span class="item_name" style="width:120px;">上线时间：</span>
				<input type="datetime" class="textbox textbox_175 datePicker content" name="start_time" id="start_time" onclick="WdatePicker({lang:'zh-cn',dateFmt:'yyyy-MM-dd'})" value="<?php echo (date('Y-m-d',$re["start_time"])); ?>"/>
				<span class="errorTips" id="t3">上线时间不能为空！</span>
			</li>
			<li>
				<span class="item_name" style="width:120px;">下线时间：</span>
				<input type="datetime" class="textbox textbox_175 datePicker content" name="end_time" id="end_time" onclick="WdatePicker({lang:'zh-cn',dateFmt:'yyyy-MM-dd'})" value="<?php if($re["end_time"] == 0): ?>0<?php else: echo (date("Y-m-d",$re["end_time"])); endif; ?>"/>
				<span style="color:gray;font-size:12px;">备注：下线时间默认为0，代表永不下线！</span>
			</li>
			<li>
				<span class="item_name" style="width:120px;">广告链接：</span>
				<input type="datetime" class="textbox textbox_295 content" name="ad_link" id="ad_link" placeholder="格式：http://www.baidu.com" value="<?php echo ($re["ad_link"]); ?>"/>
			</li>
			<li>
				<span class="item_name" style="width:120px;">广告图片：</span>
				<label class="uploadImg">
				<input type="file" name="ad_image" id="ad_image"  />
				<span>上传图片</span>
				</label>
				<img src='/sy/Public/Uploads/<?php echo ($re["ad_image"]); ?>' id='img' height='82' alt='' style='margin:-22px 10px 18px 10px;' />
				<input type="hidden" name="oldImg" value="<?php echo ($re["ad_image"]); ?>">	
				<span class="errorTips" id="t4">广告图片不能为空！</span>
				<p style="padding:10px 0 0 130px;color:gray;font-size:12px;">建议图片尺寸：宽度/高度=5:3;单位：px.</p>
			</li>

			<li>
				<span class="item_name" style="width:120px;"></span>
				<input type="submit" class="link_btn" id="submit" value="提交" />
			</li>
		</ul>
	</form>
	</div>

</section>
<!--tabStyle-->
<script>
$(document).ready(function(){
$('#ad').addClass('active');


//上传图片预览
$("#ad_image").change(function(){
    var objUrl = getObjectURL(this.files[0]) ;
    if (objUrl) {
    	$("#img").attr("src",objUrl).show();
    }
}) ; 
 
function getObjectURL(file) {
		var url = null ; 
		if (window.createObjectURL!=undefined) { // basic
			url = window.createObjectURL(file) ;
		} else if (window.URL!=undefined) { // mozilla(firefox)
			url = window.URL.createObjectURL(file) ;
		} else if (window.webkitURL!=undefined) { // webkit or chrome
			url = window.webkitURL.createObjectURL(file) ;
		}
		return url ;
}

//	提交前
$('#submit').click(function(){
	if ($.trim($('#ad_name').val())=='') {
		$('#t1').show();
		$('#ad_name').focus();
		return false;
	}else{
		$('#t1').hide();
	}
	if ($.trim($('#pid').val())==0) {
		$('#t2').show();
		return false;
	}else{
		$('#t2').hide();
	}
	if ($.trim($('#start_time').val())=='') {
		$('#t3').show();
		return false;
	}else{
		$('#t3').hide();
	}
	if ($.trim($("#img").attr("src"))=='') {
		$('#t4').show();
		return false;
	}else{
		$('#t4').hide();
	}
	
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