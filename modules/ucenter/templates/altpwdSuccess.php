<form action="/ucenter/unsetpwd" id="resetPwd" method="post">
<section data-role="page" id="account-pass" data-title="方橙-最专业的招商选址大数据平台" class="contain ">

 <?php __slot('passport','header');?>
    <div data-role="content" class="select-custom-format">
        <div class="pc_location margin-bottom-20">
            <div class="pc_main_w">
                <a href="/ucenter/informationofmine">我的</a> &gt;<a href="/ucenter/idset">账号设置</a> &gt;<a href="#" class="cur">修改密码</a>               
             </div>
        </div>
        <div class="detail_main formwrapper pc_main_w cl" style="box-shadow:none;background:none;padding:0;">
        <div class="pc_main_l">
            <div class="pc_h3_tit">
                <h3>修改密码</h3>
            </div>
            <div style="background: #fff;padding:20px 10px 40px;">
                
                <div for="input" class="form-item">
                    <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label text-label-imgCode">当前密码：</label>
                        <input type="password" name="oldpassword" class="text-input" maxlength="50" placeholder="请输入当前密码" required/>
                    </div>
                </div>
                <div for="input" class="form-item">
                    <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label text-label-imgCode">新密码：</label>
                        <input id="newpassword" type="password" name="newpassword" class="text-input" maxlength="50" placeholder="请输入新密码"/>
                    </div>
                </div>
                <div for="input" class="form-item">
                    <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label text-label-imgCode">确认密码：</label>
                        <input type="password" name="newpasswordtwo" class="text-input" maxlength="50" placeholder="请输入确认密码"/>
                    </div>
                </div>
                <div class="form-item layout">
                    <div class="btn_box flex layout layout-align-center-center">
                        <a class="btn btn_default layout layout-align-center-center" href="#registerThree" data-rel="back"  data-shadow="false" data-transition="slide" data-direction="reverse"><span>取消</span></a>
                    </div>
                    <div class="margin-left-10 flex btn_box">
                        <input type="submit" name="submit" data-role="none" class="btn" value="保存">
                    </div>
                    <input type="button" data-toggle="modal" custom-dialog="#pwdSuccess" data-role="none" class="btn hide ignore">
                    <input type="button" data-toggle="modal" custom-dialog="#pwdError" data-role="none" class="btn hide ignore">
                </div>
            </div>
        </div>
        
        <?php __slot('passport','commrightview');?>
    </div>
    </div>

<div id="pwdSuccess" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
    <div class="modal-backdrop fade"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="myModalLabel" class="modal-title">修改成功</h4>
            </div>
            <div class="modal-body">
                <p>密码修改成功！</p>
                <div class="margin-10 flex btn_box">
                    <button type="button" data-dismiss="modal" class="btn btn-default close font-size-14" onclick="javascript:window.history.go(-1)">确定</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="pwdError" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
    <div class="modal-backdrop fade"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="myModalLabel" class="modal-title">修改失败</h4>
            </div>
            <div class="modal-body">
                <p></p>
                <div class="margin-10 flex btn_box">
                    <button type="button" data-dismiss="modal" class="btn btn-default close font-size-14">关闭</button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</form>