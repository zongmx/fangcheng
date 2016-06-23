<article data-role="page" id="need_add"  data-title="方橙-最专业的招商选址大数据平台" class="contain">
	<header data-role="header" data-theme="b" data-position="fixed">
		<h1>报名加入{name}</h1>
	</header>
	<div data-role="content" class="detail_content">
		<div class="detail_main">
			<section class="">
				<div class="detail_section_main detail_section_need">
					<div class="formwrapper">
					  <form id="chengtv" class="form-horizontal" action="{acitonUrl}" method="{method}" >
					  <input  type="hidden" name="apply_cat" value="{apply_cat}" >
						<div class="need-addbrand">
							<div id="brandField" validate-item="brand" class="form-item">
								<div
									class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok" validate-ok="brand">
									<label class="text-label text-label-imgCode">*品牌名称</label> <input type="hidden" name="brand_id" class="text-input" value="{branddefault['value']}" />
										<input validate-field="brand" validate-type="required" type="hidden" name="brand_name" class="text-input" value="{branddefault['name']}" />
									<div class="custom-select-header flex ">
										<a class="custom-select-header ui-link flex"
											href="#select-brand" data-transition="slide">
											<div class="custom-select-name nowrap">{branddefault['name']}</div>
										</a>
									</div>
									<i class="caret_right"></i>
								</div>
								<div validate-msg="brand" class="hide tip">
                                    请选择您负责的品牌
                                </div>
							</div>
							<div validate-item="company" nonValidate class="form-item">
								<div validate-ok="company" 
									class="form-input-wrapper layout layout-align-start-center ui-field-contain">
									<label class="text-label text-label-imgCode">公司网址：</label> <input validate-field="company" 
										type="text" name="apply_chengtv_web" class="text-input" maxlength="50"
										placeholder="请输入您的公司网址" />
								</div>
							</div>
							<div class="form-item" validate-item="address">
								<div
									class="form-input-wrapper layout layout-align-start-center ui-field-contain" validate-ok="address">
									<label class="text-label text-label-imgCode">*门店所在地：</label> 
									<input validate-field="address" validate-type="required" type="hidden" name="area_id" class="text-input" />
									<input type="hidden" name="apply_chengtv_address" class="text-input" />
									<div class="custom-select-header flex">
										<a class="custom-select-header ui-link flex"
											href="#select-custom-city" data-transition="slide" id="citys">
											<div class="custom-select-name">请选择您门店所在地</div>
										</a>
									</div>
									<i class="caret_right"></i>
								</div>
								<div validate-msg="address" class="hide tip">
                                    请选择您门店所在地
                                </div>
							</div>


							<div class="btn_box form-item">
								<div class="layout layout-align-start-center"
									style="margin-top: 80px;">
									<div class="btn_box flex">
										<input type="button" data-role="none" class="btn btn_default" onclick="window.location.href='{url}'" value="取消">
									</div>
									<div class="margin-left-10 flex btn_box">
										<input type="button" data-role="none" class="btn" value="确认报名" id="submit">
									</div>
								</div>
							</div>
						</div>


						</form>
					</div>
				</div>
			</section>
		</div>
	</div>
	
<!-- 弹窗提示 -->
<div id="notice" class="btn_box layout layout-align-center-center" data-toggle="modal" custom-dialog="#notice-dialog"></div>

<div id="notice-dialog" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal dialog_qrcode">
<div class="modal-backdrop fade"></div>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <div class="qrcode_box">
                <div id="msg_content" class="form-group clearfix question_btn guide_btn margin-top-20">
                
                </div>
                <div class="form-group clearfix question_btn guide_btn margin-top-20">
                    <div class="btn_box" id="resute_btn_1">
                            <button type="button" data-dismiss="modal" class="btn btn-default btn-orange close font-size-14">好的</button>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
</article>
<script type="text/javascript" src="/js/widget/validate.form.js"></script>
<script type="text/javascript">
$(function(){
	$('#chengtv').validate();
	$('a[href=#select-custom-city]').click(function(){
		var _this = this;
		$('body').register(function(val) {
	        var citys = this.getSelected();
	        if(!val.isEmpty) {
	            _this.selected = citys;
	            $('input[name=area_id]').val(val.value);
	            $('input[name=apply_chengtv_address]').val(val.name);
	            $(_this).parents('.form-input-wrapper').addClass( "text-ok" );
	            $('.custom-select-name',$(_this)).html(val.name);
	        }else {
	            _this.selected = [];
	            $(_this).parents('.form-input-wrapper').removeClass( "text-ok");
	            $('.custom-select-name',$(_this)).html("请选择您门店所在地");
	            $('input[name=area_id]').val("");
	            $('input[name=apply_chengtv_address]').val("");
	        }
	    },{single:true,selected:_this.selected,returnTo:'need_add'});
	});

	var brandList = new MWidget.ListPlug({
        pluginId:'select-brand',
        showFinish:false,
        title:'选择品牌',
        data:<?php echo urldecode($brandData);?>,
        back:function(e) {
            MWidget.Util.go('need_add');
            e.preventDefault();
        },
        clickItem:function(d) {
            if(this.hasSelected(d)) this.non_select(d);
            else {
                this.non_selectAll().select(d);
                var selected = brandList.getSelected();
                if(selected.length != 0) {
                    $('#brandField .custom-select-name').text(selected[0].name);
                    $('#brandField input[name=brand_name]').val(selected[0].name);
                    $('#brandField input[name=brand_id]').val(selected[0].value);
                    $('#brandField .tip').addClass('hide');
                    $('#brandField .form-input-wrapper').addClass('text-ok');
                } else {
                    $('#brandField .form-input-wrapper').removeClass('text-ok');
                    $('#brandField .custom-select-name').text('请选择您负责的品牌');
                    $('#brandField input').val('');
                }
                MWidget.Util.go('need_add');
            }
        }
    }).appendTo($('body'));
    var resute_btn_status = false;
	$("#submit").click(function(){
		if(!$('#chengtv').doValidate()) return;
		$.ajax({
			cache: true,
			type: "post",
			url:'/chengtv/add/',
			data:$('#chengtv').serialize(),// 你的formid
		    error: function(data) {
		    	$('#notice').click();
		    	var header = '报名失败';
			    var content = '由于系统原因，您进行的操作未成功，请重新尝试。如果多次出现此提示，请联系方橙客服。<br><br>错误编号：233';
			    $('#notice-dialog .modal-title').html(header);
			    $('#notice-dialog  #msg_content').html(content);
		    },
		    success: function(data) {
		    	$('#notice').click();
		    	if(data.result){
		    		var header = '发送成功';
		    		resute_btn_status = true;
		    	}else{
		    		var header = '提示';
			    }
			    $('#notice-dialog .modal-title').html(header);
			    $('#notice-dialog  #msg_content').html(data.resultMsg);
		    }
		    });
	});
	$("#resute_btn_1").click(function(){
	    if(resute_btn_status){
	    	location.href= "{url}";
		}
	});
    
	
})


function submitbrand(){
$(this).addClass("text-ok");
}




</script>
