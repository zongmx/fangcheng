			<div class="detail_section_head layout layout-align-start-center">
					<div class="detail_section_tit font-size-14">我的资讯<span>({my_title})</span></div>
				</div>
				<div class="detail_section_main">
					<div class="detail_index_message">
						<ul class="list no-border" data-role="listview">
						<!-- begin mynews_list as k to v -->
							<li>
								<p class="detail_index_message_tit">
									<a href="{v['news_url']}" target="_blank">{v['news_title']}</a>
								</p>
								<span class="detail_index_message_data">{v['news_source']}</span>
								<span class="detail_index_message_data">{v['news_date']}</span>
							</li>
						<!-- end mynews_list -->	
						</ul>
					</div>
				</div>
				<div class="text-center mb_page layout">
                    <div class="mb_page_left flex layout layout-align-center-center">
                        <a {mynews_page['prev_page_url']} class="{mynews_page['prev_class']}" id="{mynews_page['prev_id']}" ><span class="caret_left"></span></a>
                    </div>
                    <div class="flex layout layout-align-center-center">
                        <a {mynews_page['next_page_url']} class="{mynews_page['next_class']}" id="{mynews_page['next_id']}" ><span class="caret_right"></span></a>
                    </div>
                </div>
