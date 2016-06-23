<script type="text/javascript">
$('body').css('visibility', 'hidden');
</script>
	<div data-scroll data-scroll-content data-role="content" class="detail_content">
		<div class="detail_main_news">
		    <section class="detail_section detail_section_border">
                <div class="detail_section_main detail_index_me detail_dongtai_item">
                    <div class="detail_index_me_item">
                        <a href="/passport/dynamic/" class="layout layout-align-start-center detail_index_tag">
                            <div class="flex">
                                <span class="font-size-15 gray333">动态</span>
                            </div>
                            <span class="{dynamicClass}">{dynamicNum}</span>
                            <i class="icon_btn icon-more"></i>
                        </a>
                    </div>
                </div>
            </section>
            
			<section class="detail_section margin-top-20">
				<!-- div class="detail_section_head layout layout-align-start-center">
					<div class="detail_section_tit font-size-14">私信列表</div>
				</div -->

				<div id="sender">
					<div class="detail_section_main detail_index_message_main">
						<div class="detail_index_message ">
							<ul data-scroll-datarender class="list privateLetterList no-border customBorder"
								data-role="listview">
							<div data-scroll-url="{data_scroll_url}" class="hide"/></div>
						    <?php if($official){?>
						    <!-- begin official as k to value -->
								<li data-icon="false">
										<div class="message_top layout">
											<div class="face40">
												<a href="/ucenter/index/passport_id/{value['recevier_id']}" data-ajax="false"><img src="{value['picture']}"></a>
											</div>
											
											<div class="flex">
											
											<div class="message_info layout-column flex margin-left-10">
												<div class="layout">
													<div class="flex layout layout-align-start-center">
														<span class="message_header_tit font-size-15"  ><a href="/ucenter/index/passport_id/{value['recevier_id']}">{value['name']}</a></span>
														<?php if ($value['status'] == 2){?>
														<span class="icon_btn icon_v"></span>
														<?php }else {?>
														<span class="font-size-12 gray999">(未认证)</span>
														<?php }?>
													</div>
													<span class="message_header_date gray717 font-size-12">{value['msg_sender_utime']}</span>
												</div>
												<a href="<?php if(!empty($value['msg_sender_id'])){?>/letter/view/msg_sender_id/{value['msg_sender_id']}<?php }else{?>/letter/send/receiver_id/1<?php }?>" data-ajax="false">
												<div class="gray717 message_header_job font-size-12">{value['job']}</div>
												<div class="gray717 message_header_item font-size-12 cl">
													<p class="message_header_items fl"><?php if($value['project_count']){ ?>负责<?php } ?>{value['project']}</p>
													<?php if($value['project_count']){ ?><span class="fl message_header_items_num">等{value['project_count']}个项目</span><?php } ?>
												</div>
												
												</a>
												<div class="message_info">
													<a href="/letter/view/msg_sender_id/{value['msg_sender_id']}" data-ajax="false">
													<p <?php if($value['is_status'] == -1){ ?> class="yet-reply" <?php }else{ ?> class="no-read" <?php }?>>
														<?php if($value['is_status'] == 1 || $value['is_status'] == -1) {?>
														 <span class="icon_read flex"></span>
														<?php }?>
														 {value['msg_content_body']}
													</p>
													</a>
												</div>
											</div>
											
											</div>
											
										</div>
										
								</li>
								<!-- end official -->
						<?php }?>		
						
						        <!-- begin list as k to value -->
								<li data-icon="false">
										<div class="message_top layout">
											<div class="face40">
												<a href="/ucenter/index/passport_id/{value['recevier_id']}" data-ajax="false"><img src="{value['picture']}"></a>
											</div>
											
											<div class="flex">
											
											<div class="message_info layout-column flex margin-left-10">
												<div class="layout">
													<div class="flex layout layout-align-start-center">
														<span class="message_header_tit font-size-15"  ><a href="/ucenter/index/passport_id/{value['recevier_id']}">{value['name']}</a></span>
														<?php if ($value['status'] == 2){?>
														<span class="icon_btn icon_v"></span>
														<?php }else {?>
														<span class="font-size-12 gray999">(未认证)</span>
														<?php }?>
													</div>
													<span class="message_header_date gray717 font-size-12">{value['msg_sender_utime']}</span>
												</div>
												<a href="/letter/view/msg_sender_id/{value['msg_sender_id']}" data-ajax="false">
												<div class="gray717 message_header_job font-size-12">{value['job']}</div>
												<div class="gray717 message_header_item font-size-12 cl">
													<p class="message_header_items fl"><?php if($value['project_count']){ ?>负责<?php } ?>{value['project']}</p>
													<?php if($value['project_count']){ ?><span class="fl message_header_items_num">等{value['project_count']}个项目</span><?php } ?>
												</div>
												
												</a>
												<div class="message_info">
												<a href="/letter/view/msg_sender_id/{value['msg_sender_id']}" data-ajax="false">
													<p <?php if($value['is_status'] == -1){ ?> class="yet-reply" <?php }else{ ?> class="no-read" <?php }?>>
														<?php if($value['is_status'] == 1 || $value['is_status'] == -1) {?>
														 <span class="icon_read flex"></span>
														<?php }?>
														 {value['msg_content_body']}
													</p>
													</a>
												</div>
											</div>
											
											</div>
											
										</div>
									
								</li>
								<!-- end list -->
						        <?php if(empty($list) && empty($official)){ ?>
									<!-- 没有数据的 统一提示-->
									<div class="detail_noData layout layout-align-center-center">
										<div>
											<p>暂无私信对话</p>
										</div>
									</div>
								<?php }?>
							
						</ul>
						</div>
					</div>
				</div>

			</section>


			<div class="refresh_box hide" id="pullUp">
				<div class="layout layout-align-center-center margin-top-10">
					<span class="icon_btn_15 icon_btn_refres"></span> 
					<a href="/letter/index" class="" data-ajax="false">
						<span class="pullUpLabel gray333">刷新</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	
	<?php __slot('passport','footer');?>
