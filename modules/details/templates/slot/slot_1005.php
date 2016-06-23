<div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">在该城市共有{count}家店铺</div>
                </div>
                <div class="detail_survey_data detail_section_main">
                    <div id="detail_survey_list_head_page" class="detail_survey_list_head layout">
                        <div class="layout detail_survey_list_tr flex">
                            <div class="width25 layout layout-align-start-center">店铺名称</div>
                            <div class="width25 layout layout-align-start-center">面积/楼层</div>
                            <div class="width25 layout layout-align-start-center">商圈</div>
                            <div class="width25 layout layout-align-start-center">开店时间</div>
                        </div>
                    </div>
                    <!-- 网上关注度高的店铺  -->
                     <div id="page—jt-fy">
 <div page="0" class="detail_survey_list">
<?php 
$i=1; 
foreach ($resultData as $key => $val){
    $address= \FC\Comm::getSubName($val['brand_shop_address']);
?>
   <div class="layout detail_survey_list_tr"> 
                            <div class="layout layout-align-start-center width25"><span class="nowrap"><?php echo !empty($val['mall_name'])?$val['mall_name']."店":(empty($val['business_circle_name'])?$address."店":$val['business_circle_name']."店")?></span></div>
                            <div class="layout layout-align-start-center width25"><?php echo $val['brand_shop_size']==0?"-":$val['brand_shop_size']?> / <?php echo $val['brand_shop_floor'] > 0 ? "F".$val['brand_shop_floor']:'-' ?></div>
                            <div class="layout layout-align-start-center width25"><?php echo $val['business_circle_name']?></div>
                            <div class="layout layout-align-start-center width25"><?php echo $val['brand_shop_opening_date']?></div>
                        </div>   
   <?php if($i%5==0 && $i/5 <6 && $i< $count){
   	?>
   	</div>
   	<div page="<?php echo $i/5; ?>" class="detail_survey_list hide">
   	<?php	
   } 
   $i++;
}?>
                        
 </div>
 </div>
                    <!-- /网上关注度高的店铺  -->
</div>
<div class="text-center mb_page layout">
                    <div updateData pre container="page" class="mb_page_left flex layout layout-align-center-center">
                        <a href class="page_btn page_gray" ><span class="caret_left"></span></a>
                    </div>
                    <div updateData next container="page" class="flex layout layout-align-center-center">
                        <a href class="page_btn <?php  echo $pagesize >= $count?"page_gray":"btn_able";?> " ><span class="caret_right"></span></a>
                    </div>
                </div>