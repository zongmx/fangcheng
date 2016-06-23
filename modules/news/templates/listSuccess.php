	<div data-role="content" class="detail_content">
		<div class="detail_main">
		    
			<section class="detail_section" id="myNews">
				<div class="detail_section_head layout layout-align-start-center">
					<div class="detail_section_tit font-size-14">我的资讯<span>({my_title})</span></div>
				</div>
				<div class="detail_section_main">
					<div class="detail_index_message">
						<ul class="list no-border" data-role="listview">
						<!-- begin mynews_list as k to v -->
							<li>
								<p class="detail_index_message_tit">  
									<a href="{v['news_url']}" target="_blank" data-ajax="false">{v['news_title']}</a>
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
                        <a {mynews_page['prev_page_url']} class="{mynews_page['prev_class']}" id="{mynews_page['prev_id']}"  data-ajax="false"><span class="caret_left"></span></a>
                    </div>
                    <div class="flex layout layout-align-center-center">
                        <a {mynews_page['next_page_url']} class="{mynews_page['next_class']}" id="{mynews_page['next_id']}" data-ajax="false" ><span class="caret_right"></span></a>
                    </div>
                </div>
			</section>
			
			<section class="detail_section margin-top-20" id="cNews">
				<div class="detail_section_head layout layout-align-start-center">
					<div class="detail_section_tit font-size-14">行业资讯</div>
				</div>
				<div class="detail_section_main">
					<div class="detail_index_message">
						<ul class="list no-border" data-role="listview">
						<!-- begin cnews_list as k to v -->
							<li>
								<p class="detail_index_message_tit">
									<a href="{v['news_url']}" target="_blank" data-ajax="false">{v['news_title']}</a>
								</p>
								<span class="detail_index_message_data">{v['news_source']}</span>
								<span class="detail_index_message_data">{v['news_date']}</span>
							</li>
						<!-- end cnews_list -->
						</ul>
					</div>
				</div>
				<div class="text-center mb_page layout">
                    <div class="mb_page_left flex layout layout-align-center-center">
                        <a {cnews_page['prev_page_url']} class="{cnews_page['prev_class']}" id="{cnews_page['prev_id']}" data-ajax="false"><span class="caret_left"></span></a>
                    </div>
                    <div class="flex layout layout-align-center-center">
                        <a {cnews_page['next_page_url']} class="{cnews_page['next_class']}" id="{cnews_page['next_id']}" data-ajax="false"><span class="caret_right"></span></a>
                    </div>
                </div>
			</section>
		</div>
	</div>
	
 <?php __slot('passport', 'footer');?>


<script>
function getPage(url, idName){
	$.get(url, function(result){
	    $("#myNews").html(result);
	    $("#my_next_page").click(function(){
			var href = $("#my_next_page").attr("href");
			getPage(href, "myNews");
			return false;
			});
		$("#my_prev_page").click(function(){
			var href = $("#my_prev_page").attr("href");
			getPage(href, "myNews");
			return false;
			});
	  });
}

$(function(){
	$("#my_next_page").click(function(){
		var href = $("#my_next_page").attr("href");
		getPage(href, "myNews");
		return false;
		});
	$("#my_prev_page").click(function(){
		var href = $("#my_prev_page").attr("href");
		getPage(href, "myNews");
		return false;
		});
});
function cgetPage(url, idName){
	$.get(url, function(result){
	    $("#cNews").html(result);
	  });
	$("#c_next_page").click(function(){
		var href = $("#c_next_page").attr("href");
		cgetPage(href, "cNews");
		return false;
		});
	$("#c_prev_page").click(function(){
		var href = $("#c_prev_page").attr("href");
		cgetPage(href, "cNews");
		return false;
		});
}

$(function(){
	$("#c_next_page").click(function(){
		var href = $("#c_next_page").attr("href");
		cgetPage(href, "cNews");
		return false;
		});
	$("#c_prev_page").click(function(){
		var href = $("#c_prev_page").attr("href");
		cgetPage(href, "cNews");
		return false;
		});
});
</script>