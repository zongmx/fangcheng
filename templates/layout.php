<!DOCTYPE html>
<html>
<head lang="en">
<link rel="shortcut icon" href="/img/favicon.png">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no"/>

   <?php __meta() ?>
   <?php __css() ?>
	<?php __js() ?>
</head>
<body>
<?php __slot('passport','weixinconfig');?>
{jfContent}
<!--背景设置-->
<div class="mask"></div>


<?php 
   $query = urlFor();
   $indexquery = \Frame\Util\UString::base64_encode($query);
?>
<?php if(!$_SESSION['userinfo']['passport_id'] && $query != '/dev.php/passport/loginjump/'){?>
<!-- <div class="fixed_login layout layout-align-center-center">
            <div class="btn_box flex">
                <a href="/passport/checklogin" class="btn btn_default layout layout-align-center-center"><span class="layout layout-align-center-center">注册</span></a>
            </div>
            <div class="btn_box flex margin-left-20">
                <a href="/passport/loginjump/jump/{indexquery}" class="btn add-need-btn layout layout-align-center-center"><span class="layout layout-align-center-center">登录</span></a>
            </div>
</div> -->
<?php }?>
</body>
</html>