<!DOCTYPE html>
<html>
<head lang="en">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
 	<?php __meta() ?>
 	<?php __css() ?>
    <link rel='apple-touch-icon-precomposed' sizes='144x144' href='/img/apple-touch-icon-144-precomposed.png' />
    <link rel='apple-touch-icon-precomposed' sizes='114x114' href='/img/apple-touch-icon-114-precomposed.png' />
    <link rel='apple-touch-icon-precomposed' sizes='72x72' href='/img/apple-touch-icon-72-precomposed.png' />
    <link rel='apple-touch-icon-precomposed' href='/img/apple-touch-icon-57-precomposed.png' />
	<?php __js() ?>
</head>
<body>

<?php __slot('passport','weixinconfig');?>
<section data-role="page" id="privateLetterSend"  class="contain">
    <header data-role="header" data-theme="b" class="header">
        <a href="/" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-home" data-ajax="false">首页</a>
        <h1><?php echo $mall_name;?></h1>
        <div data-role="navbar" class="navbar">
            <ul>
                <li><a rel=external href="/details/mall/mall_id/<?php echo $mall_id;?>" <?php if ($action == 'mall'){?>class="ui-btn-active"<?php }?>>基本概况</a></li>
                <li><a rel=external href="/details/mallaround/mall_id/<?php echo $mall_id;?>" <?php if ($action == 'mallaround'){?>class="ui-btn-active"<?php }?>>周边分析</a></li>
                <li><a rel=external href="/details/mallbrandandcategory/mall_id/<?php echo $mall_id;?>" <?php if ($action == 'mallbrandandcategory'){?>class="ui-btn-active"<?php }?>>品牌与业态</a></li>
                <li><a rel=external href="/details/netdata/mall_id/<?php echo $mall_id;?>" <?php if ($action == 'netdata'){?>class="ui-btn-active"<?php }?>>网上数据</a></li>
            </ul>
        </div>
    </header>
 {jfContent}
 
 </section>
<div class="hide" weixin-share-detail wxTitle="<?php echo empty($weixinzhuanfa['title'])?'':$weixinzhuanfa['title'];?>" wxDesc="<?php echo empty($weixinzhuanfa['desc'])?'':$weixinzhuanfa['desc'];?>" wxLink="<?php echo empty($weixinzhuanfa['link'])?'':$weixinzhuanfa['link'];?>" wxImgUrl="<?php echo empty($weixinzhuanfa['logo'])?'':$weixinzhuanfa['logo'];?>" class="hide"></div>
<script type='text/javascript'>
	var weixinShareDetail = $('[weixin-share-detail]');
	commonUtilInstance.forwardneed_weixin(weixinShareDetail.attr('wxTitle'),weixinShareDetail.attr('wxDesc'),weixinShareDetail.attr('wxLink'),weixinShareDetail.attr('wxImgUrl'));
</script>

<?php 
   $query = urlFor();
   $indexquery = \Frame\Util\UString::base64_encode($query);
?>
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
</body>
</html>