                <div class="detail_section_head layout layout-align-start-center">
                    <div class="detail_section_tit font-size-14">业态占比</div>
                    <div class="detail_section_tag detail_custome_sel_one custom-slider-box layout layout-align-end-center">
                        <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" class="custom-slider">
                                <select name="select-custom-16" id="select-custom-16" data-native-menu="false" onchange='changeType(this.value)'>
                                    <option value="size" <?php echo $type=='size'?'selected = "selected"':''; ?>>面积比</option>
                                    <option value="num" <?php echo $type=='num'?'selected = "selected"':''; ?>>数量比</option>                                    
                                </select>
                        </fieldset>
                    </div>
                </div>
                <div class="popular detail_section_main">
                    <div id="categoryPlot" class="plot">
                        <?php if($type=='num'){?>
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
                                        content: <?php echo urldecode($resultMsg['num']);?>
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
                                                <?php echo urldecode($color);?>
                                            ]
                                        }
                                    }
                                } )
						
                        </script>
                        <?php }else { ?>
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
                                        content: <?php echo urldecode($resultMsg['size']);?>
                                    },
                                    mainLabel: {
                                        font: 'arial',
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
                                                <?php echo urldecode($color);?>
                                            ]
                                        }
                                    }
                                } )
                            
                        </script>
                        <?php } ?>
                    </div>
                    
                </div>
                <?php if (!$count){?>
                <script type="text/javascript">
                $('.categoryzhanbi').hide();
                </script>
                
                <?php }?>