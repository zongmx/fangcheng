<section data-role="page" id="main_index_1" data-title="方橙" class="contain bggray">
    <header data-role="header" data-theme="b"class="header">
        <a href="<?php if ($from == 1 || $from==5 ){echo '/ucenter/demandlistofmine';}elseif ($from == 3){echo $link;}elseif ($from == 4){echo '/news/broadcast';}else {echo $url;}?>" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back"><?php if ($from == 1 || $from ==5 ){echo '需求列表';}else {echo '需求广播';}?></a>
        <h1><?php echo $login_passport_id == $demand['passport_id']?'我发布的需求':'需求详情'?></h1>
    </header>
    	<!-- 选择按钮 - -->
    <div id='select_but' class="need_bottom_fiexd hide">
        <i class="opacity"></i>
        <div class="need_bottom_box">
            <div class="btn_box flex layout layout-align-center-center">
                <?php if ($passport_type == 2 || $passport_type == 3){?>
                     <a href="/demand/businessneed" class="btn btn_default layout layout-align-center-center"><span class="layout layout-align-center-center">快速发布需求</span></a>
                <?php }else {?>
                     <a href="/demand/businessneed" class="btn btn_default layout layout-align-center-center"><span class="layout layout-align-center-center">快速发布需求</span></a>
                <?php }?>
            </div>
            <div class="btn_box flex margin-top-20">
                <a href="/activity/htmltemplate" class="btn add-need-btn layout layout-align-center-center"><span class="layout layout-align-center-center">制作H5品牌拓展手册</span></a>
            </div>
        </div>
    </div>
	<!-- - -->
    <?php if ($demand['demand_type'] == 1){?>
    <div data-role="content" class="detail_content">
        <div class="need_top_tip layout layout-align-start-center <?php if ($searchNum < 1){echo 'hide';}?>">
            <a href="/ucenter/similar/condition/<?php echo $searchArgs;?>/returnurl/<?php echo $returnurl;?>"><p>为该需求找到<span class="num"><?php echo $searchNum;?>条</span>匹配的招商需求,  <span class="more layout layout-align-center-center">点击查看</span></p></a>
        </div>
        <div class="detail_main">
        <?php if ($login_passport_id != $demand['passport_id']){?>
        	<!-- 需求详情 start -->
        	<section class="detail_section need-prev">
                <div class="detail_section_head layout layout-align-space-between-center">
                    <div class="detail_section_tit font-size-14"><?php echo $demand['brand_name'];?></div>
                </div>
                <div class="detail_section_main">
                    
                    <?php if ($change && 0){?>
					<div class="need_noren">
						<p>用户身份信息有更新，点击头像可查看其最新资料。</p>
					</div>
					<?php }?>
                    <div class="need-list-wrapper">
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">拓展城市：</div>
                            <div class="obj-tags flex"><?php echo $demand['area_name'];?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">所属业态：</div>
                            <div class="obj-tags obj-tags-width flex layout-column"><?php echo htmlspecialchars_decode($brand_demand_category);?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">首选物业：</div>
                            <div class="obj-tags flex"><?php echo $demand['tag']['group_36_str'];?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">面积需求：</div>
                            <?php if (empty($demand['tag']['group_41']['lower']) && empty($demand['tag']['group_41']['upper'])){?>
                            <div class="obj-tags flex">-㎡</div>
                            <?php }else {?>
                            <div class="obj-tags flex"><?php echo empty($demand['tag']['group_41']['lower'])?'0':($demand['tag']['group_41']['lower']/C('MULTIPLY_DOUBLE'));?>-<?php echo empty($demand['tag']['group_41']['upper'])?'0':($demand['tag']['group_41']['upper']/C('MULTIPLY_DOUBLE'));?>㎡</div>
                            <?php }?>
                        </div>
                        <div class="layout need-wrapper-item hide">
                            <div class="obj-tag gray717">店铺类型：</div>
                            <div class="obj-tags flex"><?php echo $demand['tag']['group_116_str'];?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">工程条件：</div>
                            <div class="obj-tags flex"><?php echo $demand['tag']['group_46_str']; ?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">期望年限：</div>
                            <?php if (empty($demand['tag']['group_40']['0'])){?>
                                <div class="obj-tags flex">-年</div>
                            <?php }else {?>
                                <div class="obj-tags flex"><?php echo $demand['tag']['group_40']['0']/C('MULTIPLY_DOUBLE');?>年</div>
                            <?php }?>
                        </div>
                        <div class="layout need-wrapper-item hide">
                            <div class="obj-tag gray717">租金预算：</div>
                            <?php if (empty($demand['tag']['group_42']['lower']) && empty($demand['tag']['group_42']['upper'])){?>
                                <div class="obj-tags flex">-元/平/天</div>
                            <?php }else {?>
                                 <div class="obj-tags flex"><?php echo empty($demand['tag']['group_42']['lower'])?'0':($demand['tag']['group_42']['lower']/C('MULTIPLY_DOUBLE'));?>-<?php echo empty($demand['tag']['group_42']['upper'])?'0':($demand['tag']['group_42']['upper']/C('MULTIPLY_DOUBLE'));?>元/平/天</div>
                            <?php }?>                        
                        </div>
                        <?php if($_SESSION['userinfo']['passport_id']){?>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">特色：</div>
                            <div class="obj-tags flex"><?php echo $demand['demand_desc'];?></div>
                        </div>
                        <?php }?>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">发布日期：</div>
                            <div class="obj-tags flex"><?php echo $demand['ctime'][0];?></div>
                        </div>
                        <div class="layout need-wrapper-item hide">
                            <div class="obj-tag gray717">截止日期：</div>
                            <div class="obj-tags"><?php echo $demand['demand_expiry_at'];?></div>
                        </div>
                    </div>
                    <div class="layout margin-top-10 margin-bottom-20">
                    <?php if (!empty($demand['brand_id'])){?>
                        <div class="btn_box flex layout layout-align-center-center">
                            <a href="/details/brand/brand_id/<?php echo $demand['brand_id'];?>" class="btn btn_default layout layout-align-center-center ">
                                <span class="font-size-15">查看品牌详情</span>
                            </a>
                        </div>
                        <!-- 查看H5需求 -->
                    <?php }?>
                    <?php if ($demand['act_passport_id'] > 0){?>
                        <div class="btn_box flex layout layout-align-center-center margin-left-10">
                            <a href="/activity/h5/q/showh5/id/<?php echo $demand['act_passport_id'];?>" class="btn btn_default layout layout-align-center-center ">
                                <span class="font-size-14"><i style="display: inline-block;background-color:#d8992c;color:#fff;font-size:12px;height:17px;line-height:17px;margin-right:5px;padding:0 1px;">H5</i>查看H5需求详情</span>
                            </a>
                        </div>
                        <?php }?>
                         <div class="layout layout-align-end-center flex">
                            <a weixin-share wxTitle="<?php echo $title?>" wxDesc="<?php echo $desc;?>" wxLink="<?php echo $shareinfo['link'];?>" wxImgUrl="<?php echo $logo;?>" href="#" class="layout layout-align-end-center flex" shear-need="need" data-toggle="modal" custom-dialog="#shear-need"  onclick="commonUtilInstance.forwardneed('<?php echo $shareinfo['image'];?>','<?php echo $shareinfo['link'];?>')">
                                <i class="icon_btn icon-shale"></i>
                                <span class="font-size-12">转发需求</span>
                            </a>
                        </div>
                    </div>
                    <div class="margin-bottom-20">
                    	<div class="font-size-14 gray999">联系人：</div>
                    	<div class="message_top layout flex margin-top-10">
	                        <div class="face40"><img onerror="this.src='/img/detail/headdefault.png'" src="<?php echo C('IMAGE_USER_URL').$demand['passport_picture']?>" onclick=" window.location.href='/ucenter/index/passport_id/<?php echo $demand['passport_id'];?>'"></div>
	                        <div class="message_info margin-left-10 layout-column flex">
	                            <div class="layout flex message_info_u layout-align-start-start nowrap">
	                                <span class="message_header_tit gray333 font-size-15"><?php echo $demand['passport_name']?></span>
                                    <?php if($demand['passport_status']==2){?><span class="icon_btn icon_v margin-right-10"></span><?php }else{?>&nbsp;<span class="font-size-12 gray999 margin-right-10">(未认证)</span>&nbsp;<?php }?>
                                    <span class="gray999 message_header_job font-size-12"><?php echo $demand['passport_job_title']?></span>
	                            </div>
	                            <div class="message_btn layout layout-column">
<?php if($demand['passport_in_blacklist']==1) { ?>
                        <div class="need_noren flex layout-align-center-center" style="margin:0;">
							<p>此用户暂时无法联系</p>
						</div>
<?php }?>
	                            <div class="layout layout-align-center center flex">
	                            	<div class="btn_box layout layout-align-center-center flex">
				                        <a href="/letter/send/receiver_id/<?php echo $demand['passport_id'];?>/letterurl/{letterurl}" class="btn btn_full_able layout layout-align-center-center <?php if ($demand['passport_in_blacklist']==1){?> hide <?php }?>">
				                        	<div class="icon_btn icon_message2"></div>
				                            <span class="">发送私信</span>
				                        </a>
				                    </div>
				                    <div class="btn_box layout layout-align-center-center margin-left-10 flex">
				                        <a href="tel:<?php echo $demand_passport_mobile;?>" class="btn btn_default layout layout-align-center-center <?php if ($demand['allow_moible'] !=1 || $demand['passport_in_blacklist']==1){?> hide <?php }?>" onclick="return showNotice('{jsStatus}');">
				                        	<div class="icon_btn icon_tel2"></div>
				                            <span class="">电话联系</span>
				                        </a>
				                    </div>
	                            </div>
	                            </div>
	
	                        </div>
	                    </div>
	                    <div class="need_noren <?php if($demand['passport_status']==2 || $demand['passport_in_blacklist']==1){?> hide<?php }?>">
							<p>未经认证用户可能会使用虚假信息，请保持谨慎。</p>
						</div>
                    </div>
                </div>
            </section>

            <!-- 相似需求 -->
            <?php __slot('ucenter','likedemandbrand');?>
            <!-- 需求详情 end -->
            <div class="btn_box margin-top-20">
            <?php if ($_SESSION['userinfo']['passport_type'] == 2 || $_SESSION['userinfo']['passport_type'] == 3){?>
                    <a href="<?php echo $jumpurl;?>" id='add_need' class="btn add-need-btn ui-link">
                        <span class="layout layout-align-center-center">发布我的需求</span>
                    </a>
                <?php }else {?>
                    <a href="#" id='add_need' class="btn add-need-btn ui-link">
                        <span class="layout layout-align-center-center">发布我的需求</span>
                    </a>
            <?php }?>
            </div>
           <?php }else {?>
        
            <section class="detail_section">
                <div class="detail_section_head layout layout-align-space-between-center">
                    <div class="detail_section_tit font-size-14"><?php echo $demand['brand_name'];?></div>
                    <div weixin-share wxTitle="<?php echo $title?>" wxDesc="<?php echo $desc;?>" wxLink="<?php echo $shareinfo['link'];?>" wxImgUrl="<?php echo $logo;?>"  class="detail_section_tag layout layout-align-start-center gray999" onclick="commonUtilInstance.forwardneed('<?php echo $shareinfo['image'];?>','<?php echo $shareinfo['link'];?>')">
                        <span class="icon_btn icon-shale-two"></span>
                        <span class="font-size-14">转发需求</span>
                    </div>
                </div>
                <?php if ($change && 0){?>
				<div class="need_noren">
					<p>用户身份信息有更新，您可以点击头像查看其最新资料。</p>
				</div>
				<?php }?>
                <div class="detail_section_main">
                    <div class="need-list-wrapper">
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">拓展城市：</div>
                            <div class="obj-tags flex"><?php echo $demand['area_name'];?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">所属业态：</div>
                            <div class="obj-tags obj-tags-width flex layout-column"><?php echo htmlspecialchars_decode($brand_demand_category);?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">首选物业：</div>
                            <div class="obj-tags flex"><?php echo $demand['tag']['group_36_str'];?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">面积需求：</div>
                            <?php if (empty($demand['tag']['group_41']['lower']) && empty($demand['tag']['group_41']['upper'])){?>
                            <div class="obj-tags flex">-㎡</div>
                            <?php }else {?>
                            <div class="obj-tags flex"><?php echo empty($demand['tag']['group_41']['lower'])?'0':($demand['tag']['group_41']['lower']/C('MULTIPLY_DOUBLE'));?>-<?php echo empty($demand['tag']['group_41']['upper'])?'0':($demand['tag']['group_41']['upper']/C('MULTIPLY_DOUBLE'));?>㎡</div>
                            <?php }?>
                        </div>
                        <div class="layout need-wrapper-item hide">
                            <div class="obj-tag gray717">店铺类型：</div>
                            <div class="obj-tags flex"><?php echo $demand['tag']['group_116_str'];?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">工程条件：</div>
                            <div class="obj-tags flex"><?php echo $demand['tag']['group_46_str']; ?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">期望年限：</div>
                            <?php if (empty($demand['tag']['group_40']['0'])){?>
                                <div class="obj-tags flex">-年</div>
                            <?php }else {?>
                                <div class="obj-tags flex"><?php echo $demand['tag']['group_40']['0']/C('MULTIPLY_DOUBLE');?>年</div>
                            <?php }?>
                        </div>
                        <div class="layout need-wrapper-item hide">
                            <div class="obj-tag gray717">租金预算：</div>
                            <?php if (empty($demand['tag']['group_42']['lower']) && empty($demand['tag']['group_42']['upper'])){?>
                                <div class="obj-tags flex">-元/平/天</div>
                            <?php }else {?>
                                 <div class="obj-tags flex"><?php echo empty($demand['tag']['group_42']['lower'])?'0':($demand['tag']['group_42']['lower']/C('MULTIPLY_DOUBLE'));?>-<?php echo empty($demand['tag']['group_42']['upper'])?'0':($demand['tag']['group_42']['upper']/C('MULTIPLY_DOUBLE'));?>元/平/天</div>
                            <?php }?>
                        </div>
                        <?php if($_SESSION['userinfo']['passport_id']){?>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">特色：</div>
                            <div class="obj-tags flex"><?php echo $demand['demand_desc'];?></div>
                        </div>
                        <?php }?>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">发布日期：</div>
                            <div class="obj-tags flex"><?php echo $demand['ctime'][0];?></div>
                        </div>
                        
                        <div class="layout need-wrapper-item hide">
                            <div class="obj-tag gray717">截止日期：</div>
                            <div class="obj-tags flex"><?php echo $demand['demand_expiry_at'];?></div>
                        </div>
                    </div>
                    <?php if ($login_passport_id == $demand['passport_id']){?>
                    <!-- <div class="layout margin-top-20 margin-bottom-20">
                        <div class="btn_box flex">
                            <input type="button" data-role="none" data-toggle="modal" onclick="showh5(<?php echo $demand['act_passport_id']; ?>)" class="btn btn_default" value="查看H5详情" >
                        </div>
                    </div>-->
                    <?php ?>
                    <?php if ($demand['act_passport_id'] > 0){?>
                    <div class="btn_box flex layout layout-align-center-center margin-top-20">
                       <a href="/activity/h5/q/showh5/id/<?php echo $demand['act_passport_id']; ?>" class="btn btn_default layout layout-align-center-center ">
                          <span class="font-size-14"><i style="display: inline-block;background-color:#d8992c;color:#fff;font-size:12px;height:17px;line-height:17px;margin-right:5px;padding:0 1px;">H5</i>查看H5需求详情</span>
                       </a>
                    </div>
                    <?php }?>
                    <div class="layout margin-top-20 margin-bottom-20">
                        <div class="btn_box flex">
                            <input type="button" data-role="none" data-toggle="modal" custom-dialog="#login-dialog" class="btn btn_default" value="删除该需求" >
                        </div>
                    </div>
                    <?php }?>
                      
                </div>
            </section>
            <!-- 相似需求 -->
            <?php __slot('ucenter','likedemandbrand');?>
            <?php }?>
        </div>
        
    </div>
    
    <?php }elseif ($demand['demand_type'] == 2){ ?>
        <div data-role="content" class="detail_content">
        <div class="need_top_tip layout layout-align-start-center <?php if ($searchNum < 1){echo 'hide';}?>">
            <p>为该需求找到<?php echo $searchNum;?>条匹配的拓展需求,<a href="/ucenter/similar/condition/<?php echo $searchArgs;?>/returnurl/<?php echo $returnurl;?>" class="more layout layout-align-center-center">点击查看</a></p>
        </div>
        <div class="detail_main">
        <?php if ($login_passport_id != $demand['passport_id']){?>
        	<!-- 需求详情 start -->
        	<section class="detail_section need-prev">
                <div class="detail_section_head layout layout-align-space-between-center">
                    <div class="detail_section_tit font-size-14"><?php echo $demand['mall_name'];?></div>
                </div>
                <div class="detail_section_main">
                    <!-- <div class="message_top layout flex">
                        <div class="face40"><img onerror="this.src='/img/detail/headdefault.png'" src="<?php echo C('IMAGE_USER_URL').$demand['passport_picture']?>" onclick=" window.location.href='/ucenter/index/passport_id/<?php echo $demand['passport_id'];?>'"></div>
                        <div class="message_info margin-left-10 layout-column flex">
                            <div class="layout flex">
                                <div class="flex">
                                    <span class="message_header_tit gray333 font-size-15"><?php echo $demand['passport_name']?></span>
                                    <?php if($demand['passport_status']==2){?><span class="icon_btn icon_v"></span><?php }?>
                                </div>
                                <span class="message_header_date layout layout-align-start-center">
                                    <a  href="/letter/send/receiver_id/<?php echo $demand['passport_id'];?>/letterurl/{letterurl}" class="layout layout-align-start-center ui-link"><i class="icon_btn icon_message"></i><div class="gray333 font-size-12">发送私信</div></a>
                                </span>
                            </div>
                            <div class="gray333 message_header_job font-size-15"><?php echo $demand['passport_job_title']?></div>

                        </div>
                    </div>-->
                    <?php if ($change && 0){?>
					<div class="need_noren">
						<p>用户身份信息有更新，您可以点击头像查看其最新资料。</p>
					</div>
					<?php }?>
                    <div class="need-list-wrapper">
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">需求业态：</div>
                            <div class="obj-tags flex layout-column"><?php echo htmlspecialchars_decode($demand['category_ids_str']);?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">店铺面积：</div>
                           <?php if (!empty($demand['tag']['group_126']['lower']) || !empty($demand['tag']['group_126']['upper'])){?>
                                    <?php if (!empty($demand['tag']['group_126']['lower']) && !empty($demand['tag']['group_126']['upper'])){?>
                                        <div class="obj-tags"><?php echo $demand['tag']['group_126']['lower']/C('MULTIPLY_DOUBLE').'-'.$demand['tag']['group_126']['upper']/C('MULTIPLY_DOUBLE')?>㎡</div>
                                    <?php }else {?>
                                        <div class="obj-tags"><?php echo empty($demand['tag']['group_126']['lower'])?$demand['tag']['group_126']['upper']/C('MULTIPLY_DOUBLE'):$demand['tag']['group_126']['lower']/C('MULTIPLY_DOUBLE')?>㎡</div>
                                    <?php }?>
                            <?php }else {?>
                                <div class="obj-tags">-㎡</div>
                            <?php }?>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">招商类型：</div>
                            <div class="obj-tags flex layout-column"><?php echo $demand['demand_shop_type_str'];?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">特色：</div>
                            <div class="obj-tags flex"><?php echo $demand['demand_desc'];?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">发布日期：</div>
                            <div class="obj-tags flex"><?php echo $demand['ctime'][0];?></div>
                        </div>
                        
                        <div class="layout need-wrapper-item hide">
                            <div class="obj-tag gray717">截止日期：</div>
                            <div class="obj-tags flex"><?php echo $demand['demand_expiry_at'];?></div>
                        </div>
                    </div>
                    <div class="layout margin-top-10 margin-bottom-20">
                    <?php if (!empty($demand['mall_id'])){?>
                        <div class="btn_box flex layout layout-align-center-center">
                            <a href="/details/mall/mall_id/<?php echo $demand['mall_id'];?>" class="btn btn_default layout layout-align-center-center ">
                                <span class="font-size-15">查看商业体详情</span>
                            </a>
                        </div>
                    <?php }?>
                        <div class="layout layout-align-end-center flex">
                            <a weixin-share wxTitle="<?php echo $title?>" wxDesc="<?php echo $desc;?>" wxLink="<?php echo $shareinfo['link'];?>" wxImgUrl="<?php echo $logo;?>"  href="#" class="layout layout-align-end-center" shear-need="need" data-toggle="modal" custom-dialog="#shear-need" onclick="commonUtilInstance.forwardneed('<?php echo $shareinfo['image'];?>','<?php echo $shareinfo['link'];?>')">
                                <i class="icon_btn icon-shale"></i>
                                <span class="font-size-12">转发需求</span>
                            </a>
                        </div>
                    </div>
                    <div class="margin-bottom-20">
                    	<div class="font-size-14 gray999">联系人：</div>
                    	<div class="message_top layout flex margin-top-10">
	                        <div class="face40"><img onerror="this.src='/img/detail/headdefault.png'" src="<?php echo C('IMAGE_USER_URL').$demand['passport_picture']?>" onclick=" window.location.href='/ucenter/index/passport_id/<?php echo $demand['passport_id'];?>'"></div>
	                        <div class="message_info margin-left-10 layout-column flex">
	                            <div class="layout flex message_info_u nowrap layout-align-start-start">
	                                <span class="message_header_tit gray333 font-size-15"><?php echo $demand['passport_name']?></span>
                                    <?php if($demand['passport_status']==2){?><span class="icon_btn icon_v margin-right-10"></span><?php }else{?>&nbsp;<span class="font-size-12 margin-right-10 gray999">(未认证)</span>&nbsp;<?php }?>
                                    <span class="gray999 message_header_job font-size-12"><?php echo $demand['passport_job_title']?></span>
	                            </div>
	                            <div class="message_btn layout layout-column">
	                            	<div class="layout layout-align-center-center flex">
	                            		<div class="btn_box layout layout-align-center-center flex <?php if ($demand['passport_in_blacklist']==1){?> hide <?php }?>">
					                        <a href="/letter/send/receiver_id/<?php echo $demand['passport_id'];?>/letterurl/{letterurl}" class="btn btn_full_able layout layout-align-center-center">
					                        	<div class="icon_btn icon_message2"></div>
					                            <span class="">发送私信</span>
					                        </a>
					                    </div>
					                    <div class="btn_box layout layout-align-center-center margin-left-10 flex <?php if ($demand['passport_in_blacklist']==1){?> hide <?php }?>">
					                        <a href="tel:<?php echo $demand_passport_mobile;?>" class="btn btn_default layout layout-align-center-center <?php if ($demand['allow_moible'] !=1){?> hide <?php }?>" onclick="return showNotice('{jsStatus}');">
					                        	<div class="icon_btn icon_tel2 "></div>
					                            <span class="">电话联系</span>
					                        </a>
					                    </div>
	                            	</div>
	                            	
<?php if($demand['passport_in_blacklist']==1) { ?>
                        <div class="need_noren flex layout-align-center-center" style="margin:0;">
							<p>此用户暂时无法联系</p>
						</div>
<?php }?>
	                            </div>
	
	                        </div>
	                    </div>
	                    <div class="need_noren <?php if($demand['passport_status']==2 || $demand['passport_in_blacklist']==1){?> hide<?php }?>">
							<p>未经认证用户可能会使用虚假信息，请保持谨慎。</p>
						</div>
                    </div>
                </div>
            </section>
                        <!-- 相似需求 -->
            <?php __slot('ucenter','likedemandbrand');?>
            <div class="btn_box margin-top-20">
            <?php if ($_SESSION['userinfo']['passport_type'] == 2 || $_SESSION['userinfo']['passport_type'] == 3){?>
                <a href="<?php echo $jumpurl;?>" id='add_need' class="btn add-need-btn ui-link">
                    <span class="layout layout-align-center-center">发布我的需求</span>
                </a>
            <?php }else {?>
                <a href="#" id='add_need' class="btn add-need-btn ui-link">
                    <span class="layout layout-align-center-center">发布我的需求</span>
                </a>
            <?php }?>
            </div>
            <!-- 需求详情 end -->
         <?php }else{?>
            <section class="detail_section">
                <div class="detail_section_head layout layout-align-space-between-center">
                    <div class="detail_section_tit font-size-14"><?php echo $demand['mall_name'];?></div>
                    <div weixin-share wxTitle="<?php echo $title?>" wxDesc="<?php echo $desc;?>" wxLink="<?php echo $shareinfo['link'];?>" wxImgUrl="<?php echo $logo;?>"  class="detail_section_tag layout layout-align-start-center gray999" onclick="commonUtilInstance.forwardneed('<?php echo $shareinfo['image'];?>','<?php echo $shareinfo['link'];?>')">
                        <span class="icon_btn icon-shale-two"></span>
                        <span class="font-size-14">转发需求</span>
                    </div>
                </div>
				<?php if ($change && 0){?>
				<div class="need_noren">
					<p>用户身份信息有更新，您可以点击头像查看其最新资料。</p>
				</div>
				<?php }?>
                <div class="detail_section_main">
                    <div class="need-list-wrapper">
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">需求业态：</div>
                            <div class="obj-tags flex layout-column"><?php echo htmlspecialchars_decode($demand['category_ids_str']);?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">店铺面积：</div>
                            <?php if (!empty($demand['tag']['group_126']['lower']) || !empty($demand['tag']['group_126']['upper'])){?>
                                    <?php if (!empty($demand['tag']['group_126']['lower']) && !empty($demand['tag']['group_126']['upper'])){?>
                                        <div class="obj-tags"><?php echo $demand['tag']['group_126']['lower']/C('MULTIPLY_DOUBLE').'-'.$demand['tag']['group_126']['upper']/C('MULTIPLY_DOUBLE')?>㎡</div>
                                    <?php }else {?>
                                        <div class="obj-tags"><?php echo empty($demand['tag']['group_126']['lower'])?$demand['tag']['group_126']['upper']/C('MULTIPLY_DOUBLE'):$demand['tag']['group_126']['lower']/C('MULTIPLY_DOUBLE')?>㎡</div>
                                    <?php }?>
                            <?php }else {?>
                                <div class="obj-tags">-㎡</div>
                            <?php }?>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">招商类型：</div>
                            <div class="obj-tags flex layout-column"><?php echo $demand['demand_shop_type_str'];?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">特色：</div>
                            <div class="obj-tags flex"><?php echo $demand['demand_desc'];?></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">发布日期：</div>
                            <div class="obj-tags flex"><?php echo $demand['ctime'][0];?></div>
                        </div>
                        
                        <div class="layout need-wrapper-item hide">
                            <div class="obj-tag gray717">截止日期：</div>
                            <div class="obj-tags flex"><?php echo $demand['demand_expiry_at'];?></div>
                        </div>
                    </div>
                    <?php if ($login_passport_id == $demand['passport_id']){?>
                    <div class="layout margin-top-20 margin-bottom-20">
                        <div class="btn_box flex">
                            <input type="button" data-role="none" data-toggle="modal" custom-dialog="#login-dialog" class="btn btn_default" value="删除该需求"  >
                        </div>
<!--                         <div class="btn_box flex margin-left-10"> -->
<!--                             <input type="button" data-role="none" data-toggle="modal" custom-dialog="#login-dialog-yanchang" class="btn btn_default" value="延长日期"> -->
<!--                         </div> -->
                    </div>
                    <?php }?>
                </div>
				
            </section>
            <?php }}?>
        </div>
    </div>
    
    <?php __slot('passport','footer');?>
    <div id="login-dialog" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
        <div class="modal-backdrop fade"></div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 id="myModalLabel" class="modal-title">提示</h4>
                </div>
                <div class="modal-body">
                    <div class="dialogBox_content">
                        <p class="text-center font-size-14">删除后不可恢复，是否确认删除？</p>
                        <div class="btn_box flex margin-top-20" onclick='deldemand("<?php echo $demand['_id'];?>")'>
                            <input type="button" data-role="none"  class="btn" value="确认删除">
                        </div>
                        <div class="btn_box flex margin-top-20">
                            <input type="button" data-role="none" class="btn btn_default close" value="取消">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="login-dialog-yanchang" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
        <div class="modal-backdrop fade"></div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 id="myModalLabel" class="modal-title">提示</h4>
                </div>
                <div class="modal-body">
                    <div class="dialogBox_content">
                        <p class="text-center font-size-14">截止日期将会延长一个月,是否确认延长？</p>
                        <div class="btn_box flex margin-top-20" onclick='adddemandtime("<?php echo $demand['_id']; ?>")'>
                            <input type="button" data-role="none" class="btn" value="确认延长">
                        </div>
                        <div class="btn_box flex margin-top-20">
                            <input type="button" data-role="none" class="btn btn_default close" value="取消">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script type="text/javascript">
function deldemand(id){
    $.ajax({
        type:'post',
        url:'/ucenter/deldemand/id/'+id,
        dataType:'json',
        cache:false,
        success:function(e){
            if(e.result == 1){
                location.href='/ucenter/demandlistofmine';
            }else{
                alert('删除失败');
              }
            }
        })
    }
function adddemandtime(id){
    $.ajax({
        type:'post',
        url:'/ucenter/addtime/id/'+id,
        dataType:'json',
        cache:false,
        success:function(e){
            if(e.result == 1){
                $('.close').click();
                location.reload();
            }else{
                //alert('延长失败');
              }
            }
        })
    }
if(commonUtilInstance.isWeiXin()) {
	var weixinShare = $('[weixin-share]');
	weixinShare.parent().addClass('hide');
	commonUtilInstance.forwardneed_weixin(weixinShare.attr('wxTitle'),weixinShare.attr('wxDesc'),weixinShare.attr('wxLink'),weixinShare.attr('wxImgUrl'));
}	
$('#add_need').click(function(){
	   $('#select_but').removeClass('hide');
});
$('#select_but .opacity').on('click',function() {
	$('#select_but').addClass('hide');
});

function showNotice(status){
	if(status>0){
		commonUtilInstance.authReminderDialog(status, window.location.href);
		return false;
	} else if(status === ''){
		window.location.href='{jumpUrl}';
		return false;
	} else {
		return true;
	}
}

function godemandshow(id){
//     var link_url = $("input[name='roundUrl']").val();
	<?php if (!empty($checkPage)){?>
      var jump_show_url = '/ucenter/demandshow/demandid/'+id+'/from/<?php echo $checkPage?>';
    <?php }else {?>
      var jump_show_url = '/ucenter/demandshow/demandid/'+id+'/from/4';
    <?php }?>
    location.href = jump_show_url;
}

function showh5(act_id){
	var h5_link = '/activity/h5/q/showh5/id/'+act_id;
	location.href = h5_link;
}
</script>