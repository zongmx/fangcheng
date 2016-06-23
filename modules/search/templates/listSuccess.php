<article data-role="page" id="privateLetterSend" data-title="方橙-最专业的招商选址大数据平台" class="contain">
    <form id="search" class="form-horizontal">
        <div class="main">
			<div data-scroll-down data-scroll-top="100px">
				<header data-role="header" data-theme="b" class="header">
					<input id="area_id" type="hidden" name="area_id" value="{areaId}">
					<a href="/" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse"
					   class="nav-icon-home" data-ajax="false">返回</a>

					<h1>所在城市：<span id="now-city">{areaName}</span></h1>
					<a id="changeCity" href="#select-citySearch" data-shadow="false" data-transition="slide"
					   class="ui-btn-right" data-role="button" role="button">切换城市</a>
				</header>
				<div class="detail_search_top">
					<div class="layout">
						<input id="searchtype" type="hidden" name="searchtype" value="{searchtype}" class="search-type"/>

						<div class="form-label dropdown-search-toggle">
							<span class="dropdown-search-toggle-name">商业体</span>
							<i class="caret"></i>
						</div>
						
						<div class="flex">
							<div class="width100 form-c">
								<div class="layout layout-align-start-center flex search-box">
									<div class="flex"><input id="searchName" type="text" name="w" value="" placeholder="{keyword}"/></div>
									<div class="btn_box"><input id="search_form_btn" type="button" class="btn" data-role="none" value="搜索" onclick="submitform()"/></div>
								</div>
							</div>
						</div>
						
					</div>
					<div class="dropdown-search hide">
						<ul>
							<li data-id="2" data-name="商业体" class="font-size-14">商业体</li>
							<li data-id="1" data-name="品牌">品牌</li>
						</ul>
					</div>
				</div>
			</div>
            <!-- 搜索初始业 -->
            <section data-scroll-content data-role="content" class="detail_content detail_search">
                
                 
                <div class="nav-bar hide" style="display: none;">
                    <ul class="nav layout">
                        <li class="dropdown-toggle formats flex" data-nav="formats" data-id="2"><span class="nav-tit">全部业态</span>
                            <i class="caret"></i></li>
                    </ul>
                </div>
                <input type="hidden" class="text-input" value=""/>
              
                <div id="category" class="dropdown-wrapper hide category">
                    <div class="dropdown-module">
                        <div class="scroller-wrapper cl">
                            <div class="dropdown-scroller two-scroller" id="dropdown_scroller">
                                <ul>
                                    <li data-id="2" data-nav="formats" class="formats-wrapper list-wrapper active">
                                        <ul class="dropdown-list">
                                            <ul class="dropdown-list category">
                                                <li data-formats-id="1000000" data-formats-name="全部业态" class="active">
                                                    全部业态
                                                </li>
                                                <li data-formats-id="10000" data-formats-name="餐饮">餐饮</li>
                                                <li data-formats-id="20000" data-formats-name="购物">购物</li>
                                                <li data-formats-id="30000" data-formats-name="亲子儿童">亲子儿童</li>
                                                <li data-formats-id="40000" data-formats-name="教育培训">教育培训</li>
                                                <li data-formats-id="50000" data-formats-name="休闲娱乐">休闲娱乐</li>
                                                <li data-formats-id="60000" data-formats-name="生活服务">生活服务</li>
                                                <li data-formats-id="70000" data-formats-name="美妆丽人">美妆丽人</li>
                                                <li data-formats-id="80000" data-formats-name="酒店公寓">酒店公寓</li>
                                                <li data-formats-id="90000" data-formats-name="百货超市">百货超市</li>
                                                <li data-formats-id="100000" data-formats-name="其他">其他</li>
                                            </ul>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown-sub-scroller two-scroller" id="dropdown_sub_scroller">
                                <ul>
                                    <li class="list-wrapper formats-wrapper" data-nav="formats">
                                        <ul class="dropdown-list subCategory">
                                            <li class="all" data-formats-id="1" data-formats-name="全部来源"><i
                                                    class="check_bg"></i>全部来源
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                $(function(){
                var id = $("input[name='searchtype']").val();
                if(id == 2){
                	$("#mall").removeClass("hide");
                }else{
                	$("#brand").removeClass("hide");
                    }
                });
                </script>
                <div class="detail_content hide" id="mall">
                    <div class="search-nodata">
                        <p>方橙已收录北京、上海、南京、广州、深圳</p>
                        <p>商业体详情，其他城市将陆续开放</p>
                    </div>
                </div>
                
                <div class="detail_content hide" id="brand">
                    <div class="search-nodata">
                        <p>方橙已收录各品牌在北京、上海、南京、广州、深圳</p>
                        <p>的店铺的统计，其他城市将陆续开放</p>
                    </div>
                </div>
                
                <script src="/js/need-list-search.js"></script>
                <!-- 搜索历史记录 -->
                <div class="search-history hide">
                    <h4>最近搜索</h4>

                    <div class="history-list">
                        <ul>
                            <li>
                                <div><a href="#">新世界</a></div>
                            </li>
                            <li>
                                <div><a href="#">朝阳</a></div>
                            </li>
                        </ul>
                    </div>
                    <h4 class="text-center"><span class="clear-his">清除商业体搜索历史</span></h4>
                </div>

                <!-- 搜索推荐 -->
                <div class="detail_content detail_search margin-top-20">
					<section class="detail_section">
						<div data-scroll data-scroll-datarender class="hide search-item" id="data_info">
						</div>
                    </section>
                </div>
            </section>
        </div>
    </form>
</article>


<script>
    $(document).ready(function () {
		$('#searchName').on('input',function() {
			commonUtilInstance.search({
                type: $('#searchtype').val(),
                name: $('#searchName').val(),
                area: $('#area_id').val()
            }, $(this), $('.form-c'), function (d, input) {
                input.val(d.name);
                submitform();
            });
		});
    });

   
    //预加载搜索
    $(function () {
        var word = $("#searchName").val();

            var type = $(".search-type").val();
            var typename = $(".dropdown-search li[data-id=" + type + "]").attr('data-name');
            $(".dropdown-search-toggle-name").html(typename);
            //submitform();

    });
    //预加载搜索结束
    function submitform() {
		commonUtilInstance.clearScrollPage();
    	$("#brand").addClass("hide");
    	$("#mall").addClass("hide");
    	$("#data_info").removeClass("hide");
        $.ajax({
            type: "POST",
            url: '{actionUrl}',
            data: $('#search').serialize(),
            success: function (data) {
                $("#data_info").html(data);
            }
        });
    }

    $('#searchName').on('keydown', function (e) {
        if (e.which === 13 || e.keyCode === 13) {
            $('.custom-select-search').addClass('hide');
            submitform();
            e.preventDefault();
        }
    });

</script>