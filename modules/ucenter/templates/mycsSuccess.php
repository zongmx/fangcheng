<script type="text/javascript">
	//$('body').css('visibility', 'hidden');
</script>
<section data-role="page" id="main_index_1" data-title="方橙-最专业的招商选址大数据平台" class="contain gray_bg" >
	<header data-scroll-down data-scroll-top="53px" data-role="header" data-theme="b"class="header">
		<a href="javascript:location.href='/ucenter/informationofmine'" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back">我的</a>
		<h1>发布的悬赏</h1>
	</header>
<div data-role="content" class="detail_content" style="margin-bottom:20px;overflow-y:hidden;">
	<!-- content -->

    <div class="pc_main_w overflow cl detail_reward">
    	<div class="pc_account_offer">
			<div class="bgfff gray999" style="border-bottom:1px solid #e4e4e4">
		       <!--  <div class="pc_cus_fliter cl"> -->
					<!-- <div class="pc_cus_fliter_tab">状态：</div> -->
					<ul id="searchSort" class="tv_nav cl font-size-14" style="overflow: visible;vertical-align: middle;">
						<li <?php if ($stype == 2){?> class="cur" <?php }?>><a href="/ucenter/mycs/type/2" class="ui-link">悬赏中<br>({cscount['2']})</a></li>
						<li <?php if ($stype == 3){?> class="cur" <?php }?>><a href="/ucenter/mycs/type/3" class="ui-link">审核中<br>({cscount['3']})</a></li>
						<li <?php if ($stype == 4){?> class="cur" <?php }?>><a href="/ucenter/mycs/type/4" class="ui-link">已完成<br>({cscount['4']})</a></li>
						<li <?php if ($stype == 5){?> class="cur" <?php }?>><a href="/ucenter/mycs/type/5" class="ui-link">已停止<br>({cscount['5']})</a></li>
					</ul>
					<!-- <ul class="tv_nav cl">
						      <li style="width: 120px;" <?php if ($req == 1){?> class="cur" <?php }?>  ><a href="/ucenter/mycsinfo/csid/<?php echo $csinfo['return']['demand_id']?>/search/1/req/1" class="ui-link" >待处理<?php if ($passportApplyCount[1]){?> (<?php echo $passportApplyCount[1]; ?>)<?php  } ?></a></li>
						      <li style="width: 120px;"  <?php if ($req == 2){?> class="cur" <?php }?> ><a href="/ucenter/mycsinfo/csid/<?php echo $csinfo['return']['demand_id']?>/search/1/req/2" class="ui-link">待确认<?php if ($passportApplyCount[2]){?> (<?php echo $passportApplyCount[2]; ?>)<?php  } ?></a></li>
						      <li style="width: 120px;" <?php if ($req == 4){?> class="cur" <?php }?>><a href="/ucenter/mycsinfo/csid/<?php echo $csinfo['return']['demand_id']?>/search/2/req/4" class="ui-link">待选中标<?php if ($passportApplyCount[4]){?> (<?php echo $passportApplyCount[4]; ?>)<?php  } ?></a></li>
						      <li style="width: 120px;" <?php if ($req == 3){?> class="cur" <?php }?>><a href="/ucenter/mycsinfo/csid/<?php echo $csinfo['return']['demand_id']?>/search/1/req/3" class="ui-link">已拒绝<?php if ($passportApplyCount[3]){?> (<?php echo $passportApplyCount[3]; ?>)<?php  } ?></a></li>
						</ul> -->
	            <!-- </div> -->
			</div>
			<div class="">
				<div class="pc_account_offer_items">
					<div class="offer_item_tit cl">
						<!--<div class="offer_info fl">
							<b>悬赏摘要</b>
						</div>
						<div class="offer_num fl">参与人数</div>
						<div class="offer_num fl">看场申请</div>
						<div class="offer_num fl">确认看场</div>-->
					</div>
					<?php if (empty($csinfo)){?>
    	            <div class="offer_no_con bgfff" style="padding-top:1px;">
    	        	  <p class="text-center font-size-14 gray999" style="padding-bottom:10px;">暂无悬赏需求，现在就去pc端发布一个悬赏</a><br/>或&nbsp;&nbsp;<a href="/cs/list"style="text-decoration: underline;
                                                                                                                                                                                                                                 color: #efbd59 !important;">查看其他悬赏</a></p>
    	            </div>
					<?php }else {?>
					<?php foreach ($csinfo as $key => $val){?>
					<div onclick="javascript:location.href=<?php if($stype == 3){ ?>'/cs/csinfo/csid/<?php echo $val['demand_id'];?>'<?php }else{ ?>'/ucenter/mycsinfo/csid/<?php echo $val['demand_id'];?>'<?php } ?>" class="bgfff offer_item cl layout layout-align-start-center posr padding-top-10 padding-bottom-10 margin-bottom-10 <?php if($stype >3)echo 'gray999'?>">

						<div class="offer_info fl width100 padding-left-10">
							<!--<strong><a href="#"><?php echo $val['cs_name']?></a></strong>
							<p class="nowrap2 cons">悬赏金￥<?php echo $val['money_task'];?> / <?php echo $val['minSize'];?>㎡-<?php echo $val['maxSize'];?>㎡ /<?php echo $val['cateStr']?></p>
							<p class="time"><?php echo $val['cs']['expire_at'];?></p>-->

                            <div class="need_item_top layout">

                                <div class="face40">
                                	<img alt="" src="<?php echo $val['logo']; ?>">
                                </div>
                                <div class="flex layout-column margin-left-10 need_item_top_right">
                                	<div class="obj-name font-size-16">
                                	    <span class="<?php if ($stype > 3) echo 'gray999'; else echo 'gray333'?> nowrap" style="width:50%"><?php if($val['demand_type'] == 2){?>招商：<?php }else{ ?>拓展：<?php } ?><?php echo $val['cs_name']; ?></span>
                                	</div>
                                     <div class="gray999"><span class="<?php if ($stype <= 3) echo 'cd8992c'?>" style="font-size: 16px;">￥<?php echo $val['cs']['money_total']/100; ?></span><span class="<?php if ($stype <= 3) echo 'cd8992c'?> font-size-12">/悬赏金</span><?php if (($val['cs']['result'] != 2 || $val['cs']['result'] != 3) && $val["cs"]["money_traffic"] > 0) { ?>
                                        &nbsp;&nbsp;<span class="<?php if ($stype <= 3) echo 'gray333'?> font-size-12">￥<?php echo $val['cs']['money_traffic'] / 100; ?></span><span class="font-size-12">/车马费</span>                                                                                                                                                                                                                        <?php } ?>
                                     </div>
                                     <div class="obj_info_msg font-size-12">
                                	       <span class="gray999"><?php if($val['demand_type'] == 2 ){?>招商<?php }else{?>拓展<?php } ?>城市：<?php echo $val['area_name']; ?></span>
                                     </div>
                                </div>
                            </div>
                            <div class="obj-info need-obj-info font-size-14">
                            	<div class="layout need-wrapper-item">
                            		<div class="obj-tag-cs gray999"><?php if($type == 2){?>需求业态：     <?php }else{ ?>所属业态：	<?php }?></div>
                            		<div class="obj-tags-width flex layout-column ">
                            			<p class="nowrap" style="margin:0"><?php echo $val['cateStr']; ?></p>
                            		</div>
                            	</div>
                            	<?php if($type == 1 ){
                            	?>
                            	<div class="layout need-wrapper-item">
                            		<div class="obj-tag-cs gray999">首选物业：</div>
                            		<div class="obj-tags-width flex nowrap"><?php echo $val['group_36_info']; ?></div>
                            	</div>
                            	<?php } ?>
                            	<div class="layout need-wrapper-item">
                            		<div class="obj-tag-cs gray999"><?php if($type == 2 ){ ?>店铺面积：<?php }else{ ?>面积需求：<?php } ?></div>
                            		<div ><?php echo $val['minSize']; ?>
                            			㎡-<?php echo $val['maxSize']; ?>㎡
                            		</div>
                            	</div>
                            	<div class="layout need-wrapper-item">
                            		<div class="obj-tag-cs gray999">发布日期：</div>
                            		<div ><?php echo $val['demand_ctime']; ?></div>
                            	</div>
                            </div>
						</div>
						<?php if (0 && $val['cs']['win']['passport_id'] > 0) { ?>
							<img src="/img/bookmarkgrey.png" style="width:68px;position:absolute;top:0;right:0;">
						<?php } else { ?>
							<?php if (strtotime($val['cs']['expire_at'] )> strtotime("-1 day") ) {
								if ($val['cs']['status'] == 1 && $val['cs']['result'] == 1) {
									?>
									<img src="/img/bookmarkgold.png" style="width:68px;position:absolute;top:0;right:0;">
								<?php } elseif (($val['cs']['status'] == 1 && $val['cs']['result'] == 2)) {
									?>
									<img src="/img/bookmarkgrey2.png" style="width:68px;position:absolute;top:0;right:0;">
								<?php } elseif (($val['cs']['status'] == 1 && $val['cs']['result'] == 3)) {
									?>
									<img src="/img/bookmarkgrey.png" style="width:68px;position:absolute;top:0;right:0;">
								<?php } elseif (($val['cs']['status'] == 0)) {
									?>
									<img src="/img/bookmarkgold2.png" style="width:68px;position:absolute;top:0;right:0;">
								<?php }
							}else{
								?>
								<img src="/img/bookmarkgrey2.png" style="width:68px;position:absolute;top:0;right:0;">
							<?php } ?>
							<?php
						}
						?>
						<!--<div class="offer_num fl">
							<strong class="count"><?php echo $val['cyrs'];?></strong>
						</div>
						<div class="offer_num fl">
							<strong class="count <?php if($val['kcsq'] > 0){ echo "new";} ?>"><?php echo $val['kcsq'];?></strong>
						</div>
						<div class="offer_num fl">
							<strong class="count"><?php echo $val['qrkc'];?></strong>
						</div>-->
					</div>
							<?php if($stype == 5){?>
					<!--<div class="bgfff btn_box_need margin-bottom-10 width100 font-size-12 posr" style="padding:10px;border:1px solid #e4e4e4;">
                       <span class="count gray999<?php /*if($val['kcsq'] > 0){ echo "new";} */?>">看场申请次数：<span class="orange"><?php /*echo $val['kcsq'];*/?></span>次</span><span class="posa gray999" style="right:42px" onclick="javascript:location=href='/ucenter/mycsinfo/csid/<?php /*echo $val['demand_id'];*/?>'">查看申请详情<i class="icon_btn icon_more posa" style="right:-20px"></i></span>
                    </div>-->
							<?php } ?>
                    <?php }?>

                    <?php }?>

					{__page_code}
				</div>
			</div>
		</div>
		</div>
</div>
	