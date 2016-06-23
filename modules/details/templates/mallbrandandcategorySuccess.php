
	<div data-role="content" class="detail_content <?php  if (!$resultShow){echo 'hide';}?> ">
        <div class="detail_main">
			<section id="roomMapBtn" class="detail_section margin-bottom-20">
                <div onclick="lookMallRoomMap()" class="custom-btn layout layout-align-center-center" >
                    <a class="ui-link layout layout-align-center-center" href="">
                        <div class="icon_btn icon_map"></div>
                        <div class="icon_reply_msg" style="color: #ffffff;">查看室内地图</div>
                    </a>
                </div>
            </section>
            <section class="detail_section">
                <div id='brandandcategorys' class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">入驻品牌列表</div>
                </div>
                <!-- 入驻品牌列表 -->

                <!-- 入住品牌列表 -->
                <script type="text/javascript">
                    $(function(){
                        $.ajax({
                            type:"post",
                            url:'/details/slot/id/7/mall_id/<?php echo $mall_id?>',
                            dataType:'html',
                            success:function(e){
                                $("#brandandcategorys").after(e);
                                $("section").trigger( "create" );
                               }
                         })
                    });
                    $('body').on('change','.categorys',function(){
                        var _categoryid = this.value;
                        $("input[name='category']").val(_categoryid);
                        $("input[name='page']").val(1);
                        _brandandcategoryAjax();
                        });
                    $('body').on('change','.floors',function(){
                        var _floors = this.value;
                        $("input[name='floor']").val(_floors);
                        $("input[name='page']").val(1);
                        _brandandcategoryAjax();
                        });
                    $('body').on('click','.categoryandbrandpre',function(){
                        var _page =  $("input[name='page']").val();
                        if(_page <= 1){
                            return false;
                        }else{
                        	_page = parseInt(_page) - 1;
                         }
                        $("input[name='page']").val(_page);
                        _brandandcategoryAjax();
                        });
  
                    $('body').on('click','.categoryandbrandnext',function(){
                        var _page =  $("input[name='page']").val();
                        var _countpage =  $("input[name='countpage']").val();
                        if(parseInt(_page) >= parseInt(_countpage)){
                            return false;
                        }else{
                        	_page = parseInt(_page) + 1;
                         }
                        $("input[name='page']").val(_page);
                        _brandandcategoryAjax();
                        });
  
                    function _brandandcategoryAjax(){
                        $("#cateandbrand").ajaxSubmit({
                            dataType:'html',
                            success:function(e){
                                $(".slot7").remove();
                                $("#brandandcategorys").after(e);
                                $("section").trigger( "create" );
                                }
                            });
                    }
					
                    function lookMallRoomMap(){
                        var _mall_id = $("input[name='mall_id']").val();
                        var _floor = $("input[name='floor']").val();
                        var _url = '/details/lookmallroommap/mall_id/'+_mall_id+'/floor/'+_floor;
                        window.location.href=_url;
                        }      
                </script>
            </section>
           <section class="detail_section margin-top-10 categoryzhanbi">
            <!-- 业态占比 -->
            </section>
            <script type="text/javascript">
            $(function(){
            	changeType('size');
            });
            function changeType(type){
            	$.ajax({
                    type:"post",
                    url:'/details/slot/id/8/mall_id/<?php echo $mall_id?>/type/'+type,
                    dataType:'html',
                    success:function(e){
                        $(".categoryzhanbi").html(e);
                        $("body").trigger( "create" );
                       }
                 });
                }
            </script>
            <section class="detail_section margin-top-20 shopzhishu">
            <!-- 店铺网上客流指数 -->
            </section>
            <script type="text/javascript">
                $(function(){
                    $.ajax({
                        type:"post",
                        url:'/details/slot/id/10/mall_id/<?php echo $mall_id?>/category_id/10000/',
                        dataType:'html',
                        success:function(e){
                            $(".shopzhishu").html(e);
                            $("body").trigger( "create" );
                           }
                     })
                });
          
        function next(page,cat_id){
           
         $.ajax({
                type:"post",
                url:'/details/slot/id/10/mall_id/<?php echo $mall_id;?>/page/'+page+'/category_id/'+cat_id,
                dataType:'html',
                success:function(e){
                	$(".shopzhishu").html(e);
               	 $("section").trigger( "create" );
                   }
             });
            }
        </script>
        </div>
    </div>
<section class="detail_noDataM <?php if ($resultShow){echo 'hide';}?>">
        <div class="no_data_map layout layout-align-center-center">
            <img src="/img/detail/pic_mall_3.png">
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