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
	<script type="text/javascript" src="/js/vendors/jquery.tap.min.js"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/api?ak=zCm7xmFLFwGEdsti4yT59bV9&amp;v=2.0"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/library/Heatmap/2.0/src/Heatmap_min.js"></script>
    <script type="text/javascript" src="/js/mapBaseOnBD.js"></script>
</head>
<script>
$(function() {
    var setHeat = false, poi_type_legend = $('#poi_type_legend'), heatlegends = $('.heatlegend'), heatlegend_span = $('#heatlegend span'), schoolheatlegend = $('.school-heatlegend');
    var mapInstance = $('#l-map')
            .map(
            {
                centerPoint : new BMap.Point(<?php echo $mall_longitude?>, <?php echo $mall_latitude?>),
                zoomSize : 14,
                zoomControl : false,
                scaleControl : true,
                data : '/details/makepopulationmap/mall_id/<?php echo $mall_id;?>',
                dataParam : {
                    mallId : '<?php echo $mall_id?>'
                },
                source: <?php echo empty($source)?0:$source;?>,
                areaMarker : true,
                areaMarker_poi_type : '<?php echo $population;?>',
                areaMarker_distance : '<?php echo $distanceArr[$distance];?>',
                heatPowerOverlay : true,
                radius : 25,
                zoomend : function(type, target) {
                    var zoom = this.getZoom() - 14;
                    var config = mapInstance.getMapInstance().config;
                    var defaultRadius = config.areaMarker_poi_type == '4' ? 25
                            : 25;
                    var radius = defaultRadius * Math.pow(2, zoom);

                    config.radius = radius;
                    if (setHeat
                            && config.areaMarker_poi_type != '5') {
                        config.heatPowerOverlay.remove();
                        config.heatPowerOverlay.show();
                    }
                },
                userDefinedControls : [ new UserDefinedControl(
                        function(map) {
                            var container = $('<div>');
                            var div = $('<div class="BMap_ZoomCtrl">');
                            var three = $('<div class="zoom_btn distance" value="3">3km</div>');
                            var five = $('<div class="zoom_btn distance" value="5">5km</div>');
                            var one = $('<div class="zoom_btn distance" value="1">1km</div>');
                            var div_heat = $('<div class="BMap_ZoomCtrl">');
                            var heatPower = $('<div class="zoom_btn distance heat">人口热力</div>');
                            div_heat.append(heatPower)
                            container.append(div, div_heat);
                            div.append(one);
                            div.append(three);
                            div.append(five);
                            setDistance('<?php echo $distanceArr[$distance];?>');
                            [ one, three, five ]
                                    .forEach(function(d) {
                                        d
                                                .on('tap',function() {
                                                    var distance = d
                                                            .text();
                                                    var config = mapInstance
                                                            .getMapInstance().config;
                                                    if (config.areaMarker_distance === distance)
                                                        return;
                                                    setDistance(distance);
                                                    if (setHeat) {
                                                        config.areaMarker
                                                                .setDistance(distance);
                                                        if (config.areaMarker_poi_type != '5') {
                                                            config.heatPowerOverlay
                                                                    .remove();
                                                            config.heatPowerOverlay
                                                                    .show();
                                                        }
                                                        return false;
                                                    } else {
                                                        setIcon(
                                                                config.areaMarker_poi_type,
                                                                distance);
                                                        config.areaMarker
                                                                .setMarkByType(
                                                                config.areaMarker_poi_type,
                                                                distance);
                                                        config.areaOverlay
                                                                .setHighLight(d
                                                                        .val());
                                                        return false;
                                                    }
                                                });
                                    });
                            function setDistance(distance) {
                                [ one, three, five ]
                                        .forEach(function(d) {
                                            d
                                                    .removeClass('distance_blur');
                                        });
                                switch (distance) {
                                    case '1km':
                                        one.addClass('distance_blur');
                                        break;
                                    case '3km':
                                        three.addClass('distance_blur');
                                        break;
                                    case '5km':
                                        five.addClass('distance_blur');
                                        break;
                                    default:
                                        one.addClass('distance_blur');
                                        break;
                                }
                                ;
                            }
                            heatPower
                                    .on('tap',function() {
                                        var config = mapInstance
                                                .getMapInstance().config;
                                        if (!setHeat) {
                                            heatPower
                                                    .addClass('distance_blur');
                                            config.areaMarker
                                                    .remove();
                                            if (config.areaMarker_poi_type == '5') {
                                                showschoolheatlegend(true);
                                            } else {
                                                showheatlegend(true);
                                                config.heatPowerOverlay
                                                        .show();
                                            }
                                            if (config.areaMarker_poi_type == '5') {
                                                $(
                                                        '#dropdown-toggle-school')
                                                        .addClass(
                                                        'hide');
                                                config.schoolType = '0';
                                                $(
                                                        '#dropdown-toggle-school .dropdown-toggle span:first')
                                                        .text(
                                                        '全部学校');
                                            } else if (config.areaMarker_poi_type == '4') {
                                                $(
                                                        '#dropdown-toggle-hotel')
                                                        .addClass(
                                                        'hide');
                                                config.hotelType = '0';
                                                $(
                                                        '#dropdown-toggle-hotel .dropdown-toggle span:first')
                                                        .text(
                                                        '全部旅店');
                                            }
                                            setHeat = true;
                                        } else {
                                            showpoi_type_legend(true);
                                            setIcon(
                                                    config.areaMarker_poi_type,
                                                    config.areaMarker_distance);
                                            heatPower
                                                    .removeClass('distance_blur');
                                            setHeat = false;
                                            config.heatPowerOverlay
                                                    .remove();
                                            config.areaMarker
                                                    .show();
                                            if (config.areaMarker_poi_type == '5') {
                                                $(
                                                        '#dropdown-toggle-school')
                                                        .removeClass(
                                                        'hide');
                                            } else if (config.areaMarker_poi_type == '4') {
                                                $(
                                                        '#dropdown-toggle-hotel')
                                                        .removeClass(
                                                        'hide');
                                            }
                                        }
                                    });
                            var parent_container = $('#l-map')
                                    .parent();
                            this.setAnchor(BMAP_ANCHOR_TOP_RIGHT);
                            this
                                    .setOffset(new BMap.Size(
                                            10,
                                                    (parent_container
                                                            .height() / 2) - 52));
                            map.getContainer().appendChild(
                                    container.get(0));
                            return container.get(0);
                        }) ],
                areaOverlay : true
            });

    var distance = $('#distance');
    var distance_range = $('#distance-range');
    $('li', distance_range)
            .on('tap',
            function() {
                distance_range.toggleClass('hide');
                distance.text($('a', this).text());
                var config = mapInstance.getMapInstance().config;
                heatlegend_span.text(distance.text());
                if (setHeat) {
                    config.areaMarker.setType($(this).val() + '');
                    config.heatPowerOverlay.remove();
                    if ($(this).val() == '5') {
                        showschoolheatlegend(true);
                        return false;
                    } else {
                        showheatlegend(true);
                        if ($(this).val() == '4') {
                            $('#hotelLegend').removeClass('hide');
                        } else {
                            $('#hotelLegend').addClass('hide');
                        }
                        config.heatPowerOverlay.show();
                        return false;
                    }
                } else {
                    config.areaMarker.setMarkByType($(this).val()
                            + '', config.areaMarker_distance);
                    setIcon(config.areaMarker_poi_type,
                            config.areaMarker_distance);
                    if ($(this).val() == '5') {
                        $('#dropdown-toggle-school').removeClass(
                                'hide');
                        $('#dropdown-toggle-hotel')
                                .addClass('hide');
                        config.hotelType = '0';
                        $(
                                '#dropdown-toggle-hotel .dropdown-toggle span:first')
                                .text('全部旅店');
                    } else if ($(this).val() == '4') {
                        $('#dropdown-toggle-school').addClass(
                                'hide');
                        $('#dropdown-toggle-hotel').removeClass(
                                'hide');
                        config.schoolType = '0';
                        $(
                                '#dropdown-toggle-school .dropdown-toggle span:first')
                                .text('全部学校');
                    } else {
                        $('#dropdown-toggle-school').addClass(
                                'hide');
                        $('#dropdown-toggle-hotel')
                                .addClass('hide');
                        config.hotelType = '0';
                        $(
                                '#dropdown-toggle-hotel .dropdown-toggle span:first')
                                .text('全部旅店');
                        config.schoolType = '0';
                        $(
                                '#dropdown-toggle-school .dropdown-toggle span:first')
                                .text('全部学校');
                    }
                    return false;
                }
            });

    $('#dropdown-toggle').on('tap',function() {
        distance_range.toggleClass('hide');
        $('#dropdown-toggle-school-range').addClass('hide');
        $('#dropdown-toggle-hotel-range').addClass('hide');
        return false;
    });

    $('#dropdown-toggle-school .dropdown-toggle').on('tap',function() {
        $('#dropdown-toggle-school-range').toggleClass('hide');
        distance_range.addClass('hide');
        return false;
    });

    $('#dropdown-toggle-school-range li').on('tap',
            function() {
                var config = mapInstance.getMapInstance().config;
                var text = $('a', $(this)).text(), schoolType = $(this)
                        .val();
                config.areaMarker.setSchoolType(schoolType);
                $('#dropdown-toggle-school .dropdown-toggle span:first')
                        .text(text);
                $('#dropdown-toggle-school-range').addClass('hide');
            });

    $('#dropdown-toggle-hotel .dropdown-toggle').on('tap',function() {
        $('#dropdown-toggle-hotel-range').toggleClass('hide');
        distance_range.addClass('hide');
        return false;
    });

    $('#dropdown-toggle-hotel-range li').on('tap',function() {
        var config = mapInstance.getMapInstance().config;
        var text = $('a', $(this)).text(), hotelType = $(this).val();
        config.areaMarker.setHotelType(hotelType);
        $('#dropdown-toggle-hotel .dropdown-toggle span:first').text(text);
        $('#dropdown-toggle-hotel-range').addClass('hide');
    });

    setIcon('<?php echo $population;?>', '<?php echo $distanceArr[$distance];?>');
    function setIcon(poi_type, distance) {
        $('.icon_type').removeClass('show');
        switch (poi_type) {
            case '1':
                $('.icon_type.residence').addClass('show');
                break;
            case '3':
                $('.icon_type.office').addClass('show');
                break;
            case '4':
                $('.icon_type.hotel').addClass('show');
                break;
            case '5':
                $('.icon_type.school').addClass('show');
                break;
        }

    }

    function showpoi_type_legend(show) {
        if (show) {
            poi_type_legend.removeClass('hide');
            showheatlegend(false);
            showschoolheatlegend(false);
        } else {
            poi_type_legend.addClass('hide');
        }
    }

    function showheatlegend(show) {
        if (show) {
            heatlegends.removeClass('hide');
            showschoolheatlegend(false);
            showpoi_type_legend(false);
        } else {
            heatlegends.addClass('hide');
        }
    }

    function showschoolheatlegend(show) {
        if (show) {
            schoolheatlegend.removeClass('hide');
            showheatlegend(false);
            showpoi_type_legend(false);
        } else {
            schoolheatlegend.addClass('hide');
        }
    }

})
</script>
<body layout="row">
<div layout="column" layout-fill="" teabindex="-1" role="main">
    <md-toolbar class="md-dark-theme md-default-theme custom_toolbar">
        <div tabindex="0" class="md-toolbar-tools">
            <div layout="row" flex="" class="fill-height">
                <div class="detail_back_box">
                    <a layout="row" <?php if ($from == 1){?> href="javascript:history.back(-1);" <?php }else {?> href="/details/mallaround/mall_id/<?php echo $mall_id ?>"<?php }?>>
                    <span flex="10" class="detail_back">返回</span>
                    <span layout="" layout-align="center center" class="icon_back_title font-size-28"><?php if ($from == 1){echo '商圈概况';}else {echo '周边分析';}?></span></a>
                </div>
                <div flex="" layout="row" layout-align="center center"
                     class="md-toolbar-item md-breadcrumb font-size-24">
                    <div class="detail_content_tag">
                        <div class="dropdown detail_survey_condition detail_survey_order open detail_map_survey_order">
                            <div id="dropdown-toggle" class="dropdown-toggle custom_menu text-right padding-right-20 font-size-36">
                                <span id="distance">
									<?php if ($population == 1){?>
										住宅人口
									<?php }elseif($population == 3) {?>
										办公人口
									<?php }elseif($population == 4) {?>
										差旅人口
									<?php }elseif($population == 5) {?>
										学校人口
									<?php }?>
								</span><span class="caret"></span>
                            </div>
                            <ul id="distance-range" role="menu" class="dropdown-menu custom_menus hide">
                                <li role="presentation" value="1"><a role="menuitem">住宅人口</a></li>
                                <li role="presentation" value="3"><a role="menuitem">办公人口</a></li>
                                <li role="presentation" value="4"><a role="menuitem">差旅人口</a></li>
                                <li role="presentation" value="5"><a role="menuitem">学校人口</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="dropdown-toggle-school"
                         class="detail_content_tag absolute-right-5 <?php if ($population != 5) {?> hide<?php }?>" style="top: 16px;">
                        <div
                                class="dropdown detail_survey_condition detail_survey_order open detail_map_survey_order">
                            <div
                                    class="dropdown-toggle custom_menu text-right padding-right-20 font-size-28">
                                <span class="gray_189">全部学校</span><span class="caret caret_189"></span>
                            </div>
                            <ul id="dropdown-toggle-school-range" role="menu"
                                class="dropdown-menu custom_menus map-menu hide">
                                <li role="presentation" value="0"><a role="menuitem">全部学校</a></li>
                                <li role="presentation" value="40"><a role="menuitem">高校</a></li>
                                <li role="presentation" value="30"><a role="menuitem">中学</a></li>
                                <li role="presentation" value="20"><a role="menuitem">小学</a></li>
                                <li role="presentation" value="10"><a role="menuitem">幼儿园</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="dropdown-toggle-hotel"
                         class="detail_content_tag absolute-right-5 <?php if ($population != 4) {?> hide<?php }?>" style="top: 16px;">
                        <div
                                class="dropdown detail_survey_condition detail_survey_order open detail_map_survey_order">
                            <div
                                    class="dropdown-toggle custom_menu text-right padding-right-20 font-size-28">
                                <span class="gray_189">全部旅店</span><span class="caret caret_189"></span>
                            </div>
                            <ul id="dropdown-toggle-hotel-range" role="menu"
                                class="dropdown-menu custom_menus map-menu hide">
                                <li role="presentation" value="0"><a role="menuitem">全部旅店</a></li>
                                <li role="presentation" value="5"><a role="menuitem">五星级</a></li>
                                <li role="presentation" value="4"><a role="menuitem">四星级</a></li>
                                <li role="presentation" value="3"><a role="menuitem">三星级</a></li>
                                <li role="presentation" value="2"><a role="menuitem">二星及以下</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </md-toolbar>
    <md-content flex="" class="md-default-theme">
        <div id="l-map"></div>
    </md-content>
    <md-toolbar class="md-dark-theme md-white-theme-u md-toolbar-height40">
        <div tabindex="0"
             class="md-toolbar-tools padding-left-0 padding-right-0 height60">
            <div layout="row" flex=""
                 class="margin-left-10 margin-right-10 font-size-24">
                <div id="poi_type_legend" flex="" layout="row"
                     layout-align="center center" class="md-toolbar-item md-breadcrumb">
                    <div
                            class="detail_icon residence_icon margin-left-20 hide residence icon_type marker_vector"></div>
                    <span class="margin-left-10 hide residence icon_type">小区</span>
                    <div
                            class="detail_icon hotel5_icon margin-left-20 hide hotel icon_type marker_vector"></div>
                    <span class="margin-left-10 hide hotel icon_type">旅馆酒店</span>
                    <div
                            class="detail_icon office_icon margin-left-20 hide office icon_type marker_vector"></div>
                    <span class="margin-left-10 hide office icon_type">写字楼</span>
                    <div
                            class="detail_icon parking_icon margin-left-20 hide parking icon_type"></div>
                    <span class="margin-left-10 hide parking icon_type">停车场</span>
                    <div
                            class="detail_icon school_icon margin-left-20 hide school icon_type marker_vector"></div>
                    <span class="margin-left-10 hide school icon_type">学校</span>
                    <div class="detail_icon bus_icon margin-left-20 hide bus icon_type"></div>
                    <span class="margin-left-10 hide bus icon_type">公交车站</span>
					<?php if (empty($source)){?>
						<div class="detail_icon center_icon margin-left-20"></div>
						<span class="margin-left-10">本案</span>
						<div class="detail_icon mall_other_icon margin-left-20"></div>
						<span class="margin-left-10">其他商业体</span>
					 <?php }else {?>
						<div class="detail_icon mall_other_icon margin-left-20"></div>
						<span class="margin-left-10">商业体</span>
					<?php }?>
                </div>
                <div id="heatlegend" layout="row" layout-align="start"
                     class="md-toolbar-item md-breadcrumb heatlegend hide">
                    <span>
						<?php if ($population == 1){?>
							住宅人口
						<?php }elseif($population == 3) {?>
							办公人口
						<?php }elseif($population == 4) {?>
							差旅人口
						<?php }elseif($population == 5) {?>
							学校人口
						<?php }?>
					</span>
                </div>
                <div layout="column" flex="" class="heatlegend hide">
                    <div flex layout="row" layout-align="end center"
                         class="md-toolbar-item md-breadcrumb margin-left-10">
                        <div layout="row" layout-align="center center"
                             class="less_color white width25">
                            <span>较少</span>
                        </div>
                        <div layout="row" layout-align="center center"
                             class="common_color white width25">
                            <span>一般</span>
                        </div>
                        <div layout="row" layout-align="center center"
                             class="more_color white width25">
                            <span>较多</span>
                        </div>
                        <div layout="row" layout-align="center center"
                             class="many_color white width25">
                            <span>多</span>
                        </div>
                    </div>
                    <div flex="" layout="row" layout-align="center center"
                         class="md-toolbar-item md-breadcrumb margin-top-10">
                        <span style="color:#999999">该类型人口相对数量</span><span id="hotelLegend"
                                                                          style="color:#999999" class="hide">（全部旅店）</span>
                    </div>
                </div>
                <div flex="" layout="row" layout-align="center center"
                     class="md-toolbar-item md-breadcrumb school-heatlegend hide">
                    <span style="color:#999999">学校人口暂无热力图功能</span>
                </div>
            </div>
        </div>
    </md-toolbar>
</div>
</body>
</html>