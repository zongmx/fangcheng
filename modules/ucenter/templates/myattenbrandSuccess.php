							<?php foreach ($attention as $key => $val){?>
							<div class="follow-list-item layout">
                                <div class="face40"><a href="/details/brand/brand_id/<?php echo  $val['brand_id'];?>"><img src="<?php echo getLogoimage(['brand_id'=>$val['brand_id']],'48x48');?>" onerror="this.src='/img/detail/logo_small.png'"/></a></div>
                                <div class="flex margin-left-10">
                                    <a href="/details/brand/brand_id/<?php echo  $val['brand_id'];?>" class="title"><?php echo $val['brand_name']?></a>
                                </div>
                                <div class="layout layout-align-center-center margin-left-10">
                                    <div class="btn_box attention_ed" onclick="commonUtilInstance.unfollow(this,<?php echo  $val['brand_id'];?>,1)">
                                        <div class="btn layout layout-align-center-center">
                                            <span class="icon_btn icon_attention"></span>
                                            <span>已关注</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <div data-scroll-url="{data_scroll_url}" class="hide"/></div>