    <div class="detail_section_main detail_section_top_border">
        <div class="detail_find_ul margin-top-10">
            <div class="detail_find_li">
                <div class="layout">
                <?php foreach ($list as $key => $val){?>
                    <div class="detail_find_li_item width33">
                        <a href="/details/mall/mall_id/<?php echo $val['id'];?>" class="ui-link">
                            <div class="item_img">
                                <img onerror="this.src='/img/detail/logo_big.png'" src="<?php echo $val['logo'];?>">
                            </div>
                            <p class="item_tit"><?php echo $val['name'];?></p>
                        </a>
                    </div>
                 <?php }?>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mb_page layout">
        <div class="mb_page_left flex layout layout-align-center-center likebrandpre">
            <a href="" class="page_btn <?php if ($goprepage){?> btn_able <?php }else {?>page_gray<?php }?>" ><span class="caret_left"></span></a>
        </div>
        <div class="flex layout layout-align-center-center likebrandnext">
            <a href="" class="page_btn <?php if ($goprenextpage){?> btn_able <?php }else {?>page_gray<?php }?>" ><span class="caret_right"></span></a>
        </div>
    </div>
    <form action="/details/slot" method="get" id="likebrandssss">
        <input type="hidden" name="mall_id" value="<?php echo $mall_id;?>">
        <input type="hidden" name="page" value="<?php echo $page;?>">
        <input type="hidden" name="totalpage" value="<?php echo $totalpage;?>">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="hidden" name="area_id" value="<?php echo $area_id;?>">
    </form>
<?php if(empty($list)){?>
<script type="text/javascript">
$(".likebrand").hide();
$(".likebrand_title").hide();
</script>
<?php }?>