<?php 
$demand_type = $csinfo['return']['demand_type'];
$demand_id = $csinfo['return']['demand_id'];
?>
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
                           <p class="reward_1" style="margin:0;"><span class="reward_1_tit font-size-12">悬赏金&nbsp;</span><span style="font-size:15px;color:#D8992C;"><?php echo $csinfo['return']['money_task'];?> </span>&nbsp;&nbsp;&nbsp;&nbsp;
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
				<script type='text/javascript'>
            		window.onload =	commonUtilInstance.forwardneed_weixin(
                		"发现一个好铺位，万人在抢就等你来！",
                		"<?php echo $csinfo['return']['cs_name'];?>/<?php echo($csinfo['return']['category_str']); ?>/<?php if(isset($csinfo['return']['min_size'])) echo $csinfo['return']['min_size'];?>-<?php if(isset($csinfo['return']['min_size'])) echo $csinfo['return']['max_size']?>㎡/<?php echo  $csinfo['return']['demand_shop_type_str'];?>",
                		"<?php echo C('WEB_URL').'/cs/csinfo/csid/'.$csinfo['return']['demand_id'];?>",
                		"<?php echo $csinfo['return']['logo'];?>");
				</script>
				<?php
					}else{ ?>
					<!-- 拓展 -->
					<script type='text/javascript'>
							window.onload =	commonUtilInstance.forwardneed_weixin(
								"发现一个好品牌，万人在抢就等你来！",
							  "<?php echo $csinfo['return']['cs_name'];?>/<?php echo($csinfo['return']['category_str']); ?>/<?php echo($csinfo['return']['group_36_str']);?>/<?php echo $csinfo['return']['min_size'];?>-<?php if(isset($csinfo['return']['min_size'])) echo $csinfo['return']['max_size']?>㎡",
							  "<?php echo C('WEB_URL').'/cs/csinfo/csid/'.$csinfo['return']['demand_id'];?>",
							  "<?php echo $csinfo['return']['logo'];?>");
					</script>
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
					<?php if (!empty($csinfo[0]['cs']['expire_at'])){?>
					<div class="reward_left_top_item layout font-size-14">
						<div class="detail_head_basic_item_label gray999 font-size-16">截止日期：</div>
						<div class="detail_head_basic_item_c flex"><?php if(isset($csinfo[0]['cs']['expire_at'])) { echo substr($csinfo[0]['cs']['expire_at'],0,10);}?></div>
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

<div data-role="footer"  class="" style="height:60px;opacity:1 !important;background:#fff;position: fixed;bottom:0;left:0;width:100%;z-index:100;">
    <div id="btn" class="btn_box font-size-14 detail-container" style="height:40px;line-height:40px;margin-top:10px">
       <!--<a href="/letter/send/receiver_id/<?php echo $csinfo['passport_info']['passport_id'];?>" class="fl btn btn_default text-center " style="display:inline-block;width:48%;box-sizing:border-box;">发送私信</a>-->
       <!--<a id="apply" <?php if($loginstatus == 1) { ?> href="/passport/loginjump/jump/{jumpurl}" <?php }elseif($loginstatus == 3){?> href="/cs/csinvite/demand_type/<?php echo $csinfo['return']['demand_type'];?>/demand_id/<?php echo($csinfo['return']['demand_id']);?>"<?php }elseif($loginstatus == 2){ ?>href = "#" <?php }else{?> onclick="showDialog('#showpay');"<?php } ?> class="btn btn_full_able text-center fr" style="display:inline-block;width:48%;box-sizing:border-box;">立即申请</a>-->
        <?php if($loginstatus == 1){ ?>
        <a  id="apply"  class="btn btn_full_able text-center fr" style="display:inline-block;width:100%;box-sizing:border-box;">获取赏金</a>
        <?php }else{?>
            <a  id="apply"  class="btn btn_full_able text-center fr" style="display:inline-block;width:100%;box-sizing:border-box;">获取赏金</a>
        <?php } ?>
       <!--<a id="apply" class="btn btn_full_able text-center fr" style="display:inline-block;width:100%;box-sizing:border-box;">立即申请</a>-->
    </div>
</div>
<script>
    $(function(){
        var swiper = new Swiper('.swiper-container',{
            spaceBetween: 20,
            slidesPerView:"auto"
        });
        $('#apply').click(function(){
             //$('body').animate({scrollTop: $(".needFormTit1").offset().top},200);
             //window.location.href='#lookdateitem';
             window.location.href='#need_add';
             showDialog("#showpay");
        });
        $("#showpay").click(function(){
            hideDialog("#showpay");
        });

        $(document).on("pagebeforeshow","#need_add",function(){ // 当进入页面二时
            $("#showpay").removeClass("on");
            $('.date-ico').click(function(){
                $("#laydate_box").show();
            })

        });
        $(document).on("pagebeforehide","#need_add",function(){ // 当离开页面二时

          $("#laydate_box").hide();
           hideDialog("#showpay");
        });
    });


</script>
</section>
<div id="showpay" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal dialog_qrcode" style="height: 1489px;">
    <div class="modal-backdrop fade" style="height: 1489px;opacity:0.6;"></div>
    <div class="modal-dialog-1">
        <div class="modal-content">
            <div><img src="/img/activity/share_dialog_1.png" style="width:300px;"></div>
            <div style="margin-top:60px;"><a href="#" style="display:inline-block;"><img src="/img/activity/share_dialog_2.png" width="300"></a></div>
        </div>
    </div>
</div>

<article data-role="page" id="need_add" data-title="方橙" class="contain">
    <header data-role="header" data-theme="b" class="header">
       <a href="/cs/list" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back" data-ajax="false">悬赏</a>
        <?php if($demand_type == 2){?>
            <h4>
        		申请看场
        	</h4>
        	<?php }else{?>
        	<h4>
        		邀请看场
        	</h4>
        	<?php } ?>
    </header>
    <div data-role="content" class="detail_content">
        <div class="detail_main" style="padding:10px 15px 10px 10px">
            <div class="formwrapper">
                        <form id="payform" action="/cs/applykc/" method="post">
                        <p class="needFormTit">标*为必填项目</p>
                            <?php if ($passport_type == 4){?>
                           <!--<div class="layout form-item form-item-checkbox form-item-object">
                                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex mall text-ok">
                                    <i class="check_bg"></i>
                                    <div class="check_tit">发布招商需求</div>
                                </div>
                                <div onclick="javascript:window.location.href='/demand/brandneed'" class="form-input-wrapper layout layout-align-start-center ui-field-contain flex brand ">
                                    <i class="check_bg"></i>
                                    <div class="check_tit">发布拓展需求</div>
                                </div>
                           </div>-->
                           <?php }?>
                           <input id="payform-demand_id" type="hidden" name="demand_id" value="<?php echo $csid; ?>">
                           <div id="lookdateitem" class="form-item" validate-item="look-date">
                                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                    <label class="text-label text-label-imgCode">*看场日期：</label>
                                    <div class="text-input flex flex100">
                                        <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><input id="lookdate" validate-field="look-date" required-msg="请选择您期望的看场日期" validate-type="required" readonly="readonly" type="text" name="cs_passport_apply_agree_at" value="" placeholder="请选择您期望的看场日期"></div>
                                    </div>
                                    <span class="date-ico"></span>
                                </div>
                                <div validate-msg="look-date" class="hide tip"></div>
                           </div>
                           <?php if($demand_type == 2) {?>
                           <div class="margin-top-20 font-size-14">请填写您准备带去看场的品牌信息</div>
                           <?php }else {?>
                           <div class="margin-top-20 font-size-14">请填写您代表的商业体（或商铺）信息</div>
                            					<?php }?>

                            <div class="margin-top-10 ">
                                <div data-search-container="" class="form-item" validate-item="brand">
                                   <div validate-ok="brand" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                       <div class="text-input flex flex100">
                                           <?php if($demand_type == 2) {?>
                                           <input data-search-name data-search="1" validate-field="brand" required-msg="请填写品牌名称" validate-type="required"  type="text" name="brand_name" value='' placeholder="*请填写品牌名称" />
                                           <input data-search-value type="hidden" name="brand_id" value='' />
                                           <?php }else {?>
                                           <input data-search-name data-search="2" validate-field="brand" required-msg="请填写商业体名称" validate-type="required" type="text" name="mall_name" value='' placeholder="*请填写商业体名称" />
                                           <input data-search-value type="hidden" name="mall_id" value='' />
                                           <?php }?>
                                       </div>
                                   </div>
                                   <div validate-msg="brand" class="hide tip">
                                   </div>
                                   <script type="text/javascript">
                                       $('[data-search]').on('input',function() {
                                           commonUtilInstance.search({
                                               type:$(this).attr('data-search'),
                                               name:$(this).val()
                                           },$(this),$('[data-search-container]'),function(d,input,e) {
                                               $('[data-search-name]').val(d.name);
                                               $('[data-search-value]').val(d.value);
                                           });
                                       })
                                   </script>
                            </div>
                           <div class="form-item" validate-item="malladdress">
                              <div validate-ok="malladdress" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                  <div class="text-input flex flex100">
                                      <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><input validate-field="malladdress" required-msg="请输入商业体或商铺地址" validate-type="required" type="text" name="mall_addr" value="" placeholder="*请输入商业体或商铺地址"></div>
                                  </div>
                              </div>
                              <div validate-msg="malladdress" class="hide tip">
                              </div>
                            </div>
                            <div class="form-item flex flex100 width100 cl">
                                <div class="flex margin-right-10 fl" validate-item="person">
                                    <div>
                                        <div validate-ok="person" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                            <div class="text-input flex flex100">
                                                <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><input validate-field="person" required-msg="请填写联系人姓名" validate-type="required" type="text" name="cs_passport_apply_contact_name[]" value="" placeholder="*请填写联系人姓名"></div>
                                            </div>
                                        </div>
                                        <div validate-msg="person" class="hide tip">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex fl" validate-item="phone">
                                    <div>
                                        <div validate-ok="phone" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                            <div class="text-input flex flex100">
                                                <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><input validate-field="phone" required-msg="请填写联系人电话" mobile-msg="请输入有效的手机号" validate-type="required,mobile" type="text" name="cs_passport_apply_contact_mobile[]" value="" placeholder="*请填写联系人电话"></div>
                                            </div>
                                        </div>
                                        <div validate-msg="phone" class="hide tip">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="addcontact" class="margin-top-10" style="font-size:12px;line-height:16px;">
                                <span class="add-icon">+</span>&nbsp;<span class="gray999">增加一个<?php if($demand_type == 2){ ?> 品牌<?php }else{ ?>商业体<?php } ?>联系人</span>
                            </div>
                            <div class="margin-top-20 font-size-14 gray999">
                                为避免纠纷，悬赏金最终结算将会从您填写的联系人中确认，看场前发布人不会看到此信息，请放心、如实填写！
                            </div>
                           </div>
                          </form>
                        </div>
                                        <div class="reward_modal_foot layout layout-align-center margin-top-40">
                                            <div class="btn_box text-center margin-top-20" style="width:100%;line-height:40px;">
                                                <a href="javascript:dopay();" class="btn btn_full_able ui-link font-size-14">提交申请</a>
                                            </div>
                                            <div id="contacttemp" class="hide">
                                                <div class="form-item flex flex100 cl">
                                                    <div class="flex margin-right-10 fl" validate-item="person">
                                                        <div>
                                                            <div validate-ok="person" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                                                <div class="text-input flex flex100">
                                                                    <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><input validate-field="person" required-msg="请填写联系人姓名" validate-type="required" type="text" name="cs_passport_apply_contact_name[]" value="" placeholder="请填写联系人姓名"></div>
                                                                </div>
                                                            </div>
                                                            <div validate-msg="person" class="hide tip">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex fl" validate-item="phone">
                                                        <div>
                                                            <div validate-ok="phone" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                                                <div class="text-input flex flex100">
                                                                    <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><input validate-field="phone" required-msg="请填写联系人电话" mobile-msg="请输入有效的手机号" validate-type="required,mobile" type="text" name="cs_passport_apply_contact_mobile[]" value="" placeholder="请填写联系人电话"></div>
                                                                </div>
                                                            </div>
                                                            <div validate-msg="phone" class="hide tip">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="del-icon">x</span>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $('#payform').validate();
                                            function dopay() {
                                                if($('#payform').doValidate()) {
                                                    commonUtilInstance.submitSignup('#payform','/ucenter/myapplycs');
                                                }
                                            }
                                            $('#addcontact .add-icon').on('click',function() {
                                                $('#addcontact').before($('#contacttemp').html());
                                                $('#payform').validate();
                                            });
                                            $('#payform').on('click','.del-icon',function() {
                                                $(this).parent('.form-item').remove();
                                                $('#payform').validate();
                                            });
                                            $('#lookdateitem').on('click',function() {
                                                laydate({
                                                    elem: '#lookdate',
                                                    min: laydate.now(),
                                                    choose:function(date) {
                                                        $('#lookdateitem .form-input-wrapper').addClass('text-ok');
                                                        $('#lookdateitem .tip').addClass('hide');
                                                    }
                                                });
                                            });
                                            function doOperate(dialog,dom) {
                                                var _d = $(dom);
                                                $('#payform-demand_id').val(_d.attr('data-demand_id'));
                                                showDialog(dialog);
                                            }

                                        </script>

                                    </div>
                                </div>
                            </div>


