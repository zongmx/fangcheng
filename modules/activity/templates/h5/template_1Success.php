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
<body>
<?php __slot('passport','weixinconfig');?>
	<input id="showFlag" type="hidden" value="<?php echo $show == 1?1:0?>" />
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<!-- slide1 -->
			<div class="swiper-slide slide1 posr">
				<div class="mod1_s1_tit posa ani" swiper-animate-effect="bounceIn" swiper-animate-duration="1s">
					<h1><?php echo $info['brand_name'];?></h1>
					<p>-<?php echo $info['introduction'];?>-</p>
				</div>
				<img src="/img/h5/s1_img1.png" class="s1_img1 ani posa" swiper-animate-effect="fadeIn" swiper-animate-duration="1s" swiper-animate-delay="0.5s">
				<div class="bot_tip s1_img2 ani posa" swiper-animate-effect="fadeInDown" swiper-animate-delay="1s">招商选址用方橙</div>
				<div href="javascript:;" class="arrow posa"><img src="/img/h5/arrow.png"></div>
			</div>
			<!-- slide2 -->
			<div class="swiper-slide slide2">
				<div class="s2_box posa">
					<img src="/img/h5/s2_img1.png" class="s2_img1 s2_item1 ani posa" swiper-animate-effect="bounceInDown">
					<img src="/img/h5/s2_img2.png" class="s2_img2 s2_item1 ani posa" swiper-animate-effect="bounceInDown">
					<img src="/img/h5/s2_img3.png" class="s2_img3 s2_item1 ani posa" swiper-animate-effect="bounceInDown">
					<img src="/img/h5/s2_img4.png" class="s2_img4 s2_item1 ani posa" swiper-animate-effect="bounceInDown">
					<img src="/img/h5/s2_img5.png" class="s2_img5 s2_item1 ani posa" swiper-animate-effect="bounceInDown">
					<img src="/img/h5/s2_img6.png" class="s2_img6 ani posa" swiper-animate-effect="bounceIn" swiper-animate-delay="1.1s">
					<span class="s2_img61 ani posa mod1_s2_tag" swiper-animate-effect="fadeIn" swiper-animate-delay="1s"><?php echo $info['category_str'];?></span>
					<img src="/img/h5/s2_img7.png" class="s2_img7 ani posa" swiper-animate-effect="bounceIn" swiper-animate-delay="1.4s">
					<span class="s2_img71 ani posa mod1_s2_tag" swiper-animate-effect="fadeIn" swiper-animate-delay="1.3s"><?php echo $info['group_17'];?>客群</span>
					<img src="/img/h5/s2_img8.png" class="s2_img8 ani posa" swiper-animate-effect="bounceIn" swiper-animate-delay="1.7s">
					<span class="s2_img81 ani posa mod1_s2_tag" swiper-animate-effect="fadeIn" swiper-animate-delay="1.6s">客单价￥<?php echo $info['group_15'];?></span>
					<img src="/img/h5/s2_img9.png" class="s2_img9 ani posa" swiper-animate-effect="bounceIn" swiper-animate-delay="2s">
					<span class="s2_img91 ani posa mod1_s2_tag" swiper-animate-effect="fadeIn" swiper-animate-delay="1.9s"><?php echo $info['forceProduct'];?></span>
					<img src="/img/h5/s2_img10.png" class="s2_img10 ani posa" swiper-animate-effect="bounceIn" swiper-animate-delay="2.3s">
					<span class="s2_img101 ani posa mod1_s2_tag" swiper-animate-effect="fadeIn" swiper-animate-delay="2.4s"><?php echo $info['group_12'];?></span>
				</div>

				<div class="bot_tip s1_img2 ani posa" swiper-animate-effect="fadeInDown" swiper-animate-delay="1s">招商选址用方橙</div>
				<div href="javascript:;" class="arrow posa"><img src="/img/h5/arrow.png"></div>
			</div> 
			<!-- slide3 -->
			<div class="swiper-slide slide3">
				<img src="<?php echo $shareInfo['logo'];?>" class="s3_img1 ani posa" swiper-animate-effect="fadeIn">
				<div class="s3_box posa">
					<img src="/img/h5/s3_img2.png" class="s3_img2 ani posa" swiper-animate-effect="bounceInDown">
					<span class="s3_img21 ani posa mod1_s3_tag" swiper-animate-effect="fadeIn" swiper-animate-delay="0.1s"><?php echo $info['tag'][1];?></span>
					<img src="/img/h5/s3_img3.png" class="s3_img3 ani posa" swiper-animate-effect="bounceInDown" swiper-animate-delay="0.5s">
					<span class="s3_img31 ani posa mod1_s3_tag" swiper-animate-effect="fadeIn" swiper-animate-delay="0.6s"><?php echo $info['tag'][2];?></span>
					<img src="/img/h5/s3_img4.png" class="s3_img4 ani posa" swiper-animate-effect="bounceInDown" swiper-animate-delay="1s">
					<span class="s3_img41 ani posa mod1_s3_tag" swiper-animate-effect="fadeIn" swiper-animate-delay="1.2s"><?php echo $info['tag'][3];?></span>
					<img src="/img/h5/s3_img5.png" class="s3_img5 ani posa" swiper-animate-effect="bounceInDown" swiper-animate-delay="1.5s">
					<span class="s3_img51 ani posa mod1_s3_tag" swiper-animate-effect="fadeIn" swiper-animate-delay="1.7s"><?php echo $info['tag'][4];?></span>
					<img src="/img/h5/s3_img6.png" class="s3_img6 ani posa" swiper-animate-effect="bounceInDown" swiper-animate-delay="2s">
					<span class="s3_img61 ani posa mod1_s3_tag" swiper-animate-effect="fadeIn" swiper-animate-delay="2.2s"><?php echo $info['tag'][5];?></span>
				</div>
				<div class="bot_tip s1_img2 ani posa" swiper-animate-effect="fadeInDown" swiper-animate-delay="1s">招商选址用方橙</div>
				<div href="javascript:;" class="arrow posa"><img src="/img/h5/arrow.png"></div>
			</div> 
			<!-- slide4 -->
			<div class="swiper-slide slide4">
				<img src="/img/h5/s4_img1.png" class="s4_img1 ani posa" swiper-animate-effect="fadeIn">
				<div class="items posa">
					<img src="/img/h5/icon_1.png" class="s4_item1_icon s4_item ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
					<div class="s4_item_info s4i1 ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
						<h4>拓展城市</h4>
						<p class="nowrap2"><?php echo $info['bdCity'];?></p>
					</div>
					<img src="/img/h5/icon_4.png" class="s4_item2_icon s4_item ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
					<div class="s4_item_info s4i2 ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
						<h4>首选物业</h4>
						<p class=""><?php echo $info['group_36_str']; ?></p>
					</div>
					
					<img src="/img/h5/icon_2.png" class="s4_item3_icon s4_item ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
					<div class="s4_item_info s4i3 ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
						<h4>面积需求</h4>
						<p class="nowrap2"><?php echo $info['group_41_str']; ?></p>
					</div>

					<img src="/img/h5/icon_6.png" class="s4_item4_icon s4_item ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
					<div class="s4_item_info s4i4 ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
						<h4>工程条件</h4>
						<p class="nowrap2"><?php echo $info['group_46_str']; ?></p>
					</div>

					<img src="/img/h5/icon_5.png" class="s4_item5_icon s4_item ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
					<div class="s4_item_info s4i5 ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
						<h4>期望年限</h4>
						<p class="nowrap2"><?php echo $info['group_40'];?>年</p>
					</div>

					<img src="/img/h5/icon_5.png" class="s4_item6_icon s4_item ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
					<div class="s4_item_info s4i6 ani posa" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
						<h4>发布日期</h4>
						<p class="nowrap2"><?php echo $h5Ctime;?></p>
					</div>

					<img src="/img/h5/icon_3.png" class="s4_item7_icon s4_item ani posa <?php echo empty($info['demand_desc'])?'hide':"";?>" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
					<div class="s4_item_info s4i7 ani posa <?php echo empty($info['demand_desc'])?'hide':"";?>" swiper-animate-effect="fadeIn" swiper-animate-delay="0.5s">
						<h4>特色</h4>
						<p class="nowrap2"><?php echo $info['demand_desc'];?></p>
					</div>

					<img src="/img/h5/s4_img13.png" class="s4_item7_tit3 ani posa" swiper-animate-effect="scaleTit" swiper-animate-delay="0.7s">
				</div>
				<div class="bot_tip s1_img2 ani posa" swiper-animate-effect="fadeInDown" swiper-animate-delay="1s">招商选址用方橙</div>
				<a href="javascript:;" class="arrow posa"><img src="/img/h5/arrow.png"></a>
			</div>
			<!-- slide5 -->
			<div class="swiper-slide slide5">
				<h2 class="s5_img1 ani posa" swiper-animate-effect="fadeInDown"><?php echo  $info['brand_name'];?></h2>
				<p class="ani posa s5_img2" swiper-animate-effect="fadeInDown"><?php echo $persioninfo['passport_name'];?>&nbsp;&nbsp;<?php echo $persioninfo['passport_job_title'];?></p>
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
				<p class="s5_img6 ani posa" swiper-animate-effect="fadeInUp" swiper-animate-delay="2s" style="font-size:12px;">长按二维码，上<span style="color: #c24c28;">方橙</span>看海量需求</p>
				<?php if ($type == 'view'){?>
				<a href="#" class="icon_btn icon_btn3 ani posa" swiper-animate-effect="bounceIn" swiper-animate-delay="2.5s">去方橙首页看看</a>
				<?php }else {?>
				<a href="/" class="icon_btn icon_btn3 ani posa" swiper-animate-effect="bounceIn" swiper-animate-delay="2.5s">去方橙首页看看</a>
				<?php }?>
			<!-- 				<img src="/img/h5/s5_img6.png" class="s5_img6 ani posa" swiper-animate-effect="fadeInUp" swiper-animate-delay="2s"> -->
				<div class="bot_tip s1_img2 ani posa" swiper-animate-effect="fadeInDown" swiper-animate-delay="2.5s">招商选址用方橙</div>
				
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
					<p id="formErrorDialog_content"  style="text-align: center;font-size:14px;">您的拓展需求H5页面已经发布成功！<br>快&nbsp;<span style="font-size: 18px;color:#333;">转发</span>&nbsp;给您的小伙伴吧。</p>
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
</body>
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
</html>