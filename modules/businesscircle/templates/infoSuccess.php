<section data-role="page" id="main_index_1"  class="contain">
    <header data-role="header" data-theme="b" class="header">
        <a href="/" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-home ui-link ui-btn-left ui-btn ui-corner-all" data-ajax="false" role="button">首页</a>
        <h1>商圈信息</h1>
        <div data-role="navbar" class="navbar">
            <ul>
                <li><a href="{dataurl}" data-ajax="false">商业数据</a></li>
                <li><a href="{infourl}" class="ui-btn-active" data-ajax="false">商圈概况</a></li>
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
           <p class="font-size-16 gray999"> 统计数据以{main_mall_name}为中心进行计算</p>
            <section class="detail_section margin-top-10">
                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">人口概况<span>（总量及占本市百分比）</span></div>
                </div>
                <div class="detail_survey_data detail_section_main">
                    <div class="detail_survey_list_head layout">
                        <div class="layout layout-align-start-center detail_survey_list_tr flex">
                            <div class="width33"></div>
                            <div class="width33">1公里半径</div>
                            <div class="width33">3公里半径</div>
                        </div>
                    </div>
                    <div class="detail_survey_list">
                        <!-- begin population as k to v -->
                        <div class="layout layout-align-start-center detail_survey_list_tr">
                            <div class="layout layout-align-start-center width33"><span class="nowrap gray999">{k}</span></div>
                            <!-- begin v as k to value-->
                            <div class="layout-column layout-align-start-center width33">
                                <div class="">{value['num']}</div>
                                <div class="font-size-12 gray717">{value['percent']}</div>
                            </div>
                            <!-- end v -->
                        </div>
                        <!-- end population -->
                    </div>
                </div>
            </section>
            <div class="btn_box margin-top-10">
                <a href="/details/lookpopulationmap/population/1/distance/3/mall_id/{main_mall_id}/source/1/from/1" data-ajax="false" class="btn add-need-btn ui-link"><span class="layout layout-align-center-center">查看商圈地图</span></a>
            </div>
            <section class="detail_section margin-top-10">
                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">经济概况<span>（范围内平均值）</span></div>
                </div>
                <div class="detail_survey_data detail_section_main">
                    <div class="detail_survey_list_head layout">
                        <div class="layout layout-align-start-center detail_survey_list_tr flex">
                            <div class="width33"></div>
                            <div class="width33">1公里半径</div>
                            <div class="width33">3公里半径</div>
                        </div>
                    </div>
                    <div class="detail_survey_list">
                    
                    <!-- begin economic as k to v -->
                        <div class="layout layout-align-start-center detail_survey_list_tr">
                            <div class="width33 gray999">
                                {k}
                            </div>
                            <div class="width33">
                                <div class=""><?php echo $v['1km']=="0.00"?"-":$v['1km'];?></div>
                            </div>
                            <div class="width33">
                                <div class=""><?php echo $v['3km']=="0.00"?"-":$v['3km'];?></div>
                            </div>
                        </div>
                    <!-- end economic -->    
                       
                    </div>
                </div>
            </section>
            <section class="detail_section margin-top-20"  id="facility">
                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">设施统计<span>（半径3公里）</span></div>
                </div>
                <div class="detail_section_main detail_buss_info">
                    <div class="detail_buss_info_table">
                    <!-- begin facility as k to v -->
                        <div class="detail_buss_info_tr layout">
                            <div class="detail_buss_info_lable">{k}</div>
                            <div class="detail_buss_info_msg flex">{v['list']}等{v['num']}个</div>
                        </div>
                    <!-- end facility -->   
                    </div>
                </div>
                
            </section>
            <section class="detail_section margin-top-20">
                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">交通概况<span>（半径1公里）</span></div>
                </div>
                <div class="detail_section_main detail_buss_info">
                    <div class="detail_buss_info_table">
                        <div class="detail_buss_info_tr layout">
                            <div class="detail_buss_info_lable">地铁</div>
                            <div class="detail_buss_info_msg flex">{traffic['subway']}</div>
                        </div>
                        <div class="detail_buss_info_tr layout">
                            <div class="detail_buss_info_lable">公交</div>
                            <div class="detail_buss_info_msg flex">{traffic['bus']}</div>
                        </div>
                        <div class="detail_buss_info_tr layout">
                            <div class="detail_buss_info_lable">停车场</div>
                            <div class="detail_buss_info_msg flex">约{traffic['park']}个</div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php __slot('passport','footer');?>
</section>
<script>
function getPage(url, idName){
	$.get(url, function(result){
	    $("#facility").html(result);
	    $("#fa_next_page").click(function(){
			var href = $("#fa_next_page").attr("href");
			getPage(href, "facility");
			return false;
			});
		$("#fa_prev_page").click(function(){
			var href = $("#fa_prev_page").attr("href");
			getPage(href, "facility");
			return false;
			});
	  });
}

$(function(){
	$("#fa_next_page").click(function(){
		var href = $("#fa_next_page").attr("href");
		getPage(href, "facility");
		return false;
		});
	$("#fa_prev_page").click(function(){
		var href = $("#fa_prev_page").attr("href");
		getPage(href, "facility");
		return false;
		});
});

</script>
<div class="hide" weixin-share-detail wxTitle="<?php echo empty($weixinzhuanfa['title'])?'':$weixinzhuanfa['title'];?>" wxDesc="<?php echo empty($weixinzhuanfa['desc'])?'':$weixinzhuanfa['desc'];?>" wxLink="<?php echo empty($weixinzhuanfa['link'])?'':$weixinzhuanfa['link'];?>" wxImgUrl="<?php echo empty($weixinzhuanfa['logo'])?'':$weixinzhuanfa['logo'];?>" class="hide"></div>
<script type='text/javascript'>
	var weixinShareDetail = $('[weixin-share-detail]');
	commonUtilInstance.forwardneed_weixin(weixinShareDetail.attr('wxTitle'),weixinShareDetail.attr('wxDesc'),weixinShareDetail.attr('wxLink'),weixinShareDetail.attr('wxImgUrl'));
</script>
