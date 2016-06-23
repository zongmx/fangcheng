    <div data-role="content" class="detail_content">
        <div class="detail_top_wrap">
            <div class="detail_head">
                <div class="detail_head_banner">
                    <div class="detail_head_banner_filter"></div>
                    <img src='<?php echo $imageresult[1][0]['file_path'];?>' onerror="this.src='/img/detail/detail_banner.png'" />
                </div>
                <div class="detail_head_info layout">
                    <div class="detail_logo">
                    	<div class="face105 faceborder">
                    		<img src="<?php getLogoimage(['brand_id'=>$brand_id], 'src',true);?>" onerror="this.src='/img/detail/logo_big.png'"/>
                    	</div>
                    </div>
                    <div class="detail_name height109">
                        <h2 class="bottom_20"><?php echo $brandbasicinfo['brand_name'];?></h2>
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
                                <div class="btn_box attention_ed"  onclick="commonUtilInstance.unfollow(this,<?php echo $brand_id;?>,1)">
                                <div class="btn layout layout-align-center-center">
                                    <a href="#" class="ui-link">
                                        <span class="icon_btn icon_attention"></span>
                                        <span>已关注</span>
                                    </a>
                                </div>
                            </div>
                           <?php }else {?>
                                <?php if (isset($_SESSION['userinfo']['passport_id'])){?>
                                   <div class="btn_box attention" onclick="commonUtilInstance.follow(this,<?php echo $brand_id;?>,1)">
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
                                                <span>关注</span>
                                            </a>
                                        </div>
                                    </div>
                                <?php }?>
                           <?php }?>
                            <div class="btn_box relation relation_able">
                                <div class="btn layout layout-align-center-center">
                                    <i onclick="javascript:location.href='/details/userlist/brand_id/<?php echo $brand_id;?>/url/<?php echo \Frame\Util\UString::base64_encode($weixinzhuanfa['link']);?>'" class="icon_btn icon_relation"></i>
                                    <span onclick="javascript:location.href='/details/userlist/brand_id/<?php echo $brand_id;?>/url/<?php echo \Frame\Util\UString::base64_encode('/details/brand/brand_id/'.$brand_id);?>'">马上联系</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail_head_basic">
                <h3 class="detail_head_tit">基本资料<span class="font-size-14 gray999">&nbsp;&nbsp;/<?php echo $brandbasicinfo['brand_name'];?></span></h3>
                <div class="detail_head_basic_items">
                
                
                <?php if (!empty($brandbasicinfo['brand_name'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">品牌名称：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $brandbasicinfo['brand_name'];?></div>
                    </div>
                <?php }?>
                <?php if (!empty($infoTag['group_13'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">品牌发源地：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $infoTag['group_13'];?></div>
                    </div>
                <?php }?>
                <?php if (!empty($brandbasicinfo['brand_group'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">公司名称：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $brandbasicinfo['brand_group'];?></div>
                    </div>
                <?php }?>
                <?php if (!empty($infoTag['group_12'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">品牌定位：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $infoTag['group_12'];?></div>
                    </div>
                <?php }?>
                <?php if (!empty($brandbasicinfo['category'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">所属业态：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $brandbasicinfo['category']?></div>
                    </div>
                <?php }?>
                <?php if(!empty($infoTag['group_120'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">主力产品：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $infoTag['group_120'];?></div>
                    </div>
                <?php }?>
                <?php if(!empty($infoTag['group_34'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">经营模式：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $infoTag['group_34'];?></div>
                    </div>
                <?php }?>
                <?php if(!empty($infoTag['group_15'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">品牌客单价：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $infoTag['group_15'];?>元</div>
                    </div>
                <?php }?>
                <?php if(!empty($infoTag['group_17'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">客群定位：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $infoTag['group_17'];?></div>
                    </div>
                <?php }?>
                <?php if(!empty($infoTag['group_14'])){
                    ?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">产品价格带：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo str_replace('￥', '', $infoTag['group_14']);?>元</div>
                    </div>
                <?php }?>
                <?php if(!empty($infoTag['group_91'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">店铺数量：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $infoTag['group_91'];?>家</div>
                    </div>
                <?php }?>
                <?php if(!empty($infoTag['group_33'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">主要开店城市：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $infoTag['group_33'];?></div>
                    </div>
                <?php }?>
                <?php if(!empty($infoTag['group_41'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">店铺面积：</div>
                        <div class="detail_head_basic_item_c flex"><?php echo $infoTag['group_41'];?>㎡</div>
                    </div>
                <?php }?>
                <?php if (!empty($brandbasicinfo['brand_weixin'])){?>
                    <div class="detail_head_basic_item layout">
                        <div class="detail_head_basic_item_label gray999">微信公众号id：</div>
                        <div class="detail_head_basic_item_c"><?php echo $brandbasicinfo['brand_weixin'];?></div>
                    </div>
                <?php }?>
                </div>
                    <div class="detail_head_relative_type layout">
                   <?php if (!empty($brandbasicinfo['brand_weibo'])){?>
                    <div class="type">
                        <div class="btn_box layout layout-align-center-center" data-toggle="modal" custom-dialog="#weibo-dialog">
                            <a href="<?php echo  strpos($brandbasicinfo['brand_weibo'],'//')?$brandbasicinfo['brand_weibo']:'http://'.$brandbasicinfo['brand_weibo'];?>" class="btn btn_default layout layout-align-center-center">
                                <span>微博</span>
                            </a>
                        </div>
                    </div>
                    <?php }?>
                    
                    <?php if (!empty($brandbasicinfo['brand_website']) && !empty($brandbasicinfo['brand_website_cn'])){?>
                    <div class="type">
                        <div class="btn_box layout layout-align-center-center" data-toggle="modal" custom-dialog="#guanwang1-dialog">
                            <a href="<?php echo  strpos($brandbasicinfo['brand_website'],'//')?$brandbasicinfo['brand_website']:'http://'.$brandbasicinfo['brand_website'];?>" class="btn btn_default layout layout-align-center-center"><span>官网1</span></a>
                        </div>
                    </div>
                    <div class="type">
                        <div class="btn_box layout layout-align-center-center" data-toggle="modal" custom-dialog="#guanwang2-dialog">
                            <a href="<?php echo  strpos($brandbasicinfo['brand_website_cn'],'//')?$brandbasicinfo['brand_website_cn']:'http://'.$brandbasicinfo['brand_website_cn'];?>" class="btn btn_default layout layout-align-center-center"><span>官网2</span></a>
                        </div>
                    </div>
                    <?php }elseif(!empty($brandbasicinfo['brand_website']) || !empty($brandbasicinfo['brand_website_cn'])){ 
                        $brand_website = !empty($brandbasicinfo['brand_website']) ? $brandbasicinfo['brand_website'] : $brandbasicinfo['brand_website_cn'];
                        $guanwang = !empty($brandbasicinfo['brand_website']) ? "#guanwang1-dialog" : "#guanwang2-dialog";
                    ?>
                    <div class="type">
                        <div class="btn_box layout layout-align-center-center" data-toggle="modal" custom-dialog="{guanwang}">
                            <a href="<?php echo strpos($brand_website,'//')?$brand_website :'http://'.$brand_website;?>" class="btn btn_default layout layout-align-center-center"><span>官网</span></a>
                        </div>
                    </div>
                    <?php }?>
                    
                </div>
                
                <?php if(!empty($brandbasicinfo['brand_charact'])){?>
                <h3 class="detail_head_tit detail_head_tit_m">品牌特色<span class="font-size-14 gray999">&nbsp;&nbsp;/<?php echo $brandbasicinfo['brand_name'];?></span></h3>
                <div class="detail_buss_info_p">
                    <p><?php echo $brandbasicinfo['brand_charact'];?></p>
                </div>
                
                <?php }?>
                <?php if(!empty($brandbasicinfo['brand_product_desc'])){?>
                <h3 class="detail_head_tit detail_head_tit_m">产品特色<span class="font-size-14 gray999">&nbsp;&nbsp;/<?php echo $brandbasicinfo['brand_name'];?></span></h3>
                <div class="detail_buss_info_p">
                    <p><?php echo $brandbasicinfo['brand_product_desc'];?></p>
                </div>
                <?php }?>
                
            </div>
            <?php if (!empty($imageresult[2])){?>
            <div class="detail_head_basic_img">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                    <?php foreach ($imageresult[2] as $key => $val){?>
                        <div class="swiper-slide"><img src="<?php echo $val['file_path'];?>" onerror="this.src='/img/default.png'"  /></div>
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
            <!--新增橙TV-->
            <div class="margin-top-20" >
                 <div class="detail_survey_data padding-left-20">
                      <h3 class="detail_head_tit detail_head_tit_m">橙TV：<span class="font-size-18 gray999">猜你喜欢/发现未来消费趋势</span></h3>
                 </div>
                 <div class="tv-top margin-top-10">
                     <img src="{chengtv_img_big}" class="tv-banner"/>
                     <div class="tv-mask"></div>
                     <div class="tv-title">
                         <p><a href="/chengtv/view/chengtv_id/{chengtv_id}" data-ajax="false">{chengtv_title}</a></p>
                     </div>
                     <div class="tv-play" data-tv-url="http://www.tudou.com/programs/view/html5embed.action?type=0&amp;code=iJd7Xo1NW0w&amp;lcode=&amp;resourceId=755878002_06_05_99" data-toggle="modal" custom-dialog="#tv-dialog" onclick="showDialog('#tv-dialog')"></div>
                 </div>
            </div>
        </div>

        <div class="detail_main2">
            <div class="detail_survey_data">
                <h3 class="detail_head_tit">需求广播：<?php if($demand_count){?><span id="demandNum"><?php echo $demand_count;?>条</span><?php }?><span class="font-size-14 gray999"><?php if($demand_count){?>&nbsp;&nbsp;/<?php }?>
                <?php echo $brandbasicinfo['brand_name'];?></span></h3>
            </div>
            <section class="detail_section margin-top-10 brandbroadcast">
                <!-- 需求广播 -->
                <div class="detail_section_main detail_section_top_border font-size-14 text-center gray999">
	            	<p>该品牌没有发布需求</p>
	                <p>关注该品牌，有新需求后第一时间推送给你</p>
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
                        url:'/details/brandbroadcast/brand_id/<?php echo $brand_id;?>',
                        dataType:'html',
                        success:function(e){    
                            $(".brandbroadcast").html(e);
                            $(".detail_main").trigger( "create" );
                           }
                     });
                });
                $('body').on('click','.broadcastpre',function(){
                    var _page = $("input[name='page_broad']").val();
                    var _brand_id = $("input[name='brand_id']").val();
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
                    var _brand_id = $("input[name='brand_id']").val();
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
                <h3 class="detail_head_tit">您可能感兴趣的品牌</h3>
            </div>
            <section class="detail_section margin-top-10 likebrand">
                <!-- 感兴趣的品牌  -->
            </section>
            <script type="text/javascript">
            $(function(){
                $.ajax({
                    type:"post",
                    url:'/details/slot/id/1011/brand_id/<?php echo $brand_id;?>',
                    dataType:'html',
                    success:function(e){    
                        $(".likebrand").html(e);
                        $("section").trigger( "create" );
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
                      $("section").trigger( "create" );
                        }
                    });
            }
            </script>
        </div>
    </div>
    <!-- 弹框 -->
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
                        <div class="btn_box" onclick='javascript:window.location.href="<?php echo   strpos($brandbasicinfo['brand_weibo'],'//')?$brandbasicinfo['brand_weibo']:'http://'.$brandbasicinfo['brand_weibo'];?>"'>
                            <button type="button" data-dismiss="modal" class="btn btn_default close font-size-14">确定离开</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 官网1 -->
<div id="guanwang1-dialog" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal dialog_qrcode">
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
                    <div class="btn_box" onclick='javascript:window.location.href="<?php echo   strpos($brandbasicinfo['brand_website'],'//')?$brandbasicinfo['brand_website']:'http://'.$brandbasicinfo['brand_website'];?>"'>
                            <button type="button" data-dismiss="modal" class="btn btn_default close font-size-14">确定离开</button>
                        </div>
                    </div>
                </div>
         </div>
        </div>
    </div>
</div>
<!-- 官网2 -->
<div id="guanwang2-dialog" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal dialog_qrcode">
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
                    <div class="btn_box" onclick='javascript:window.location.href="<?php echo   strpos($brandbasicinfo['brand_website_cn'],'//')?$brandbasicinfo['brand_website_cn']:'http://'.$brandbasicinfo['brand_website_cn'];?>"'>
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
                	<p id="sub-dialog_content" class="font-size-12">电话:400-0038-150</p>
                	<div class="btn_box flex layout layout-align-center-center margin-top-20">
                       <a href="#" class="btn btn_default layout layout-align-center-center ui-link flex a_close">
                           <span class="font-size-15">取消</span>
                       </a>
                       <a href="#" class="btn btn_orange layout layout-align-center-center ui-link margin-left-10 flex">
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
					url: '/api/updateproject/type/2/email/'+email,
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
<!--橙tv-->
<div id="tv-dialog" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal videoDialog">
        <div class="modal-backdrop fade"></div>
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
</div>
<script type='text/javascript'>
	if(commonUtilInstance.isWeiXin()) {
		var weixinShare = $('[weixin-share]');
		weixinShare.addClass('hide');
		commonUtilInstance.forwardneed_weixin(weixinShare.attr('wxTitle'),weixinShare.attr('wxDesc'),weixinShare.attr('wxLink'),weixinShare.attr('wxImgUrl'));
	}


	 $('.modal-backdrop').click(function(){
            hideDialog("#tv-dialog");
        })
</script>