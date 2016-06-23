

<?php if(!empty($list)) {?>

                    <!-- begin list as k to v -->
					<div class="layout search-items">
						<a href="/details/mall/mall_id/{v['mall_id']}"  mall="{v['mall_name']}" mall_id="{v['mall_id']}" area_id="{v['area_id']}" area_name="{v['areaname']}" business_circle_name="{v['business_circle']}" business_circle_id="{v['business_circle_id']}" class="flex layout" data-ajax="false">
							<div class="search_small_img face40 faceborder">
								<img src="{v['mall_logo']}" onerror="this.src='/img/detail/logo_middle.png'">
							</div>
							<div class="margin-left-10">
								<div class="">
									<span class="message_header_tit font-size-15">{v['mall_name']}</span>
								</div>
								<div class="gray717 message_header_job font-size-12">
									<span>{v['areaname']}</span><span class="<?php if($v['areaname']) {?>margin-left-10<?php }?>"> <?php if($v['business_circle']){ ?>{v['business_circle']}<?php }else{ ?>{v['mall_address']}<?php }?></span>
								</div>
							</div>
						</a>
					</div> 
				<!-- end list -->
				
<div data-scroll-url="{data_scroll_url}" class="hide"/></div>		
<?php }else{ ?>

<!-- 无搜索结果 -->
<div class="detail_content">
	<div class="search-nodata"><p>没有搜索到相关商业体</p><p>请检查所在城市或尝试其它关键词</p><br><br></div>
</div>

<?php }?>
