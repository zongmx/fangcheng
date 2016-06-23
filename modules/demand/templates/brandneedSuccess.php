<article data-role="page" id="need_add" data-title="方橙" class="contain">
    <header data-role="header" data-theme="b" class="header">
        <a href="/" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-home" data-ajax="false">首页</a>
        <h1>发布需求</h1>
    </header>
    <div data-role="content" class="detail_content">
        <div class="detail_main">
            <div class="formwrapper">
            	
                        <form id="sendNeed" method="post" action="/demand/dodemand">
                        
                        <p class="needFormTit">标*为必填项目</p>
                        <?php if ($passport_type == 4){?>
                            <div class="layout form-item form-item-checkbox form-item-object">
                                <div onclick="javascript:window.location.href='/demand/businessneed'" class="form-input-wrapper layout layout-align-start-center ui-field-contain flex mall ">
                                    <i class="check_bg"></i>
                                    <div class="check_tit">发布招商需求</div>
                                </div>
                               <div  class="form-input-wrapper layout layout-align-start-center ui-field-contain flex brand text-ok">
                                    <i class="check_bg"></i>
                                    <div class="check_tit">发布拓展需求</div>
                                </div>
                                
                            </div>
                           <?php }?>
                            <div for="a" id="brandField" validate-item="brand" class="form-item">
                                <div validate-ok="brand" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                    <label class="text-label text-label-imgCode">*品牌：</label>
                                    <a class="custom-select-header flex layout layout-align-start-center" href="#select-brand" data-transition="slide">
                                            <div class="custom-select-name">请选择您负责的品牌</div>
											
                                        </a>
                                    <i class="caret_right"></i>
                                    <input validate-field="brand" validate-type="required" type="hidden" name="brand_name" />
                                    <input type="hidden" name="brand_id" />
                                </div>
                                <div validate-msg="brand" class="hide tip">
                                    请选择您负责的品牌
                                </div>
                            </div>
                            <div for="a" id="categoryField" validate-item="category" class="form-item">
                                <div validate-ok="category" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                    <label class="text-label text-label-imgCode">*所属业态：</label>
                                    <a class="custom-select-header flex layout layout-align-start-center" href="#select-custom-format" data-transition="slide">
                                            <div class="custom-select-name">请选择您的品牌所属的业态</div>
											
                                        </a>
                                    <i class="caret_right"></i>
                                    <input _name="category" validate-type="required" validate-field="category" type="hidden"/>
                                    <input  _name="category_ids" type="hidden" name="category_ids" />
                                    <input _name="category_ids_other" type="hidden" name="category_ids_other" />
                                </div>
                                <div validate-msg="category" class="hide tip">
                                    请选择您的品牌所在的业态
                                </div>
                            </div>
                            <div for="a" id="cityField" validate-item="city" class="form-item">
                                <div validate-ok="city" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                    <label class="text-label text-label-imgCode">*拓展城市：</label>
                                    <a class="custom-select-header flex layout layout-align-start-center" href="#select-custom-city" data-transition="slide">
                                            <div class="custom-select-name">请选择想要拓展的城市</div>
											
                                        </a>
                                    <i class="caret_right"></i>
                                    <input type="hidden" _name="area_name" />
                                    <input validate-field="city" validate-type="required" type="hidden" name="area_id" />
                                </div>
                                <div validate-msg="city" class="hide tip">
                                    请选择想要拓展的城市
                                </div>
                            </div>
                            <div for="a" id="propertyField" validate-item="property" class="form-item">
                                <div validate-ok="property" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                    <label class="text-label text-label-imgCode">*首选物业：</label>
                                    <a class="custom-select-header flex layout layout-align-start-center" href="#select-property" data-transition="slide">
                                            <div class="custom-select-name nowrap">请选择首选物业</div>
											
                                        </a>
                                    <i class="caret_right"></i>
                                    <input _name='name' type="hidden"/>
                                    <input _name='value' validate-field="property" validate-type="required" type="hidden" name="group_36" />
                                </div>
                                <div validate-msg="property" class="hide tip">
                                    请选择首选物业
                                </div>
                            </div>
                            <div id="sizeField" validate-item="size" class="form-item form-item-two">
                                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                    <label validate-ok="size" class="text-label text-label-imgCode">*面积需求：</label>
                                    <div class="form-input-item-b flex flex100">
                                    <input id="demand_store_area_small" _name="low" validate-field="size" required-msg="请输入店铺面积" number-msg="请输入数字" validate-type="required,number" type="number" name="group_41[lower]" class="text-input" maxlength="50" placeholder="输入数字" />
                                    </div>
                                    <span>-</span>
                                    <div class="form-input-item-b flex flex100">
                                    <input id="demand_store_area_large" _name="up" validate-field="size" required-msg="请输入店铺面积" number-msg="请输入数字" validate-type="required,number" type="number" name="group_41[upper]" class="text-input" maxlength="50" placeholder="输入数字" />
                                	</div>
                                	<span class="font-size-12 gray999">&nbsp;㎡&nbsp;</span>
                                </div>
                                <div id="demand_error_msg" validate-msg="size" class="hide tip">请输入数字</div>
                            </div>
                            <div for="a" id="shopFormatField" validate-item="shopFormat" class="form-item">
                                <div validate-ok="shopFormat" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                    <label class="text-label text-label-imgCode">*工程条件：</label>
                                    <a class="custom-select-header flex layout layout-align-start-center" href="#select-shopFormat" data-transition="slide">
                                            <div class="custom-select-name">请选择店铺需要的工程条件</div>
											
                                        </a>
                                    <i class="caret_right"></i>
                                    <input _name='name' type="hidden"/>
                                    <input _name='value' validate-field="shopFormat" validate-type="required" type="hidden" name="group_46" />
                                </div>
                                <div validate-msg="shopFormat" class="hide tip">
                                    请选择店铺需要的工程条件
                                </div>
                            </div>
							
                            <div id="cooperateTimeField" validate-item="cooperateTime" class="form-item form-item-two">
                                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                    <label validate-ok="cooperateTime" class="text-label text-label-imgCode">期望年限：</label>
                                    <div class="form-input-item-b flex flex100">
                                    <input id="periodCooperation_lower" _name="low" validate-field="cooperateTime" validate-type="pint" type="number" name="group_40" class="text-input" maxlength="50" placeholder="输入数字" />
                                    </div>
                                	<span class="font-size-12 gray999">&nbsp;年&nbsp;</span>
                                </div>
                                <div id="periodCooperation_error_msg" validate-msg="cooperateTime" class="hide tip">
                                    请输入大于0的数值
                                </div>
                            </div>
                            <div id="remarkField" nonValidate validate-item="remark" class="form-item">
                                <div validate-ok="remark" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                    <label class="text-label text-label-imgCode">特色：</label>
                                    <div class="flex">
                                        <textarea validate-field="remark" name="demand_desc" maxlength="40" class="flex100" placeholder="如品牌特色、开店情况、目标人群、特殊拓展需求等。（40字以内）"></textarea>
                                    </div>

                                </div>
                                <div validate-msg="remark" class="hide tip">
                                </div>
                            </div>
                            <div class="form-item">
			                    <div class="layout">
			                        <div id="showmobile" class="check_auto">
			                            <span>允许通过<?php echo $_SESSION['userinfo']['passport_mobile'];?>联系我</span>
			                            <input name="allow_mobile" type="hidden" value="0"/>
			                        </div>
			                    </div>
			                    <div class="hide tip"></div>
			                </div>
                            <div validate-item="imgCode" class="layout form-item-uname form-item ">
                                <div for="[name=imgcode]" validate-ok="imgCode" class="form-input-wrapper form-item-imgCode_1 layout layout-align-start-center ui-field-contain flex">
                                    <label class="text-label text-label-second">*验证码：</label>
                                    <div class="flex">
										<input validate-field="imgCode" required-msg="请输入验证码" img-msg="请输入正确的验证码" validate-fail="commonUtilInstance.reCaptcha();" validate-type="required,img" type="text" name="imgcode" class="text-input" maxlength="10" placeholder="请输入右侧验证码" />
									</div>
                                </div>
                                <div validate-ok="imgCode" class="form-input-wrapper form-item-imgCode form-item-imgCodeBorder layout layout-align-start-center ui-field-contain" onclick="commonUtilInstance.reCaptcha();">
                                    <img class="imgcode captcha" src="/img/check.php">
                                    <a href="javascript:;" class="input-aide">&nbsp;&nbsp;看不清</a>
                                </div>
                            </div>
                            <div validate-msg="imgCode" class="hide tip">

                            </div>
                            <div class="btn_box form-item">
                                <div class="layout layout-align-start-center margin-top-10">
                                    <div class="btn_box flex layout layout-align-center-center">
                                        <a id="prewNeed" href="#need-prew" class="btn btn_default layout layout-align-center-center" data-transition="slide">
                                            <span>预览</span>
                                        </a>
                                    </div>
                                    <div class="margin-left-10 flex btn_box">
                                        <input type="button" data-role="none" class="btn" value="发布需求" id="sendBtn">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
        </div>
    </div>
<?php __slot('passport','footer');?>
</article>
<article data-role="page" id="need-prew" data-title="方橙" class="contain">
    <header data-role="header" data-theme="b"class="header">
<!--        <a href="#need_add" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back"></a>-->
        <h1>发布需求-预览</h1>
    </header>
    <div class="detail_content" data-role="content">
        <p class="format-wrapper-name font-size-10 margin-left-20 margin-bottom-0">*该预览为其他用户查看时所见到的页面</p>
        <div class="detail_main">
            <section class="detail_section need-prev">
                <div class="detail_section_head layout layout-align-space-between-center">
                    <div class="detail_section_tit font-size-14" id="pre-brand"></div>
                </div>
                <div class="detail_section_main">
                    <div class="need-list-wrapper">
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">拓展城市：</div>
                            <div id="pre-city" class="obj-tags flex"></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">所属业态：</div>
                            <div id="pre-category" class="obj-tags layout-column flex"></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">首选物业：</div>
                            <div id="pre-property" class="obj-tags flex"></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">面积需求：</div>
                            <div id="pre-size" class="obj-tags flex"></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">工程条件：</div>
                            <div id="pre-shopFormat" class="obj-tags flex"></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">期望年限：</div>
                            <div id="pre-cooperateTime" class="obj-tags flex"></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">特色：</div>
                            <div id="pre-remark" class="obj-tags flex"></div>
                        </div>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">发布日期：</div>
                            <div id="pre-startTime" class="obj-tags flex"></div>
                        </div>
                    </div>
                    <div class="layout margin-top-10 margin-bottom-20">
                        <div class="btn_box flex layout layout-align-center-center ">
                            <a href="#" class="btn btn_full_disable layout layout-align-center-center ">
                                <span class="font-size-15">查看品牌详情</span>
                            </a>
                        </div>
                        <div class="layout layout-align-end-center flex ">
                            <a href="#" class="layout layout-align-end-center hide">
                                <i class="icon_btn icon-shale"></i>
                                <span class="font-size-12">转发需求</span>
                            </a>
                        </div>
                    </div>
					<div class="margin-bottom-20">
                    	<div class="font-size-14 gray999">联系人：</div>
                    	<div class="message_top layout flex margin-top-10">
	                        <div class="face40"><img onerror="this.src='/img/detail/headdefault.png'" src="<?php echo $passport_picture;?>"></div>
	                        <div class="message_info margin-left-10 layout-column flex">
	                            <div class="layout flex message_info_u layout-align-start nowrap">
	                                <span class="message_header_tit gray333 font-size-15"><?php echo $passport_name;?></span>
                                    <?php if($passport_status==2){?><span class="icon_btn icon_v"></span><?php }else{?>&nbsp;<span class="font-size-12 gray999">(未认证)</span>&nbsp;<?php }?>
                                    <span class="gray999 message_header_job font-size-12"><?php echo $passport_job_title;?></span>
	                            </div>
	                            <div class="message_btn layout">
	                            	<div class="btn_box layout layout-align-center-center flex">
				                        <a href="#" class="btn btn_full_disable layout layout-align-center-center">
				                        	<div class="icon_btn icon_message2 icon_message2_disable"></div>
				                            <span class="">发送私信</span>
				                        </a>
				                    </div>
				                    <div class="btn_box layout layout-align-center-center margin-left-10 flex">
				                        <a id="pre-tel" href="#" class="btn btn_full_disable layout layout-align-center-center">
				                        	<div class="icon_btn icon_tel2 icon_tel2_disable"></div>
				                            <span class="">电话联系</span>
				                        </a>
				                    </div>
	                            </div>
	
	                        </div>
	                    </div>
	                    <div class="need_noren">
							<p>未经认证用户可能会使用虚假信息，请保持谨慎，以防诈骗。</p>
						</div>
                    </div>
                </div>
            </section>
            
			<div class="btn_box margin-top-20">
				<div class="layout layout-align-start-center margin-top-10">
					<div class="btn_box flex layout layout-align-center-center">
						<a href="#need_add" class="btn btn_default layout layout-align-center-center" data-transition="slide" data-direction="reverse">
							<span>返回修改</span>
						</a>
					</div>
					<div class="margin-left-10 flex btn_box layout layout-align-center-center">
						<a id="sendNeed_pre" href="#" class="btn ui-link layout layout-align-center-center">
							<span>确认发布需求</span>
						</a>
					</div>
				</div>
			</div>
        </div>
    </div>
<?php __slot('passport','footer');?>
</article>
<div id="publishSuccess" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
    <div class="modal-backdrop fade"></div>
	<!-- 没有匹配数据的弹窗 -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="myModalLabel" class="modal-title">发布成功</h4>
            </div>
            <div class="modal-body">
                <p>您的需求已发布成功，您可以：</p>
                 <div class="formwrapper layout need-wrapper-item margin-top-10 margin-bottom-10 hide">
                 	<div class="check_auto" data-check data-check-url='/api/setweixinpush/demandid/<?php echo $val['_id'];?>'>
                        <span  class="checked">接收方橙推荐的匹配需求通知</span>
                        <input name="allow_moible" data-checkval type="hidden" value="0"/>
                    </div>
                </div>
                <div class="margin-10 flex btn_box">
                     <input id="lookNeed-1" type="button" class="close btn" value="查看需求详情页">
                </div>
                <div class="margin-top-10 flex btn_box">
                    <input type="button" class="close btn btn_default" value="返回需求列表" onclick="javascript:window.location.href='/news/broadcast'">
                </div>
            </div>
        </div>
    </div>
</div>
<div id="publishSuccess-1" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
    <div class="modal-backdrop fade"></div>
    <!-- 有匹配数据的弹窗 -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="myModalLabel" class="modal-title">发布成功</h4>
            </div>
            <div class="modal-body">
                <p>您的需求已发布成功,并为您找到<span class="orange"><span class="similar-count"></span>条</span>匹配的<span class="type-info"></span>需求,可进入需求详情页查看</p>
                 <div class="formwrapper layout need-wrapper-item margin-top-10 margin-bottom-10 hide">
                 	<div class="check_auto" data-check data-check-url='/api/setweixinpush/demandid/<?php echo $val['_id'];?>'>
                        <span  class="checked">接收方橙推荐的匹配需求通知</span>
                        <input name="allow_moible" data-checkval type="hidden" value="0"/>
                    </div>
                </div>
                <div class="margin-10 flex btn_box">
                    <input id="lookNeed-1" type="button" class="close btn" value="查看需求详情页">
                </div>
                <div class="margin-top-10 flex btn_box">
                    <input type="button" class="close btn btn_default" value="返回需求列表" onclick="javascript:window.location.href='/news/broadcast'">
                </div>
            </div>
        </div>
    </div>
</div>