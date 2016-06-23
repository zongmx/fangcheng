<article data-role="page" id="registerTwo" data-title="方橙" class="contain register">
	<form id="userInfo" action="/ucenter/dobusinessjob" method="post">
		<input type="hidden" name="passport_mall_ids" value="<?php echo $passport_mall_ids;?>">
		<input type="hidden" name="passport_mall_ids_del" >
		<input type="hidden" name="passport_mall_ids_update" value="<?php echo $passport_mall_ids;?>">
		<!-- 是否可以编辑身份和职位信息 -->
		<input id="identifyEditable" value="1" type="hidden"/>
		<input id="passport_brand_ids_del" value="" type="hidden"/>
		<header data-role="header" data-theme="b" class="header">
			<a href="/ucenter/index<?php echo  !empty($url)?'/url/'.$url:'';?>" data-shadow="false">取消</a>
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
							<div class="custom-select-header flex layout layout-align-center">
								<a id="identify" class="custom-select-header ui-link flex layout layout-align-center" href="/ucenter/editjobandcompany" data-role="none">
									<div class="orange font-size-16 text-center">编辑认证信息</div>
								</a>
							</div>
						</div>
					</div>
				<?php }else {?>
					<!-- 不可以编辑 需要加样式的地方 -->
					<div class="form-item">
						<div class="form-input-wrapper layout layout-align-start-center text-disable">
							<div class="custom-select-header flex layout layout-align-center">
								<a id="identify" class="custom-select-header ui-link flex layout-align-center" data-role="none">
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
						<a class="custom-select-header layout layout-align-start-center flex" href="#select-custom-job" data-transition="slide">
								<div class="custom-select-name"><?php echo empty($passportInfo['passport_job_title'])?'选择您的职位头衔':$passportInfo['passport_job_title'];?></div>
								
							</a>
						<i class="caret_right"></i>
						<input validate-field="jobField" validate-type="required" type="hidden" name="passport_job_title" value="<?php echo $passportInfo['passport_job_title'];?>"/>
					</div>
					<div validate-msg="jobField" class="hide tip gray333">  请填写职位信息 </div>
				</div>
			   <?php if ($passportType != 2 ){?>
				<div for="a" id="ucenter_scope" class="form-item">
					<div id="ucenter_scope_ok" class="form-input-wrapper layout layout-align-start-center ui-field-contain <?php echo empty(trim($jobareaStr))?"":"text-ok"?>">
						<label class="text-label text-label-imgCode">*区域：</label>
						<a class="custom-select-header layout layout-align-start-center flex city" href="#select-custom-city" data-transition="slide">
								<div class="custom-select-name nowrap"><span><?php echo empty(trim($jobareaStr))?'选择您负责的区域':$jobareaStr;?></span></div>
								
							</a>
						<i class="caret_right"></i>
						<input id="area_ids_list" type="hidden" name="area_ids_list" value="<?php echo $jobareaIds;?>">
						<input id="passport_job_area" type="hidden" name="passport_job_area" value="<?php echo $passportInfo['passport_job_area'] ?>">
					</div>
					<div id="ucenter_scope_msg" class="hide tip">请填写您负责的区域信息</div>
				</div>
				<?php }?>
				<div for="a" id="detail_category" class="form-item" validate-item="detail_category">
					<div validate-ok="detail_category" class="form-input-wrapper layout layout-align-start-center ui-field-contain <?php echo empty($cateStr)?"":"text-ok"?>">
						<label class="text-label text-label-imgCode">*负责业态：</label>
						<a class="custom-select-header layout layout-align-start-center flex category2" href="#select-custom-format" data-transition="slide">
								<div class="custom-select-name nowrap"><?php echo empty($cateStr)?"请填写负责业态信息":htmlspecialchars_decode($cateStr);?></div>
								
							</a>
						<i class="caret_right"></i>
						<input _name="category_ids" type="hidden" name="category_ids" value="<?php echo $passportInfo['category_ids'];?>"/>
						<input type="hidden" _name="category_ids_other" name="category_ids_other" value="<?php echo $passportInfo['category_ids_other'];?>"/>
						<input id="detai_category_bind" validate-field="detail_category" validate-type="required" name="detai_category_bind" type="hidden" value="<?php echo $cateStr;?>"/>
					</div>
					<div validate-msg="detail_category" class="hide tip">请填写负责业态信息</div>
				</div>
				<p class="title gray333">负责的商业体名称<p/>
				<?php foreach ($mallinfo as $key => $val){?>
				<div class="deletess">
					<div class="text-right del_item">
						<span>删除该项目</span>
						<input type="hidden" name='passport_mall_id[]' value="<?php echo $val['passport_mall_id'];?>">
					</div>
					<div for="input" id="mallName" class="form-item" validate-item="add_mall_name">
						<div validate-ok="add_mall_name" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
							<label class="text-label text-label-imgCode">商业体名称：</label>
							<a class="custom-select-header layout layout-align-start-center flex nameFilter2" href="#other-mall" data-transition="slide">
								<div class="custom-select-name nowrap"><?php echo empty($val['mall_name'])?"请选择您负责的商业体":$val['mall_name'];?></div>
								
							</a>
							<i class="caret_right"></i>
							<input _name="mall_name" type="hidden" value="<?php echo $val['mall_name'];?>" name="mall_name[]" validate-field="add_mall_name" validate-type="required" />
							<input _name="mall_id" type="hidden" name='mall_id[]' value="<?php echo $val['mall_id']?>"/>
						</div>
						<div validate-msg="add_mall_name" class="hide tip">  请填写负责商业体名称 </div>
					</div>
					<div for="a" id="city" class="form-item" validate-item="add_city">
						<div validate-ok="add_city" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
							<label class="text-label text-label-imgCode">*所在城市：</label>
							<a class="custom-select-header layout layout-align-start-center flex city2" href="#select-custom-city" data-transition="slide">
									<div class="custom-select-name nowrap"><span><?php echo empty($val['area_name'])?'选择城市':$val['area_name'];?></span></div>
									
								</a>
							<i class="caret_right"></i>
							<input id="area_ids_list" validate-field="add_city" validate-type="required" type="hidden" name="area_id[]" value="<?php echo $val['area_id'];?>">
						</div>
						<div validate-msg="add_city" class="hide tip">请填写所在城市信息</div>
					</div>
				</div>
				<?php }?>
			   <?php if ($passportType == 3){?>
				<div id="addBrand" class="form-item layout layout-align-start-center">
					<span class="custom-add-h">继续负责新增的商业体</span>
					<i class="custom-add">+</i>
				</div>
				<?php }?>
				<div class="btn_box form-item">
					<div class="layout layout-align-start-center margin-top-10">
						<div class="btn_box flex" onclick="javascript:location.href='/ucenter/index'">
							<input type="button" data-role="none" class="btn btn_default" value="取消">
						</div>
						<div class="margin-left-10 flex btn_box">
							<input type="button" data-toggle="modal" custom-dialog="#detail_save" data-role="none" class="btn" value="保存" id="btnSubmit">
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
            <span>删除该项目</span>
            <input type="hidden" name='passport_mall_id[]'>
        </div>
        <div for="input" id="mallName" class="form-item" validate-item="add_mall_name">
            <div validate-ok="add_mall_name" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                <label class="text-label text-label-imgCode">商业体名称：</label>
				<a class="custom-select-header layout layout-align-start-center flex nameFilter2" href="#other-mall" data-transition="slide">
					<div class="custom-select-name nowrap">请选择您负责的商业体</div>
				</a>
				<i class="caret_right"></i>
				<input _name="mall_name" type="hidden" name="mall_name[]" validate-field="add_mall_name" validate-type="required" />
				<input _name="mall_id" type="hidden" name='mall_id[]' />
            </div>
            <div validate-msg="add_mall_name" class="hide tip">请填写负责商业体名称 </div>
        </div>
        <div for="a" id="city" class="form-item" validate-item="add_city">
            <div validate-ok="add_city" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                <label class="text-label text-label-imgCode">*所在城市：</label>
                <a class="custom-select-header layout layout-align-start-center flex city2" href="#select-custom-city" data-transition="slide">
                        <div class="custom-select-name nowrap"><span>选择城市</span></div>
						
                    </a>
                <i class="caret_right"></i>
                <input id="area_ids_list" validate-field="add_city" validate-type="required" type="hidden" name="area_id[]">
            </div>
            <div validate-msg="add_city" class="hide tip">请填写所在城市信息</div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/ucenter/mallEdit.js"></script>
