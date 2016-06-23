<div class="container form_main">
    <div class="row form_head">
        <div class="form_head_log">
            <h3>快速注册</h3>
        </div>
    </div>
    <div class="row form_content">
    	<!-- 第二部分 快速注册 start -->
<form id="businessRegStepTwo" action="/passport/checkBusinessBasic" method="post" >
<input type="hidden" name="Doaction" value="thirdpartyReg">
	<div class="reg_set2">
    <div class="info clearfix">
        <h4 class="form_title">基本信息</h4>
        <!--  -->
 		       <div class="margin-top-20 clearfix city_borth1">
            <div class="form_left">
                <div class="item_bg first_name">
                    <input type="text" maxlength="10" onkeyup="normal_word(this)" name="first_name" value="" placeholder="姓" class="form-control text">
                </div>
                <div class="item_bg second_name">
                    <input type="text" maxlength="10" onkeyup="normal_word(this)" name="second_name" value="" placeholder="名" class="form-control text"></div>
                <div class="tip usernameTip hide"></div>
            </div>
            <div class="form_right customSelect city_borth">
                <div class="custom_drop text">
                    <span class="city_name custom_drop_name">所在城市</span>
                    <span class="caret custom_drop_incon"></span>
                    <!-- 城市测试数据 -->
					<input type="hidden" name='area_id' value="100">
                    </div>
                <div class="tip cityTip hide"></div>
            </div>
        </div>

        <h4 class="form_title margin-top-20">职位信息</h4>
        <div class="clearfix margin-top-20">
            <div class="form_left ">
   				<div class="company">
    				<input type="text" maxlength="50" name="passport_company" value="您所在的公司名称 测试数据" placeholder="您所在的公司名称" class="form-control text">
				</div>
    			<div class="tip hide"></div>
            </div>
            <!-- 职位信息 测试数据-->
            	<input type="hidden" name="passport_job_title" value="项目总经理  测试数据" >
    					<div id="select_job" class="form_right customSelect job_pos">
                            <script>
                                $('#select_job').selectPlugInit({
                                    defaultDisplay:'您的职位',
                                    headIcon:'company',
                                    data:[{
                                        name:'项目总经理',
                                        value:'1'
                                    },{
                                        name:'项目副总经理',
                                        value:'2'
                                    },{
                                        name:'招商总监',
                                        value:'3'
                                    },{
                                        name:'招商高级经理',
                                        value:'4'
                                    },{
                                        name:'招商经理/副经理',
                                        value:'5'
                                    },{
                                        name:'招商主管/主任',
                                        value:'6'
                                    },{
                                        name:'招商专员',
                                        value:'7'
                                    },{
                                        name:'其他',
                                        value:'8'
                                    }],
                                    clickItem:function(item) {
                                        console.log(item)
                                    }
                                });
                            </script>
    					</div>
            
        </div>
        <!--  -->
        <!-- 负责的区域 -->

        <!--  -->
        <!-- 负责的业态 -->

        <!-- 负责的业态 -->
        <div class="clearfix">
        
            <div class="form_left clearfix margin-top-20">
                <div class="file_up">
                    <div id="filePicker" class="file_btn webuploader-container">
                        <div class="webuploader-pick">上传名片</div>
                    </div>
                </div>
            </div>
            <div class="form_right margin-top-20">
                <span class='file_up_tip'>上传名片照片或扫描件（用于认证，请上传清晰图片，大小不超过2M）</span>
            </div>
            <!-- 图片路径 测试数据 -->
            <input type="hidden" name='passport_business_card' value="/aaa/bbb/ccc.jpg">
            <div class="tip tipSuccess hide"><span class='tipMsg'>上传成功</span></div>
        </div>
        <div class="form-group no-margin margin-top-20">
            <button type="submit" class="btn btn-default btn-next btn-reg btn-orange">下一步</button>
        </div>
    </div>
</div>

<!-- 第二部分 快速注册 end -->
<!-- 第三部分 快速注册 start -->
    		<div class="reg_set3">
    			<div class="info clearfix">
    			<!-- 品牌 start -->
				    				<h4 class="form_title">您负责的品牌信息</h4>
    				<?php if ($businessTypeSelect){ __slot('businessTypeSelect');};?>
    				<div class="clearfix">
    					<div class="form_left margin-top-20">
    						<div class="company">
    							<input type="text" maxlength="50" name="brand_name[]" value="品牌名称 测试数据" placeholder="品牌名称" class="form-control text">
    						<input type="hidden" name="brand_id[]" value='123'>
    						<input type="hidden" name="brand_name[]" value="品牌测试数据二">
    						<input type="hidden" name="brand_id[]" value='456'>
    						</div>
    						<div class="tip hide"></div>
    					</div>
    					<div id="selectPlug" class="form_right customSelect margin-top-20">
                            <script>
                                $('#selectPlug').selectPlugInit({
                                    defaultDisplay:'品牌所在业态',
                                    headIcon:'company',
                                    data:[{
                                        name:'餐饮',
                                        tip:'（含美食广场、食品茶酒等）',
                                        value:'101'
                                    },{
                                        name:'购物',
                                        tip:'（服装、珠宝、数码电器等）',
                                        value:'102'
                                    },{
                                        name:'美妆丽人',
                                        tip:'（饰品、瑜伽舞蹈等）',
                                        value:'103'
                                    },{
                                        name:'亲子儿童',
                                        tip:'（亲子购物、幼儿教育等）',
                                        value:'104'
                                    },{
                                        name:'生活服务',
                                        tip:'（超市、运动健身等）',
                                        value:'105'
                                    },{
                                        name:'教育培训',
                                        value:'106'
                                    },{
                                        name:'生活方式',
                                        tip:'（书店、花店、体验馆等）',
                                        value:'107'
                                    },{
                                        name:'休闲娱乐',
                                        value:'108'
                                    },{
                                        name:'其它',
                                        value:'109'
                                    }],
                                    clickItem:function(item) {
                                        if(item.value == '109') {
                                            category.show();
                                            category.selectAll();
                                        } else {
                                            category.hide();
                                        }
                                    }
                                });
                            </script>
	    					<!--<div class="custom_drop text company">-->
		    					<!--<span class="city_name custom_drop_name">品牌所在业态</span>-->
		    					<!--<span class="caret custom_drop_incon careted"></span>-->
	    					<!--</div>-->
    						<!--<div class="tip cityTip hide"></div>-->
    						<!--&lt;!&ndash; 自定义下拉框 start &ndash;&gt;-->
		    				<!--<div class="selectPlug hide">-->
		    					<!--<ul class="clearfix">-->
			    					<!--<li _id="101" _name="餐饮"><span class="select_tit">餐饮</span><span class="tipText">（含美食广场、食品茶酒等）</span></li>-->
			    					<!--<li _id="102" _name="购物"><span class="select_tit">购物</span><span class="tipText">（服装、珠宝、数码电器等）</span></li>-->
			    					<!--<li _id="103" _name="美妆丽人"><span class="select_tit">美妆丽人</span><span class="tipText">（饰品、瑜伽舞蹈等）</span></li>-->
			    					<!--<li _id="104" _name="亲子儿童"><span class="select_tit">亲子儿童</span><span class="tipText">（亲子购物、幼儿教育等）</span></li>-->
			    					<!--<li _id="105" _name="生活服务"><span class="select_tit">生活服务</span><span class="tipText">（超市、运动健身等）</span></li>-->
			    					<!--<li _id="106" _name="教育培训"><span class="select_tit">教育培训</span><span class="tipText"></span></li>-->
			    					<!--<li _id="107" _name="生活方式"><span class="select_tit">生活方式</span><span class="tipText">（书店、花店、体验馆等）</span></li>-->
			    					<!--<li _id="108" _name="休闲娱乐"><span class="select_tit">休闲娱乐</span><span class="tipText"></span></li>-->
			    					<!--<li _id="109" _name="其它"><span class="select_tit">其它</span><span class="tipText"></span></li>-->
		    					<!--</ul>-->
		    				<!--</div>-->
		    				<!-- 自定义下拉框 end -->
    					</div>
    				</div>
    				<!-- 品牌业态测试数据     生成数据的时候要注意规则   brand_category_id_one 的 value要注意规则  通过判断 brand_name[] 的长度来 添加相应的后缀 
    				例如有连个brand_name 那么数据生成为-->
    				<input type="hidden" name="brand_category_ids[]" value="2,5,9,11,56">  	
    				<input type="hidden" name="brand_category_ids[]" value="1001,1002,1003">  			
<!--     				<input type="hidden" name="brand_category_id_one_1[]" value="2"> -->
<!--     				<input type="hidden" name="brand_category_ids_1[]" value="2,5,9,11,56"> -->
    				<!-- 细分业态  start -->
    				<div id="partition_category" class="clear">
    					<h4 class="form_title margin-top-20 margin-bottom-20">细分业态(可多选)</h4>
                        <script>
                            var category = $('#partition_category').checkPlugInit({
                                single:true,
                                data:[{
                                    name:'男装',
                                    value:'1019'
                                },{
                                    name:'女装',
                                    value:'1020'
                                },{
                                    name:'快时尚',
                                    value:'1021'
                                },{
                                    name:'运动装',
                                    value:'1022'
                                },{
                                    name:'内衣／家居服',
                                    value:'1023'
                                },{
                                    name:'童装',
                                    value:'1024'
                                },{
                                    name:'男鞋',
                                    value:'1025'
                                },{
                                    name:'女鞋',
                                    value:'1026'
                                },{
                                    name:'箱包皮具',
                                    value:'1027'
                                },{
                                    name:'运动装备',
                                    value:'1028'
                                },{
                                    name:'眼镜店',
                                    value:'1029'
                                },{
                                    name:'珠宝首饰',
                                    value:'1030'
                                },{
                                    name:'钟表',
                                    value:'1031'
                                },{
                                    name:'家居用品',
                                    value:'1032'
                                },{
                                    name:'买手店',
                                    value:'1033'
                                },{
                                    name:'宠物',
                                    value:'1034'
                                },{
                                    name:'数码电器',
                                    value:'1035'
                                }],
                                clickItem:function(d) {
                                    console.log(this.val())
                                }
                            });
                            category.hide()
                        </script>
    					<!--<div class="custom_check">-->
    						<!--<ul class="clearfix">-->
	    						<!--<li _id="1019" _name="男装" class="nocheck">男装</li>-->
	    						<!--<li _id="1020" _name="女装">女装</li>-->
	    						<!--<li _id="1021" _name="快时尚" class="current">快时尚</li>-->
	    						<!--<li _id="1022" _name="运动装">运动装</li>-->
	    						<!--<li _id="1023" _name="内衣／家居服">内衣／家居服</li>-->
	    						<!--<li _id="1024" _name="童装">童装</li>-->
	    						<!--<li _id="1025" _name="男鞋">男鞋</li>-->
	    						<!--<li _id="1026" _name="女鞋">女鞋</li>-->
	    						<!--<li _id="1027" _name="箱包皮具">箱包皮具</li>-->
	    						<!--<li _id="1028" _name="运动装备">运动装备</li>-->
	    						<!--<li _id="1029" _name="眼镜店">眼镜店</li>-->
	    						<!--<li _id="1030" _name="珠宝首饰">珠宝首饰</li>-->
	    						<!--<li _id="1031" _name="钟表">钟表</li>-->
	    						<!--<li _id="1032" _name="家居用品">家居用品</li>-->
	    						<!--<li _id="1033" _name="买手店">买手店</li>-->
	    						<!--<li _id="1034" _name="宠物">宠物</li>-->
	    						<!--<li _id="1035" _name="数码电器">数码电器</li>-->
    						<!--</ul>-->
    					<!--</div>-->
    				</div>
    				<!-- 细分业态 end -->
				<!-- 品牌end  -->
				<!-- 商业体 start -->
				        <div>
            <div class="clearfix">
                <div class="form_left "><h4 class="form_title">您负责的商业体信息</h4></div>
            </div>
            <?php if ($businessTypeSelect){ __slot('businessTypeSelect');};?>
            <div class="clearfix bus_address margin-top-20">
                <div class="form_left ">
                    <div class="company">
                        <input type="text" maxlength="50" name="mall_name[]" value="商业体名称 测试数据" placeholder="商业体名称" class="form-control text">
                    </div>
                    <div class="tip hide"></div>
                </div>
                <div class="form_right customSelect city ">
                    <div class="custom_drop text ">
                        <span class="city_name custom_drop_name">商业体所在城市</span>
                        <span class="caret custom_drop_incon"></span>
                        <!-- 城市测试数据  -->
                        <input type="hidden" name="bussiness_area_id[]" value="111">
                        <input type="hidden" name="mall_id[]" value="111">
                    </div>
                    <div class="tip cityTip hide"></div>
                </div>
            </div>
        </div>
        <div class="margin-top-20">
            <div class="clearfix">
                <div class="form_left ">
                    <h4 class="form_title">您负责的商业体信息</h4>
                    <i class="del_item">删除</i>
                </div>
            </div>
            <?php if ($businessTypeSelect){ __slot('businessTypeSelect');};?>
            <div class="clearfix bus_address margin-top-20">
                <div class="form_left ">
                    <div class="company">
                        <input type="text" maxlength="50" name="mall_name[]" value="商业体名称  测试数据" placeholder="商业体名称" class="form-control text">
                    </div>
                    <div class="tip hide"></div>
                </div>
                <div class="form_right customSelect city ">
                    <div class="custom_drop text ">
                        <span class="city_name custom_drop_name">商业体所在城市</span>
                        <span class="caret custom_drop_incon"></span>
                         <!-- 城市测试数据  -->
                        <input type="hidden" name="bussiness_area_id[]" value="111">
                        <input type="hidden" name="mall_id[]" value="111">
                    </div>
                    <div class="tip cityTip hide"></div>
                </div>
            </div>
        </div>

        <script>
            $(function(){
                $(".city_borth1 .city_borth").click(function(){
                    $(".city_borth1").city({"city_name":'city',"city_id":'city_id',"plugName":"city_address"});//city_name:当前调用的input城市的名称，city_id:当前调用的input的城市的id
                });
                $(".bus_address .customSelect").click(function(){
                    $(".bus_address").city({"city_name":'city',"city_id":'city_id',"plugName":"city_addrs"});//city_name:当前调用的input城市的名称，city_id:当前调用的input的城市的id
                });
            });
        </script>
				<!-- 商业体 end -->
    				<div class="clearfix add_change margin-top-20">
    					<span class="custom_add_change">
	    					<span class="custom_add_icon custom_add_icon_bg">+</span>
	    					<span class="custom_add_name">继续添加</span>
	    				</span>
	    				<div class="add_change_for margin-top-36">方橙将为您负责的每个品牌寻找适合的商业体，其他用户也可以在品牌页面上找到您</div>
    				</div>
    				<div class="form-group no-margin margin-top-20">
	                    <button type="submit" class="btn btn-default btn-next btn-reg btn-orange">下一步</button>
	                </div>
    			</div>
    		</div>
<!-- 第三部分 end -->
    	</form>
    </div>
<?php __slot("regFoot");?>
</div>