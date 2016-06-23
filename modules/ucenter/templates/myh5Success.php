<article data-role="page" id="privateLetterSend" data-title="方橙" class="contain">
    <header data-scroll-down data-scroll-top="100px" data-role="header" data-theme="b" class="header">
        <a href="javascript:location.href='/ucenter/informationofmine'" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back">我的</a>
        <h1>H5列表</h1>
    </header>
    <div data-scroll-content data-role="content" class="detail_content ">
        <div class="detail_main">
            <section class="detail_section detail_section_border">
                <div class="detail_section_main <?php echo empty($info)?"hide":'';?> ">
                    <div data-scroll data-scroll-datarender class="follow-list" >

                    <?php foreach ($info as $key => $val){?>
                    <a  href="/activity/h5/q/showh5/id/<?php echo  $val['act_passport_id'];?>">
                            <div class="follow-list-item layout">
                                <div class="face40"><img src="<?php echo $val['brand_logo'];?>" onerror="this.src='/img/detail/logo_small.png'"/></div>
                                <div class="flex margin-left-10">
                                    <span class="title"><?php echo $val['brand_name']?></span>
                                </div>
                                <div class="layout layout-align-center-center margin-left-10 font-size-12">
                                    <?php echo $val['act_passport_ctime']; ?>
                                </div>
                            </div>
                            </a>
                    <?php }?>
                        <div data-scroll-url="{data_scroll_url}" class="hide"/></div>
                    </div>
                </div>
                
                
                <div class="detail_section_main <?php echo empty($info)?"":'hide';?>">
                    <!-- 没有数据的 通一提示-->
                    <div class="detail_noData layout layout-align-center-center">
                        <div>
                            <p>暂无h5需求</p>
<!--                             <p>关注商业体以便第一时间了解动态</p> -->
                        </div>
                    </div>
                 </div>
            </section>
        </div>
    </div>

<?php __slot('passport','footer');?>
</article>

