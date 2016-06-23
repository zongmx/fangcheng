<input id="jump" type="hidden" value="">
<form id="sendNeed" target="h5container" method="post" action="">
<input type='hidden' name='template_id' value='2'>  
<section data-role="page" id="need-zero" data-title="发布需求" class="contain" data-role="none">
    <header data-role="header" data-theme="b" class="header">
        <a href="/activity/htmltemplate" data-ajax="false" class="nav-icon-back">上一步</a>
        <h1>发布需求</h1>
    </header>
    <div data-role="content" class="detail_content brandNeedH5">
        <div class="detail_main">
			<div class="formwrapper">
				<h3 class="needFormTit1">选择品牌</h3>
				<p class="needFormTit">请选择您需要制作H5手册的品牌</p>
				<div id="brandField" validate-item="brand" class="form-item" go="#select-brand">
					<div validate-ok="brand" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
						<label class="text-label text-label-imgCode">*品牌：</label>
						<a class="custom-select-header flex layout layout-align-start-center">
							<div class="custom-select-name">请选择您负责的品牌</div>
						</a>
						<i class="caret_right"></i>
						<input _name="brand_name" validate-field="brand" validate-type="required" type="hidden" name="brand_name" />
						<input _name="brand_id" type="hidden" name="brand_id" />
					</div>
					<div validate-msg="brand" class="hide tip">请选择您负责的品牌</div>
				</div>
				<div id="categoryField" validate-item="category" class="form-item" go="#select-custom-format">
					<div validate-ok="category" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
						<label class="text-label text-label-imgCode">*所在业态：</label>
						<a class="custom-select-header flex layout layout-align-start-center">
							<div class="custom-select-name">请选择您的品牌所在的业态</div>
						</a>
						<i class="caret_right"></i>
						<input _name="category" validate-type="required" validate-field="category" type="hidden"/>
						<input  _name="category_ids" type="hidden" name="category_ids" />
						<input _name="category_ids_other" type="hidden" name="category_ids_other" />
					</div>
					<div validate-msg="category" class="hide tip">
						请选择您的品牌所在的业态
					</div>
				</div>
			</div>
		</div>
		<!-- 底部的按扭 -->
		<div class="btn_box btn_bottom">
			<a id="zero-next" href="#" class="btn add-need-btn layout layout-align-center-center"><span class="layout layout-align-center-center">下一步</span></a>
		</div>
    </div>
<?php __slot('passport','footer');?>
</section>
<section data-role="page" id="need-one" data-title="方橙-最专业的招商选址大数据平台" class="contain" data-role="none">
    <header data-role="header" data-theme="b" class="header">
        <a href="#need-zero" data-transition="slide" data-direction="reverse" class="nav-icon-back">上一步</a>
        <h1>发布需求</h1>
    </header>
    <div data-role="content" class="detail_content brandNeedH5">
            <div class="detail_main">
                <div class="formwrapper">
                    <h3 class="needFormTit1">品牌特色</h3>
                    <p class="needFormTit">请提供您的品牌信息</p>
                    <div id="brandPosition" class="form-item" validate-item="brandPosition" go="#brand-position">
                        <div validate-ok="brandPosition" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                            <label class="text-label text-label-imgCode">*品牌定位：</label>
                            <a class="custom-select-header flex layout layout-align-start-center">
                                <div class="custom-select-name">请选择您的品牌定位</div>
                            </a>
                            <i class="caret_right gray999"></i>
                            <input validate-field="brandPosition" validate-type="required" type="hidden" name="group_12" />
                        </div>
                        <div validate-msg="brandPosition" class="hide tip">
                            请选择您的品牌定位
                        </div>
                    </div>
                    <div id="price" for="input" validate-item="price" class="form-item form-item-two">
                        <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                            <label validate-ok="price" class="text-label text-label-imgCode">*客单价：</label>
                            <div class="form-input-item-b flex flex100">
                                <input validate-field="price" validate-type="required,pfloat" type="number" name="group_15" class="text-input" maxlength="50" placeholder="输入数字" />
                            </div>
                            <span class="font-size-12 gray999">&nbsp;元&nbsp;</span>
                        </div>
                        <div validate-msg="price" class="hide tip">
                            请输入客单价
                        </div>
                    </div>
                    <div id="customerPosition" class="form-item" validate-item="customerPosition" go="#customer-position">
                        <div validate-ok="customerPosition" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                            <label class="text-label text-label-imgCode">*客群定位：</label>
                            <a class="custom-select-header flex layout layout-align-start-center">
                                <div class="custom-select-name">请选择您的品牌的客群定位</div>
                            </a>
                            <i class="caret_right gray999"></i>
                            <input validate-field="customerPosition" validate-type="required" type="hidden" name="group_17" />
                        </div>
                        <div validate-msg="customerPosition" class="hide tip">
                            请选择您的品牌的客群定位
                        </div>
                    </div>
                    <div id="major" for="input" validate-item="major" class="form-item">
                        <div validate-ok="major" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                            <label validate-ok="major" class="text-label text-label-imgCode">*主力产品/服务：</label>
                            <div class="flex flex100">
                            <input validate-field="major" validate-type="required" type="text" name="forceProduct" class="text-input" maxlength="6" placeholder="主力产品或服务（6个字内）" />
                            </div>
                        </div>
                        <div validate-msg="major" class="hide tip">
                            主力产品或服务（6个字内）
                        </div>
                    </div>
                    <div id="remark" nonValidate validate-item="remark" class="form-item">
                        <div validate-ok="remark" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                            <label class="text-label text-label-imgCode">宣传语：</label>
                            <div class="flex">
                                <textarea validate-field="remark" name="introduction" maxlength="10" class="flex100" placeholder="请填写您的品牌宣传语（10字以内）"></textarea>
                            </div>
                        </div>
                        <div validate-msg="remark" class="hide tip">
                        </div>
                    </div>
                </div>
            </div>
            <!-- 底部的按扭 -->
            <div class="btn_box btn_bottom">
                <a id="one-next" href="#" class="btn add-need-btn layout layout-align-center-center"><span class="layout layout-align-center-center">下一步</span></a>
            </div>
    </div>
<?php __slot('passport','footer');?>
</section>
<section data-role="page" id="need-two" data-title="方橙-最专业的招商选址大数据平台" class="contain" data-role="none">
    <header data-role="header" data-theme="b" class="header">
        <a href="#need-one" data-transition="slide" data-direction="reverse" class="nav-icon-back">上一步</a>
        <h1>发布需求</h1>
    </header>
    <div data-role="content" class="detail_content brandNeedH5">
        <div class="detail_main dask-card-main">
            <div class="formwrapper">
                <h3 class="needFormTit1">上传品牌logo</h3>
                <p class="needFormTit">300 x 300 以上</p>
                <div id="brandLogo" validate-item="brandLogo" class="brandNeedImgBox">
                    <div class="default brandNeedH5Img layout layout-align-center-center">
                        <span class="brandNeedH5ImgNo">您还没有上传图片</span>
                    </div>
                    <div class="preview brandNeedH5Img layout layout-align-center-center hide">
                        <img src="/img/detail/white-review.png">
						<div class="load_box hide">
                            <div class="filter"></div>
                            <div class="table">
                                <div class="table-cell">
                                    <span class="icon_load">上传中，请稍候</span>
                                </div>
                            </div>
                        </div>
                    </div>
					<div validate-msg="brandLogo" class="hide tip">
                    </div>
                    <div class="layout uploadContainer">
                        <div class="flex layout layout-align-center-center padding-top-20">
                            <div class="fileinput-button-x fileinput-button btn_box btn_upload flex hide">
                                <div class="postcard btn layout layout-align-center-center">上传图片</div>
                                <input type="file" class="avatarInput input-file avatar-input" ratio-w="300" ratio-h="300" text-container="#brandLogo .btn" errormsg-container="#brandLogo .tip" result-field="#brandLogo .resultValue" preview-default-container="#brandLogo .default" preview-container="#brandLogo .preview" back-page="#need-two"/>
                            </div>
                            <div class="fileinput-button_wx fileinput-button btn_box btn_upload flex" ratio-w="300" ratio-h="300" text-container="#brandLogo .btn" errormsg-container="#brandLogo .tip" result-field="#brandLogo .resultValue" preview-default-container="#brandLogo .default" preview-container="#brandLogo .preview" back-page="#need-two">
                                <div class="postcard_wx btn layout layout-align-center-center">上传图片</div>
                            </div>
                        </div>
                    </div>
                    <input class="resultValue" validate-field="brandLogo" required-msg="请上传品牌logo" validate-type="required" type="hidden" name="brand_logo" />
                </div>
            </div>
        </div>
        <!-- 底部的按扭 -->
        <div class="btn_box btn_bottom">
            <a id="two-next" href="#" class="btn add-need-btn layout layout-align-center-center"><span class="layout layout-align-center-center">下一步</span></a>
        </div>
    </div>
</section>
<section data-role="page" id="need-three" data-title="方橙-最专业的招商选址大数据平台" class="contain" data-role="none">
    <header data-role="header" data-theme="b" class="header">
        <a href="#need-two" data-transition="slide" data-direction="reverse" class="nav-icon-back">上一步</a>
        <h1>发布需求</h1>
    </header>
    <div data-role="content" class="detail_content brandNeedH5">
        <div class="detail_main dask-card-main">
            <div class="formwrapper">
                <h3 class="needFormTit1">上传品牌宣传图片</h3>
                <p class="needFormTit">640 x 360 以上</p>
                <div id="brandxc" validate-item="brandxc" class="brandNeedImgBox">
                    <div class="default brandNeedH5Img brandNeedH5ImgW640H360 layout layout-align-center-center">
                        <span class="brandNeedH5ImgNo">您还没有上传图片</span>
                    </div>
                    <div class="preview brandNeedH5Img brandNeedH5ImgW640H360 layout layout-align-center-center hide">
                        <img src="/img/detail/white-review.png">
						<div class="load_box hide">
                            <div class="filter"></div>
                            <div class="table">
                                <div class="table-cell">
                                    <span class="icon_load">上传中，请稍候</span>
                                </div>
                            </div>
                        </div>
                    </div>
					<div validate-msg="brandxc" class="hide tip">
                    </div>
                    <div class="layout uploadContainer">
                        <div class="flex layout layout-align-center-center padding-top-20">
                            <div class="fileinput-button-x fileinput-button btn_box btn_upload flex hide">
                                <div class="postcard btn layout layout-align-center-center">上传图片</div>
                                <input type="file" class="avatarInput input-file avatar-input" ratio-w="640" ratio-h="360" text-container="#brandxc .btn" errormsg-container="#brandxc .tip" result-field="#brandxc .resultValue" preview-default-container="#brandxc .default" preview-container="#brandxc .preview" back-page="#need-three"/>
                            </div>
                            <div class="fileinput-button_wx fileinput-button btn_box btn_upload flex" ratio-w="640" ratio-h="360" text-container="#brandxc .btn" errormsg-container="#brandxc .tip" result-field="#brandxc .resultValue" preview-default-container="#brandxc .default" preview-container="#brandxc .preview" back-page="#need-three">
                                <div class="postcard_wx btn layout layout-align-center-center">上传图片</div>
                            </div>
                        </div>
                    </div>
                    <input class="resultValue" validate-field="brandxc" required-msg="请上传品牌宣传图片" validate-type="required" type="hidden" name="brand_xc_logo" />
                </div>
            </div>
        </div>
        <!-- 底部的按扭 -->
        <div class="btn_box btn_bottom">
            <a id="three-next" href="#" class="btn add-need-btn layout layout-align-center-center"><span class="layout layout-align-center-center">下一步</span></a>
        </div>
    </div>
</section>
<section data-role="page" id="need-four" data-title="方橙-最专业的招商选址大数据平台" class="contain" data-role="none">
    <header data-role="header" data-theme="b" class="header">
        <a href="#need-three" data-transition="slide" data-direction="reverse" class="nav-icon-back">上一步</a>
        <h1>发布需求</h1>
    </header>
    <div data-role="content" class="detail_content brandNeedH5">
        <div class="detail_main dask-card-main">
            <div class="formwrapper">
                <h3 class="needFormTit1">上传品牌店铺图片</h3>
                <p class="needFormTit">640 x 1008 以上</p>
                <div id="brandshop" validate-item="brandshop" class="brandNeedImgBox">
                    <div class="default brandNeedH5Img brandNeedH5ImgTra layout layout-align-center-center">
                        <span class="brandNeedH5ImgNo">您还没有上传图片</span>
                    </div>
                    <div class="preview brandNeedH5Img brandNeedH5ImgTra layout layout-align-center-center hide">
                        <img src="/img/detail/white-review.png">
						<div class="load_box hide">
                            <div class="filter"></div>
                            <div class="table">
                                <div class="table-cell">
                                    <span class="icon_load">上传中，请稍候</span>
                                </div>
                            </div>
                        </div>
                    </div>
					<div validate-msg="brandshop" class="hide tip">
                    </div>
                    <div class="layout uploadContainer">
						<div class="flex layout layout-align-center-center padding-top-20">
							<div class="fileinput-button-x fileinput-button btn_box btn_upload flex hide">
								<div class="postcard btn layout layout-align-center-center">上传图片</div>
								<input type="file" class="avatarInput input-file avatar-input" ratio-w="640" ratio-h="1008" text-container="#brandshop .btn" errormsg-container="#brandshop .tip" result-field="#brandshop .resultValue" preview-default-container="#brandshop .default" preview-container="#brandshop .preview" back-page="#need-four"/>
							</div>
							<div class="fileinput-button_wx fileinput-button btn_box btn_upload flex" ratio-w="640" ratio-h="1008" text-container="#brandshop .btn" errormsg-container="#brandshop .tip" result-field="#brandshop .resultValue" preview-default-container="#brandshop .default" preview-container="#brandshop .preview" back-page="#need-four">
								<div class="postcard_wx btn layout layout-align-center-center">上传图片</div>
							</div>
						</div>
					</div>
                    <input class="resultValue" validate-field="brandshop" required-msg="请上传品牌宣传图片" validate-type="required" type="hidden" name="brand_shop_logo" />
                </div>
            </div>
        </div>
        <!-- 底部的按扭 -->
        <div class="btn_box btn_bottom">
            <a id="four-next" href="#" class="btn add-need-btn layout layout-align-center-center"><span class="layout layout-align-center-center">下一步</span></a>
        </div>
    </div>
</section>
<section data-role="page" id="need-five" data-title="方橙-最专业的招商选址大数据平台" class="contain" data-role="none">
    <header data-role="header" data-theme="b" class="header">
        <a href="#need-four" data-transition="slide" data-direction="reverse" class="nav-icon-back">上一步</a>
        <h1>发布需求</h1>
    </header>
    <div data-role="content" class="detail_content brandNeedH5">
        <div class="detail_main dask-card-main">
            <div class="formwrapper">
                <h3 class="needFormTit1">上传产品图片</h3>
                <p class="needFormTit">640 x 1008 以上</p>
                <div id="brandImage" validate-item="brandImage" class="brandNeedImgBox">
                    <div class="default brandNeedH5Img brandNeedH5ImgTra layout layout-align-center-center">
                        <span class="brandNeedH5ImgNo">您还没有上传图片</span>
                    </div>
                    <div class="preview brandNeedH5Img brandNeedH5ImgTra layout layout-align-center-center hide">
                        <img src="/img/detail/white-review.png">
						<div class="load_box hide">
                            <div class="filter"></div>
                            <div class="table">
                                <div class="table-cell">
                                    <span class="icon_load">上传中，请稍候</span>
                                </div>
                            </div>
                        </div>
                    </div>
					<div validate-msg="brandImage" class="hide tip">
                    </div>
                    <div class="layout uploadContainer">
                        <div class="flex layout layout-align-center-center padding-top-20">
                            <div class="fileinput-button-x fileinput-button btn_box btn_upload flex hide">
                                <div class="postcard btn layout layout-align-center-center">上传图片</div>
                                <input type="file" class="avatarInput input-file avatar-input" ratio-w="640" ratio-h="1008" text-container="#brandImage .btn" errormsg-container="#brandImage .tip" result-field="#brandImage .resultValue" preview-default-container="#brandImage .default" preview-container="#brandImage .preview" back-page="#need-five"/>
                            </div>
                            <div class="fileinput-button_wx fileinput-button btn_box btn_upload flex" ratio-w="640" ratio-h="1008" text-container="#brandImage .btn" errormsg-container="#brandImage .tip" result-field="#brandImage .resultValue" preview-default-container="#brandImage .default" preview-container="#brandImage .preview" back-page="#need-five">
                                <div class="postcard_wx btn layout layout-align-center-center">上传图片</div>
                            </div>
                        </div>
                    </div>
                    <input class="resultValue" validate-field="brandImage" required-msg="请上传产品图片" validate-type="required" type="hidden" name="brand_product_logo" />
                </div>
                <div class="form-item">
                    <p class="needFormTit">为品牌产品图片打上标签：</p>
                </div>
                <div id="label-1" nonValidate validate-item="label-1" class="form-item">
                    <div validate-ok="label-1" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label">标签一：</label>
                        <input validate-field="label-1" type="text" name="tag[1]" class="text-input" maxlength="4" placeholder="4个字以内"/>
                    </div>
                    <div validate-msg="label-1" class="hide tip"></div>
                </div>
                <div id="label-2" nonValidate validate-item="label-2" class="form-item">
                    <div validate-ok="label-2" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label">标签二：</label>
                        <input validate-field="label-2" type="text" name="tag[2]" class="text-input" maxlength="4" placeholder="4个字以内"/>
                    </div>
                    <div validate-msg="label-2" class="hide tip"></div>
                </div>
                <div id="label-3" nonValidate validate-item="label-3" class="form-item">
                    <div validate-ok="label-3" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label">标签三：</label>
                        <input validate-field="label-3" type="text" name="tag[3]" class="text-input" maxlength="4" placeholder="4个字以内"/>
                    </div>
                    <div validate-msg="label-3" class="hide tip"></div>
                </div>
                <div id="label-4" nonValidate validate-item="label-4" class="form-item">
                    <div validate-ok="label-4" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label">标签四：</label>
                        <input validate-field="label-4" type="text" name="tag[4]" class="text-input" maxlength="4" placeholder="4个字以内"/>
                    </div>
                    <div validate-msg="label-4" class="hide tip"></div>
                </div>
                <div id="label-5" nonValidate validate-item="label-5" class="form-item">
                    <div validate-ok="label-5" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label">标签五：</label>
                        <input validate-field="label-5" type="text" name="tag[5]" class="text-input" maxlength="4" placeholder="4个字以内"/>
                    </div>
                    <div validate-msg="label-5" class="hide tip"></div>
                </div>
            </div>
        </div>
        <!-- 底部的按扭 -->
        <div class="btn_box btn_bottom">
            <a id="five-next" href="#" class="btn add-need-btn layout layout-align-center-center"><span class="layout layout-align-center-center">下一步</span></a>
        </div>
    </div>
<?php __slot('passport','footer');?>
</section>
<section data-role="page" id="need-six" data-title="方橙-最专业的招商选址大数据平台" class="contain" data-role="none">
    <header data-role="header" data-theme="b" class="header">
        <a href="#need-five" data-transition="slide" data-direction="reverse" class="nav-icon-back">上一步</a>
        <h1>发布需求</h1>
    </header>
    <div data-role="content" class="detail_content brandNeedH5">
        <div class="detail_main">
            <div class="formwrapper noPaddingBot">
                <h3 class="needFormTit1">填写拓展需求信息</h3>
                <p class="needFormTit">请提供您的拓展需求</p>
                <div id="cityField" validate-item="city" class="form-item" go="#select-custom-city">
                    <div validate-ok="city" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label text-label-imgCode">*拓展城市：</label>
                        <a class="custom-select-header flex layout layout-align-start-center">
                            <div class="custom-select-name">请选择想要拓展的城市</div>
                        </a>
                        <i class="caret_right gray999"></i>
                        <input validate-field="city" validate-type="required" type="hidden" name="area_id" />
                    </div>
                    <div validate-msg="city" class="hide tip">
                        请选择想要拓展的城市
                    </div>
                </div>
                <div id="propertyField" validate-item="property" class="form-item" go="#select-property">
                    <div validate-ok="property" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label text-label-imgCode">*首选物业：</label>
                        <a class="custom-select-header flex layout layout-align-start-center">
                            <div class="custom-select-name nowrap">请选择首选物业</div>

                        </a>
                        <i class="caret_right gray999"></i>
                        <input validate-field="property" validate-type="required" type="hidden" name="group_36" />
                    </div>
                    <div validate-msg="property" class="hide tip">
                        请选择首选物业
                    </div>
                </div>
                <div id="sizeField" validate-item="size" class="form-item form-item-two">
                    <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label validate-ok="size" class="text-label text-label-imgCode">*面积需求：</label>
                        <div class="form-input-item-b flex flex100">
                            <input id="demand_store_area_small" _name="low" validate-field="size" required-msg="请输入店铺面积" number-msg="请输入数字" validate-type="required,number" type="number" name="group_41[lower]" class="text-input" maxlength="50" placeholder="输入数字" />
                        </div>
                        <span>-</span>
                        <div class="form-input-item-b flex flex100">
                            <input id="demand_store_area_large" _name="up" validate-field="size" required-msg="请输入店铺面积" number-msg="请输入数字" validate-type="required,number" type="number" name="group_41[upper]" class="text-input" maxlength="50" placeholder="输入数字" />
                        </div>
                        <span class="font-size-12 gray999">&nbsp;㎡&nbsp;</span>
                    </div>
                    <div id="demand_error_msg" validate-msg="size" class="hide tip">请输入数字</div>
                </div>
                <div id="shopFormatField" validate-item="shopFormat" class="form-item" go="#select-shopFormat">
                    <div validate-ok="shopFormat" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label text-label-imgCode">*工程条件：</label>
                        <a class="custom-select-header flex layout layout-align-start-center">
                            <div class="custom-select-name">请选择店铺需要的工程条件</div>
                        </a>
                        <i class="caret_right gray999"></i>
                        <input validate-field="shopFormat" validate-type="required" type="hidden" name="group_46" />
                    </div>
                    <div validate-msg="shopFormat" class="hide tip">
                        请选择店铺需要的工程条件
                    </div>
                </div>
                <div id="cooperateTimeField" validate-item="cooperateTime" class="form-item form-item-two">
                    <div class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label validate-ok="cooperateTime" class="text-label text-label-imgCode">*期望年限：</label>
                        <div class="form-input-item-b flex flex100">
                            <input id="periodCooperation_lower" _name="low" validate-field="cooperateTime" validate-type="required,pint" type="number" name="group_40" class="text-input" maxlength="50" placeholder="输入数字" />
                        </div>
                        <span class="font-size-12 gray999">&nbsp;年&nbsp;</span>
                    </div>
                    <div id="periodCooperation_error_msg" validate-msg="cooperateTime" class="hide tip">
                        请输入大于0的数值
                    </div>
                </div>
                <div id="remarkField" nonValidate validate-item="remark" class="form-item">
                    <div validate-ok="remark" class="form-input-wrapper layout layout-align-start-center ui-field-contain">
                        <label class="text-label text-label-imgCode">特色：</label>
                        <div class="flex">
                            <textarea validate-field="remark" name="demand_desc" maxlength="40" class="flex100" placeholder="如品牌特色、开店情况、目标人群、特殊拓展需求等。（40字以内）"></textarea>
                        </div>

                    </div>
                    <div validate-msg="remark" class="hide tip">
                    </div>
                </div>
                <div class="btn_box form-item">
                    <div class="layout layout-align-start-center margin-top-10">
                        <div class="btn_box flex layout layout-align-center-center">
                            <a id="prewNeed" class="btn btn_full_able layout layout-align-center-center">
                                <span>预览</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section data-role="page" id="need-preview" data-title="发布需求" class="contain" data-role="none">
    <div data-role="content" class="detail_content">
        <iframe name="h5container" width="100%" height="100%" frameborder="0"></iframe>
        <div class="fixed_login layout layout-align-center-center">
            <div class="btn_box flex">
                <a href="#need-zero" data-transition="slide" data-direction="reverse" class="btn add-need-btn btn_default layout layout-align-center-center"><span class="layout layout-align-center-center">返回修改</span></a>
            </div>
            <div class="btn_box flex margin-left-20">
                <a id="sendneedBtn" href="#" class="btn add-need-btn layout layout-align-center-center"><span class="layout layout-align-center-center">确认发布</span></a>
            </div>
        </div>
    </div>
</section>
<section data-role="page" id="upload" data-title="方橙-最专业的招商选址大数据平台" class="contain" data-role="none">
    <div class="avatar-modal">
        <header data-role="header" data-theme="b" class="header">
            <a class="avatarClose">取消</a>
            <h1>发布需求</h1>
            <span class="orange cu"><input type="button" class="orange avatar-save" value="确认上传"/></span>
        </header>
        <div class="detail_edit_content ">
            <div class="avatar-wrapper">
            </div>
        </div>
    </div>
</section>
</form>
<div id="formErrorDialog" role="dialog" class="modal fade myDodal">
    <div class="modal-backdrop fade on"></div>
    <div class="modal-dialog">
        <div class="modal-content formwrapper">
            <div class="modal-header">
                <h4 class="modal-title">提示</h4>
            </div>
            <div class="modal-body">
                <p id="formErrorDialog_content"></p>
                <div class="form-group clearfix margin-top-20 btn_box">
                    <button type="button" class="btn btn_full_able close">确认</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php __slot('passport','weixinconfig');?>