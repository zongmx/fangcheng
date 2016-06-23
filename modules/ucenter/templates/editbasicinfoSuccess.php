
<form id="userInfo" action="/ucenter/doeditbasicinfo" method="post">
	<input id="bool_readOnly" type="hidden" value="1" />
	<section data-role="page" id="main_index_1" data-title="方橙"
		class="contain register">
		<header data-role="header" data-theme="b" class="header">
			<!--<a href="/ucenter/index<?php echo !empty($url)?'/url/'.$url:'';?>" data-shadow="false">取消</a>-->
			<a href="/ucenter/informationofmine" data-shadow="false"
				data-transition="slide">取消</a>
			<h1>编辑基本信息</h1>
			<a href="javascript:$('#btnSubmit').click();" data-shadow="false"
				id="save">保存</a>
		</header>
		<div class="detail_content" data-role="content" role="main">
			<div class="detail_main formwrapper">
				<div class="message_top layout flex">
					<div class="face40">
						<img onerror="this.src='/img/detail/headdefault.png'"
							src="<?php echo  C('IMAGE_USER_URL').$userinfo['passport_picture'];?>">
					</div>
					<div class="message_info margin-left-10 flex">
						<div id="cardField"
							class="form-item flex btn btn_default layout layout-align-center-center padding-left-60 padding-right-60 ">
							<div class="layout flex">
								<div class="flex layout-column">
									<div for="a" class="fileinput-button btn_box btn_upload flex">
										<div class="btn btn_default layout layout-align-center-center">
											<a href="#face" data-transition="slide"><span class="orange">更改头像</span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="layout form-item form-item-uname margin-top-10">
					<div for="input"
						class="form-input-wrapper form-item-fistName layout layout-align-start-center ui-field-contain <?php if($userinfo['passport_first_name'] && $isupdate==1){ echo "text-ok";}?>">
						<label class="text-label text-label-firstName">*姓：</label> <input
							id="first_name" type="text" name="passport_first_name"
							class="text-input <?php  echo $isupdate!=1?'grayc8c':'';?>"
							value="<?php echo $userinfo['passport_first_name'];?>"
							maxlength="10"
							placeholder="<?php echo $userinfo['passport_first_name'];?>"
							<?php if ($isupdate !=1){echo 'readonly="true"';}?> />
					</div>
					<div for="input"
						class="form-input-wrapper form-item-secondName layout layout-align-start-center ui-field-contain flex <?php if($userinfo['passport_last_name'] && $isupdate==1){ echo "text-ok";}?>">
						<label class="text-label text-label-second">*名：</label> <input
							id="last_name" type="text" name="passport_last_name"
							class="text-input <?php  echo $isupdate!=1?'grayc8c':'';?>"
							value="<?php echo $userinfo['passport_last_name'];?>"
							maxlength="10"
							placeholder="<?php echo $userinfo['passport_last_name'];?>"
							<?php if ($isupdate !=1){echo 'readonly="true"';}?> />
					</div>
				</div>
				<div id="nameTip" class="tip hide">用户姓名不能为空</div>
				<div id="tip" class="tip successTip hide">
                    <?php if ($isupdate!=1){?>
                    <span>姓名180天只能修改一次</span>
                    <?php }else {?>
                    <span>姓名180天只能修改一次。方橙建议您使用真实姓名。真实姓名能够提高您的可信度，增加与其他用户取得联系并达成合作的机会！</span>
                    <?php }?>
                </div>
				<!--  
                <div id="checkmeField" class="form-item form-reg-argen">
                    <div class="layout">
                        <div class="check_auto">
                            <span class="<?php if ( $userinfo['passport_private_mode'] == 1 ){ echo 'checked';}?> gray333">开启隐私保护</span>
                            <input type="hidden" name="passport_private_mode" value="1">
                        </div>
                        <a href="#regAgreement" data-rel="dialog" class="ui-link gray333"></a>
                    </div>
                    <div class="hide tip">
                    </div>
                </div>
                <p class="font-size-12">开启后，其他用户查看你的姓名时将只显示姓氏，如“张先生”、“李小姐”。</p>-->

				<div id="sexField" class="form-item">
					<div class="layout form-item-checkbox form-item-gender">
						<div
							class="form-input-wrapper layout layout-align-start-center ui-field-contain flex boy <?php if ($userinfo['passport_sex'] == 1){ ?> text-ok<?php }?>"
							" value="1">
							<i class="check_bg"></i>
							<div class="check_tit">男性</div>
						</div>
						<div
							class="form-input-wrapper layout layout-align-start-center ui-field-contain flex girl <?php if ($userinfo['passport_sex'] == 2){ ?> text-ok<?php }?>"
							value="2">
							<i class="check_bg"></i>

							<div class="check_tit">女性</div>
						</div>
					</div>
					<input type="hidden" name="passport_sex"
						value="<?php echo $userinfo['passport_sex'];?>">

					<div class="hide tip"></div>
				</div>

				<div for="a" id="cityField" class="form-item"
					validate-item="cityField">
					<div validate-ok="cityField"
						class="form-input-wrapper layout layout-align-start-center ui-field-contain <?php if(!empty($area_str)) ?>text-ok<?php ?>">
						<label class="text-label text-label-imgCode">所在城市：</label> <a
							class="custom-select-header layout layout-align-start-center flex"
							href="#select-custom-city" data-transition="slide">
							<div class="custom-select-name nowrap">
								<span><?php echo empty($area_str)?"选择城市":$area_str;?></span>
							</div>

						</a> <i class="caret_right"></i> <input id="area_id" type="hidden"
							name="area_id" value="<?php echo $userinfo['area_id']?>"
							validate-field="cityField" validate-type="required">
					</div>
					<div validate-msg="cityField" class="hide tip">请填写所在城市信息</div>
				</div>
				<div for="a" id="jobField" class="form-item"
					validate-item="jobField">
					<div validate-ok="jobField"
						class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
						<label class="text-label text-label-imgCode">*职位：</label> <a
							class="custom-select-header flex layout layout-align-start-center ui-link"
							href="#select-custom-job" data-transition="slide">
							<div class="custom-select-name"><?php echo empty($userinfo['passport_job_title'])?'选择您的职位头衔':$userinfo['passport_job_title'];?></div>
						</a> <i class="caret_right"></i> <input validate-field="jobField"
							validate-type="required" type="hidden" name="passport_job_title"
							value="<?php echo $passportInfo['passport_job_title'];?>">
					</div>
					<div validate-msg="cityField" class="hide tip">请填写职位信息</div>
				</div>
               <?php if ($userinfo['passport_type'] != 1){?>
               <div for="a" id="detail_category" class="form-item"
					validate-item="detail_category">
					<div validate-ok="detail_category"
						class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
						<label class="text-label text-label-imgCode">*负责业态：</label> <a
							class="custom-select-header layout layout-align-start-center flex category2 ui-link"
							href="#select-custom-format" data-transition="slide">
							<div class="custom-select-name nowrap"><?php echo htmlspecialchars_decode($category_ids_str)?></div>

						</a> <i class="caret_right"></i> <input _name="category_ids"
							type="hidden" name="category_ids"
							value="{userinfo[category_ids]}"> <input type="hidden"
							_name="category_ids_other" name="category_ids_other"
							value="{userinfo[category_ids_other]}"> <input
							id="detai_category_bind" validate-field="detail_category"
							validate-type="required" name="detai_category_bind" type="hidden"
							value="<?php echo htmlspecialchars_decode($category_ids_str)?>">
					</div>
					<div validate-msg="detail_category" class="hide tip">请填写负责业态信息</div>
				</div>
               <?php }?>
                <div class="btn_box form-item">
					<div class="layout layout-align-start-center margin-top-10">
						<div class="btn_box flex">
							<input
								onclick="javascript:location.href='/ucenter/informationofmine#account'"
								type="button" data-role="none" class="btn btn_default"
								value="取消">
						</div>
						<div class="margin-left-10 flex btn_box">
							<input type="button" data-role="none" class="btn" value="保存"
								id="btnSubmit">
						</div>
					</div>
				</div>
			</div>
		</div>
        <?php __slot('passport','footer');?>
    </section>
	<article id="face" data-role="page" id="detail_edit" data-title="方橙"
		class="contain edit_face">
		<div data-role="content"
			class="detail_u_face layout layout-algin-center">
			<div class="flex layout layout-column layout-align-center-center">
				<div id="imagePreview" class="detail_u_face_box">
					<img onerror="this.src='/img/detail/headdefault.png'"
						src="<?php echo C('IMAGE_USER_URL').$userinfo['passport_picture'];?>">
				</div>
				<div class="detail_edit_content margin-top-20 width100">
					<div class="btn_box layout avatar-upload on"
						id="detail_edit_logos_btn">
						<div class="flex ">
							<div id="fileinput-button"
								class="fileinput-button btn_box btn_upload width100 flex hide">
								<div id="postcard"
									class="btn btn_default flex layout layout-align-center-center">
									<input id="fileupload" type="file" name='photo'
										accept='image/gif, image/jpeg, image/jpg, image/png' /> <span>更改头像</span>
								</div>
							</div>
							<div id="fileinput-button_wx"
								class="fileinput-button_wx fileinput-button btn_box btn_upload width100 flex">
								<div id="postcard_wx"
									class="btn btn_default flex layout layout-align-center-center">
									<span>更改头像</span>
								</div>
							</div>
							<input id="cardFieldName" type="hidden" name="passport_picture"
								value="<?php echo $userinfo['passport_picture'];?>" />
						</div>
						<input type="hidden" class="avatar-src" name="avatar_src" /> <input
							type="hidden" class="avatar-data" name="avatar_data" />
					</div>
					<div class="margin-top-20 flex">
						<div class="btn_box flex ">
							<a confirm href="#"
								class="margin-left-10 margin-right-10 btn add-need-btn layout layout-align-center-center ui-link"><span
								class="layout layout-align-center-center">确定</span></a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</article>
</form>

<script>
$('#detail_category a').click(function (e) {
    var category = $(this).parents('.form-item');
    $('#userInfo').register_category(function (val) {
    	if (!val.isEmpty) {
            $('.custom-select-name', category).html(val.allName);
            $('#detai_category_bind', category).val(val.allName);
            $('input[_name=category_ids]', category).val(val.value);
            $('input[_name=category_ids_other]', category).val(val.otherValue);
            $('.tip', category).addClass('hide');
            $('.form-input-wrapper', category).addClass('text-ok');
        } else {
            $('.form-input-wrapper', category).removeClass('text-ok');
            $('.custom-select-name', category).text('选择您主要负责招商的业态');
            $('#detai_category_bind', category).val('');
            $('input[_name=category_ids]', category).val('');
            $('input[_name=category_ids_other]', category).val('');
        }
    }, {returnTo: 'main_index_1', categoryIds:$('input[_name=category_ids]', category).val(),categoryOthers:$('input[_name=category_ids_other]', category).val()});
});


var jobList = new MWidget.ListPlug({
    pluginId:'select-custom-job',
    showFinish:false,
    title:'选择职位',
    data:[{
        name:'项目总经理',
        value:'项目总经理'
    },{
        name:'项目副总经理',
        value:'项目副总经理'
    },{
        name:'招商总监',
        value:'招商总监'
    },{
        name:'招商高级经理',
        value:'招商高级经理'
    },{
        name:'招商经理/副经理',
        value:'招商经理/副经理'
    },{
        name:'招商主管/主任',
        value:'招商主管/主任'
    },{
        name:'招商专员',
        value:'招商专员'
    },{
        name:'其他',
        value:'其他',
        more:true
    }],
    back:function(e) {
        MWidget.Util.go('main_index_1');
        e.preventDefault();
    },
    clickItem:function(d) {
        if(d.more) {
            this.non_selectAll();
            MWidget.Util.go('other-job');
            return true;
        }
        if(this.hasSelected(d)) this.non_select(d);
        else {
            this.non_selectAll().select(d);
            var selected = jobList.getSelected();
            setJob('#jobField',selected);
            MWidget.Util.go('main_index_1');
        }
    }
}).appendTo($('form'));

var otherJob = new MWidget.OtherPlug({
    pluginId:'other-job',
    title:'其它职位',
    inputLabel:'*职位头衔：',
    inputPlaceholder:'输入您的职位头衔',
    back:function(e) {
        MWidget.Util.go('select-custom-job');
        e.preventDefault();
    },
    confirm:function(val) {
        setJob('#jobField',[{name:val}]);
        MWidget.Util.go('main_index_1');
    },
    finish:function(e) {
        var selected = otherJob.getSelected();
        setJob('#jobField',selected);
        MWidget.Util.go('main_index_1');
        e.preventDefault();
    }
}).appendTo($('form'));

function setJob(id,selected) {
    if(selected.length != 0) {
        $(id+' .custom-select-name').text(selected[0].name);
        $(id+' input').val(selected[0].value||selected[0].name);
        $(id+' .tip').addClass('hide');
        $(id+' .form-input-wrapper').addClass('text-ok');
    } else {
        $(id+' .form-input-wrapper').removeClass('text-ok');
        $(id+' .custom-select-name').text('选择您的职位头衔');
        $(id+' input').val('');
    }
}

$('#select-custom-job .format-item').each(function(index,ele){
    if($('#jobField .custom-select-name').text()==$(ele).text()){
        $(ele).children('a').addClass('text-ok');
    }
    $(ele).click(function(){
         $(this).parents().find('a').removeClass('text-ok');
         $(this).children('a').addClass('text-ok');
    })
})

 $('#btnSubmit').click(function() {
console.log($('input[name="passport_job_title"]').val($('#jobField .custom-select-name').text()));
        $('#userInfo').validate();

        if($('#userInfo').doValidate()) {

            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();

            if(!first_name || !last_name) {
                $('#nameTip').removeClass('hide');
                return;
            } else {
                $('#nameTip').addClass('hide');
            }
            $('#userInfo').ajaxSubmit(function(data) {
                if(data && data.hasOwnProperty('result')) {
                    if(data && data.result == 1) {

                        comDialog.dialog('编辑成功', '用户信息修改成功', '返回', 'directDialog', '"/ucenter/index/url/L3VjZW50ZXIvaW5mb3JtYXRpb25vZm1pbmU,"');
                    } else {

                        comDialog.dialog('编辑失败', '用户信息修改失败', '关闭', 'easyDialog');
                    }
                }
            });
        }
    });

</script>
