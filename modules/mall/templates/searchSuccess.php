<section data-role="page" id="privateLetterSend" data-title="方橙-最专业的招商选址大数据平台" class="contain">
    <header data-role="header" data-theme="b" class="header">
        <a href="/mallshop/search" data-role="button" class="nav-icon-back ui-link ui-btn-left ui-btn ui-corner-all" role="button">商铺</a>
        <h1>商业体</h1>
    </header>
    <div class="nav-bar">
        <ul class="nav layout">
            <li id="areanav" class="dropdown-toggle flex" data-nav="city" data-step="3"><span class="nav-tit"><?php echo $showAreaName;?></span> <i class="caret"></i></li>
            <li id="shopneednav" class="dropdown-toggle flex hide" data-nav="formats"><span class="nav-tit">体量</span> <i class="caret"></i></li>
            <li id="sortnav" class="dropdown-toggle flex" data-nav="sort"><span class="nav-tit"><?php echo $sortName;?></span> <i class="caret"></i></li>
        </ul>
    </div>
    <div class="dropdown-wrapper hide"> <!--hide-->
        <div class="dropdown-module">
            <div class="scroller-wrapper cl">
                <div class="dropdown-scroller" id="dropdown_scroller"> <!-- two-scroller three-scroller-->
                    <ul>
                        <li data_deep="1" data-nav="city" class="city-wrapper list-wrapper">
                        </li >
                        <li data-nav="sort" class="sort-wrapper list-wrapper">
                            <ul id="searchSort" class="dropdown-list">
                                <li data-value="" <?php if ($sort == ""){?> class="active"<?php }?>>综合排序</li>
                                <li data-value="m_size-desc" <?php if ($sort == "m_size-desc"){?> class="active"<?php }?>>体量最大</li>
                                <li data-value="m_res_3-desc" <?php if ($sort == "m_res_3-desc"){?> class="active"<?php }?>>住宅人口最多</li>
                                <li data-value="m_office_3-desc" <?php if ($sort == "m_office_3-desc"){?> class="active"<?php }?>>办公人口最多</li>
                                <li data-value="travel_3-desc" <?php if ($sort == "travel_3-desc"){?> class="active"<?php }?>>差旅人口最多</li>
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
                    <h3>体量</h3>
                    <div class="text-center margin-bottom-10 orange hide">
                        <span><span id="size-from">0</span><span id="separateinfo">-</span><span id="size-to">3,000</span>㎡<span id="size-info">以上</span></span>
                    </div>
                    <div class="shop_slider">
                        <div id="slider"></div>
                    </div>
                    <div class="layout formwrapper gray999 font-size-12 margin-top-20 margin-bottom-20 ">
                        <div class="check_auto">
                            <span class="checked">筛选结果包括没有体量数据的商业体</span>
                        </div>
                    </div>
                    <div class="btn_box shop_search_btn">
                        <button id="search-shop" class="btn btn_full_able">搜索</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div data-scroll-content data-role="content" class="detail_content">
        <div class="detail_main shop-search-list">
            <div class="shop-search-noData <?php echo empty($assign)?"":'hide';?>">
                <p>没有找到适合的商业体</p>
                <p>请尝试其他区域或调整商业体条件</p>
            </div>
            <div data-scroll class="detail_section <?php echo empty($assign)?"hide":'';?> ">
                <div class="detail_section_main2">
                    <ul data-scroll-datarender class="shop-search-ul">
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
                    </ul>
                </div>
            </div>
        </div>

        <!-- shade -->
        <div class="shade hide"></div>
    </div>
</section>
<form id="data-form" action="" method="post" class="hide">
    <input id="data-area_ids" type="hidden" name="area_ids" value="<?php echo $area_ids;?>">
    <input id="data-m_area_name" type="hidden" name="m_area_name" value="<?php echo $m_area_name;?>">
    <input id="data-m_dis_name" type="hidden" name="m_dis_name" value="<?php echo $m_dis_name; ?>">
    <input id="data-m_bc_name" type="hidden" name="m_bc_name" value="<?php echo $m_bc_name;?>">
    <input id="data-m_area_name_id" type="hidden" name="m_area_name_id" value="">
    <input id="data-m_dis_name_id" type="hidden" name="m_dis_name_id" value="">
    <input id="data-m_bc_name_id" type="hidden" name="m_bc_name_id" value="">
  <!--    <input id="data-shop_size_gte" type="hidden" name="shop_size_gte" value="<?php echo $shop_size_gte;?>">
    <input id="data-shop_size_lte" type="hidden" name="shop_size_lte" value="<?php echo $shop_size_lte;?>">-->
    <input id="data-sort" type="hidden" name="sort" value="<?php echo $sort;?>">    
    <input id="data-page" type="hidden" name='page' value="<?php echo $page;?>">
</form>