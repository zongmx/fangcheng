<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $info['brand_name'];?></title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'/>
	<link rel="stylesheet" type="text/css" href="/css/common.css?v=<?php echo C('VERSION');?>">
	<link rel="stylesheet" type="text/css" href="/css/h5/swiper.min.css?v=<?php echo C('VERSION');?>">
	<link rel="stylesheet" type="text/css" href="/css/h5/animate.css?v=<?php echo C('VERSION');?>">
	<link rel="stylesheet" type="text/css" href="/css/h5/css.css?v=<?php echo C('VERSION');?>">
    <link rel="stylesheet" type="text/css" href="/css/detail.css?v=<?php echo C('VERSION');?>">
    <link rel="stylesheet" type="text/css" href="/css/form.css?v=<?php echo C('VERSION');?>">
	<script type="text/javascript" src="/js/h5/swiper.min.js?v=<?php echo C('VERSION');?>"></script>
	<script src="/js/h5/swiper.animate.min.js?v=<?php echo C('VERSION');?>"></script>
	<script src="/js/vendors/jquery-1.9.1.min.js?v=<?php echo C('VERSION');?>"></script>
	<script src="/js/util/common.js?v=<?php echo C('VERSION');?>"></script>
	<script src="/js/com.js?v=<?php echo C('VERSION');?>"></script>
</head>
<body class="mob2">
<?php __slot('passport','weixinconfig');?>
<input id="showFlag" type="hidden" value="<?php echo $show == 1?1:0?>" />
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<!-- slide1 -->
			 <div class="swiper-slide p2Slide1 posr">
				<img src="<?php echo $logo['brand_xc_logo'];?>" class="posa ani p2s1_banner" swiper-animate-effect="fadeIn">
				<span class="posa ani p2si_banner_bot" swiper-animate-effect="fadeInUp" swiper-animate-duration="1s"></span>
				<div class="p2s1_logo posa ani" swiper-animate-effect="bounceIn" swiper-animate-duration="1s" swiper-animate-delay="0.5s"><img src="<?php echo $logo['brand_logo'];?>" width="150" height="150"></div>
				<span class="posa mob2_tog ani" swiper-animate-effect="fadeInUp" swiper-animate-delay="1s">拓店需求</span>
				<div class="p2s1_tit posa ani" swiper-animate-effect="fadeInUp" swiper-animate-delay="1s">
					<h1><?php echo $info['brand_name'];?></h1>
					<p>-<?php echo $info['introduction'];?>-</p>
				</div>
				<div class="bot_tip s1_img2 ani posa" swiper-animate-effect="fadeInDown" swiper-animate-delay="1s">招商选址用方橙</div>
				<div href="javascript:;" class="arrow posa"><img src="/img/h5/arrow.png"></div>
			</div>
			<!-- slide2 -->
			 <div class="swiper-slide p2Slide2 posr" style="background:url(<?php echo $logo['brand_shop_logo'];?>) no-repeat center center;background-size:cover;">
				<img src="/img/h5/p2/deco_line1.png" class="posa ani p2s2_line1" swiper-animate-effect="fadeInLeftBig">
				<img src="/img/h5/p2/deco_line2.png" class="posa ani p2s2_line2" class="posa ani p2s2_line1" swiper-animate-effect="fadeInLeftBig">
				<img src="/img/h5/p2/deco_line3.png" class="posa ani p2s2_line3" swiper-animate-effect="fadeInUp" swiper-animate-delay="1s">
				<p class="posa ani p2s2_tit" swiper-animate-effect="fadeInUp" swiper-animate-duration="1s">.我是好牌品牌特色.</p>
				<div class="posa ani p2s2_tag">
					<ul class="cl">
						<li class="ani" swiper-animate-effect="bounceIn" swiper-animate-delay="1s" swiper-animate-duration="1s"><?php echo $info['category_str'];?></li>
						<li class="ani" swiper-animate-effect="bounceIn" swiper-animate-delay="1.2s" swiper-animate-duration="1s"><?php echo $info['group_17'];?>群体</li>
						<li class="ani" swiper-animate-effect="bounceIn" swiper-animate-delay="1.4s" swiper-animate-duration="1s">客单价￥<?php echo $info['group_15'];?></li>
						<li class="ani" swiper-animate-effect="bounceIn" swiper-animate-delay="1.6s" swiper-animate-duration="1s"><?php echo $info['forceProduct'];?></li>
						<li class="ani" swiper-animate-effect="bounceIn" swiper-animate-delay="1.8s" swiper-animate-duration="1s"><?php echo $info['group_12'];?>定位</li>
					</ul>
				</div>
				<div class="bot_tip s1_img2 ani posa" swiper-animate-effect="fadeInDown" swiper-animate-delay="1s">招商选址用方橙</div>
				<div href="javascript:;" class="arrow posa"><img src="/img/h5/arrow.png"></div>
			</div>
			<!-- slide3 -->
			 <div class="swiper-slide p2Slide3 posr" style="background:url(<?php echo $logo['brand_product_logo'];?>) no-repeat center center;background-size:cover;"">
				<img src="/img/h5/p2/deco_line1.png" class="posa ani p2s2_line1" swiper-animate-effect="fadeInLeftBig">
				<img src="/img/h5/p2/deco3_line2.png" class="posa ani p2s3_line2" swiper-animate-effect="fadeInLeftBig">
				<p class="posa ani p2s3_tit" swiper-animate-effect="fadeInUp" swiper-animate-duration="1s">.我是好牌产品特色.</p>
				<div class="p2s3_box posa ani" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
					<div class="table">
						<div class="table_cell">
							<p class="ani" swiper-animate-effect="lightSpeedIn" swiper-animate-delay="1s" swiper-animate-duration="0.5s"><?php echo $info['tag'][1];?></p>
							<p class="ani" swiper-animate-effect="lightSpeedIn" swiper-animate-delay="1.4s" swiper-animate-duration="0.5s"><?php echo $info['tag'][2];?></p>
							<p class="ani" swiper-animate-effect="lightSpeedIn" swiper-animate-delay="1.6s" swiper-animate-duration="0.5s"><?php echo $info['tag'][3];?></p>
							<p class="ani" swiper-animate-effect="lightSpeedIn" swiper-animate-delay="1.8s" swiper-animate-duration="0.5s"><?php echo $info['tag'][4];?></p>
							<p class="ani" swiper-animate-effect="lightSpeedIn" swiper-animate-delay="1.8s" swiper-animate-duration="0.5s"><?php echo $info['tag'][5];?></p>
						</div>
					</div>
				</div>
				<div class="bot_tip s1_img2 ani posa" swiper-animate-effect="fadeInDown" swiper-animate-delay="1s">招商选址用方橙</div>
				<div href="javascript:;" class="arrow posa"><img src="/img/h5/arrow.png"></div>
			</div>
			<!-- slide4 -->
			<div class="swiper-slide p2Slide4 posr">
				<div class="p2s4_top ani cl posa">
					<div class="left ani" swiper-animate-effect="fadeInLeft">
						<p class="nowrap2"><?php echo $info['brand_name'];?></p>
					</div>
					<h1 class="ani" swiper-animate-effect="bounceIn">拓店需求</h1>
					<div class="right ani" swiper-animate-effect="fadeInRight">
						<p class="nowrap2">方橙独家出品</p>
						<p class="nowrap2">好牌拓店</p>
					</div>
				</div>
                <img src="/img/h5/p2/stamp.png" class="p2s4_img1 ani posa" swiper-animate-effect="bounceInDown" swiper-animate-delay="0.5s"/>
                <img src="/img/h5/p2/bg_demand.png" class="p2s4_img2 ani posa" swiper-animate-effect="fadeIn"/>

                <div class="p2Slide4_info">
                	<div class="p2s4_item p2s41 ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
	                    <h4>拓展城市</h4>
	                    <p class="nowrap2"><?php echo $info['bdCity'];?></p>
	                </div>
	                <div class="p2s4_item p2s42 ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
	                    <h4>首选物业</h4>
	                    <p class="nowrap2"><?php echo $info['group_36_str']; ?></p>
	                </div>
	                <div class="p2s4_item p2s43 ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
	                    <h4>面积需求</h4>
	                    <p class="nowrap2"><?php echo $info['group_41_str']; ?></p>
	                </div>
	                <div class="p2s4_item p2s44 ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
	                    <h4>工程条件</h4>
	                    <p class="nowrap2"><?php echo $info['group_46_str']; ?></p>
	                </div>
	                <div class="p2s4_item p2s45 ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
	                    <h4>期望年限</h4>
	                    <p class="nowrap2"><?php echo $info['group_40'];?>年</p>
	                </div>
	                <div class="p2s4_item p2s46 ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
	                    <h4>发布日期</h4>
	                    <p class="nowrap2"><?php echo $h5Ctime;?></p>
	                </div>
	                <div class="p2s4_item p2s47 ani posa <?php echo empty($info['demand_desc'])?'hide':"";?>" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
	                    <h4>品牌特色</h4>
	                    <p class="nowrap4"><?php echo $info['demand_desc'];?></p>
	                </div>
                </div>
                <div class="bot_tip s1_img2 ani posa" swiper-animate-effect="fadeInDown" swiper-animate-delay="1s">招商选址用方橙</div>
                <div href="javascript:;" class="arrow posa"><img src="/img/h5/arrow.png"></div>
			</div>
			<div class="swiper-slide p2Slide5 posr">
                <h2 class="p2s5_img1 ani posa" swiper-animate-effect="fadeInDown"><?php echo  $info['brand_name'];?></h2>
                <p class="ani posa p2s5_img2" swiper-animate-effect="fadeInDown"><?php echo $persioninfo['passport_name'];?>&nbsp;&nbsp;<?php echo $persioninfo['passport_job_title'];?></p>
                <div class="btn_box posa">
				<?php if ($type == 'view'){?>
					<a href="#" class="icon_btn icon_btn1 ani" swiper-animate-effect="fadeInLeftBig" swiper-animate-delay="0.5s">马上联系</a>
					<a href="#" class="icon_btn icon_btn2 ani" swiper-animate-effect="fadeInRightBig" swiper-animate-delay="0.5s">我也要拓店</a>
				<?php }else {?>
					<a href="/letter/send/receiver_id/<?php echo $persioninfo['passport_id'];?>/" class="icon_btn icon_btn1 ani" swiper-animate-effect="fadeInLeftBig" swiper-animate-delay="0.5s">马上联系</a>
					<a href="/activity/htmltemplate" class="icon_btn icon_btn2 ani" swiper-animate-effect="fadeInRightBig" swiper-animate-delay="0.5s">我也要拓店</a>
				<?php }?>
				</div>
                <img src="/img/h5/s5_img5.png" class="s5_img5 ani posa" swiper-animate-effect="bounceIn" swiper-animate-delay="1s">
                <p class="s5_img6 ani posa" swiper-animate-effect="fadeInUp" swiper-animate-delay="2s" style="font-size: 12px;">长按二维码，上 <span style="color: #ffc247;">方橙</span>看海量需求</p>
				<?php if ($type == 'view'){?>
				<a href="#" class="icon_btn icon_btn3 ani posa" swiper-animate-effect="bounceIn" swiper-animate-delay="2.5s">去方橙首页看看</a>
				<?php }else {?>
				<a href="/" class="icon_btn icon_btn3 ani posa" swiper-animate-effect="bounceIn" swiper-animate-delay="2.5s">去方橙首页看看</a>
				<?php }?>
                <div class="bot_tip s1_img2 ani posa" swiper-animate-effect="fadeInDown" swiper-animate-delay="1s">招商选址用方橙</div>
			</div>
		</div>
	</div>
	<div id="successInfoDialog" role="dialog" class="modal fade myDodal">
		<div class="modal-backdrop fade on" style="height: 1716px;"></div>
		<div class="modal-dialog">
			<div class="modal-content formwrapper">
				<div class="modal-header">
					<button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
					<h4 id="myModalLabel" class="modal-title">发布成功</h4>
				</div>
				<div class="modal-body">
					<p id="formErrorDialog_content" style="text-align: center;font-size:14px;">您的拓展需求H5页面已经发布成功！<br>快&nbsp;<span style="font-size: 18px;color:#333;">转发</span>&nbsp;给您的小伙伴吧。</p>
					<div class="form-group clearfix margin-top-20 btn_box">
						<button type="button" class="btn btn_full_able close">好的</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	    <div class="hide" weixin-share-detail wxTitle="<?php echo $shareInfo['title'];?>" wxDesc="<?php echo  $shareInfo['desc'];?>" wxLink="<?php  echo $shareInfo['link'];?>" wxImgUrl="<?php  echo $shareInfo['logo'];?>" class="hide"></div>
    <script type='text/javascript'>
    	var weixinShareDetail = $('[weixin-share-detail]');
    	commonUtilInstance.forwardneed_weixin(weixinShareDetail.attr('wxTitle'),weixinShareDetail.attr('wxDesc'),weixinShareDetail.attr('wxLink'),weixinShareDetail.attr('wxImgUrl'));
        $(function() {
        	var flag = $('#showFlag').val();
        	if(flag == 1) {
        		showDialog('#successInfoDialog');
        	}
        });    
</script>
<script type="text/javascript">
scaleW=window.innerWidth/320;
scaleH=window.innerHeight/480;
var resizes = document.querySelectorAll('.resize');
for (var j=0; j<resizes.length; j++) {
	resizes[j].style.width=parseInt(resizes[j].style.width)*scaleW+'px';
	resizes[j].style.height=parseInt(resizes[j].style.height)*scaleH+'px';
	resizes[j].style.top=parseInt(resizes[j].style.top)*scaleH+'px';
	resizes[j].style.left=parseInt(resizes[j].style.left)*scaleW+'px'; 
}
var scales = document.querySelectorAll('.txt');
for (var i=0; i<scales.length; i++) {
	ss=scales[i].style;
	ss.webkitTransform = ss.MsTransform = ss.msTransform = ss.MozTransform = ss.OTransform =ss.transform='translateX('+scales[i].offsetWidth*(scaleW-1)/2+'px) translateY('+scales[i].offsetHeight*(scaleH-1)/2+'px)scaleX('+scaleW+') scaleY('+scaleH+') ';
}
var swiper = new Swiper('.swiper-container', {
    direction : 'vertical',
    pagination: '.swiper-pagination',
    mousewheelControl : true,
    onInit: function(swiper){
	    swiperAnimateCache(swiper);
	    swiperAnimate(swiper);
	},
	onSlideChangeEnd: function(swiper){
		swiperAnimate(swiper);
	}
 });
	  
</script>
</body>
</html>