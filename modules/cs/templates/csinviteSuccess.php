
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
                        <form id="payform" action="/cs/applykc/">
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
                           <input id="payform-demand_id" type="hidden" name="demand_id" value="<?php echo $demand_id; ?>">
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
                                <?php if($demand_type == 1){ ?>
                           <div class="form-item" validate-item="malladdress">
                              <div validate-ok="malladdress" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                  <div class="text-input flex flex100">
                                      <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><input validate-field="malladdress" required-msg="请输入商业体或商铺地址" validate-type="required" type="text" name="mall_addr" value="" placeholder="*请输入商业体或商铺地址"></div>
                                  </div>
                              </div>
                              <div validate-msg="malladdress" class="hide tip">
                              </div>
                            </div>
                                <?php } ?>
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



