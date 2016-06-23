<?php if ($type == 2 && !empty($res)){?>
    <?php foreach ($res as $key=>$val){?>
    <li>
		<a href="javascript:godemandshow('<?php echo $val['_id'];?>','<?php  if(isset($val['cs']['status'])){ echo '1';}else{ echo '0';} ?>')" data-ajax=false>
			<div class="need_item_top layout">
        	<div class="face40">
        		<img alt="" src="<?php echo $val['tag_build_logo']; ?>">
        	</div>
        	<div class="flex layout-column margin-left-10 need_item_top_right">
        		 <div class="obj-name font-size-15"><span class="gray333"><?php echo $val['mall_name'];?><?php if($val['act_passport_id'] > 0){?><i class="need-h5book">H5</i><?php }?></span>&nbsp;<?php if(isset($val['cs']['status'])) {?><img src="/img/xssign.png" style="vertical-align: middle;"><?php } ?></span></div>
                <div class="obj_info_msg font-size-12">
                	<?php if (!empty($val['tag_build_size'])){?><span>体量：<?php echo $val['tag_build_size'];?>万㎡</span><?php }?>
                	<?php if (!empty($val['tag_build_city'])){?><span><?php echo $val['tag_build_city'];?></span><?php }?>
                	<?php if (!empty($val['tag_build_address'])){?><span><?php echo $val['tag_build_address'];?></span><?php }?>
                </div>
                <div class="u-info">
                    <div class="gray999 font-size-14 nowrap">
                        <span><?php echo $val['userinfo']['passport_name'];?></span>
                       <?php if ($val['userinfo']['passport_status'] == 2 ){?> <span class="icon_btn"></span><?php }else {?>
                       <span class="font-size-12 gray999">(未认证)</span>
                       <?php }?>
                       <span>&nbsp;&nbsp;<?php echo $val['userinfo']['passport_job_title'];?></span>
                    </div>
                </div>
        	</div>
        </div>
			<div class="obj-info need-obj-info font-size-15">
			<?php if (!empty($val['catestr'])){?>
				<div class="layout need-wrapper-item">
					<div class="obj-tag gray999">需求业态：</div>
					<div class="obj-tags obj-tags-width flex nowrap"><?php echo htmlspecialchars_decode($val['catestr']);?></div>
				</div>
			<?php }?>
			<?php if (!empty($val['tag']['group_126']['lower'] || !empty($val['tag']['group_126']['upper']))){?>
			    <?php if (!empty($val['tag']['group_126']['lower'] && !empty($val['tag']['group_126']['upper']))){?>
					<div class="layout need-wrapper-item">
						<div class="obj-tag gray999">店铺面积：</div>
						<div class="obj-tags"><?php echo ($val['tag']['group_126']['lower']/C('MULTIPLY_DOUBLE').'-'.$val['tag']['group_126']['upper']/C('MULTIPLY_DOUBLE'));?>㎡</div>
					</div>
				<?php }else {?>
					<div class="layout need-wrapper-item">
						<div class="obj-tag gray999">店铺面积：</div>
						<div class="obj-tags"><?php echo empty($val['tag']['group_126']['lower'])?$val['tag']['group_126']['upper']/C('MULTIPLY_DOUBLE'):$val['tag']['group_126']['lower']/C('MULTIPLY_DOUBLE') ?>㎡</div>
					</div>
				<?php }?>
			<?php }?>
			<?php if (0){?>
				<div class="layout need-wrapper-item">
					<div class="obj-tag gray999">备注：</div>
					<div class="obj-tags flex"><?php  echo $val['demand_desc'];?></div>
				</div>
			<?php }?>
			<?php if (!empty($val['demand_ctime'])){?>
				<div class="layout need-wrapper-item">
					<div class="obj-tag gray999">发布日期：</div>
					<div class="obj-tags"><?php  echo $val['demand_ctime'];?></div>
				</div>
			<?php }?>

			</div>
		</a>
    </li>
    <?php }?>
    <div data-scroll-url="<?php echo $ajaxurl;?>" class="hide"/></div>
<?php }else if ($type == 1 && !empty($res)){?>
    <?php foreach ($res as $key=>$val){?>
    <li>
		<a href="javascript:godemandshow('<?php echo $val['_id'];?>','<?php  if(isset($val['cs']['status'])){ echo '1';}else{ echo '0';} ?>')" data-ajax=false>
			<div class="need_item_top layout">
            	<div class="face40">
            		<img alt="" src="<?php echo $val['tag_brand_logo'];?>">
            	</div>
            	<div class="flex layout-column margin-left-10 need_item_top_right">
            		<div class="obj-name font-size-15"><span class="gray333"><?php echo $val['brand_name']?><?php if($val['act_passport_id'] > 0){?><i class="need-h5book">H5</i><?php }?></span>&nbsp;<?php if(isset($val['cs']['status'])) {?><img src="/img/xssign.png" style="vertical-align: middle;"><?php } ?></span></div>
                    <div class="obj_info_msg font-size-12">
                    	<?php if (!empty($val['tag_brand_area_name'])){?><span>拓展城市：<?php echo $val['tag_brand_area_name'];?></span><?php }?>
                    </div>
                    <div class="u-info">
                        <div class="gray999 font-size-12 nowrap">
                            <span><?php echo $val['userinfo']['passport_name'];?></span>
                            <?php if ($val['userinfo']['passport_status'] == 2 ){?> <span class="icon_btn"></span><?php }else {?>
                            <span class="font-size-12 gray999">(未认证)</span>&nbsp;&nbsp;
                            <?php }?>
                            <span><?php echo $val['userinfo']['passport_job_title'];?></span>
                        </div>
                    </div>
            	</div>
            </div>
			<div class="obj-info need-obj-info font-size-15">
			<?php  if (!empty($val['catestr'])){?>
				<div class="layout need-wrapper-item">
					<div class="obj-tag gray999">业态：</div>
					<div class="obj-tags obj-tags-width flex nowrap"><?php echo htmlspecialchars_decode($val['catestr']);?></div>
				</div>
			<?php  }?>
			<?php  if (!empty($val['tag_brand_group_36'])){?>
				<div class="layout need-wrapper-item">
					<div class="obj-tag gray999">首选物业：</div>
					<div class="obj-tags obj-tags-width flex nowrap"><?php echo htmlspecialchars_decode($val['tag_brand_group_36']);?></div>
				</div>
			<?php  }?>
			<?php if (!empty($val['tag']['group_41']['lower']) || !empty($val['tag']['group_41']['upper'])){?>
				<div class="layout need-wrapper-item">
					<div class="obj-tag gray999">面积需求：</div>
					<div class="obj-tags"><?php echo ($val['tag']['group_41']['lower']/C('MULTIPLY_DOUBLE'))?>㎡-<?php echo ($val['tag']['group_41']['upper']/C('MULTIPLY_DOUBLE'))?>㎡</div>
				</div>
			<?php }?>
			<?php if (0){?>
				<div class="layout need-wrapper-item">
					<div class="obj-tag gray999">备注：</div>
					<div class="obj-tags flex"><?php  echo $val['demand_desc'];?></div>
				</div>
			<?php }?>
			<?php if (!empty($val['demand_ctime'])){?>
				<div class="layout need-wrapper-item">
					<div class="obj-tag gray999">发布日期：</div>
					<div class="obj-tags"><?php  echo $val['demand_ctime'];?></div>
				</div>
			<?php }?>
			</div>
		</a>
    </li>
    <?php }?>
    <div data-scroll-url="<?php echo $ajaxurl;?>" class="hide"/></div>
<?php }?>