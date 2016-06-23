
    <article data-role="page" id="registerTwo" data-title="方橙" class="contain register">
		
<form id="userInfo" action="/ucenter/dothridjob" method="post">
     <input type="hidden" name="passport_mall_ids" value="<?php echo $passport_mall_ids;?>">
     <input type="hidden" name="passport_mall_ids_del" >
     <input type="hidden" name="passport_mall_ids_update" value="<?php echo $passport_mall_ids;?>">
      <input type="hidden" name='passport_brand_ids' value="<?php echo $passport_brand_ids;?>">
    <input type="hidden" name='passport_brand_ids_del' value="">
    <input type="hidden" name='passport_brand_ids_update' value="<?php echo $passport_brand_ids;?>">

    <!-- 是否可以编辑身份和职位信息 -->
    <input id="identifyEditable" value="1" type="hidden"/>
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
                            <div class="custom-select-header flex">
                                <a id="identify" class="custom-select-header ui-link flex layout-align-center" href="/ucenter/editjobandcompany" data-role="none">
                                    <div class="orange font-size-16 text-center">编辑认证信息</div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php }else {?>
                    <!-- 不可以编辑 需要加样式的地方 -->
                    <div class="form-item">
                        <div class="form-input-wrapper layout layout-align-start-center text-disable">
                            <div class="custom-select-header flex">
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
                        <div class="custom-select-header flex ">
							<input validate-field="jobField" validate-type="required" type="text" name="passport_job_title" value="<?php echo $passportInfo['passport_job_title'];?>"			maxlength="50" placeholder="选择您的职位头衔" />
                        </div>
                    </div>
                    <div validate-msg="jobField" class="hide tip gray333">  请填写职位信息 </div>
                </div>
                <?php if (!empty($mallinfo)){?><p class="title gray333">负责的项目信息<p/><?php }?>
                <?php foreach ($mallinfo as $key => $val){?>
                <div class="deletess">
                    <div class="text-right del_item">  删除该项目
                        <input type="hidden" name='passport_mall_id[]' value="<?php echo $val['passport_mall_id'];?>">
                    </div>
                    <div class="form-item">
                        <div class="layout form-item-checkbox form-item-gender">
                            <div class="switch_tit form-input-wrapper layout layout-align-start-center ui-field-contain flex ">
                                <i class="check_bg"></i>
                                <div>品牌拓展项目</div>
                            </div>
                            <div class="switch_tit form-input-wrapper layout layout-align-start-center ui-field-contain flex text-ok">
                                <i class="check_bg"></i>
                                <div>商业体招商项目</div>
                            </div>
                        </div>
                    </div>
                    <div for="input" id="mallName" class="form-item" validate-item="mallName">
                        <div validate-ok="mallName" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
                            <label class="text-label text-label-imgCode">商业体名称：</label>
                            <a class="custom-select-header layout layout-align-start-center flex nameFilter2" href="#other-mall" data-transition="slide">
                                <div class="custom-select-name nowrap"><?php echo empty($val['mall_name'])?"请选择您负责的商业体":$val['mall_name'];?></div>
								
                            </a>
							<i class="caret_right"></i>
							<input _name="mall_name" type="hidden" value="<?php echo $val['mall_name'];?>" name="mall_name[]" validate-field="add_mall_name" validate-type="required" />
							<input _name="mall_id" type="hidden" name='mall_id[]' value="<?php echo $val['mall_id']?>"/>
                        </div>
                        <div class="hide tip" validate-msg="mallName">请填写商业体名称信息</div>
                    </div>
                    <div for="a" id="city" class="form-item" validate-item="city">
                        <div validate-ok="city" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
                            <label class="text-label text-label-imgCode">所在城市：</label>
                            <a class="custom-select-header layout layout-align-start-center flex city3" href="#select-custom-city" data-transition="slide">
                                    <div class="custom-select-name nowrap"><span><?php echo empty($val['area_name'])?"选择城市":$val['area_name'];?></span></div>
									
                                </a>
                            <i class="caret_right"></i>
                            <input id="area_id" type="hidden" name="area_id[]" value="<?php echo $val['area_id']?>" validate-field="city" validate-type="required">
                        </div>
                        <div class="hide tip" validate-msg="city">请填所在城市信息</div>
                    </div>
                </div>
                <?php }?>  
                <?php foreach ($brandinfo as $key => $val){?>
                
                <div class="deletess">
                    <div class="text-right del_item margin-top-20">
                        删除该项目
                        <input type="hidden" name='passport_brand_id[]' value="<?php echo $val['passport_brand_id']?>">
                    </div>
                    <div class="form-item">
                        <div class="layout form-item-checkbox form-item-gender">
                            <div class="switch_tit form-input-wrapper layout layout-align-start-center ui-field-contain flex text-ok">
                                <i class="check_bg"></i>
                                <div>品牌拓展项目</div>
                            </div>
                            <div class="switch_tit form-input-wrapper layout layout-align-start-center ui-field-contain flex">
                                <i class="check_bg"></i>
                                <div>商业体招商项目</div>
                            </div>
                        </div>
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
                        <div class="hide tip" validate-msg="brandName">请填写品牌名称信息</div>
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
                        <div class="hide tip" validate-msg="category">请填写业态信息</div>
                    </div>
					<div for="a" class="form-item" validate-item="area">
						<div validate-ok="area" class="form-input-wrapper layout layout-align-start-center ui-field-contain text-ok">
							<label class="text-label text-label-imgCode">*代理区域：</label>
							<a class="custom-select-header layout layout-align-start-center flex city_d" href="#select-custom-city" data-transition="slide">
								<div class="custom-select-name nowrap"><?php if(empty($val['area'])){ ?>选择您代理的区域<?php }else{ echo $val['area'];}?></div>
							</a>
							<i class="caret_right"></i>
							<input _name="area" validate-field="area" validate-type="required" type="hidden" name="area_ids[]" value="{val['area_ids']}">
						</div>
						<div validate-msg="area" class="hide tip">请填写您代理的区域信息</div>
					</div>
                </div>
                <?php }?>
                
                <div id="addBrand" class="form-item layout layout-align-start-center">
                    <span class="custom-add-h">继续新增负责的项目</span>
                    <i class="custom-add">+</i>
                </div>
                <div class="btn_box form-item">
                    <div class="layout layout-align-start-center margin-top-10">
                        <div class="btn_box flex">
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
<div id="brandInfo" class="hide">
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
        <div class="hide tip" validate-msg="brandName">请填写品牌名称信息</div>
    </div>
    <div for="a" id="category" class="form-item" validate-item="category">
        <div validate-ok="category" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
            <label class="text-label text-label-imgCode">业态：</label>
            <a class="custom-select-header flex layout layout-align-start-center category"
                   href="#select-custom-format" data-transition="slide">
                    <div class="custom-select-name">选择该品牌所在业态</div>
					
                </a>
            <i class="caret_right"></i>
            <input _name="category_ids" type="hidden" name="category_ids[]">
            <input type="hidden" _name="category_ids_other" name="category_ids_other[]">
            <input id="detai_category_bind" validate-field="category" validate-type="required" name="detai_category_bind" type="hidden">
        </div>
        <div class="hide tip" validate-msg="category">请填写业态信息</div>
    </div>
	<div for="a" class="form-item" validate-item="area">
		<div validate-ok="area" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
			<label class="text-label text-label-imgCode">*代理区域：</label>
			<a class="custom-select-header layout layout-align-start-center flex city_d" href="#select-custom-city" data-transition="slide">
				<div class="custom-select-name nowrap">选择您代理的区域</div>
			</a>
			<i class="caret_right"></i>
			<input _name="area" validate-field="area" validate-type="required" type="hidden" name="area_ids[]" value="">
		</div>
		<div validate-msg="area" class="hide tip">请填写您代理的区域信息</div>
	</div>
</div>

<div id="mallInfo" class="hide">
    <div for="input" id="mallName" class="form-item" validate-item="mallName">
        <div validate-ok="mallName" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
            <label class="text-label text-label-imgCode">商业体名称：</label>
            <a class="custom-select-header layout layout-align-start-center flex nameFilter2" href="#other-mall" data-transition="slide">
				<div class="custom-select-name nowrap">请选择您负责的商业体</div>
			</a>
			<i class="caret_right"></i>
			<input _name="mall_name" type="hidden" name="mall_name[]" validate-field="add_mall_name" validate-type="required" />
			<input _name="mall_id" type="hidden" name='mall_id[]' />
        </div>
        <div class="hide tip" validate-msg="mallName">请填写商业体名称信息</div>
    </div>
    <div for="a" id="city" class="form-item" validate-item="city">
        <div validate-ok="city" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
            <label class="text-label text-label-imgCode">所在城市：</label>
            <a class="custom-select-header layout layout-align-start-center flex city3" href="#select-custom-city" data-transition="slide">
                    <div class="custom-select-name nowrap"><span></span></div>
					
                </a>
            <i class="caret_right"></i>
            <input id="area_id" type="hidden" name="area_id[]" validate-field="city" validate-type="required">
        </div>
        <div class="hide tip" validate-msg="city">请填所在城市信息</div>
    </div>
</div>
<div class="hide">
    <div class="deletess">
        <div class="text-right del_item margin-top-20">
            删除该项目
            <input type="hidden" name='passport_mall_id[]'>
        </div>
        <div class="form-item">
            <div class="layout form-item-checkbox form-item-gender">
                <div class="switch_tit form-input-wrapper layout layout-align-start-center ui-field-contain flex text-ok">
                    <i class="check_bg"></i>
                    <div class="check_tit">品牌拓展项目</div>
                </div>
                <div class="switch_tit form-input-wrapper layout layout-align-start-center ui-field-contain flex">
                    <i class="check_bg"></i>
                    <div class="check_tit">商业体招商项目</div>
                </div>
            </div>
            <input type="hidden" name="passport_brand_style[]">
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
            <div class="hide tip" validate-msg="brandName">请填写品牌名称信息</div>
        </div>
        <div for="a" id="category" class="form-item" validate-item="category">
            <div validate-ok="category" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                <label class="text-label text-label-imgCode">业态：</label>
                <a class="custom-select-header flex layout layout-align-start-center category"
                       href="#select-custom-format" data-transition="slide">
                        <div class="custom-select-name"><span></span></div>
						
                    </a>
                <i class="caret_right"></i>
                <input _name="category_ids" type="hidden" name="category_ids[]">
                <input type="hidden" _name="category_ids_other" name="category_ids_other[]">
                <input id="detai_category_bind" validate-field="category" validate-type="required" name="detai_category_bind" type="hidden">
            </div>
            <div class="hide tip" validate-msg="category">请填写业态信息</div>
        </div>
		<div for="a" class="form-item" validate-item="area">
			<div validate-ok="area" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
				<label class="text-label text-label-imgCode">*代理区域：</label>
				<a class="custom-select-header layout layout-align-start-center flex city_d" href="#select-custom-city" data-transition="slide">
					<div class="custom-select-name nowrap">选择您代理的区域</div>
				</a>
				<i class="caret_right"></i>
				<input _name="area" validate-field="area" validate-type="required" type="hidden" name="area_ids[]" value="">
			</div>
			<div validate-msg="area" class="hide tip">请填写您代理的区域信息</div>
		</div>
    </div>
</div>
<script type="text/javascript" src="/js/ucenter/brandEdit.js"></script>
<script type="text/javascript">

    var cloneMall = {};
    var cloneBrand = {};

    $(document).ready(function () {
        cloneMall = $('#mallInfo').clone(true);
        $('input[_name="nameHolder"]', cloneMall).wrap('<div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"></div>');

        cloneBrand = $('#brandInfo').clone(true);
        $('input[_name="nameHolder"]', cloneBrand).wrap('<div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"></div>');
    });

    /**
     * 选择品牌的类型，如商业体招商项目
     */
    $('#registerTwo').on('click', '.switch_tit', function () {
        var type = '';
        var text = $('.check_tit', $(this)).text();
        if(!text) {
            return;
        }
        switch (text) {
            case '商业体招商项目':
            {
                type = 2;
                $(this).parents('.deletess').children('div').first().children('input').attr('name', 'passport_mall_id[]');
                break;
            }
            case '品牌拓展项目' :
            {
                type = 1;
                $(this).parents('.deletess').children('div').first().children('input').attr('name', 'passport_brand_id[]');
                break;
            }
        }

        var inputObj = $(this).parents('.form-item').children('input');
        if(type != inputObj.val()) {
            $(this).addClass('text-ok');
            $(this).siblings().removeClass('text-ok');
            inputObj.val(type);

            $('.form-item', $(this).parents('.deletess')).slice(1).remove();

            if(type == 1) {
                $(this).parents('.deletess').append(cloneBrand.html());
            }

            if(type == 2) {
                $(this).parents('.deletess').append(cloneMall.html());
            }
        }
		$('#userInfo').validate();
    });

    $('#userInfo').on('click', '.city3', function() {
        var that = $(this);
        var container = that.parents('.form-input-wrapper');
        $('#userInfo').register(function (val) {
            if (!val.isEmpty) {
                $('#area_id', container).val(val.value);
                $('.form-input-wrapper', that.parents('.form-item')).addClass("text-ok").siblings('.tip').addClass('hide');
                that.find('span').html(val.name);
            } else {
                $('input', container).val('');
                $('.form-input-wrapper', that.parents('.form-item')).removeClass("text-ok");
                that.find('span').html("选择城市");
            }
        }, {single: true, cityIds: $('#area_id', container).val(),cityOthers:'', returnTo: 'registerTwo'});
  
    });
</script>