                
                <?php if($area_id) {?>
                <div class="detail_section_head layout layout-align-space-between-center">
                    <div class="detail_section_tit font-size-14">客单价</div>
                    <div class="detail_section_tag detail_custome_sel_one custom-slider-box layout layout-align-end-center">
                        <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" class="custom-slider">
                                <select name="select-custom-16" id="select-custom-16" data-native-menu="false" onchange="ChangeCity(this.value)">
                                    <?php foreach ($price_city as $k){?>
                                    <option value="<?php echo $k['area_id']?>" <?php echo $k['area_id']==$area_id?'selected = "selected"':'';?>><?php echo $k['name']?></option>                               
                            <?php }?>
                                </select>
                        </fieldset>
                    </div>
                </div>
                <div class="detail_survey_data detail_section_main" >
                 <div class="detail_survey_list margin-bottom-10">
                        <div class="layout layout-align-start-center flex detail_buss_around_info">
                            <p><?php echo $name;?>平均客单价<em >¥<?php echo ceil($avg/100);?></em></p>
                        </div>
                    </div>
                    <div class="detail_survey_list_head layout">
                        <div class="layout layout-align-start-center detail_survey_list_tr flex">
                            <div class="width50">客单价高的店铺</div>
                            <div class="width50 layout layout-align-center-center">客单价</div>

                        </div>
                    </div>
                   
                    <div class="detail_survey_list">
                     <?php  
                      foreach ($info as $key => $val){
                            $business_circle_id= intval($val['business_circle_id']);
                            $circle_name=FC\GetValue::getinfo('fangcheng_v2', 'business_circle', $business_circle_id,['business_circle_name']);
                            $address= mb_strlen($val['brand_shop_address'])>16?mb_substr($val['brand_shop_address'], 0,8,'utf-8')."...":$val['brand_shop_address'];
                      ?>
                        <div class="layout detail_survey_list_tr">
                            <div class="layout layout-align-start-center width50"><span class="nowrap"><?php echo !empty($val['mall_name'])?$val['mall_name']."店":(empty($circle_name['business_circle_name'])?$address."店":$circle_name['business_circle_name']."店")?></span></div>

                            <div class="layout layout-align-center-center width50">
                                <span>¥<?php echo ceil($val['brand_shop_avg_price']/100)?></span>
                            </div>
                        </div>
<?php }?>
                             
                    </div>     
                </div>
                <?php }?>

                              