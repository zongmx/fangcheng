<section id="cuowutishi"  class="detail_noDataM <?php if ($total > 0){?>hide<?php }?>">
            <div class="no_data_map layout layout-align-center-center">
                <img src="/img/detail/pic_brand_3.png" />
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
<div data-role="content" class="detail_content <?php if ($total <= 0){?>hide<?php }?>">
        <div class="detail_main">
        <script type="text/javascript">  
//                       $(function(){
//                           $.ajax({
//                               type:"post",
 //                             url:'/details/slot/id/1017/brand_id/<?php //echo $brand_id?>/popular_type/全部',
//                               dataType:'html',
//                               success:function(e){
//                                   $("#main_index_0").html(e);
//                                   $("body").trigger( "create" );
//                                  }
//                            })
//                       }); 
                     
                    </script> 
                    
         <!--    <section class="detail_section"  id="main_index_0">
                
            </section> 
             流行指数 -->
                        
                <!-- 、/流行指数-->
            <section id="main_index_1" class="detail_section margin-top-20">
                
                        <!-- 客流指数 -->
                        
                        <!-- 、客流指数 -->
                   
            </section>
            <script type="text/javascript">  
                      $(function(){
                          $.ajax({
                              type:"post",
                              url:'/details/slot/id/1003/brand_id/<?php echo $brand_id?>',
                              dataType:'html',
                              success:function(e){
                                  $("#main_index_1").html(e);
                                  $("body").trigger( "create" );
                                 }
                           })
                      }); 
                     
                    </script> 
            <section id='main_index_2' class="detail_section margin-top-20">
               
                    <!-- 对品牌感兴趣的网上人群-->
                        
                    <!-- /对品牌感兴趣的网上人群 -->
                        
                   

            </section>
             
                    <script type="text/javascript">  
                      $(function(){
                          $.ajax({
                              type:"post",
                              url:'/details/slot/id/1008/brand_id/<?php echo $brand_id?>',
                              dataType:'html',
                              success:function(e){
                                  $("#main_index_2").html(e);
                                  $("body").trigger( "create" );
                                 }
                           })
                      }); 
                     
                    </script> 
            <section class="detail_section margin-top-20" id='kjd_2'>
               
            </section>
     <?php if($price_city[0]['area_id']){?>
     <script type="text/javascript">  
      $(function(){
          $.ajax({
              type:"post",
              url:'/details/slot/id/1010/brand_id/<?php echo $brand_id?>/area_id/<?php echo $price_city[0]['area_id'];?>',
              dataType:'html',
              success:function(e){
                  $("#kjd_2").html(e);
                  $("body").trigger( "create" );
                 }
           })
      }); 
     function ChangeCity(area){
    	 //alert('/details/slot/id/1010/brand_id/25496/area_id/'+area.value);
    	 //alert($(area).find("option:selected").text());
    	 $.ajax({
             type:"post",
             url:'/details/slot/id/1010/brand_id/<?php echo $brand_id?>/area_id/'+area,
             dataType:'html',
             success:function(e){
                 $("#kjd_2").html(e);
                 $("body").trigger( "create" );
                }
          });
 	    
     }
    </script>
    <?php }?> 
            
        </div>
    </div>