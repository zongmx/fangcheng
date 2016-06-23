<article data-role="page" id="privateLetterSend" data-title="方橙" class="contain">
    <header data-scroll-down data-scroll-top="100px" data-role="header" data-theme="b" class="header">
        <a href="javascript:location.href='/ucenter/informationofmine'" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back">我的</a>
        <h1>关注列表</h1>
        <div data-role="navbar" class="navbar">
            <ul>
               <li><a href="/ucenter/myattention" <?php if ($attentiontype == 1){?> class="ui-btn-active"<?php }?>>品牌</a></li>
                <li><a href="/ucenter/myattention/attentiontype/2" <?php if ($attentiontype == 2){?> class="ui-btn-active"<?php }?>>商业体</a></li>
            </ul>
        </div>
    </header>
    <div data-scroll-content data-role="content" class="detail_content ">
        <div class="detail_main">
            <section class="detail_section detail_section_border">
                <div class="detail_section_main <?php echo empty($attention)?"hide":'';?> ">
                    <div data-scroll data-scroll-datarender class="follow-list" >
                    <?php foreach ($attention as $key => $val){?>
                        <?php if ($attentiontype == 1){?>
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
                        <?php }elseif ($attentiontype == 2){?>
                            <div class="follow-list-item layout">
                                <div class="face40"><a href="/details/mall/mall_id/<?php echo $val['mall_id'];?>"><img src="<?php echo  getLogoimage(['mall_id'=>$val['mall_id']],'48x48');?>"  onerror="this.src='/img/detail/logo_small.png'"/></a></div>
                                <div class="flex margin-left-10">
                                    <a href="/details/mall/mall_id/<?php echo $val['mall_id'];?>" class="title"><?php echo $val['mall_name']?></a>
                                </div>
                                <div class="layout layout-align-center-center margin-left-10">
                                    <div class="btn_box attention_ed" onclick="commonUtilInstance.unfollow(this,<?php echo $val['mall_id'];?>,2)">
                                        <div class="btn layout layout-align-center-center">
                                            <span class="icon_btn icon_attention"></span>
                                            <span>已关注</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    <?php }?>
                        <div data-scroll-url="{data_scroll_url}" class="hide"/></div>
                    </div>
                </div>
                
                
                <div class="detail_section_main <?php echo empty($attention)?"":'hide';?>">
                    <!-- 没有数据的 通一提示-->
                    <div class="detail_noData layout layout-align-center-center">
                        <div>
                            <p><?php if ($attentiontype == 1){?>暂无关注品牌<?php }elseif ($attentiontype == 2){?>暂无关注商业体<?php }?></p>
<!--                             <p>关注商业体以便第一时间了解动态</p> -->
                        </div>
                    </div>
                 </div>
            </section>
        </div>
    </div>

<?php __slot('passport','footer');?>
</article>

