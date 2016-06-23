     <div class="detail_survey_data detail_section_main">
    <div class="detail_survey_list_head layout">
                        <div class="layout detail_survey_list_tr flex">
                            <div class="width33 layout layout-align-start-center">店铺名称</div>
                            <div class="width33 layout layout-align-start-center">面积/楼层</div>
                            <div class="width33 layout layout-align-start-center">开店时间</div>
                        </div>
                    </div>
  <div class="detail_survey_list">
  <?php 
    unset($list['mall_id']);
    unset($list['mall_name']);
  foreach ($list as $key => $val){
        $business_circle_id= intval($val['business_circle_id']);
        $circle_name=FC\GetValue::getinfo('fangcheng_v2', 'business_circle', $business_circle_id,['business_circle_name']);
        $address= mb_strlen($val['brand_shop_address'])>16?mb_substr($val['brand_shop_address'], 0,8,'utf-8')."...":$val['brand_shop_address'];
        ?>
      <div class="layout detail_survey_list_tr">
          <div class="layout layout-align-start-center width33"><span class="nowrap2"><?php echo !empty($val['mall_name'])?$val['mall_name']."店":(empty($circle_name['business_circle_name'])?$address."店":$circle_name['business_circle_name']."店")?></span></div>
            <div class="layout layout-align-start-center width33">
           <?php echo empty($val['brand_shop_size'])?"-":$val['brand_shop_size'];?> / <?php echo $val['brand_shop_floor'] > 0 ? "F".$val['brand_shop_floor']:'-' ?>
            </div>
            <div class="layout layout-align-start-center width33"><?php echo date("Y",strtotime($val['brand_shop_opening_date']))?></div>
         </div>
   <?php }?>
                        
 </div>
 </div>
<div class="text-center mb_page layout">
                    <div class="mb_page_left flex layout layout-align-center-center">
                        <a class="page_btn <?php echo  $page['now']>1?'btn_able':'page_gray'; ?>" onclick="next(<?php echo  $page['now']>1?$page['now']-1:$page['now']; ?>,<?php echo $area_id;?>)" ><span class="caret_left"></span></a>
                    </div>
                    <div class="flex layout layout-align-center-center">
                        <a class="page_btn <?php echo  $page['now']>=$page['total']?'page_gray':'btn_able'; ?>" onclick="next(<?php echo  $page['now']==$page['total']?$page['total']:$page['now']+1; ?>,<?php echo $area_id;?>)" ><span class="caret_right"></span></a>
                    </div>
</div>
<?php if(empty($list)){?>
<script type="text/javascript">
$("#jqxk").hide();
</script>
<?php }else{ ?>
<script type="text/javascript">
$("#jqxk").show();
</script>
<?php }?>