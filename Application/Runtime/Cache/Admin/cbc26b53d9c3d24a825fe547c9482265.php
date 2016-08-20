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
     <dd><a href="<?php echo U('Admin/Goods/roomList');?>" id="room">房屋信息</a></dd>
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
		<li><a href="<?php echo U('Admin/Goods/serviceList');?>">服务列表</a></li>
		<li><a  href="<?php echo U('Admin/Goods/serviceAddPage');?>">服务添加</a></li>
		<li><a  class="active">服务修改</a></li>
		
	</ul>
	<!--tabCont1-->
	<div class="admin_tab_cont" style="display:block;" id="tab1">
	<form action="<?php echo U('Admin/Goods/serviceSave');?>?service_id=<?php echo ($re["service_id"]); ?>"  method="post" enctype="multipart/form-data">
		<ul class="ulColumn2">
			<li>
				<span class="item_name" style="width:120px;">服务名称：</span>
				<input type="text" class="textbox textbox_295 content" name="service_name" id="service_name" value="<?php echo ($re["service_name"]); ?>"/>
				<span class="errorTips" id="t1">住房名称不能为空！</span>
			</li>
			<li>
		        <span class="item_name" style="width:120px;">上级分类：</span>
		        <select class="select" name="pid" id="pid">
		         	<option value="0">顶级分类</option>
		         	<?php if(is_array($arr)): foreach($arr as $key=>$v): ?><option value="<?php echo ($v["service_id"]); ?>" <?php if($v["service_id"] == $re["pid"] ): ?>selected='selected'<?php endif; ?>>
		         	<?php if($v["pid"] == 0 ): ?>┣<?php echo ($v["service_name"]); ?>
		         	<?php else: ?>
		         	&nbsp;&nbsp;<?php echo ($v["deli"]); echo ($v["service_name"]); endif; ?>
		         	</option><?php endforeach; endif; ?>
		        </select>
	       </li>
	       <li>
				<span class="item_name" style="width:120px;">定金：</span>
				<input type="text" class="textbox textbox_70 content" name="deposit" id="deposit"  value="<?php echo ($re["deposit"]); ?>"/>&nbsp;&nbsp;元
				<span class="errorTips" id="t2">请填写定金！</span>
			</li>
			<!-- <li>
				<span class="item_name" style="width:120px;">佣金：</span>
				<input type="text" class="textbox textbox_70 content" name="brokerage" id="brokerage"  value="<?php echo ($re["brokerage"]); ?>"/>&nbsp;&nbsp;元
				<span class="errorTips" id="t3">请填写佣金！</span>
			</li> -->
			<li>
		        <span class="item_name" style="width:120px;">是否显示</span>
		        <label class="single_selection"><input type="radio" name="isshow" value="1" <?php if($re["isshow"] == 1 ): ?>checked='checked'<?php endif; ?> />是</label>
		        <label class="single_selection"><input type="radio" name="isshow" value="0" <?php if($re["isshow"] == 0 ): ?>checked='checked'<?php endif; ?> />否</label>
	       </li>
			<li>
				<span class="item_name" style="width:120px;">排序：</span>
				<input type="text" class="textbox textbox_70 content" name="order" id="order" value="<?php echo ($re["order"]); ?>"/>
			</li>
			<li>
				<span class="item_name" style="width:120px;">服务图片：</span>
				<label class="uploadImg">
				<input type="file" name="service_image" id="service_image"  />
				<span>上传图片</span>
				</label>
				<?php if(!empty($re["service_image"])): ?><img src='/sy/Public/Uploads/<?php echo ($re["service_image"]); ?>' id='img' height='82' alt='' style='margin:-22px 10px 18px 10px;'/>
				<a style='margin: 5px;' href="#" onclick="delImg(this,'<?php echo ($re["service_image"]); ?>',<?php echo ($re["service_id"]); ?>)" id="del_butt">删除</a>		
				<input type="hidden" name="oldImg" value="<?php echo ($re["service_image"]); ?>">	
				<?php else: ?>
				<img src='' id='img' height='82' alt='' style='margin:-22px 10px 18px 10px;display: none;' /><?php endif; ?>
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
$('#service').addClass('active');


//上传图片预览
$("#service_image").change(function(){
    var objUrl = getObjectURL(this.files[0]) ;
    if (objUrl) {
    	$("#del_butt").remove();
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
	if ($.trim($('#service_name').val())=='') {
		$('#t1').show();
		$('#service_name').focus();
		return false;
	}else{
		$('#t1').hide();
	}
	if ($.trim($('#deposit').val())=='') {
		$('#t2').show();
		$('#deposit').focus();
		return false;
	}else{
		$('#t2').hide();
	}
	/*if ($.trim($('#brokerage').val())=='') {
		$('#t3').show();
		$('#brokerage').focus();
		return false;
	}else{
		$('#t3').hide();
	}*/
	
})


});
function delImg(obj,service_image,service_id){
	var url="<?php echo U('Admin/Goods/serviceImgDel');?>?service_id="+service_id;
	$.ajax({  
	    type: "post",  
	    url: url,  
	    dataType: "json",  
	    data: {service_image:service_image},  
	    success: function(data){  
	      if (data=='success') {
	      	 alert('删除成功！');
	      	 $(obj).prev().attr('src','').css('display','none');  
	      	 $(obj).remove();
	      }else{
	      	alert('删除失败！');
	      }
	    }  
	  });  
}



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