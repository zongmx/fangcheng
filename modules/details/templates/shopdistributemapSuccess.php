<!DOCTYPE html>
<html class="js no-touch">
<head>
    <title>方橙 商圈地图</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/bower_components/angular-material/angular-material.css">
    <link rel="stylesheet" href="/bower_components/angular-material/themes/orange-theme.css">
    <link rel="stylesheet" href="/bower_components/angular-material/themes/light-blue-dark-theme.css">
    <link href="/css/vendors/bootstrap.css" rel="stylesheet">
    <link href="/css/vendors/bootstrap.icon-large.min.css" rel="stylesheet">
    <link href="/css/detail/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/detail/mall_detail1.css">
    <link rel="stylesheet" type="text/css" href="/css/detail/mall_detail1_media.css">
    <link rel="stylesheet" type="text/css" href="/css/detail/share.css">
    <link rel="stylesheet" type="text/css" href="/css/detail/map.css">
    <script type="text/javascript" src="/js/vendors/jquery-1.9.1.min.js"></script>
    <script type="text/javascript"  src="http://api.map.baidu.com/api?ak=zCm7xmFLFwGEdsti4yT59bV9&amp;v=2.0"></script>
    <script type="text/javascript" src="/js/mapBaseOnBD.js"></script>
</head>
<script>
    $(function() {
        var map = $('#l-map').map({
            centerPoint : '<?php echo $area_name;?>',
            zoomSize : 11,
            zoomControl : true,
            scaleControl : true,
            data : '/details/makebrandpopulationmap/area_id/<?php echo $area_id?>/brand_id/<?php echo $brand_id;?>',
            dataParam : {
                brandId : <?php echo $brand_id;?>,
                area_id : <?php echo $area_id;?>
            },
            load : function(data, map, conf) {
                if (data.points.length == 0) {
                    $('#nodata').removeClass('hide');
                    $('#havadata').addClass('hide');
                } else {
                    $('#havadata').removeClass('hide');
                    $('#nodata').addClass('hide');
                    $('#count').text(data.points.length);
                }
                if (data.center && data.center.latitude !== 0
                        && data.center.longitude !== 0) {
                    //conf.centerPoint = new BMap.Point(data.center.longitude,data.center.latitude);
                    //map.panTo( conf.centerPoint );
                }
                var points = [];
                for (var index = 0; index < data.points.length; index++) {
                    var point = data.points[index];
                    points.push(new BMap.Point(point.longitude,point.latitude));
                }
                if (points.length != 0) {
                    var pointCollection = new BMap.PointCollection( points,{
                        shape : BMAP_POINT_SHAPE_WATERDROP
                    });
                    map.addOverlay(pointCollection);
                }
            }
        });

        // 下拉框
        $('#dropdown-toggle').click(function() {
            $('#distance-range').toggleClass('hide');
            return false;
        });

        // 隐藏相同名称的选项
        $('li', '#distance-range').each(function() {
			$(this).bind('click',function() {
                    window.location.href = '/details/shopdistributemap?brand_id=<?php echo $brand_id;?>&area_id='+ this.value+ '&area_name='+ $(this).text();
            })
        });
    })
</script>
<body layout="row">
<div layout="column" layout-fill="" teabindex="-1" role="main">
    <md-toolbar class="md-dark-theme md-default-theme custom_toolbar">
        <div tabindex="0" class="md-toolbar-tools">
            <div layout="row" flex="" class="fill-height">
                <div class="detail_back_box">
                    <a layout="row" href="/details/brandfb/brand_id/<?php echo $brand_id;?>">
                        <span flex="10" class="detail_back">返回</span>
                        <span layout="" layout-align="center center" class="icon_back_title font-size-28">店铺分布</span>
                    </a>
                </div>
                <div flex="" layout="row" layout-align="center center"
                     class="md-toolbar-item md-breadcrumb">
                    <div class="detail_content_tag">
                        <div class="dropdown detail_survey_condition detail_survey_order open font-size-36 detail_map_survey_order">
                            <div id="dropdown-toggle" class="dropdown-toggle custom_menu text-right padding-right-20">
                                <span id="distance"><?php echo $area_name?></span>
                                <span class="caret"></span>
                            </div>
                            <ul id="distance-range" role="menu" class="dropdown-menu custom_menus dropdown-menu-left hide">
                            <!-- begin shop_city as key to value -->
                                <li role="presentation" value="{key}"><a role="menuitem">{value}</a></li>
                            <!-- end shop_city -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </md-toolbar>
    <section class="detail_content detail_map detail_top_filter">
        <div layout="row" layout-align="space-around center" class="detail_content_head">
            <div layout="row" layout-align="center center" class="detail_content_tit text-center detail_index_publish">
                <div id="havadata" class="detail_top_filter_tag">
                    <span>共</span><span id="count"></span><span>家店铺</span>
                </div>
                <div id="nodata" class="detail_top_filter_tag">
                    <span>品牌在<?php echo $area_name?>还没有开店</span>
                </div>
            </div>
        </div>
    </section>
    <md-content flex="" class="md-default-theme">
        <div id="l-map"></div>
    </md-content>
    <md-toolbar class="md-dark-theme md-white-theme-u font-size-24">
        <div tabindex="0" class="md-toolbar-tools">
            <div layout="row" flex="" class="fill-height">
                <div layout="row" layout-align="start center" class="md-toolbar-item md-breadcrumb">
                    <div class="brand_detail_icon marker_vector"></div>
                    <span class="margin-left-10">店铺</span>
                </div>
                <div flex="" layout="row" layout-align="end center" class="md-toolbar-item md-breadcrumb">
                    <span style="color:#999999">部分店铺可能暂无地理位置数据</span>
                </div>
            </div>
        </div>
    </md-toolbar>
</div>
</body>
</html>