                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">设施统计<span>（半径3公里）</span></div>
                </div>
                <div class="detail_section_main detail_buss_info">
                    <div class="detail_buss_info_table">
                    <!-- begin facility as k to v -->
                        <div class="detail_buss_info_tr layout">
                            <div class="detail_buss_info_lable">{k}</div>
                            <div class="detail_buss_info_msg flex">{v['list']}等{v['num']}个</div>
                        </div>
                    <!-- end facility -->   
                    </div>
                </div>
                
                <div class="text-center mb_page layout">
                    <div class="mb_page_left flex layout layout-align-center-center">
                        <a {fdata_page['prev_page_url']} class="{fdata_page['prev_class']}" id="{fdata_page['prev_id']}" ><span class="caret_left"></span></a>
                    </div>
                    <div class="flex layout layout-align-center-center">
                        <a {fdata_page['next_page_url']} class="{fdata_page['next_class']}" id="{fdata_page['next_id']}" ><span class="caret_right"></span></a>
                    </div>
                </div>
