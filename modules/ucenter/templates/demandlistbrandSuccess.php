						<?php foreach ($projectInfo as $key => $val){?>
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
                  		<div data-scroll-url="{data_scroll_url}" class="hide"/></div>