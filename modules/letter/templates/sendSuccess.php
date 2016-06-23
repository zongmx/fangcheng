<!-- 对话列表 start -->
<article data-role="page" id="privateLetterSend" data-title="方橙-最专业的招商选址大数据平台" class="contain">
	<header data-role="header" data-theme="b" class="header">
		<a href="javascript:void(0);"  onclick="{return_url}" data-role="button" data-shadow="false" class="nav-icon-back" data-ajax="false">返回</a>
		<h1>{passport_name}</h1>
	</header>
	<div data-role="content" class="detail_content">
		<div class="detail_main">
			<section class="detail_section">
				<div class="detail_section_head layout layout-align-start-center">
					<div class="detail_section_tit font-size-14">发送私信</div>
				</div>
				<div class="detail_section_main">
					<div class="message_send">
						<form id="send" class="form-horizontal" action="{actionUrl}" method="{method}">
							<div class="layout">
								<div class="face40 face"><a href="/ucenter/index/passport_id/{passport_id}" data-ajax="false"><img src="{passport_picture}"></a></div>
								<div class="flex">
									<div class="message_info margin-left-10 width100">
										<div class="layout">
											<div class="flex layout layout-align-start-center">
												<span class="message_header_tit font-size-15">
												<a href="/ucenter/index/passport_id/{passport_id}" data-ajax="false">{passport_name}</a>
												</span>
												<?php if($passport_status == 2) {?><span class="icon_btn icon_v"></span><?php }else {?><span class="font-size-12 gray999">(未认证)</span><?php }?>
											</div>
										</div>
										<div class="gray717 message_header_job font-size-12">{passport_job_title}</div>
										<div class="gray717 message_header_item nowraps font-size-12 cl">
											<p class="message_header_items fl "><?php if($project_count){ ?>负责<?php } ?>{project}</p>
											<?php if($project_count){ ?><span class="fl message_header_items_num">等{project_count}个项目</span><?php } ?>
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" class="form-control" name="receiver_id" id="receiver_id" value="{receiver_id}" />
							<div class="margin-top-10">
								<label class="form-label" for="">内容：</label>
								<textarea maxlength="500" name="msg_content_body" placeholder="" style="height:92px !important">{content}</textarea>
							</div>
							
							<div class="layout layout-align-start-center margin-top-10">
								<div class="btn_box flex">
									<input type="button" data-role="none" class="btn btn_default" value="取消" onclick="{return_url}">
								</div>
								<div class="margin-left-10 flex btn_box">
									<input type="button" data-role="none" class="btn" value="发送" id="submit" />
								</div>
							</div>
						</form>
<!-- 						<div class="font-size-12 gray999 margin-top-20">每位用户每日最多可发送100条私信</div> -->
					</div>
					
				</div>
				
			</section>
		</div>
	</div>
	
<!-- 弹窗提示 -->
<div id="notice" class="btn_box" data-toggle="modal" custom-dialog="#notice-dialog"></div>

<div id="notice-dialog" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
<div class="modal-backdrop fade"></div>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" data-dismiss="modal" class="close" id="remove_submit"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <div class="qrcode_box">
                <div id="msg_content" class="form-group clearfix">
                
                </div>
                <div class="form-group clearfix question_btn guide_btn margin-top-20">
                    <div class="btn_box" id="resute_btn_1">
                            <button type="button" data-dismiss="modal" class="btn btn-default btn-orange close font-size-14" id="remove_submit">确认</button>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
</article>

    
    
<script>

function changeIdentifying(o){
    $('#checkImgDis').attr('src', '/img/check.php?' + Math.random());
    return false;
}
$('#imgCheckcode').on('keydown',function(e) {
if(e.which == 13 || e.keyCode == 13) {
	e.preventDefault();
}
});

$('textarea').on('keyup',function(e) {
	var val = $(this).val().substring(0,500);
	$(this).val(val);
});

var resute_btn_status = false;
$(function(){
	$("#submit").click(function(){
		$(this).addClass('btn_full_able_gray').attr("disabled",true);
		$.ajax({
			cache: true,
			type: "post",
			url:'/letter/Send/',
			data:$('#send').serialize(),// 你的formid
			async: false,
		    error: function(data) {
		    	var header = '错误提示';
			    var content = '由于网络原因，您的操作未成功，请稍后再试。如果多次出现此提示，请在私信中联系方小橙。<br>';
			    $('#notice-dialog .modal-title').html(header);
			    $('#notice-dialog  #msg_content').html(content);
				$('body').click();
		    	$('#notice').click();
				changeIdentifying();
				setTimeout(function() {
					$("#submit").removeClass('btn_full_able_gray').attr("disabled",false);
				},300);
		    },
		    success: function(data) {
				$('body').click();
		    	$('#notice').click();
		    	if(data.result){
		    		var header = '发送成功';
		    		resute_btn_status = true;
		    		msg_sender_id = data.msg_sender_id;
		    	}else{
		    		var header = '提示';
		    		if(data.msg_sender_result)
		    		{
		    			resute_btn_status = true;
			    	}
					changeIdentifying();
					msg_sender_id = data.msg_sender_id;
			    }
			    $('#notice-dialog .modal-title').html(header);
			    $('#notice-dialog  #msg_content').html(data.resultMsg);
				setTimeout(function() {
					$("#submit").removeClass('btn_full_able_gray').attr("disabled",false);
				},300);
				
		    }
		});
		return false;
	});
	
	$("#resute_btn_1").click(function(){
	    if(resute_btn_status){
		    var str_url = "{location}";
		    if(str_url != '')
		    {
		    	location.href = str_url;
		    }else{
		    	location.href = "/letter/view/msg_sender_id/"+msg_sender_id;
			}
			    
	    	
		}
	});		
});


</script>