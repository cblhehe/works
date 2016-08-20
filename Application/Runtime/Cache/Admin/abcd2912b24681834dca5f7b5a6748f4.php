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
    <li><a  href="<?php echo U('Admin/Order/stayWaitReceive');?>">待接单</a></li>
    <li><a  class="active">待入住</a></li>
    <li><a href="<?php echo U('Admin/Order/stayCompleted');?>" >已完成</a></li>
    <li><a href="<?php echo U('Admin/Order/refundList');?>" >已退款</a></li>
  </ul>
  <!--tabCont1-->
  <div class="admin_tab_cont" style="display:block;" id="tab1">
    <section>
      <table class="table">
        <tr>
          <th>订单号</th>
          <th>住房名称</th>
          <th>用户昵称</th>
          <th>入住天数</th>
          <th>房费(元/天)</th>
          <th>金币抵扣(元)</th>
          <th>实付(元)</th>
          <th>入住时间</th>
          <th>下单(即付款)时间</th>
          <th>接单时间</th>
          <th>操作</th>
        </tr>
        <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><tr>
          <td><?php echo ($v["order_num"]); ?></td>
          <td><?php echo ($v["room_name"]); ?></td>
          <td><?php echo ($v["nickname"]); ?></td>
          <td><?php echo ($v["days"]); ?></td>
          <td><?php echo ($v["rental"]); ?></td>
          <td><?php echo ($v["gold_money"]); ?></td>
          <td><?php echo ($v["total_amount"]); ?></td>
          <td><?php echo (date("Y-m-d H:i:s",$v["service_time"])); ?></td>
          <td><?php echo (date("Y-m-d H:i:s",$v["pay_time"])); ?></td>
          <td><?php echo (date("Y-m-d H:i:s",$v["get_time"])); ?></td>
          <td>
          <a href="<?php echo U('Home/Goods/roomDetail');?>?room_id=<?php echo ($v["room_id"]); ?>" class="inner_btn1">住房详情</a>
          <a href="#" class="inner_btn"  onclick="receive(<?php echo ($v["order_id"]); ?>)">完成</a>
         <a href="#" class="inner_btn2" onclick="refund(<?php echo ($v["order_id"]); ?>)">退款</a>
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
$('#stay_order').addClass('active');

})
//完成，入住结束    
function receive(order_id){
  var url="<?php echo U('Admin/Order/receive');?>?order_id="+order_id+'&order_status=3';
    $.ajax({  
        type: "post",  
        url: url,  
        dataType: "json",  
        success: function(data){  
          if (data=='success') {
            alert('订单状态更改成功！');
            window.location.href="<?php echo U('Admin/Order/waitCheck');?>";
          }else{
            alert('订单状态更改失败！');
          }
        }  
      }); 
}
//退款
function refund(order_id){
  var content = window.prompt("请输入退款原因！","");
  if (content==='') {
    alert('请输入退款原因！');
    refund(order_id);
  }else if(content===null){
    return false;
  }else{
    var url="<?php echo U('Admin/Order/refund');?>?order_id="+order_id;
    $.ajax({  
        type: "post",  
        url: url,  
        data:{admin_note:content},
        dataType: "json",  
        success: function(data){  
          if (data=='success') {
            alert('订单状态更改成功！');
            window.location.href="<?php echo U('Admin/Order/waitCheck');?>";
          }else{
            alert('订单状态更改失败！');
          }
        }  
      }); 
  }
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