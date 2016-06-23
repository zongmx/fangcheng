
<?php if(!empty($list)) {?>
            
                    <!-- begin list as k to v -->
					<div class="layout search-items">
						<a href="/details/brand/brand_id/{v['brand_id']}" brand="{v['brand_name']}" brand_id="{v['brand_id']}" category_ids="{v['category_ids']}" category_str="{v['category']}" class="flex layout" data-ajax="false">
							<div class="search_small_img face40 faceborder">
								<img onerror="this.src='/img/detail/logo_middle.png'" src="{v['brand_logo']}">
							</div>
							<div class="margin-left-10">
								<div class="">
									<span class="message_header_tit font-size-15">{v['brand_name']}</span>
								</div>
								<div class="gray717 message_header_job font-size-12">
									<span>{v['category']}</span>
								</div>
							</div>
						</a>
					</div>
				<!-- end list -->
				
<div data-scroll-url="{data_scroll_url}" class="hide"/></div>
<?php }else{ ?>
<!-- 无搜索结果 -->

<div class="detail_content">
	<div class="search-nodata">
	<p>没有搜索到相关品牌</p><p>请尝试其它关键词</p><br><br>
	</div>
</div>
<?php }?>