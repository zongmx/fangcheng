<section data-role="page" id="main_index_1" data-title="方橙" class="contain v15BrandAct2">
    <div data-role="content" class="detail_content">
        <div class="brandAct15">
            <img src="/img/detail/active_head1.png" class="brandAct15_img1">
            <form id="action" class="form-horizontal" action="{acitonUrl}" method="{method}">
            <input name="act_id" type="hidden" value="{act_id}" >
            <input name="share_id" type="hidden" value="{share_id}" >
            <div class="btn_box flex brandact15_join layout layout-align-center-center">
            <?php if($_SESSION['userinfo']['passport_id']){?>
            	<input type="{submitType}" data-role="none" class="btn" value="<?php if($isact){ echo '我要参加'; }else{ echo '活动结束';}?>" id="submit">
            <?php }else{ ?>	
                <a href="/passport/loginjump/jump/{jumpurl}" class="btn layout layout-align-center-center"><span class="layout layout-align-center-center"><?php if($isact){ echo '我要参加'; }else{ echo '活动结束';}?></span></a>
            <?php }?>
            </div>
            </form>
            <div class="brandAct15_info">
                <!--<p class="tit">立刻获得10元话费</p>-->
                <img src="/img/detail/active_tit1.png" class="tit_img"/>
                <p class="con">1、点击“我要参加”按钮</p>
                <p class="con">2、登录或注册方橙账号，并完成新手任务</p>
                <p class="con">3、点击“我要发布需求”，并发布本人服务单位（商业体或品牌）的招商拓展需求</p>
                <p class="con">4、提交需求后，点击“消息”栏，向方小橙发送消息“我要拿话费”，并提供对应手机号码</p>
                <p class="con">5、方小橙审核通过后，马上给你提供的手机号充值10元话费哦</p>
                <p class="con">6、每位用户仅限参加一次</p>
                <!--<p class="tit">50元话费</p>-->
                <img src="/img/detail/active_tit2.png" class="tit_img"/>
                <p class="con">注册并登录方橙账号，转发本页面给微信好友，并成功邀请5位新认证用户发布需求，即可获得50元话费大奖，参与次数上不封顶！</p>
            </div>
        </div>
    </div>
    <?php __slot('passport', 'footer');?>
</section>

<div class="hide" weixin-share-detail wxTitle="<?php echo empty($weixinzhuanfa['title'])?'':$weixinzhuanfa['title'];?>" wxDesc="<?php echo empty($weixinzhuanfa['desc'])?'':$weixinzhuanfa['desc'];?>" wxLink="<?php echo empty($weixinzhuanfa['link'])?'':$weixinzhuanfa['link'];?>" wxImgUrl="<?php echo empty($weixinzhuanfa['logo'])?'':$weixinzhuanfa['logo'];?>" class="hide"></div>
<script type='text/javascript'>
	var weixinShareDetail = $('[weixin-share-detail]');
	commonUtilInstance.forwardneed_weixin(weixinShareDetail.attr('wxTitle'),weixinShareDetail.attr('wxDesc'),weixinShareDetail.attr('wxLink'),weixinShareDetail.attr('wxImgUrl'));
</script>