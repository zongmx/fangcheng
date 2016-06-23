

    <div data-role="content" class="detail_content">
        <section class="detail_section margin-top-10">
                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">客流指数</div>
                </div>
                <div class="popular detail_section_main">
                <p class="liu_title">客流指数反映客流量的趋势变化</p>
                    <div id="line" class="plot">
                        <script>
                                var container = $('#line');
                                var svgWidth = container.width();
                                var svgHeight = container.height();
                                charBaseOnD3.createLine( {
                                    svgWidth: svgWidth,
                                    svgHeight: svgHeight,
                                    width: svgWidth - 40,
                                    height: svgHeight - 70,
                                    margin: {
                                        top: 20
                                    },
                                    container: '#line',
                                    load: function( data ) {
                                        console.log(12121);
                                    },
                                    series: [
                                        {"data": <?php echo urldecode($resultMsg);?>
                                        }
                                    ]
                                } );
                        </script>
                    </div>
                    
                </div>
            </section>
    </div>
<?php  if(strlen($resultMsg)<=4){?>  
<script>
$("#main_index_0").hide();
</script> 
<?php }?>