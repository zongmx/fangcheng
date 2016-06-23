<?php foreach ($assign as $key => $val){?>
    <li >
    <?php if ($val['extension'] == 1){?><a href="javascript:;" class="tui_btn">推广 </a><?php }?>
        <div class="shop_search_item layout" onclick="javascript:location.href='/details/mall/mall_id/<?php echo $val['mall_id']; ?>'">
            <div class="shop_logo face105"><img src="<?php echo $val['mall_logo'];?>" onerror="this.src='/img/detail/logo_big.png'"></div>
            <div class="shop_info flex layout-column">
                <p class="shop_info_tit"><?php echo !empty($val['mall_name'])?$val['mall_name']:'';?></p>
                <div class="scroll-area shop-scroll-area"><span class="area_c"><?php echo !empty($val['area_name'])?$val['area_name']:''; ?></span><span class="area_c"><?php echo !empty($val['business_name'])?$val['business_name']:''; ?></span><span class="tiliang"><?php echo !empty($val['mall_building_size'])?$val['mall_building_size'].'万㎡':''; ?></span> </div>
                <div class="radil_info  <?php echo (empty($val['res_3']) && empty($val['office_3']) && empty($val['travel_3']))?'hide':'';?>">
                    <p>半径3公里：</p>
                    <?php if (!empty($val['res_3'])){?>
                    <span>住宅人口<?php echo $val['res_3'];?>万</span>
                    <?php }?>
                    <?php if (!empty($val['office_3'])){?>
                    <span>办公人口<?php echo $val['office_3'];?>万</span>
                    <?php }?>
                    <?php if (!empty($val['travel_3'])){?>
                    <span>差旅人口<?php echo $val['travel_3'];?>万</span>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php if ($val['shop_count'] > 0){?>
        <div class="need-mate layout layout-align-start-center">
            <a href="#" class="layout layout-align-start-center flex ui-link">
                <p class="flex">共<span><?php echo $val['shop_count'];?></span>个商铺</p><a href="/details/mallbrandandcategory/mall_id/<?php echo $val['mall_id'];?>" class="need-mate-btn">查看</a>
            </a>
        </div>
        <?php }?>
    </li>
<?php }?>
<input data-scroll-url="<?php echo $data_scroll_url;?>" type="hidden" >
