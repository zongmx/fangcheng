<section data-role="page" id="main_index_1"  class="contain">
    <header data-role="header" data-theme="b" class="header">
        <a href="/" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-home ui-link ui-btn-left ui-btn ui-corner-all" data-ajax="false" role="button">首页</a>        <h1>商圈信息</h1>
        <div data-role="navbar" class="navbar">
            <ul>
                <li><a href="{dataurl}" class="ui-btn-active" data-ajax="false">商业数据</a></li>
                <li><a href="{infourl}" data-ajax="false">商圈概况</a></li>
            </ul>
        </div>
    </header>
    <div data-role="content" class="detail_content">
        <div class="detail_main">
            <section class="detail_main_h">
                <div class="detail_main_head detail_mall_head">
                    <div class="detail_head_filter"></div>
                    <div class="detail_main_head_tit layout layout-align-center-center">
                        <h2 class="text-center">{business_circle_name}商圈</h2>
                        <p class="text-center"></p>
                    </div>
                </div>
            </section>
            <section class="detail_section margin-top-20" id="categorys">
                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">商业体网上流行指数<span>（商圈内）</span></div>
                </div>
                <div class="detail_survey_data detail_section_main">
                    <div class="detail_survey_list_head layout">
                        <div class="layout layout-align-start-center detail_survey_list_tr flex">
                            <div class="width33">商业体</div>
                            <div class="width33">开业时间</div>
                            <div class="width33">流行指数</div>
                        </div>
                    </div>
                    <div class="detail_survey_list">
                    <!-- begin categorys as k to v -->
                        <div class="layout detail_survey_list_tr">
                            <div class="layout layout-align-start-center width33"><a href="/details/mall/mall_id/{v['mall_id']}" data-ajax="false"><span class="nowrap2">{v['mall_name']}</span></a></div>
                            <div class="layout layout-align-start-center width33">{v['opening_date']}</div>
                            <div class="layout layout-align-start-center width33">
                                <div class="custom-progress">
                                    <div class="custom-progress-bar" style="width: {v['percent']}"></div>
                                </div>
                            </div>
                        </div>
                     <!-- end categorys -->   
                    </div>
                </div>
                
                <div class="text-center mb_page layout">
                    <div class="mb_page_left flex layout layout-align-center-center">
                        <a {c_page['prev_page_url']} class="{c_page['prev_class']}" id="{c_page['prev_id']}" ><span class="caret_left"></span></a>
                    </div>
                    <div class="flex layout layout-align-center-center">
                        <a {c_page['next_page_url']} class="{c_page['next_class']}" id="{c_page['next_id']}" ><span class="caret_right"></span></a>
                    </div>
                </div>
                
            </section>
            
            <section class="detail_section margin-top-20">
                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">品牌网上流行指数<span>（商圈内）</span></div>
                    <div class="detail_section_tag detail_custome_sel_one custom-slider-box layout layout-align-end-center">
                    <form id="category" class="form-horizontal" action="{cate_Url}" method="{cate_method}">
                        <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" class="custom-slider">
                                <select name="category_id" id="select-custom-17" data-native-menu="false" onchange="submitform()">
                            		<!-- begin category_array as k to v -->
                                    <option value="{k}"  <?php if($k == 10000){ ?>selected<?php } ?>>{v} </option>
                                    <!-- end category_array -->
                                </select>
                        </fieldset>
                    </form>
                    </div>
                </div>
                <div id="brands">
                <div class="detail_survey_data detail_section_main">
                    <div class="detail_survey_list_head layout">
                        <div class="layout layout-align-start-center detail_survey_list_tr flex">
                            <div class="width33">品牌</div>
                            <div class="width33">店铺数量</div>
                            <div class="width33">流行指数</div>
                        </div>
                    </div>
                    <div class="detail_survey_list">
                        <!-- begin brands as k to v -->
                        <div class="layout detail_survey_list_tr">
                            <div class="layout layout-align-start-center width33"><a href="/details/brand/brand_id/{v['id']}" data-ajax="false"><span class="nowrap2">{v['name']}</span></a></div>
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
                </div>
            </section>
            <?php if (urldecode($mall_data)!='null'){ ?>
            <section class="detail_section margin-top-20">
                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">店铺数量业态占比<span>（商圈内）</span></div>
                </div>
                <div class="popular detail_section_main">
                    <div id="categoryPlot" class="plot">
                         <script>
                            $(function($mall_data) {
                                var container = $('#categoryPlot');
                                var svgWidth = container.width();
                                var svgHeight = container.height();
                                var pie = new d3pie( 'categoryPlot', {
                                    size: {
                                        pieOuterRadius: 75,
                                        pieInnerRadius: 42.5,
                                        canvasWidth: svgWidth,
                                        canvasHeight: svgHeight
                                    },
                                    data: {
                                        content: 
                                            <?php echo urldecode($mall_data);?>
                                    
                                    },
                                    mainLabel: {
                                        font: 'arial',
                                        fontSize: '12px',
                                        color: '#333'
                                    },
                                    labels: {
                                        inner: {
                                            format: {
                                                label: ''
                                            }
                                        },
                                        outer: {
                                            format: 'label'
                                        }
                                    },
                                    effects: {
                                        load: {
                                            effect: "none"
                                        },
                                        pullOutSegmentOnClick: {
                                            effect: "none"
                                        }
                                    },
                                    misc: {
                                        colors: {
                                            segments: [
                                                <?php echo urldecode($category_color);?>
                                            ]
                                        }
                                    }
                                } );
                            });

                        </script>
                    </div>
                </div>
            </section>
            <?php }?>
        </div>
    </div>
<?php __slot('passport','footer');?>
</section>
<script>

function getPage(url, idName){
	$.get(url, function(result){
	    $("#brands").html(result);
	    $("#b_next_page").click(function(){
			var href = $("#b_next_page").attr("href");
			getPage(href, "brands");
			return false;
			});
		$("#b_prev_page").click(function(){
			var href = $("#b_prev_page").attr("href");
			getPage(href, "brands");
			return false;
			});
	  });
}

$(function(){
	$("#b_next_page").click(function(){
		var href = $("#b_next_page").attr("href");
		getPage(href, "brands");
		return false;
		});
	$("#b_prev_page").click(function(){
		var href = $("#b_prev_page").attr("href");
		getPage(href, "brands");
		return false;
		});
});
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

function submitform(){
	$.ajax({
		type: "get",
		url:'{cate_Url}',
		data:$('#category').serialize(),// 你的formid
		dataType:"html",
	    success: function(data) {
	    	 $("#brands").html(data);
 		 	    $("#b_next_page").click(function(){
 		 			var href = $("#b_next_page").attr("href");
 		 			getPage(href, "brands");
 		 			return false;
 		 			});
 		 	    $("#b_prev_page").click(function(){
 		 			var href = $("#b_prev_page").attr("href");
 		 			getPage(href, "brands");
		 			return false;
		 			});
	    }
});
}

</script>
<!-- 微信类容 -->
<div class="hide" weixin-share-detail wxTitle="<?php echo empty($weixinzhuanfa['title'])?'':$weixinzhuanfa['title'];?>" wxDesc="<?php echo empty($weixinzhuanfa['desc'])?'':$weixinzhuanfa['desc'];?>" wxLink="<?php echo empty($weixinzhuanfa['link'])?'':$weixinzhuanfa['link'];?>" wxImgUrl="<?php echo empty($weixinzhuanfa['logo'])?'':$weixinzhuanfa['logo'];?>" class="hide"></div>
<script type='text/javascript'>
	var weixinShareDetail = $('[weixin-share-detail]');
	commonUtilInstance.forwardneed_weixin(weixinShareDetail.attr('wxTitle'),weixinShareDetail.attr('wxDesc'),weixinShareDetail.attr('wxLink'),weixinShareDetail.attr('wxImgUrl'));
</script>

