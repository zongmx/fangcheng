<script type="text/javascript">
$('body').css('visibility', 'hidden');
</script>

<?php //__slot('passport','weixinconfig');?>
<!--今日推荐幻灯 start-->
    <div data-scroll-content data-role="content" class="detail_content tuijian bggray">
        <section class="detail_section">
            <!-- <div class="tuijian_new">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                    begin chengtvinfo as k to v
                        <div class="swiper-slide">
                        <a href="/chengtv/view/chengtv_id/{v['chengtv_id']}" data-ajax="false" class="tuijian_slider">
                            <div class="tuijian_new_mask"></div>
                            <img src="{v['chengtv_img_big']}" id="{k}" class="tuijian_slider_img"/>
                            <p class="tuijian_new_tit"><a href="/chengtv/view/chengtv_id/{v['chengtv_id']}" data-ajax="false">{v['chengtv_title']}</a> </p>
                        </a>
                        </div>
                    end chengtvinfo  
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div> -->
            <div class="banner"></div>
            
            <script>
                $(function(){
                    $('.banner').bannerAds({ 'position': 1, 'flag': 1, 'page': 1});
                });
            </script>
            <!--今日推荐 版块推荐列表-->
            <div data-scroll data-scroll-datarender id="recommend" class="detail_section_main2">
            <div class="layout layout-align-start-center margin-bottom-10">
            	<div class="btn_box flex">
					<a href="/chengtv/index" class="btn add-need-btn layout layout-align-center-center">
						<span class="layout layout-align-center-center">
							<div class="icon_btn icon_chengTV1"></div>&nbsp;橙TV
						</span>
					</a>
				</div>
				<div class="btn_box flex margin-left-10">
					<a href="/recommend/brand" class="btn add-need-btn layout layout-align-center-center">
						<span class="layout layout-align-center-center">
							<div class="icon_btn ico_rec_brand1"></div>&nbsp;精选品牌
						</span>
					</a>
				</div>
            </div>
            <?php $i = 0;?>
            <!-- begin list as k to v -->
            <?php if($i){?>
            <div class="btn_box flex margin-top-10">
                <a href="/chengtv/add/recomm/1" class="btn add-need-btn layout layout-align-center-center"><span class="layout layout-align-center-center">报名加入品牌推荐</span></a>
            </div>
            <div class="detail_section_head layout layout-align-start-center margin-top-10 recommend_date">
                <div class="detail_section_tit font-size-14">{k}</div>
            </div>
            
            <?php } $i = $i+1; ?>
				<div class="tuijian_wrap">
                  <?php foreach($v as $key=>$value){?>
                  <div class="tuijian_item layout">
                        <div class="tuijian_item_img face105 faceborder"><a href="/details/brand/brand_id/{value['brand_id']}">
                                <img src="{value['img']}" onerror="this.src='/img/detail/logo_big.png'">
                            </a></div>
                        <div class="flex">
                        	<div class="tujian_item_right">
	                            <h3><a href="/details/brand/brand_id/{value['brand_id']}" class="font-size-15" data-ajax="false">{value['title']}</a> </h3>
	                            <div class="tuijian_item_formats">
	                                <ul class="cl">
	                                <?php foreach($value['tag'] as $ke=>$val){
	                                    if(empty($val)){
	                                    continue;
	                                    }else{
	                                    ?>
	                                    <li>{val}</li>
	                                <?php }
	                                }?>
	                                </ul>
	                            </div>
	                            <?php if($value['mall'][0]['name'] && $value['mall'][0]['id']){?>
	                            <div class="layout layout-align-start-start tuijian_item_name">
	                                <p>入驻:
	                                <?php foreach($value['mall'] as $ke=>$val){
	                                    if(empty($val['name'])){
	                                    continue;
	                                    }else{
	                                    ?>
	                                <a href="/details/mall/mall_id/{val['id']}" >{val['name']}</a>&nbsp;&nbsp;
	                                <?php }}
	                                if($value['mall'][0]['name']){ echo '等';}
	                                ?>
	                                </p>
	                            </div>
	                            <?php }?>
	                        </div>
                        </div>
                    </div>
                <?php }?>    
                </div>
                <!-- end list --> 
                <div data-scroll-url="{data_scroll_url}" class="hide"/></div>
                
                	
            </div>
        </section>
    </div>
    <!-- 微信分享 -->
<?php // __slot('passport','footer');?>

 