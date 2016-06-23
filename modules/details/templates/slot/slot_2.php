<div class="layout layout-align-center-center detail_buss_around">
    <div class="detail_buss_around_f flex layout layout-align-center-center">
        <div class="detail_custome_sel_one custom-slider-box layout layout-align-end-center">
            <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" class="custom-slider">
                    <select class="population" name="" id="" data-native-menu="false">
                   <!-- 类型以及选择 -->

                    <?php foreach ($relation['population'] as $key => $val){?> 
                        <?php if (!in_array($key, $unsetkey) && ($key == $population)){?>
                         <option value="<?php echo $key;?>" class="popus" selected><?php echo $val?></option>
                        <?php }elseif (!in_array($key, $unsetkey)) {?>
                        <option value="<?php echo $key;?>" class="popus"><?php echo $val?></option>
                        <?php }?>
                    <?php }?>
                    
                    </select>
            </fieldset>
        </div>
    </div>
    <div class="detail_buss_around_f flex layout layout-align-center-center margin-left-10">
        <div class="detail_custome_sel_one custom-slider-box layout layout-align-end-center">
            <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" class="custom-slider">
                    <select class='distance' name="" id="" data-native-menu="false">
                <!-- 距离选择 -->   
             <?php foreach ($relation['distance'] as $key => $val){?>
                    <?php if (!in_array($key, $unsetkey) && ($key == $distance)){?>
                        <option value="<?php echo $key;?>" selected><?php echo '半径'.$key.'公里';?></option>
                    <?php }elseif (!in_array($key, $unsetkey)){?>
                         <option value="<?php echo $key;?>"><?php echo '半径'.$key.'公里';?></option>
                    <?php }?>
                <?php }?>
                    </select>
            </fieldset>
        </div>
    </div>
</div>

<div class="detail_buss_around_info">
<?php if ($population == 4){?>
	<p><?php echo htmlspecialchars_decode($rank_count_desc);?></p>
<?php }elseif($population == 5) {?>
    <p>高校<em><?php echo $highSchoolnum[$distance]; ?></em>所,中小学<em><?php echo $middleSchoolnum[$distance]; ?></em>所,幼儿园<em><?php echo $childSchoolnum[$distance]; ?></em>所</p>
<?php }?>
<?php if($population != 5) {?>
    <p>人口数量<em><?php echo number_format($populationList['total']); ?></em>人</p>
    <?php if($populationList['upper']){?>   
    <p>与去年同期相比上升<em><?php echo $populationList['upper']?>%<span style="font-size: 16px;">&nbsp;↑</span></em></p>
    <?php }?>
<?php }?>
</div>
<div class="detail_custome_sel_one custom-slider-box layout layout-align-end-center">
    <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" class="custom-slider">
            <select class='searchOptions' name="select-custom-16" id="select-custom-16" data-native-menu="false">
                <!-- 排序选择 -->
                <?php foreach ($relation['searchOptions'][$population] as $key => $val){?>
                    <?php if (!in_array($key, $unsetkey) && ($key == $sortkey)){?>
                      <option value="<?php echo $key;?>" selected><?php echo $val;?></option>
                      <?php }else if (!in_array($key, $unsetkey)){?>
                       <option value="<?php echo $key;?>"><?php echo $val;?></option>
                      <?php }?>
                <?php }?>
            </select>
    </fieldset>
</div>
<div class="detail_survey_data">
    <div class="detail_survey_list_head layout">
        <div class="layout layout-align-start-center detail_survey_list_tr flex">
            <?php foreach ($relation['showOptions'][$population] as $key => $val){?>
                <?php if ($population == 5){?>
                <div class="width50"><?php echo $val;?></div>
                <?php }else {?>
            <div class="width33"><?php echo $val;?></div>
            <?php }?>
            <?php }?>
        </div>
    </div>
    <div class="detail_survey_list">
    <?php foreach ($list as $key => $val){ //__d($val['opening_date']);?>
        <?php if ($population == 1){?>
        <div class="layout detail_survey_list_tr">
            <div class="layout layout-align-start-center width33">
                <div>
                    <div class="nowrap"><?php echo $val['name']?></div>
                    <div class="gray999 font-size-12"><?php echo date('Y',strtotime($val['opening_date']));?></div>
                </div>
            </div>
            <div class="layout layout-align-start-center width33"><?php echo empty($val['house_total'])?'-':number_format($val['house_total'])?></div>
            <div class="layout layout-align-start-center width33"><?php echo empty($val['price'])?'-':number_format(ceil($val['price']/100))?></div>
        </div>
        <?php }elseif ($population == 3){?>
        <div class="layout detail_survey_list_tr">
            <div class="layout layout-align-start-center width33">
                <div>
                    <div class="nowrap"><?php echo $val['name']?></div>
                    <div class="gray999 font-size-12"><?php echo date('Y',strtotime($val['opening_date']));?></div>
                </div>
            </div>
            <div class="layout layout-align-start-center width33"><?php echo number_format($val['size_total']);?></div>
            <div class="layout layout-align-start-center width33"><?php echo empty($val['rent_price'])?'-':sprintf('%.2f',number_format(ceil($val['rent_price']/100)))?></div>
        </div>
        <?php }elseif ($population == 4){?>
        <div class="layout detail_survey_list_tr">
            <div class="layout layout-align-start-center width33">
                <div>
                    <div class="nowrap"><?php echo $val['name']?></div>
                    <div class="gray999 font-size-12"><?php echo $hotal_rank[$val['rank']];?></div>
                </div>
            </div>
            <div class="layout layout-align-start-center width33"><?php echo $val['room_total'];?></div>
            <div class="layout layout-align-start-center width33"><?php echo empty($val['rent_price'])?'-':number_format(ceil($val['rent_price']/100))?></div>
        </div>
        <?php }elseif ($population == 5){?>
        <div class="layout detail_survey_list_tr">
            <div class="layout layout-align-start-center width50"><?php echo $val['poi_name'];?></div>
            <div class="layout layout-align-start-center width50"><?php echo $poi_level_school[$val['poi_level']];?></div>
        </div>
        <?php }?>
    <?php }?>
    </div>
</div>

<form id='aroundpopulationinfo' method="get" action='/details/slot/'>
    <input name="population" value="<?php echo $population;?>" type="hidden">
    <input name="distance" value="<?php echo $distance;?>" type="hidden">
    <input name="sortkey" value="<?php echo $sortkey;?>" type="hidden">
    <input name="id" value="2" type="hidden">
    <input name="mall_id" value="<?php echo $mall_id;?>" type="hidden">
</form>