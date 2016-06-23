<script type="text/javascript">
$('body').css('visibility', 'hidden');
</script>
<input type="hidden" name='currentcityname' value='<?php echo $currentcityname;?>'>
	<div data-role="content" class="detail_content gray_bg">
		<div class="nav-bar">
			<ul class="nav layout">
				<li id="need-type_z" class="dropdown-toggle need-type flex" data-nav="need-type"
					data-id="1"><span class="nav-tit"><?php echo $demand_type_name_a;?></span><i class="caret"></i></li>
				<li id="formats_z" class="dropdown-toggle formats flex nowrap" data-nav="formats"
					data-id="2"><span class="nav-tit"><?php echo $cshowname;?></span> <i class="caret"></i></li>
				<li id="city_z" class="dropdown-toggle city flex" data-nav="city" data-id="3"><span
					class="nav-tit"><?php echo $currentcityname;?></span> <i class="caret"></i></li>
				<!--  <li id="acreage_z" class="dropdown-toggle acreage flex <?php if ($type == 1){?> hide<?php }?>" data-nav="acreage"
					data-id="4"><span class="nav-tit"><?php echo $currentsizename;?></span> <i class="caret"></i></li>-->
			</ul>
		</div>
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
		<div class="dropdown-wrapper hide category">
			<div class="dropdown-module">
				<div class="scroller-wrapper cl">
					<div class="dropdown-scroller two-scroller" id="dropdown_scroller">
						<ul>
							<li data-id="1" class="need-type-wrapper list-wrapper "
								data-nav="need-type">
								<ul class="dropdown-list">
									<li data-need-type-id="1" <?php if ($type == 1){?> class="active"<?php }?>>拓展需求</li>
									<li data-need-type-id="2" <?php if ($type == 2){?> class="active"<?php }?>>招商需求</li>
								</ul>
							</li>
							<li data-id="2" data-nav="formats"
								class="formats-wrapper list-wrapper active">
								<ul class="dropdown-list" id="categoryone">
								</ul>
							</li>
							<li data-id="3" data-nav="city" class="city-wrapper list-wrapper">
								<ul class="dropdown-list" id="cityone">
									 <!-- <?php foreach ($area_arr as $key => $val){ $i = 1;?>
																		<li <?php if ($currentcityid == $key){?> class='activedisableone active' <?php }else {?> class='activedisable' <?php }?>data-city-id="<?php echo $key;?>"
																		data-city-name="<?php echo $val;?>"><?php echo $val;?></li>
																		<?php }?> -->
								</ul>
							</li>
							<li data-id="4" data-nav="acreage"
								class="acreage-wrapper list-wrapper">
								<ul class="dropdown-list">
									<li data-acreage-id="" data-acreage-name="全部"
										class="activedisableone">全部</li>
									<li class="activedisable <?php echo $size == 1?'active':"";?>" data-acreage-id="1"
										data-acreage-name="50以下">50㎡以下</li>
									<li class="activedisable <?php echo $size == 2?'active':"";?>" data-acreage-id="2"
										data-acreage-name="50-100">50-100㎡</li>
									<li class="activedisable <?php echo $size == 3?'active':"";?>" data-acreage-id="3"
										data-acreage-name="100-200">100-200㎡</li>
									<li class="activedisable <?php echo $size == 4?'active':"";?>" data-acreage-id="4"
										data-acreage-name="200-300">200-300㎡</li>
									<li class="activedisable <?php echo $size == 5?'active':"";?>" data-acreage-id="5"
										data-acreage-name="300-500">300-500㎡</li>
									<li class="activedisable <?php echo $size == 6?'active':"";?>" data-acreage-id="6"
										data-acreage-name="500以上">500㎡以上</li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="dropdown-sub-scroller two-scroller"
						id="dropdown_sub_scroller">
						<ul>
							<li class="list-wrapper formats-wrapper" data-nav="formats">
								<ul class="dropdown-list" id="categorytwo">
								</ul>
							</li>
							<li class="list-wrapper city-wrapper" data-nav="city">
								<ul class="dropdown-list" id="citytwo">
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="htmllist" class="detail_main need-list">
			<section class="detail_section margin-top-10 border-none need-top">
                <div class="detail_section_main detail_index_me detail_dongtai_item need-top-item">
                    <div class="detail_index_me_item">
                        <a href="/details/rankinglist" class="layout layout-align-start-center detail_index_tag">
                            <div class="flex layout layout-column">
                                <div class="font-size-18 gray333" style="line-height:45px;">热门需求排行榜</div>
                                <div class="font-size-12 gray999 hide">助力您快速招商选址</div>
                            </div>
                            <i class="icon_btn icon-more"></i>
                        </a>
                    </div>
                </div>
            </section>
  	<!--  -->
<!--   			<div class="need-verified layout layout-align-center-center"> -->
				<!--  <i class="icon_btn <?php if ($status == 2){?> icon_checked <?php }else {?> icon_check <?php }?> renzheng"></i> <span>只看认证用户发布的需求</span>-->
<!-- 			</div> -->
<!--             <div class="need-noData"> -->
<!--                 <p></p> -->
<!--             </div> -->
            
               <?php if (empty($res)&&empty($resTwo) && $type == 2){?>
               <div class="need-noData">
                <p>当前条件暂无拓展需求，</p>
                <p>快发布你的需求吧，让更多商业体找到你</p>
                </div>
                <?php }?>
               <?php if (empty($res)&&empty($resTwo) && $type == 1){?>
               <div class="need-noData">
                <p>当前条件暂无拓展需求，</p>
                <p>快发布你的需求吧，让更多品牌找到你</p>
                </div>
                <?php }?>
            <input type="hidden" name="roundUrl" value="<?php echo $url?>">
			<section  class="">
			<div class="btn_box btn_box_need margin-top-10 margin-bottom-10 width80">
				
				<?php if ($passport_type == 2 || $passport_type == 3){?>
				    <a href="/demand/businessneed" class="btn add-need-btn"><span class="layout layout-align-center-center"><div class="icon_btn icon_add"></div>&nbsp;我要发布需求</span></a>
			     <?php }else {?>
		            <a href="javascript:void(0)" id="add_need" class="btn add-need-btn"><span class="layout layout-align-center-center"><div class="icon_btn icon_add"></div>&nbsp;我要发布需求</span></a>	 
			     <?php }?>
			     
			</div>
                <div class="detail_need_list_wrap detail_need_list_wrap1 <?php if (empty($res)){?>hide<?php }?>">
                    <ul  data-scroll data-scroll-datarender class="need-list-wrapper">
                    <?php if ($type == 2 && !empty($res)){?>
                        <?php foreach ($res as $key=>$val){?>
                        <li>
                        <?php if ($val['extension'] == 1){?><a href="javascript:;" class="tui_btn">推广</a><?php }?>
							<a href="javascript:godemandshow('<?php echo $val['_id'];?>','<?php  if(isset($val['cs']['status'])){ echo '1';}else{ echo '0';} ?>')" data-ajax=false>
								<div class="need_item_top layout">
                            	<div class="face40">
                            		<img alt="" src="<?php echo $val['tag_build_logo']; ?>">
                            	</div>
                            	<div class="flex layout-column margin-left-10 need_item_top_right">
                            		 <div class="obj-name font-size-15"><span class="gray333"><?php echo $val['mall_name'];?><?php if($val['act_passport_id'] > 0){?><i class="need-h5book">H5</i><?php }?><?php if(isset($val['cs']['status'] )) {?><i class="need-h5book">$ 悬赏</i><?php } ?></span></span></div>
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
								<?php if (!empty($val['catestr'])){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">需求业态：</div>
										<div class="obj-tags obj-tags-width flex layout-column"><?php echo htmlspecialchars_decode($val['catestr']);?></div>
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
								<?php if (0){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">备注：</div>
										<div class="obj-tags flex"><?php  echo $val['demand_desc'];?></div>
									</div>
								<?php }?>
								<?php if (!empty($val['demand_ctime'])){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">发布日期：</div>
										<div class="obj-tags"><?php  echo $val['demand_ctime'];?></div>
									</div>
								<?php }?>

								</div>
							</a>
                        </li>
                        <?php }?>
                        <div data-scroll-url="<?php echo $ajaxurl;?>" class="hide"/></div>
                    <?php }else if ($type == 1 && !empty($res)){?>
                        <?php foreach ($res as $key=>$val){?>
                        <li>
							<a href="javascript:godemandshow('<?php echo $val['_id'];?>','<?php  if(isset($val['cs']['status'])){ echo '1';}else{ echo '0';} ?>')" data-ajax=false>
								<div class="need_item_top layout">
	                            	<div class="face40">
	                            		<img alt="" src="<?php echo $val['tag_brand_logo'];?>">
	                            	</div>
	                            	<div class="flex layout-column margin-left-10 need_item_top_right">
	                            		<div class="obj-name font-size-15"><span class="gray333"><?php echo $val['brand_name']?><?php if($val['act_passport_id'] > 0){?><i class="need-h5book">H5</i><?php }?><?php if(isset($val['cs']['status'])) {?><i class="need-h5book">$ 悬赏</i><?php } ?></span></div>
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
								<?php  if (!empty($val['catestr'])){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">业态：</div>
										<div class="obj-tags obj-tags-width flex layout-column">
										<?php echo htmlspecialchars_decode($val['catestr']);?>
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
								<?php if (0){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">备注：</div>
										<div class="obj-tags flex"><?php  echo $val['demand_desc'];?></div>
									</div>
								<?php }?>
								<?php if (!empty($val['demand_ctime'])){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">发布日期：</div>
										<div class="obj-tags"><?php  echo $val['demand_ctime'];?></div>
									</div>
								<?php }?>
								</div>
							</a>
                        </li>
                        <?php }?>
                        <div data-scroll-url="<?php echo $ajaxurl;?>" class="hide"/></div>
                    <?php }?>
                         
                    </ul>
                </div>
                <?php if ($isresTwo && $res && $type == 2 ){?>
                <div class="need-noData">
                   <p><a href="#" class="ui-link">查看更多招商需求</a></p>
                 </div>
                 <?php }elseif ($isresTwo && $type == 2){?>
                 <div class="need-noData">
                   <p><a href="#" class="ui-link">当前条件暂无结果，查看更多招商需求</a></p>
                 </div>
                 <?php }?>
                <?php if ($isresTwo && $res  && $type == 1 ){?>
                <div class="need-noData">
                  <p><a href="#" class="ui-link">当前条件暂无结果，查看更多拓展需求</a></p>
                 </div>
                 <?php }elseif ($isresTwo && $type == 1 ){?>
                         <div class="need-noData">
                  <p><a href="#" class="ui-link">当前条件暂无结果，查看更多拓展需求</a></p>
                 </div>
                 <?php }?>
                <?php if ($isresTwo){?>
                <div class="detail_section_main">
                    <ul class="need-list-wrapper">
                    <?php if ($type == 2 && !empty($resTwo)){?>
                      <?php foreach ($resTwo as $key=>$val){?>
                        <li>
                        <?php if ($val['extension'] == 1){?><a href="javascript:;" class="tui_btn">推广</a><?php }?>
							<a href="javascript:godemandshow('<?php echo $val['_id'];?>','<?php  if(isset($val['cs']['status'])){ echo '1';}else{ echo '0';} ?>')" data-ajax=false>
								<div class="need_item_top layout">
                            	<div class="face40">
                            		<img alt="" src="<?php echo $val['tag_build_logo']; ?>">
                            	</div>
                            	<div class="flex layout-column margin-left-10 need_item_top_right">
                            		 <div class="obj-name font-size-15"><span class="gray333"><?php echo $val['mall_name'];?><?php var_dump($val);?></span></div>
		                            <div class="obj_info_msg font-size-12">
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
								<?php if (!empty($val['catestr'])){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">需求业态：</div>
										<div class="obj-tags obj-tags-width flex layout-column"><?php echo htmlspecialchars_decode($val['catestr']);?></div>
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
								<?php if (0){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">备注：</div>
										<div class="obj-tags flex"><?php  echo $val['demand_desc'];?></div>
									</div>
								<?php }?>
								<?php if (!empty($val['demand_ctime'])){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">发布日期：</div>
										<div class="obj-tags"><?php  echo $val['demand_ctime'];?></div>
									</div>
								<?php }?>

								</div>
							</a>
                        </li>
                        <?php }?>
                        <?php }elseif ($type == 1){?>
                         <?php foreach ($resTwo as $key=>$val){?>
                        <li>
							<a href="javascript:godemandshow('<?php echo $val['_id'];?>','<?php  if(isset($val['cs']['status'])){ echo '1';}else{ echo '0';} ?>')" data-ajax=false>
								<div class="need_item_top layout">
	                            	<div class="face40">
	                            		<img alt="" src="<?php echo $val['tag_brand_logo'];?>">
	                            	</div>
	                            	<div class="flex layout-column margin-left-10 need_item_top_right">
	                            		<div class="obj-name font-size-15"><span class="gray333"><?php echo $val['brand_name']?><?php if($val['traffic_money']){ ?><i class="need-h5book">$</i><?php } ?><?php if($val['act_passport_id'] > 0){?><i class="need-h5book">H5</i><?php }?></span></div>
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
								<?php  if (!empty($val['catestr'])){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">业态：</div>
										<div class="obj-tags obj-tags-width flex layout-column"><?php echo htmlspecialchars_decode($val['catestr']);?></div>
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
								<?php if (0){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">备注：</div>
										<div class="obj-tags flex"><?php  echo $val['demand_desc'];?></div>
									</div>
								<?php }?>
								<?php if (!empty($val['demand_ctime'])){?>
									<div class="layout need-wrapper-item">
										<div class="obj-tag gray999">发布日期：</div>
										<div class="obj-tags"><?php  echo $val['demand_ctime'];?></div>
									</div>
								<?php }?>
								</div>
							</a>
                        </li>
                        <?php }?>
                        <?php }?>
                    </ul>
                </div>
                <?php }?>

                <!-- 分页 -->
                  <div class="text-center mb_page layout hide <?php //if ($pageShow == 0){echo "hide";}?>">
                    <div  class="mb_page_left flex layout layout-align-center-center goprepage">
                        <a href  class="page_btn <?php if ($currentPage <= 1) {?>page_gray<?php }else{ ?>btn_able <?php }?>ui-link"><span class="caret_left"></span></a>
                    </div>
                    <div  class="flex layout layout-align-center-center gonextpage">
                        <a href   class="page_btn <?php if ($currentPage == $totalPage) {?>page_gray<?php }else{ ?>btn_able <?php }?> ui-link"><span class="caret_right"></span></a>
                    </div>
                </div>
                <!-- 分页 -->
                <form action="/news/broadcast" method="get">
                	<input type='hidden' name="demand_type" value=<?php echo $type;?>> 
                	<input type='hidden' name="category" value="<?php echo $category;?>" >
                	<input type='hidden' name="categorytwo" value="<?php echo $categorytwo;?>">
					<input type='hidden' name="province" value = "<?php echo $province;?>">
                	<input type='hidden' name="city" value = "<?php echo $city;?>">
                	<input type='hidden' name="size" value="<?php echo $size;?>">
                	<input type='hidden' name="pagetype"  >
                	<input type='hidden' name="currentpage" value="<?php echo $currentPage;?>" >
                	<input type='hidden' name="totalpage" value="<?php echo $totalPage;?>" >
                	<input type='hidden' name="isyetai"  >
                	<input type="hidden" name="status" value="<?php echo $status;?>"> <!--status：1:不管认证还是没有认证 2:只看认证的-->
                </form>
                			</section>
			
		</div>
		<!-- shade -->
		<div class="shade hide">
		</div>
		</div>
		<!-- 发布需求弹框 2015-09-07 -->
		<div class="need_bottom_fiexd hide">
	        <i class="opacity"></i>
	        <div class="need_bottom_box">
	            <div class="btn_box flex layout layout-align-center-center">
	                <a href="/demand/businessneed" class="btn btn_default layout layout-align-center-center"><span class="layout layout-align-center-center">快速发布需求</span></a>
	            </div>
	            <div class="btn_box flex margin-top-20">
	                <a href="/demand/businessneed" class="btn add-need-btn layout layout-align-center-center"><span class="layout layout-align-center-center">制作H5品牌拓展手册</span></a>
	            </div>
	        </div>
	    </div>
		<script>
		$('#select_but .opacity').on('click',function() {
			$('#select_but').addClass('hide');
		});
		$("#htmllist").on('click','.renzheng',function(){
			var _this = $(this);
			var ischeck = _this.hasClass('icon_check');
			if(ischeck){
				   _this.removeClass('icon_check');
				   _this.addClass('icon_checked');
				   $('input[name="status"]').val('2');
				   ajaxSub();
			}else{
				   _this.removeClass('icon_checked');
				   _this.addClass('icon_check');
				   $('input[name="status"]').val('');
				   ajaxSub();
			}
			
		});

    		$(".text-center").on('click',".gonextpage",function(){
                if(parseInt($('input[name="currentpage"]').val()) >= parseInt($('input[name="totalpage"]').val())){
                           return false;
                        }
                $("input[name='pagetype']").val("next");
                ajaxSub();
        });

        $(".text-center").on('click','.goprepage',function(){
            if(parseInt($('input[name="currentpage"]').val()) <= 1){
                return false;
                }
                $("input[name='pagetype']").val("pre");
                ajaxSub();
        });

		function ajaxSub(){
		    location.href="/news/broadcast?"+$("form").serialize();
		}

		function godemandshow(id,type){
			var link_url = $("input[name='roundUrl']").val();
			if(type==0){
				var jump_show_url = '/ucenter/demandshow/demandid/'+id+'/url/'+link_url;
			}else if(type==1){
				var jump_show_url = '/cs/csinfo/csid/'+id+'/url/'+link_url;
			}

			location.href = jump_show_url;
		}

	    $('#add_need').click(function(){
	    	   $('#select_but').removeClass('hide');
		    });
		
		</script>
	