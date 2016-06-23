<?php if (empty($isdemand)){?>
                   <div class="detail_section_main detail_section_top_border font-size-14 text-center gray999">
	            	<p>该商业体没有发布需求</p>
	                <p>关注该商业体，有新需求后第一时间推送给你</p>
	            </div>
<?php }else {?>
<!--  -->
    <div class="detail_section_main detail_section_top_border">
        <div class="message_top layout flex">
            <div  class="face40"><img onclick="javascript:location.href='/ucenter/index/passport_id/<?php echo $demanduserinfo['demand_passport_id'];?>'" onerror="this.src='/img/detail/headdefault.png'"  src="<?php echo $demanduserinfo['demand_passport_picture'];?>"></div>
            <div class="message_info flex layout-column margin-left-10">
                <div class="layout">
                    <div class=layout>
                    	<span onclick="javascript:location.href='/ucenter/index/passport_id/<?php echo $demanduserinfo['demand_passport_id'];?>'" class="message_header_tit gray333 font-size-15"><?php echo $demanduserinfo['demand_passport_name'];?></span>
                        <?php if($mall_demand['result'][0]['demand_status'] == 2){?><span class="icon_btn icon_v"></span> <?php }?>
                        <?php if($mall_demand['result'][0]['demand_status'] != 2){?><span class="font-size-12 gray999 layout layout-align-start-center ">未认证</span> <?php }?>
                    </div>
                    <?php if (isset($_SESSION['userinfo']['passport_id'])){?>
                        <?php if ($_SESSION['userinfo']['passport_id'] != $demanduserinfo['demand_passport_id']){?>
                        <div class="flex layout layout-align-end-center font-size-14">
                            <a href="javascript:location.href='/letter/send/receiver_id/<?php echo $demanduserinfo['demand_passport_id'];?>/mall/{mall_id}'" class="layout layout-align-start-center <?php if($passport_in_blacklist){ echo 'hide';}?>" data-ajax="false"><i class="icon_btn icon_message"></i><div>发送私信</div></a>
                        </div>
                        <?php }?>
                    <?php }else {?>
                    <div id="login" class="flex layout layout-align-end-center font-size-14">
                        <a href="/letter/send/receiver_id/<?php echo $demanduserinfo['demand_passport_id'];?>/mall/{mall_id}" class="layout layout-align-start-center <?php if($passport_in_blacklist){ echo 'hide';}?>" data-ajax="false"><i class="icon_btn icon_message"></i><div>发送私信</div></a>
                    </div>
                    <?php }?>
                </div>
                <div class="gray333 message_header_job font-size-14 layout layout-align-space-between-center">
                    <div class="gray999"><?php echo $demanduserinfo['demand_passport_job_title'];?></div>
                    
                </div>
            </div>
        </div>
        <div class="need-list-wrapper">
            <div class="obj-info font-size-15">
            <?php if (!empty($demand_category_str)){?>
                <div class="layout need-wrapper-item">
                    <div class="obj-tag gray717">需求业态：</div>
                    <div class="obj-tags flex layout-column"><?php echo htmlspecialchars_decode($demand_category_str);?></div>
                </div>
            <?php }?>
            <?php if (!empty($tag['group_126']['lower']) || !empty($tag['group_126']['upper'])){?>
                <div class="layout need-wrapper-item">
                    <div class="obj-tag gray717">店铺面积：</div>
                    <?php if (!empty($tag['group_126']['lower']) && !empty($tag['group_126']['upper'])){?>
                        <div class="obj-tags"><?php echo $tag['group_126']['lower']/C('MULTIPLY_DOUBLE').'-'.$tag['group_126']['upper']/C('MULTIPLY_DOUBLE')?>㎡</div>
                    <?php }else {?>
                        <div class="obj-tags"><?php echo empty($tag['group_126']['lower'])?$tag['group_126']['upper']/C('MULTIPLY_DOUBLE'):$tag['group_126']['lower']/C('MULTIPLY_DOUBLE')?>㎡</div>
                    <?php }?>
                </div>
            <?php }?>
            <?php if (!empty( $deman_shop_str_s)){?>
                <div class="layout need-wrapper-item">
                    <div class="obj-tag gray717">招商类型：</div>
                    <div class="obj-tags flex layout-column"><?php echo $deman_shop_str_s;?></div>
                </div>
            <?php }?>
            <?php if (!empty( $mall_demand['result'][0]['demand_desc']) && $remarks_right){?>
                <div class="layout need-wrapper-item <?php if($passport_in_blacklist){ echo 'hide';}?>">
                    <div class="obj-tag gray717">特色：</div>
                    <div class="obj-tags flex"><?php echo $mall_demand['result'][0]['demand_desc'];?></div>
                </div>
            <?php }?>
             <?php if (!empty($mall_demand['result'][0]['demand_ctime'])){?>
                <div class="layout need-wrapper-item">
                    <div class="obj-tag gray717">发布日期：</div>
                    <div class="obj-tags"><?php echo $mall_demand['result'][0]['demand_ctime'];?></div>
                </div>
            <?php }?>
            <?php if (!empty($mall_demand['result'][0]['demand_expiry_at'])){?>
                <div class="layout need-wrapper-item">
                    <div class="obj-tag gray717">截止日期：</div>
                    <div class="obj-tags"><?php echo $mall_demand['result'][0]['demand_expiry_at'];?></div>
                </div>
            <?php }?>
                <div weixin-share class="need-item-more" onclick="commonUtilInstance.forwardneed('<?php echo $shareinfo['image'];?>','<?php echo $shareinfo['link'];?>')">
                    <a href="#" class="layout layout-align-end-center ui-link <?php if($passport_in_blacklist){ echo 'hide';}?>"><i class="icon_btn icon-shale"></i><div>转发需求</div></a>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mb_page layout">
        <div class="mb_page_left flex layout layout-align-center-center broadcastpre">
            <a href="" class="page_btn <?php if ($goprepage){?>btn_able  <?php }else {?> page_gray<?php }?> " ><span class="caret_left"></span></a>
        </div>
        <div class="flex layout layout-align-center-center broadcastnext">
            <a href="" class="page_btn <?php if ($goprenextpage){?>btn_able  <?php }else {?> page_gray<?php }?>" ><span class="caret_right"></span></a>
        </div>
    </div>

<form id="broadcastform" action="/details/mallbroadcast" method="post">
<input type="hidden" name="mall_id" value="<?php echo $mall_id;?>">
<input type="hidden" name="page_broad" value="<?php echo $page;?>">
<input type="hidden" name="count" value="<?php echo $count?>">
</form>
<?php }?>
<script type='text/javascript'>
	if(commonUtilInstance.isWeiXin()) {
		var weixinShare = $('[weixin-share]');
		weixinShare.addClass('hide');
	}
</script>