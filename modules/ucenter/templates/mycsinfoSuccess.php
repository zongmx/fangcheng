<div data-role="page" class="ui-page ui-page-theme-a ui-page-active contain gray_bg" style="min-height: 653px;">
<header data-scroll-down="" data-scroll-top="53px" data-role="header" data-theme="b" class="header ui-header ui-bar-b" role="banner">
		<a href="javascript:location.href='/ucenter/mycs/type/2'" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back ui-link ui-btn-left ui-btn ui-corner-all" role="button">发布的悬赏</a>
		<h1 class="ui-title" role="heading" aria-level="1">
			<?php if (0 && $csinfo[0]['cs']['win']['passport_id'] > 0) { ?>
				已完成
			<?php } else { ?>
				<?php if (strtotime($csinfo[0]['cs']['expire_at'] )> strtotime("-1 day") ) {
					?>
					<?php
					if ($csinfo[0]['cs']['status'] == 1 && $csinfo[0]['cs']['result'] == 1) {
						?>
						悬赏中
					<?php } elseif (($csinfo[0]['cs']['status'] == 1 && $csinfo[0]['cs']['result'] == 2)) {
						?>
						已停止
					<?php } elseif (($csinfo[0]['cs']['status'] == 1 && $csinfo[0]['cs']['result'] == 3)) {
						?>
						悬赏中
					<?php }else{ ?>
						审核中
					<?php }
				}else{
					?>
					已停止
				<?php } ?>
				<?php
			}
			?>
	</header>
<div data-role="content" class="detail_content overflow" style="margin-bottom:20px;">
	<div class="pc_offer_detail pc_main_w <?php if ($csinfo[0]['cs']['result']>1) echo 'gray999';?>">
		<div class="offer_detail_top pors bgfff" style="padding:20px 10px 10px">
			<div class="offer_detail_top_info cl">
				<a href="<?php echo !empty($link)?$link:"#";?>" class="detail_offer_face fl"><img src="<?php echo $csinfo['return']['logo'];?>" width="40" height="40"></a>
				<div class="fl info margin-left-10" onclick="javascript:location.href='<?php echo ($csinfo[0]['status']== 1)?$link2:"#";?>'">
					<a href="/demand/csinfo/csid/{csinfo['return']['demand_id']}">
						<p class="tit margin0 font-size-16"><a href="<?php echo !empty($link)?$link:"#";?>"><span class="<?php if ($csinfo[0]['cs']['result']==1) echo 'orange';?>"><?php if($csinfo['return']['demand_type'] == 2){?>招商：<?php }else{?>拓展：<?php } ?><?php echo $csinfo['return']['cs_name']?></span></a></p>
						<p class="margin0 font-size-15">￥<?php echo $csinfo['return']['money_task'];?>/悬赏金</p>
					</a>
				</div>
			</div>
			<div class="font-size-14">
			    <p class="margin0 " style="margin-top:4px"><span class="gray999 font-size-15"><?php if($csinfo['return']['demand_type'] == 2){ ?>需求业态：<?php }else{?>所属业态：<?php } ?></span><?php echo($csinfo['return']['category_str']);?></p>
				<?php if($csinfo['return']['demand_type'] == 1 ){?>
					<p class="margin0 " style="margin-top:4px"><span class="gray999 font-size-15">首选物业：</span><?php echo($csinfo['return']['group_36_str']);?></p>
				<?php } ?>
            	<p class="nowrap2 margin0" style="margin-top:4px"><span class="gray999 font-size-15"><?php if($csinfo['return']['demand_type'] == 2){ ?>店铺面积：<?php }else{?>面积需求：<?php } ?></span><?php echo $csinfo['return']['min_size'];?>-<?php echo $csinfo['return']['max_size']?> ㎡</p>
            	<p class="time margin0" style="margin-top:4px"><span class="gray999 font-size-15">发布日期：</span><?php echo substr($csinfo[0]['demand_ctime'],0,10);?></p>
            </div>
			<?php if (0 && $csinfo[0]['cs']['win']['passport_id'] > 0) { ?>
				<img src="/img/bookmarkgrey.png" class="posa" style="width:68px;top:0;right:0;">
			<?php } else { ?>
				<?php if (strtotime($csinfo[0]['cs']['expire_at'] )> strtotime("-1 day") ) {
					if ($csinfo[0]['cs']['status'] == 1 && $csinfo[0]['cs']['result'] == 1) {
						?>
						<img src="/img/bookmarkgold.png" class="posa" style="width:68px;top:0;right:0;">
					<?php } elseif (($csinfo[0]['cs']['status'] == 1 && $csinfo[0]['cs']['result'] == 2)) {
						?>
						<img src="/img/bookmarkgrey2.png" class="posa" style="width:68px;top:0;right:0;">
					<?php } elseif (($csinfo[0]['cs']['status'] == 1 && $csinfo[0]['cs']['result'] == 3)) {
						?>
						<img src="/img/bookmarkgrey.png" class="posa" style="width:68px;top:0;right:0;">
					<?php }else{ ?>
						<img src="/img/bookmarkgold2.png" class="posa" style="width:68px;top:0;right:0;">
					<?php }

				}else{
					?>
					<img src="/img/bookmarkgrey2.png" class="posa" style="width:68px;top:0;right:0;">
				<?php } ?>
				<?php
			}
			?>

		</div>
		<?php if(isset($passportWinApply)) {?>
        			<div class="margin-top-20 bgfff text-center font-size-14 posr" style="padding:10px;background:#fdf5e6;">
        				<div class="layout">
        					<div class="face40">
        						<img src="<?php getLogoimage(['brand_id'=>$passportWinApply['brand_id']], 'src',true);?>" onerror="this.src='/img/detail/logo_big.png'" onclick=" window.location.href='/ucenter/index/passport_id/<?php echo $passportWinApply['passport_id']?>'">
        					</div>
        					<div class="flex layout-column margin-left-10 need_item_top_right" style="text-align:left;">
        						<div class="obj-name font-size-15"><span class="gray333"><a {url} style="color:#333;"><?php echo (!empty($passportWinApply['brand_name']) ? $passportWinApply['brand_name'] : $passportWinApply['mall_name']);?></a></span></div>
        						<div class="obj_info_msg font-size-12">
        							<span>拓展城市：<?php echo $passportWinApply['area_name'];?></span>
        						</div>
        					</div>
        				</div>
        				<div class="text-left margin-top-10">
        					<div class="u-info">
        						<div class="font-size-15 nowrap">
        							<span class="gray999">申请人：</span><span class="gray333"><?php echo  $passportWinApply['passport_name'];?></span><span class="gray999 posa" style="right:0;">预约看场：<span style="color:#000;"><?php echo substr($passportWinApply['cs_passport_apply_ctime'],0,10); ?></span></span>
        						</div>
        					</div>
        				</div>
        				<img src="/img/detail/u513.png" class="checked" width="80" height="35" style="transform: rotateZ(-25deg);position: absolute;top: 6px;right: 10px;">
        			</div>
        		</div>
        		<?php } ?>
		<div class="margin-top-20 cl">
			<div class="pc_main_l">
				<div class="bgfff cl">
					<div style="border:1px solid #e4e4e4;">
						<ul class="tv_nav cl">
						      <li style="width: 25%" <?php if ($req == 1){?> class="cur" <?php }?>  ><a href="/ucenter/mycsinfo/csid/<?php echo $csinfo['return']['demand_id']?>/search/1/req/1" class="ui-link" >待处理<br>({passportApplyCount[1]})</a></li>
						      <li style="width: 25%"  <?php if ($req == 2){?> class="cur" <?php }?> ><a href="/ucenter/mycsinfo/csid/<?php echo $csinfo['return']['demand_id']?>/search/1/req/2" class="ui-link">待确认<br>({passportApplyCount[2]})</a></li>
						      <li style="width: 25%" <?php if ($req == 4){?> class="cur" <?php }?>><a href="/ucenter/mycsinfo/csid/<?php echo $csinfo['return']['demand_id']?>/search/2/req/4" class="ui-link">待选中标<br>({passportApplyCount[4]})</a></li>
						      <li style="width: 25%" <?php if ($req == 3){?> class="cur" <?php }?>><a href="/ucenter/mycsinfo/csid/<?php echo $csinfo['return']['demand_id']?>/search/1/req/3" class="ui-link">已拒绝<br>({passportApplyCount[3]})</a></li>
						</ul>
						<!-- <div class="pc_cus_fliter cl <?php if ($search == 2){echo 'hide';}?>">
							<div class="pc_cus_fliter_tab">状态：</div>
							<ul id="searchSort" class="cl">
								 <li class="cur"><a href="#" class="ui-link">全部</a></li> 
								<li <?php if ($req == 1){?> class="cur" <?php }?> ><a href="/ucenter/mycsinfo/csid/<?php echo $csinfo['return']['demand_id']?>/search/1/req/1" class="ui-link">未处理</a></li>
								<li <?php if ($req == 2){?> class="cur" <?php }?>><a href="/ucenter/mycsinfo/csid/<?php echo $csinfo['return']['demand_id']?>/search/1/req/2" class="ui-link">已同意</a></li>
								<li <?php if ($req == 3){?> class="cur" <?php }?>><a href="/ucenter/mycsinfo/csid/<?php echo $csinfo['return']['demand_id']?>/search/1/req/3" class="ui-link">已拒绝</a></li>
							</ul>
			            </div>-->
					</div>
				</div>
				<?php if ($search == 1){?>

					<?php foreach ($passportApply as $key => $val){
					$url = '';
					if(!empty($val['mall_id'])){
						$url = "href=\"/details/mall/mall_id/{$val['mall_id']}\"";
					} else if(!empty($val['brand_id'])){
						$url = "href=\"/details/brand/brand_id/{$val['brand_id']}\"";
					}
//						var_dump($passportApply);
//						exit();
					?>
			<?php if(count($passportApply ) > 0) { $demandType = $passportApply[0]['demand_type'];?>
                    <div class="bgfff text-center font-size-14 posr" style="padding:16px 10px 10px;border-bottom:1px solid #e4e4e4;">
				    <div class="layout">
                		<div class="face40">
                		    <img src="<?php getLogoimage(['brand_id'=>$val['brand_id']], 'src',true);?>" onerror="this.src='/img/detail/logo_big.png'" onclick=" window.location.href='/ucenter/index/passport_id/<?php echo $val['passport_id']?>'">
                		</div>
                		<div class="flex layout-column margin-left-10 need_item_top_right" style="text-align:left;">
                            <div class="obj-name font-size-15"  style="width:50%;"><span class="gray333"><a {url} style="color:#333;"><?php echo (!empty($val['brand_name']) ? $val['brand_name'] : $val['mall_name']);?></a></span></div>
                            <div class="obj_info_msg font-size-12">
                            	<span>所在城市：<?php echo $val['area_name'];?></span>
                            </div>
                        </div>
                	</div>
                	<div class="text-left margin-top-10">
                         <div class="u-info">
                            <div class="font-size-15 nowrap">
                                <span class="gray999">申请人：</span><span class="gray333"><?php echo  $val['passport_name'];?></span><span class="gray999 posa" style="right:0;">预约看场：<span style="color:#000;"><?php echo substr($val['cs_passport_apply_agree_at'],0,10); ?></span></span>
                            </div>
                         </div>
                    </div>
                    <div class="btn_box posa" style="height:30px;line-height:30px;width:30%;top:6px;right:10px;">
                        <a class="btn btn_default layout layout-align-center-center  ui-link" href="/letter/send/receiver_id/<?php echo $val['passport_id'];?>">
                            <div class="icon_btn icon_message3"></div>
                            <span class="font-size-14">发送私信</span>
                        </a>
                    </div>
							<?php if ($val['cs_passport_apply_status'] == 0){?>
								<div class="layout layout-align-start-center margin-top-10">
                                                    	<div class="btn_box flex">
									<a onclick="doOperate('#apply_status_agree',this);" href="#" class="btn  btn_full_able layout layout-align-center-center " data-demand_id="<?php echo $csinfo['return']['demand_id']?>" data-apply_id="<?php echo $val['cs_passport_apply_id']; ?>" data-dotype="1">同意看场</a>
								</div>
                                <div class="margin-left-10 flex btn_box">
									<a onclick="doOperate('#apply_status_refuse',this);" class="btn btn_default layout layout-align-center-center" href="#" data-demand_id="<?php echo $csinfo['return']['demand_id']?>" data-apply_id="<?php echo $val['cs_passport_apply_id']; ?>" data-dotype="2">拒绝看场</a>
								</div>
								</div>
								<!-- 申请状态 -->
							<?php }elseif ($val['cs_passport_apply_status'] == 1){?>
								 <div class="layout layout-align-start-center margin-top-10">
								 <div class="btn_box flex">
									<a onclick="doOperate('#apply_status_confirm',this);" href="#"  class="btn  btn_full_default layout layout-align-center-center  ui-link" data-demand_id="<?php echo $csinfo['return']['demand_id'];?>" data-apply_id="<?php echo $val['cs_passport_apply_id']; ?>" data-dotype="3">确认到场</a>
								</div>
								</div>
								<?php }elseif($val['cs_passport_apply_winner'] > -0 ){?>
									<span class="font-size-12 gray999">已确认</span>
								<!-- 已同意 -->
								<?php ?>
							<?php }elseif ($val['cs_passport_apply_status'] == -1){?>
							    <div class="layout layout-align-start-center margin-top-10">
                                <div class="btn_box flex">
								   <a href="#"  class="btn  btn_full_disable layout layout-align-center-center  ui-link"><span class="font-size-14">已拒绝</span></a>
								 </div>
                                 </div>
							<?php }?>
					<?php if($req == 3){?>
								<?php if ($val['winnershow'] != 1){?>
								<?php }?>
                    <div class="layout layout-align-start-center margin-top-10">
                    	<?php if($val["cs_passport_apply_winner"] > 0 ){ ?>
						<div class="btn_box flex">
                    		<a class="btn  btn_full_able layout layout-align-center-center  ui-link" href="">
								<a onclick="doOperate('#paywinner',this);" data-mb="<?php echo empty($val['mall_name'])?$val['brand_name']:$val['mall_name'];?>" data-passport-name="<?php echo $val['passport_name'];?>" href="#" class="btn btn_full_able ui-link" data-demand_id="<?php echo $csinfo['return']['demand_id']?>" data-apply_id="<?php echo $val['cs_passport_apply_id']; ?>" data-dotype="4" style="line-height:40px;">选为中标方</a> <!-- btn_full_disable 不可用class -->
                            </a>
                    	</div>
						<?php }else{  ?>
						<?php }?>
                    </div>
					<?php }?>
					<?php if($req == 4){?>
                    <div class="layout layout-align-start-center margin-top-10">
                    	<div class="btn_box flex">
                    		<a class="btn  btn_full_disable layout layout-align-center-center  ui-link" href="">
                                <span class="font-size-14">已拒绝</span>
                            </a>
                    	</div>
                    </div>
					<?php }?>
					</div>
					<?php }else{ ?>
						<span class="gray999 font-size-14">目前还没有人申请你的悬赏，暂时不能进行其他操作。</span>
					<?php }  ?>
					<?php }  ?>
				</div>
		        <?php }elseif ($search == 2){?>
				<?php foreach ($passportApply as $key => $val){
					$url = '';
					if(!empty($val['mall_id'])){
						$url = "href=\"/details/mall/mall_id/{$val['mall_id']}\"";
					} else if(!empty($val['brand_id'])){
						$url = "href=\"/details/brand/brand_id/{$val['brand_id']}\"";
					}
					?>
					<?php if(count($passportApply ) > 0) { $demandType = $passportApply[0]['demand_type'];?>
						<div class="bgfff text-center font-size-14 posr" style="padding:16px 10px 10px;border-bottom:1px solid #e4e4e4;">
						<div class="layout">
							<div class="face40">
								<img src="<?php getLogoimage(['brand_id'=>$val['brand_id']], 'src',true);?>" onerror="this.src='/img/detail/logo_big.png'" onclick=" window.location.href='/ucenter/index/passport_id/<?php echo $val['passport_id']?>'">
							</div>
							<div class="flex layout-column margin-left-10 need_item_top_right" style="text-align:left;">
								<div class="obj-name font-size-15"><span class="gray333"><a {url} style="color:#333;"><?php echo (!empty($val['brand_name']) ? $val['brand_name'] : $val['mall_name']);?></a></span></div>
								<div class="obj_info_msg font-size-12">
									<span>拓展城市：<?php echo $val['area_name'];?></span>
								</div>
							</div>
						</div>
						<div class="text-left margin-top-10">
							<div class="u-info">
								<div class="font-size-15 nowrap">
									<span class="gray999">申请人：</span><span class="gray333"><?php echo  $val['passport_name'];?></span><span class="gray999 posa" style="right:0;">预约看场：<span style="color:#000;"><?php echo substr($val['cs_passport_apply_ctime'],0,10); ?></span></span>
								</div>
							</div>
						</div>
							<?php if ($val['status'] == 1){?>
						<div class="btn_box posa" style="height:30px;line-height:30px;width:30%;top:6px;right:10px;">
							<a class="btn btn_default layout layout-align-center-center  ui-link" href="/letter/send/receiver_id/<?php echo $val['passport_id'];?>">
								<div class="icon_btn icon_message3"></div>
								<span class="font-size-14">发送私信</span>
							</a>
						</div>
							<?php } ?>
						<?php if ($val['cs_passport_apply_winner'] == 1){?>
							<img src="/img/detail/u513.png" class="checked" width="80" height="35" style="transform: rotateZ(-25deg);position: absolute;top: 6px;right: 10px;">
						    </div>
							<?php }else{
							?>
							<?php if ($val['winnershow'] != 1){?>
								<div class="btn_box offer_tag margin-top-10">
									<a onclick="doOperate('#paywinner',this);" data-mb="<?php echo empty($val['mall_name'])?$val['brand_name']:$val['mall_name'];?>" data-passport-name="<?php echo $val['passport_name'];?>" href="#" class="btn btn_full_able ui-link" data-demand_id="<?php echo $csinfo['return']['demand_id']?>" data-apply_id="<?php echo $val['cs_passport_apply_id']; ?>" data-dotype="4" style="line-height:40px;">选为中标</a> <!-- btn_full_disable 不可用class -->
								</div>
							<?php }?>
							<?php } ?>
				    </div>
					<?php }else{ ?>
						<span class="gray999 font-size-14">目前还没有人申请你的悬赏，暂时不能进行其他操作。</span>
					<?php }  ?>
				<?php }  ?>
			</div>
	
			<?php } ?>
			</div>
				<script type="text/javascript">
					$(function(){
						$(".offer_user_list li").click(function(){
							var dom = $(this);
							var passport_id = dom.attr('data-passport_id'),
								demand_id = dom.attr('data-demand_id');
							$.get('/ucenter/ajaxapplyinfo/passport_id/'+passport_id+'/csid/'+demand_id,function(data) {
								$(".offer_user_fiexd").addClass("cur").html(data);
							});
							return false;
						});
						$(document).on("click", "body",function(e){
							var target = $(e.target);
							if(target.closest(".offer_user_fiexd").length == 0) {
								$(".offer_user_fiexd").removeClass("cur");
							}
						});
					});
				</script>
			</div>
		</div>
	</div>
</div>
<div id="paywinner" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
	<div class="modal-backdrop fade"></div>
	<div class="modal-dialog" style="width:300px;margin-left:-150px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 id="myModalLabel" class="modal-title">提示</h4>
            </div>
			<div class="modal-body">
				<p class="font-size-14">你确认选择&nbsp;<span id="paywinner-mb" class="orange"></span>&nbsp;的邀请人&nbsp;<span id="paywinner-passport-name" class="orange"></span>&nbsp;为此次悬赏的中标方，确认后，悬赏金将会全部支付给此人！</p>
			</div>
			<div class="reward_modal_foot layout layout-align-center">
				<div class="btn_box" style="width:120px;">
					<a href="#" class="close btn btn_default" style="line-height:40px;">取消</a>
				</div>
				<div class="margin-left-20 btn_box font-size-14" style="width:120px;line-height:40px;">
					<a href="#" onclick="dopay('#paywinner');" class="btn">确认</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="apply_status_agree" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
	<div class="modal-backdrop fade"></div>
	<div class="modal-dialog" style="width:300px;margin-left:-150px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 id="myModalLabel" class="modal-title">提示</h4>
            </div>
			<div class="modal-body">
				<p class="font-size-14 text-center">同意看场表示您认同申请者的资质，并同意看场。</p>
			</div>
			<div class="reward_modal_foot layout layout-align-center">
				<div class="btn_box" style="width:120px;">
					<a href="#" class="close btn btn_default"  style="line-height:40px;">取消</a>
				</div>
				<div class="margin-left-20 btn_box" style="width:120px;">
					<a href="#" onclick="dopay('#apply_status_agree');" class="btn font-size-14"" style="line-height:40px;">同意看场</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="apply_status_confirm" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
	<div class="modal-backdrop fade"></div>
	<div class="modal-dialog" style="width:300px;margin-left:-150px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 id="myModalLabel" class="modal-title">提示</h4>
            </div>
			<div class="modal-body">
				<p class="font-size-14 text-center">您是否确认申请人已经到场。</p>
			</div>
			<div class="reward_modal_foot layout layout-align-center">
				<div class="btn_box" style="width:120px;">
					<a href="#" class="close btn btn_default" style="line-height:40px;">取消</a>
				</div>
				<div class="margin-left-20 btn_box" style="width:120px;">
					<a href="#" onclick="dopay('#apply_status_confirm');" class="btn font-size-14" style="line-height:40px;">确认到场</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="apply_status_refuse" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" class="modal fade myDodal">
	<div class="modal-backdrop fade"></div>
	<div class="modal-dialog" style="width:300px;margin-left:-150px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 id="myModalLabel" class="modal-title">提示</h4>
            </div>
			<div class="modal-body">
				<p class="font-size-14">您确定要拒绝本次看场申请吗？</p>
				<div class="form-item font-size-12">
					<textarea id="desccontent" style="border:1px solid #e4e4e4;" placeholder="请填写拒绝理由"></textarea>
				</div>
				<p style="font-size:12px;color:#999;text-align:right;padding:5px 0;"><span class="cou" id="fountCount">0</span>/<span class="count">100</span></p>
			</div>
			<div class="reward_modal_foot layout layout-align-center">
				<div class="btn_box" style="width:120px;">
					<a href="#" class="close btn btn_default" style="line-height:40px;">取消</a>
				</div>
				<div class="margin-left-20 btn_box" style="width:120px;">
					<a href="#" onclick="dopay('#apply_status_refuse');" class="btn font-size-14" style="line-height:40px;">拒绝看场</a>
				</div>
			</div>
		</div>
	</div>
</div>
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
<form id="payform" action="/ucenter/dopassportapply/">
	<input id="payform-demand_id" type="hidden" name="demand_id" />
	<input id="payform-apply_id" type="hidden" name="apply_id" />
	<input id="payform-dotype" type="hidden" name="dotype" />
	<input id="payform-desc" type="hidden" name="desc" />
</form>
<script type="text/javascript">
	(function (){
		var timer=null;
		var oT = $("#desccontent");
		$("#fountCount").html(oT.val().length);
		oT.focus(function(){ //店铺介绍不能超过140个字
			timer=setInterval(function(){
				if(oT.val().length>100){
					oT.val(oT.val().substring(0,100)) ;
				}
				$("#fountCount").html(oT.val().length);
				$('#payform-desc').val(oT.val());
			},30);	
		});
		oT.blur=function(){
			clearInterval(timer);	
		}
	})();
	function doOperate(dialog,dom) {
		var _d = $(dom);
		$('#payform-demand_id').val(_d.attr('data-demand_id'));
		$('#payform-apply_id').val(_d.attr('data-apply_id'));
		$('#payform-dotype').val(_d.attr('data-dotype'));
		if(dialog == '#paywinner') {
			$('#paywinner-mb').html(_d.attr('data-mb'));
			$('#paywinner-passport-name').html(_d.attr('data-passport-name'));
		}
		showDialog(dialog);
	}

	function dopay(dialog) {
		hideDialog(dialog);
		commonUtilInstance.submitSignup('#payform','{jumpurl}');
		$('#payform-demand_id,#payform-apply_id,#payform-dotype,#payform-desc').val('');
	}
							
</script>
</div>