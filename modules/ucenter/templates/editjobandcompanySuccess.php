
<form id="anthen" action="" method="">
    <input id="ori_passport_type" value="<?php echo $info['passport_type']; ?>" type="hidden"/>
    <article data-role="page" id="indentify_comp_edit_article" data-title="方橙" class="contain register">
        <header data-role="header" data-theme="b" class="header">
            <a href="#" data-rel="back" data-transition="slide" data-direction="reverse" data-ajax="false"
               class="nav-icon">返回</a>
            <h1>编辑认证信息</h1>
            <a href="javascript:$('#anthen').submit();">保存</a>
        </header>
        <section class="detail_content" data-role="content" role="main">
            <div class="detail_main formwrapper">
                <div for="a" id="jobField" class="form-item">
                    <div class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
                        <label class="text-label text-label-imgCode">您的身份：</label>

                        <a class="custom-select-header flex layout layout-align-start-center" href="#identity_article" data-transition="slide">
                                <div class="custom-select-name">
                                    <input name="passport_type_str" value="<?php echo $passport_type_str; ?>">
                                    <input name="passport_type" type="hidden"
                                           value="<?php echo $info['passport_type']; ?>" required>
                                </div>
								
                            </a>
                        <i class="caret_right"></i>
                    </div>
                    <div></div>
                </div>
                <div for="input" id="areaField" class="form-item">
                    <div class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
                        <label class="text-label text-label-imgCode">公司名称：</label>

                        <div class="custom-select-header flex">
                            <input value="<?php echo $info['passport_company']; ?>" name="passport_company"
                                   placeholder="公司名称" required/>
                        </div>
						
                    </div>
                    <div id="companyTip"></div>
						
                </div>
                <div id="cardField" class="form-item">
                    <div class="layout">
                        <div class="flex layout-column">
                            <div id="fileinput-button" class="fileinput-button btn_box btn_upload layout flex hide">
                                <div id="postcard" class="btn btn_default layout layout-align-center-center">点击上传或拍摄名片</div>
                                <input id="fileupload" type="file" name='photo' accept='image/gif, image/jpeg, image/jpg, image/png'/>
                            </div>
							<div id="fileinput-button_wx" class="fileinput-button_wx fileinput-button btn_box btn_upload layout flex">
                                <div id="postcard_wx" class="btn btn_default layout layout-align-center-center">点击上传或拍摄名片</div>
                                
                            </div>
                            <div class="">
                                <input id="cardFieldName" type="hidden" name="passport_business_card"/>
                                <div id="uploadError" class="hide tip margin-right-5">上传失败，请重新上传</div>
                                <div id="uploadTip"></div>
                            </div>
                        </div>
                        <div class="card_tip layout layout-align-center-center"><p>名片用于认证您的信息请上传清晰图片</p></div>
                    </div>
                    <div id="imagePreview" class="margin-top-5 hide">
                        <img src="<?php echo $info['passport_business_card']; ?>" class="imgRev"/>
                    </div>
                </div>
                <div class="btn_box form-item">
                    <div class="layout layout-align-start-center margin-top-10">
                        <div class="btn_box flex">
                            <input type="button" data-role="none" class="btn btn_default ignore" value="取消"
                                   id="identify_cancel_btn">
                        </div>
                        <div class="margin-left-10 flex btn_box">
                            <input id="editJobBandCom_dialog" type="button" data-transition="slide" data-toggle="modal" custom-dialog="#identifyEdit" data-role="none" class="btn hide" value="保存">
                            <input type="submit" name="submit" data-role="none" class="btn" value="保存">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php __slot('passport', 'footer'); ?>
    </article>
    <article data-role="page" id="identity_article" data-title="方橙" class="contain">
        <header data-role="header" data-theme="b" class="header">
            <a href="#" data-rel="back" data-transition="slide" data-direction="reverse">取消</a>

            <h1>身份选择</h1>
        </header>
        <section data-role="content" class="select-custom-format">
            <div class="format-wrapper">
                <!--<p class="format-wrapper-name">细分业态（可多选）</p>-->
                <div class="format-item">
                    <a class="form-item-head layout layout-align-start-center <?php echo $info['passport_type'] == 1 ? "text-ok" : ''; ?> "
                       data-transition="slide">
                        <i class="check_bg"></i>

                        <div class="format-item-name flex">
                            <span class="form-item-tit flex">我为品牌拓展</span>
                        </div>
                    </a>
                </div>
                <div class="format-item">
                    <a class="form-item-head layout layout-align-start-center <?php echo $info['passport_type'] == 3 ? "text-ok" : ''; ?>"
                       data-transition="slide">
                        <i class="check_bg"></i>

                        <div class="format-item-name flex">
                            <span class="form-item-tit flex">我为商业体总部招商</span>
                        </div>
                    </a>
                </div>
                <div class="format-item">
                    <a class="form-item-head layout layout-align-start-center <?php echo $info['passport_type'] == 2 ? "text-ok" : ''; ?>"
                       data-transition="slide">
                        <i class="check_bg"></i>

                        <div class="format-item-name flex">
                            <span class="form-item-tit flex">我为商业体项目招商</span>
                        </div>
                    </a>
                </div>
                <div class="format-item">
                    <a class="form-item-head layout layout-align-start-center  <?php echo $info['passport_type'] == 4 ? "text-ok" : ''; ?>"
                       data-transition="slide">
                        <i class="check_bg"></i>

                        <div class="format-item-name flex">
                            <span class="form-item-tit flex">我是第三方</span>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </article>
</form>
<div id="identifyEdit" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
    <div class="modal-backdrop fade"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="myModalLabel" class="modal-title">提示</h4>
            </div>
            <div class="modal-body">
                <p>切换身份后，您需要重新填写您的职位信息及负责的品牌或者商业体信息</p>
                <div class="margin-10 flex btn_box">
                    <input id="editJobBandCom_confirm_btn" type="button" class="btn" value="确定">
                </div>
                <div class="margin-top-10 flex btn_box">
                    <input type="button" class="close btn btn_default" value="取消切换">
                </div>
            </div>
        </div>
    </div>
</div>