<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>方橙-最专业的招商选址大数据平台</title>
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <link href="/css/vendors/bootstrap.min.css" rel="stylesheet">
    <link href="/css/common.css" rel="stylesheet">
    <link href="/css/old/register.css" rel="stylesheet">
    <link href="/css/old/registerMedia.css" rel="stylesheet">

    <link rel='apple-touch-icon-precomposed' sizes='144x144' href='/img/apple-touch-icon-144-precomposed.png' />
    <link rel='apple-touch-icon-precomposed' sizes='114x114' href='/img/apple-touch-icon-114-precomposed.png' />
    <link rel='apple-touch-icon-precomposed' sizes='72x72' href='/img/apple-touch-icon-72-precomposed.png' />
    <link rel='apple-touch-icon-precomposed' href='/img/apple-touch-icon-57-precomposed.png' />
    <link rel="shortcut icon" href="/img/favicon.png" />

    <script type="text/javascript" src="/js/vendors/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/js/vendors/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/util/common.js"></script>
	<script type="text/javascript" src="/js/widget/validate.form.js"></script>
	<script type="text/javascript" src="/js/jquery.form.js"></script>
    <script type="text/javascript">
    $(function(){
        // 背景图片
        var windowHeight = $( window ).height();
        $( '.mask' ).css( {
            'height': windowHeight
        } );
        var reg = $(".form_main");
        if(reg.height()<windowHeight){
            setTimeout(function(){
            	$(".form_main").css({
                    
                    top:(windowHeight-reg.height())/2+$(window).scrollTop()+"px",
                    "margin":"0 10px",
                 });
             },100);
        }
        console.log($(window).width(),reg.width(),($(window).width()-reg.width())/2);
    });
    </script>
</head>
<body>
{jfContent}
<!--背景设置-->
<div class="mask"></div> 
</body>
</html>