<form id="userInfo" action="/ucenter/applykc" method="post">
<section data-role="page" id="main_index_1" data-title="方橙" class="contain bggray">

    <header data-role="header" data-theme="b"class="header">
        <a href="/cs/list/" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back">悬赏</a>
        <h1>好友推荐给你的#项目/品牌#</h1>
    </header>

 <input id="curent_demand_id" type="hidden" value="<?php echo($csinfo['return']['demand_id']);?>" />
 <input id="curent_type" type="hidden" value="<?php echo($csinfo['return']['demand_type']);?>" />

<div  class="" style="position: fixed;height:60px;opacity:1 !important;background:#fff;bottom:0;left:0;width:100%;z-index:100;">
    <div id="btn" class="btn_box font-size-14 detail-container" style="height:40px;line-height:40px;margin-top:10px">
       <!--<a href="/letter/send/receiver_id/<?php echo $csinfo['passport_info']['passport_id'];?>" class="fl btn btn_default text-center " style="display:inline-block;width:48%;box-sizing:border-box;">发送私信</a>-->
       <!--<a id="apply" <?php if($loginstatus == 1) { ?> href="/passport/loginjump/jump/{jumpurl}" <?php }elseif($loginstatus == 3){?> href="/cs/csinvite/demand_type/<?php echo $csinfo['return']['demand_type'];?>/demand_id/<?php echo($csinfo['return']['demand_id']);?>"<?php }elseif($loginstatus == 2){ ?>href = "#" <?php }else{?> onclick="showDialog('#showpay');"<?php } ?> class="btn btn_full_able text-center fr" style="display:inline-block;width:48%;box-sizing:border-box;">立即申请</a>-->
        <?php if($loginstatus == 1){ ?>
        <a  id="apply"  class="btn btn_full_able text-center fr" style="display:inline-block;width:100%;box-sizing:border-box;">立即申请</a>
        <?php }else{?>
            <a  id="apply"  class="btn btn_full_able text-center fr" style="display:inline-block;width:100%;box-sizing:border-box;">立即申请</a>
        <?php } ?>
       <!--<a id="apply" class="btn btn_full_able text-center fr" style="display:inline-block;width:100%;box-sizing:border-box;">立即申请</a>-->
    </div>
</div>
 <div data-role="content" class="detail_content bggray" style="overflow-y:hidden;">
 	<div>
 	    <div class="detail-container margin-bottom-20 font-size-14 bgff posr" style="padding:20px 10px 2px;">
            <div class="need_item_top layout">
                 <div class="face24">
                 	<img alt="" src="{csinfo['return']['logo']}" onerror="this.src='/img/detail/logo_big.png'">
                 </div>
                 <div class="flex layout-column margin-left-10 need_item_top_right">
                 	<div class="obj-name font-size-14">
                 	    <span class="gray333 nowrap">李某某</span>
                 	</div>
                    <div class="honorarium" >
                        <p class="reward_1" style="margin:0;width:160px;">
                            <span class="reward_1_tit font-size-12 gray999">公司名称：北京市某某某某某某某某有限公司</span>
                        </p>
                    </div>
                 </div>
            </div>
            <div class="padding-top-20 padding-bottom-20 gray999">
               您的好友推荐了一个#项目/品牌#给你，这个#项目/品牌#可能适合你，立即申请获得合作。
            </div>
            <div class="btn_box relation relation_able posa" style="top:24px;right:10px;">
                <div class="btn layout layout-align-center-center">
                    <i onclick="javascript:location.href='/details/userlist/brand_id/23472/url/aHR0cDovL3Rlc3QxMzQvZGV0YWlscy9icmFuZC9icmFuZF9pZC8yMzQ3Mg,,'" class="icon_btn icon_relation_tel"></i>
                    <span onclick="javascript:location.href='/details/userlist/brand_id/23472/url/L2RldGFpbHMvYnJhbmQvYnJhbmRfaWQvMjM0NzI,'">电话联系</span>
                </div>
            </div>
        </div>
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
                           <p class="reward_1 gray333" style="margin:0;"><span class="reward_1_tit font-size-12">公司名称：北京市某某某某某某某某有限公司</p>
                        </div>
                    </div>
                </div>
                <div class="bgff">
                    <p>
                        <span class="font-size-16 gray999">联系人：</span><span class="user_name orange" onclick=" window.location.href='/ucenter/index/passport_id/<?php echo $csinfo['passport_info']['passport_id'];?>'"><?php echo $csinfo['passport_info']['passport_name']?></span>
                        <?php if ($csinfo['passport_info']['passport_status'] == 2){?><span class="icon_btn  icon_v"></span><?php }?><span class="gray999 font-size-12">&nbsp;&nbsp;<?php echo $csinfo['passport_info']['passport_job_title'];?></span>
                    </p>
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
            <!--<?php if($csinfo[0]['cs']['money_traffic']  > 0 ){ ?>
            <div class="detail-container margin-top-20 font-size-12 padding-top-20 padding-bottom-10 bgff" style="border-bottom:1px solid #e4e4e4" >
                <p class="honorarium_tip gray999" style="margin:0">*车马费说明：<?php echo $csinfo[0]['cs']['money_traffic'] / 100; ?>元为车马费总额。前<?php echo $csinfo[0]['cs']['money_traffic_num']; ?>名申请并成功看场的用户，每位可以得到<em class="cd8992c"><?php echo $csinfo[0]['cs']['money_traffic_pre'] / 100; ?>
                元</em>车马费！</p>
            </div>
            <?php } ?>-->
 	    </div>

 	</div>

  <div>
    <div class="bgff" style="border-bottom:1px solid #e8e8e8;padding:15px 0 10px 10px;">悬赏详情</div>
	<div class="detail-container overflow cl detail_reward bgff">
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

 </div>
 <div class="detail_main share_page" style="padding:0;margin-bottom:60px;">
             <div class="formwrapper" style="background-color:#f8f8f8;">
                            <div class="needFormTit1 bgff" style="padding:10px 0 10px 10px;border-top:1px solid #e8992c;border-bottom:1px solid #e8e8e8;">填写基本信息</div>
                            <input id="payform-demand_id" type="hidden" name="demand_id" value="5756c3ae99fd52b822000029">
                            <div class="form-item" validate-item="person">
                                <div validate-ok="person" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                     <label class="text-label text-label-imgCode">姓名：</label>
                                     <div class="text-input flex flex100">
                                         <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><input class="text-input" validate-field="person" required-msg="请输入姓名" validate-type="required" type="text" name="cs_passport_apply_contact_name[]" value="" placeholder="请输入姓名"></div></div>
                                     </div>
                                </div>
                                <div validate-msg="person" class="hide tip">
                                </div>
                            </div>
                            <div class="form-item" validate-item="mobile">
                                <div validate-ok="mobile" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                     <label class="text-label text-label-imgCode">手机号码：</label>
                                     <div class="text-input flex flex100">
                                        <input class="text-input" validate-field="mobile" required-msg="请输入手机号" mobile-msg="请输入有效的手机号" validate-type="required,mobile" type="text" name="passport_mobile" value="" placeholder="请输入手机号">
                                     </div>
                                </div>
                                <div validate-msg="mobile" class="hide tip">
                                </div>
                            </div>
                            <div class="layout form-item margin-bottom-30 posr">
                                 <div for="input" id="codeField" validate-item="smscode" class="flex layout layout-column">
                                     <div validate-ok="smscode" class="form-input-wrapper layout layout-align-start-center ui-field-contain" style="height:42px;">
                                         <label class="text-label text-label-mobile">验证码：</label>
                                         <div class="flex flex100">
                                             <input  validate-blur validate-field="smscode" required-msg="请输入验证码" sms-msg="验证码输入错误" validate-type="required,sms" data-mobile="" name="mobileCode" type="number" class="text-input" placeholder="请输入验证码"/>
                                         </div>
                                     </div>
                                     <div validate-msg="smscode" class="hide tip"></div>
                                 </div>
                                 <div class="codeBox1 btn_box">
                                     <input id="sendSmsBtn" type="button" class="newbtn_disable" value="获取验证码" data-role="none"/>
                                 </div>
                            </div>
                            <div for="a" id="cityField" class="form-item" validate-item="cityField">
                             	<div validate-ok="cityField" class="form-input-wrapper layout layout-align-start-center ui-field-contain <?php if(!empty($area_str)) ?>text-ok<?php ?>">
                             		<label class="text-label text-label-imgCode">所在城市：</label>
                             		 <a class="custom-select-header layout layout-align-start-center flex ui-link" href="#select-custom-city" data-transition="slide">
                             			<div class="custom-select-name nowrap">
                             				<span><?php echo empty($area_str)?"选择城市":$area_str;?></span>
                             			</div>
                             		 </a>
                             		 <i class="caret_right"></i>
                             		 <input id="area_id" class="text-input" type="hidden" name="area_id" value="<?php echo $userinfo['area_id']?>" validate-field="cityField" validate-type="required">
                             	</div>
                             	<div validate-msg="cityField" class="hide tip">请填写所在城市信息</div>
                            </div>
                            <div for="a" id="jobField" class="form-item"validate-item="jobField">
                             	<div validate-ok="jobField" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                             		<label class="text-label text-label-imgCode">职位：</label>
                             		 <a class="custom-select-header flex layout layout-align-start-center ui-link" href="#select-custom-job" data-transition="slide">
                             			<div class="custom-select-name"><?php echo empty($userinfo['passport_job_title'])?'选择您的职位头衔':$userinfo['passport_job_title'];?></div>
                             		 </a>
                             		 <i class="caret_right"></i>
                             		 <input class="text-input" validate-field="jobField" validate-type="required" type="hidden" name="passport_job_title" value="<?php echo $passportInfo['passport_job_title'];?>">
                             	</div>
                             	<div validate-msg="jobField" class="hide tip">请填写职位信息</div>
                            </div>
                            <div id="email" for="input" validate-item="email" class="form-item">
                                 <div validate-ok="email" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                     <label class="text-label text-label-email">邮箱：</label>
                                     <input class="text-input" validate-blur validate-field="email" required-msg="请输入您的邮箱" email-msg="可使用字母、数字、减号、下划线" uniqueEmail-msg="Email已被占用" validate-type="required,email,uniqueEmail" type="text" name="passport_email" class="text-input" maxlength="60" placeholder="输入您的常用邮箱"/>
                                 </div>
                                 <div validate-msg="email" class="hide tip">
                                 </div>
                                 <div class="hide tip successTip">
                                      可使用字母、数字、减号、下划线
                                 </div>
                            </div>
                            <p class="gray999 font-size-13 padding-left-10">您的职场身份：</p>
                            <div id="identity" class="form-item form-item-job" validate-item="identity">
                                <div class="layout form-item-checkbox form-item-gender">
                                    <div class="form-input-wrapper layout layout-align-center-center ui-field-contain flex" value="3">
                                        <i class="check_bg"></i>
                                        <div class="check_tit">总部<br>招商</div>
                                    </div>
                                    <div class="form-input-wrapper layout layout-align-center-center ui-field-contain flex" value="2">
                                        <i class="check_bg"></i>
                                        <div class="check_tit">项目<br>招商</div>
                                    </div>
                                    <div class="form-input-wrapper layout layout-align-center-center ui-field-contain flex" value="1">
                                        <i class="check_bg"></i>
                                        <div class="check_tit">品牌<br>选址</div>
                                    </div>
                                    <div class="form-input-wrapper layout layout-align-center-center ui-field-contain flex" value="4">
                                        <i class="check_bg"></i>
                                        <div class="check_tit">第三方</div>
                                    </div>
                                </div>
                            	<div validate-msg="identity" class="hide tip">
                                    请选择您的职场身份
                                </div>
                                <input id="identity_value" type="hidden" validate-field="identity" validate-type="checked" name="passport_type" value=""/>
                            </div>

                     <!--</form>-->
                     <!--<form id="userInfo" action="/ucenter/dobrandjob" method="post">-->
                            <div class="margin-top-20 font-size-16 bgff" style="padding:10px 0 10px 10px;border-top:1px solid #e8992c;border-bottom:1px solid #e8e8e8;">填写申请商业体信息</div>
                            <!--<div class="margin-top-20 font-size-16" style="padding:10px 0 10px 10px;border-top:1px solid #e8992c;border-bottom:1px solid #e8e8e8;">填写品牌信息</div>-->
                            <div id="lookdateitem" class="form-item" validate-item="look-date">
                                 <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                     <label class="text-label text-label-imgCode">看场日期：</label>
                                     <div class="text-input flex flex100">
                                         <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><input id="lookdate" class="text-input" validate-field="look-date" required-msg="请选择您期望的看场日期" validate-type="required" readonly="readonly" type="text" name="cs_passport_apply_agree_at" value="" placeholder="请选择您期望的看场日期"></div></div>
                                     </div>
                                     <span class="date-ico"></span>
                                 </div>
                                 <div validate-msg="look-date" class="hide tip"></div>
                            </div>
                            <div id="company" for="input" validate-item="company" class="form-item">
                                 <div validate-ok="company" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                     <label class="text-label text-label-imgCode">公司名称：</label>
                                     <input validate-field="company" validate-type="required" type="text" onkeyup="commonUtilInstance.company_word(this);"name="passport_company" class="text-input" maxlength="50" placeholder="请输入您的公司名称"/>
                                 </div>
                                 <div validate-msg="company" class="hide tip">
                                     请输入您的公司名称
                                 </div>
                            </div>
                            <div class="margin-top-20 padding-bottom-20">
                                 <div data-search-container="" class="form-item" validate-item="brand">
                                    <div validate-ok="brand" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                        <div class="text-input flex flex100">
                                           <?php if($demand_type == 2) {?>
                                           <input class="text-input" data-search-name data-search="1" validate-field="brand" required-msg="请填写品牌名称" validate-type="required"  type="text" name="brand_name" value='' placeholder="请填写品牌名称" />
                                           <input data-search-value type="hidden" name="brand_id" value='' />
                                           <?php }else {?>
                                           <input class="text-input" data-search-name data-search="2" validate-field="brand" required-msg="请填写商业体名称" validate-type="required" type="text" name="mall_name" value='' placeholder="请填写商业体名称" />
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
                                       <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><input class="text-input" validate-field="malladdress" required-msg="请填写商业体或商铺地址" validate-type="required" type="text" name="mall_addr" value="" placeholder="请填写商业体或商铺地址"></div></div>
                                   </div>
                               </div>
                               <div validate-msg="malladdress" class="hide tip">
                               </div>
                            </div>
   <!--品牌部分-->
                <div for="a" id="category" class="form-item" validate-item="category">
                        <div validate-ok="category" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                            <label class="text-label text-label-imgCode">业态：</label>
                            <a class="custom-select-header flex layout layout-align-start-center category" href="#select-custom-format" data-transition="slide">
                                <div class="custom-select-name"><?php echo  empty($val['cone'])&& empty($val['ctwo'])?"选择该品牌所在业态":htmlspecialchars_decode($val['c_all']);?></div>
                            </a>
                            <i class="caret_right"></i>
                            <input _name="category_ids" type="hidden" name="category_ids[]" value="<?php echo $val['category_ids'];?>"/>
                            <input type="hidden" _name="category_ids_other" name="category_ids_other[]" value="<?php echo $val['category_ids_other'];?>"/>
                            <input id="detai_category_bind" validate-field="category" validate-type="required" name="detai_category_bind" type="hidden" value=""/>
                        </div>
                        <div validate-msg="category" class="hide tip">请选择品牌所在业态</div>
                    </div>
					<div for="a" class="form-item" validate-item="area">
						<div validate-ok="area" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
							<label class="text-label text-label-imgCode">负责区域：</label>
							<a class="custom-select-header layout layout-align-start-center flex city" href="#select-custom-city" data-transition="slide">
								<div class="custom-select-name nowrap"><?php if(empty($val['area'])){ ?>选择您负责的区域<?php }else{ echo $val['area'];}?></div>
							</a>
							<i class="caret_right"></i>
							<input _name="area" validate-field="area" validate-type="required" type="hidden" name="area_ids[]" value="{val['area_ids']}">
						</div>
						<div validate-msg="area" class="hide tip">请填写您负责的区域信息</div>
					</div>
                    <div class="form-item" validate-item="type">
                        <div class="layout form-item-checkbox form-item-gender">
                            <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex <?php echo (empty($val['passport_brand_style'])||$val['passport_brand_style']==1)?'text-ok':''; ?> ">
                                <i class="check_bg"></i>
                                <div class="check_tit flex">直营 </div>
                            </div>
                            <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex <?php echo $val['passport_brand_style']==2?"text-ok":'';?>">
                                <i class="check_bg"></i>
                                <div class="check_tit flex">加盟</div>
                            </div>
                            <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex <?php echo $val['passport_brand_style']==3?"text-ok":'';?>">
                                <i class="check_bg"></i>
                                <div class="check_tit flex">代理</div>
                            </div>
                        </div>
                        <input validate-field="type" validate-type="checked" type="hidden" name="passport_brand_style[]" value="<?php echo $val['passport_brand_style'];?>">
						<div validate-msg="type" class="hide tip">请选择您的经营方式</div>
                    </div>

                     </form>
  </div>

<script>
    function change(){
                   $('body').animate({scrollTop: $(".needFormTit1").offset().top}, 200);
                   //window.location.href='#lookdateitem';
                   $('#btn').html('<a id="apply1" onclick="dopay();"  class="btn btn_full_able text-center fr" style="display:inline-block;width:100%;box-sizing:border-box;">提交表格</a>');

    }
$(function(){
        var swiper = new Swiper('.swiper-container',{
            spaceBetween: 20,
            slidesPerView:"auto"
     });

    $(function(){
        var clickNum=0;
        $('#apply').click(function(){
              clickNum++;
              alert(1)
              $('body').animate({scrollTop: $(".needFormTit1").offset().top},200).css('overflow','auto');
              //window.location.href='#lookdateitem';

              //$('#apply').html("提交表格");
              $('#btn').html('<a id="apply1" onclick="dopay();"  class="btn btn_full_able text-center fr" style="display:inline-block;width:100%;box-sizing:border-box;">提交表格</a>');

        });
        $(document).scroll(function(){
            if($(document).scrollTop()+$(window).height()>=$(".needFormTit1").offset().top+70){
             //$('#apply').html("提交表格");
             //$('#apply').remove();
             $('#btn').html('<a id="apply1" onclick="dopay();"  class="btn btn_full_able text-center fr" style="display:inline-block;width:100%;box-sizing:border-box;">提交表格</a>')

            }else{
             //$('#apply').html("获取赏金");
            //$('#apply1').remove();
            $('#btn').html('<a id="apply" onclick="change()" class="btn btn_full_able text-center fr" style="display:inline-block;width:100%;box-sizing:border-box;">获取赏金</a>');
            }

        })
    });
});

</script>
<script>

$('.codeBox1').css('border-left','1px solid #ccc');
$('input[validate-field="mobile"]').keyup(function(){
    if($('input[validate-field="mobile"]').val().length==11){

        $('#sendSmsBtn').removeClass('newbtn_disable').attr('disabled',false).addClass('newbtn');
        $('.codeBox1').css('border-left','1px solid #efbd59');
    }else{
       $('#sendSmsBtn').attr('disabled',true).addClass('newbtn_disable');
       $('.codeBox1').css('border-left','1px solid #ccc');
    }
})

 $('#userInfo').validate();
    $('#apply1').on('click',function() {
        if($('#userInfo').doValidate()) {
            commonUtilInstance.submitSignup('#userInfo',$('#jump').val());
        }
    });
    commonUtilInstance.tab(".tab-list",".detail_content","current");
    var InterValObj1; //timer变量，控制时间
    var curCount1 = 30; //当前剩余秒数

    $('#sendSmsBtn').click( function() {

        if(!$('#userInfo').getValidator().validateByItem('mobile')) return;

        $('#sendSmsBtn').attr('disabled',true).addClass('newbtn_disable');
        sendSMS();
        timer();
        InterValObj1 = setInterval(timer, 1000);
        $('.codeBox1').css('border-left','1px solid #ccc');
        $('div[validate-win="mobile"]').removeClass('hide').html('我们已给你的手机号发送了一条验证短信');
        // setTimeout(function(){
        //$('div[validate-win="mobile"]').fadeOut('slow');
        //},3000)


    } );
    $('input[validate-field="mobile"]').blur(function(){
        $('div[validate-win="mobile"]').addClass('hide');
    })
    function timer() {
        if ( curCount1 === 0 ) {
            window.clearInterval( InterValObj1 ); //停止计时器
            $('#sendSmsBtn').removeClass('newbtn_disable').attr('disabled',false).addClass('newbtn').val( "重新获取验证码" );
            curCount1 = 30;
            $('.codeBox1').css('border-left','1px solid #efbd59');
             $('input[validate-field="mobile"]').attr('readonly',false);
        } else {
            curCount1 = curCount1 - 1;
            $('#sendSmsBtn').attr('disabled',true).addClass('newbtn_disable').val('重新发送'+'('+ curCount1+')');
            $('.codeBox1').css('border-left','1px solid #ccc');
            $('input[validate-field="mobile"]').attr('readonly',true);
        }
    }

    function sendSMS() {
        if(sendSMS.clickNum) sendSMS.clickNum = sendSMS.clickNum + 1;
        else sendSMS.clickNum = 1;
        var mobileNumber = $('#mobile input[name=passport_mobile]').val();
        if(sendSMS.clickNum === 1){
           commonUtilInstance.smsAjaxLogin(mobileNumber,2,1,1,0,successInfo);
        }else {
            commonUtilInstance.smsAjaxLogin(mobileNumber,2,1,1,0,successInfo);

        }
        function successInfo(success) {
            if(success) {
                $('[validate-msg=smscode]').addClass("hide");
            } else {
                $('[validate-msg=smscode]').addClass("hide");
            }
        }
    }



    function mobileSuccess() {
        $('#codeField input[data-mobile]').attr('data-mobile',$('#mobile input[name=passport_mobile]').val())
    }

</script>

</section>
<script>
$('#userInfo').validate();
/**
     * 编辑用户基本信息中，选择城市
     */
    $('#cityField a').click(function (e) {
        var that = $(this);
        var container = that.parents('.form-input-wrapper');
        $('#userInfo').register(function (val) {
            if (!val.isEmpty) {
                $('#area_id', container).val(val.allValue);
                $('.form-input-wrapper', that.parents('.form-item')).addClass("text-ok");
                that.find('span').html(val.name);
            } else {
                $('#area_id', container).val('');
                $('.form-input-wrapper', that.parents('.form-item')).removeClass("text-ok");
                that.find('span').html("选择城市");
            }
        }, {single: true, cityIds: $('#area_id', container).val(),cityOthers:'', returnTo: 'main_index_1'});
    });


$('#category a').click(function (e) {
    var category = $(this).parents('.form-item');
    $('#userInfo').register_category(function (val) {
    	if (!val.isEmpty) {
            $('.custom-select-name', category).html(val.allName);
            $('#detai_category_bind', category).val(val.allName);
            $('input[_name=category_ids]', category).val(val.value);
            $('input[_name=category_ids_other]', category).val(val.otherValue);
            $('.tip', category).addClass('hide');
            $('.form-input-wrapper', category).addClass('text-ok');
        } else {
            $('.form-input-wrapper', category).removeClass('text-ok');
            $('.custom-select-name', category).text('选择您主要负责招商的业态');
            $('#detai_category_bind', category).val('');
            $('input[_name=category_ids]', category).val('');
            $('input[_name=category_ids_other]', category).val('');
        }
    }, {returnTo: 'main_index_1', categoryIds:$('input[_name=category_ids]', category).val(),categoryOthers:$('input[_name=category_ids_other]', category).val()});
});

var jobList = new MWidget.ListPlug({
    pluginId:'select-custom-job',
    showFinish:false,
    title:'选择职位',
    data:[{
        name:'项目总经理',
        value:'项目总经理'
    },{
        name:'项目副总经理',
        value:'项目副总经理'
    },{
        name:'招商总监',
        value:'招商总监'
    },{
        name:'招商高级经理',
        value:'招商高级经理'
    },{
        name:'招商经理/副经理',
        value:'招商经理/副经理'
    },{
        name:'招商主管/主任',
        value:'招商主管/主任'
    },{
        name:'招商专员',
        value:'招商专员'
    },{
        name:'其他',
        value:'其他',
        more:true
    }],
    back:function(e) {
        MWidget.Util.go('main_index_1');
        e.preventDefault();
    },
    clickItem:function(d) {
        if(d.more) {
            this.non_selectAll();
            MWidget.Util.go('other-job');
            return true;
        }
        if(this.hasSelected(d)) this.non_select(d);
        else {
            this.non_selectAll().select(d);
            var selected = jobList.getSelected();
            setJob('#jobField',selected);
            MWidget.Util.go('main_index_1');
        }
    }
}).appendTo($('form'));

var otherJob = new MWidget.OtherPlug({
    pluginId:'other-job',
    title:'其它职位',
    inputLabel:'*职位头衔：',
    inputPlaceholder:'输入您的职位头衔',
    back:function(e) {
        MWidget.Util.go('select-custom-job');
        e.preventDefault();
    },
    confirm:function(val) {
        setJob('#jobField',[{name:val}]);
        MWidget.Util.go('main_index_1');
    },
    finish:function(e) {
        var selected = otherJob.getSelected();
        setJob('#jobField',selected);
        MWidget.Util.go('main_index_1');
        e.preventDefault();
    }
}).appendTo($('#userInfo'));

function setJob(id,selected) {
    if(selected.length != 0) {
        $(id+' .custom-select-name').text(selected[0].name);
        $(id+' input').val(selected[0].value||selected[0].name);
        $(id+' .tip').addClass('hide');
        $(id+' .form-input-wrapper').addClass('text-ok');
    } else {
        $(id+' .form-input-wrapper').removeClass('text-ok');
        $(id+' .custom-select-name').text('选择您的职位头衔');
        $(id+' input').val('');
    }
}

$('#select-custom-job .format-item').each(function(index,ele){
    if($('#jobField .custom-select-name').text()==$(ele).text()){
        $(ele).children('a').addClass('text-ok');
    }
    $(ele).click(function(){
         $(this).parents().find('a').removeClass('text-ok');
         $(this).children('a').addClass('text-ok');
    })
})

 $('#btnSubmit').click(function() {
console.log($('input[name="passport_job_title"]').val($('#jobField .custom-select-name').text()));
        $('#userInfo').validate();

        if($('#userInfo').doValidate()) {

            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();

            if(!first_name || !last_name) {
                $('#nameTip').removeClass('hide');
                return;
            } else {
                $('#nameTip').addClass('hide');
            }
            $('#userInfo').ajaxSubmit(function(data) {
                if(data && data.hasOwnProperty('result')) {
                    if(data && data.result == 1) {

                        comDialog.dialog('编辑成功', '用户信息修改成功', '返回', 'directDialog', '"/ucenter/index/url/L3VjZW50ZXIvaW5mb3JtYXRpb25vZm1pbmU,"');
                    } else {

                        comDialog.dialog('编辑失败', '用户信息修改失败', '关闭', 'easyDialog');
                    }
                }
            });
        }
    });
 $('#identity').on('click','.form-input-wrapper',function() {
        $('#identity .tip').addClass('hide');
        var val = $('#identity_value').val(),
            item_val = $(this).attr('value');
        if(val !== item_val) {
            identity = item_val;
            $('#identity_value').val(item_val);
            $(this).addClass('text-ok').siblings().removeClass('text-ok');
            if(item_val == '4') {
                $('#job').html($('#otherJobCopy').html());
            } else {
                $('#job').html($('#jobCopy').html());
                if(item_val == '1') {
                    jobList.update(CONSTANT.brandJob());
                } else {
                    jobList.update(CONSTANT.mallJob());
                }
            }
            $('#registerTwo').validate();
        }
    });
    /**
         * 选择品牌的类型，如直营商
         */
        $('#userInfo').on('click', '.check_tit', function () {
            $(this).parent().addClass('text-ok').parent().siblings('.tip').addClass('hide');
            $(this).parents().siblings().removeClass('text-ok');
            var inputObj = $(this).parents('.form-item').children('input');
            var text = $(this).text();
            switch (text.trim()) {
                case '直营':
                {
                    inputObj.val(1);
                    break;
                }
                case '加盟' :
                {
                    inputObj.val(2);
                    break;
                }
                case '代理' :
                {
                    inputObj.val(3);
                    break;
                }
            }
        });

</script>


                         <script type="text/javascript">
                             $('#userInfo').validate();
                             function dopay() {
                                 if($('#userInfo').doValidate()) {
                                     commonUtilInstance.submitSignup('#userInfo','/ucenter/myapplycs');
                                 }
                             }
                             $('#addcontact .add-icon').on('click',function() {
                                 $('#addcontact').before($('#contacttemp').html());
                                 $('#userInfo').validate();
                             });
                             $('#userInfo').on('click','.del-icon',function() {
                                 $(this).parent('.form-item').remove();
                                 $('#userInfo').validate();
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

