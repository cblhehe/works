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
		<li><a class="active">广告列表</a></li>
		<li><a  href="<?php echo U('Admin/Ad/adAddPage');?>">广告添加</a></li>
		
	</ul>
	<!--tabCont1-->
	<div class="admin_tab_cont" style="display:block;" id="tab1">
		<section>
			<div class="page_title">
				<h2 class="fl">广告列表</h2>
			</div>
			<table class="table">
				<tr>
					<th>广告ID</th>
					<th>广告名称</th>
					<th>广告位置</th>
					<th>广告图片</th>
					<th>广告链接</th>
					<th>是否显示</th>
					<th>排序</th>
					<th>点击数</th>
					<th>添加时间</th>
					<th>上线时间</th>
					<th>下线时间</th>
					<th>修改时间</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($arr)): foreach($arr as $key=>$v): ?><tr>
					<td><?php echo ($v["ad_id"]); ?></td>
					<td><?php echo ($v["ad_name"]); ?></td>
					<td>
					<?php switch($v["pid"]): case "1": ?>住宿首页<?php break;?>
					    <?php case "2": ?>服务首页<?php break; endswitch;?>
					</td>
					<td><img src="/sy/Public/Uploads/<?php echo ($v["ad_image"]); ?>" height="40"></td>
					<td><?php echo ($v["ad_link"]); ?></td>
					<td>
					<?php switch($v["isshow"]): case "1": ?>是<?php break;?>
					    <?php case "0": ?>否<?php break; endswitch;?>
					</td>
					<td><?php echo ($v["order"]); ?></td>
					<td><?php echo ($v["click_count"]); ?></td>
					<td><?php echo (date("Y-m-d H:i:s",$v["add_time"])); ?></td>
					<td><?php echo (date("Y-m-d",$v["start_time"])); ?></td>
					<td>
					<?php if($v["end_time"] == 0): ?>永不下线
					<?php else: ?>
						<?php echo (date("Y-m-d",$v["end_time"])); endif; ?>
					</td>
					<td>
					<?php if(!empty($v["modify_time"])): echo (date("Y-m-d H:i:s",$v["modify_time"])); ?></td><?php endif; ?>
					<td>
					<a href="<?php echo U('Admin/Ad/adModifyPage');?>?ad_id=<?php echo ($v["ad_id"]); ?>" class="inner_btn" >修改</a>
					<a href="<?php echo U('Admin/Ad/adDelete');?>?ad_id=<?php echo ($v["ad_id"]); ?>&ad_image=<?php echo ($v["ad_image"]); ?>" class="inner_btn2" >删除</a>
					</td>
				</tr><?php endforeach; endif; ?>
			</table>
			<aside class="paging">
				<?php echo ($str); ?>
			</aside>
		</section>
	</div>

</section>
<script>
$(document).ready(function() {
	$('#ad').addClass('active');
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