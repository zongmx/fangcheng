<div data-role="content" class="detail_content" style="margin-bottom:20px;">
	<div class="pc_location">
		<div class="pc_main_w">
			<a href="/ucenter/informationofmine" data-ajax="false" class="ui-link">我的</a> &gt; <a data-ajax="false" href="" class="ui-link cur">我的账户</a>
		</div>
	</div>
	<!-- content -->
	<div class="pc_main_w overflow cl detail_reward" style="margin-top:20px;">
		
		<div class="pc_account_price_lsit bgfff margin-top-20">
			<ul class="tv_nav cl" style="border-bottom: 1px solid #e4e4e4;">
				<li class="cur"><a href="/ucenter/informationofmine" class="ui-link">交易详情</a></li>
			</ul>
			<div class="pc_price_list_tab">
				<p>您的赏金会在悬赏方线下完成交易后的第一时间打到您的可提现账户！</p>
				<table class="explain_table">
					<tr>
						<td>时间</td>
						<td>交易类型</td>
						<td>交易详情</td>
						<td>金额</td>
					</tr>
				<?php if (!empty($passportMoneyLog)){?>
                <?php foreach ($passportMoneyLog as $key => $val){?>
					<tr>
						<td><?php echo $val['passport_money_log_ctime'];?></td>
						<td><?php echo $val['typeStr'];?></td>
						<td><a href='<?php echo empty($val["demand_id"])?"#":'/demand/csinfo/csid/'.$val["demand_id"]?>'><?php echo $val['descStr'];?></a></td>
						<td><?php echo $val['passport_money_num']?></td>
					</tr>
                <?php }?>
                <?php }else {?>
                <tr>
                    <td colspan="4">暂无交易记录</td>
                </tr>
                <?php }?>
				</table>
			</div>
		</div>

	</div>
</div>
<!-- 提现1 start -->
<div id="deposit_btn" class="modal fade myDodal" tabindex="1" role="dialog" aria-labelledby="rewardLabel">
	<div class="modal-backdrop fade" style="height: 1283px;"></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <button id="sub-dialog_close" type="button" data-dismiss="modal" class="close ui-btn ui-shadow ui-corner-all"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 id="sub-dialog-title" class="modal-title">提示</h4>
            </div>
			<div class="modal-body">
				<p class="acc_show text-center">由于涉及到税务扣除，每个月只能提现一次。如需提现请于下个月再次申请。</p>
			</div>
			<div class="reward_modal_foot layout layout-align-center">
				<div class="btn_box margin-left-10" style="width:120px;">
					<a href="javascript:;" class="btn ">知道了</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 提现2 end -->
<!-- 提现申请 start -->
<div id="deposit_res" class="modal fade myDodal" tabindex="1" role="dialog" aria-labelledby="rewardLabel">
	<div class="modal-backdrop fade" style="height: 1283px;"></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <button id="sub-dialog_close" type="button" data-dismiss="modal" class="close ui-btn ui-shadow ui-corner-all"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 id="sub-dialog-title" class="modal-title">提示</h4>
            </div>
			<div class="modal-body">
				<p class="acc_show" style="margin: -10px 0 10px 0;">请完善并确认您的提现账户</p>
				<div class="formwrapper">
					<form action="#">
						<div class="form-item">
							<div class="form-input-wrapper layout layout-align-start-center">
								<label for="">账户名称：</label>
								<div class="form-input-item flex flex100">
									<input type="text">
								</div>
							</div>
						</div>
						<div class="form-item">
							<div class="form-input-wrapper layout layout-align-start-center">
								<label for="">账户号码：</label>
								<div class="form-input-item flex flex100">
									<input type="text">
								</div>
							</div>
						</div>
						<div class="form-item">
							<div class="form-input-wrapper layout layout-align-start-center">
								<label for="">开户行：</label>
								<div class="form-input-item flex flex100">
									<input type="text">
								</div>
							</div>
						</div>
						<p class="acc_show fShow">可提现金额：<i class="cd8992c">50000</i> 元</p>
						<div class="form-item">
							<div class="form-input-wrapper layout layout-align-start-center">
								<label for="">提现金额：</label>
								<div class="form-input-item flex flex100">
									<input type="text">
								</div>
							</div>
						</div>
						<p class="acc_show fShow">扣除税金：<i class="cd8992c">-</i> 元</p>
						<p class="acc_show fShow">实际到账：<i class="cd8992c">5300</i> 元</p>
						<p class="acc_show fShow cd8992c text-center">每个自然月只能提现一次，请谨慎操作</p>
						<div class="form-item layout layout-align-center">
							<div class="btn_box margin-left-10" style="width:120px;text-align: center;line-height: 40px;">
								<a href="javascript:;" class="btn ">知道了</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 提现申请 end -->
<!-- 提示 -->
<div id="reward_tip1" class="modal fade myDodal" tabindex="1" role="dialog" aria-labelledby="rewardLabel">
	<div class="modal-backdrop fade" style="height: 1283px;"></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <button id="sub-dialog_close" type="button" data-dismiss="modal" class="close ui-btn ui-shadow ui-corner-all"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 id="sub-dialog-title" class="modal-title">提示</h4>
            </div>
			<div class="modal-body">
				<!-- <p class="acc_show">您已申请提现 <i>50000</i> 元<br/>扣除税费 320.01元<br/>实际到账金额为 <i>49679.99</i>元</p> -->
				<p class="acc_show text-center">我们已收到您的提现申请，我们将尽快处理，请耐心等待，如有疑问请拨打400-0039-150</p>
			</div>
			<div class="reward_modal_foot layout layout-align-center">
				<div class="btn_box" style="width:120px;">
					<a href="javascript:;" class="btn btn_default">取消</a>
				</div>
				<div class="btn_box margin-left-10" style="width:120px;">
					<a href="javascript:;" class="btn ">确认提现</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 提示 -->
<?php __slot('passport','footer');?>