<script type="text/javascript">
$('body').css('visibility', 'hidden');
</script>
<section data-role="page" id="main_index_1" data-title="方橙-最专业的招商选址大数据平台" class="contain">
    <header data-scroll-down data-scroll-top="53px" data-role="header" data-theme="b"class="header">
		<a href="javascript:location.href='/ucenter/informationofmine'" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back">我的</a>
        <h1>需求列表</h1>
    </header>
    <div data-scroll data-scroll-content data-role="content" class="detail_content">
        <div class="detail_main need-list need-list-me">
            
                <?php if (!empty($projectInfo)){?>
               	<ul data-scroll data-scroll-datarender class="need-list-wrapper">
                    <?php foreach ($projectInfo as $key => $val){?>
                    <!-- 招商 -->
                    <?php if ($val['demand_type'] == 2){?>
                        <li class="pbNo">
                        <a href="/ucenter/demandshow/demandid/<?php echo $val['_id'];?>/from/1">
                            <div class="obj-name font-size-15"><span><?php echo $val['mall_name'];?></span></div>
                            <div class="obj-name font-size-12"><span><?php echo empty($val['demand_ctime'][0])?"":$val['demand_ctime'][0].'发布';?></span></div>
                            <div class="obj-info font-size-15">
                                <div class="layout need-wrapper-item">
                                    <div class="obj-tag gray717">需求业态：</div>
                                    <div class="obj-tags flex layout-column"><?php echo htmlspecialchars_decode($val['category_ids_str']);?></div>
                                </div>
                                <div class="layout need-wrapper-item">
                                    <div class="obj-tag gray717">店铺面积：</div>
                                  <?php if (!empty($val['tag']['group_126']['lower']) || !empty($val['tag']['group_126']['upper'])){?>
                                            <?php if (!empty($val['tag']['group_126']['lower']) && !empty($val['tag']['group_126']['upper'])){?>
                                                <div class="obj-tags"><?php echo $val['tag']['group_126']['lower']/C('MULTIPLY_DOUBLE').'-'.$val['tag']['group_126']['upper']/C('MULTIPLY_DOUBLE')?>㎡</div>
                                            <?php }else {?>
                                                <div class="obj-tags"><?php echo empty($val['tag']['group_126']['lower'])?$val['tag']['group_126']['upper']/C('MULTIPLY_DOUBLE'):$val['tag']['group_126']['lower']/C('MULTIPLY_DOUBLE')?>㎡</div>
                                            <?php }?>
                                    <?php }else {?>
                                        <div class="obj-tags">-㎡</div>
                                    <?php }?>
                                </div>
                                <?php if(!empty($val['demand_desc']) && 0){?>
                                <div class="layout need-wrapper-item">
                                    <div class="obj-tag gray717">特色：</div>
                                    <div class="obj-tags flex layout-column"><?php echo $val['demand_desc'];?></div>
                                </div>
                                
                                <?php }?>
                                <div class="layout need-wrapper-item hide">
                                    <div class="obj-tag gray717">截止日期：</div>
                                    <div class="obj-tags"><?php echo date("Y-m-d",strtotime($val['demand_expiry_at']));?></div>
                                </div>

                            </div>
                            </a>
                            <div class="formwrapper layout need-wrapper-item hide">
			                    <div class="check_auto" data-check data-check-url='/api/setweixinpush/demandid/<?php echo $val['_id'];?>'>
		                            <span <?php if ($val['weixin_push'] == 1){?> class="checked <?php if ( $val['searchNum'] > 0){echo 'no-mb';}?>"<?php }else {?><?php if ( $val['searchNum'] > 0){echo  "class='no-mb'";}?><?php }?>>接收方橙推荐的匹配需求通知</span>
		                            <input name="allow_moible" data-checkval type="hidden" value="0"/>
		                        </div>
			                </div>
			                <div class="need-mate layout layout-align-start-center <?php if ( $val['searchNum'] == 0){echo 'hide';}?>">
			                	<p class="flex">找到<span><?php echo $val['searchNum']?>条</span>您可能感兴趣的匹配需求</p><a href="/ucenter/similar/condition/<?php echo $val['searchArgs'];?>/returnurl/<?php echo $val['returnurl'];?>" class="need-mate-btn">查看</a>
			                </div>
                        </li>
                        <?php }elseif ($val['demand_type'] == 1){?>
                        <!-- 拓展  -->
                        <li class="pbNo"> 
                        <a href="/ucenter/demandshow/demandid/<?php echo $val['_id'];?>/from/1">
                            <div class="obj-name font-size-15"><span><?php echo $val['brand_name'];?></span> <?php if($val['act_passport_id'] > 0){?><i class="need-h5book">H5</i><?php }?></div>
                            <div class="obj-name font-size-12"><span><?php echo empty($val['demand_ctime'][0])?"":$val['demand_ctime'][0].'发布';?></span></div>

                            <div class="obj-info font-size-15">
                                <div class="layout need-wrapper-item">
                                    <div class="obj-tag gray717">业态：</div>
                                    <div class="obj-tags flex layout-column"><?php echo htmlspecialchars_decode($val['category_ids_str']);?></div>
                                </div>
                                <div class="layout need-wrapper-item">
                                    <div class="obj-tag gray717">面积需求：</div>
                                    <div class="obj-tags"><?php echo empty($val['tag']['group_41']['lower'])?'-':$val['tag']['group_41']['lower']/C('MULTIPLY_DOUBLE');?>-<?php echo empty($val['tag']['group_41']['upper'])?'-':$val['tag']['group_41']['upper']/C('MULTIPLY_DOUBLE');?>㎡</div>
                                </div>
                                <?php if(!empty($val['demand_desc']) && 0){?>
                                <div class="layout need-wrapper-item">
                                    <div class="obj-tag gray717">特色：</div>
                                    <div class="obj-tags flex layout-column"><?php echo $val['demand_desc'];?></div>
                                </div>
                                <?php } ?>
                                <div class="layout need-wrapper-item hide">
                                    <div class="obj-tag gray717">截止日期：</div>
                                    <div class="obj-tags"><?php echo date("Y-m-d",strtotime($val['demand_expiry_at']));?></div>
                                </div>
                                
                            </div>
                            </a>
                             <div class="formwrapper layout need-wrapper-item  hide">
                             	<div class="check_auto" data-check data-check-url='/api/setweixinpush/demandid/<?php echo $val['_id'];?>'>
		                            <span <?php if ($val['weixin_push'] == 1){?> class="checked <?php if ( $val['searchNum'] > 0){echo 'no-mb';}?>"<?php }else {?><?php if ( $val['searchNum'] > 0){echo  "class='no-mb'";}?><?php }?>>接收方橙推荐的匹配需求通知</span>
		                            <input name="allow_moible" data-checkval type="hidden" value="0"/>
		                        </div>
			                </div>
			                <div class="need-mate layout layout-align-start-center <?php if ( $val['searchNum'] == 0){echo 'hide';}?>">
			                	<p class="flex">找到<span><?php echo $val['searchNum']?>条</span>您可能感兴趣的匹配需求</p><a href="/ucenter/similar/condition/<?php echo $val['searchArgs'];?>/returnurl/<?php echo $val['returnurl'];?>" class="need-mate-btn">查看</a>
			                </div>
                        </li>
                        <?php }?>
                    <?php }?>
                    <div data-scroll-url="{data_scroll_url}" class="hide"/></div>
                    </ul>
                <?php }?>
                <?php if (empty($projectInfo)){?>
                <section class="detail_section detail_section_border me_need_nodate">
	                <div class="detail_section_main">
	                    <!-- 没有数据的 通一提示-->
	                    <div class="detail_noData layout layout-align-center-center">
	                        <div>
	                            <p>暂无需求</p>
								<!-- <p>关注商业体以便第一时间了解动态</p> -->
	                        </div>
	                    </div>
	                </div>
                </section>
                <?php }?>
            
            
           
            <!-- <div class="btn_box margin-top-20 nedd_btn_box">
                <a data-ajax="false" href="<?php if ($userinfo['passport_type'] == 1 || $userinfo['passport_type'] == 4){echo '/demand/brandneed';}elseif ($userinfo['passport_type'] == 2 || $userinfo['passport_type'] == 3){echo '/demand/businessneed';}?>" class="btn add-need-btn"><span class="layout layout-align-center-center">发布新的需求</span></a>
            </div>-->
        </div>
    </div>
</section>