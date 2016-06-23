<script>
var msg_sender_id = {msg_sender_id}

</script>
<!-- 对话详情 start -->
<article data-role="page" id="privateLetterDetails" data-title="方橙-最专业的招商选址大数据平台" class="contain privateLetterDetails">
    <header data-role="header" data-theme="b" class="header">
		<a href="/letter/index" data-role="button" data-shadow="false" class="nav-icon-back" data-ajax="false">我的私信</a>
        <h1>{recevier_name}</h1>
    </header>
    <input type="hidden" name="" value="" id="">
    <section class="detail_main" data-role="content">
        <div class="privateLetterDetailsList">
            
            <div id="wrapper">
                <div id="scroller">
<?php if($recevier_is_blacklist) {?>
                    <div style="background:#e8e8e8;height:30px;color:#333;text-align:center;line-height:30px;">
					   <p style="margin: 0;font-size:12px;">此用户暂时无法联系</p>
				    </div>
<?php }?>
                    <div class="refresh_box" id="pullDown">
                        <div class="layout layout-align-center-center margin-top-10">
                            <span class="icon_btn_15 icon_btn_refres"></span>
                            <span class="pullDownLabel">刷新</span>
                        </div>
                    </div>
                    
                    
                    <ul id="thelist">
                    <!-- begin info as k to value -->
                        <li>
                            <div class="message_time layout layout-align-center-center">
                                <span class="">{value['log_time']}</span>
                            </div>
                        </li>
                    <?php if($recevier_id == $value['passport_id']){ ?>
                        <li id="{value['msg_content_id']}">
                            <div class="layout messageLeft">
                                <div class="face40 face ">
                                    <a href="/ucenter/index/passport_id/{recevier_id}" data-ajax='false'><img src="{value['picture']}"></a>
                                </div>
                                <div class="messageLetter" style="max-width:82%;">
	                                <span>
	                                <?php if($value['passport_id']<30){ echo htmlspecialchars_decode($value['msg_content_body']); }else{ echo $value['msg_content_body'];}?>
	                                </span>
                                </div>
                            </div>
                        </li>
                     <?php }else{ ?>	   
                        <li id="{value['msg_content_id']}">
                            <div class="layout messageRight layout-align-end-center">
                                <div class="messageLetter" style="max-width:80%;">
                                    <span><?php if($value['passport_id']<30){ echo htmlspecialchars_decode($value['msg_content_body']); }else{ echo $value['msg_content_body'];}?></span>
                                </div>
                                <div class="face40 face ">
                                    <a href="/ucenter/index/passport_id/{passport_id}" data-ajax='false'><img src="{value['picture']}"></a>
                                </div>
                            </div>
                            
                            <?php if($content_status['status'] == 2 && $content_status['content_id'] == $value['msg_content_id'] ){ ?>
                            <div class="layout layout-align-end-center margin-top-10 messageStatus">
                                <span class="messageStatusIcon"></span>
                                <span class="messageStatusMsg">对方已阅</span>
                            </div>
                            <?php }elseif($content_status['status'] == 1 && $content_status['content_id'] == $value['msg_content_id'] ){ ?>
                            <div class="layout layout-align-end-center margin-top-10 messageStatus">
                                <span class="">已送达</span>
                            </div>
                            <?php }?>
                        </li>
                     <?php } ?>  
                     <!-- end info -->   
                    </ul>

                    <div class="refresh_box hide" id="pullUp">
                        <div class="layout layout-align-center-center margin-top-10">
                            <span class="icon_btn_15 icon_btn_refres" onclick="location.reload()"></span>
                            <span class="pullUpLabel" onclick="location.reload()">刷新</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="refresh_top hide">
	        <span class="fliter"></span>
	        <span class="refresh_top_word" onclick="location.reload()">回到最新会话</span>
	    </div>
	    <div class="privateLetterDetailsReplyBtn <?php if($recevier_is_blacklist) {echo 'hide';}?>">
	        <div class="custom-btn layout layout-align-center-center">
				<?php if($jsStatus != 1 && $jsStatus != 2 && $jsStatus != 3) {?>	
	            <a class="layout layout-align-center-center width100" href="/letter/send/receiver_id/{recevier_id}" data-ajax='false'>
	                <span class="icon_btn icon_reply"></span>
	                <span class="icon_reply_msg">回复对话</span>
	            </a>
				<?php } else { ?>
				<a class="layout layout-align-center-center width100" href="javascript:void();">
	                <span class="icon_btn icon_reply"></span>
	                <span class="icon_reply_msg">回复对话</span>
	            </a>
				<?php } ?>  
	        </div>
	    </div>
    </section>
    
</article>

<script>
$(function(){
	commonUtilInstance.authReminderDialog('{jsStatus}', '/letter/index');
});
</script>
