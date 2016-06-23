<div class="container form_main">
    <div class="row form_head">
        <div class="form_head_log">
            <h3>找回密码</h3>
        </div>
    </div>
    <div class="row form_content">
            <div class="find_pass find_pass_group">
                <p>用<span class="red">手机</span>找回密码</p>
                <form id="forgetForm" action='/passport/mobilegetpasswd' method="post">
                    <input type="hidden" name='jump' value="<?php echo $jump;?>">
                    <div class="info clearfix">
                        <div validate-item="mobile" class="form-group clearfix">
                            <div class="form_left">
                                <div validate-ok="mobile" class="mobile">
                                    <input validate-field="mobile" required-msg="请输入您的手机号" mobile-msg="请输入正确的手机号" existMobile-msg="手机号不存在" validate-type="required,mobile,nonExistMobile" type="tel" name="mobile" class="form-control text" value="" placeholder="请输入您的手机号">
                                </div>
                            </div>
                            <div validate-msg="mobile" class="tip mobileTip hide"></div>
                        </div>
                        <div validate-item="img_code" class="form-group clearfix">
                            <div validate-ok="img_code" class="form_left img_code code_bg">
                                <input validate-field="img_code" required-msg="请输入验证码" img-msg="请输入正确的验证码" validate-type="required,img" type='number' maxlength="5" name="img_code" value="" placeholder="请输入图形验证码" class="sInput form-control text"><img style="cursor: pointer;" onclick="changeIdentifying()" src="/img/check.php" id='checkImgDis' class="img captcha"><span>&nbsp;<a style="cursor: pointer;" onclick="changeIdentifying()" class="recaptcha">看不清</a></span>
                            </div>
                            <div validate-msg="img_code" class="tip imgCodeTip hide"></div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input id="submitforgetForm" type="button" value="发送" class="btn btn-default btn-send">
                            </div>
                        </div>
                    </div>
                </form>
        </div>
<!--         <div class="find_pass find_pass_group"> -->
<!--                 <p>用<span class="red">邮箱</span>找回密码</p> -->
<!--                 <form> -->
<!--                     <div class="info clearfix"> -->
<!--                         <div class="form-group clearfix"> -->
<!--                             <div class="form_left"> -->
<!--                                 <div class="email"> -->
<!--                                     <input type="text" name="email" value="" placeholder="请输入你的常用邮箱" class="form-control text"> -->
<!--                                 </div> -->
<!--                             </div> -->
<!--                             <div class="tip hide"></div> -->
<!--                         </div> -->
<!--                         <div class="form-group"> -->
<!--                             <div> -->
<!--                                 <input id="smsSendBtn" type="submit" value="发送" class="btn btn-default btn-send"> -->
<!--                             </div> -->
<!--                         </div> -->
<!--                     </div> -->

                    
<!--                 </form> -->
<!--         </div> -->
    </div>
    <div class="row clearfix form_foot">
        <div class="form_foot_nav hide">
            <div class="nav_log"><h3>方橙</h3></div>
            <div class="nav_foot">
                <ul class="clearfix">
                    <li><a href="#">关于我们</a>|</li>
                    <li><a href="#">联系我们</a>|</li>
                    <li><a href="#">加入我们</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div> 
<script type="text/javascript">
/**
 * 点击切换验证码
 */
function changeIdentifying(o){
	  $('#checkImgDis').attr('src', '/img/check.php?' + Math.random());
	  return false;
}
$(function() {
	$('#forgetForm').validate();
	$('#submitforgetForm').click(function() {
		if($('#forgetForm').doValidate()) {
			commonUtilInstance.smsAjax($('input[validate-field="mobile"]').val(),2,2);
			document.getElementById('forgetForm').submit();	
		}
	})
})
</script>