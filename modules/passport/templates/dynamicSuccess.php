<?php if($head) {?>
<article data-role="page" id="privateLetterList" data-title="方橙-最专业的招商选址大数据平台" class="contain gray_bg">
    <header data-scroll-down data-scroll-top="100px" data-role="header" data-theme="b" class="header">
        <a href="/letter/index" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back">消息</a>
        <h1>动态</h1>
    </header>
    <div data-role="content" class="detail_content">
        <section class="detail_section detail_section_dongtai">
            <div class="detail_section_main">
                <div class="detail_index_message">
                    <ul  data-scroll data-scroll-datarender class="dong_items">
<?php }?>
<!-- begin pageList as k to v -->
<?php if(empty($v['passportOwnList'])) {?>
                        <li>
                            <a href="/ucenter/index/passport_id/{v['passportDoId']}/">
                                <div class="layout layout-align-space-between-start">
                                    <div class="dongtai_item_left">
                                        <p>{v['passportName']}<span class="{v['vip']}"></span> {v['do']}</p>
                                    </div>
                                    <div class="dongtai_item_right layout layout-align-end-center">
                                        <div class="face24"><img src="{v['passportDoPicture']}"/></div>
                                    </div>
                                </div>
                                <div class="layout layout-align-space-between-end">
                                    <div class="dongtai_item_left">
                                        
                                    </div>
                                    <div class="dongtai_item_right">
                                        <div class="time">{v['day']}</div>
                                    </div>
                                </div>
                            </a>
                        </li>


<?php } else {?>
                        <li>
                            <a href="/ucenter/index/passport_id/{v['passportDoId']}/">
                                <div class="layout layout-align-space-between-start">
                                    <div class="dongtai_item_left flex">
                                        <h3>{v['passportOwnList']}</h3>
                                    </div>
                                    <div class="dongtai_item_right layout layout-align-end-center">
                                        <div class="face24"><img src="{v['passportDoPicture']}"/></div>
                                    </div>
                                </div>
                                <div class="layout layout-align-space-between-end">
                                    <div class="dongtai_item_left flex">
                                        <p>{v['passportName']}<span class="{v['vip']}"></span>  {v['do']}</p>
                                    </div>
                                    <div class="dongtai_item_right">
                                        <div class="time">{v['day']}</div>
                                    </div>
                                </div>
                            </a>
                        </li>
<?php } ?>
<!-- end pageList -->

<li data-scroll-url="{nextUrl}" class="hide"></li>
<?php if($head) {?>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</article>
<?php }?>