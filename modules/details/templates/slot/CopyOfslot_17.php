 <div class="detail_section_head layout layout-align-start-center">
    <div class="detail_section_tit font-size-14">流行指数</div>
    <div class="detail_section_tag detail_custome_sel_one custom-slider-box layout layout-align-end-center">
        <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" class="custom-slider">
                <select name="select-custom-16" id="select-custom-16" data-native-menu="false">
                    <option value="#">面积比</option>
                    <option value="#">按房价排序</option>
                    <option value="#">按建成时间长排序</option>
                    <option value="#">按建成时间短排放</option>
                </select>
        </fieldset>
    </div>
</div>
<div class="detail_section_main">
    <p class="liu_title">流行指数反映网上搜索量的趋势变化</p>
    <div class="detail_index_message">
        <ul class="list no-border" data-role="listview">
<?php  
$k=array("A","B","C","D","E","F","G","H","I","J");
  foreach ($news as $key => $val){?>                    
<li>
    <div class="layout">
        <div class="detail_num"><em class="wd layout layout-align-center-start"><?php echo $k[$key]?></em> </div>
        <div class="">
            <p class="detail_index_message_tit font-size-14">
                <a href="<?php echo $val['title_url']?>"><?php echo $val['title']?></a>
            </p>
            <span class="detail_index_message_data "><?php $sourse=explode(' ',$val['source']);echo $sourse['0']?></span>
            <span class="detail_index_message_data"><?php echo $sourse['1']?></span>
        </div>
    </div>
</li>
<?php }?>
</ul>
    </div>
</div>

<div class="text-center mb_page layout">
    <div class="mb_page_left flex layout layout-align-center-center">
        <a href="" class="page_btn <?php echo $page>0? 'btn_able':'page_gray'; ?>" <?php echo $page>0? 'onclick="next(0)"':''; ?>  ><span class="caret_left"></span></a>
    </div>
    <div class="flex layout layout-align-center-center">
        <a href="" class="page_btn <?php echo $page<1? 'btn_able':'page_gray'; ?>" <?php echo $page>0? 'onclick="next(1)"':''; ?> ><span class="caret_right"></span></a>
    </div>
</div>      