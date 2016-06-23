<script type="text/javascript">
$('body').css('visibility', 'hidden');
</script>
<section data-role="page" id="main_index_1" data-title="方橙-最专业的招商选址大数据平台" class="contain">
    <header data-scroll-down data-scroll-top="53px" data-role="header" data-theme="b"class="header">
		<a href="<?php echo $returnurl;?>" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back">需求详情</a>
        <h1>匹配需求</h1>
    </header>
    <div data-scroll data-scroll-content data-role="content" class="detail_content">
                   <div class="detail_need_list_wrap detail_need_list_wrap1">
                   <?php if (!empty($projectInfo)){?>
                    <ul  data-scroll data-scroll-datarender class="need-list-wrapper">
                    <?php foreach ($projectInfo as $key => $val){?>
                    <!-- 招商 -->
                    <?php if ($val['demand_type'] == 2){?>
                        <li>
							<a href="/ucenter/demandshow/demandid/<?php echo $val['_id'];?>/from/3/link/<?php echo $link;?>" data-ajax=false>
								<div class="need_item_top layout">
                            	<div class="face40">
                            		<img alt="" src="<?php echo $val['tag_build_logo']; ?>">
                            	</div>
                            	<div class="flex layout-column margin-left-10 need_item_top_right">
                            		 <div class="obj-name font-size-15"><span class="gray333"><?php echo $val['mall_name'];?></span></div>
		                            <div class="obj_info_msg font-size-12 nowrap">
		                            	<?php if (!empty($val['tag_build_size'])){?><span>体量：<?php echo $val['tag_build_size'];?>万㎡</span><?php }?>
		                            	<?php if (!empty($val['tag_build_city'])){?><span><?php echo $val['tag_build_city'];?></span><?php }?>
		                            	<?php if (!empty($val['tag_build_address'])){?><span><?php echo $val['tag_build_address'];?></span><?php }?>
		                            </div>
		                            <div class="u-info">
		                                <div class="gray999 font-size-14 nowrap">
		                                    <span><?php echo $val['userinfo']['passport_name'];?></span>
		                                   <?php if ($val['userinfo']['passport_status'] == 2 ){?> <span class="icon_btn"></span><?php }else {?>
		                                   <span class="font-size-12 gray999">(未认证)</span>
		                                   <?php }?>
		                                   <span>&nbsp;&nbsp;<?php echo $val['userinfo']['passport_job_title'];?></span>
		                                </div>
		                            </div>
                            	</div>
                            </div>
								<div class="obj-info need-obj-info font-size-15">
								<?php if (!empty($val['category_ids_str'])){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">需求业态：</div>
										<div class="obj-tags obj-tags-width flex layout-column"><?php echo htmlspecialchars_decode($val['category_ids_str']);?></div>
									</div>
								<?php }?>
								<?php if (!empty($val['tag']['group_126']['lower'] || !empty($val['tag']['group_126']['upper']))){?>
								    <?php if (!empty($val['tag']['group_126']['lower'] && !empty($val['tag']['group_126']['upper']))){?>
    									<div class="layout need-wrapper-item">
    										<div class="obj-tag gray999">店铺面积：</div>
    										<div class="obj-tags"><?php echo ($val['tag']['group_126']['lower']/C('MULTIPLY_DOUBLE').'-'.$val['tag']['group_126']['upper']/C('MULTIPLY_DOUBLE'));?>㎡</div>
    									</div>
									<?php }else {?>
       									<div class="layout need-wrapper-item">
    										<div class="obj-tag gray999">店铺面积：</div>
    										<div class="obj-tags"><?php echo empty($val['tag']['group_126']['lower'])?$val['tag']['group_126']['upper']/C('MULTIPLY_DOUBLE'):$val['tag']['group_126']['lower']/C('MULTIPLY_DOUBLE') ?>㎡</div>
    									</div>
									<?php }?>
								<?php }?>
								<?php if (!empty($val['demand_ctime'][0])){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">发布日期：</div>
										<div class="obj-tags"><?php  echo $val['demand_ctime'][0];?></div>
									</div>
								<?php }?>

								</div>
							</a>
                        </li>
                        <?php }elseif ($val['demand_type'] == 1){?>
                        <!-- 拓展  -->
                        <li>
							<a href="/ucenter/demandshow/demandid/<?php echo $val['_id'];?>/from/3/link/<?php echo $link;?>" data-ajax=false>
								<div class="need_item_top layout">
	                            	<div class="face40">
	                            		<img alt="" src="<?php echo $val['tag_brand_logo']; ?>">
	                            	</div>
	                            	<div class="flex layout-column margin-left-10 need_item_top_right">
	                            		<div class="obj-name font-size-15"><span class="gray333"><?php echo $val['brand_name']?><?php if($val['act_passport_id'] > 0){?><i class="need-h5book">H5</i><?php }?></span></div>
			                            <div class="obj_info_msg font-size-12">
			                            	<?php if (!empty($val['tag_brand_area_name'])){?><span>拓展城市：<?php echo $val['tag_brand_area_name'];?></span><?php }?>
			                            </div>
			                            <div class="u-info">
			                                <div class="gray999 font-size-12 nowrap">
			                                    <span><?php echo $val['userinfo']['passport_name'];?></span>
			                                    <?php if ($val['userinfo']['passport_status'] == 2 ){?> <span class="icon_btn"></span><?php }else {?>
			                                    <span class="font-size-12 gray999">(未认证)</span>&nbsp;&nbsp;
			                                    <?php }?>
			                                    <span><?php echo $val['userinfo']['passport_job_title'];?></span>
			                                </div>
			                            </div>
	                            	</div>
	                            </div>
								<div class="obj-info need-obj-info font-size-15">
								<?php  if (!empty($val['category_ids_str'])){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">业态：</div>
										<div class="obj-tags obj-tags-width flex layout-column">
										<?php echo htmlspecialchars_decode($val['category_ids_str']);?>
										</div>
									</div>
								<?php  }?>
								<?php  if (!empty($val['tag_brand_group_36'])){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">首选物业：</div>
										<div class="obj-tags obj-tags-width flex nowrap"><?php echo htmlspecialchars_decode($val['tag_brand_group_36']);?></div>
									</div>
								<?php  }?>
								<?php if (!empty($val['tag']['group_41']['lower']) || !empty($val['tag']['group_41']['upper'])){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">面积需求：</div>
										<div class="obj-tags"><?php echo ($val['tag']['group_41']['lower']/C('MULTIPLY_DOUBLE'))?>㎡-<?php echo ($val['tag']['group_41']['upper']/C('MULTIPLY_DOUBLE'))?>㎡</div>
									</div>
								<?php }?>
								<?php if (!empty($val['demand_ctime'][0])){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">发布日期：</div>
										<div class="obj-tags"><?php  echo $val['demand_ctime'][0];?></div>
									</div>
								<?php }?>
								</div>
							</a>
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