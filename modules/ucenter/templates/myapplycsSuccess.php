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
		    <li onclick="javascript:location.href='/ucenter/myapplycsinfo/csid/<?php echo $val['demand_id']; ?>'" class="cl">
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
		<?php  if(count($val['apply'])  > 0) {?>
		<div class="bgfff hide" style="">
<?php foreach ($val['apply'] as $h=>$j){

    $url = '';
    if(!empty($j['mall_id'])){
    	$url = "href=\"/details/mall/mall_id/{$j['mall_id']}\"";
    } else if(!empty($val['brand_id'])){
    	$url = "href=\"/details/brand/brand_id/{$j['brand_id']}\"";
    }
?>
<div style="border-bottom:1px solid #e4e4e4;padding: 20px;background:#f8f8f8;">
					<div class="offer_detail_top_info cl layout">
						<div class="face40">
							<a href="javascript:void(0)" class="detail_offer_face ui-link"><img src="<?php if(!empty($j['brand_id'])){ getLogoimage(['brand_id'=>$j['brand_id']], 'src',true);}elseif(!empty($j['mall_id'])){ getLogoimage(['mall_id'=>$j['mall_id']],'src',true);}?>" onerror="this.src='/img/detail/logo_big.png'" width="80" height="80"></a>
						</div>
						<div class="flex info layout-column margin-left-10">
							<p class="posr" style="margin:0;"><a {url} style="display:inline-block;width:65%;"><span class="gray333"><?php echo empty($j['mall_name'])?$j['brand_name']:$j['mall_name'];?></span></a><span class="state" style="position: absolute;text-align: center;"><?php echo $j['zhuangtai'];?></span></p>
						    <p style="margin:0;" class="font-size-12 gray999"><?php if(!empty($j['area_name'])){?>所在城市：<?php echo $j['area_name'];?><?php } ?></p>
						</div>
					</div>
					<div class="info gray999">
						<p style="margin:10px 0 0;" class="font-size-12">预约看场：<span class="gray333"><?php echo $j['cs_passport_apply_agree_at'];?></span></p>
						<div class="flex layout layout-align-start-center font-size-12 posr">
							<span><?php foreach ($j['u_name'] as $u => $v){?><p style="margin:0;">联系人：<span class="gray333"><?php echo $v;?></span></p><?php }?></span>&nbsp;&nbsp;
							<p class="nowrap2 font-size-12" style="margin:0;position: absolute;top:0;right:0;">申请时间：<span class="gray333"><?php echo substr($j['cs_passport_apply_ctime'],0,10);?></span></p>
						</div>
					</div>
				</div>
                <?php }?>
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


