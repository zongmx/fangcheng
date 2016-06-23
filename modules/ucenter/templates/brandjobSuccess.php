
    <article data-role="page" id="registerTwo" data-title="方橙" class="contain register">
		<form id="userInfo" action="/ucenter/dobrandjob" method="post">
			<input type="hidden" name='passport_brand_ids' value="<?php echo $passport_brand_ids;?>">
			<input type="hidden" name='passport_brand_ids_del' value="">
			<input type="hidden" name='passport_brand_ids_update' value="<?php echo $passport_brand_ids;?>">
				<!-- 是否可以编辑身份和职位信息 -->
			<input id="identifyEditable" value="1" type="hidden"/>
			<input id="passport_brand_ids_del" value="" type="hidden"/>
        <header data-role="header" data-theme="b" class="header">
            <a href="/ucenter/index/<?php echo !empty($url)?'url/'.$url:'';?>" data-shadow="false">取消</a>
            <h1>编辑职位与项目信息</h1>
            <a href="javascript:$('#btnSubmit').click();" data-shadow="false">保存</a>
        </header>
        <scetion class="detail_content" data-role="content" role="main">
            <div class="detail_main formwrapper">
                <div class="form-item">
                    <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label text-label-imgCode">您的身份：</label>
                        <div class="custom-select-header flex">
                            <div class="custom-select-name"><?php echo $userrank;?></div>
                        </div>
                    </div>
                </div>
                <div class="form-item">
                    <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label text-label-imgCode">公司名：</label>
                        <div class="custom-select-header flex">
                            <div class="custom-select-name"><?php echo $passportInfo['passport_company'];?></div>
                        </div>
                    </div>
                </div>
                <div class="zhushi">
                    <p class="font-size-12"> “您的身份”、“公司名”为认证信息，编辑后需要重新认证。编辑后两天内将暂时无法再次编辑。</p>
                </div>
                <?php if ($isupdate == 1){?>
                    <div class="form-item">
                        <div class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
                            <div class="custom-select-header flex layou layout-align-center">
                                <a id="identify" class="custom-select-header ui-link flex layou layout-align-center" href="/ucenter/editjobandcompany" data-role="none">
                                    <div class="orange font-size-16 text-center">编辑认证信息</div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php }else {?>
                    <!-- 不可以编辑 需要加样式的地方 -->
                    <div class="form-item">
                        <div class="form-input-wrapper layout layout-align-start-center text-disable">
                            <div class="custom-select-header flex layou layout-align-center">
                                <a id="identify" class="custom-select-header ui-link flex layou layout-align-center" data-role="none">
                                    <div class="grayfff font-size-16 text-center">编辑认证信息</div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php }?>
                <p class="title gray333">职位信息<p/>
                <div for="a" id="jobField" class="form-item" validate-item="jobField">
                    <div validate-ok="jobField" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
                        <label class="text-label text-label-imgCode">*职位：</label>
                        <a class="custom-select-header flex layout layout-align-start-center" href="#select-custom-job" data-transition="slide">
                                <div class="custom-select-name"><?php echo empty($passportInfo['passport_job_title'])?'选择您的职位头衔':$passportInfo['passport_job_title'];?></div>
								
                            </a>
                        <i class="caret_right"></i>
                        <input validate-field="jobField" validate-type="required" type="hidden" name="passport_job_title" value="<?php echo $passportInfo['passport_job_title'];?>"/>
                    </div>
                    <div validate-msg="jobField" class="hide tip gray333">
                        请填写职位信息
                    </div>
                </div>
                <p class="title margin-top-20 gray333">负责的品牌信息<p/>
                <?php foreach ($brandInfo as $key => $val){?>
                <div class="deletess">
                    <div class="text-right del_item margin-top-20">
                        删除该项目
                        <input type="hidden" name='passport_brand_id[]' value="<?php echo $val['passport_brand_id']?>">
                    </div>
					<div for="input" id="brandName" class="form-item" validate-item="brandName">
                        <div validate-ok="brandName" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
                            <label class="text-label text-label-imgCode">品牌名称：</label>
							<a class="custom-select-header flex layout layout-align-start-center nameFilter" href="#other-brand" data-transition="slide">
                                <div class="custom-select-name"><?php echo empty($val['brand_name'])?'请选择您负责的品牌':$val['brand_name'];?></div>
                            </a>
							<i class="caret_right"></i>
							<input _name="brand_name" type="hidden" name="brand_name[]" value="<?php echo $val['brand_name'];?>" validate-field="brandName" validate-type="required" />
							<input _name="brand_id" type="hidden" name="brand_id[]" value="<?php echo $val['brand_id']?>"/>
                        </div>
                        <div validate-msg="brandName" class="hide tip">请选择品牌</div>
                    </div>
                    <div for="a" id="category" class="form-item" validate-item="category">
                        <div validate-ok="category" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
                            <label class="text-label text-label-imgCode">业态：</label>
                            <a class="custom-select-header flex layout layout-align-start-center category"
                                   href="#select-custom-format" data-transition="slide">
                                    <div class="custom-select-name"><?php echo  empty($val['cone'])&& empty($val['ctwo'])?"选择该品牌所在业态":htmlspecialchars_decode($val['c_all']);?></div>
									
                                </a>
                            <i class="caret_right"></i>
                            <input _name="category_ids" type="hidden" name="category_ids[]" value="<?php echo $val['category_ids'];?>"/>
                            <input type="hidden" _name="category_ids_other" name="category_ids_other[]" value="<?php echo $val['category_ids_other'];?>"/>
                            <input id="detai_category_bind" validate-field="category" validate-type="required" name="detai_category_bind" type="hidden" value="<?php echo  empty($val['cone'])&& empty($val['ctwo'])?"选择该品牌所在业态":$val['cone'].$val['ctwo'];?>"/>
                        </div>
                        <div validate-msg="category" class="hide tip">请选择品牌所在业态</div>
                    </div>
					<div for="a" class="form-item" validate-item="area">
						<div validate-ok="area" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
							<label class="text-label text-label-imgCode">*负责区域：</label>
							<a class="custom-select-header layout layout-align-start-center flex city" href="#select-custom-city" data-transition="slide">
								<div class="custom-select-name nowrap"><?php if(empty($val['area'])){ ?>选择您负责的区域<?php }else{ echo $val['area'];}?></div>
							</a>
							<i class="caret_right"></i>
							<input _name="area" validate-field="area" validate-type="required" type="hidden" name="area_ids[]" value="{val['area_ids']}">
						</div>
						<div validate-msg="area" class="hide tip">请填写您负责的区域信息</div>
					</div>
                    <div class="form-item" validate-item="type">
                        <div class="layout form-item-checkbox form-item-gender">
                            <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex <?php echo (empty($val['passport_brand_style'])||$val['passport_brand_style']==1)?'text-ok':''; ?> ">
                                <i class="check_bg"></i>
                                <div class="check_tit flex">直营 </div>
                            </div>
                            <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex <?php echo $val['passport_brand_style']==2?"text-ok":'';?>">
                                <i class="check_bg"></i>
                                <div class="check_tit flex">加盟</div>
                            </div>
                            <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex <?php echo $val['passport_brand_style']==3?"text-ok":'';?>">
                                <i class="check_bg"></i>
                                <div class="check_tit flex">代理</div>
                            </div>
                        </div>
                        <input validate-field="type" validate-type="checked" type="hidden" name="passport_brand_style[]" value="<?php echo $val['passport_brand_style'];?>">
						<div validate-msg="type" class="hide tip">请选择您的经营方式</div>
                    </div>
                </div>
                <?php }?>
                <div id="addBrand" class="form-item layout layout-align-start-center">
                    <span class="custom-add-h">继续负责新增的品牌</span>
                    <i class="custom-add">+</i>
                </div>
                <div class="btn_box form-item">
                    <div class="layout layout-align-start-center margin-top-10">
                        <div class="btn_box flex" onclick="javascript:location.href='/ucenter/index'">
                            <input type="button" data-role="none" class="btn btn_default" value="取消">
                        </div>
                        <div class="margin-left-10 flex btn_box">
                            <input type="button" custom-dialog="#detail_save" data-role="none" class="btn" value="保存" id="btnSubmit">
                        </div>
                    </div>
                </div>
            </div>
        </scetion>
		</form>
        <?php __slot('passport','footer');?>
    </article>

<div id="identifyEdit" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
    <div class="modal-backdrop fade"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="myModalLabel" class="modal-title">方橙会员登录</h4>
            </div>
            <div class="modal-body">
                <p>切换身份后，您需要重新填写您的“职位信息”及“品牌/商业体信息”</p>
                <div class="margin-10 flex btn_box">
                    <input type="button" class="close btn" value="确定" onclick="javascript:window.location.href = 'editjobandcompany';">
                </div>
                <div class="margin-top-10 flex btn_box">
                    <input type="button" class="close btn btn_default" value="取消切换">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hide">
    <div class="deletess">
        <div class="text-right del_item margin-top-20">
            删除该项目
            <input _name="passport_brand_id" type="hidden" name="passport_brand_id[]" required="true"/>
        </div>
        <div for="input" id="brandName" class="form-item" validate-item="brandName">
            <div validate-ok="brandName" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                <label class="text-label text-label-imgCode">品牌名称：</label>
				<a class="custom-select-header flex layout layout-align-start-center nameFilter" href="#other-brand" data-transition="slide">
					<div class="custom-select-name">请选择您负责的品牌</div>
				</a>
				<i class="caret_right"></i>
				<input _name="brand_name" type="hidden" name="brand_name[]" validate-field="brandName" validate-type="required" />
                <input _name="brand_id" type="hidden" name="brand_id[]"/>
                
            </div>
            <div validate-msg="brandName" class="hide tip">请填写品牌名称</div>
        </div>
        <div for="a" id="category" class="form-item" validate-item="category">
            <div validate-ok="category" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                <label class="text-label text-label-imgCode">业态：</label>
                <a class="custom-select-header flex layout layout-align-start-center category"
                       href="#select-custom-format" data-transition="slide">
                        <div class="custom-select-name">选择该品牌所在业态</div>
						
                    </a>
                <i class="caret_right"></i>
                <input _name="category_ids" type="hidden" name="category_ids[]" >
                <input type="hidden" _name="category_ids_other" name="category_ids_other[]" >
                <input id="detai_category_bind" validate-field="category" validate-type="required" name="detai_category_bind" type="hidden">
            </div>
            <div validate-msg="category" class="hide tip">请选择品牌所在业态</div>
        </div>
		<div for="a" class="form-item" validate-item="area">
			<div validate-ok="area" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
				<label class="text-label text-label-imgCode">*负责区域：</label>
				<a class="custom-select-header layout layout-align-start-center flex city" href="#select-custom-city" data-transition="slide">
					<div class="custom-select-name nowrap">选择您负责的区域</div>
				</a>
				<i class="caret_right"></i>
				<input _name="area" validate-field="area" validate-type="required" type="hidden" name="area_ids[]" value="">
			</div>
			<div validate-msg="area" class="hide tip">请填写您负责的区域信息</div>
		</div>
        <div class="form-item" validate-item="type">
            <div class="layout form-item-checkbox form-item-gender">
                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex">
                    <i class="check_bg"></i>
                    <div class="check_tit flex">直营</div>
                </div>
                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex">
                    <i class="check_bg"></i>
                    <div class="check_tit flex">加盟</div>
                </div>
                <div class="form-input-wrapper layout layout-align-start-center ui-field-contain flex">
                    <i class="check_bg"></i>
                    <div class="check_tit flex">代理</div>
                </div>
            </div>
            <input validate-field="type" validate-type="checked" type="hidden" value="0" name="passport_brand_style[]">
			<div validate-msg="type" class="hide tip">请选择您的经营方式</div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/js/ucenter/brandEdit.js"></script>
