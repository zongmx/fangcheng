<script type="text/javascript">
     var new_task = true;
</script>
<section data-role="page" id="dask-product" data-title="方橙-最专业的招商选址大数据平台" class="contain">
<input id="jump" value="<?php echo $jump;?>" type="hidden">
    <header data-role="header" data-theme="b" class="header">
        <h1>添加项目信息</h1>
    </header>
    <form id="projectForm" method="get" action="/passport/doaddprogram">
        <scetion class="detail_content" data-role="content" role="main">
            <div class="detail_main formwrapper">
                <div id="_mock_addMall" class="form-item layout layout-align-start-center">
                    <i class="custom-add">+</i>&nbsp;<span class="custom-add-h">添加项目</span>
                </div>
                <div class="form-item grayc8c hide">
                    <p>方橙将为您负责的每个商业体寻找适合的品牌，其他用户可以在商业体/品牌页面上找到您</p>
                </div>
                <div id="finish" class="btn_box form-item layout">
                    <a href="#" class="btn btn_full_able layout layout-align-center-center">确定</a>
                </div>
                <div id="next" class="btn_box form-item hide">
                    <button type="button" data-dismiss="modal" class="btn btn_default close font-size-14">下次完成</button>
                </div>
            </div>
        </scetion>
    </form>
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
<div id="switchDialog" role="dialog" class="modal fade myDodal">
    <div class="modal-backdrop fade on"></div>
    <div class="modal-dialog">
        <div class="modal-content formwrapper">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">提醒</h4>
            </div>
            <div class="modal-body">
                <p>确定要切换项目类型？切换后之前输入的信息将不被保存</p>
                <div class="btn_box margin-top-20">
                    <div class="layout layout-align-start-center margin-top-10">
                        <div class="btn_box flex layout layout-align-center-center">
                            <a id="switch" class="btn btn_default layout layout-align-center-center">
                                <span>切换</span>
                            </a>
                        </div>
                        <div class="margin-left-10 flex btn_box layout layout-align-center-center">
                            <a href="#" class="btn layout layout-align-center-center" onclick="hideDialog('#switchDialog');">
                                <span>取消</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>