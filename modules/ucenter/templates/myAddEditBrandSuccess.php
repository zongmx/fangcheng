
<article data-role="page" id="registerTwo" data-title="方橙"
	class="contain register">
	<form id="userInfo" action="{actionUrl}" method="post">
		<input type="hidden" name='passport_brand_id'
			value="<?php echo $passport_brand_id;?>">
		<!-- 是否可以编辑身份和职位信息 -->
		<header data-role="header" data-theme="b" class="header">
			<a href="/ucenter/mybrand/<?php echo !empty($url)?'url/'.$url:'';?>"
				data-shadow="false"class="nav-icon-back ui-link ui-btn-left ui-btn ui-corner-all">拓展管理</a>
			<h1>品牌拓展项目</h1>
			<!--<a href="javascript:$('#btnSubmit').click();" data-shadow="false">保存</a>-->
		</header>
		<section class="detail_content" data-role="content" role="main">
		<div class="detail_main formwrapper">
		<div class="form-item">
                    <div class="form-input-wrapper layout layout-align-start-center ui-field-contain" style="border:none;">
                        <label class="text-label text-label-imgCode" style="color:#333">公司名称：</label>
                        <div class="custom-select-header flex">
                            <div class="custom-select-name"><?php echo $userinfo['passport_company'];?></div>
                        </div>
                    </div>
                     <div class="form-input-wrapper layout layout-align-start-center ui-field-contain" style="border:none;">
                        <label class="text-label text-label-imgCode" style="color:#333">职位：</label>
                        <div class="custom-select-header flex">
                            <div class="custom-select-name"><?php echo $userinfo['passport_job_title'];?></div>
                        </div>
                    </div>
                </div>
			<!--<p class="title margin-top-20 gray333">新增我的品牌</p>-->
			<div class="deletess">
				<div for="input" id="brandName" class="form-item"
					validate-item="brandName">
					<div validate-ok="brandName"
						class="form-input-wrapper layout layout-align-start-center ui-field-contain">
						<label class="text-label text-label-imgCode">品牌名称：</label> <a
							class="custom-select-header flex layout layout-align-start-center nameFilter"
							href="#other-brand" data-transition="slide">
							<div class="custom-select-name"><?php echo empty($brand_name)?'请选择您负责的品牌':$brand_name;?></div>
						</a> <i class="caret_right"></i> <input _name="brand_name"
							type="hidden" name="brand_name" validate-field="brandName"
							validate-type="required" value="{brand_name}" /> <input
							_name="brand_id" type="hidden" name="brand_id" value="{brand_id}" />
					</div>
					<div validate-msg="brandName" class="hide tip">请填写品牌名称</div>
				</div>
				<div for="a" id="category" class="form-item"
					validate-item="category">
					<div validate-ok="category"
						class="form-input-wrapper layout layout-align-start-center ui-field-contain">
						<label class="text-label text-label-imgCode">业态：</label> <a
							class="custom-select-header flex layout layout-align-start-center category"
							href="#select-custom-format" data-transition="slide">
							<div class="custom-select-name"><?php echo empty($category_ids_str)?'选择该品牌所在业态':htmlspecialchars_decode($category_ids_str['c_all']);?></div>

						</a> <i class="caret_right"></i> <input _name="category_ids"
							type="hidden" name="category_ids"
							value="<?php echo $category_ids;?>"> <input type="hidden"
							_name="category_ids_other" name="category_ids_other"
							value="<?php echo $category_ids_other;?>"> <input
							id="detai_category_bind" validate-field="category"
							validate-type="required" name="detai_category_bind" type="hidden" value="<?php echo  empty($category_ids_str['cone'])&& empty($category_ids_str['ctwo'])?"选择该品牌所在业态":$category_ids_str['cone'].$category_ids_str['ctwo'];?>">
					</div>
					<div validate-msg="category" class="hide tip">请选择品牌所在业态</div>
				</div>
				<div for="a" class="form-item" validate-item="area">
					<div validate-ok="area"
						class="form-input-wrapper layout layout-align-start-center ui-field-contain">
						<label class="text-label text-label-imgCode">*负责区域：</label> <a
							class="custom-select-header layout layout-align-start-center flex city"
							href="#select-custom-city" data-transition="slide">
							<div class="custom-select-name nowrap"><?php if(empty($area)){ ?>选择您负责的区域<?php }else{ echo $area;}?></div>
						</a> <i class="caret_right"></i> <input _name="area"
							validate-field="area" validate-type="required" type="hidden"
							name="area_ids" value="{area_ids}">
					</div>
					<div validate-msg="area" class="hide tip">请填写您负责的区域信息</div>
				</div>
				<div class="form-item" validate-item="type">
					<div class="layout form-item-checkbox form-item-gender">
						<div
							class="form-input-wrapper layout layout-align-start-center ui-field-contain flex <?php echo (empty($passport_brand_style)||$passport_brand_style==1)?'text-ok':''; ?>">
							<i class="check_bg"></i>
							<div class="check_tit flex">直营</div>
						</div>
						<div
							class="form-input-wrapper layout layout-align-start-center ui-field-contain flex <?php echo $passport_brand_style==2?"text-ok":'';?>">
							<i class="check_bg"></i>
							<div class="check_tit flex">加盟</div>
						</div>
						<div
							class="form-input-wrapper layout layout-align-start-center ui-field-contain flex <?php echo $passport_brand_style==3?"text-ok":'';?>">
							<i class="check_bg"></i>
							<div class="check_tit flex">代理</div>
						</div>
					</div>
					<input validate-field="type" validate-type="checked" type="hidden"
						value="0" name="passport_brand_style">
					<div validate-msg="type" class="hide tip">请选择您的经营方式</div>
				</div>
			</div>
			<div data-role="footer" class="btn_box form-item" style="height:60px;opacity:1 !important;background:#fff;position: fixed;bottom:0;left:0;width:100%;border-top:1px solid #ddd;">
            	<?php if ($q=='bedit'){?>
            	<div class="layout layout-align-start-center margin-top-10" style="padding:0 10px">
            		<div class="btn_box flex" onclick="showDialog('#delete-dialog')">
            			<input type="button" data-role="none" class="btn btn_default"
            				value="删除该项目">
            		</div>
            		<div class="margin-left-10 flex btn_box" >
            			<input type="button" data-toggle="modal"
            				custom-dialog="#detail_save" data-role="none" class="btn"
            				value="保存修改" id="btnSubmit">
            		</div>
            	</div>
            	<?php }else{?>
        		 <!--从新增负责的项目点进去进入的页面按钮为‘保存新增项目’-->
                <div class="layout layout-align-start-center margin-top-10">
                	<div class="flex btn_box">
                		<input type="button" custom-dialog="#detail_save" data-role="none"
                			class="btn" value="保存新增项目" id="btnSubmit">
                	</div>
                </div>
                <?php }?>
            </div>
		</div>
		</section>
	</form>
        <!--<?php __slot('passport','footer');?>-->
    </article>
    <div id="delete-dialog" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal dialog_qrcode" style="height: 2065px;">
    <div class="modal-backdrop fade" style="height: 2065px;"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" class="close ui-btn ui-shadow ui-corner-all"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 id="myModalLabel" class="modal-title">确认删除</h4>
            </div>
            <div class="modal-body">
                <div class="qrcode_box">
                    <p id="sub-dialog_content" class="font-size-14">删除的项目将无法找回，您确认删除吗？</p>
                    <div class="btn_box flex layout layout-align-center-center margin-top-20">
                         <a href="#" class="btn btn_default layout layout-align-center-center ui-link flex close">
                             <span class="font-size-15">取消</span>
                         </a>
                         <a href="/ucenter/mypro/bdel/id/{passport_brand_id}" class="btn btn_orange layout layout-align-center-center ui-link margin-left-10 flex">
                             <span class="font-size-15">确认删除</span>
                         </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="/js/ucenter/brandEdit.js"></script>
