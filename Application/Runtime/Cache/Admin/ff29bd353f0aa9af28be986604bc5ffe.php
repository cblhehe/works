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
		<li><a href="<?php echo U('Admin/Goods/roomList');?>">房屋列表</a></li>
		<li><a  class="active">房屋添加</a></li>
		
	</ul>
	<!--tabCont1-->
	<div class="admin_tab_cont" style="display:block;" id="tab1">
	<form action="<?php echo U('Admin/Goods/roomSave');?>"  method="post" enctype="multipart/form-data">
		<ul class="ulColumn2">
			<li>
				<span class="item_name" style="width:120px;">住房名称：</span>
				<input type="text" class="textbox textbox_295 content" name="room_name" id="room_name" />
				<span class="errorTips" id="t1">住房名称不能为空！</span>
			</li>
			<li>
		        <span class="item_name" style="width:120px;">住房类型：</span>
		        <select class="select" name="room_cate" id="room_cate">
		         	<option value="0">选择住房类型</option>
		         	<option value="1">名宿</option>
		         	<option value="2">酒店</option>
		        </select>
		        <span class="errorTips" id="t2">请选择住房类型！</span>
	       </li>
	       <li>
		        <span class="item_name" style="width:120px;">房间类型：</span>
		        <select class="select" name="room_type" id="room_type">
		         	<option value="0">选择房间类型</option>
		         	<option value="1">单租</option>
		         	<option value="2">整租</option>
		        </select>
		        <span class="errorTips" id="t3">请选择房间类型！</span>
	       </li>
			<li>
				<span class="item_name" style="width:120px;">可住人数：</span>
				<input type="text" class="textbox textbox_70 content" name="population" id="population"  />&nbsp;&nbsp;人
				<span class="errorTips" id="t4">请填写可住人数！</span>
			</li>
			<li>
				<span class="item_name" style="width:120px;">床位：</span>
				<input type="text" class="textbox textbox_70 content" name="bed_num" id="bed_num"  />&nbsp;&nbsp;张
				<span class="errorTips" id="t5">请填写床位！</span>
			</li>
			<li>
				<span class="item_name" style="width:120px;">押金：</span>
				<input type="text" class="textbox textbox_70 content" name="deposit" id="deposit"  />&nbsp;&nbsp;元
				<span class="errorTips" id="t6">请填写押金！</span>
			</li>
			<li>
				<span class="item_name" style="width:120px;">租金：</span>
				<input type="text" class="textbox textbox_70 content" name="rental" id="rental"  />&nbsp;&nbsp;元/天
				<span class="errorTips" id="t7">请填写租金！</span>
			</li>
			<!-- <li>
				<span class="item_name" style="width:120px;">佣金：</span>
				<input type="text" class="textbox textbox_70 content" name="brokerage" id="brokerage"  />&nbsp;&nbsp;元
				<span class="errorTips" id="t8">请填写佣金！</span>
			</li> -->
			<li>
		        <span class="item_name" style="width:120px;">是否独立卫生间：</span>
		        <label class="single_selection"><input type="radio" name="toilet" value="1" checked="checked" />是</label>
		        <label class="single_selection"><input type="radio" name="toilet" value="0"/>否</label>
	       </li>
	       <li>
		        <span class="item_name" style="width:120px;">是否可加床位：</span>
		        <label class="single_selection"><input type="radio" name="add_bed" value="1" checked="checked"/>是</label>
		        <label class="single_selection"><input type="radio" name="add_bed" value="0"/>否</label>
	       </li>
	       <li>
		        <span class="item_name" style="width:130px;">是否接待境外人士：</span>
		        <label class="single_selection"><input type="radio" name="accept_foreigner" value="1" checked="checked"/>是</label>
		        <label class="single_selection"><input type="radio" name="accept_foreigner" value="0"/>否</label>
	       </li>
	       <li>
		        <span class="item_name" style="width:120px;">最少入住天数:</span>
		        <select class="select" name="least_day" id="least_day">
		         	<!-- <option value="0">选择最少入住天数</option> -->
		         	<?php if(is_array($day)): foreach($day as $key=>$v): ?><option value="<?php echo ($v["day"]); ?>"><?php echo ($v["day"]); ?>天</option><?php endforeach; endif; ?>
		        </select>
		        <!-- <span class="errorTips" id="t9">选择最少入住天数!</span> -->
	       </li>
			<li>
				<span class="item_name" style="width:120px;">住房地址：</span>
				<input type="text" class="textbox textbox_295 content" name="address" id="address" />
				<span class="errorTips" id="t10">住房地址不能为空！</span>
			</li>
			<li>
				<span class="item_name" style="width:120px;">住房描述：</span>
				<textarea id="description" name="description" class="textarea" style="width:500px;height:100px;"  ></textarea>
				<span class="errorTips" id="t11">请填写住房描述！</span>
			</li>
			<li>
				<span class="item_name" style="width:120px;">交通描述：</span>
				<textarea  class="textarea" style="width:500px;height:100px;" name="traffic" id="traffic"></textarea>
				<span class="errorTips" id="t12">请填写交通描述！</span>
			</li>
			
	       <li>
				<span class="item_name" style="width:120px;">预订条款：</span>
				<textarea  class="textarea" style="width:500px;height:100px;" name="reservation_terms" id="reservation_terms"></textarea>
			</li>
			<li>
				<span class="item_name" style="width:120px;">住房图片：</span>
				<label class="uploadImg">
				<input type="file" name="room_images[]" id="room_images" multiple="multiple" />
				<span>上传图片</span>
				</label>
				<img src='' id='img' height='82' alt='' style='margin:-22px 10px 18px 10px;display: none;' />
				<span class="errorTips" id="t13">住房图片不能为空！</span>
				<p style="padding:10px 0 0 130px;color:gray;font-size:12px;">按住Ctrl键不放，鼠标连续点击要选的图片，即可选中多张图片上传！</p>
				<p style="padding:10px 0 0 130px;color:gray;font-size:12px;">建议图片尺寸：宽度/高度=5:3;单位：px.</p>
				
			</li>

			<li>
				<span class="item_name" style="width:120px;"></span>
				<input type="submit" class="link_btn" id="submit" value="添加" />
			</li>
		</ul>
	</form>
	</div>

</section>
<!--tabStyle-->
<script>
$(document).ready(function(){
$('#room').addClass('active');


//上传图片预览
$("#room_images").change(function(){
    var objUrl = getObjectURL(this.files[0]) ;
    if (objUrl) {
    	$("#img").attr("src",objUrl).show();
    	$('#t13').hide();
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
	if ($.trim($('#room_name').val())=='') {
		$('#t1').show();
		$('#room_name').focus();
		return false;
	}else{
		$('#t1').hide();
	}
	if ($.trim($('#room_cate').val())==0) {
		$('#t2').show();
		$('#room_name').focus();
		return false;
	}else{
		$('#t2').hide();
	}
	if ($.trim($('#room_type').val())==0) {
		$('#t3').show();
		$('#room_name').focus();
		return false;
	}else{
		$('#t3').hide();
	}
	if ($.trim($('#population').val())=='') {
		$('#t4').show();
		$('#population').focus();
		return false;
	}else{
		$('#t4').hide();
	}
	if ($.trim($('#bed_num').val())=='') {
		$('#t5').show();
		$('#population').focus();
		return false;
	}else{
		$('#t5').hide();
	}
	if ($.trim($('#deposit').val())=='') {
		$('#t6').show();
		$('#deposit').focus();
		return false;
	}else{
		$('#t6').hide();
	}
	if ($.trim($('#rental').val())=='') {
		$('#t7').show();
		$('#rental').focus();
		return false;
	}else{
		$('#t7').hide();
	}
	/*if ($.trim($('#brokerage').val())=='') {
		$('#t8').show();
		$('#brokerage').focus();
		return false;
	}else{
		$('#t8').hide();
	}*/
	/*if ($.trim($('#least_day').val())==0) {
		$('#t9').show();
		$('#brokerage').focus();
		return false;
	}else{
		$('#t9').hide();
	}*/
	if ($.trim($('#address').val())=='') {
		$('#t10').show();
		$('#address').focus();
		return false;
	}else{
		$('#t10').hide();
	}
	if ($.trim($('#description').val())=='') {
		$('#t11').show();
		$('#description').focus();
		return false;
	}else{
		$('#t11').hide();
	}

	if ($.trim($('#traffic').val())=='') {
		$('#t12').show();
		$('#traffic').focus();
		return false;
	}else{
		$('#t12').hide();
	}
	if ($.trim($("#img").attr("src"))=='') {
		$('#t13').show();
		return false;
	}else{
		$('#t13').hide();
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