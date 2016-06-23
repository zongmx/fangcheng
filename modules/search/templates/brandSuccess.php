
<?php if(!empty($list)) {?>
            
                    <!-- begin list as k to v -->
					<div class="layout search-items">
						<a href="/details/brand/brand_id/{v['brand_id']}" class="flex layout" data-ajax="false">
							<div class="search_small_img face40 faceborder">
								<img onerror="this.src='/img/detail/logo_middle.png'" src="{v['brand_logo']}">
							</div>
							<div class="margin-left-10">
								<div class="">
									<span class="message_header_tit font-size-15">{v['brand_name']}</span>
								</div>
								<div class="gray717 message_header_job font-size-12">{v['category']}</div>
								<div class="gray717 message_header_job font-size-12">
									<span>{v['areaName']}</span>&nbsp;<span>{v['brand_shop_count']}家店</span>
								</div>
								<div class="gray717 message_header_job font-size-12">
									<?php if(!empty($v['count_needs'])){ ?><span>{v['count_needs']}条拓展需求</span>&nbsp;<?php } ?><span>{v['has_contact']}</span>
								</div>
							</div>
						</a>
					</div>
				<!-- end list -->
				<div data-scroll-url="{data_scroll_url}" class="hide"/></div>
                    
                    <?php if(!empty($result)) {?>
                    <div class="font-size-14 margin-top-20">你可能也会感兴趣的品牌</div>
                    <section class="detail_section margin-top-10">
                           <div class="detail_section_main search-item">
                               <?php foreach ($result as $k =>$v){?>
                                <div class="layout search-items">
            						<a href="/details/brand/brand_id/<?php echo $v['brand_id']?>" class="flex layout" data-ajax="false">
            							<div class="search_small_img face40 faceborder">
            								<img src="<?php echo $v['brand_logo']?>" onerror="this.src='/img/detail/logo_middle.png'">
            							</div>
            							<div class="margin-left-10">
            								<div class="">
            									<span class="message_header_tit font-size-15"><?php echo $v['brand_name']?></span>
            								</div>
            								<div class="gray717 message_header_job font-size-12"><?php echo $v['category']?></div>
            								<div class="gray717 message_header_job font-size-12">
            									<span><?php echo $v['brand_hq_cn']?></span>&nbsp;<span><?php echo $v['brand_shop_count']?>家店</span>
            								</div>
            								<div class="gray717 message_header_job font-size-12">
            									<span><?php echo $v['count_needs']?>条拓展需求</span>&nbsp;<span><?php echo $v['has_contact']?></span>
            								</div>
            							</div>
            						</a>
            					</div>
                           <?php }?>
                        </div>
                    </section>
                    <?php }?>
                

<?php }else{ ?>
<!-- 无搜索结果 -->

<div class="detail_content">
	<div class="search-nodata">
	<p>没有搜索到相关品牌</p><p>请尝试其它关键词</p><br><br>
	</div>
</div>
<?php }?>