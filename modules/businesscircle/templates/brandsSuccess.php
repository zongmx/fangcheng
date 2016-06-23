				<div class="detail_survey_data detail_section_main">
                    <div class="detail_survey_list_head layout">
                        <div class="layout layout-align-start-center detail_survey_list_tr flex">
                            <div class="width33">品牌</div>
                            <div class="width33">店铺数量</div>
                            <div class="width33">流行指数</div>
                        </div>
                    </div>
                    <div class="detail_survey_list" id="brands">
                        <!-- begin brands as k to v -->
                        <div class="layout detail_survey_list_tr">
                            <div class="layout layout-align-start-center width33"><a href="/details/brand/brand_id/{v['id']}" data-ajax="false"><span class="">{v['name']}</span></a></div>
                            <div class="layout layout-align-start-center width33">{v['num']}</div>
                            <div class="layout layout-align-start-center width33">
                                <div class="custom-progress">
                                    <div class="custom-progress-bar" style="width: {v['percent']}"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end brands -->   
                        
                    </div>
                </div>
                <div class="text-center mb_page layout">
                    <div class="mb_page_left flex layout layout-align-center-center">
                        <a {b_page['prev_page_url']} class="{b_page['prev_class']}" id="{b_page['prev_id']}" ><span class="caret_left"></span></a>
                    </div>
                    <div class="flex layout layout-align-center-center">
                        <a {b_page['next_page_url']} class="{b_page['next_class']}" id="{b_page['next_id']}" ><span class="caret_right"></span></a>
                    </div>
                </div>
                
<script type="text/javascript">
				
function cgetPage(url, idName){
	$.get(url, function(result){
	    $("#categorys").html(result);
	  });
	$("#c_next_page").click(function(){
		var href = $("#c_next_page").attr("href");
		cgetPage(href, "categorys");
		return false;
		});
	$("#c_prev_page").click(function(){
		var href = $("#c_prev_page").attr("href");
		cgetPage(href, "categorys");
		return false;
		});
}

$(function(){
	$("#c_next_page").click(function(){
		var href = $("#c_next_page").attr("href");
		cgetPage(href, "categorys");
		return false;
		});
	$("#c_prev_page").click(function(){
		var href = $("#c_prev_page").attr("href");
		cgetPage(href, "categorys");
		return false;
		});
});
</script>