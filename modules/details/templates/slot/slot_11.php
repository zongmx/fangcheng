            
                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">对商业体感兴趣的网上人群<span>（年龄分布）</span></div>
                </div>
                <div class="popular detail_section_main">
                    <div id="categoryPlot" class="plot">
                        <script>
                                var container = $('#categoryPlot');
                                var svgWidth = container.width();
                                var svgHeight = container.height();
                                var pie = new d3pie( 'categoryPlot', {
                                    size: {
                                        pieOuterRadius: 75,
                                        pieInnerRadius: 42.5,
                                        canvasWidth: svgWidth,
                                        canvasHeight: svgHeight
                                    },
                                    data: {
                                        content: <?php echo urldecode($resultMsg);?>
                                    },
                                    mainLabel: {
                                        font: 'aral',
                                        fontSize: '12px',
                                        color: '#333'
                                    },
                                    labels: {
                                        inner: {
                                            format: {
                                                label: ''
                                            }
                                        },
                                        outer: {
                                            format: 'label'
                                        }
                                    },
                                    effects: {
                                        load: {
                                            effect: "none"
                                        },
                                        pullOutSegmentOnClick: {
                                            effect: "none"
                                        }
                                    },
                                    misc: {
                                        colors: {
                                            segments: [
                                                '#55C755', '#B8EAAE', '#F8A459', '#FFD49D', '#4BA2DE',
                                            ]
                                        }
                                    }
                                } );
						
                        </script>
                        
                    </div>
                </div>
<?php  if(strlen($resultMsg)<=4){?>  
<script>
$(".likepeople").hide();
</script> 
<?php }?>