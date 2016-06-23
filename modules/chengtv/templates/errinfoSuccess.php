<section data-role="page" id="main_index_1" data-title="方橙-最专业的招商选址大数据平台" class="contain">
    <header data-role="header" data-theme="b" data-position="fixed" class="header">
        <h1>报名加入{name}</h1>
    </header>
    <div data-role="content" class="detail_content">
        <div class="detail_main">
            <section class="detail_section detail_section_border">
                <div class="detail_section_main detail_buss_area">
                    <div class="word context" >
                        <p>感谢您对{name}的关注，请您发送私信给方小橙，提交报名申请。<br><br> 方小橙将尽快与您联系！</p>
                    </div>
                </div>
            </section>
            <div class="btn_box margin-top-20">
                <a href="/letter/send/receiver_id/1/from/{apply_cat}/letterurl/<?php echo \Frame\Util\UString::base64_encode($url);?>" class="btn add-need-btn" data-ajax='false'><span class="layout layout-align-center-center">发送私信</span></a>
            </div>
        </div>
        <!-- shade -->
        <div class="shade hide"></div>
        </div>
    </div>
    <?php __slot('passport','footer');?>
</section>