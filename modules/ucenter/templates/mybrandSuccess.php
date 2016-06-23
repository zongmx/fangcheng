 
 <section data-role="page" id="brandProject" data-title="方橙-最专业的招商选址大数据平台" class="contain register gray_bg">
    <header data-role="header" data-theme="b" class="header">
        <a href="javascript:location.href='/ucenter/informationofmine'" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back ui-link ui-btn-left ui-btn ui-corner-all" role="button">我的</a>
        <h1>品牌拓展项目</h1>
    </header>
    <section class="detail_section detail_section_border">
                    <div class="detail_section_main detail_index_me">
                    <?php if ($passport_type==1){?>
                        <?php foreach ($brandinfo as $key => $val){?>
                        <?php if (empty($val['brand_id'])){?>
                        <div class="detail_index_me_item">
                                <div class="flex">
                                    <span class="font-size-15 grayc8c"><?php echo $val['brand_name'];?></span>
                                </div>
                        </div>
                        <?php }else {?>
                        <div class="detail_index_me_item">
                            <span class="font-size-16 gray333"><?php echo $val['brand_name'];?></span>
                            <p class="font-size-15 gray999"><span style="display:inline-block;width:80px;">所在业态：</span><span class="font-size-15 gray333"><?php echo  empty($val['cone'])&& empty($val['ctwo'])?"选择该品牌所在业态":$val['cone'].$val['ctwo'];?></span></p>
                            <p class="font-size-15 gray999"><span style="display:inline-block;width:80px;">身份：</span><span class="font-size-15 gray333"><?php echo $val['passport_brand_style_str'];?></span></p>
                            <p class="font-size-15 gray999"><span style="display:inline-block;width:80px;">负责区域：</span><span class="font-size-15 gray333"><?php echo $val['area'];?></span></p>
                            <div class="btn_box font-size-14" style="height:40px;line-height:40px;margin-top:10px">
                                <a href="/details/brand/brand_id/<?php echo $val['brand_id'];?>" class="fl btn btn_default text-center  ui-link" style="display:inline-block;width:48%;box-sizing:border-box;">查看品牌详情</a>
                                <a href="/ucenter/mypro/bedit/id/<?php echo $val['passport_brand_id'];?>" data-ajax="false" class="btn btn_full_able text-center fr ui-link" style="display:inline-block;width:48%;box-sizing:border-box;">编辑项目信息</a>
                            </div>
                        </div>
                        <?php }?>
                        <?php }?>
                     <?php }else{?>
                         <div class="shop-search-noData">
                         	<p>您当前登录身份为商业体，尚不能添加品牌项目信息</p>
                         	<p>下一版本将开放该功能，敬请期待</p>
                         </div>
                     <?php }?>
                    </div>
                </section>
                <div data-role="footer" data-position="fixed">
                     <div class="btn_box btn_box_need margin-top-10 margin-bottom-10 padding-left-10 padding-right-10">
                     <?php if ($passport_type==1){?>
                		 <a href="/ucenter/mypro/badd" class="btn add-need-btn ui-link"><span class="layout layout-align-center-center"><div class="icon_btn icon_add"></div>&nbsp;新增负责的项目</span></a>
                		<?php }else{?> 
                		 <a href="#" class="btn add-need-btn ui-link btn_full_disable"><span class="layout layout-align-center-center"><div class="icon_btn icon_add"></div>&nbsp;新增负责的项目</span></a>
                		 <?php }?>
                	 </div>
                </div>
</section>
 
<?php __slot('passport','footer');?>