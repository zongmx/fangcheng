<!-- <section class="detail_section margin-top-10"> -->
    <div class="detail_section_head layout layout-align-start-center">
        <div class="detail_section_tit font-size-14">人口数量</div>
    </div>
    <div class="popular detail_section_main detail_people_map">
        <?php if($num_result){?>
    	<div class="detail_people_map_title layout layout-align-start-center">
                        <div class="layout layout-align-start-center">
                            <span class="detail_people_map_icon"></span>
                            <span>半径1公里</span>
                        </div>
                        <div class="layout layout-align-start-center">
                            <span class="detail_people_map_icon detail_people_map_icon_two"></span>
                            <span>半径3公里</span>
                        </div>
                        <div class="layout layout-align-start-center">
                            <span class="detail_people_map_icon detail_people_map_icon_three"></span>
                            <span>半径5公里</span>
                        </div>
                    </div>
        <div id="column_num" class="popular-plot">
            <script>
                    var container = $('#column_num');
                    var svgWidth = container.width();
                    var svgHeight = container.height();
                    charBaseOnD3.createColumn( {
                        svgWidth: svgWidth,
                        svgHeight: svgHeight,
                        width: svgWidth-90,
                        height: svgHeight-30,
                        margin: {
                            top:30,
                            left: 60,
                            right: 30
                        },
                        container: '#column_num',
                        series: {__num},
                            
                        load: function( data ) {

                        }
                    } );
            </script>
       </div>
       <?php }?>
       <?php if($school_result){?>
       <div class="detail_people_map_title margin-top-10 layout layout-align-start-center">
                        <div class="layout layout-align-start-center">
                            <span>学校类型学校数(所)</span>
                        </div>
                    </div>
        <div id="column" class="popular-plot">
            <script>
                    var container = $('#column');
                    var svgWidth = container.width();
                    var svgHeight = container.height();
                    charBaseOnD3.createColumn( {
                        svgWidth: svgWidth,
                        svgHeight: svgHeight,
                        width: svgWidth-90,
                        height: svgHeight-30,
                        margin: {
                            top:30,
                            left: 60,
                            right: 30
                        },
                        container: '#column',
                        series: {__school},
                            
                        load: function( data ) {

                        }
                    } );
            </script>
        </div>
        <?php }?>
    </div>
<!-- </section> -->