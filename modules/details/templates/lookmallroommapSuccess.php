<!DOCTYPE html>
<html class="js no-touch">
<head>
    <?php if(!empty($fromsearch)){?>
    <title>铺位详情-方橙科技</title>
    <meta name="description" content="方橙科技是一个专业的商业地产大数据平台，专注于商业地产B2B服务。我们致力于通过大数据和互联网方式，使购物中心招商、品牌拓展更高效合理地达成交易匹配。">
    <meta name="keywords" content="商铺,找商铺,商业体商铺,方橙,方橙科技">
    <?php }else{?>
    <title>方橙 室内地图</title>
    <?php }?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0 user-scalable=no">
    <link rel="stylesheet" href="/bower_components/angular-material/angular-material.css?v=<?php echo C('VERSION');?>">
    <link href="/css/vendors/bootstrap.css?v=<?php echo C('VERSION');?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/detail/mall_detail1.css?v=<?php echo C('VERSION');?>">
    <link rel="stylesheet" type="text/css" href="/css/detail/mall_detail1_media.css?v=<?php echo C('VERSION');?>">
    <link rel="stylesheet" type="text/css" href="/css/detail/map.css?v=<?php echo C('VERSION');?>">
    <script type="text/javascript" src="/js/vendors/jquery-1.9.1.min.js?v=<?php echo C('VERSION');?>"></script>
	<script type="text/javascript" src="/js/vendors/jquery.tap.min.js?v=<?php echo C('VERSION');?>"></script>
    <script src="/js/roomMap/three.min.js?v=<?php echo C('VERSION');?>"></script>
    <script src="/js/roomMap/Detector.js?v=<?php echo C('VERSION');?>"></script>
    <script src="/js/roomMap/OrbitControls.js?v=<?php echo C('VERSION');?>"></script>
    <script src="/js/roomMap/IndoorMap.js?v=<?php echo C('VERSION');?>"></script>
    <script src="/js/roomMap/IndoorMap2d.js?v=<?php echo C('VERSION');?>"></script>
    <script src="/js/roomMap/IndoorMap3d.js?v=<?php echo C('VERSION');?>"></script>
    <script src="/js/roomMap/Projector.js?v=<?php echo C('VERSION');?>"></script>
    <!--script(src="js/roomMap/Canvas2DRenderer.js")-->
    <link href="/css/indoor3D.css?v=<?php echo C('VERSION');?>" rel="stylesheet">
    <script>
        $(function() {
            var floor = $('#floor');
            var floor_range = $('#floor-range');
            $('li', floor_range).on('tap',function() {
                $('#shopInfo').addClass('hide');
                $('#categoryLegend').addClass('hide');
                $('#legend').removeClass('distance_blur');
                floor_range.toggleClass('hide');
                var value = parseInt($(this).val());
                floor.text(getShops(value).Name);
                currentFloor = $(this).val();
                categorys = getCategory(currentFloor);
                indoorMap.showFloor($(this).val());
                return false;
            });

			$('body').on('tap','#dropdown-toggle',function() {
				floor_range.toggleClass('hide');
			});

            $('body').on('tap','#legend',function() {
				showCategoryLegend(this);
			});
			
			$('body').on('tap','#zoomin',function() {
				zoom(1);
			});

			$('body').on('tap','#zoomout',function() {
				zoom(0);
			});

            $('.mapTip_img img').error(function() {
               $(this).attr('src', "/img/default.png");
            });

        })
    </script>
</head>
<body layout="row">
    <div layout="column" layout-fill="" teabindex="-1" role="main">
        <md-toolbar class="md-dark-theme md-default-theme custom_toolbar">
            <div tabindex="0" class="md-toolbar-tools">
                <div layout="row" flex="" class="fill-height">
                    <div class="detail_back_box">
						<?php if(empty($fromsearch)) {?>
                        <a layout="row" href="/details/mallbrandandcategory/mall_id/<?php echo $mall_id; ?>">
                            <span flex="10" class="detail_back">返回</span>
                            <span layout="" layout-align="center center" class="icon_back_title font-size-28">品牌与业态</span>
                        </a>
						<?php } else {?>
						<a layout="row" href="javascript:history.go(-1)">
                            <span flex="10" class="detail_back">返回</span>
                            <span layout="" layout-align="center center" class="icon_back_title font-size-28">商铺</span>
                        </a>
						<?php }?>
                    </div>  
                    <div flex="" layout="row" layout-align="center center"
                         class="md-toolbar-item md-breadcrumb">
                        <div class="detail_content_tag">
                            <div class="detail_survey_condition detail_survey_order open detail_map_survey_order">
                                <div id="dropdown-toggle" class="dropdown-toggle custom_menu text-right padding-right-20 font-size-36">
                                    <span id="floor"><?php echo $flloorArr[$floor];?></span><span class="caret"></span>
                                </div>
                                <ul id="floor-range" role="menu" class="dropdown-menu custom_menus hide">
                                <?php foreach ($flloorArr as $key => $val){?>
                                    <li role="presentation" value="<?php echo $key;?>"><a role="menuitem"><?php echo $val;?></a></li>
                                <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </md-toolbar>
        <md-content id="indoor3d-content" flex="" class="md-default-theme">
            <div class="zoomPosition">
                <div class="BMap_ZoomCtrl">
                    <div id="zoomin" class="zoom_btn blue_off zoom_btn_in">
                        <div class="zin"></div>
                    </div>
                    <div id="zoomout" class="zoom_btn blue_off zoom_btn_out">
                        <div class="zout"></div>
                    </div>
                </div>
                <div class="BMap_ZoomCtrl">
                    <div id="legend" class="zoom_btn distance heat">图例</div>
                </div>
            </div>
            <div id="indoor3d">
                <script>
                    function getShops(floorId, shopId) {
                        var _currentFloor, shop;
                        for (var index = 0; index < indoorData.data.Floors.length; index++) {
                            if (indoorData.data.Floors[index]._id == floorId) {
                                _currentFloor = indoorData.data.Floors[index];
                                break;
                            }
                        }
                        if (!shopId)
                            return _currentFloor;
                        for (var index = 0; index < _currentFloor.FuncAreas.length; index++) {
                            var obj = _currentFloor.FuncAreas[index];
							
                            if (obj.BrandShop == shopId) {
                                shop = {
                                    floor : _currentFloor.Name,
                                    name : obj.Name,
                                    brand : obj.Brand,
                                    brandShop : obj.BrandShop,
                                    category : obj.Category,
                                    name_en : obj.Name_en,
                                    shopNo : obj.ShopNo ? obj.ShopNo.toUpperCase()
                                            : "",
                                    area : parseInt(obj.Area)
                                };
                                break;
                            }
                        }
						
                        return shop;
                    }

                    function getCategory(floorId) {
                        var _currentFloor, categorys = {}, _categorys = [];
                        for (var index = 0; index < indoorData.data.Floors.length; index++) {
                            if (indoorData.data.Floors[index]._id == floorId) {
                                _currentFloor = indoorData.data.Floors[index];
                                break;
                            }
                        }
                        for (var index = 0; index < _currentFloor.FuncAreas.length; index++) {
                            var obj = _currentFloor.FuncAreas[index];
                            if (obj.Category && !categorys[obj.Category]) {
                                categorys[obj.Category] = true;
                                _categorys.push(obj.Category);
                            }
                        }
                        return _categorys;
                    }

                    function zoom(type) {
                        switch (type) {
                            case 1:
                                indoorMap.zoomIn(1.25);
                                break;
                            default:
                                indoorMap.zoomOut(0.8);
                                break;
                        }
                    }
                    var indoor3d = document.getElementById('indoor3d');
                    var indoor3d_content = document
                            .getElementById('indoor3d-content');
                    function resize() {
                        indoor3d.style.width = indoor3d_content.clientWidth + 'px';
                        indoor3d.style.height = indoor3d_content.clientHeight
                                + 'px';
                    };
                    resize();
                    window.resize = function() {
                        resize();
                    }

                    animate();
                    var params = {
                        mapDiv : "indoor3d",
                        dim : '2d'
                    }
                    var indoorMap = IndoorMap(params);
                    var indoorData = <?php echo $__datajson;?>;
                    var currentFloor = <?php echo $floor;?>;
                    var categorys = getCategory(currentFloor);
                    indoorMap.parse(indoorData);
                    indoorMap.showFloor(<?php echo $floor;?>);
                    indoorMap.setSelectable(true);
                    //indoorMap.setTopView();
					indoorMap.setSelectable(true).setMovable(true);
                    indoorMap.setSelectionListener(showShop);
					function showShop(shopId) {
						if (shopId == '-1' || shopId == '' || shopId == '0') {
							$('#shopInfo').addClass('hide');
                            return;
                        }
						<?php if(empty($fromsearch)) {?>
                        showShopInfo(getShops(currentFloor, shopId));
						<?php } else {?>
						showShopInfoFromSearch(getShops(currentFloor, shopId));
						<?php }?>
					}
                    //indoorMap.showLabels(true)
                    function animate() {
                        requestAnimationFrame(animate);
                    }
                    </script>
            </div>
            <section id="categoryLegend" layout="" class="detail_content roomMap-legend hide">
                <div flex="">
                    <div flex="" layout="row" layout-align="start center">
                        <div flex="" class="font-size-24">图例</div>
                        <span tabindex="0" class="close cutom_close black-close">
                            <span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </span>
                    </div>
                    <div class="font-size-24 clear">
                        <div value="10000" class="legend">
                            <div class="icon dark_blue"></div>
                            <span>餐饮</span>
                        </div>
                        <div value="20000" class="legend">
                            <div class="icon cambridge_blue"></div>
                            <span>购物</span>
                        </div>
                        <div value="30000" class="legend">
                            <div class="icon cambridge_green"></div>
                            <span>亲子儿童</span>
                        </div>
                        <div value="40000" class="legend">
                            <div class="icon dark_green"></div>
                            <span>教育培训</span>
                        </div>
                        <div value="50000" class="legend">
                            <div class="icon dark_yellow"></div>
                            <span>休闲娱乐</span>
                        </div>
                        <div value="60000" class="legend">
                            <div class="icon dark_yellow_green"></div>
                            <span>生活服务</span>
                        </div>
                        <div value="70000" class="legend">
                            <div class="icon cambridge_yellow"></div>
                            <span>美妆丽人</span>
                        </div>
                        <div value="80000" class="legend">
                            <div class="icon dark_brown"></div>
                            <span>酒店公寓</span>
                        </div>
                        <div value="90000" class="legend">
                            <div class="icon cambridge_yellow_green"></div>
                            <span>百货超市</span>
                        </div>
                        <div value="100000" class="legend">
                            <div class="icon cambridge_brown"></div>
                            <span>其他</span>
                        </div>
                    </div>
                </div>
            </section>
			<?php if(empty($fromsearch)) {?>
            <section id="shopInfo" layout="" class="detail_content detail_mapTip hide">
                <div class="mapTip_img">
                    <img src="/img/default.png" class="brandImg">
                </div>
                <div flex="" class="margin-left-20">
                    <div flex="" layout="row" layout-align="start center">
                        <div flex="" class="font-size-30 brandName"></div>
                        <span tabindex="0" class="close cutom_close gray999">
                            <span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </span>
                    </div>
                    <div class="margin-top-40 font-size-24">
                        <div class="margin-top-20">
                            <span>业态：</span><span class="category"></span>
                        </div>
                        <div class="margin-top-20">
                            <span>铺位号：</span><span class="shopNo"></span>
                        </div>
                        <div layout="" layout-align="start center" class="margin-top-20">
                            <div flex="">
                                <span>店铺面积：</span><span class="shopSize"></span>
                            </div>
                            <div class="mapTip_tit">
                                <a layout="" layout-align="start center" class="brandDetail">
                                    <span class="font-size-24">查看品牌详情</span>
                                    <span class="detail_icon_rel detail_icon_more"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>          
            </section>
			<?php } else {?>
			<section id="shopInfo" layout="" class="detail_content detail_mapTip_fromsearch hide">
                <div class="mapTip_img">
                    <img src="/img/default.png" class="brandImg">
                </div>
                <div flex="" class="margin-left-20">
                    <div flex="" layout="row" layout-align="start center">
                        <div flex="" class="font-size-30">
							<span class="shopSize"></span>
							<span class="floor margin-left-20"></span>
                            <span class="category margin-left-20"></span>
						</div>
                        <span tabindex="0" class="close cutom_close">
                            <span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </span>
                    </div>
                    <div class="font-size-24">
          
						<div>
                            <span>入驻品牌：</span><span class="brandName"></span>
                        </div>
                        <div>
                            <span>铺位号：</span><span class="shopNo"></span>
                        </div>
                        <div class="margin-top-20">
							<div class="font-size-30">
								<span><?php echo $mall_name;?></span>
							</div>
							<div layout="" layout-align="start center" class="font-size-24 contant_btn">
								<div class="">
									<a layout="" layout-align="start center" href="/details/mall/mall_id/<?php echo $mall_id;?>">
										<span>商业体详情</span>
									</a>
								</div>
								<?php if(!empty($hasContact)) {?>
								<div class="mapTip_tit">
									<a layout="" layout-align="start center" class="contact" href="/details/userlist/mall_id/<?php echo $mall_id;?>">
										<span>马上联系</span>
									</a>
								</div>
								<?php }?>
							</div>
                        </div>
                    </div>
                </div>          
            </section>
			<?php }?>
			<script>
				var category_map = {'10000':'餐饮','20000':'购物','30000':'亲子儿童','40000':'教育培训','50000':'休闲娱乐','60000':'生活服务','70000':'美妆丽人','80000':'酒店公寓','90000':'百货超市','100000':'其他'};
				$('body').on('tap','#shopInfo .close',function() {
					$('#shopInfo').addClass('hide');
				});
				console.log(category_map[0])
				<?php if(empty($fromsearch)) {?>
                    function showShopInfo(shop) {
                        var intId = parseInt(shop.brand);
                        var brandImg = $('#shopInfo .brandImg').attr('src','/upload/brand/108x108/'+(parseInt(intId/1000000))+'/'+(parseInt(intId/1000))+'/'+intId+'.png'),
                            brandName = $('#shopInfo .brandName').text(shop.name),
                            category = $('#shopInfo .category').text(category_map[shop.category]),
                            shopNo = $('#shopInfo .shopNo').text(shop.shopNo),
                            shopSize = $('#shopInfo .shopSize').text(shop.area+'㎡'),
                            brandDetail = $('#shopInfo .brandDetail');
						if(!shop.shopNo) $('#shopInfo .shopNo').parent().addClass('hide');
						else $('#shopInfo .shopNo').parent().removeClass('hide');
						if(shop.area == 0) $('#shopInfo .shopSize').parent().addClass('hide');
						else $('#shopInfo .shopSize').parent().removeClass('hide');
                        if (shop.brand) {
                            brandDetail.attr('href','/details/brand/brand_id/' + shop.brand).removeClass('hide');
                        } else {
                            brandDetail.addClass('hide');
                        }
						if(category_map[shop.category]) {
							$('#shopInfo .category').parent().removeClass('hide');
						} else {
							$('#shopInfo .category').parent().addClass('hide');
						}
                        $('#shopInfo').removeClass('hide');
                        $('#categoryLegend').addClass('hide');
                        $('#legend').removeClass('distance_blur');
                    }
				<?php } else {?>
					var UPLOAD_URL = '<?php echo C('UPLOAD_URL')?>';
					var mall_id = '<?php echo $mall_id ?>';
					function showShopInfoFromSearch(shop) {
						console.log(shop)
						$('#shopInfo .brandImg').attr('src',UPLOAD_URL+'/brandshop/'+mall_id+'/'+currentFloor+'/'+shop.brandShop+'.png');
						$('#shopInfo .shopSize').text(shop.area+'㎡');
						$('#shopInfo .floor').text(shop.floor);		
						$('#shopInfo .shopNo').text(shop.shopNo);
						$('#shopInfo .brandName').text(shop.name);
						if(!shop.shopNo) $('#shopInfo .shopNo').parent().addClass('hide');
						else $('#shopInfo .shopNo').parent().removeClass('hide');
						if(shop.area == 0) {
							$('#shopInfo .shopSize').addClass('hide');
							$('#shopInfo .floor').removeClass('margin-left-20');
						}
						else {
							$('#shopInfo .shopSize').removeClass('hide');
							$('#shopInfo .floor').addClass('margin-left-20');
						}
						if(category_map[shop.category]) {
							$('#shopInfo .category').text(category_map[shop.category]);
						} else {
							$('#shopInfo .category').text('');
						}
						$('#shopInfo').removeClass('hide');
                        $('#categoryLegend').addClass('hide');
                        $('#legend').removeClass('distance_blur');
					}
					var selectedShopId = '<?php echo $selectedShopId;?>';
					indoorMap.selectById(selectedShopId);
					showShop(selectedShopId);
					indoorMap.showAreaNames(false);
				<?php }?>
					$('body').on('tap','#categoryLegend .close',function() {
						$('#categoryLegend').addClass('hide');
                        $('#legend').removeClass('distance_blur');
					});
					
                    function showCategoryLegend(legend) {
                        $(legend).toggleClass('distance_blur');
                        $('#categoryLegend').toggleClass('hide');
                        $('#categoryLegend .legend').toggleClass('hide');
                        $('#shopInfo').addClass('hide');
						$('#categoryLegend .legend').addClass('hide');
                        categorys.forEach(function(category) {
                            $('#categoryLegend .legend[value=' + category + ']')
                                    .removeClass('hide');
                        });
                    }
					
                </script>
        </md-content>
    </div>
</body>
</html>