
<!-- 对话列表 start -->
<article data-role="page" id="privateLetterSend" data-title="方橙" class="contain">
    <header data-role="header" data-theme="b" class="header">
        <a href="/details/brand/brand_id/<?php echo $brand_id;?>" data-role="button" data-shadow="false" data-ajax="false" class="nav-icon-back">返回</a>
        <h1>更多品牌信息</h1>

    </header>

    <div data-role="content" class="detail_content">
    <div class="detail_main need-list">
   
     
        <div class="need-list">
            <div class="obj-name font-size-18 margin-top-10 margin-bottom-10">品牌简介<span class="font-size-12 gray999">&nbsp;/&nbsp;<?php echo $info['brand_name'];?></span></div>
            <section class="detail_section">
                <div class="detail_section_main detail_buss_area">
                    <p class="font-size-14"><?php if (!empty(trim($info['brand_desc']))){ echo $info['brand_desc']; }else{ echo '暂无简介。'; }?></p>
                </div>
            </section>
        </div>
    </div>
    </div>
    <?php __slot('passport','footer');?>
</article>
