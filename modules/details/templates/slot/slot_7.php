<div class="detail_section_main slot7">
    <div class="layout layout-align-center-center detail_buss_around">
        <div class="detail_buss_around_f flex layout layout-align-center-center">
            <div class="detail_custome_sel_one custom-slider-box layout layout-align-end-center">
                <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" class="custom-slider">
                        <select class="floors" name="" id="" data-native-menu="false" onchange="console.log(this.value)">
                    <?php foreach ($floorArr as $key => $val){?>
                        <?php if ($key == $floor){?>
                             <option value="<?php echo $key;?>" selected><?php echo $val?></option>
                         <?php }else {?>
                             <option value="<?php echo $key;?>" ><?php echo $val?></option>
                         <?php }?>
                    <?php }?>
                </select>
        </fieldset>
    </div>
</div>
<div class="detail_buss_around_f flex layout layout-align-center-center margin-left-10">
    <div class="detail_custome_sel_one custom-slider-box layout layout-align-end-center">
        <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" class="custom-slider">
                <select class="categorys" name="" id="" data-native-menu="false">
               <?php foreach ($category as $key=>$val){?>
                    <?php if ($key != $categoryid){?>
                     <option value="<?php echo $key;?>"><?php echo $val;?></option>
                    <?php }else {?>
                    <option value="<?php echo $key;?>" selected><?php echo $val;?></option>
                    <?php }?>
                <?php }?>
                </select>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="detail_survey_data margin-top-40">
        <div class="detail_survey_list_head layout">
            <div class="layout layout-align-start-center detail_survey_list_tr flex">
                <div class="width33">入驻品牌</div>
                <div class="width33">铺位号</div>
                <div class="width33">店铺面积(㎡)</div>
            </div>
        </div>
        <div class="detail_survey_list">
        <?php foreach ($list as $key => $val){?>
            <div class="layout detail_survey_list_tr">
                <div class="layout layout-align-start-center width33">
                    <div>
                        <div class="need-item-more"><a href="/details/brand/brand_id/<?php echo $val['Brand']?>" class="layout layout-align-end-center ui-link" data-ajax="false"><?php echo $val['Name']?></a></div>
                    </div>
                </div>
                <div class="layout layout-align-start-center width33"><?php echo $val['ShopNo'];?></div>
                <div class="layout layout-align-start-center width33"><?php echo empty($val['Area'])?'-':number_format(floor($val['Area']));?></div>
            </div>
        <?php }?>
        </div>
    </div>
</div>
<div class="text-center mb_page layout slot7" >
    <div class="mb_page_left flex layout layout-align-center-center categoryandbrandpre">
        <a class="page_btn <?php if ($goprepage){?> btn_able <?php }else {?>page_gray<?php }?>ui-link" href=""><span class="caret_left"></span></a>
    </div>
    <div class="flex layout layout-align-center-center categoryandbrandnext">
        <a class="page_btn <?php if ($gonextpage){?> btn_able <?php }else {?>page_gray<?php }?> ui-link" href=""><span class="caret_right"></span></a>
    </div>
</div>
<form class="slot7" id='cateandbrand' action='/details/slot/' method="get">
    <input type="hidden" name="category" value="<?php echo $categoryid;?>">
    <input type="hidden" name="page" value="<?php echo $page;?>">
    <input type="hidden" name="floor" value="<?php echo $floor;?>">
    <input type="hidden" name='mall_id' value="<?php echo $mall_id;?>">
    <input type="hidden" name='id' value="7">
    <input type="hidden" name='countpage' value="<?php echo $countpage;?>">
</form>