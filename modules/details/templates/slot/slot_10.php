
                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">店铺网上客流指数</div>
                    <div class="detail_section_tag detail_custome_sel_one custom-slider-box layout layout-align-end-center">
                        <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" class="custom-slider">
                                <select name="select-custom-17" id="select-custom-17" data-native-menu="false" onchange="next(1,this.value)">
                            		<!-- begin category as k to v -->
                                    <option value="{k}" <?php echo $k==$cat_id?'selected = "selected"':''; ?>>{v}</option>
                                    <!-- end category -->
                                </select>
                        </fieldset>
                    </div>
                </div>
                <div class="detail_survey_data detail_section_main">
                    <div class="detail_survey_list_head layout">
                        <div class="layout layout-align-start-center detail_survey_list_tr flex">
                            <div class="width33">品牌</div>
                            <div class="flex">客流指数</div>
							<div>周趋势</div>
                        </div>
                    </div>
                    
                    <!-- begin resultMsg as k to v -->
                    <div class="detail_survey_list">
                        <div class="layout detail_survey_list_tr">
                            <div class="layout layout-align-start-center width33"><span class="nowrap"><a href="/details/brand/brand_id/{v['id']}">{v['name']}</a></span></div>
                            <div class="layout layout-align-start-center flex">
                                <div class="custom-progress flex">
                                    <div class="custom-progress-bar" style="width: {v['percent']}%"></div>
                                </div>
                                <div class="detail_data_trend">
                                    <span class="{v['icon']}"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end resultMsg -->
                </div>
                <div class="text-center mb_page layout">
                    <div class="mb_page_left flex layout layout-align-center-center">
                        <a href="" class="page_btn <?php echo  $currentPage>1?'btn_able':'page_gray'; ?>" onclick="next(<?php echo  $currentPage>1?$currentPage-1:$currentPage; ?>,<?php echo $cat_id;?>)" ><span class="caret_left"></span></a>
                    </div>
                    <div class="flex layout layout-align-center-center">
                        <a href="" class="page_btn <?php echo  $currentPage>=$pagecount?'page_gray':'btn_able'; ?>" onclick="next(<?php echo  $currentPage==$pagecount?$pagecount:$currentPage+1; ?>,<?php echo $cat_id;?>)" ><span class="caret_right"></span></a>
                    </div>
                </div>
                <?php if (!$count){?>
                <script type="text/javascript">
                $('.shopzhishu').hide();
                </script>
                
                <?php }?>
       