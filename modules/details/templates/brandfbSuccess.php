  <input type="hidden" name="brand_id" value="<?php echo $brand_id;?>">
  <input type="hidden" name="area_id" value="{firstcity['area_id']}">
  <input type="hidden" name="area_name" value="{firstcity['name']}">
    <div class="nav-bar layout <?php if(empty($firstcity['area_id'])) { echo 'hide';}?>">
        <div class="width33">
            <ul class="nav layout">
            <li class="dropdown-toggle city flex" data-nav="city" data-id="3"><span class="nav-tit">{firstcity['name']}</span> <i class="caret"></i></li>
        </ul>
        </div>
        <div class="width66 font-size-16 gray999 layout layout-align-center-center">
            <span>( 部分城市数据暂未开放 )</span>
        </div>
    </div>
    <div class="dropdown-wrapper hide category">
        <div class="dropdown-module">
            <div class="scroller-wrapper cl">
                <div class="dropdown-scroller two-scroller" id="dropdown_scroller">
                    <ul>
                        <li data-id="3" data-nav="city" class="city-wrapper list-wrapper">
                            <ul class="dropdown-list">
                            <!-- begin citylist as key to value -->
                                <li data-city-id="1" data-city-name="{value}" data-city-value="{key}"><i class="check_bg"></i>{value}</li>
                            <!-- end citylist -->
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="dropdown-sub-scroller two-scroller" id="dropdown_sub_scroller">
                    <ul>
                        <li class="list-wrapper formats-wrapper" data-nav="formats">
                            <ul class="dropdown-list city">
                                <li class="all" data-formats-id="1" data-formats-name="全部来源"><i class="check_bg"></i>全部来源</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
   <section id="cuowutishi"  class="detail_noDataM <?php if (!empty($citylist)){?>hide<?php }?>">
            <div class="no_data_map layout layout-align-center-center">
                <img src="/img/detail/pic_brand_2.png" />
            </div>
            <div class="detail_noData layout layout-align-center-center">
                <div>
                    <p>点击关注后，</p>
                    <p>我们会帮你更快完善此品牌数据</p>
                </div>
            </div>
            <div class="layout layout-align-center-center">
            <?php if($_SESSION['userinfo']['passport_id']){?>
            <?php if ($isAttention){?>
                <div class="btn_box attention_ed" onclick="commonUtilInstance.unfollow(this,<?php echo $brand_id;?>,1)">
                    <div class="btn layout layout-align-center-center">
                        <span class="icon_btn icon_attention"></span>
                        <span>已关注</span>
                    </div>
                </div>
            <?php }else {?>
            <div class="btn_box attention" onclick="commonUtilInstance.follow(this,<?php echo $brand_id;?>,1)">
                    <div class="btn layout layout-align-center-center">
                        <span class="icon_btn icon_attention"></span>
                        <span>关注</span>
                    </div>
            </div>
            <?php }?>
            
            <?php }else{ ?>
            <div class="btn_box attention" onclick="window.location.href='/passport/loginjump/jump/{jumpurl}'">
                    <div class="btn layout layout-align-center-center">
                        <span class="icon_btn icon_attention"></span>
                        <span>关注</span>
                    </div>
            </div>
            <?php }?>
            </div>
        </section>
    <div data-role="content" id="xinxilist" class="detail_content <?php if (empty($citylist)){?>hide<?php }?>">
        <div class="detail_main">
            <section class="detail_section margin-top-10">
                <div class="custom-btn layout layout-align-center-center">
                    <a class="ui-link layout layout-align-center-center" data-ajax="false" href="javascript:lookmapdistribute()">
                        <div class="icon_btn icon_map"></div>
                        <div class="icon_reply_msg">查看店铺分布</div>
                    </a>
                </div>
            </section>
             <script type="text/javascript">
             function lookmapdistribute(){
            	 var brand_id = $('input[name="brand_id"]').val();
            	 var area_id = $('input[name="area_id"]').val();
            	 var area_name = $('input[name="area_name"]').val();
            	 var url = '/details/shopdistributemap/brand_id/'+brand_id+'/area_id/'+area_id+'/area_name/'+encodeURI(area_name);
            	 location.href=url;
          	   }
             </script>
            <section id="page" class="detail_section margin-top-20">
                
                     
                     
               
                
            </section>
             <script type="text/javascript"> 
                     /*
                      *网上关注度比较高的店铺js
                      */ 
                      $(function(){
                    	  var area_id = $('input[name="area_id"]').val();
                    	  popularmall(area_id); 
                      }); 
                      function popularmall(area_id){
                    	  $.ajax({
                              type:"post",
                              url:'/details/slot/id/1005/brand_id/<?php echo $brand_id;?>/pagesize/5/area_id/'+area_id,
                              dataType:'html',
                              success:function(e){
                                  $("#page").html(e);
                                 }
                           });
                          }
                    </script> 
           <!--  <section class="detail_section margin-top-10" id="jqxk">
                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">近期新开业店铺</div>
                    <div class="detail_content_tag custom-slider-box">

                    </div>
                </div>
                     <div id="page—dt-fy">
                    
                    网上关注度高的店铺  
                    </div>
<script>
/*
 *近期新开业店铺js
 */
 $(function(){
  var area_id = $('input[name="area_id"]').val();
  next(1,area_id);
 }); 
function next(page,area_id){
 $.ajax({
        type:"post",
        url:'/details/slot/id/1006/brand_id/<?php echo $brand_id;?>/page/'+page+'/area_id/'+area_id,
        dataType:'html',
        success:function(e){
            $("#page—dt-fy").html(e);
            $("#populationStation").trigger( "create" );
           }
     });
    }
</script>
                </div>
            </section>  -->


        </div>
    </div>