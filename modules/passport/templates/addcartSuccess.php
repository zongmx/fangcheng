<?php __slot('passport','weixinconfig');?>
<script type="text/javascript">
     var new_task = true;
</script>
<section data-role="page" id="dask-card" data-title="方橙-最专业的招商选址大数据平台" class="contain register">
<input id="jump" value="<?php echo $jump;?>" type="hidden">
    <header data-role="header" data-theme="b" class="header">
        <h1>上传名片</h1>
    </header>
    <scetion class="detail_content" data-role="content" role="main">
        <div class="detail_main formwrapper dask-card-main">
            <p class="dask-card-header">上传名片将获得完整功能体验</p>
            <div class="dask-card-upload">
                <div class="form-item">
                    <div id="imagePreview" class="card-review layout layout-align-center-center">
                        <img src="/img/detail/dask-review.png">
                        <div id="imagePreviewLoading" class="load_box hide">
                            <div class="filter"></div>
                            <div class="table">
                                <div class="table-cell">
                                    <span class="icon_load">上传中，请稍候</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="imagePreviewError" class="card-review load_error hide">
                        <img src="/img/detail/load_error.png">
                        <div class="load_box">
                            <div class="filter"></div>
                            <div class="upload_error">
                                <h4>上传失败</h4>
                                <p>请检查您的网络连接</p>
                            </div>
                        </div>
                    </div>
                    <p id="card-tip" class="dask-card-tip">图片大小不大于5M</p>
                    <p id="cancelUpload" class="dask-card-del hide"><a class="del_a">取消上传</a></p>
                    <p id="reUpload" class="dask-card-del hide"><a class="del_a">重新上传</a></p>
                    <div id="uploadContainer" class="layout">
                        <div id="fileinput-button" class="fileinput-button btn_box btn_upload flex hide">
                            <div id="postcard" class="btn layout layout-align-center-center">点击上传或拍摄名片</div>
                           <input id="fileupload" type="file" accept='image/gif, image/jpeg, image/jpg, image/png'/>
                        </div>
                        <div id="fileinput-button_wx" class="fileinput-button btn_box btn_upload flex">
                            <div id="postcard_wx" class="btn layout layout-align-center-center">点击上传或拍摄名片</div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="next" class="form-group clearfix dask-next-btn margin-top-20">
                <div class="btn_box">
                    <button type="button" data-dismiss="modal" class="btn btn_default close font-size-14">下次完成</button>
                </div>
            </div>
            <div id="finish" class="form-group clearfix dask-next-btn margin-top-20 hide">
                <div class="btn_box">
                    <button type="button" data-dismiss="modal" class="btn btn_full_able font-size-14">确定</button>
                </div>
            </div>
        </div>
    </scetion>
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
<form id="upload" method="get" action="/passport/doaddcart">
    <input id="cardFieldName" type="hidden" name="passport_business_card">
</form>
