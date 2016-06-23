<section data-role="page" id="main_index_1" data-title="方橙-最专业的招商选址大数据平台" class="contain gray_bg">
    <header data-role="header" data-theme="b"class="header">
        <a href="/" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-home" data-ajax="false">首页</a>
        <h1>我的</h1>
        <a href="/passport/loginout" data-shadow="false" data-ajax="false">退出登录</a>
    </header>
    <div data-role="content" class="detail_content">
        <div class="detail_main" style="padding:0 0 30px;">
            <section class="detail_section detail_section_border padding-bottom-10">
                <div class="detail_section_main detail_index_me user_info_header" style="height:80px;border:none;">
                    <div class="user_info_header_slider"></div>
                    <div class="detail_index_me_item">
                        <a href="" class="detail_index_tag layout layout-align-start-center">
                            <div class="message_top layout flex" onclick="javascript:window.location.href ='/ucenter/editbasicinfo/url/L3VjZW50ZXIvaW5mb3JtYXRpb25vZm1pbmU,'">
                                <div class="face40"><img onerror="this.src='/img/detail/headdefault.png'" src="<?php echo C('IMAGE_USER_URL').$userinfo['passport_picture'];?>"></div>
                                <div class="message_info margin-left-10">
                                    <div class="layout">
                                        <span class="message_header_tit grayfff font-size-15"><?php echo $userinfo['passport_name'];?></span>
                                       <?php if ($userinfo['passport_status'] == 2){?>
                                        <i class="icon_btn"></i>
                                        <?php }else {?>
                                        <span class="font-size-15 grayfff">（未认证）</span>
                                        <?php }?>
                                    </div>
                                    <div class="grayfff message_header_job font-size-14"><?php echo $userinfo['passport_job_title'];?></div>

                                </div>
                            </div>
                            <span class="grayfff font-size-12" onclick="window.location.href='/ucenter/myaccount'">交易明细</span><i class="icon_btn icon_more"></i>
                        </a>
                    </div>
                </div>
                <div class="text-center margin-top-10 font-size-20">
                    <span class="orange"><?php echo $asign['passport_money']['passport_money_total'];?></span><br><span class="font-size-16">总资产(元)<span>
                </div>
                <div class="cl posr">
                    <div class="fl text-center" style="width:50%;">
                        <span class="gray999"><?php echo $asign['passport_money']['passport_money_withdraw'];?></span><br><span class="font-size-14">可提现(元)</span>
                    </div>
                    <div class="posa" style="height:36px;width:1px;background:#e8e8e8;left:50%;top:8px;">

                    </div>
                    <div class="fl text-center" style="width:50%;">
                        <span class="gray999"><?php echo $asign['passport_money']['passport_money_wait'];?></span><br><span class="font-size-14">待收赏金(元)</span>
                    </div>
                </div>
                <div class="posr" style="margin:10px 10px 0 30px;">
                    <i class="notice">!</i>
                    <span class="gray999 font-size-12">为确保账户资金安全，申请提现请登录PC版方橙-我的账户中进行操作。</span>
                </div>
            </section>
            <section class="detail_section detail_section_border margin-top-10">
                <div class="detail_section_main detail_index_me">
                    <div class="detail_index_me_item1">
                        <a href="#" class="layout layout-align-start-center detail_index_tag ui-link">
                            <div class="flex">
                                <span class="font-size-12 gray999">悬赏</span>
                            </div>
                        </a>
                    </div>
                    <div class="detail_index_me_item cl posr">
                        <a href="/ucenter/mycs/type/2" class="fl width50 text-center">
                            <span class="font-size-14 gray333">发布的悬赏</span>
                        </a>
                        <div class="posa" style="height:100%;width:1px;background:#d5d5d5;left:50%;top:0;"></div>
                        <a href="#/ucenter/myapplycs" class="fr width50 text-center">
                            <span class="font-size-14 gray333">申请的悬赏</span>
                        </a>
                    </div>
                </div>
            </section>
            <section class="detail_section detail_section_border margin-top-10">
                <div class="detail_section_main detail_index_me">
                    <div class="detail_index_me_item1">
                        <a href="#" class="layout layout-align-start-center detail_index_tag ui-link">
                            <div class="flex">
                                <span class="font-size-12 gray999">需求</span>
                            </div>
                        </a>
                    </div>
                    <div class="detail_index_me_item cl posr">
                        <a href="javascript:window.location.href='/ucenter/demandlistofmine'" class="fl width50 text-center">
                            <span class="font-size-14 gray333">我的需求</span>
                        </a>
                        <div class="posa" style="height:100%;width:1px;background:#d5d5d5;left:50%;top:0;"></div>
                        <a href="javascript:window.location.href='/ucenter/myattention'" class="fl width50 text-center">
                            <span class="font-size-14 gray333">我的关注</span>
                        </a>
                    </div>
                </div>
            </section>
            <section class="detail_section detail_section_border margin-top-10">
                <div class="detail_section_main detail_index_me">
                    <div class="detail_index_me_item1">
                        <a href="#" class="layout layout-align-start-center detail_index_tag ui-link">
                            <div class="flex">
                                <span class="font-size-12 gray999">项目管理</span>
                            </div>
                        </a>
                    </div>
                    <div class="detail_index_me_item cl posr">
                        <a href="/ucenter/mybrand/url/<?php echo $url;?>" class="fl width50 text-center" data-transition="slide">
                            <span class="font-size-14 gray333">品牌拓展项目</span>
                        </a>
                        <div class="posa" style="height:100%;width:1px;background:#d5d5d5;left:50%;top:0;"></div>
                        <a href="/ucenter/mymall/url/<?php echo $url;?>" class="fl width50 text-center" data-transition="slide">
                            <span class="font-size-14 gray333">商业体招商项目</span>
                        </a>
                    </div>
                </div>
            </section>
            <section class="detail_section detail_section_border margin-top-10">
                <div class="detail_section_main detail_index_me">
                    <div class="detail_index_me_item1">
                        <a href="#account" class="layout layout-align-start-center detail_index_tag ui-link" data-transition="slide">
                            <div class="flex">
                                <span class="font-size-12 gray999">个人中心</span>
                            </div>
                            <i class="icon_btn icon_more"></i>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<section data-role="page" id="account" data-title="方橙-最专业的招商选址大数据平台" class="contain">
    <header data-role="header" data-theme="b" class="header">
        <a href="#" data-role="button" data-rel="back"  data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon">返回</a>
        <h1>账号设置</h1>
    </header>
    <div data-role="content" class="detail_content">
    <div class="user_info_header user_info_header_mall layout">
                    <div class="user_info_header_slider"></div>
                    <div class="user_info_header_face face40">
                        <a class="ui-link">
                            <img onerror="this.src='/img/detail/headdefault.png'" src="<?php echo C('IMAGE_USER_URL').$userinfo['passport_picture'];?>">
                        </a>
                    </div>
                    <div class="user_info_header_right margin-left-10">
                        <div class="layout">
                            <span class="message_header_tit grayfff font-size-13"><?php echo $userinfo['passport_name'];?></span
                           <?php if ($userinfo['passport_status'] == 2){?>
                            <i class="icon_btn"></i>
                            <?php }else {?>
                            <span class="font-size-12 gray999">（未认证）</span>
                            <?php }?>
                        </div>
                        <div class="grayfff message_header_job font-size-13"><?php echo $userinfo['passport_job_title'];?></div>


                        <div class="user_info_header_item">
                            <i class="icon_btn icon-edit-u"></i>
                            <a href="/ucenter/editbasicinfo/url/L3VjZW50ZXIvaW5mb3JtYXRpb25vZm1pbmU," data-ajax="false" class="ui-link"><span>编辑基本信息</span></a>
                        </div>
                    </div>
                </div>
        <div class="margin-top-10">
            <section class="detail_section detail_section_border">
                <div class="detail_section_main detail_index_me">
                    <div class="detail_index_me_item">
                        <a href="#account-pass" class="layout layout-align-start-center detail_index_tag" data-transition="slide">
                            <div class="flex">
                                <span class="font-size-15 gray333">修改密码</span>
                            </div>
                            <i class="icon_btn icon_more"></i>
                        </a>
                    </div>
                    <!-- 微信推送暂时关闭 -->
                    <div class="detail_index_me_item">
                        <a href="#weixin-send" class="layout layout-align-start-center detail_index_tag" data-transition="slide">
                            <div class="flex">
                                <span class="font-size-15 gray333">短信通知设置</span>
                            </div>
                            <i class="icon_btn icon_more"></i>
                        </a>
                    </div>
                    <div class="detail_index_me_item">
                        <a href="/ucenter/editjobandcompany" class="layout layout-align-start-center detail_index_tag" data-transition="slide">
                            <div class="flex">
                                <span id="identify" class="font-size-15 gray333">编辑认证信息</span>
                            </div>
                            <i class="icon_btn icon_more"></i>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<section data-role="page" id="account-pass" data-title="方橙-最专业的招商选址大数据平台" class="contain ">
<form action="/ucenter/unsetpwd" id="resetPwd" method="post" novalidate="novalidate">
    <header data-role="header" data-theme="b" class="header">
        <a href="#" data-role="button" data-rel="back"  data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon">取消</a>
        <h1>修改密码</h1>
        <a href="#" data-shadow="false">保存</a>
    </header>
    <div data-role="content" class="select-custom-format">
        <div class="detail_main formwrapper">
            <div for="input" class="form-item">
                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                    <label class="text-label text-label-imgCode">当前密码：</label>
                    <input type="password" name="oldpassword" class="text-input" maxlength="50" placeholder="请输入当前密码" required />
                </div>
            </div>
            <div for="input" class="form-item">
                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                    <label class="text-label text-label-imgCode">新密码：</label>
                    <input id="newpassword" type="password" name="newpassword" class="text-input" maxlength="50" placeholder="请输入新密码"/>
                </div>
            </div>
            <div for="input" class="form-item">
                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                    <label class="text-label text-label-imgCode">确认密码：</label>
                    <input type="password" name="newpasswordtwo" class="text-input" maxlength="50" placeholder="请输入确认密码"/>
                </div>
            </div>
            <div class="form-item layout">
                <div class="btn_box flex layout layout-align-center-center">
                    <a class="btn btn_default layout layout-align-center-center" href="#registerThree" data-rel="back"  data-shadow="false" data-transition="slide" data-direction="reverse"><span>取消</span></a>
                </div>
                <div class="margin-left-10 flex btn_box">
                    <input type="submit" name="submit" data-role="none" class="btn" value="保存">
                </div>
                <input type="button" data-toggle="modal" custom-dialog="#pwdSuccess" data-role="none" class="btn hide ignore">
                <input type="button" data-toggle="modal" custom-dialog="#pwdError" data-role="none" class="btn hide ignore">
            </div>
        </div>
    </div>
 </form>
<div id="pwdSuccess" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
    <div class="modal-backdrop fade"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="myModalLabel" class="modal-title">修改成功</h4>
            </div>
            <div class="modal-body">
                <p>密码修改成功！</p>
                <div class="margin-10 flex btn_box">
                    <button type="button" data-dismiss="modal" class="btn btn-default close font-size-14" onclick="javascript:window.history.go(-1)">确定</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="pwdError" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
    <div class="modal-backdrop fade"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="myModalLabel" class="modal-title">修改失败</h4>
            </div>
            <div class="modal-body">
                <p></p>
                <div class="margin-10 flex btn_box">
                    <button type="button" data-dismiss="modal" class="btn btn-default close font-size-14">关闭</button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<section data-role="page" id="weixin-send" data-title="方橙-最专业的招商选址大数据平台" class="contain register">
    <header data-role="header" data-theme="b" class="header">
        <a data-role="button" data-rel="back" data-shadow="false" data-transition="slide" data-direction="reverse">返回</a>
        <h1>短信通知设置</h1>
    </header>
    <div class="detail_content" data-role="content" role="main">
        <div class="detail_main formwrapper">
            <div id="checkmeField" class="form-item form-reg-argen">
                <div class="layout margin-top-10 posr">
                    <div>
                        <span class="gray333 font-size-14 ">私信短信通知</span>                       
                    </div>
                    <div class="custom-switch">
                        <input type="checkbox" value="1" <?php if ($userinfo['passport_msg_push_private'] == 1){?>checked="checked"<?php }?>>
                    </div>
                </div>
                <div class="layout margin-top-10 posr">
                    <div>
                        <span class="gray333 font-size-14">动态短信通知</span>
                    </div>
                    <div class="custom-switch">
                        <input type="checkbox" value="2" <?php if ($userinfo['passport_msg_push_dynamic'] == 1){?>checked="checked"<?php }?>>
                    </div>
                </div>
                <div class="layout margin-top-10 posr">
                    <div>
                        <span class="gray333 font-size-14">需求短信通知</span>
                    </div>
                    <div class="custom-switch">
                        <input type="checkbox" value="3" <?php if ($userinfo['passport_msg_push_demand'] == 1){?>checked="checked"<?php }?>>
                    </div>
                </div>
            </div>
            <div class="tishi">
                <p class="font-size-12 gray999">开启后，有关的重要短信将通过您的注册手机号通知您。</p>
                <p class="font-size-12 gray999">如果您已开启功能却不能收到消息，请拨打 400-0038-150 联系方小橙。</p>
            </div>
        </div>
    </div>
</section>
<section data-role="page" id="brandProject" data-title="方橙-最专业的招商选址大数据平台" class="contain register gray_bg">
    <header data-role="header" data-theme="b" class="header">
        <a data-role="button" data-rel="back" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back ui-link ui-btn-left ui-btn ui-corner-all" role="button">我的</a>
        <h1>品牌拓展项目</h1>
    </header>
    <section class="detail_section detail_section_border">
                    <div class="detail_section_main detail_index_me">
                    <?php if (!empty($brandinfo)){?>
                        <?php foreach ($brandinfo as $key => $val){?>
                        <?php if (empty($val['brand_id'])){?>
                        <div class="detail_index_me_item">
                                <div class="flex">
                                    <span class="font-size-15 grayc8c"><?php echo $val['brand_name'];?></span>
                                </div>
                        </div>
                        <?php }else {?>
                        <div class="detail_index_me_item">
                            <span class="font-size-16 gray333"><?php echo $val['brand_name'];?></span>
                            <p class="font-size-15 gray999">所在业态：<span class="font-size-15 gray333">北京</span></p>
                            <p class="font-size-15 gray999">身份：<span class="font-size-15 gray333">北京</span></p>
                            <p class="font-size-15 gray999">负责区域：<span class="font-size-15 gray333">北京</span></p>
                            <div class="btn_box font-size-14" style="height:40px;line-height:40px;margin-top:10px">
                                <a href="/details/brand/brand_id/<?php echo $val['brand_id'];?>" class="fl btn btn_default text-center  ui-link" style="display:inline-block;width:48%;box-sizing:border-box;">查看品牌详情</a>
                                <a href="#registerTwo" data-ajax="false" class="btn btn_full_able text-center fr ui-link" style="display:inline-block;width:48%;box-sizing:border-box;">编辑项目信息</a>
                            </div>
                        </div>
                        <?php }?>
                        <?php }?>
                     <?php }?>
                     <?php if (!empty($mallinfo)){?>
                     <?php foreach ($mallinfo as $key => $val){?>
                        <?php if (empty($val['mall_id'])){?>
                            <div class="detail_index_me_item">
                                    <div class="flex">
                                        <span class="font-size-15 grayc8c"><?php echo $val['mall_name'];?></span>
                                    </div>
                            </div>
                            <?php }else {?>
                            <div class="detail_index_me_item">
                                <span class="font-size-16 gray333"><?php echo $val['mall_name'];?></span>
                                <p class="font-size-15 gray999">负责区域：<span class="font-size-15 gray333">北京</span></p>
                                <a href="/details/mall/mall_id/<?php echo $val['mall_id'];?>" class="layout layout-align-start-center detail_index_tag">
                                 </a>

                                <div class="btn_box font-size-14" style="height:40px;line-height:40px;margin-top:10px">
                                    <a href="/details/mall/mall_id/<?php echo $val['mall_id'];?>" class="fl btn btn_default text-center  ui-link" style="display:inline-block;width:48%;box-sizing:border-box;">查看商业体详情</a>
                                    <a onclick=javascript:window.location.href='/ucenter/editbrandandbusiness/url/L3VjZW50ZXIvaW5mb3JtYXRpb25vZm1pbmU,'" class="btn btn_full_able text-center fr ui-link" style="display:inline-block;width:48%;box-sizing:border-box;">编辑项目信息</a>
                                </div>

                            </div>
                            <?php }?>
                        <?php }?>
                     <?php }?>
                    </div>
                </section>
                <div data-role="footer" data-position="fixed">
                     <div class="btn_box btn_box_need margin-top-10 margin-bottom-10 padding-left-10 padding-right-10">
                		 <a href="#registerThree" class="btn add-need-btn ui-link"><span class="layout layout-align-center-center"><div class="icon_btn icon_add"></div>&nbsp;新增负责的项目</span></a>
                	 </div>
                </div>
</section>

<section data-role="page" id="mallProject" data-title="方橙-最专业的招商选址大数据平台" class="contain register gray_bg">
    <header data-role="header" data-theme="b" class="header">
        <a data-role="button" data-rel="back" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back ui-link ui-btn-left ui-btn ui-corner-all" role="button">我的</a>
        <h1>商业体招商项目</h1>
    </header>
    <section class="detail_section detail_section_border">
                    <div class="detail_section_main detail_index_me">
                    <?php if (!empty($brandinfo)){?>
                        <?php foreach ($brandinfo as $key => $val){?>
                        <?php if (empty($val['brand_id'])){?>
                        <div class="detail_index_me_item">
                                <div class="flex">
                                    <span class="font-size-15 grayc8c"><?php echo $val['brand_name'];?></span>
                                </div>
                        </div>
                        <?php }else {?>
                        <div class="detail_index_me_item">
                            <a href="/details/brand/brand_id/<?php echo $val['brand_id'];?>" class="layout layout-align-start-center detail_index_tag">
                                <div class="flex">
                                    <span class="font-size-15 gray333"><?php echo $val['brand_name'];?></span>
                                </div>
                                <i class="icon_btn icon_more"></i>
                            </a>
                        </div>
                        <?php }?>
                        <?php }?>
                     <?php }?>
                     <?php if (!empty($mallinfo)){?>
                     <?php foreach ($mallinfo as $key => $val){?>
                        <?php if (empty($val['mall_id'])){?>
                            <div class="detail_index_me_item">
                                    <div class="flex">
                                        <span class="font-size-15 grayc8c"><?php echo $val['mall_name'];?></span>
                                    </div>

                            </div>
                            <?php }else {?>
                            <div class="detail_index_me_item">
                                <span class="font-size-16 gray333"><?php echo $val['mall_name'];?></span>
                                <p class="font-size-15 gray999">负责区域：<span class="font-size-15 gray333">北京</span></p>
                                <a href="/details/mall/mall_id/<?php echo $val['mall_id'];?>" class="layout layout-align-start-center detail_index_tag">
                                 </a>

                                <div class="btn_box font-size-14" style="height:40px;line-height:40px;margin-top:10px">
                                    <a href="/details/mall/mall_id/<?php echo $val['mall_id'];?>" class="fl btn btn_default text-center  ui-link" style="display:inline-block;width:48%;box-sizing:border-box;">查看商业体详情</a>
                                    <a class="btn btn_full_able text-center fr ui-link" style="display:inline-block;width:48%;box-sizing:border-box;">编辑项目信息</a>
                                </div>

                            </div>
                            <?php }?>
                        <?php }?>
                     <?php }?>
                    </div>
                </section>
                <div data-role="footer" data-position="fixed" style="background-color:#fff;">
                     <div class="btn_box btn_box_need margin-top-10 margin-bottom-10 padding-left-10 padding-right-10"">
                		 <a href="#registerThree" class="btn add-need-btn ui-link"><span class="layout layout-align-center-center"><div class="icon_btn icon_add"></div>&nbsp;新增负责的项目</span></a>
                	 </div>
                </div>
</section>

    <article data-role="page" id="registerTwo" data-title="方橙" class="contain register">
		<form id="userInfo" action="/ucenter/dobrandjob" method="post">
			<input type="hidden" name='passport_brand_ids' value="<?php echo $passport_brand_ids;?>">
			<input type="hidden" name='passport_brand_ids_del' value="">
			<input type="hidden" name='passport_brand_ids_update' value="<?php echo $passport_brand_ids;?>">
				<!-- 是否可以编辑身份和职位信息 -->
			<input id="identifyEditable" value="1" type="hidden"/>
			<input id="passport_brand_ids_del" value="" type="hidden"/>
        <!--<header data-role="header" data-theme="b" class="header">
            <a href="/ucenter/index/<?php echo !empty($url)?'url/'.$url:'';?>" data-shadow="false">取消</a>
            <h1>编辑职位与项目信息</h1>
            <a href="javascript:$('#btnSubmit').click();" data-shadow="false">保存</a>
        </header>-->
        <header data-scroll-down="" data-scroll-top="53px" data-role="header" data-theme="b" class="header ui-header ui-bar-b" role="banner">
        		<a href="javascript:location.href='/ucenter/informationofmine'" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back ui-link ui-btn-left ui-btn ui-corner-all" role="button">拓展管理</a>
        		<h1 class="ui-title" role="heading" aria-level="1">品牌拓展项目</h1>
        	</header>
        <section class="detail_content" data-role="content" role="main">
            <div class="detail_main formwrapper">
                <div class="form-item">
                    <div class="form-input-wrapper layout layout-align-start-center ui-field-contain" style="border:none;">
                        <label class="text-label text-label-imgCode" style="color:#333">公司名称：</label>
                        <div class="custom-select-header flex">
                            <div class="custom-select-name"><?php echo $passportInfo['passport_company'];?></div>
                        </div>
                    </div>
                </div>
                <div for="a" id="jobField" class="form-item" validate-item="jobField" style="margin-top:0;">
                    <div validate-ok="jobField" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok" style="border:none;">
                        <label class="text-label text-label-imgCode">职位：</label>
                        <a class="custom-select-header flex layout layout-align-start-center" href="#select-custom-job" data-transition="slide">
                                <div class="custom-select-name"><?php echo empty($passportInfo['passport_job_title'])?'选择您的职位头衔':$passportInfo['passport_job_title'];?></div>

                        </a>

                        <input validate-field="jobField" validate-type="required" type="hidden" name="passport_job_title" value="<?php echo $passportInfo['passport_job_title'];?>"/>
                    </div>
                    <div validate-msg="jobField" class="hide tip gray333">
                        请填写职位信息
                    </div>
                </div>
                <div class="deletess">
                        <div class="text-right del_item margin-top-20">
                            删除该项目
                            <input _name="passport_brand_id" type="hidden" name="passport_brand_id[]" required="true"/>
                        </div>
                        <div for="input" id="brandName" class="form-item" validate-item="brandName">
                            <div validate-ok="brandName" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                <label class="text-label text-label-imgCode">品牌名称：</label>
                				<a class="custom-select-header flex layout layout-align-start-center nameFilter" href="#other-brand" data-transition="slide">
                					<div class="custom-select-name">请选择您负责的品牌</div>
                				</a>
                				<i class="caret_right"></i>
                				<input _name="brand_name" type="hidden" name="brand_name[]" validate-field="brandName" validate-type="required" />
                                <input _name="brand_id" type="hidden" name="brand_id[]"/>

                            </div>
                            <div validate-msg="brandName" class="hide tip">请填写品牌名称</div>
                        </div>
                        <div for="a" id="category" class="form-item" validate-item="category">
                            <div validate-ok="category" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                <label class="text-label text-label-imgCode">业态：</label>
                                <a class="custom-select-header flex layout layout-align-start-center category"
                                       href="#select-custom-format" data-transition="slide">
                                        <div class="custom-select-name">选择该品牌所在业态</div>

                                    </a>
                                <i class="caret_right"></i>
                                <input _name="category_ids" type="hidden" name="category_ids[]" >
                                <input type="hidden" _name="category_ids_other" name="category_ids_other[]" >
                                <input id="detai_category_bind" validate-field="category" validate-type="required" name="detai_category_bind" type="hidden">
                            </div>
                            <div validate-msg="category" class="hide tip">请选择品牌所在业态</div>
                        </div>
                		<div for="a" class="form-item" validate-item="area">
                			<div validate-ok="area" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                				<label class="text-label text-label-imgCode">*负责区域：</label>
                				<a class="custom-select-header layout layout-align-start-center flex city" href="#select-custom-city" data-transition="slide">
                					<div class="custom-select-name nowrap">选择您代理的区域</div>
                				</a>
                				<i class="caret_right"></i>
                				<input _name="area" validate-field="area" validate-type="required" type="hidden" name="area_ids[]" value="">
                			</div>
                			<div validate-msg="area" class="hide tip">请填写您负责的区域信息</div>
                		</div>
                        <div class="form-item" validate-item="type">
                            <div class="layout form-item-checkbox form-item-gender">
                                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex">
                                    <i class="check_bg"></i>
                                    <div class="check_tit flex">直营</div>
                                </div>
                                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex">
                                    <i class="check_bg"></i>
                                    <div class="check_tit flex">加盟</div>
                                </div>
                                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex">
                                    <i class="check_bg"></i>
                                    <div class="check_tit flex">代理</div>
                                </div>
                            </div>
                            <input validate-field="type" validate-type="checked" type="hidden" value="0" name="passport_brand_style[]">
                			<div validate-msg="type" class="hide tip">请选择您的经营方式</div>
                        </div>
                    </div>
                </div>
                <?php foreach ($brandInfo as $key => $val){?>
                <div class="deletess">
                    <div class="text-right del_item margin-top-20">
                        删除该项目
                        <input type="hidden" name='passport_brand_id[]' value="<?php echo $val['passport_brand_id']?>">
                    </div>
					<div for="input" id="brandName" class="form-item" validate-item="brandName">
                        <div validate-ok="brandName" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
                            <label class="text-label text-label-imgCode">品牌名称：</label>
							<a class="custom-select-header flex layout layout-align-start-center nameFilter" href="#other-brand" data-transition="slide">
                                <div class="custom-select-name"><?php echo empty($val['brand_name'])?'请选择您负责的品牌':$val['brand_name'];?></div>
                            </a>
							<i class="caret_right"></i>
							<input _name="brand_name" type="hidden" name="brand_name[]" value="<?php echo $val['brand_name'];?>" validate-field="brandName" validate-type="required" />
							<input _name="brand_id" type="hidden" name="brand_id[]" value="<?php echo $val['brand_id']?>"/>
                        </div>
                        <div validate-msg="brandName" class="hide tip">请选择品牌</div>
                    </div>
                    <div for="a" id="category" class="form-item" validate-item="category">
                        <div validate-ok="category" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
                            <label class="text-label text-label-imgCode">业态：</label>
                            <a class="custom-select-header flex layout layout-align-start-center category"
                                   href="#select-custom-format" data-transition="slide">
                                    <div class="custom-select-name"><?php echo  empty($val['cone'])&& empty($val['ctwo'])?"选择该品牌所在业态":htmlspecialchars_decode($val['c_all']);?></div>

                                </a>
                            <i class="caret_right"></i>
                            <input _name="category_ids" type="hidden" name="category_ids[]" value="<?php echo $val['category_ids'];?>"/>
                            <input type="hidden" _name="category_ids_other" name="category_ids_other[]" value="<?php echo $val['category_ids_other'];?>"/>
                            <input id="detai_category_bind" validate-field="category" validate-type="required" name="detai_category_bind" type="hidden" value="<?php echo  empty($val['cone'])&& empty($val['ctwo'])?"选择该品牌所在业态":$val['cone'].$val['ctwo'];?>"/>
                        </div>
                        <div validate-msg="category" class="hide tip">请选择品牌所在业态</div>
                    </div>
					<div for="a" class="form-item" validate-item="area">
						<div validate-ok="area" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
							<label class="text-label text-label-imgCode">*负责区域：</label>
							<a class="custom-select-header layout layout-align-start-center flex city" href="#select-custom-city" data-transition="slide">
								<div class="custom-select-name nowrap"><?php if(empty($val['area'])){ ?>选择您负责的区域<?php }else{ echo $val['area'];}?></div>
							</a>
							<i class="caret_right"></i>
							<input _name="area" validate-field="area" validate-type="required" type="hidden" name="area_ids[]" value="{val['area_ids']}">
						</div>
						<div validate-msg="area" class="hide tip">请填写您负责的区域信息</div>
					</div>
                    <div class="form-item" validate-item="type">
                        <div class="layout form-item-checkbox form-item-gender">
                            <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex <?php echo (empty($val['passport_brand_style'])||$val['passport_brand_style']==1)?'text-ok':''; ?> ">
                                <i class="check_bg"></i>
                                <div class="check_tit flex">直营 </div>
                            </div>
                            <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex <?php echo $val['passport_brand_style']==2?"text-ok":'';?>">
                                <i class="check_bg"></i>
                                <div class="check_tit flex">加盟</div>
                            </div>
                            <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex <?php echo $val['passport_brand_style']==3?"text-ok":'';?>">
                                <i class="check_bg"></i>
                                <div class="check_tit flex">代理</div>
                            </div>
                        </div>
                        <input validate-field="type" validate-type="checked" type="hidden" name="passport_brand_style[]" value="<?php echo $val['passport_brand_style'];?>">
						<div validate-msg="type" class="hide tip">请选择您的经营方式</div>
                    </div>
                </div>
                <?php }?>
                <div id="addBrand" class="form-item layout layout-align-start-center">
                    <span class="custom-add-h">继续负责新增的品牌</span>
                    <i class="custom-add">+</i>
                </div>
            </div>
        </section>
		</form>
<div data-role="footer" data-position="fixed" class="">
                    <div class="layout layout-align-start-center" style="padding: 5px 10px;">
                        <div class="btn_box flex" onclick="showDialog('#del-dialog');">
                            <input type="button" data-role="none" class="btn btn_default" value="删除该项目">
                        </div>
                        <div class="margin-left-10 flex btn_box">
                            <input type="button" custom-dialog="#detail_save" data-role="none" class="btn" value="保存修改" id="btnSubmit">
                        </div>
                    </div>
                </div>
                <!--<div data-role="footer" class="ui-footer ui-bar-inherit" style="height:60px;opacity:1 !important;background:#fff;position: fixed;bottom:0;left:0;width:100%" role="contentinfo">
                    <div class="btn_box font-size-14 detail-container" style="height:40px;line-height:40px;margin-top:10px">
                       <a href="/letter/send/receiver_id/10031" class="fl btn btn_full_able text-center  ui-link" style="display:inline-block;width:48%;">发送私信</a>
                       <a onclick="showDialog('#apply-dialog');" class="btn btn_default text-center fr ui-link" style="display:inline-block;width:48%;box-sizing:border-box;">立即申请</a>
                    </div>-->
                </div>
    </article>

 <article data-role="page" id="registerThree" data-title="方橙" class="contain register">
		<form id="userInfo" action="/ucenter/dobrandjob" method="post">
			<input type="hidden" name='passport_brand_ids' value="<?php echo $passport_brand_ids;?>">
			<input type="hidden" name='passport_brand_ids_del' value="">
			<input type="hidden" name='passport_brand_ids_update' value="<?php echo $passport_brand_ids;?>">
				<!-- 是否可以编辑身份和职位信息 -->
			<input id="identifyEditable" value="1" type="hidden"/>
			<input id="passport_brand_ids_del" value="" type="hidden"/>
        <!--<header data-role="header" data-theme="b" class="header">
            <a href="/ucenter/index/<?php echo !empty($url)?'url/'.$url:'';?>" data-shadow="false">取消</a>
            <h1>编辑职位与项目信息</h1>
            <a href="javascript:$('#btnSubmit').click();" data-shadow="false">保存</a>
        </header>-->
        <header data-scroll-down="" data-scroll-top="53px" data-role="header" data-theme="b" class="header ui-header ui-bar-b" role="banner">
        		<a href="javascript:location.href='/ucenter/informationofmine'" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back ui-link ui-btn-left ui-btn ui-corner-all" role="button">拓展管理</a>
        		<h1 class="ui-title" role="heading" aria-level="1">品牌拓展项目</h1>
        	</header>
        <section class="detail_content" data-role="content" role="main">
            <div class="detail_main formwrapper">
                <div class="form-item">
                    <div class="form-input-wrapper layout layout-align-start-center ui-field-contain" style="border:none;">
                        <label class="text-label text-label-imgCode" style="color:#333">公司名称：</label>
                        <div class="custom-select-header flex">
                            <div class="custom-select-name"><?php echo $passportInfo['passport_company'];?></div>
                        </div>
                    </div>
                </div>
                <div for="a" id="jobField" class="form-item" validate-item="jobField" style="margin-top:0;">
                    <div validate-ok="jobField" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok" style="border:none;">
                        <label class="text-label text-label-imgCode">职位：</label>
                        <a class="custom-select-header flex layout layout-align-start-center" href="#select-custom-job" data-transition="slide">
                                <div class="custom-select-name"><?php echo empty($passportInfo['passport_job_title'])?'选择您的职位头衔':$passportInfo['passport_job_title'];?></div>

                        </a>

                        <input validate-field="jobField" validate-type="required" type="hidden" name="passport_job_title" value="<?php echo $passportInfo['passport_job_title'];?>"/>
                    </div>
                    <div validate-msg="jobField" class="hide tip gray333">
                        请填写职位信息
                    </div>
                </div>
                <div class="deletess">
                        <div class="text-right del_item margin-top-20">
                            删除该项目
                            <input _name="passport_brand_id" type="hidden" name="passport_brand_id[]" required="true"/>
                        </div>
                        <div for="input" id="brandName" class="form-item" validate-item="brandName">
                            <div validate-ok="brandName" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                <label class="text-label text-label-imgCode">品牌名称：</label>
                				<a class="custom-select-header flex layout layout-align-start-center nameFilter" href="#other-brand" data-transition="slide">
                					<div class="custom-select-name">请选择您负责的品牌</div>
                				</a>
                				<i class="caret_right"></i>
                				<input _name="brand_name" type="hidden" name="brand_name[]" validate-field="brandName" validate-type="required" />
                                <input _name="brand_id" type="hidden" name="brand_id[]"/>

                            </div>
                            <div validate-msg="brandName" class="hide tip">请填写品牌名称</div>
                        </div>
                        <div for="a" id="category" class="form-item" validate-item="category">
                            <div validate-ok="category" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                                <label class="text-label text-label-imgCode">业态：</label>
                                <a class="custom-select-header flex layout layout-align-start-center category"
                                       href="#select-custom-format" data-transition="slide">
                                        <div class="custom-select-name">选择该品牌所在业态</div>

                                    </a>
                                <i class="caret_right"></i>
                                <input _name="category_ids" type="hidden" name="category_ids[]" >
                                <input type="hidden" _name="category_ids_other" name="category_ids_other[]" >
                                <input id="detai_category_bind" validate-field="category" validate-type="required" name="detai_category_bind" type="hidden">
                            </div>
                            <div validate-msg="category" class="hide tip">请选择品牌所在业态</div>
                        </div>
                		<div for="a" class="form-item" validate-item="area">
                			<div validate-ok="area" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                				<label class="text-label text-label-imgCode">*负责区域：</label>
                				<a class="custom-select-header layout layout-align-start-center flex city" href="#select-custom-city" data-transition="slide">
                					<div class="custom-select-name nowrap">选择您代理的区域</div>
                				</a>
                				<i class="caret_right"></i>
                				<input _name="area" validate-field="area" validate-type="required" type="hidden" name="area_ids[]" value="">
                			</div>
                			<div validate-msg="area" class="hide tip">请填写您负责的区域信息</div>
                		</div>
                        <div class="form-item" validate-item="type">
                            <div class="layout form-item-checkbox form-item-gender">
                                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex">
                                    <i class="check_bg"></i>
                                    <div class="check_tit flex">直营</div>
                                </div>
                                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex">
                                    <i class="check_bg"></i>
                                    <div class="check_tit flex">加盟</div>
                                </div>
                                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex">
                                    <i class="check_bg"></i>
                                    <div class="check_tit flex">代理</div>
                                </div>
                            </div>
                            <input validate-field="type" validate-type="checked" type="hidden" value="0" name="passport_brand_style[]">
                			<div validate-msg="type" class="hide tip">请选择您的经营方式</div>
                        </div>
                    </div>
                </div>
                <?php foreach ($brandInfo as $key => $val){?>
                <div class="deletess">
                    <div class="text-right del_item margin-top-20">
                        删除该项目
                        <input type="hidden" name='passport_brand_id[]' value="<?php echo $val['passport_brand_id']?>">
                    </div>
					<div for="input" id="brandName" class="form-item" validate-item="brandName">
                        <div validate-ok="brandName" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
                            <label class="text-label text-label-imgCode">品牌名称：</label>
							<a class="custom-select-header flex layout layout-align-start-center nameFilter" href="#other-brand" data-transition="slide">
                                <div class="custom-select-name"><?php echo empty($val['brand_name'])?'请选择您负责的品牌':$val['brand_name'];?></div>
                            </a>
							<i class="caret_right"></i>
							<input _name="brand_name" type="hidden" name="brand_name[]" value="<?php echo $val['brand_name'];?>" validate-field="brandName" validate-type="required" />
							<input _name="brand_id" type="hidden" name="brand_id[]" value="<?php echo $val['brand_id']?>"/>
                        </div>
                        <div validate-msg="brandName" class="hide tip">请选择品牌</div>
                    </div>
                    <div for="a" id="category" class="form-item" validate-item="category">
                        <div validate-ok="category" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
                            <label class="text-label text-label-imgCode">业态：</label>
                            <a class="custom-select-header flex layout layout-align-start-center category"
                                   href="#select-custom-format" data-transition="slide">
                                    <div class="custom-select-name"><?php echo  empty($val['cone'])&& empty($val['ctwo'])?"选择该品牌所在业态":htmlspecialchars_decode($val['c_all']);?></div>

                                </a>
                            <i class="caret_right"></i>
                            <input _name="category_ids" type="hidden" name="category_ids[]" value="<?php echo $val['category_ids'];?>"/>
                            <input type="hidden" _name="category_ids_other" name="category_ids_other[]" value="<?php echo $val['category_ids_other'];?>"/>
                            <input id="detai_category_bind" validate-field="category" validate-type="required" name="detai_category_bind" type="hidden" value="<?php echo  empty($val['cone'])&& empty($val['ctwo'])?"选择该品牌所在业态":$val['cone'].$val['ctwo'];?>"/>
                        </div>
                        <div validate-msg="category" class="hide tip">请选择品牌所在业态</div>
                    </div>
					<div for="a" class="form-item" validate-item="area">
						<div validate-ok="area" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
							<label class="text-label text-label-imgCode">*负责区域：</label>
							<a class="custom-select-header layout layout-align-start-center flex city" href="#select-custom-city" data-transition="slide">
								<div class="custom-select-name nowrap"><?php if(empty($val['area'])){ ?>选择您负责的区域<?php }else{ echo $val['area'];}?></div>
							</a>
							<i class="caret_right"></i>
							<input _name="area" validate-field="area" validate-type="required" type="hidden" name="area_ids[]" value="{val['area_ids']}">
						</div>
						<div validate-msg="area" class="hide tip">请填写您负责的区域信息</div>
					</div>
                    <div class="form-item" validate-item="type">
                        <div class="layout form-item-checkbox form-item-gender">
                            <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex <?php echo (empty($val['passport_brand_style'])||$val['passport_brand_style']==1)?'text-ok':''; ?> ">
                                <i class="check_bg"></i>
                                <div class="check_tit flex">直营 </div>
                            </div>
                            <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex <?php echo $val['passport_brand_style']==2?"text-ok":'';?>">
                                <i class="check_bg"></i>
                                <div class="check_tit flex">加盟</div>
                            </div>
                            <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex <?php echo $val['passport_brand_style']==3?"text-ok":'';?>">
                                <i class="check_bg"></i>
                                <div class="check_tit flex">代理</div>
                            </div>
                        </div>
                        <input validate-field="type" validate-type="checked" type="hidden" name="passport_brand_style[]" value="<?php echo $val['passport_brand_style'];?>">
						<div validate-msg="type" class="hide tip">请选择您的经营方式</div>
                    </div>
                </div>
                <?php }?>
                <div id="addBrand" class="form-item layout layout-align-start-center">
                    <span class="custom-add-h">继续负责新增的品牌</span>
                    <i class="custom-add">+</i>
                </div>
            </div>
        </section>
		</form>
		<div data-role="footer" data-position="fixed" role="contentinfo" class="ui-footer ui-bar-inherit ui-footer-fixed slideup">
           <div class="btn_box btn_box_need margin-top-10 margin-bottom-10 padding-left-10 padding-right-10">
                <input type="button" custom-dialog="#detail_save" data-role="none" class="btn" value="保存新增项目" id="btnSubmit">
           </div>
        </div>

    </article>


<div class="hide" id="edit">
    <div class="deletess">
        <div data-role="footer" data-position="fixed" class="text-right del_item margin-top-20">
            删除该项目
            <input _name="passport_brand_id" type="hidden" name="passport_brand_id[]" required="true"/>
        </div>
        <div for="input" id="brandName" class="form-item" validate-item="brandName">
            <div validate-ok="brandName" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                <label class="text-label text-label-imgCode">品牌名称：</label>
				<a class="custom-select-header flex layout layout-align-start-center nameFilter" href="#other-brand" data-transition="slide">
					<div class="custom-select-name">请选择您负责的品牌</div>
				</a>
				<i class="caret_right"></i>
				<input _name="brand_name" type="hidden" name="brand_name[]" validate-field="brandName" validate-type="required" />
                <input _name="brand_id" type="hidden" name="brand_id[]"/>

            </div>
            <div validate-msg="brandName" class="hide tip">请填写品牌名称</div>
        </div>
        <div for="a" id="category" class="form-item" validate-item="category">
            <div validate-ok="category" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                <label class="text-label text-label-imgCode">业态：</label>
                <a class="custom-select-header flex layout layout-align-start-center category"
                       href="#select-custom-format" data-transition="slide">
                        <div class="custom-select-name">选择该品牌所在业态</div>

                    </a>
                <i class="caret_right"></i>
                <input _name="category_ids" type="hidden" name="category_ids[]" >
                <input type="hidden" _name="category_ids_other" name="category_ids_other[]" >
                <input id="detai_category_bind" validate-field="category" validate-type="required" name="detai_category_bind" type="hidden">
            </div>
            <div validate-msg="category" class="hide tip">请选择品牌所在业态</div>
        </div>
		<div for="a" class="form-item" validate-item="area">
			<div validate-ok="area" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
				<label class="text-label text-label-imgCode">*负责区域：</label>
				<a class="custom-select-header layout layout-align-start-center flex city" href="#select-custom-city" data-transition="slide">
					<div class="custom-select-name nowrap">选择您负责的区域</div>
				</a>
				<i class="caret_right"></i>
				<input _name="area" validate-field="area" validate-type="required" type="hidden" name="area_ids[]" value="">
			</div>
			<div validate-msg="area" class="hide tip">请填写您负责的区域信息</div>
		</div>
        <div class="form-item" validate-item="type">
            <div class="layout form-item-checkbox form-item-gender">
                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex">
                    <i class="check_bg"></i>
                    <div class="check_tit flex">直营</div>
                </div>
                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex">
                    <i class="check_bg"></i>
                    <div class="check_tit flex">加盟</div>
                </div>
                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex">
                    <i class="check_bg"></i>
                    <div class="check_tit flex">代理</div>
                </div>
            </div>
            <input validate-field="type" validate-type="checked" type="hidden" value="0" name="passport_brand_style[]">
			<div validate-msg="type" class="hide tip">请选择您的经营方式</div>
        </div>
    </div>
</div>

<!--<script type="text/javascript" src="/js/ucenter/brandEdit.js"></script>-->
<div id="del-dialog" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal dialog_qrcode" style="height: 1489px;">
    <div class="modal-backdrop fade" style="height: 1489px;"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="sub-dialog_close" type="button" data-dismiss="modal" class="close ui-btn ui-shadow ui-corner-all"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 id="sub-dialog-title" class="modal-title">确认删除</h4>
            </div>
            <div class="modal-body">
                <div class="qrcode_box">
                    <p id="sub-dialog_content" class="font-size-14">删除该项目以后你将永远失去该项目，请慎重选择！</p>
                    <!--<p id="sub-dialog_content" class="font-size-14">您已成功参与该悬赏！申请看场是成功的第一步哦~</p>-->
                    <div class="form-group clearfix question_btn guide_btn margin-top-20">
                        <div class="btn_box flex layout layout-align-center-center margin-top-20">
                            <a href="#" class="btn btn_default layout layout-align-center-center flex a_close ui-link">
                                <span class="font-size-15">取消</span>
                            </a>
                            <a href="#" class="btn btn_orange layout layout-align-center-center flex margin-left-10 ui-link">
                                <span class="font-size-15">确认删除</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
