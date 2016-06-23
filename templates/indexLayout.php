<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <?php __meta() ?>
    <?php __css() ?>
    <?php __js() ?>
</head>
<body>
<?php __slot('passport','weixinconfig');?>

<?php 
   $query = urlFor();
   $query = $query == '/dev.php/recommend/list/' ? '/dev.php/recommend/index' : $query;
   $indexquery = \Frame\Util\UString::base64_encode($query);
?>
<section data-role="page" id="main_index_1" data-title="方橙-最专业的招商选址大数据平台"  class="contain">
    <header data-scroll-down data-scroll-top="100px" data-role="header" data-theme="b" class="header ">
        <a href="/search/index" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse"
           class="nav-icon-search" data-ajax="false">搜索</a>

        <h1>方橙</h1>
        <?php if($_SESSION['userinfo']['passport_id']){?>
        <a href="/ucenter/informationofmine" data-role="button" data-shadow="false" data-transition="slide"
           data-direction="reverse" class="nav-icon-user" data-ajax="false">个人中心</a>
        <?php }else{
        ?>
        <a href="/passport/loginjump/jump/{indexquery}" data-ajax="false">登录</a>
        <?php }?>
        <div data-role="navbar" class="navbar">
            <ul id="headUl">
                <li><a href="/" rel="external" <?php echo $module == 'recommend'?'class="ui-btn-active" ':'';?> data-ajax="false">品牌</a></li>
                <li><a href="/cs/list/" rel="external" data-ajax="false">悬赏</a></li>
                <li><a href="/mallshop/search" rel="external" data-ajax="false">商铺</a></li>
                <li><a href="/news/broadcast" rel="external" <?php if ($action == 'dobroadcast'){?> class="ui-btn-active" <?php }?> data-ajax="false">需求</a></li>
                <li><a href="/letter/index" rel="external" data-ajax="false">消息<?php if ($countnoread) { ?><i
                            class="news"></i><?php } ?></a></li>
            </ul>
        </div>
    </header>
    {jfContent}
</section>
<script type="text/javascript">
    $(function () {
        var headA = $("#headUl > li > a");
        var windowHref = window.location + '/';
        for (var i = 0, len = headA.size(); i < len; i++) {
            if(i==0 & headA.eq(i).attr('href')=='/'){
                continue;
            }
            if (windowHref.indexOf(headA.eq(i).attr('href')) >= 0) {
                headA.eq(i).addClass('ui-btn-active');
                break;
            }
        }

    });
</script>
<?php if(!$_SESSION['userinfo']['passport_id']){?>
<!-- <div class="fixed_login layout layout-align-center-center">
            <div class="btn_box flex">
                <a href="/passport/checklogin" class="btn btn_default layout layout-align-center-center"><span class="layout layout-align-center-center">注册</span></a>
            </div>
            <div class="btn_box flex margin-left-20">
                <a href="/passport/loginjump/jump/{indexquery}" class="btn add-need-btn layout layout-align-center-center"><span class="layout layout-align-center-center">登录</span></a>
            </div>
</div> -->
<?php }?>

<!--  2015-09--10 广告条-->
<?php echo FC\Comm::getAction();?>
<!--  2015-09--10 广告条-->

<div class="hide" weixin-share-detail wxTitle="<?php echo empty($weixinzhuanfa['title'])?'':$weixinzhuanfa['title'];?>" wxDesc="<?php echo empty($weixinzhuanfa['desc'])?'':$weixinzhuanfa['desc'];?>" wxLink="<?php echo empty($weixinzhuanfa['link'])?'':$weixinzhuanfa['link'];?>" wxImgUrl="<?php echo empty($weixinzhuanfa['logo'])?'':$weixinzhuanfa['logo'];?>" class="hide"></div>
<script type='text/javascript'>
	var weixinShareDetail = $('[weixin-share-detail]');
	commonUtilInstance.forwardneed_weixin(weixinShareDetail.attr('wxTitle'),weixinShareDetail.attr('wxDesc'),weixinShareDetail.attr('wxLink'),weixinShareDetail.attr('wxImgUrl'));
</script>
</body>
</html>
