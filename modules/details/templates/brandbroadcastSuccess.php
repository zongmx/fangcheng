<?php if (empty($isdemand)){?>
                 <div class="detail_section_main detail_section_top_border font-size-14 text-center gray999">
	            	<p>该品牌暂时没有发布需求</p>
	                <p>关注该品牌后其发布的需求第一时间通知您</p>
	            </div>
<?php }else {?>
<div class="detail_section_main detail_section_top_border">
    <div class="message_top layout flex">
        <div class="face40"><img onclick="javascript:location.href='/ucenter/index/passport_id/<?php echo $passportresult['passport_id'];?>'" onerror="this.src='/img/detail/headdefault.png'"  src="<?php echo $passportresult['passport_picture'];?>"></div>
        <div class="message_info flex layout-column margin-left-10">
            <div class="layout">
                <span onclick="javascript:location.href='/ucenter/index/passport_id/<?php echo $passportresult['passport_id'];?>'" class="message_header_tit gray333 font-size-15"><?php echo $passportresult['passport_name'];?></span>
                <?php if ($demandresult['demand_status'] == 2){?>
                        <span class="icon_btn icon_v"></span>
                <?php }else {?>
                        <span class="font-size-12 gray999">( 未认证 )</span>
                <?php }?>
            </div>
            <div class="gray333 message_header_job font-size-12 layout layout-align-space-between-center">
                <div class="gray999"><?php echo $passportresult['passport_job_title'];?></div>
                <?php if (isset($_SESSION['userinfo']['passport_id'])){?>
                    <?php if ($_SESSION['userinfo']['passport_id'] != $passportresult['passport_id']){?>
                        <div class="layout layout-align-start-center">
                            <a href="/letter/send/receiver_id/<?php echo $passportresult['passport_id'];?>/brand/{brand_id}" class="layout layout-align-start-center <?php if($passport_in_blacklist){ echo 'hide';}?>" data-ajax="false"><div class="icon_btn icon_message"></div><div>发送私信</div></a>
                        </div>
                    <?php }?>
                <?php }else {?>
                <div id="login" class="layout layout-align-start-center">
                    <a href="/letter/send/receiver_id/<?php echo $passportresult['passport_id'];?>/brand/{brand_id}" class="layout layout-align-start-center <?php if($passport_in_blacklist){ echo 'hide';}?>" data-ajax="false"><i class="icon_btn icon_message"></i><div>发送私信</div></a>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    <div class="need-list-wrapper">
        <div class="obj-info font-size-15">
        <?php if (!empty($demandresult['area_name'])){?>
            <div class="layout need-wrapper-item">
                <div class="obj-tag gray717">拓展城市：</div>
                <div class="obj-tags flex layout-column"><?php echo $demandresult['area_name']; ?></div>
            </div>
        <?php }?>
        <?php if (!empty($demandresult['group_36_str'])){?>
            <div class="layout need-wrapper-item">
                <div class="obj-tag gray717">首选物业：</div>
                <div class="obj-tags flex layout-column"><?php echo $demandresult['group_36_str'];?></div>
            </div>
        <?php }?>
        <?php if (!empty($demandresult['tag']['group_41']['lower']) || !empty($demandresult['tag']['group_41']['upper'])){?>
            <div class="layout need-wrapper-item">
                <div class="obj-tag gray717">面积需求：</div>
                <div class="obj-tags"><?php echo empty($demandresult['tag']['group_41']['lower'])?'0':($demandresult['tag']['group_41']['lower']/C('MULTIPLY_DOUBLE'))?>-<?php echo empty($demandresult['tag']['group_41']['upper'])?'0':($demandresult['tag']['group_41']['upper']/C('MULTIPLY_DOUBLE'))?>㎡</div>
            </div>
        <?php }?>
        <?php if (!empty($demandresult['group_116_str'])){?>
            <div class="layout need-wrapper-item">
                <div class="obj-tag gray717">店铺类型：</div>
                <div class="obj-tags flex layout-column"><?php echo $demandresult['group_116_str'];?></div>
            </div>
        <?php }?>
        <?php if (!empty($demandresult['group_46_str'])){?>
            <div class="layout need-wrapper-item">
                <div class="obj-tag gray717">工程条件：</div>
                <div class="obj-tags flex layout-column"><?php echo $demandresult['group_46_str'];?></div>
            </div>
        <?php }?>
        <?php if (!empty($demandresult['tag']['group_40'][0])){?>
            <div class="layout need-wrapper-item">
                <div class="obj-tag gray717">期望年限：</div>
                <div class="obj-tags"><?php echo empty($demandresult['tag']['group_40'][0])?'0':($demandresult['tag']['group_40'][0]/C('MULTIPLY_DOUBLE'));?>年</div>
            </div>
        <?php }?>
        <?php if (!empty($demandresult['tag']['group_42']['lower']) || !empty($demandresult['tag']['group_42']['upper'])){?>
            <div class="layout need-wrapper-item">
                <div class="obj-tag gray717">租金预算：</div>
                <div class="obj-tags"><?php echo empty($demandresult['tag']['group_42']['lower'])?'0':($demandresult['tag']['group_42']['lower']/C('MULTIPLY_DOUBLE'));?>-<?php echo empty($demandresult['tag']['group_42']['upper'])?'0':($demandresult['tag']['group_42']['upper']/C('MULTIPLY_DOUBLE'))?>元/平/天
                </div>
            </div>
        <?php }?>
        <?php ?>
        <?php if (!empty($demandresult['demand_desc']) && $remarks_right){?>
            <div class="layout need-wrapper-item <?php if($passport_in_blacklist){ echo 'hide';}?>">
                <div class="obj-tag gray717">特色：</div>
                <div class="obj-tags flex"><?php echo $demandresult['demand_desc'];?></div>
            </div>
        <?php }?>
        <?php if (!empty($demandresult['demand_ctime'])){?>
            <div class="layout need-wrapper-item">
                <div class="obj-tag gray717">发布日期：</div>
                <div class="obj-tags"><?php echo $demandresult['demand_ctime'];?></div>
            </div>
        <?php }?>
        <?php if (!empty($demandresult['demand_expiry_at'])){?>
            <div class="layout need-wrapper-item">
                <div class="obj-tag gray717">截止日期：</div>
                <div class="obj-tags"><?php echo $demandresult['demand_expiry_at'];?></div>
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

<form id="broadcastform" action="/details/brandbroadcast" method="post">
<input type="hidden" name="brand_id" value="<?php echo $brand_id;?>">
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