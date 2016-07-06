
<section data-role="page" id="loginPage" data-title="方橙-最专业的招商选址大数据平台" class="contain register gray_bg">
    <header data-role="header" data-theme="b" class="header">
        <h1>登录方橙</h1>
    </header>
    <section class="detail_content" data-role="content" role="main">
        <nav class="tabs margin-bottom-10 bgff">
            <ul class="tab-list">
            	<li class="current">账号密码登录</li>
            	<li>短信快捷登录</li>
            </ul>
            <div class="shadow"></div>
        </nav>

        <div class="detail_main formwrapper loginwrapper" style="height:87%;">
            <form id="loginForm" role="form" action="/passport/loginjump" method="post">
                <input type="password" class="hide"/>
                <input id="jump" type="hidden" name="jump" value="<?php  echo \Frame\Util\UString::base64_decode($jump);?>">
                <div for="input" validate-item="username" class="form-item" style="margin-top:0;">
                    <div validate-ok="username" class="form-input-wrapper layout layout-align-start-center ui-field-contain login_name">
                        <div class="text-label text-label-mobile">手机号1：</div>
                        <div class="flex flex100">
                        	<input validate-blur validate-field="username" required-msg='<span class="fl">请输入有效手机号或邮箱</span></span>' mobileEmail-msg='<span class="fl">请输入有效手机号或邮箱</span><span class="fr login_reg"><a href="/passport/checklogin">立即注册»</a></span>' validate-type="required,mobileEmail,nonExistMobileEmail" type="text" name="username" class="text-input" placeholder="注册手机号/邮箱"/>
                        </div>
                    </div>
                    <div validate-msg="username" class="hide tip cl"> 
                    </div>
                </div>
                <div for="input" validate-item="password" class="form-item">
                    <div validate-ok="password" class="form-input-wrapper layout layout-align-start-center ui-field-contain login_pass">
                        <div class="text-label text-label-mobile">密码</div>
                        <div class="flex flex100">
                        	<input validate-blur validate-field="password" required-msg="请输入密码" password-msg="密码输入错误" validate-type="required,password" type="password" name="password" class="text-input" maxlength="16" placeholder="密码"/>
                        </div>
                    </div>
                    <div validate-msg="password" class="hide tip">
                    </div>
                </div>
                <div class="form-item clearfix check layout layout-align-space-between-center">
                    <div id="autoLogin" class="checkbox check_auto">
                        <label><span id="autoLogin_icon" class="checked">下次自动登录</span><input type="hidden" name="checkme" value="1"></label>
                    </div>
                    <div class="text-right find_pass">
                        <a data-ajax=false href="/passport/forget/jump/<?php echo $jump;?>">忘记密码？</a>
                    </div>
                </div>
            </form>
            <div id="login" class="btn_box form-item layout login_box">
                <button type="submit" class="btn btn_full_able font-size-14" data-toggle="modal">登录</button>
            </div>
            <div class="btn_box form-item layout">
                <a href="/passport/checklogin/jump/<?php echo $jump;?>" class="btn btn_default layout layout-align-center-center">立即注册</a>
            </div>
        </div>
        <div class="detail_main formwrapper messageLogin  hide1" style="height:84%;">
            <form id="loginForm1" role="form" action="/passport/fastloginjump" method="post">
                        <div id="mobile" for="input" validate-item="mobile" class="form-item margin-top-10">
                            <div validate-ok="mobile" class="form-input-wrapper layout layout-align-start-center ui-field-contain" style="height:42px;">
                                <label class="text-label text-label-mobile">*手机号码：</label>
                                <div class="flex flex100">
                                    <input validate-blur="" validate-success="mobileSuccess()" validate-field="mobile" required-msg="请输入有效手机号" mobile-msg="您输入的手机号码格式错误，请重新输入！"  validate-type="required,mobile,nonExistMobile" type="tel" name="passport_mobile" class="text-input" placeholder="请输入手机号"></div>
                            </div>
                            <div validate-msg="mobile" class="hide tip">
                            </div>
                            <div validate-win="mobile" class="hide tip">
                                                        </div>
                        </div>
                        <div class="layout form-item margin-bottom-30 posr">
                            <div for="input" id="codeField" validate-item="smscode" class="flex layout layout-column">
                                <div validate-ok="smscode" class="form-input-wrapper layout layout-align-start-center ui-field-contain" style="height:42px;">
                                    <label class="text-label text-label-mobile">*验证码：</label>
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
            </form>
            <div id="login1" class="btn_box form-item layout login_box">
                <button type="submit" class="btn btn_full_able font-size-14" data-toggle="modal">登录</button>
            </div>
            <div class="btn_box form-item layout">
                <a href="/passport/checklogin/jump/<?php echo $jump;?>" class="btn btn_default layout layout-align-center-center">立即注册</a>
            </div>
        </div>
        <p class="" style="font-size: 12px;color:#999;text-align:center;margin:0;position:absolute;left:0;right:0;bottom:20px;">登录方橙即可：<br/>快速联系用户, 获取最新数据资料</p>
    </section>


    <div id="formErrorDialog" role="dialog" class="modal fade myDodal">
        <div class="modal-backdrop fade on"></div>
        <div class="modal-dialog">
            <div class="modal-content formwrapper">
                <div class="modal-header">
                    <h4 class="modal-title">提示</h4>
                </div>
                <div class="modal-body">
                    <p id="formErrorDialog_content"></p>
                    <div class="form-group clearfix margin-top-20 btn_box">
                        <button type="button" class="btn btn_full_able close">确认</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
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

 $('#loginForm1').validate();
    $('#login1').on('click',function() {
        if($('#loginForm1').doValidate()) {
            commonUtilInstance.submitSignup('#loginForm1',$('#jump').val());
        }
    });
    commonUtilInstance.tab(".tab-list",".detail_content","current");
    var InterValObj1; //timer变量，控制时间
    var curCount1 = 30; //当前剩余秒数

    $('#sendSmsBtn').click( function() {

        if(!$('#loginForm1').getValidator().validateByItem('mobile')) return;

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

