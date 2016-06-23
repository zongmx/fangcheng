<div class="container form_main">
    <div class="row form_head">
        <div class="form_head_log">
            <h3>快速注册</h3>
        </div>
    </div>
    <div class="row form_content">
    	<!-- 第二部分 快速注册 start -->
<form id="businessRegStepTwo" action="/passport/checkBusinessBasic" method="post" enctype='multipart/form-data'>
    <input type="hidden" name='Doaction' value='businessProject'>
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
        <!-- 负责的业态 -->
        <div class="clearfix margin-top-20">
            <div class="clearfix pos">
                <div class=" add_change add_change_border area">
	    			<span class="custom_add_change">
	    				<span class="custom_add_name">您负责的业态(可多选)</span>
			    	</span>
                </div>
            </div>
            <!-- 业态测试数据 -->
            <input type="hidden" name='category_ids' value="4,5,6,9">
            <div class="custom_check">
                <ul class="clearfix">
                    <li _id="1019" _name="男装" class="nocheck">男装</li>
                    <li _id="1020" _name="女装">女装</li>
                    <li _id="1021" _name="快时尚" class="current">快时尚</li>
                    <li _id="1022" _name="运动装">运动装</li>
                    <li _id="1023" _name="内衣／家居服">内衣／家居服</li>
                    <li _id="1024" _name="童装">童装</li>
                    <li _id="1025" _name="男鞋">男鞋</li>
                    <li _id="1026" _name="女鞋">女鞋</li>
                    <li _id="1027" _name="箱包皮具">箱包皮具</li>
                    <li _id="1028" _name="运动装备">运动装备</li>
                    <li _id="1029" _name="眼镜店">眼镜店</li>
                    <li _id="1030" _name="珠宝首饰">珠宝首饰</li>
                    <li _id="1031" _name="钟表">钟表</li>
                    <li _id="1032" _name="家居用品">家居用品</li>
                    <li _id="1033" _name="买手店">买手店</li>
                    <li _id="1034" _name="宠物">宠物</li>
                    <li _id="1035" _name="数码电器">数码电器</li>
                </ul>
            </div>
        </div>
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
<div class="row clearfix form_foot">
    <div class="form_foot_nav">
        <div class="nav_log"><h3>方橙</h3></div>
        <div class="nav_foot">
            <ul class="clearfix">
                <li><a href="#">关于我们</a>|</li>
                <li><a href="#">联系我们</a>|</li>
                <li><a href="#">加入我们</a> </li>
            </ul>
        </div>
    </div>
</div>
</div>