	<footer class="new_foot detail_foot" data-role="footer" data-theme="b">
				<div class="layout foot_top">
					<div class="foot_icon text-left"><img src="/img/top_logo.png"></div>
					<div class="top_box layout layout-align-end-center flex">
						<span class="topBtn font-size-12">回到顶部</span>
					</div>
				</div>
				<div class="foot_b layout">
					<div class="flex"><span class="detail_foot_copy"></span></div>
					<div class="about">
						<a href="/passport/joinus" class="" data-ajax="false">加入我们</a>&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="javascript:void(0);" onclick="commonUtilInstance.contactDialog();" class="">联系我们</a>
				</div>
			</footer>
<!-- 提交提示信息 start-->
<div id="subDialog" data-toggle="modal" custom-dialog="#submit-dialog"></div>
<div id="submit-dialog" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal dialog_qrcode">
    <div class="modal-backdrop fade"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="sub-dialog_close" type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 id="sub-dialog-title" class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="qrcode_box">
                    <p id="sub-dialog_content" class="font-size-14"></p>
                    <div class="form-group clearfix question_btn guide_btn margin-top-20">
                        <div class="btn_box">
                            <button id="confirm-btn" type="button" data-dismiss="modal" class="btn btn-default btn-orange close font-size-14"></button>
                        </div>
                        <div id="btn_more" class="margin-top-10 flex btn_box hide">
                            <button id="cancel_btn" type="button" data-dismiss="modal" class="btn btn-default btn-orange close font-size-14"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 提交提示信息 end -->
<script>
    $(":jqmData(role='page')").attr("data-title", document.title);
	var version = '<?php echo C("VERSION")?>';
</script>

