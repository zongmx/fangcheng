<section data-role="page" id="main_index_1" data-title="方橙-最专业的招商选址大数据平台" class="contain">
    <header data-role="header" data-theme="b"class="header">
        <a <?php if (empty($url)){?><?php if ($tomine){?>href="/ucenter/informationofmine" <?php }else {?>href="javascript:history.go(-1)"<?php }?><?php }else {?>href="<?php echo $url;?>"<?php }?> data-role="button" data-shadow="false" data-ajax="false" class="nav-icon-back"><?php if (!empty($url)){echo '我的';}else {echo '返回';}?></a>
    
    <h1>个人资料</h1>
    </header>
    <div data-role="content" class="detail_content">
        <div class="detail_main">
            <div class="user_info_header layout">
                <div class="user_info_header_slider"></div>
                <div class="user_info_header_face face40">
                    <a href="" style="position: relative;z-index: 20">
                        <img onerror="this.src='/img/detail/headdefault.png'" src="<?php echo C('IMAGE_USER_URL').$userinfo['passport_picture'];?>" />
                    </a>
                </div>
                <div class="user_info_header_right margin-left-10" style="position: relative;z-index: 20">
                    <div class="">
                        <span class="font-size-15"><?php echo $userinfo['passport_name']; ?></span>
                        <?php if ($userinfo['passport_status'] == 2) { ?><i class="icon_btn"></i><?php } ?>
                    </div>
                    <div class="font-size-12 user_info_header_item"><?php if ($userinfo['passport_sex'] == 1) {
                            //echo '男';
                        } elseif ($userinfo['passport_sex'] == 2) {
                            //echo '女';
                        } ?><?php echo $area; ?></div>
                    <?php if ($userinfo['passport_id'] == $_SESSION['userinfo']['passport_id']) { ?>
                        <div class="user_info_header_item">
                            <i class="icon_btn icon-edit-u"></i>
                            <a href="/ucenter/editbasicinfo/url/<?php echo \Frame\Util\UString::base64_encode($url);?>" data-ajax="false"><span>编辑基本信息</span></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <section class="detail_section">
                <div class="detail_section_main">
                    <div class="detail_user_info">
                        <div class="detail_user_content">
                            <h3 class="font-size-14 user_info_t">职位信息</h3>
                            <div class="user_info_li layout">
                                <div class="user_info_li_t gray999">公司名称：</div>
                                <div class="user_info_li_c"><?php echo $userinfo['passport_company'];?></div>
                            </div>
                            <div class="user_info_li layout">
                                <div class="user_info_li_t gray999">职位：</div>
                                <div class="user_info_li_c"><?php echo $userinfo['passport_job_title'];?></div>
                            </div>
                            <?php if (!empty($brandinfo)){?>
                                <h3 class="font-size-14 user_info_t">负责的品牌信息</h3>
                                <?php foreach ($brandinfo as $key=>$val){?>
                                <div class="user_info_li layout">
                                    <div class="user_info_li_t gray999">品牌名称：</div>
                                    <div class="user_info_li_c flex"><a href="<?php echo empty($val['brand_id'])?"#":'/details/brand/brand_id/'.$val['brand_id'] ?>"><span class="gray333"><?php echo $val['brand_name'];?></span></a></div>
                                </div>
                                <div class="user_info_li layout">
                                    <div class="user_info_li_t gray999">所在业态：</div>
                                    <div class="user_info_li_c flex"><?php echo $val['cone'];?></div>
                                </div>
                                <?php if (!empty($val['ctwo'])){?>
                                <div class="user_info_li layout">
                                    <div class="user_info_li_t gray999">细分业态：</div>
                                    <div class="user_info_li_c flex"><?php echo $val['ctwo'];?></div>
                                </div>
                                <?php }?>
                                <?php if (!empty($val['area'])){?>
                                <div class="user_info_li layout">
                                    <div class="user_info_li_t gray999">负责区域：</div>
                                    <div class="user_info_li_c flex"><?php echo $val['area'];?></div>
                                </div>
                                <?php }?>
                                <?php }?>
                            <?php }?>
                            <?php if (!empty($mallinfo)){?>
                                <h3 class="font-size-14 user_info_t">负责的商业体信息</h3>
                                <?php foreach ($mallinfo as $key=>$val){?>
                                <div class="user_info_li layout">
                                    <div class="user_info_li_t gray999">商业体名称：</div>
                                    <div class="user_info_li_c flex"><a href="<?php echo empty($val['mall_id'])?"#":'/details/mall/mall_id/'.$val['mall_id'];?>"><span class="gray333"><?php echo $val['mall_name'];?></span></a></div>
                                </div>
                                <div class="user_info_li layout">
                                    <div class="user_info_li_t gray999">所在城市：</div>
                                    <div class="user_info_li_c flex"><?php echo $val['area_name'];?></div>
                                </div>
                                <?php }?>
                            <?php }?>
                        </div>
                        <?php if ($userinfo['passport_id'] == $_SESSION['userinfo']['passport_id']){?>    
                        <div class="btn_box layout user_info_edit">
                            <a href="#need-prew" class="btn btn_default layout layout-align-center-center ui-link">
                                <span>
                                    <span  onclick="javascript:window.location.href='/ucenter/editbrandandbusiness/url/<?php echo \Frame\Util\UString::base64_encode($url);?>'">编辑职位与项目信息</span>
                                </span>
                            </a>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<section data-role="page" id="main_index_2" data-title="方橙-最专业的招商选址大数据平台" class="contain">
    <div class="">
        
    </div>
</section>
<article id="face" data-role="page" data-title="方橙-最专业的招商选址大数据平台" class="contain edit_face">
    <div data-role="content" class="detail_u_face layout layout-algin-center">
    	<div class="flex layout layout-column layout-align-center-center">
    		<div id="imagePreview" class="detail_u_face_box">
	            <img onerror="this.src='/img/detail/headdefault.png'" src="<?php echo C('IMAGE_USER_URL').$userinfo['passport_picture'];?>">
	        </div>
    	</div>
        
    </div>
</article>