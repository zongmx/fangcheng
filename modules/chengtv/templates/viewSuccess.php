
    <div data-role="content" class="detail_content">
    
        <div class="tv-top">
            <img src="{chengtv_img_big}" class="tv-banner"/>
            <div class="tv-mask"></div>
            <div class="tv-title">
                <p><a href="/chengtv/view/chengtv_id/{chengtv_id}" data-ajax="false">{chengtv_title}</a></p>
            </div>
            <div class="tv-play" data-tv-url="{chengtv_src}" data-toggle="modal" custom-dialog="#tv-dialog" onclick="showDialog('#tv-dialog')"></div>
        </div>
        
        <div class="detail_main">
            <section class="detail_section">
                <div class="detail_index_message padding-left-10 padding-right-10">
                    <div class="btn_play" data-target=""></div>
                        <div class=" font-size-15">
                            <div class="layout ">
                                <div class="obj-tag gray717">品牌介绍：</div>
                                <div class="kong"></div>
                                <div class="flex" >{chengtv_desc}</div>
                            </div>
                            <div class="layout need-wrapper-item margin-top-20">
                                <div class="obj-tag gray717">所属业态：</div>
                                <div class="obj-tags flex">{category_ids}</div>
                            </div>
                            <!-- <div class="layout need-wrapper-item margin-top-20">
                                <div class="obj-tag gray717">品牌特色：</div>
                                <div class="obj-tags flex">{chengtv_special}</div>
                            </div> -->
                            
                        </div>
                    </div>
                <div class="margin-top-40 layout">
                    <div class="btn_box layout layout-align-center-center flex">
                        <a {brand_pass} class="btn add-need-btn layout layout-align-center-center" data-ajax='false'><span class="layout layout-align-center-center">我也要上【橙TV】</span></a>
                    </div>
                    <?php if(!empty($brand_id)){?>
                    <div class="btn_box margin-left-10 layout layout-align-center-center flex">
                        <a href="/chengtv/index" data-ajax=false class="btn btn_default layout layout-align-center-center"><span class="layout layout-align-center-center">查看往期橙TV</span></a>
                    </div>
                    <?php }else{?>
                    <div class="btn_box margin-left-10 layout layout-align-center-center flex grayc8c">
                        <span class="layout layout-align-center-center btn btn_full_disable" >马上联系品牌</span>
                    </div>
                    <?php }?>
                </div>
            </section>
        </div>
    </div>
    <?php __slot('passport','footer');?>
    <div id="tv-dialog" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal videoDialog">
        <div class="modal-backdrop fade"></div>
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>
</article>




<script type='text/javascript'>
	if(commonUtilInstance.isWeiXin()) {
		var weixinShare = $('[weixin-share]');
		weixinShare.addClass('hide');
		commonUtilInstance.forwardneed_weixin(weixinShare.attr('wxTitle'),weixinShare.attr('wxDesc'),weixinShare.attr('wxLink'),weixinShare.attr('wxImgUrl'));
	}
	 $('.modal-backdrop').click(function(){
            hideDialog("#tv-dialog");
        })
</script>