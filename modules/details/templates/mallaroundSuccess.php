
<div data-role="content"
	class="detail_content <?php if (!$resultShow){echo 'hide';}?> gray_bg">
	<div class="detail_main">
		<section class="detail_section populationgailan">
			<div class="detail_section_head layout layout-align-start-center">
				<div class="detail_section_tit font-size-14">人口概览</div>
			</div>
			<div id='populationStation' class="detail_section_main">
				<!-- 人口概览 -->

				<!-- 人口概 -->
			</div>

			<script type="text/javascript">
                    $(function(){
                        $.ajax({
                            type:"post",
                            url:'/details/slot/id/2/mall_id/<?php echo $mall_id?>',
                            dataType:'html',
                            success:function(e){
                                if(e.length < 100){
                                	$(".populationgailan").addClass('hide');
                                }else{
                                   	 $("#populationStation").html(e);
                                     $("#populationStation").trigger( "create" );
                                 }
                               }
                         });
                    });
                    $("body").on('change','.population',function(){
                        var _populationv = this.value;
                        $("input[name='population']").val(_populationv);
                       $("input[name='sortkey']").val('');
                        
                        aroundpopulationinfoAjax();
                    });
                    $("body").on('change','.distance',function(){
                        var _distance = this.value;
                        $("input[name='distance']").val(_distance);
                        aroundpopulationinfoAjax();
                        $("#populationStation").trigger( "create" );
                    });
                    $("body").on('change','.searchOptions',function(){
                       	 var _sortkey = this.value;
                         $("input[name='sortkey']").val(_sortkey);
                         aroundpopulationinfoAjax();
                         $("#populationStation").trigger( "create" );
                    });
                    function aroundpopulationinfoAjax(){
                        $("#aroundpopulationinfo").ajaxSubmit({
                            dataType:'html',
                            success:function(e){
                                $("#populationStation").html(e);
                                $("#populationStation").trigger( "create" );
                                }
                            });
                    }
                    function lookPopulationMap(){
                    	var _populationv =  $("input[name='population']").val();
                    	var _distance =  $("input[name='distance']").val();
                    	var _mall_id = <?php echo $mall_id;?>;
                    	var url = '/details/lookpopulationmap/population/'+_populationv+'/distance/'+_distance+'/mall_id/'+_mall_id;
                    	window.location.href=url;
                    }
                </script>
		</section>
		<div style="font-size: 12px;color:#999;height:30px;line-height:30px;">表格仅显示前5项数据，更多信息请查看人口分布地图。</div>
		<section class="detail_section populationgailan">
			<div class="custom-btn layout layout-align-center-center">
				 <a class="ui-link layout layout-align-center-center" href=""> 
					 <div class="icon_btn icon_map"></div> 
					 <div class="icon_reply_msg" style="color: #ffffff;" onclick="lookPopulationMap()">查看人口分布地图</div>
				</a>
				
			</div>
		</section>
		<section class="detail_section margin-top-20 pupulationnumbers">
			<!-- 人口数量 -->
		</section>
		<script type="text/javascript">
            $(function(){
                $.ajax({
                    type:"post",
                    url:'/details/slot/id/3/mall_id/<?php echo $mall_id?>',
                    dataType:'html',
                    success:function(e){
                        if(e.length < 50 ){
                            $(".pupulationnumbers").addClass('hide');
                        }else{
                            $(".pupulationnumbers").html(e);
                            }
                       }
                 })
            });
            </script>
		<section class="detail_section margin-top-20 shangquanxinxi">
			<!-- 商圈信息 -->
		</section>
		<script type="text/javascript">
            $(function(){
                $.ajax({
                    type:"post",
                    url:'/details/mallinfo/id/<?php echo $mall_id?>',
                    dataType:'html',
                    success:function(e){
                        if(e.length < 50){
                                $(".shangquanxinxi").addClass('hide');
                            }else{
                                $(".shangquanxinxi").html(e);
                            }
                       }
                 })
            });
            </script>
		<section class="detail_section margin-top-20 aroundview">
			<!-- 周边概览 -->
		</section>
		<script type="text/javascript">
            $(function(){
                $.ajax({
                    type:"post",
                    url:'/details/slot/id/5/mall_id/<?php echo $mall_id?>',
                    dataType:'html',
                    success:function(e){
                        if(e.length < 50){
                        	$(".aroundview").addClass('hide');
                            }else{
                                $(".aroundview").html(e);
                         }
                       }
                 })
            });

            $('body').on('click','.likebrandpre',function(){
                var _page = $("input[name='page']").val();
                if(_page <= 1){
            	    return false;
                }
                var _page = parseInt(_page) - 1;
                $("input[name='page']").val(_page);
                likebrandAjax();
                
             });
             $('body').on('click','.likebrandnext',function(){
                 var _page = $("input[name='page']").val();
                 var _totalpage = $("input[name='totalpage']").val();
                 if(_page >= _totalpage){
             	    return false;
                 }
                 var _page = parseInt(_page) + 1;
                 $("input[name='page']").val(_page);
                 likebrandAjax();
             });
             
             function likebrandAjax(){
                 $("#likebrandssss").ajaxSubmit({
                     dataType:'html',
                     success:function(e){
                   	  $(".aroundview").html(e);
                       $("section").trigger( "create" );
                         }
                     });
             }
            </script>
		<section class="detail_section margin-top-20 transportationset">
			<!-- 交通设施  -->
		</section>
		<script type="text/javascript">
            $(function(){
                $.ajax({
                    type:"post",
                    url:'/details/slot/id/4/mall_id/<?php echo $mall_id?>',
                    dataType:'html',
                    success:function(e){
                        if(e.length < 50 ){
                            $(".transportationset").addClass('hide');
                        }else{
                            $(".transportationset").html(e);
                            }
                       }
                 })
            });
            </script>
        <?php if(!empty($district_desc['district_desc'])){?>    
		<section class="detail_section margin-top-20">
			<div class="detail_section_head layout layout-align-start-center">
				<div class="detail_section_tit font-size-14">区位分析</div>
			</div>
			<div class="detail_section_main detail_buss_area">
				<p><?php echo nl2br($district_desc['district_desc']);?></p>
			</div>
		</section>
		<?php }?>
	</div>
</div>
<section class="detail_noDataM <?php if ($resultShow){echo 'hide';}?>">
	<div class="no_data_map layout layout-align-center-center">
		<img src="/img/detail/pic_mall_2.png">
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
                <div class="btn_box attention_ed"
				onclick="commonUtilInstance.unfollow(this,<?php echo $mall_id;?>,2)">
				<div class="btn layout layout-align-center-center">
					<span class="icon_btn icon_attention"></span> <span>已关注</span>
				</div>
			</div>
            <?php }else {?>
            <div class="btn_box attention"
				onclick="commonUtilInstance.follow(this,<?php echo $mall_id;?>,2)">
				<div class="btn layout layout-align-center-center">
					<span class="icon_btn icon_attention"></span> <span>关注</span>
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
