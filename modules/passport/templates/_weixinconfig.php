<?php 
// include_once JF_DIR_LIB.DIRECTORY_SEPARATOR.'FC'.DIRECTORY_SEPARATOR.'Plugin'.DIRECTORY_SEPARATOR.'jssdk.php';
// $weixinconfig = C('WeiXin');
// $jssdk = new JSSDK($weixinconfig['appId'], $weixinconfig['appSecret']);
$jssdk = FC\WeiXin::instance();
$signPackage = $jssdk->GetSignPackage();
?>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
wx.config({
	debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
	jsApiList: ['onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo','chooseImage','uploadImage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
});	
</script>
<div class="navigation_register hide" nav_url= "<?php echo empty($_SESSION['weixin']['headto'])?'/':$_SESSION['weixin']['headto'];?>"></div>
