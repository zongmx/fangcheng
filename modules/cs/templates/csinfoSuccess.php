<section data-role="page" id="main_index_1" data-title="方橙" class="contain bggray">
    <header data-role="header" data-theme="b"class="header">
        <a href="/cs/list/" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back">悬赏</a>
        <h1>悬赏详情</h1>
    </header>

 <input id="curent_demand_id" type="hidden" value="<?php echo($csinfo['return']['demand_id']);?>" />
 <input id="curent_type" type="hidden" value="<?php echo($csinfo['return']['demand_type']);?>" />
 <div data-role="content" class="detail_content bggray" style="overflow-y:hidden;">
 	<div >
 	    <section class="detail_section need-prev">
 	        <div class="detail_section_head layout layout-align-space-between-center">
               <div class="detail_section_tit font-size-14"><?php if($csinfo['return']['demand_type'] == 1){ ?>拓展<?php }else{?>招商<?php }?>悬赏详情</div>
            </div>
 	    </section>
 	    <div class="">
            <div class="detail-container padding-top-20 bgff">
                <div class="need_item_top layout">
                    <div class="face40">
                    	<img alt="" src="{csinfo['return']['logo']}" onerror="this.src='/img/detail/logo_big.png'">
                    </div>
                    <div class="flex layout-column margin-left-10 need_item_top_right">
                    	<div class="obj-name font-size-16">
                    	    <span class="gray333 nowrap"><?php if($csinfo['return']['demand_type'] == 1){ ?>拓展<?php }else{?>招商<?php }?>：<?php echo $csinfo['return']['cs_name'];?></span>
                    	</div>

                        <div class="honorarium" >
                           <p class="reward_1" style="margin:0;"><span class="reward_1_tit font-size-12">悬赏金&nbsp;</span><span style="font-size:15px;color:#D8992C;">￥<?php echo $csinfo['return']['money_task'];?> </span>&nbsp;&nbsp;&nbsp;&nbsp;
                               <?php if($csinfo[0]['cs']['money_traffic']  > 0 ){ ?>
                                    <span class="gray999 font-size-12">车马费</span><span class="gray333 font-size-12 orange">￥<?php echo $csinfo[0]['cs']['money_traffic'] / 100; ?></span>
                               <?php } ?>
                           </p>
                        </div>
                    </div>
                </div>
                <div class="show_detail btn_box flex layout layout-align-center-center margin-top-10">
                     <?php if ($csinfo['return']['demand_type'] == 2){?>
                     <?php if (!empty($csinfo['return']['mall_id'])){?>
                         <a href="/details/mall/mall_id/<?php echo $csinfo['return']['mall_id'];?>" class="btn btn_default layout layout-align-center-center ui-link"">查看商业体详情</a>
                     <?php }?>
                     <?php }elseif ($csinfo['return']['demand_type'] == 1) {?>
                     <?php if (!empty($csinfo['return']['brand_id'])){?>
                        <a href="/details/brand/brand_id/<?php echo $csinfo['return']['brand_id'];?>" class="btn btn_default layout layout-align-center-center ui-link"">查看品牌详情</a>
                     <?php }?>
                     <?php }?>
                 </div>
            </div>
            <div class="detail-container margin-bottom-20 font-size-14 bgff" style="padding:2px 10px">
                <p>
                    <span class="font-size-16 gray999">联系人：</span><span class="user_name orange" onclick=" window.location.href='/ucenter/index/passport_id/<?php echo $csinfo['passport_info']['passport_id'];?>'"><?php echo $csinfo['passport_info']['passport_name']?></span>
                    <?php if ($csinfo['passport_info']['passport_status'] == 2){?><span class="icon_btn  icon_v"></span><?php }?><span class="gray999 font-size-12">&nbsp;&nbsp;<?php echo $csinfo['passport_info']['passport_job_title'];?></span>
                </p>
                <!--<p class="hide">
                     <span class="font-size-16 gray999">联系电话：<span class="gray333"><?php echo $csinfo['passport_info']['passport_mobile'];?></span></span>
                </p>-->
            </div>
            <?php if($csinfo[0]['cs']['money_traffic']  > 0 ){ ?>
            <div class="detail-container margin-top-20 font-size-12 padding-top-20 padding-bottom-10 bgff" style="border-bottom:1px solid #e4e4e4" >
                <p class="honorarium_tip gray999" style="margin:0">*车马费说明：<?php echo $csinfo[0]['cs']['money_traffic'] / 100; ?>元为车马费总额。前<?php echo $csinfo[0]['cs']['money_traffic_num']; ?>名申请并成功看场的用户，每位可以得到<em class="cd8992c"><?php echo $csinfo[0]['cs']['money_traffic_pre'] / 100; ?>
                元</em>车马费！</p>
            </div>
            <?php } ?>
 	    </div>

 	</div>


	<div class="detail-container overflow cl detail_reward bgff padding-top-10" style="margin-bottom:60px;">
		<div class="pc_main_l ">

			<div class="reward_left_content">

				<div class="reward_left_top">
				<!-- 招商 -->
				<?php if ($csinfo['return']['demand_type'] == 2) { ?>
					<?php
						if (!empty($csinfo['return']['category_str']))
							?>
						<div class="reward_left_top_item layout">
						<div class="detail_head_basic_item_label gray999 font-size-16">需求业态：</div>
						<div class="detail_head_basic_item_c flex font-size-14"><?php echo($csinfo['return']['category_str']); ?></div>
					</div>
					<?php
					if (!empty($csinfo['return']['min_size'])){
					?>
					<div class="reward_left_top_item layout font-size-14">
						<div class="detail_head_basic_item_label gray999 font-size-16">店铺面积：</div>
						<div class="detail_head_basic_item_c flex"><?php if(isset($csinfo['return']['min_size'])) echo $csinfo['return']['min_size'];?>-<?php if(isset($csinfo['return']['min_size'])) echo $csinfo['return']['max_size']?> ㎡</div>
					</div>
					<?php
					}
					?>
					<?php
					if (!empty($csinfo['return']['demand_shop_type_str'])){
					?>
					<div class="reward_left_top_item layout font-size-14">
						<div class="detail_head_basic_item_label gray999 font-size-16">招商类型：</div>
						<div class="detail_head_basic_item_c flex "><?php if(isset($csinfo['return']['demand_shop_type_str']))  echo  $csinfo['return']['demand_shop_type_str'];?></div>
					</div>
					<?php
					}
					?>
					<?php
					if (!empty($csinfo['return']['demand_desc'])){
					?>
					<div class="reward_left_top_item layout font-size-14">
						<div class="detail_head_basic_item_label gray999 font-size-16">特色：</div>
						<div class="detail_head_basic_item_c flex"><?php  if(isset($csinfo['return']['demand_desc'])) echo $csinfo['return']['demand_desc'];?></div>
					</div>
					<?php
					}
					?>
					<?php if (!empty(($csinfo['return']['yx_brand_name']))){?>
					<div class="reward_left_top_item layout">
						<div class="detail_head_basic_item_label gray999 font-size-16">意向品牌：</div>
						<div class="detail_head_basic_item_c flex font-size-14"><?php if(isset($csinfo['return']['yx_brand_name'])) { echo($csinfo['return']['yx_brand_name']);}?></div>
					</div>
					<?php }?>
					<?php
					if (!empty($csinfo['return']['expire_at'])){
					?>
					<div class="reward_left_top_item layout font-size-14">
						<div class="detail_head_basic_item_label gray999 font-size-16">截止日期：</div>
						<div class="detail_head_basic_item_c flex"><?php if(isset($csinfo['return']['expire_at'])) echo $csinfo['return']['expire_at'];?></div>
					</div>
				<?php }?>
				<?php
					}else{ ?>
					<!-- 拓展 -->
					<?php if (!empty($csinfo['return']['area_name'])){?>
						<div class="reward_left_top_item layout font-size-14">
							<div class="detail_head_basic_item_label gray999 font-size-16">拓展城市：</div>
							<div class="detail_head_basic_item_c flex"><?php if(isset($csinfo['return']['area_name'])) echo($csinfo['return']['area_name']);?></div>
						</div>
					<?php }?>
                <?php if (!empty($csinfo['return']['category_str'])){?>
					<div class="reward_left_top_item layout font-size-14">
						<div class="detail_head_basic_item_label gray999 font-size-16">所属业态：</div>
						<div class="detail_head_basic_item_c flex"><?php if(isset($csinfo['return']['category_str'])) echo($csinfo['return']['category_str']);?></div>
					</div>
					<?php }?>
					<?php if (!empty($csinfo['return']['group_36_str'] )){?>
					<div class="reward_left_top_item layout font-size-14">
						<div class="detail_head_basic_item_label gray999 font-size-16">首选物业：</div>
						<div class="detail_head_basic_item_c flex"><?php if(isset($csinfo['return']['group_36_str'])) echo($csinfo['return']['group_36_str']);?></div>
					</div>
					<?php }?>
					<?php if (!empty($csinfo['return']['min_size'])){ ?>
					<div class="reward_left_top_item layout font-size-14">
						<div class="detail_head_basic_item_label gray999 font-size-16">面积需求：</div>
						<div class="detail_head_basic_item_c flex"><?php if(isset($csinfo['return']['min_size'])) echo $csinfo['return']['min_size'];?>-<?php if(isset($csinfo['return']['min_size'])) echo $csinfo['return']['max_size']?> ㎡</div>
					</div>
					<?php }?>
					<?php if (!empty($csinfo['return']['group_46_str'])){?>
					<div class="reward_left_top_item layout font-size-14">
						<div class="detail_head_basic_item_label gray999 font-size-16">工程条件：</div>
						<div class="detail_head_basic_item_c flex"><?php if(isset($csinfo['return']['group_46_str'])) {echo($csinfo['return']['group_46_str']);}?></div>
					</div>
					<?php }?>
					<?php if (!empty($csinfo['return']['year'])){?>
					<div class="reward_left_top_item layout font-size-14">
						<div class="detail_head_basic_item_label gray999 font-size-16">期望年限：</div>
						<div class="detail_head_basic_item_c flex"><?php if(isset($csinfo['return']['year'])) { echo($csinfo['return']['year']); }?>年</div>
					</div>
					<?php }?>
					<?php if (!empty($csinfo[0]['demand_ctime'])){?>
					<div class="reward_left_top_item layout font-size-14">
						<div class="detail_head_basic_item_label gray999 font-size-16">截止日期：</div>
						<div class="detail_head_basic_item_c flex"><?php if(isset($csinfo[0]['demand_ctime'])) { echo substr($csinfo[0]['demand_ctime'],0,10);}?></div>
					</div>
                <?php }?>
              <?php }?>
				</div>
				
			</div>			
			 <?php if(count($csinfo['return']['file']) > 1){ ?>
			<div class="reward_left_content_add">
				<div class="reward_left_top_item font-size-12">
						<div class="detail_head_basic_item_label gray999 font-size-16">图片展示：</div>
						<div class="detail_head_basic_item_c ">
							<div class="image-set swiper-container">
                                <div class="swiper-wrapper">
							<?php foreach ($csinfo['return']['file'] as $key => $val){?>
								<a class="example-image-link swiper-slide margin-right-10" href="<?php echo C('UPLOAD_URL'). \Frame\Util\UUpload::getSavePath($val['path'], '720', '720');?>" data-lightbox="example-set" style="width:214px;">
									<img style="width:214px;" class="example-image" src="<?php echo C('UPLOAD_URL').\Frame\Util\UUpload::getSavePath($val['path'], '720', '720');?>" alt="">
									<!--<span class="tip">点击查看大图</span>-->
								</a>
							<?php }?>
							</div>
						</div>
					</div>
			</div>
		  <?php }else{ ?>
		  <div class="reward_left_top">
          	    <div class="reward_left_top_item layout">
          	    	<div class="detail_head_basic_item_label gray999 font-size-16">图片展示：</div>
          	    	<div class="detail_head_basic_item_c flex font-size-14">无</div>
			    </div>
		  </div>
		 <?php } ?>
		</div>

 </div>
<div id="showpay" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal dialog_qrcode" style="height: 1489px;">
    <div class="modal-backdrop fade" style="height: 1489px;"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="sub-dialog_close" type="button" data-dismiss="modal" class="close ui-btn ui-shadow ui-corner-all"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 id="sub-dialog-title" class="modal-title"></h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
<div data-role="footer"  class="" style="height:60px;opacity:1 !important;background:#fff;position: fixed;bottom:0;left:0;width:100%;z-index:100;">
    <div class="btn_box font-size-14 detail-container" style="height:40px;line-height:40px;margin-top:10px">
       <a href="/letter/send/receiver_id/<?php echo $csinfo['passport_info']['passport_id'];?>" class="fl btn btn_default text-center " style="display:inline-block;width:48%;box-sizing:border-box;">发送私信</a>
       <a id="apply" <?php if($loginstatus == 1) { ?> href="/passport/loginjump/jump/{jumpurl}" <?php }elseif($loginstatus == 3){?> href="/cs/csinvite/demand_type/<?php echo $csinfo['return']['demand_type'];?>/demand_id/<?php echo($csinfo['return']['demand_id']);?>"<?php }elseif($loginstatus == 2){ ?>href = "#" <?php }else{?> onclick="showDialog('#showpay');"<?php } ?> class="btn btn_full_able text-center fr" style="display:inline-block;width:48%;box-sizing:border-box;">立即申请</a>
       <!--<a id="apply" class="btn btn_full_able text-center fr" style="display:inline-block;width:48%;box-sizing:border-box;">立即申请</a>-->
    </div>
</div>
<script>
    $(function(){
        var swiper = new Swiper('.swiper-container',{
            spaceBetween: 20,
            slidesPerView:"auto"
        });
    });
    $(function(){
        $('#apply').click(function(){
            $.ajax({
                url:'/cs/getuserstatus/demand_id/{csinfo[0]['_id']}',
                type:'post',
                data:'',
                success:function(data){

                   console.log(data.msg);
                   if(data.msg == 1){

                    window.location.href="/passport/loginjump/jump/L2Rldi5waHAvcmVjb21tZW5kL2luZGV4";
                   }else if(data.msg == 2){
                        hideDialog("#showpay");
                   }else if(data.msg == 3||data.msg == 4){
                     showDialog("#showpay");
                     $(".modal-body").html("");
                     $('#sub-dialog-title').text("参与成功");
                    var str='<div class=\"qrcode_box\">'
                         + "<p id=\"sub-dialog_content\" class=\"font-size-14\">您已成功参与该悬赏！申请看场是成功的第一步哦~</p>"
                        + '<div class=\"btn_box \">'
                        + '<button id=\"confirm-btn\" type=\"button\" data-dismiss=\"modal\" class=\"btn btn_full_able btn-orange close font-size-14 ui-btn ui-shadow ui-corner-all\" onclick=\"window.location.href=\'/ucenter/myapplycs\'\">查看我参与的</button>'
                        +'</div>'
                        +'<div id=\"btn_more\" class=\"margin-top-10 flex btn_box \">'
                        +'<button id=\"cancel_btn\" type=\"button\" data-dismiss=\"modal\" class=\"btn btn_default btn-orange close font-size-14 ui-btn ui-shadow ui-corner-all\" onclick=\"window.location.href=\'/cs/csinvite/demand_type/<?php echo $csinfo['return']['demand_type'];?>/demand_id/<?php echo $csinfo[0]['_id']; ?>\'\">邀请看场</button>'
                        +'</div>';
                        $(".modal-body").html(str);
                   }else if(data.msg == 5){
                     showDialog("#showpay");
                     $(".modal-body").html("");
                     $('#sub-dialog-title').text("未认证");
                     var str='<div class="qrcode_box">'
                         +' <p id="sub-dialog_content" class="font-size-14">只有认证用户才能投标悬赏需求，是否立即上传名片进行身份认证？</p>'
                         +' <div class="btn_box flex layout layout-align-center-center margin-top-20">'
                         +    '<a href="#" class="close btn btn_default layout layout-align-center-center ui-link flex">'
                         +        '<span class="font-size-15">下次再说</span>'
                         +    '</a>'
                         +    '<a href="/passport/addcart" class="btn btn_orange layout layout-align-center-center ui-link margin-left-10 flex">'
                         +       '<span class="font-size-15">上传名片</span>'
                         +    '</a>'
                         + '</div>'
                         +'</div>';

                    $(".modal-body").append(str);


                   }else if(data.msg == 6){
                        showDialog("#showpay");
                        $(".modal-body").html("");

                       $('#sub-dialog-title').text("提示");
                        var str='<p class="deng_col">身份认证中...</p>'
                           +'<div class="font-size-14">'
                           +'<p>身份认证通过后，将获得完整功能体验！</p>'
                           +'<p>我们会尽快联系您，如有疑问请拨打400-0038-150</p>'
                           +'</div>';
                        $(".modal-body").html(str);
                        var str1='<div class="reward_modal_foot layout layout-align-center">'
                            +'<div class="btn_box" style="width:120px;">'
                            +'<a href="#" class="close btn btn_default" style="height:38px;line-height:38px;">关闭</a>'
                            +'</div>'
                            +'</div>';
                        $(".reward_modal_foot").remove("div.reward_modal_foot");
                        $(".modal-content").append(str1);

                   }else if(data.msg == 7){
                        showDialog("#showpay");
                        $(".modal-body").html("");
                        $('#sub-dialog-title').text("提示");
                        var str='<p class="deng_col">很抱歉，您没有通过身份认证。</p>'
                            +'<div class="font-size-14">'
                            +'<p>身份认证通过后，将获得完整功能体验！</p>'
                            +'<p>请更新认证资料，更新后我们会尽快认证，如有疑问请拨</p>'
                            +'<p>打400-0038-150</p>'
                            +'</div>';
                        $(".modal-body").html(str);
                        var str1='<div class="reward_modal_foot layout layout-align-center">'
                            +'<div class="btn_box" style="width:120px;">'
                            +'<a href="#" class="close btn btn_default" style="height:38px;line-height:38px;">下次再说</a>'
                            +'</div>'
                            +'<div class="margin-left-20 btn_box" style="width:120px;">'
                            +'<a href="/passport/addcart" class="btn font-size-13" style="line-height:40px;">更新认证资料</a>'
                            +'</div>'
                            +'</div>';
                        $(".reward_modal_foot").remove("div.reward_modal_foot");
                        $(".modal-content").append(str1);
                   }

                },
                error:function(){
                    $(".modal-content").html("");
                    $('#sub-dialog-title').text("提示");
                     var str='<p class="deng_col">您的信息有误，请稍后再试！</p>';
                     $(".modal-body").html(str);
                     var str1='<div class="reward_modal_foot layout layout-align-center">'
                         +'<div class="btn_box" style="width:120px;">'
                         +'<a href="#" class="close btn btn_default" style="height:38px;line-height:38px;">关闭</a>'
                         +'</div>'
                         +'</div>';
                     $(".modal-content").append(str1);
                }
            })
        })
    })
</script>
</section>





