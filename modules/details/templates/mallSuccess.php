    <div data-role="content" class="detail_content">
        <div class="detail_top_wrap">
            <div class="detail_head">
                <div class="detail_head_banner"><div class="detail_head_banner_filter"></div><img src="<?php echo $imageresult[1][0]['file_path'];?>" onerror="this.src='/img/detail/detail_banner.png'"></div>
                <div class="detail_head_info layout">
                    <div class="detail_logo">
	                    <div class="face105 faceborder">
	                    	<img src="<?php getLogoimage(['mall_id'=>$mall_id],'src', true);?>" onerror="this.src='/img/detail/logo_big.png'"/>
	                    </div>
                    </div>
                    <div class="detail_name height109">
                        <h2 class="bottom_20"><?php echo $basicResult['mall_name'];?></h2>
                        <div class="layout bottom_0">
                         <?php if ($isEditor){?>
<!--                             <div class="btn_box attention"> -->
<!--                                 <div class="btn layout layout-align-center-center"> -->
<!--                                     <a href="#"> -->
<!--                                        <span class="icon_btn icon_edit"></span> -->
<!--                                         <span>编辑</span> -->
<!--                                     </a> -->
<!--                                 </div> -->
<!--                             </div> -->
                            <?php }elseif ($isAttention){?>
                                <div class="btn_box attention_ed"  onclick="commonUtilInstance.unfollow(this,<?php echo $mall_id;?>,2)">
                                <div class="btn layout layout-align-center-center">
                                    <a href="#" class="ui-link">
                                        <span class="icon_btn icon_attention"></span>
                                        <span>已关注</span>
                                    </a>
                                </div>
                            </div>
                           <?php }else {?>
                          
                           <!-- 如果没有登陆 弹出登陆框 -->
                           <?php if (isset($_SESSION['userinfo']['passport_id'])){?>
                               <div class="btn_box attention" onclick="commonUtilInstance.follow(this,<?php echo $mall_id;?>,2)">
                                    <div class="btn layout layout-align-center-center">
                                        <a href="#">
                                             <span class="icon_btn icon_attention"></span>
                                            <span>关注</span>
                                        </a>
                                    </div>
                                </div>
                            <?php }else {?>
                               <div class="btn_box attention" id="login">
                                    <div class="btn layout layout-align-center-center">
                                        <a href="/passport/loginjump/jump/{jumpurl}">
                                             <span class="icon_btn icon_attention"></span>
                                            <span >关注</span>
                                        </a>
                                    </div>
                                </div>
                            <?php }?>
                           <?php }?>
                            <?php ?>
                            <div class="btn_box relation relation_able">
                                <div class="btn layout layout-align-center-center" >
                                    <i class="icon_btn icon_relation" onclick="javascript:location.href='/details/userlist/mall_id/<?php echo $mall_id;?>/url/<?php echo \Frame\Util\UString::base64_encode($weixinzhuanfa['link']);?>'"></i>
                                    <span onclick="javascript:location.href='/details/userlist/mall_id/<?php echo $mall_id;?>/url/<?php echo \Frame\Util\UString::base64_encode('/details/mall/mall_id/'.$mall_id);?>'">马上联系</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail_head_basic">
                <h3 class="detail_head_tit">基本资料<span class="font-size-14 gray999">&nbsp;&nbsp;/<?php echo $basicResult['mall_name'];?></span></h3>
                <div class="detail_head_basic_items">
                <?php if (!empty($basicResult['mall_opening_date']) && $basicResult['mall_opening_date'] != '0000-00-00'){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label label_four gray999">开业时间：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $basicResult['mall_opening_date'];?></div>
                    </div>
                <?php }?>
                <?php if (!empty($mall_area)){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">所在城市：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $mall_area;?></div>
                    </div>
                <?php }?>
                <?php if (!empty($business_circle_name)){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">所在商圈：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $business_circle_name;?></div>
                    </div>
                <?php }?>
                <?php if (!empty($basicResult['mall_address'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label label_four gray999">详细地址：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $basicResult['mall_address'];?></div>
                    </div>
                <?php }?>
                <?php if (!empty($basicResult['mall_building_size'] || !empty($basicResult['mall_rent_size']))){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">建筑/租赁面积：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo empty($basicResult['mall_building_size'])?"-":number_format($basicResult['mall_building_size']).'㎡';?>/<?php echo empty($basicResult['mall_rent_size'])?'-':number_format($basicResult['mall_rent_size']).'㎡';?></div>
                    </div>
                <?php }?>
                <?php if (!empty($basicResult['mall_under_floor']) || !empty($basicResult['mall_upper_floor'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">地上/地下楼层：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo empty($basicResult['mall_upper_floor'])?"--":$basicResult['mall_upper_floor'].'层';?>/<?php echo empty($basicResult['mall_under_floor'])?'--':$basicResult['mall_under_floor'].'层';?></div>
                    </div>
                <?php }?>
                <?php if (!empty($basicResult['mall_parking'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">停车位：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $basicResult['mall_parking'];?>个</div>
                    </div>
                <?php }?>
                <?php if (!empty($basicResult['mall_weixin'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">微信公众号id：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $basicResult['mall_weixin'];?></div>
                    </div>
                <?php }?>
                </div>
                <div class="detail_head_relative_type layout">
                   <?php if (!empty($basicResult['mall_weibo'])){?>
                    <div class="type">
                        <div class="btn_box layout layout-align-center-center" data-toggle="modal" custom-dialog="#weibo-dialog">
                            <a href="#" class="btn btn_default layout layout-align-center-center">
                                <span>微博</span>
                            </a>
                        </div>
                    </div>
                    <?php }?>
                    <?php if (!empty($basicResult['mall_website'])){?>
                    <div class="type">
                        <div class="btn_box layout layout-align-center-center" data-toggle="modal" custom-dialog="#guanwang-dialog">
                            <a href="#" class="btn btn_default layout layout-align-center-center"><span>官网</span></a>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <?php if(!empty($basicResult['mall_desc']) || !empty($infoTag)){?>
                <div class="detail_head_info_more layout layout-align-end-center">
                    <a href="/details/mallinfores/mall_id/<?php echo $mall_id;?>" class="layout layout-align-start-center">
                        <div >查看更多</div>
                        <div class="icon_btn icon_more"></div>
                    </a>
                </div>
                <?php } ?>
            </div>
            <?php if (!empty($imageresult[2])){?>
            <div class="detail_head_basic_img">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                    <?php foreach ($imageresult[2] as $key => $val){?>
                        <div class="swiper-slide"><img src="<?php echo $val['file_path'];?>" onerror="this.src='/img/default.png'" /></div>
                    <?php }?>
                    </div>
                </div>
            </div>
            <?php }?>
            <div class="layout layout-align-end-center margin-top-20">
            	<a href="" class="layout layout-align-end-center " data-toggle="modal" custom-dialog="#guanwang-info">
            		<div class="icon_btn icon_edit_able"></div>
            		<span class="margin-right-20 gray333 font-size-12 margin-left-5">我要完善资料</span>
            	</a>
            </div>
        </div>
        <div class="detail_main2">
            <div class="detail_survey_data">
                <h3 class="detail_head_tit">需求广播：<?php if($demand_count){?><?php echo $demand_count;?>条<?php }?><span class="font-size-14 gray999"><?php if($demand_count){?>&nbsp;&nbsp;/<?php }?><?php echo $basicResult['mall_name'];?></span></h3>
            </div>
            <section class="detail_section margin-top-10 brandbroadcast">
                <div class="detail_section_main detail_section_top_border font-size-14 text-center gray999">
	            	<p>该商业体没有发布需求</p>
	                <p>关注该商业体，有新需求后第一时间推送给你</p>
	            </div>
            </section>
            <div class="margin-top-20 layout layout-align-end-center ">
            	<a href="/letter/index" class="layout layout-align-end-center ">
            		<div class="icon_btn icon_fc"></div>
            		<span class="margin-right-10 gray333 font-size-12">有问题找方小橙</span>
            	</a>
            </div>
            <?php if ($demand_count > 0){?>
            <script type="text/javascript">
                $(function(){
                    $.ajax({
                        type:"post",
                        url:'/details/mallbroadcast/mall_id/<?php echo $mall_id;?>',
                        dataType:'html',
                        success:function(e){    
                            $(".brandbroadcast").html(e);
                            $(".detail_main").trigger( "create" );
                           }
                     });
                });
                $('body').on('click','.broadcastpre',function(){
                    var _page = $("input[name='page_broad']").val();
                    var _mall_id = $("input[name='mall_id']").val();
                    var _count = $("input[name='count']").val();
                    if(_page <= 1){
                        return false;
                        }
                    _page = parseInt(_page) - 1;
                    $("input[name='page_broad']").val(_page);
                    broadcastformAjax();
                })
                $('body').on('click','.broadcastnext',function(){
                    var _page = $("input[name='page_broad']").val();
                    var _mall_id = $("input[name='mall_id']").val();
                    var _count = $("input[name='count']").val();
                    if(parseInt(_page) >= parseInt(_count)){
                        return false;
                        }
                    _page = parseInt(_page) + 1;
                    $("input[name='page_broad']").val(_page);
                    broadcastformAjax();
                })
                
                function broadcastformAjax(){
                    $("#broadcastform").ajaxSubmit({
                        dataType:'html',
                        success:function(e){
                      	  $(".brandbroadcast").html(e);
                          $(".detail_main").trigger( "create" );
                            }
                        });
                }
            </script>
            <?php }?>
            <div class="detail_survey_data padding-top-20 likebrand_title">
                <h3 class="detail_head_tit">您可能感兴趣的商业体</h3>
            </div>
            <section class="detail_section margin-top-10 likebrand">
                <!-- 相似商业体 -->
            </section>
            <script type="text/javascript">
            $(function(){
                $.ajax({
                    type:"post",
                    url:'/details/slot/id/13/mall_id/<?php echo $mall_id;?>/area_id/{area_id}/',
                    dataType:'html',
                    success:function(e){    
                        $(".likebrand").html(e);
                        $("likebrand").trigger( "create" );
                       }
                 });
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
                if(parseInt(_page) >= parseInt(_totalpage)){
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
                  	  $(".likebrand").html(e);
                      $("likebrand").trigger( "create" );
                        }
                    });
            }
            </script>
        </div>
        <?php __slot('passport','footer');?>
    </div>
    <!-- 弹框 -->
    <!-- 微信 -->
<div id="weibo-dialog" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal dialog_qrcode">
<div class="modal-backdrop fade"></div>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 id="myModalLabel" class="modal-title">提示</h4>
        </div>
        <div class="modal-body">
            <div class="qrcode_box">
                <p id="sub-dialog_content" class="font-size-14">您将要离开方橙的页面，是否继续?</p>
                <div class="form-group clearfix question_btn guide_btn margin-top-20">
                    <div class="btn_box">
                        <button type="button" data-dismiss="modal" class="btn btn-default btn-orange close font-size-14">留在方橙</button>
                    </div>
                </div>
                <div class="form-group clearfix question_btn guide_btn margin-top-20">
                    <div class="btn_box" onclick='javascript:window.location.href="<?php echo   strpos($basicResult['mall_weibo'],'//')?$basicResult['mall_weibo']:'http://'.$basicResult['mall_weibo'];?>"'>
                            <button type="button" data-dismiss="modal" class="btn btn_default close font-size-14">确定离开</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 官网 -->
<div id="guanwang-dialog" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal dialog_qrcode">
<div class="modal-backdrop fade"></div>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 id="myModalLabel" class="modal-title">提示</h4>
        </div>
        <div class="modal-body">
            <div class="qrcode_box">
                <p id="sub-dialog_content" class="font-size-14">您将要离开方橙的页面，是否继续?</p>
                <div class="form-group clearfix question_btn guide_btn margin-top-20">
                    <div class="btn_box">
                        <button type="button" data-dismiss="modal" class="btn btn-default btn-orange close font-size-14">留在方橙</button>
                    </div>
                </div>
                <div class="form-group clearfix question_btn guide_btn margin-top-20">
                    <div class="btn_box" onclick='javascript:window.location.href="<?php echo   strpos($basicResult['mall_website'],'//')?$basicResult['mall_website']:'http://'.$basicResult['mall_website'];?>"'>
                            <button type="button" data-dismiss="modal" class="btn btn_default close font-size-14">确定离开</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 完善资料 -->
<div id="guanwang-info" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal dialog_qrcode">
<div class="modal-backdrop fade"></div>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 id="myModalLabel" class="modal-title">完善项目信息</h4>
        </div>
        <div class="modal-body">
            <div class="qrcode_box">
            	<form id="messageInit">
                	<p id="sub-dialog_content" class="font-size-12">请留下您的邮箱,我们会发送相关的表格邮件协助您完善项目信息。</p>
                	<div class="formwrapper margin-top-10 margin-bottom-10">
                		<div class="form-item" validate-item="email">
                			<div class="form-input-wrapper" style="min-height:30px;" validate-ok="email">
                			<input email placeholder="输入您的常用邮箱" validate-field="email" validate-type="required,email" required-msg="请输入您的邮箱" email-msg="可使用字母、数字、减号、下划线">
                			</div>
                		</div>
						<div validate-msg="email" class="hide tip">
						</div>
                	</div>
                	<p id="sub-dialog_content" class="font-size-12">或直接拨打我们的联系电话，客服会协助您完善项目信息。</p>
                	<p id="sub-dialog_content" class="font-size-12">电话:400-0083-150</p>
                	<div class="btn_box flex layout layout-align-center-center margin-top-20">
                       <a href="#" class="btn btn_default layout layout-align-center-center flex a_close">
                           <span class="font-size-15">取消</span>
                       </a>
                       <a href="#" class="btn btn_orange layout layout-align-center-center flex margin-left-10">
                           <span class="font-size-15">提交</span>
                       </a>
                	</div>
                </form>
                </div>
            </div>
        </div>
    </div>
	<script type="text/javascript">
	$(function(){
		$(".a_close").click(function(){
			$("#guanwang-info").removeClass("on");
		});
	});
	$('#messageInit').validate();
	$('#messageInit .btn_orange').on('click',function(){
		if($('#messageInit').doValidate()) {
			var email = $('#messageInit [email]').val();
			$.ajax({
					type: 'POST',
					url: '/api/updateproject/type/1/email/'+email,
					dataType:'json',
					success: function(data) {
						if(data && data.result == 1) {
							hideDialog('#guanwang-info');
						} else {
							alert(data.resultMsg);
						}
					},
					error:function() {
						alert('网络繁忙，请稍后再试！');
					}
				});
		}
	});
	
	</script>
</div>

    <form  action="/details/ajaxmalldemand" method="get">
        <input type="hidden" name='totalpage' value="<?php echo $mall_demand['count']?>">
        <input type="hidden" name='currentpage' value="1">
        <input type="hidden" name='pagesize' value="1">
    </form>
<script>
    $(function(){
        var swiper = new Swiper('.swiper-container',{
            spaceBetween: 12,
            slidesPerView:"auto"
        });
    });
</script>

