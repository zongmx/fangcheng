<div class="container form_main">
    <div class="row form_head">
        <div class="form_head_log">
            <h3>找回密码</h3>
        </div>
    </div>
    <div class="reg_ok_head row text-center clearfix">
        <h3>已将验证码发送到您的手机</h3>
        <p>收到之前请勿关闭此页面</p>
    </div>
    <div class="row form_content">
        <div class="find_pass find_pass_group">
                <p>请输入您收到的验证码</p>
                <form id="forgetForm2" action='/passport/setnewpwd' method="post">
                <input type="hidden" name='mobile' value="<?php echo $mobile;?>">
                <input type="hidden" name='jump' value="<?php echo $jump;?>">
                    <div class="info clearfix">
                        <div validate-item="code" class="form-group clearfix">
                            <div validate-ok="code" class="pos find_left code_bg">
                                <input validate-field="code" sms-msg="请输入正确的验证码"  data-mobile="<?php echo $mobile;?>" validate-type="sms" type="number" name="code" class="sInput form-control text" value="" placeholder="短信验证码">
                            </div>
							<div validate-msg="code" class="tip hide">
							</div>
                            <div class="tip codeTip normalTip">
                                <span>若您30秒后仍未收到短信，可以试试&nbsp;<a id="resend" href="#" class="fint_repeat">重发一次</a></span>
                            </div>
                        </div>
                        <div validate-item="password" class="form-group no-margin-bottom clearfix">
                            <div class="form_left">
                                <div validate-ok="password" class="password inputBg">
                                    <input type="password" value="" class="form-control text hide">
                                    <input validate-fail="fail_pas();" validate-success="success_pas();" validate-field="password" validate-type="required,password" type="password" name="password" onkeyup="commonUtilInstance.password_word(this);" placeholder="请设置您的密码" class="form-control text password">
                                    <i class="showPwd">显示</i>
                                </div>
                            </div>
                            <div validate-msg="password" class="tip passTip normalTip">密码为6-16位 不能包含空格 不能为纯数字</div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input id="submitforgetForm2" type="button" value="提交" class="btn btn-default btn-send">
                            </div>
                        </div>
                    </div>                    
                </form>
        </div>
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
	function fail_pas() {
		$('[validate-msg="password"]').removeClass('normalTip');
	}
	function success_pas() {
		$('[validate-msg="password"]').addClass('normalTip');
	}
	$(function() {
		$( ".showPwd" ).on('click',function() {
			var password = $( ".password" );
			if ( password.attr( "type" ) == "text" ) {
				password.attr( "type", "password" );
				$( this ).html( "显示" );
			} else {
				password.attr( "type", "text" );
				$( this ).html( "隐藏" );
			}
		} );
		var isResend = false;
		$('#resend').click(function() {
			if(!isResend) {
				commonUtilInstance.smsAjax($('[validate-field="code"]').attr('data-mobile'),2,2);
				$('#resend').addClass('fint_repeat_disable');
				isResend = true;
			}
		});
		$('#forgetForm2').validate();
		$('#submitforgetForm2').click(function() {
			if($('#forgetForm2').doValidate()) {
				document.getElementById('forgetForm2').submit();
			}
		})
  })
</script>