
<div class="contain">
	<header data-scroll-down="" data-scroll-top="53px" data-role="header" data-theme="b" class="header ui-header ui-bar-b" role="banner">
		<a href="javascript:location.href='/ucenter/informationofmine'" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back ui-link ui-btn-left ui-btn ui-corner-all" role="button">我的</a>
		<h1 class="ui-title" role="heading" aria-level="1">申请的悬赏</h1>
	</header>
	<?php if(!empty($result)){?>
	<div data-role="content" class="detail_content gray_bg" style="margin-bottom:20px;min-height:512px;">
		<div class="pc_offer_detail pc_main_w overflow myapplycs">
			<div class="offer_detail_top margin-top-20 margin-bottom-20 bgfff posr" style="padding:10px 10px;">
				<div class="need_item_top layout">
					<div class="face40">
						<img alt="" src="/img/detail/logo_big.png">
					</div>
					<div class="flex layout-column margin-left-10 need_item_top_right">
						<div class="obj-name font-size-16">
							<span class="gray333 nowrap" style="width:50%"><?php if($result[0]['deamnd_type'] == 2){ ?>招商：<?php }else{ ?>拓展：<?php }?><span class="orange"><?php echo $result[0]['demandInfo']['cs_name']; ?></span></span>
						</div>
						<div>
							<div class="gray999"><span class="cd8992c" style="font-size: 16px;">￥<?php echo  $result[0]['cs']['money_traffic'];?></span><span class="cd8992c font-size-12">/悬赏金</span>
							</div>
							<div class="gray999 honorarium posa" style="right:0">
							</div>
						</div>
						<div class="obj_info_msg font-size-12">
							<span class="gray999">招商城市：<?php echo $result[0]['demandInfo']['cs_passport_city']; ?></span>
						</div>
					</div>
				</div>

				<div class="obj-info need-obj-info font-size-14">
					<div class="layout need-wrapper-item">
						<div class="obj-tag-cs gray999">需求业态：</div>
						<div class=" obj-tags-width flex layout-column ">
							<p class="nowrap" style="margin:0"><?php echo  $result[0]['demandInfo']['category_str']; ?><?php echo $result[0]['deamndInfo']['category_str'];?></p>
						</div>
					</div>
					<div class="layout need-wrapper-item">
						<div class="obj-tag-cs gray999">店铺面积：</div>
						<div><?php echo $result[0]['demandInfo']['max_size'];?>㎡-<?php echo $result[0]['demandInfo']['min_size'];?>㎡
						</div>
					</div>
					<div class="layout need-wrapper-item">
						<div class="obj-tag-cs gray999">发布日期：</div>
						<div><?php echo substr($result[0]['demand_ctime'],0,10);?></div>
					</div>
					<div class="layout need-wrapper-item">
						<div class="obj-tag-cs gray999">预约看场：</div>
						<div><?php echo substr($result[0]['demand_ctime'],0,10);   ?></div>
					</div>
				</div>
				<!--<a href="#" class="btn ui-link btn_full_disable text-center">已完成</a>-->
				<?php if (0 && $result[0]['csInfo']['cs']['win']['passport_id'] > 0) { ?>
					<img src="/img/bookmarkgrey.png" class="posa" style="width:68px;top:0;right:0;">
				<?php } else { ?>
					<?php if (strtotime($result[0]['csInfo']['cs']['expire_at'] )> strtotime("-1 day") ) {
						if ($result[0]['csInfo']['cs']['status'] == 1 && $result[0]['csInfo']['cs']['result'] == 1) {
							?>
							<img src="/img/bookmarkgold.png" class="posa" style="width:68px;top:0;right:0;">
							<?php if($result[0]['csInfo']['cs']['expire_at'] > strtotime('-1 day')){?>
								<img src="/img/bookmarkgold.png" class="posa" style="border-left: dashed;width: 68px;top: 0;right: 0;">
							<?php }?>
							<div class="posa" style="bottom:10px;right:10px;">
								<img src="/img/share.png" alt="" width="14" height="12" style="vertical-align: middle;"> <span class="orange font-size-12">推荐</span>
							</div>
						<?php } elseif (($result[0]['csInfo']['cs']['status'] == 1 && $result[0]['csInfo']['cs']['result'] == 2)) {
							?>
							<img src="/img/bookmarkgrey2.png" class="posa" style="width:68px;top:0;right:0;">
						<?php } elseif (($result[0]['csInfo']['cs']['status'] == 1 && $result[0]['csInfo']['cs']['result'] == 3)) {
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

			<div class="bgfff csway" style="margin-bottom:60px;">
				<nav class="tabs bgff">
					<ul class="tab-list">
						<li class="current" >我的申请</li>
						<li>我的分享</li>
					</ul>
					<div class="shadow"></div>
				</nav>
				<div class="mycontain">
				<?php if(!empty($result[0]['apply'])){ ?>
				<?php foreach ($result[0]['apply'] as $h=>$j) {
					$url = '';
					if (!empty($j['mall_id'])) {
						$url = "href=\"/details/mall/mall_id/{$j['mall_id']}\"";
					} else if (!empty($val['brand_id'])) {
						$url = "href=\"/details/brand/brand_id/{$j['brand_id']}\"";
					}
				//var_dump($j);
					?>
					<div style="border-bottom:1px solid #e4e4e4;padding: 20px 10px 10px;">
						<div class="offer_detail_top_info cl layout">
							<div class="face40">
								<a href="javascript:void(0)" class="detail_offer_face ui-link"><img src="<?php echo  $j['logo'];?>" onerror="this.src='/img/detail/logo_big.png'"
																									width="80" height="80"></a>
							</div>
							<div class="flex info layout-column margin-left-10">
								<p class="posr" style="margin:0;"><a style="display:inline-block;width:65%;"  class="ui-link"><span
											class="gray333"><?php if(!empty($j['brand_name'])){ echo $j['brand_name']; }elseif(!empty($j['mall_name'])){ echo $j['mall_name'];}?></span></a><span class="state"  style="position: absolute;text-align: center;"><?php echo $j['zhuangtai'];?></span>
								</p>
								<p style="margin:0;" class="font-size-12 gray999">所在城市：<?php if(!empty($j['area_name'])){ echo $j['area_name'];}?></p>
							</div>
						</div>
						<div class="info gray999">
							<p style="margin:10px 0 0;" class="font-size-12">预约看场：<span class="gray333"><?php echo substr($j['cs_passport_apply_ctime'], 0, 10);?></span></p>
							<div class="flex layout layout-align-start-center font-size-12 posr">
								<span><p style="margin:0;">联系人：<span class="gray333"><?php echo  $j['u_name'][0];?></span></p></span>&nbsp;&nbsp;
								<p class="nowrap2 font-size-12" style="margin:0;position: absolute;top:0;right:0;">申请时间：<span
										class="gray333"><?php echo $j['cs_passport_apply_agree_at']; ?></span></p>
							</div>
						</div>
					</div>
					<?php
				}
				?>
					<?php
				}
				else{?>
                  		<div class="bgfff" style="border:1px solid #e4e4e4;border-top: none;padding: 20px;">
                  		<p style="margin: 0;text-align: center;font-size: 14px;color: #999;">目前还没有申请的悬赏，点击查看<a href="/cs/list" style="color:#efbd59 !important;text-decoration: underline;" class="ui-link">更多悬赏</a></p>
                  		</div>
                  		<?php }?>
				</div>
				<!--我分享的-->
				<div class="mycontain hide1">
				    <!--我的分享没有信息时-->
					<div class="bgfff" style="border:1px solid #e4e4e4;border-top: none;padding: 20px;">
                        <p style="margin: 0;text-align: center;font-size: 14px;color: #999;">目前还没有分享的悬赏，点击查看<a href="/cs/list" style="color:#efbd59 !important;text-decoration: underline;" class="ui-link">更多悬赏</a></p>
                    </div>
				</div>
				<!-- 没有数据 start -->

				<!-- 没有数据 end -->
			</div>
		</div>
	</div>
	<?php } ?>
	<div data-role="footer" class="ui-footer ui-bar-inherit" style="height:60px;opacity:1 !important;background:#fff;position: fixed;bottom:0;left:0;width:100%;z-index:100;" role="contentinfo">
        <div class="btn_box font-size-14 detail-container" style="height:40px;line-height:40px;margin-top:10px">
            <a href="javascript:;" onclick='WeiXinShareBtn();' class="fl btn btn_default text-center  ui-link" style="display:inline-block;width:48%;box-sizing:border-box;">推荐</a>
            <a id="apply" href="/cs/csinvite/demand_type/<?php echo $result[0]['demand_type'];?>/demand_id/<?php echo $result[0]['_id'];?>" class="btn btn_full_able text-center fr ui-link" style="display:inline-block;width:48%;box-sizing:border-box;">立即申请</a>
        </div>
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

			tab('.tab-list','.csway','current');
			function tab(arg1,arg2,current){
				$(arg1).children("li").click(function(){
					if($(this).hasClass(current)){
						return false;
					}
					var _index = $(this).index();
					$(this).addClass(current).siblings("li").removeClass(current);
					$(arg2).children("div").eq(_index).show().siblings("div").hide();
				});
			}
		})
	</script>
</div>
<script type="text/javascript">

function WeiXinShareBtn(){
	commonUtilInstance.forwardneed_weixin('<?php echo $result[0]['demandInfo']['cs_name'];?>','','<?php echo C('WEB_URL')."/cs/csinfo/csid/".$result[0]['demandInfo']['demand_id']?>','<?php echo C('WEB_URL').$result[0]['demandInfo']['logo']?>');
}
</script>
