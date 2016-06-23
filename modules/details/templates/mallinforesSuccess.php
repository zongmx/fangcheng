
<!-- 对话列表 start -->
<article data-role="page" id="privateLetterSend" data-title="方橙" class="contain">
    <header data-role="header" data-theme="b" class="header">
         <a href="/details/mall/mall_id/<?php echo $mall_id?>" data-role="button" data-shadow="false" data-ajax="false" class="nav-icon-back">返回</a>
        <h1>更多商业体信息</h1>

    </header>

    <div data-role="content" class="detail_content">
    <div class="detail_main detail_mall_info">
    <?php if(!empty($infoTag)){?>
    <div class="obj-name font-size-18 margin-top-10 margin-bottom-10">商业体信息<span class="font-size-12 gray717">&nbsp;/&nbsp;<?php echo $info['mall_name'];?></span></div>
    <section class="detail_section">
        <div class="detail_section_main">
            <ul class="need-list-wrapper">
                <li>
                    <div class="obj-info font-size-14">
                    <?php if (!empty($infoTag['group_92'])){?>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">商业定位：</div>
                            <div class="obj-tags flex"><?php echo implode('、', $infoTag['group_92']); ?>
                           </div>
                        </div>                       
                    <?php }?>
                    <?php if (!empty($infoTag['group_91'][0])){?>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">店铺数量：</div>
                            <div class="obj-tags"><?php if(!empty($infoTag['group_91'][0])){?><?php echo $infoTag['group_91'][0];?>家 <?php }?></div>
                        </div>    
                        <?php }?>   
                    <?php if (!empty($infoTag['group_88'][0]) || !empty($infoTag['group_89'][0])){?>                
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717 obj-tag105">主力店/特色店：</div>
                            <div class="obj-tags flex"><?php echo $infoTag['group_88'][0];?>/<?php echo $infoTag['group_89'][0];?></div>
                        </div>
                    <?php }?>
                    <?php if (!empty($infoTag['group_75'][0]) || !empty($infoTag['group_75'][1])){?>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">招商方式：</div>
                            <div class="obj-tags flex"><?php echo $infoTag['group_75'][0];?><?php echo empty($infoTag['group_75'][1])?"":'、'.$infoTag['group_75'][1];?></div>
                        </div>
                    <?php }?>
                    <?php $str=implode('、', $infoTag['group_76']); if ($str=='null'){?>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717 obj-tag96">第三方名称：</div>
                            <div class="obj-tags flex"><?php echo empty($infoTag['group_76'])?"":implode('、', $infoTag['group_76']);?></div>
                        </div>
                    <?php }?>
                    <?php if (!empty($infoTag['group_61'][0])){?>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717 obj-tag105">开发商：</div>
                            <div class="obj-tags flex"><?php echo implode('、', $infoTag['group_61']); //$str=""; foreach ($infoTag['group_61'] as $key => $val){ $str.= $val."、";} echo trim($str,'、');?></div>
                        </div>
                    <?php }?>
                    <?php if (!empty($infoTag['group_77'])){?>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">运营商：</div>
                            <div class="obj-tags flex"><?php echo implode('、', $infoTag['group_77']);?></div>
                        </div>
                    <?php }?>
                    <?php if (!empty($info['mall_property_company'])){?>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">物业公司：</div>
                            <div class="obj-tags flex"><?php echo $info['mall_property_company'];?></div>
                        </div>
                    <?php }?>
                    <?php if (!empty($info['weekday_hours'])){?>
                        <div class="layout need-wrapper-item">
                            <div class="obj-tag gray717">营业时间：</div>
                            <div class="obj-tags flex"><?php if(!empty($info['weekday_hours'])){?><?php echo $info['weekday_hours'];?><br><?php echo $info['weekend_hours'];?><?php }?></div>
                        </div>
                       <?php }?>

                    </div>
                </li>
            </ul>
        </div>
    </section>
    <?php }?>
    <?php if(!empty($info['mall_desc'])){?>
	<div class="obj-name font-size-18 margin-top-10 margin-bottom-10">商业体介绍<span class="font-size-12 gray717">&nbsp;/&nbsp;<?php echo $info['mall_name'];?></span></div>
	<section class="detail_section">
		<div class="detail_section_main detail_buss_area">
			<p class="font-size-14"><?php echo $info['mall_desc']?></p>
		</div>
	</section>
	<?php } ?>
    </div>
    <!-- shade -->
    <div class="shade hide"></div>
    </div>
    <?php __slot('passport','footer');?>
</article>
