
                    <?php foreach ($projectInfo as $key => $val){?>
                    <!-- 招商 -->
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
                    <?php }?>
                    <div data-scroll-url="{data_scroll_url}" class="hide"/></div>