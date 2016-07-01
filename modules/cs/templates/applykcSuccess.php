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
<script type="text/javascript">
    $(function(){
        $('.offer_detail_top>.offer_btn>.btn_default:eq(0)').after(imgPic);
        function imgPic(){
            var imgEle='<img src="/xsimg/xsone.png" class="posa" style="left:-22px">';
            return imgEle;
        }
    })
</script>
<?php __slot('passport','footer');?>
<div id="showpay" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
    <div class="modal-backdrop fade"></div>
    <div class="modal-dialog" style="width:400px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <?php if($demand_type == 2){?>
                    <h4 id="myModalLabel" class="modal-title">
                        申请看场
                    </h4>
                <?php }else{?>
                    <h4 id="myModalLabel" class="modal-title">
                        邀请看场
                    </h4>
                <?php } ?>
            </div>
            <div class="modal-body formwrapper">
                <form id="payform" action="/demand/applykc/">
                    <input id="payform-demand_id" type="hidden" name="demand_id" value="<?php echo  $demand_id;?>"/>
                    <div id="lookdateitem" class="form-item" validate-item="look-date">
                        <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                            <label class="text-label text-label-imgCode">看场日期：</label>
                            <div class="text-input flex flex100">
                                <input id="lookdate" validate-field="look-date" required-msg="请选择您期望的看场日期" validate-type="required" readonly="readonly" type="text" name="cs_passport_apply_agree_at" value='' placeholder="请选择您期望的看场日期" />
                            </div>
                            <span class="date-ico"></span>
                        </div>
                        <div validate-msg="look-date" class="hide tip">
                        </div>
                    </div>
                    <?php if($demand_type == 2) {?>
                        <div class="margin-top-20 font-size-14">请填写您准备带去看场的品牌信息</div>
                    <?php }else {?>
                        <div class="margin-top-20 font-size-14">请填写您代表的商业体（或商铺）信息</div>
                    <?php }?>
                    <div class="margin-top-10 ">
                        <div data-search-container class="form-item" validate-item="brand">
                            <div validate-ok="brand" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                <div class="text-input flex flex100">
                                    <?php if($demand_type == 2) {?>
                                        <input data-search-name data-search="1" validate-field="brand" required-msg="请填写品牌名称" validate-type="required"  type="text" name="brand_name" value='' placeholder="请填写品牌名称" />
                                        <input data-search-value type="hidden" name="brand_id" value='' />
                                    <?php }else {?>
                                        <input data-search-name data-search="2" validate-field="brand" required-msg="请填写商业体名称" validate-type="required" type="text" name="mall_name" value='' placeholder="请填写商业体名称" />
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
                        <?php if($demand_type == 1) {?>
                            <div class="form-item" validate-item="malladdress">
                                <div validate-ok="malladdress" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                    <div class="text-input flex flex100">
                                        <input validate-field="malladdress" required-msg="请输入商业体或商铺地址" validate-type="required"  type="text" name="mall_addr" value='' placeholder="请输入商业体或商铺地址" />
                                    </div>
                                </div>
                                <div validate-msg="malladdress" class="hide tip">
                                </div>
                            </div>
                        <?php }?>
                        <div class="form-item flex flex100">
                            <div class="flex margin-right-10 fl" validate-item="person">
                                <div>
                                    <div validate-ok="person" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                        <div class="text-input flex flex100">
                                            <input validate-field="person" required-msg="请填写联系人姓名" validate-type="required" type="text" name="cs_passport_apply_contact_name[]" value='' placeholder="请填写联系人姓名" />
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
                                            <input validate-field="phone" required-msg="请填写联系人电话" mobile-msg="请输入有效的手机号" validate-type="required,mobile" type="text" name="cs_passport_apply_contact_mobile[]" value='' placeholder="请填写联系人电话" />
                                        </div>
                                    </div>
                                    <div validate-msg="phone" class="hide tip">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="addcontact" class="margin-top-10" style="font-size:12px;line-height:16px;">
                            <span class="add-icon">+</span>&nbsp;<span class="gray999">增加一个品牌联系人</span>
                        </div>
                        <div class="margin-top-20 font-size-14 gray999">
                            为避免纠纷，悬赏金最终结算将会从您填写的联系人中确认，看场前发布人不会看到此信息，请放心、如实填写！
                        </div>
                    </div>
                </form>
            </div>
            <div class="reward_modal_foot layout layout-align-center">
                <div class="btn_box" style="width:120px;">
                    <?php if($demand_type == 2 ){?>
                        <a href="javascript:dopay();" class="btn btn_default">立即申请</a>
                    <?php }else{ ?>
                        <a href="javascript:dopay();" class="btn btn_default">立即邀请</a>
                    <?php }?>
                </div>
                <div id="contacttemp" class="hide">
                    <div class="form-item flex flex100">
                        <div class="flex margin-right-10 fl" validate-item="person">
                            <div>
                                <div validate-ok="person" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                    <div class="text-input flex flex100">
                                        <input validate-field="person" required-msg="请填写联系人姓名" validate-type="required" type="text" name="cs_passport_apply_contact_name[]" value='' placeholder="请填写联系人姓名" />
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
                                        <input validate-field="phone" required-msg="请填写联系人电话" mobile-msg="请输入有效的手机号" validate-type="required,mobile" type="text" name="cs_passport_apply_contact_mobile[]" value='' placeholder="请填写联系人电话" />
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
                var kc = <?php echo  $kc;?>
                $('#payform').validate();
                function dopay() {
                    if($('#payform').doValidate()) {
                        commonUtilInstance.submitSignup('#payform',function() {
                            window.location.reload();
                        });
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