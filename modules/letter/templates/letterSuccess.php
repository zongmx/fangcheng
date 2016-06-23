<!-- begin info as k to value -->
                        <li>
                            <div class="message_time layout layout-align-center-center">
                                <span class="">{value['log_time']}</span>
                            </div>
                        </li>
                    <?php if($recevier_id == $value['passport_id']){ ?>
                        <li id="{value['msg_content_id']}">
                            <div class="layout messageLeft">
                                <div class="face40 face">
                                    <a href="/ucenter/index/passport_id/{recevier_id}" data-ajax='false'><img src="{value['picture']}"></a>
                                </div>
                                <div class="messageLetter">
                                    <span>{value['msg_content_body']}</span>
                                </div>
                            </div>
                        </li>
                     <?php }else{ ?>	   
                        <li id="{value['msg_content_id']}">
                            <div class="layout messageRight layout-align-end-center">
                                <div class="messageLetter">
                                    <span>{value['msg_content_body']}</span>
                                </div>
                                <div class="face40 face">
                                    <a href="/ucenter/index/passport_id/{passport_id}" data-ajax='false'><img src="{value['picture']}"></a>
                                </div>
                            </div>
                            
                            <?php if($content_status['status'] == 2 && $content_status['content_id'] == $value['msg_content_id'] ){ ?>
                            <div class="layout layout-align-end-center margin-top-10 messageStatus">
                                <span class="messageStatusIcon"></span>
                                <span class="messageStatusMsg">对方已阅</span>
                            </div>
                            <?php } ?>
                        </li>
                     <?php } ?>  
<!-- end info -->