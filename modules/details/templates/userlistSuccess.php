
<article data-role="page" id="privateLetterList" data-title="方橙" class="contain">
    <header data-role="header" data-theme="b" class="header">
    <?php if (empty($url)){?>
        <a href="/" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-home" data-ajax="false">首页</a>
    <?php }else {?>
         <a href="<?php echo \Frame\Util\UString::base64_decode($url);?>" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back"><?php if ($listtype == 'mall'){echo '商业体详情';}elseif ($listtype == 'brand'){echo '品牌详情';}?></a>
    <?php }?>
        <h1>联系人</h1>
    </header>
    <div data-role="content" class="detail_content">
        <div class="detail_main">
            <section class="detail_section">
                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">联系人列表</div>
                </div>
                <div class="detail_section_main detail_index_message_main">
                    <div class="detail_index_message">
                        <ul class="list privateLetterList no-border customBorder" data-role="listview">
                        <?php if ($listtype == 'mall'){?>
                        <?php if (!empty($list)){?>
                            <?php foreach ($list as $key => $val){?>
                            <li data-icon="false">
                                <div class="message_top layout">
                                    <div class="face40"><img onclick="javascript:location.href='/ucenter/index/passport_id/<?php echo $val['uinfo']['passport_id'];?>'" onerror="this.src='/img/detail/headdefault.png'" src="<?php echo C('IMAGE_USER_URL').$val['uinfo']['passport_picture'];?>"></div>
                                    <div class="flex">
                                        <div class="message_info layout-column flex margin-left-10">
                                            <div class="layout layout-align-space-between-center flex">
                                                <div class="flex layout layout-align-start-center">
                                                    <span onclick="javascript:location.href='/ucenter/index/passport_id/<?php echo $val['uinfo']['passport_id'];?>'" class="message_header_tit font-size-15"><?php echo $val['uinfo']['passport_name'];?></span>
                                                    <?php if ($val['uinfo']['passport_status'] == 2){?>
                                                        <span class="icon_btn icon_v"></span>
                                                    <?php }else {?>
                                                        &nbsp;<span class="font-size-12 gray999">(未认证)</span>
                                                    <?php }?>
                                                   &nbsp;<span class="font-size-14 gray999 flex nowrap"> <?php echo $type[$val['uinfo']['passport_type']];?></span>
                                                </div>
                                                <?php if($val['uinfo']['passport_id']!=$myownpassport_id){?>
                                                    <span class="message_header_date ">
                                                        <a href="/letter/send/receiver_id/<?php echo $val['uinfo']['passport_id'];?>/letterurl/{param}" class="layout layout-align-start-center ui-link"><i class="icon_btn icon_message"></i><div class="gray333 font-size-12">发送私信</div></a>
                                                    </span>
                                                    <?php }?>
                                            </div>
                                            <?php if (!empty($val['uinfo']['passport_job_title'])){?>
                                                <div class="gray717 flex message_header_job font-size-12 nowrap"><?php echo $val['uinfo']['passport_job_title'];?></div>
                                            <?php }?>
                                            <?php if (!empty($val['uinfo']['categorystr']) || $val['uinfo']['passport_job_area']){?>
                                                <div class="gray717 flex message_header_item font-size-12 layout">
                                                    <div style="width: 100%;max-width:100%;" class="message_header_items nowrap">负责业态 :<?php echo htmlspecialchars_decode(empty($val['uinfo']['categorystr'])?'':$val['uinfo']['categorystr']); if($val['uinfo']['passport_job_area']){ echo ','.$val['uinfo']['passport_job_area']; }?></div>
                                                </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php }?>
                        <?php }?>
                        <?php }?>
                        <?php if ($listtype == 'brand'){?>
                        <?php if (!empty($list)){?>
                            <?php foreach ($list as $key => $val){?>
                            <li data-icon="false">
                                <div class="message_top layout">
                                    <div class="face40"><img onclick="javascript:location.href='/ucenter/index/passport_id/<?php echo $val['uinfo']['passport_id'];?>'"  onerror="this.src='/img/detail/headdefault.png'" src="<?php echo C('IMAGE_USER_URL').$val['uinfo']['passport_picture'] ?>"></div>
                                    <div class="flex">
                                        <div class="message_info layout-column flex margin-left-10">
                                            <div class="layout layout-align-space-between-center flex">
                                                <div class="flex layout layout-align-start-center">
                                                    <span onclick="javascript:location.href='/ucenter/index/passport_id/<?php echo $val['uinfo']['passport_id'];?>'" class="message_header_tit font-size-15"><?php echo $val['uinfo']['passport_name'];?></span>
                                                    <?php if ($val['uinfo']['passport_status'] == 2){?>
                                                        <span class="icon_btn icon_v"></span>
                                                    <?php }else {?>
                                                        &nbsp;<span class="font-size-12 gray999">(未认证)</span>
                                                    <?php }?>
                                                   &nbsp;<span class="font-size-14 gray999 flex nowrap"> <?php echo $flag[$val['uinfo']['passport_flag']];?></span>
                                                </div>
                                                <?php if($val['uinfo']['passport_id']!=$myownpassport_id){?>
                                                    <span class="message_header_date ">
                                                        <a href="/letter/send/receiver_id/<?php echo $val['uinfo']['passport_id'];?>/letterurl/{param}" class="layout layout-align-start-center ui-link"><i class="icon_btn icon_message"></i><div class="gray333 font-size-12">发送私信</div></a>
                                                    </span>
                                                    <?php }?>
                                            </div>
                                            <?php if (!empty($val['uinfo']['passport_job_title'])){?>
                                                <div class="gray717 flex message_header_job font-size-12 nowrap"><?php echo $val['uinfo']['passport_job_title'];?></div>
                                            <?php }?>
                                            <?php if ($val['areaidsstr']['result'] == 1 || $val['uinfo']['passport_job_area']){?>
                                                <div class="gray717 flex message_header_item font-size-12 layout">
                                                    <div style="width: 100%;max-width:100%;" class="message_header_items nowrap2">负责区域 :<?php if($val['areaidsstr']['result'] == 1 ){echo $val['areaidsstr']['resuleMsg'];} if($val['areaidsstr']['result'] == 1 && $val['uinfo']['passport_job_area']){echo ',';} if($val['uinfo']['passport_job_area']){ echo $val['uinfo']['passport_job_area']; }?></div>
                                                </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php }?>
                        <?php }?>
                        <?php }?>
                        </ul>
                    </div>
                </div>
                <?php if (empty($list)){?>
                <div class="detail_section_main">
                    <!-- 没有数据的 通一提示-->
                    <div class="detail_noData layout layout-align-center-center">
                        <div>
							<?php if ($listtype == 'mall'){?>
								<p>该商业体暂无联系人</p>
							<?php } elseif($listtype == 'brand') {?>
								<p>该品牌暂无联系人</p>
							<?php }?>
                        </div>
                    </div>
                </div>
                <div class="btn_box margin-top-20">
                <?php if($_SESSION['userinfo']['passport_id']){?>
                    <a <?php if($_SESSION['userinfo']['passport_status'] == -1){?> href="/passport/nopass" <?php }else{?> href="" data-toggle="modal" custom-dialog="#publishSuccess" <?php } ?> class="btn add-need-btn ui-link"><span class="layout layout-align-center-center">方橙帮您联系</span></a>
                <?php }else{?>
                    <a href="/passport/loginjump/jump/{jumpurl}" class="btn add-need-btn ui-link"><span class="layout layout-align-center-center">方橙帮您联系</span></a>
                <?php }?>
            </div>
                <?php }?>
            </section>
        </div>
    </div>
    <?php __slot('passport','footer');?>
    <div id="publishSuccess" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
        <div class="modal-backdrop fade"></div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 id="myModalLabel" class="modal-title">方橙帮您联系</h4>
                </div>
                <div class="modal-body">
                    <p class="font-size-12">想要联系的<?php if ($listtype == 'brand'){echo '品牌';}else {echo '商业体';}?>：</p>
                    <p class="font-size-14"><?php echo $name;?></p>
                    <p class="font-size-12 grayc8c">方橙将会帮您联系该<?php if ($listtype == 'brand'){echo '品牌';}else {echo '商业体';}?>的<?php if ($listtype == 'brand'){echo '拓展';}else {echo '招商';}?>人员，并在取得联系后以电话与电子邮件的形式通知您。</p>
                    <div class="form-group  margin-top-20 layout layout-align-center-center">
                        <div class="btn_box flex">
                            <button type="button" id='cccc' data-dismiss="modal" class="btn btn_default font-size-14 close" >取消</button>
                        </div>
                        <div class="btn_box flex margin-left-20">
                            <button type="button" data-dismiss="modal" class="btn btn-default btn-orange close font-size-14 addemail">好的</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="fangchenghelp" action="/details/userlistmail" method="get">
        <input type="hidden" name='id' value="<?php echo $id;?>">
        <input type="hidden" name='type' value="<?php echo $listtype;?>">
        <input type="hidden" name='name' value="<?php echo $name;?>">
    </form>
    <script type="text/javascript">
    $(".addemail").click(function(){
        $("#fangchenghelp").ajaxSubmit({
                'dataType':'json',
                'success':function(e){
                    $("#cccc").click();
                    }
            });
        });
    </script>
</article>
