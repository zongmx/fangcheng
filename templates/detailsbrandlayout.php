<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
 	<?php __meta() ?>
 	<?php __css() ?>

    <link rel='apple-touch-icon-precomposed' sizes='144x144' href='/img/apple-touch-icon-144-precomposed.png' />
    <link rel='apple-touch-icon-precomposed' sizes='114x114' href='/img/apple-touch-icon-114-precomposed.png' />
    <link rel='apple-touch-icon-precomposed' sizes='72x72' href='/img/apple-touch-icon-72-precomposed.png' />
    <link rel='apple-touch-icon-precomposed' href='/img/apple-touch-icon-57-precomposed.png' />
	<?php __js() ?>
</head>
<body>

<?php 
//检测此品牌是否有橙TV
$chengtv =  new \Model\Chengtv();
if($brand_id){
    $c_data = $chengtv->select('chengtv_id')->where('brand_id = ? and chengtv_status = 1', $brand_id)->query();
    $chengtv_id = $c_data[0]['chengtv_id'] ? $c_data[0]['chengtv_id'] : '';
}
?>

<?php __slot('passport','weixinconfig');?>
<article data-role="page" id="privateLetterSend" class="contain">
    <header data-role="header" data-theme="b" class="header">
        <a href="/" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-home" data-ajax="false">首页</a>
        <h1><?php echo $brandbasicinfo['brand_name'];?></h1>
        <div data-role="navbar" class="navbar">
            <ul>
                <li><a href="/details/brand/brand_id/<?php echo $brand_id?>" <?php if ($action == 'brand'){?>class="ui-btn-active"<?php }?> >基本概况</a></li>
                <li><a href="/details/brandfb/brand_id/<?php echo $brand_id?>" <?php if ($action == 'brandfb'){?>class="ui-btn-active"<?php }?>>店铺分布</a></li>
                <li><a href="/details/brandnetdata/brand_id/<?php echo $brand_id?>" <?php if ($action == 'brandnetdata'){?>class="ui-btn-active"<?php }?>>网上数据</a></li>
                <?php if($chengtv_id){?><li><a href="/chengtv/view/chengtv_id/<?php echo $chengtv_id?>" <?php if ($action == 'view'){?>class="ui-btn-active"<?php }?>>橙TV</a></li><?php }?>
            </ul>
        </div>
    </header>

    {jfContent}
<?php __slot('passport','footer');?>

</article>
<?php if ($action != 'brandnetdata'){?>
<script>
    $(function(){
        var swiper = new Swiper('.swiper-container',{
            spaceBetween: 12,
            slidesPerView:"auto"
        });
    });
</script>
<?php }?>

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