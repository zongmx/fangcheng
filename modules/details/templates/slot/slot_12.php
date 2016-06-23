<?php if($result){?>
                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">业态平均客单价<span>（￥）</span></div>
                </div>
                <div class="detail_survey_data detail_section_main">
                    <div class="detail_survey_list_head layout">
                        <div class="layout layout-align-start-center detail_survey_list_tr flex">
                            <div class="width50">业态</div>
                          <!--  <div class="width33">客单价范围</div> --> 
                            <div class="width50">客单价平均值</div>
                        </div>
                    </div>
                    <div class="detail_survey_list">
                        <!-- begin resultMsg as k to v -->
                        <div class="layout layout-align-start-center detail_survey_list_tr">
                            <div class="layout layout-align-start-center width50"><span class="nowrap">{v['category']}</span></div>
                        <!--    <div class="layout-column layout-align-start-center width33">{v['min']}-{v['max']}</div> --> 
                            <div class="layout-column layout-align-start-center width50">{v['avg']}</div>
                        </div>
                        <!-- end resultMsg -->
                        
                    </div>
                </div>
 <?php  if(empty(resultMsg)){?>  
<script>
$(".customerprice").hide();
</script> 
<?php }}?>