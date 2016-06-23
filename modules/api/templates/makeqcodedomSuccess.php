<div id="shear-need-handler" class="hide" data-toggle="modal" custom-dialog="#shear-need" /></div>
<div id="shear-need" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal dialog_qrcode">
        <div class="modal-backdrop fade"></div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 id="myModalLabel" class="modal-title"><?php echo $title;?></h4>
                </div>
                <div class="modal-body">
                    <p class="text-center font-size-15">扫描二维码</p>
                    <p class="qrcodeImg text-center"><img src="{imgSrc}" width="205" height="205" /></p>
                    <p class="text-center font-size-15 gray999">复制链接</p>
                    <p class="font-size-12">{url}</p>
					
                </div>
            </div>
        </div>
</div>
