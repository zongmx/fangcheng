<?php if($count){ ?>
                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">客流指数</div>
                </div>
                <div class="popular detail_section_main">
                <p class="liu_title">客流指数反映网上搜索量的趋势变化</p>
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
                                } )
                        </script>
                    </div>
                    
                </div>

<?php }else{?>
<script type="text/javascript">
$("#main_index_1").hide();
</script>
<?php }?>