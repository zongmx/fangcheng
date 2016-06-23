    <div class="nav-bar shop_search_nav">
        <ul class="nav layout">
            <li id="areanav" class="dropdown-toggle flex" data-nav="city" data-step="3"><span class="nav-tit"><?php echo $showAreaName;?></span> <i class="caret"></i></li>
            <li id="shopneednav" class="dropdown-toggle flex" data-nav="formats">
				<span class="nav-tit">
					<?php if(empty($req['size_change']) && empty($req['category_change'])) {?>
						店铺要求
					<?php }elseif(empty($req['size_change'])) {?>
						业态
					<?php }elseif(empty($req['category_change'])) {?>
						面积
					<?php }else{?>
						面积、业态
					<?php }?>
				</span> 
				<i class="caret"></i>
			</li>
            <li id="sortnav" class="dropdown-toggle flex" data-nav="sort"><span class="nav-tit"><?php echo $sortArrName;?></span> <i class="caret"></i></li>
        </ul>
    </div>
    <div class="dropdown-wrapper hide"> <!--hide-->
        <div class="dropdown-module">
            <div class="scroller-wrapper cl">
                <div class="dropdown-scroller dropdown_scroller_shop" id="dropdown_scroller"> <!-- two-scroller three-scroller-->
                    <ul>
                        <li data_deep="1" data-nav="city" class="city-wrapper list-wrapper">
                        </li >
                        <li data-nav="sort" class="sort-wrapper list-wrapper">
                            <ul id="searchSort" class="dropdown-list">
                                <li data-value="" <?php if (empty($req['sort'])){?> class="active" <?php }?>>综合排序</li>
                                <li data-value="s_size-desc" <?php if ($req['sort'] == 's_size-desc'){?>class="active"  <?php }?>>店铺面积最大</li>
                                <li data-value="s_size-asc" <?php if ($req['sort'] == 's_size-asc'){?>class="active"  <?php }?> >店铺面积最小</li>
                                <li data-value="m_size-desc" <?php if ($req['sort'] == 'm_size-desc'){?>class="active"  <?php }?> >商业体体量最大</li>
                                <li data-value="m_res_3-desc" <?php if ($req['sort'] == 'm_res_3-desc'){?>class="active"  <?php }?> >住宅人口最多</li>
                                <li data-value="m_office_3-desc" <?php if ($req['sort'] == 'm_office_3-desc'){?>class="active"  <?php }?> >办公人口最多</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="dropdown-scroller dropdown-sub-scroller hide" id="dropdown_sub_scroller"> <!-- two-scroller-->
                    <ul>
                        <li data_deep="2" class="list-wrapper city-wrapper" data-nav="city">
                        </li>
                    </ul>
                </div>
                <div class="dropdown-scroller dropdown-three-scroller hide" id="dropdown_three_scroller">
                    <ul>
                        <li data_deep="3" class="list-wrapper city-wrapper" data-nav="city">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
	<div class="hide" id="showneeddropdown">
        <ul>
            <li>
                <div class="shop_search_drop">
                    <h3>店铺面积</h3>
                    <div class="text-center margin-bottom-10 orange hide">
                        <span><span id="size-from">0</span><span id="separateinfo">-</span><span id="size-to">3,000</span>㎡<span id="size-info">以上</span></span>
                    </div>
                    <div class="shop_slider">
                        <div id="slider"></div>
                    </div>
                    <h3>意向业态</h3>
                    <div class="purpose_formats">
                        <ul id="category_list" class="cl">
                            <li data-value="" <?php if (empty($req['s_cat1_id'])){?>class="current"<?php }?>><span>不限</span></li>
                            <?php foreach ($categoryOne as $key => $val){?>
                                <li <?php if ($req['s_cat1_id'] == $key){?> class="current" <?php }?> data-value="<?php echo $val;?>" data-id="<?php echo $key?>"><span><?php echo $val;?></span></li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="btn_box shop_search_btn">
                        <button id="search-shop" class="btn btn_full_able">搜索</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div data-role="content" class="detail_content gray_bg">
        <div class="detail_main shop-search-list">
        	<section class="detail_section margin-top-20 border-none need-top">
                <div class="detail_section_main detail_index_me detail_dongtai_item need-top-item shop-top-item">
                    <div class="detail_index_me_item">
                        <a href="<?php echo $aroundLink;?>" class="layout layout-align-start-center detail_index_tag">
                            <div class="flex layout layout-column">
                                <div class="font-size-18 gray333" style="line-height:45px;">查看此区域内的商业体</div>
                            </div>
                            <i class="icon_btn icon-more"></i>
                        </a>
                    </div>
                </div>
            </section>
           <?php if (empty($showArray)){?>
            <div class="shop-search-noData">
                <p>没有找到适合的店铺</p>
                <p>请尝试其他区域或调整店铺条件</p>
            </div>
            <?php }?>
            <div class="detail_section ">
                <div class="detail_section_main2">
                    <ul class="shop-search-ul">
                    <?php foreach ($showArray as $key => $val){?>
                        <li>
                        <?php if ($val['extension'] == 1){?><a href="javascript:;" class="tui_btn">推广</a><?php }?>
                            <div class="shop_search_item layout" onclick="javascript:location.href='/details/lookmallroommap/mall_id/<?php echo $val['m_id']?>/floor/<?php echo $val['s_floor_bank']?>/fromsearch/1/selectedShopId/<?php echo $val['_id'];?>/mall_name/<?php echo $val['m_name'];?>/hasContact/<?php echo $val['hasContact'];?>'">
                                <div class="shop_logo face105"><img src="<?php echo $val['logo'];?>" onerror="this.src='/img/detail/logo_big.png'"  ></div>
                                <div class="shop_info flex layout-column">
                                    <h3><?php if (!empty($val['s_size'])){?><span class="area"><?php echo $val['s_size'].'㎡';?></span><?php }?><?php if (!empty($val['s_floor'])){?><span><?php echo $val['s_floor'];?></span><?php }?><?php if (!empty($val['s_cat1_name'])){?><span><?php echo $val['s_cat1_name'];?></span><?php }?></h3>
                                    <p class="shop_info_tit"><?php echo empty($val['m_name'])?'':$val['m_name'];?></p>
                                    <div class="scroll-area"><?php if (!empty($val['m_area_name'])){?><span><?php echo $val['m_area_name'];?></span><?php }?><?php if (!empty($val['m_bc_name'])){?><span class="area_c"><?php echo $val['m_bc_name'];?></span><?php }?><?php if (!empty((int)$val['m_size'])){?><span class="tiliang"><?php echo $val['m_size'].'万㎡';?></span><?php }?> </div>
                                    <div class="radil_info">
                                        <p>半径3公里：</p>
                                        <?php if (!empty($val['m_res_3'])){?>
                                            <span>住宅人口<?php echo $val['m_res_3'];?>万</span>
                                        <?php }?>
                                        <?php if (!empty($val['m_office_3'])){?>
                                            <span>办公人口<?php echo $val['m_office_3'];?>万</span>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                </div>
<?php if (!empty($showArray)){?>
<div class="text-center mb_page layout margin-bottom-30">
    <div class="mb_page_left flex layout layout-align-center-center goprepage">
        <a href="javascript:page('pre','<?php echo  $page['pre'];?>')" class="<?php echo $page['pre']?'btn_able':'page_grayui-link'; ?> page_btn page_grayui-link ui-link" ><span class="caret_left"></span></a>
    </div>
    <div class="flex layout layout-align-center-center gonextpage">
        <a href="javascript:page('next','<?php echo  $page['next'];?>')" class="page_btn <?php echo $page['next']?'btn_able':'page_grayui-link'; ?>  ui-link"><span class="caret_right"></span></a>
    </div>
</div>
<?php }?>
            </div>
        </div>
        <!-- shade -->
        <div class="shade hide"></div>
    </div>
    <?php __slot('passport','footer');?>
<form id="data-form" action="/mallshop/search" method="post" class="hide">
    <input id="data-area_ids" type="hidden" name="area_ids" value="<?php echo empty($req['area_ids'])?'':$req['area_ids'];?>">
    <input id="data-m_area_name" type="hidden" name="m_area_name" value="<?php echo empty($req['m_area_name'])?'':$req['m_area_name'];?>">
    <input id="data-m_dis_name" type="hidden" name="m_dis_name" value="<?php echo empty($req['m_dis_name'])?'':$req['m_dis_name'];?>">
    <input id="data-m_bc_name" type="hidden" name="m_bc_name" value="<?php echo empty($req['m_bc_name'])?'':$req['m_bc_name'];?>">
    <input id="data-m_area_name_id" type="hidden" name="m_area_name_id" value="<?php echo empty($req['m_area_name_id'])?'':$req['m_area_name_id'];?>">
    <input id="data-m_dis_name_id" type="hidden" name="m_dis_name_id" value="<?php echo empty($req['m_dis_name_id'])?'':$req['m_dis_name_id'];?>">
    <input id="data-m_bc_name_id" type="hidden" name="m_bc_name_id" value="<?php echo empty($req['m_bc_name_id'])?'':$req['m_bc_name_id'];?>">
    <input id="data-s_cat1_id" type="hidden" name="s_cat1_id" value="<?php echo empty($req['s_cat1_id'])?'':$req['s_cat1_id'];?>">
    <input id="data-s_cat1_name" type="hidden" name="s_cat1_name" value="<?php echo empty($req['s_cat1_name'])?'':$req['s_cat1_name'];?>">
    <input id="data-shop_size_gte" type="hidden" name="shop_size_gte" value="<?php echo !isset($req['shop_size_gte'])?0:$req['shop_size_gte'];?>">
    <input id="data-shop_size_lte" type="hidden" name="shop_size_lte" value="<?php echo !isset($req['shop_size_lte'])?3010:$req['shop_size_lte'];?>">
    <input id="data-sort" type="hidden" name="sort" value="<?php echo empty($req['sort'])?'':$req['sort'];?>">
    <input id="data-page" type="hidden" name="page" value="<?php echo empty($req['page'])?1:$req['page'];?>">
    <input id="data-size_change" type="hidden" name="size_change" value="<?php echo empty($req['size_change'])?0:$req['size_change'];?>">
	<input id="data-category_change" type="hidden" name="category_change" value="<?php echo empty($req['category_change'])?0:$req['category_change'];?>">
</form>
<script type="text/javascript">
function page(type,isdo){
	if(type == 'pre' && isdo){
		$("#data-page").val(parseInt($("#data-page").val())-1);
	}else if(type == 'next' && isdo){
		$("#data-page").val(parseInt($("#data-page").val())+1);
	}
	if(isdo){
	   location.href='/mallshop/search/?'+ encodeURI($('#data-form').serialize()) ;
	}else{
		return false;
	}
}
</script>