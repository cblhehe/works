<?php
if ($_SERVER['HTTP_HOST']=='localhost') {
	header('location:http://localhost/sy/index.php/Admin/Index/index');
}else{
	header('location:http://test5.angkebrand/index.php/Admin/Index/index');
}
