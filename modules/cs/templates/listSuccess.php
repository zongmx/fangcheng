<input type="hidden" name='currentcityname' value='<?php echo $currentcityname;?>'>

<div data-role="content" class="detail_content" style="margin-bottom:20px;">
	<div class="pc_offer_detail pc_main_w overflow need-list" style="overflow-y:hidden;">
	    <div class="btn_box btn_box_need margin-top-10 margin-bottom-10 width80">
    	    <a onclick="showDialog('#cs-dialog');" class="btn add-need-btn ui-link"><span class="layout layout-align-center-center"><div class="icon_btn icon_add"></div>&nbsp;发布悬赏</span></a>
    	</div>
		<div class="cl">
			<div class="pc_main_l detail_need_list_wrap detail_need_list_wrap1 ">

			    <!--<div style="position:relative;">
        			<ul id="ftype" class="tv_nav cl">
        				<li data-value="1" <?php /*if ($type == 1){*/?> class="cur" <?php /*}*/?>><a href="/cs/list/demand_type/1">拓展悬赏</a></li>
        				<li data-value="2" <?php /*if ($type == 2){*/?> class="cur" <?php /*}*/?>><a href="/cs/list/demand_type/2">招商悬赏</a></li>
        			</ul>
        			<div class="btn_box btn_oldlist_top">
        				<a href="<?php /*echo  ($type == 2)?'/cs/businessneed?type=cs':'/cs/csneed?type=cs';*/?>" class="btn ui-link">发布悬赏</a>
        			</div>
        		</div>-->
        		<?php
        		if(count($csInfo) > 0 ){?>
				<ul data-scroll data-scroll-datarender class="offer_list bgfff need-list-wrapper">
				<?php foreach ($csInfo as $key => $val){ ?>
					<li onclick="javascript:location.href='/cs/csinfo/csid/<?php echo $val['demand_id']; ?>'"
						class="cl">
						<div class="need_item_top layout">
                        	 <div class="face40">
                        	 	<img alt="" src="<?php echo $val['logo']; ?>">
                        	 </div>
                        	 <div class="flex layout-column margin-left-10 need_item_top_right">
                        	 	<div class="obj-name font-size-16">
                        	 	    <span class="gray333 nowrap" style="width:50%"><?php if($val["demand_type"] == 2 ){?>招商：<?php }else{?>拓展：<?php } ?><?php echo $val['cs_name']; ?></span>
                        	 	    <div style="position: absolute;top: 15px;right: 10px;text-align:right;">
                        	 	        <div class="gray999"><span class="cd8992c" style="font-size: 16px;"><?php echo $val['money_task']; ?></span><span class="cd8992c font-size-12">/悬赏金</span>
                                        </div>
                                        <div class="gray999 honorarium" style="text-align:right;">
                                           <?php if (($val['cs']['result'] != 2 || $val['cs']['result'] != 3)) { ?>
											   <?php if($val['cs']['money_traffic']  > 0 ){ ?>
                                           	<span class="gray333 font-size-12">￥<?php echo $val['cs']['money_traffic'] / 100; ?></span><span class="font-size-12">/车马费</span>
                                           <?php } ?>
											<?php } ?>
											
                                        </div>
                        	 	    </div>
                        	 	</div>
                                <div class="obj_info_msg font-size-12">
                           	       <span class="gray999"><?php if($val["demand_type"] == 2 ){?>招商<?php }else{?>拓展<?php } ?>城市：<?php echo $val['area_str']; ?></span>
                           	    </div>
                        	 </div>
                        </div>
                        <div class="obj-info need-obj-info font-size-15">
                        	<div class="layout need-wrapper-item">
                        		<div class="obj-tag-cs gray999"><?php if($val["demand_type"]  == 2){?>需求业态： <?php }else{ ?>业态：	<?php }?></div>
                        		<div class=" obj-tags-width flex layout-column ">
                        			<p class="nowrap font-size-14"><?php echo $val['cateStr']; ?></p>
                        		</div>
                        	</div>
                        	<?php if($val['demand_type'] == 1 ){
                        	?>
                        	<div class="layout need-wrapper-item">
                        		<div class="obj-tag-cs gray999">首选物业：</div>
                        		<div class=" obj-tags-width flex nowrap font-size-14"><?php echo $val['group_36_info']; ?></div>
                        	</div>
                        	<?php } ?>
                        	<div class="layout need-wrapper-item">
                        		<div class="obj-tag-cs gray999"><?php if($val["demand_type"]  == 2 ){ ?>店铺面积：<?php }else{ ?>面积需求：<?php } ?></div>
                        		<div class="font-size-14"><?php echo $val['minSize']; ?>
                        			㎡-<?php echo $val['maxSize']; ?>㎡
                        		</div>
                        	</div>
                        	<div class="layout need-wrapper-item">
                        		<div class="obj-tag-cs gray999">发布日期：</div>
                        		<div class="font-size-14"><?php echo $val['demand_ctime']; ?></div>
                        	</div>

                        </div>
					</li>
                <?php }?>
				</ul>
			     <?php }else{?>
			     <div style="background: #fff;height: 35px;margin-top: 15px;text-align: center;line-height: 34px;font-size: 12px;color: #666666;"><a href="javascript:window.location.href='<?php echo ($type == 2)?'/cs/businessneed?type=cs':'/cs/csneed?type=cs';?>'" >马上发布悬赏，成为悬赏第一人吧！</a></div>
			     <?php }?>
			     <div data-scroll-url="" class="hide"></div>
			</div>
		</div>
	</div>
</div>
<div id="cs-dialog" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal dialog_qrcode" style="height: 1489px;">
    <div class="modal-backdrop fade" style="height: 1489px;"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="sub-dialog_close" type="button" data-dismiss="modal" class="close ui-btn ui-shadow ui-corner-all"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 id="sub-dialog-title" class="modal-title">发布悬赏</h4>
            </div>
            <div class="modal-body">
                <div class="qrcode_box">
                    <p id="sub-dialog_content" class="font-size-14">手机端暂时没有开通该功能，尽情期待！<br>发布悬赏请登录PC版方橙 www.fangcheng.cn。</p>
                    <div class="form-group clearfix question_btn guide_btn margin-top-20">
                        <div class="btn_box hide">
                            <button id="confirm-btn" type="button" data-dismiss="modal" class="btn btn-default btn-orange close font-size-14 ui-btn ui-shadow ui-corner-all"></button>
                        </div>
                        <div id="btn_more" class="margin-top-10 flex btn_box ">
                            <button id="cancel_btn" type="button" data-dismiss="modal" class="btn btn-default btn-orange close font-size-14 ui-btn ui-shadow ui-corner-all">知道了</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>