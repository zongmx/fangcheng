<!-- begin list as k to v -->
            
            <div class="detail_section_head layout layout-align-start-center margin-top-10 recommend_date">
                <div class="detail_section_tit font-size-14">{k}</div>
            </div>
            
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