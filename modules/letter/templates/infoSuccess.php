	
					   <div data-scroll-url="{data_scroll_url}" class="hide"/></div>
						    <!-- begin list as k to value -->
							<li data-icon="false">
								<a href="/letter/view/msg_sender_id/{value['msg_sender_id']}" data-ajax="false" class="no-padding backgroundFff" data-transition="slide">
									<div class="message_top layout">
										<div class="face40"><img src="{value['picture']}"></div>
										<div class="message_info margin-left-10">
											<div class="layout">
												<div class="flex">
													<span class="message_header_tit font-size-15">{value['name']}</span>
													<span class="icon_btn icon_v"></span>
												</div>
												<span class="message_header_date gray717 font-size-12">{value['msg_sender_utime']}</span>
											</div>
											<div class="gray717 message_header_job font-size-12">{value['job']}</div>
											<div class="gray717 message_header_item font-size-12 layout">
												<span class="message_header_items flex">负责{value['project']}</span>
												<span>{value['project_count']}个项目</span>
											</div>
										</div>
									</div>
									<div class="message_info">
										<p class="no-read"><?php if($value['is_status'] == 2) {?><span class="icon_read"></span><?php } ?>{value['msg_content_body']}</p>
									</div>
								</a>
							</li>
							<!-- end list -->
