  <section id="page" class="detail_section margin-top-10">
                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">流行指数热度区域<span>城市｜省份</span></div>
                </div>
                <div class="detail_survey_data detail_section_main">
                    <div class="detail_survey_list_head layout">
                        <div class="layout layout-align-start-center detail_survey_list_tr flex">
                            <div class="width33">城市</div>
                            <div class="width33">热度</div>
                        </div>
                    </div>
                    <div page="0" class="detail_survey_list">
                        <!-- begin prov_real as k to v -->
                        <div class="layout detail_survey_list_tr">
                            <div class="layout layout-align-start-center width33"><span class="nowrap">{k}</span></div>
                            <div class="layout layout-align-start-center width33">
                                <div class="custom-progress">
                                    <div class="custom-progress-bar" style="width: {v}%"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end prov_real -->
                        
                         <!-- begin city_real as k to v -->
                        <div class="layout detail_survey_list_tr">
                            <div class="layout layout-align-start-center width33"><span class="nowrap">{k}</span></div>
                            <div class="layout layout-align-start-center width33">
                                <div class="custom-progress">
                                    <div class="custom-progress-bar" style="width: {v}%"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end city_real -->
                    </div>
                
            </section>