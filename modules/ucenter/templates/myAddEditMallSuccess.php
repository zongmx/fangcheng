<article data-role="page" id="registerTwo" data-title="方橙"
	class="contain register gray_bg">
	<form id="userInfo" action="{actionUrl}" method="post">
		<input type="hidden" name="passport_mall_id"
			value="<?php echo $passport_mall_id;?>"> 
		<header data-role="header" data-theme="b" class="header">
			<a href="/ucenter/mymall<?php echo  !empty($url)?'/url/'.$url:'';?>"
				data-shadow="false" class="nav-icon-back ui-link ui-btn-left ui-btn ui-corner-all">招商管理</a>
			<h1>商业体招商项目</h1>
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
                <div class="deletess">
            		<div for="input" id="mallName" class="form-item"
            			validate-item="add_mall_name">
            			<div validate-ok="add_mall_name"
            				class="form-input-wrapper layout layout-align-start-center ui-field-contain">
            				<label class="text-label text-label-imgCode">商业体名称：</label> <a
            					class="custom-select-header layout layout-align-start-center flex nameFilter2"
            					href="#other-mall" data-transition="slide">
            					<div class="custom-select-name nowrap"><?php echo empty($mall_name)?'请选择您负责的商业体':$mall_name;?></div>
            				</a> <i class="caret_right"></i> 
            				<input _name="mall_name" type="hidden" name="mall_name" validate-field="add_mall_name" validate-type="required" value="{mall_name}" /> 
            				<input _name="mall_id" type="hidden" name='mall_id' value="{mall_id}" />
            			</div>
            			<div validate-msg="add_mall_name" class="hide tip">请填写负责商业体名称</div>
            		</div>
            		<div for="a" id="city" class="form-item" validate-item="add_city">
            			<div validate-ok="add_city"
            				class="form-input-wrapper layout layout-align-start-center ui-field-contain">
            				<label class="text-label text-label-imgCode">*所在城市：</label> <a
            					class="custom-select-header layout layout-align-start-center flex city2"
            					href="#select-custom-city" data-transition="slide">
            					<div class="custom-select-name nowrap">
            						<span><?php if(empty($area_name)){ ?>选择城市<?php }else{ echo $area_name;}?></span>
            					</div>
            				</a> <i class="caret_right"></i> 
            				<input id="area_ids_list" validate-field="add_city" validate-type="required" type="hidden" name="area_id" value="{area_id}">
            			</div>
            			<div validate-msg="add_city" class="hide tip">请填写所在城市信息</div>
            		</div>
            	</div>
				<div data-role="footer" class="btn_box form-item" style="height:60px;opacity:1 !important;background:#fff;position: fixed;bottom:0;left:0;width:100%;border-top:1px solid #ddd;">
				    <?php if ($q=='medit'){?>
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
				    <?php }else {?>
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
                     <a href="/ucenter/mypro/mdel/id/<?php echo $passport_mall_id;?>" class="btn btn_orange layout layout-align-center-center ui-link margin-left-10 flex">
                         <span class="font-size-15">确认删除</span>
                     </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/ucenter/mallEdit.js"></script>
