<?php if(!empty($mall_info)){ ?>				
				<div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">商圈信息</div>
                </div>
                <div class="detail_section_main detail_buss_info">
                    <div class="detail_buss_info_table">
                    	<div class="detail_buss_info_tr layout flex">
                            {mall_info['business_name']}商圈
                        </div>
                        <?php if(!empty($mall_info['district_name'])){?>
                        <div class="detail_buss_info_tr layout">
                            <div class="detail_buss_info_lable">行政区</div>
                            <div class="detail_buss_info_msg margin-left-10 flex">{mall_info['district_name']}</div>
                        </div>
                        <?php }?>
                        <div class="detail_buss_info_tr layout">
                            <div class="detail_buss_info_lable">商业体数</div>
                            <div class="detail_buss_info_msg margin-left-10 flex">{mall_info['mall_count']}个</div>
                        </div>
                        
                        <div class="detail_buss_info_tr layout">
                            <div class="detail_buss_info_lable">热门商业体</div>
                            <div class="detail_buss_info_msg margin-left-10 flex">{mall_info['hot_mall']}</div>
                        </div>
                        
                    </div>  
                    <?php if($mall_info['main_mall'] > 0){?>                
                     <div class="detail_buss_info_item">
                            <div class="layout layout-align-end-center">
                                <a href="/businesscircle/index/business_circle_id/{mall_info['business_circle_id']}" class="layout layout-align-start-center ui-link">
                                    <div class="font-size-14">查看详情</div>
                                    <span class="icon_btn icon_more"></span>
                                </a>
                            </div>
                     </div>
                     <?php }?>
    
<?php }?>                