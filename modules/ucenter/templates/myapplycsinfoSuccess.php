<!DOCTYPE html>
<html lang="en">
<head lang="en"><base href="http://fangcheng/ucenter/myapplycs">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
	<meta name="description" content="description">
	<meta name="keyword" content="keywords">
	<title>方橙-最专业的招商选址大数据平台</title>
	<link rel="shortcut icon" href="/img/favicon.ico">   <link rel="stylesheet" type="text/css" href="/css/vendors/jquery.mobile-1.4.5.min.css?v=1.4.1314">
	<link rel="stylesheet" type="text/css" href="/css/common.css?v=1.4.1314">
	<link rel="stylesheet" type="text/css" href="/css/detail.css?v=1.4.1314">
	<script src="//hm.baidu.com/hm.js?05eedf66785b488ebb6a03d996775c17"></script><script type="text/javascript" src="/js/vendors/jquery-1.9.1.min.js?v=1.4.1314"></script>
	<script type="text/javascript" src="/js/vendors/custom-scripting.js?v=1.4.1314"></script>
	<script type="text/javascript" src="/js/vendors/jquery.mobile-1.4.5.min.js?v=1.4.1314"></script>
	<script type="text/javascript" src="/js/util/common.js?v=1.4.1314"></script>
	<script type="text/javascript" src="/js/util/apiUtils.js?v=1.4.1314"></script>
	<script type="text/javascript" src="/js/com.js?v=1.4.1314"></script>
</head>
<body>
<?php if(!empty($result)){?>
	<?php foreach($result as $key => $val){?>
		<?php var_dump($val);exit();?>

<div class="contain">
	<header data-scroll-down="" data-scroll-top="53px" data-role="header" data-theme="b" class="header ui-header ui-bar-b" role="banner">
		<a href="javascript:location.href='/ucenter/informationofmine'" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back ui-link ui-btn-left ui-btn ui-corner-all" role="button">我的</a>
		<h1 class="ui-title" role="heading" aria-level="1">申请的悬赏</h1>
	</header>
	<div data-role="content" class="detail_content gray_bg" style="margin-bottom:20px;">
		<div class="pc_offer_detail pc_main_w overflow myapplycs">
			<div class="offer_detail_top margin-top-20 margin-bottom-20 bgfff posr" style="padding:10px 10px;">
				<div class="need_item_top layout">
					<div class="face40">
						<img alt="" src="/img/detail/logo_big.png">
					</div>
					<div class="flex layout-column margin-left-10 need_item_top_right">
						<div class="obj-name font-size-16">
							<span class="gray333 nowrap" style="width:50%">招商：<span class="orange"><?php echo $val['brand_name']; ?></span></span>
						</div>
						<div>
							<div class="gray999"><span class="cd8992c" style="font-size: 16px;">￥3000</span><span class="cd8992c font-size-12">/悬赏金</span>
							</div>
							<div class="gray999 honorarium posa" style="right:0">
							</div>
						</div>
						<div class="obj_info_msg font-size-12">
							<span class="gray999">招商城市：北京</span>
						</div>
					</div>
				</div>

				<div class="obj-info need-obj-info font-size-14">
					<div class="layout need-wrapper-item">
						<div class="obj-tag-cs gray999">需求业态：</div>
						<div class=" obj-tags-width flex layout-column ">
							<p class="nowrap" style="margin:0">购物、亲子儿童、教育培训、休闲娱乐、生活服务、美妆丽人、酒店公寓、百货超市、其他</p>
						</div>
					</div>
					<div class="layout need-wrapper-item">
						<div class="obj-tag-cs gray999">店铺面积：</div>
						<div>30㎡-32㎡
						</div>
					</div>
					<div class="layout need-wrapper-item">
						<div class="obj-tag-cs gray999">发布日期：</div>
						<div>2016-04-19</div>
					</div>
					<div class="layout need-wrapper-item">
						<div class="obj-tag-cs gray999">预约看场：</div>
						<div>2016-04-27</div>
					</div>
				</div>
				<!--<a href="#" class="btn ui-link btn_full_disable text-center">已完成</a>-->
				<img src="/img/bookmarkgrey2.png" class="posa" style="width:68px;top:0;right:0;">
			</div>

			<div class="bgfff csway">
				<nav class="tabs bgff">
					<ul class="tab-list">
						<li class="current">我申请的</li>
						<li>我分享的</li>
					</ul>
					<div class="shadow"></div>
				</nav>
				<?php var_dump($val['apply']);exit();?>
				<?php foreach ($val['apply'] as $h=>$j) {

					$url = '';
					if (!empty($j['mall_id'])) {
						$url = "href=\"/details/mall/mall_id/{$j['mall_id']}\"";
					} else if (!empty($val['brand_id'])) {
						$url = "href=\"/details/brand/brand_id/{$j['brand_id']}\"";
					}
					?>
					<div class="mycontain" style="border-bottom:1px solid #e4e4e4;padding: 20px 10px 10px;">
						<div class="offer_detail_top_info cl layout">
							<div class="face40">
								<a href="javascript:void(0)" class="detail_offer_face ui-link"><img
										src="/img/detail/logo_big.png" onerror="this.src='/img/detail/logo_big.png'"
										width="80" height="80"></a>
							</div>
							<div class="flex info layout-column margin-left-10">
								<p class="posr" style="margin:0;"><a style="display:inline-block;width:65%;"
																	 class="ui-link"><span
											class="gray333">Aperitivo意式餐吧</span></a><span class="state"
																						  style="position: absolute;text-align: center;">待处理</span>
								</p>
								<p style="margin:0;" class="font-size-12 gray999"></p>
							</div>
						</div>
						<div class="info gray999">
							<p style="margin:10px 0 0;" class="font-size-12">预约看场：<span
									class="gray333">2016-05-13 </span></p>
							<div class="flex layout layout-align-start-center font-size-12 posr">
								<span><p style="margin:0;">联系人：<span class="gray333">1</span></p></span>&nbsp;&nbsp;
								<p class="nowrap2 font-size-12" style="margin:0;position: absolute;top:0;right:0;">申请时间：<span
										class="gray333">2016-05-13</span></p>
							</div>
						</div>
					</div>
					<?php
				}
				?>
				<!--我分享的-->
				<div class="mycontain hide1">
					分享的
				</div>
				<!-- 没有数据 start -->

				<!-- 没有数据 end -->
			</div>
		</div>
	</div>
</div>
		<?php } ?>
<?php } ?>
<div data-role="footer" class="ui-footer ui-bar-inherit" style="height:60px;opacity:1 !important;background:#fff;position: fixed;bottom:0;left:0;width:100%;z-index:100;" role="contentinfo">
	<div class="btn_box font-size-14 detail-container" style="height:40px;line-height:40px;margin-top:10px">
		<a href="javascript:;" class="fl btn btn_default text-center  ui-link" style="display:inline-block;width:48%;box-sizing:border-box;">分享</a>
		<a id="apply" class="btn btn_full_able text-center fr ui-link" style="display:inline-block;width:48%;box-sizing:border-box;">立即申请</a>
	</div>
</div>


</body>
</html>
<script>
	commonUtilInstance.tab(".tab-list",".csway","current");
</script>

<!DOCTYPE html>
<html lang="en">
<head lang="en"><base href="http://fangcheng/ucenter/myapplycs">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
	<meta name="description" content="description">
	<meta name="keyword" content="keywords">
	<title>方橙-最专业的招商选址大数据平台</title>
	<link rel="shortcut icon" href="/img/favicon.ico">   <link rel="stylesheet" type="text/css" href="/css/vendors/jquery.mobile-1.4.5.min.css?v=1.4.1314">
	<link rel="stylesheet" type="text/css" href="/css/common.css?v=1.4.1314">
	<link rel="stylesheet" type="text/css" href="/css/detail.css?v=1.4.1314">
	<script src="//hm.baidu.com/hm.js?05eedf66785b488ebb6a03d996775c17"></script><script type="text/javascript" src="/js/vendors/jquery-1.9.1.min.js?v=1.4.1314"></script>
	<script type="text/javascript" src="/js/vendors/custom-scripting.js?v=1.4.1314"></script>
	<script type="text/javascript" src="/js/vendors/jquery.mobile-1.4.5.min.js?v=1.4.1314"></script>
	<script type="text/javascript" src="/js/util/common.js?v=1.4.1314"></script>
	<script type="text/javascript" src="/js/util/apiUtils.js?v=1.4.1314"></script>
	<script type="text/javascript" src="/js/com.js?v=1.4.1314"></script>
</head>
<body>
<div class="contain">
	<header data-scroll-down="" data-scroll-top="53px" data-role="header" data-theme="b" class="header ui-header ui-bar-b" role="banner">
		<a href="javascript:location.href='/ucenter/informationofmine'" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back ui-link ui-btn-left ui-btn ui-corner-all" role="button">我的</a>
		<h1 class="ui-title" role="heading" aria-level="1">申请的悬赏</h1>
	</header>
	<div data-role="content" class="detail_content gray_bg" style="margin-bottom:20px;">
		<div class="pc_offer_detail pc_main_w overflow myapplycs">
			<div class="offer_detail_top margin-top-20 margin-bottom-20 bgfff posr" style="padding:10px 10px;">
				<div class="need_item_top layout">
					<div class="face40">
						<img alt="" src="/img/detail/logo_big.png">
					</div>
					<div class="flex layout-column margin-left-10 need_item_top_right">
						<div class="obj-name font-size-16">
							<span class="gray333 nowrap" style="width:50%">招商：<span class="orange">21世纪太阳城</span></span>
						</div>
						<div>
							<div class="gray999"><span class="cd8992c" style="font-size: 16px;">￥3000</span><span class="cd8992c font-size-12">/悬赏金</span>
							</div>
							<div class="gray999 honorarium posa" style="right:0">
							</div>
						</div>
						<div class="obj_info_msg font-size-12">
							<span class="gray999">招商城市：北京</span>
						</div>
					</div>
				</div>

				<div class="obj-info need-obj-info font-size-14">
					<div class="layout need-wrapper-item">
						<div class="obj-tag-cs gray999"><?php if($val['demand_type'] == 2){ ?> 需求<?php }else{ ?><?php } ?>业态：</div>
						<div class=" obj-tags-width flex layout-column ">
							<p class="nowrap" style="margin:0"><?php echo $val[''];?></p>
						</div>
					</div>
					<div class="layout need-wrapper-item">
						<div class="obj-tag-cs gray999"><?php if($val['demand_type'] == 2){ ?>店铺<?php }else{ ?>面积：<?php }?></div>
						<div><?php echo $val['']?>㎡-32㎡
						</div>
					</div>
					<div class="layout need-wrapper-item">
						<div class="obj-tag-cs gray999"><?php if($val['demand_type'] == 2){ ?>发布<?php }else{ ?><?php }?>日期：</div>
						<div><?php echo $val['demand_ctime'];?></div>
					</div>
					<div class="layout need-wrapper-item">
						<div class="obj-tag-cs gray999">预约看场：</div>
						<div><?php echo $val['demand_utime'];?></div>
					</div>
				</div>
				<!--<a href="#" class="btn ui-link btn_full_disable text-center">已完成</a>-->
				<img src="/img/bookmarkgrey2.png" class="posa" style="width:68px;top:0;right:0;">
			</div>

			<div class="bgfff csway">
				<nav class="tabs bgff">
					<ul class="tab-list">
						<li class="current">我申请的</li>
						<li>我分享的</li>
					</ul>
					<div class="shadow"></div>
				</nav>
				<!--我申请的-->
				<?php  if(count($val['apply'])  > 0) {?>

				<div class="mycontain" style="border-bottom:1px solid #e4e4e4;padding: 20px 10px 10px;">
					<div class="offer_detail_top_info cl layout">
						<div class="face40">
							<a href="javascript:void(0)" class="detail_offer_face ui-link"><img src="/img/detail/logo_big.png" onerror="this.src='/img/detail/logo_big.png'" width="80" height="80"></a>
						</div>
						<div class="flex info layout-column margin-left-10">
							<p class="posr" style="margin:0;"><a style="display:inline-block;width:65%;" class="ui-link"><span class="gray333">Aperitivo意式餐吧</span></a><span class="state" style="position: absolute;text-align: center;">待处理</span></p>
							<p style="margin:0;" class="font-size-12 gray999"></p>
						</div>
					</div>
					<div class="info gray999">
						<p style="margin:10px 0 0;" class="font-size-12">预约看场：<span class="gray333">2016-05-13 </span></p>
						<div class="flex layout layout-align-start-center font-size-12 posr">
							<span><p style="margin:0;">联系人：<span class="gray333">1</span></p></span>&nbsp;&nbsp;
							<p class="nowrap2 font-size-12" style="margin:0;position: absolute;top:0;right:0;">申请时间：<span class="gray333">2016-05-13</span></p>
						</div>
					</div>
				</div>
				<!--我分享的-->
				<div class="mycontain hide1">
					分享的
				</div>
				<!-- 没有数据 start -->

				<!-- 没有数据 end -->
			</div>
		</div>
	</div>
</div>

<div data-role="footer" class="ui-footer ui-bar-inherit" style="height:60px;opacity:1 !important;background:#fff;position: fixed;bottom:0;left:0;width:100%;z-index:100;" role="contentinfo">
	<div class="btn_box font-size-14 detail-container" style="height:40px;line-height:40px;margin-top:10px">
		<a href="javascript:;" class="fl btn btn_default text-center  ui-link" style="display:inline-block;width:48%;box-sizing:border-box;">分享</a>
		<a id="apply" class="btn btn_full_able text-center fr ui-link" style="display:inline-block;width:48%;box-sizing:border-box;">立即申请</a>
	</div>
</div>


</body>
</html>
<script>
	commonUtilInstance.tab(".tab-list",".csway","current");
</script>

<div class="contain">
	<header data-scroll-down="" data-scroll-top="53px" data-role="header" data-theme="b" class="header ui-header ui-bar-b" role="banner">
		<a href="javascript:location.href='/ucenter/informationofmine'" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back ui-link ui-btn-left ui-btn ui-corner-all" role="button">我的</a>
		<h1 class="ui-title" role="heading" aria-level="1">申请的悬赏</h1>
	</header>
	<div data-role="content" class="detail_content gray_bg" style="margin-bottom:20px;">
		<div class="pc_offer_detail pc_main_w overflow myapplycs">
			<?php if (!empty($result)){?>
				<?php foreach($result as $key => $val){?>
					<div  class="offer_detail_top margin-top-20  bgfff posr" style="border-bottom:1px solid #e4e4e4;padding:10px 10px;">
						<ul>
							<li onclick="javascript:location.href='/cs/csinfo/csid/<?php echo $val['demand_id']; ?>'" class="cl">
								<div class="need_item_top layout">
									<div class="face40">
										<img alt="" src="/img/detail/logo_big.png">
									</div>
									<div class="flex layout-column margin-left-10 need_item_top_right">
										<div class="obj-name font-size-16">
											<span class="gray333 nowrap" style="width:50%"><?php if($val['demand_type'] == 2){ ?>招商：<?php }else{?>拓展：<?php } ?><span class="orange"><?php  echo $val['demandInfo']['cs_name'];?></span></span>
										</div>
										<div >
											<div class="gray999"><span class="cd8992c" style="font-size: 16px;">￥<?php echo $val['demandInfo']['money_task'];?></span><span class="cd8992c font-size-12">/悬赏金</span>
											</div>
											<div class="gray999 honorarium posa" style="right:0">
											</div>
										</div>
										<div class="obj_info_msg font-size-12">
											<span class="gray999"><?php if($val['demand_type'] == 2){ ?>招商<?php }else{?>拓展<?php } ?>城市：北京</span>
										</div>
									</div>
								</div>

								<div class="obj-info need-obj-info font-size-14">
									<div class="layout need-wrapper-item">
										<div class="obj-tag-cs gray999"><?php if($val['demand_type'] == 2){ ?>需求业态：<?php }else{?>所属业态：<?php } ?></div>
										<div class=" obj-tags-width flex layout-column ">
											<p class="nowrap" style="margin:0"><?php echo $val['demandInfo']['category_str'];?></p>
										</div>
									</div>
									<div class="layout need-wrapper-item">
										<div class="obj-tag-cs gray999"><?php if($val['demand_type'] == 2){ ?>店铺面积：<?php }else{?>面积需求：<?php } ?></div>
										<div><?php echo $val['demandInfo']['min_size'];?>㎡-<?php echo $val['demandInfo']['max_size'];?>㎡
										</div>
									</div>
									<div class="layout need-wrapper-item">
										<div class="obj-tag-cs gray999">发布日期：</div>
										<div><?php echo substr($val['csInfo']['demand_ctime'], 0, 10);?></div>
									</div>
									<div class="layout need-wrapper-item">
										<div class="obj-tag-cs gray999">预约看场：</div>
										<div><?php echo substr($val['cs_passportInfo']['cs_passport_ctime'], 0, 10);?></div>
									</div>
								</div>

							</li>
						</ul>
						<!--<a href="#" class="btn ui-link btn_full_disable text-center">已完成</a>-->
						<?php if (0 && $val['csInfo']['cs']['win']['passport_id'] > 0) { ?>
							<img src="/img/bookmarkgrey.png" class="posa" style="width:68px;top:0;right:0;">
						<?php } else { ?>
							<?php if (strtotime($val['csInfo']['cs']['expire_at'] )> strtotime("-1 day") ) {
								if ($val['csInfo']['cs']['status'] == 1 && $val['csInfo']['cs']['result'] == 1) {
									?>
									<img src="/img/bookmarkgold.png" class="posa" style="width:68px;top:0;right:0;">
									<div class="posa" style="bottom:10px;right:10px;">
										<img src="/img/share.png" alt="" width="14" height="12" style="vertical-align: middle;"> <span class="orange font-size-12">推荐</span>
									</div>
								<?php } elseif (($val['csInfo']['cs']['status'] == 1 && $val['csInfo']['cs']['result'] == 2)) {
									?>
									<img src="/img/bookmarkgrey2.png" class="posa" style="width:68px;top:0;right:0;">
								<?php } elseif (($val['csInfo']['cs']['status'] == 1 && $val['csInfo']['cs']['result'] == 3)) {
									?>
									<img src="/img/bookmarkgrey.png" class="posa" style="width:68px;top:0;right:0;">
								<?php }
							}else{
								?>
								<img src="/img/bookmarkgrey2.png" class="posa" style="width:68px;top:0;right:0;">
							<?php } ?>
							<?php
						}
						?>
					</div>
							<!-- 没有数据 start -->

							<!-- 没有数据 end -->
						</div>
					<?php } ?>
				<?php }?>
			<?php }else{?>
				<div class="bgfff" style="border:1px solid #e4e4e4;border-top: none;padding: 20px;">
					<p style="margin: 0;text-align: center;font-size: 14px;color: #999;">目前还没有申请的悬赏，点击查看<a href="/cs/list" style="color:#efbd59 !important;text-decoration: underline;" class="ui-link">更多悬赏</a></p>
				</div>
			<?php }?>
		</div>
	</div>
	<script type="text/javascript">
		$(function(){
			$('.offer_detail_top>.offer_btn>.btn_default:eq(0)').after(imgPic);
			function imgPic(){
				var imgEle='<img src="/xsimg/xsone.png" class="posa" style="left:-22px">';
				return imgEle;
			}

			$('.offer_detail_top:eq(0)').removeClass("margin-top-20");
		})
	</script>
	<?php __slot('passport','footer');?>
</div>

