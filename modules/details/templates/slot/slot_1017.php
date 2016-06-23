 <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">流行指数</div>
                    <div class="detail_section_tag detail_custome_sel_one custom-slider-box layout layout-align-end-center">
                        <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" class="custom-slider">
                        
                                 <select name="select-custom-16" id="select-custom-16" onchange="changeperiod(this)">
                                    <option value="全部" <?php echo $args=='全部'? 'selected':'';?> >全部</option>
                                    <option value="半年" <?php echo $args=='半年'? 'selected':''; ?> >半年</option>
                                    <option value="90" <?php echo $args=='90'? 'selected':''; ?> >90天</option>
                                    <option value="30" <?php echo $args=='30'? 'selected':''; ?> >30天</option>
                                    <option value="7" <?php echo $args=='7'? 'selected':''; ?>>7天</option>
                                </select>
                        </fieldset>
                    </div>
                </div>

                <div class="detail_section_main">
                    <p class="liu_title">流行指数反映网上搜索量的趋势变化</p>
                    <div id="plot-popular-line" class="plot">
                        <script>

                                var container = $('#plot-popular-line');
                                var svgWidth = container.width();
                                var svgHeight = container.height();
                                charBaseOnD3.createLine( {
                                    svgWidth: svgWidth,
                                    svgHeight: svgHeight,
                                    width: svgWidth - 40,
                                    height: svgHeight - 70,
                                    margin: {
                                        top: 20
                                    },
                                    container: '#plot-popular-line',
                                    load: function( data ) {
                                        console.log(12121);
                                    },
                                    series:"/details/slot/id/1001/brand_id/<?php echo $brand_id?>/popular_type/<?php echo $args?>"
                                } )
                        </script>
                    </div>
                    
                    <div class="detail_index_message">
                        <ul class="list no-border" data-role="listview">
                           <?php  
                    
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
        <a href="" class="page_btn <?php echo $page>0? 'page_gray':($ct >0 ?'btn_able':'page_gray'); ?>" <?php echo $page>0? '':($ct >0 ?'onclick="next(1)"':''); ?> ><span class="caret_right"></span></a>
    </div>
</div>      

<script>
    function next(page){
      $.ajax({
            type:"post",
            url:"/details/slot/id/1017/brand_id/<?php echo $brand_id?>/popular_type/<?php echo $args?>/page/"+page,
            dataType:'html',
            success:function(e){
                $("#main_index_0").html(e);
                $("body").trigger( "create" );
               }
         });
    }
</script>
<script>
    function changeperiod(data){ 
      $.ajax({
            type:"post",
            url:'/details/slot/id/1017/brand_id/<?php echo $brand_id?>/popular_type/'+$(data).val(),
            dataType:'html',
            success:function(e){
                $("#main_index_0").html(e);
                $("body").trigger( "create" );
               }
         });
    }
</script>  
<?php if($count==0 && $args=='全部'){?>    
<script>
$("#main_index_0").hide();
</script> 
<?php }?>                 
