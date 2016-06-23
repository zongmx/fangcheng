<div data-role="content" class="detail_content <?php if (!$resultShow){echo 'hide';}?>">
        <div class="detail_main">
          <!--    <section class="detail_section"  id="main_index_0">
                
            </section> -->
            <!-- 流行指数-->
                        
                <!-- /流行指数 -->
             <script type="text/javascript">  
//                       $(function(){
//                           $.ajax({
//                               type:"post",
 //                             url:"/details/slot/id/22/mall_id/<?php // echo $mall_id?>/popular_type/全部",
//                               dataType:'html',
//                               success:function(e){
//                                   $("#main_index_0").html(e);
                                  
//                                  }
//                            })
//                       }); 
                     
                    </script> 
            <section class="detail_section margin-top-20 keliuzhisuh">
                <!-- 客流指数 -->
            </section>
            <script type="text/javascript">
                $(function(){
                    $.ajax({
                        type:"post",
                        url:'/details/slot/id/20/mall_id/<?php echo $mall_id?>',
                        dataType:'html',
                        success:function(e){
                            $(".keliuzhisuh").html(e);
                            $("body").trigger( "create" );
                           }
                     })
                });
            </script>
            <section class="detail_section margin-top-20 likepeople"> 
            <!-- 对品牌感兴趣的网上人群 -->

            </section>
            <script type="text/javascript">
                $(function(){
                    $.ajax({
                        type:"post",
                        url:'/details/slot/id/11/mall_id/<?php echo $mall_id?>',
                        dataType:'html',
                        success:function(e){
                            $(".likepeople").html(e);
                            $("body").trigger( "create" );
                           }
                     })
                });
            </script>
            <section class="detail_section margin-top-20 customerprice">
                <!-- 人口概况 -->
            </section>
            
            <script type="text/javascript">
                $(function(){
                    $.ajax({
                        type:"post",
                        url:'/details/slot/id/12/mall_id/<?php echo $mall_id?>',
                        dataType:'html',
                        success:function(e){
                            $(".customerprice").html(e);
                           }
                     })
                });
            </script>
        </div>
    </div>
<section class="detail_noDataM <?php if ($resultShow){echo 'hide';}?>">
        <div class="no_data_map layout layout-align-center-center">
            <img src="/img/detail/pic_mall_4.png">
        </div>
        <div class="detail_noData layout layout-align-center-center">
            <div>
                <p>点击关注后，</p>
                <p>我们会帮你更快完善此商业体数据</p>
            </div>
        </div>
        <div class="layout layout-align-center-center">
            <div class="btn_box attention">
            <?php if($_SESSION['userinfo']['passport_id']){?>
                <?php if ($isAttention){?>
                <div class="btn_box attention_ed" onclick="commonUtilInstance.unfollow(this,<?php echo $mall_id;?>,2)">
                    <div class="btn layout layout-align-center-center">
                        <span class="icon_btn icon_attention"></span>
                        <span>已关注</span>
                    </div>
                </div>
            <?php }else {?>
            <div class="btn_box attention" onclick="commonUtilInstance.follow(this,<?php echo $mall_id;?>,2)">
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
        </div>
    </section>
    <?php __slot('passport','footer');?>