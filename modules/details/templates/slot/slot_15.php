<div class="detail_content_find">
	<div
		class="detail_section_head detail_content_head_f layout layout-align-start-center">
		<div flex="" class="detail_content_tit">热门品牌</div>
	</div>
</div>
<div class="detail_find_ul">
	<div class="detail_find_li">
<?php
foreach ($resultMsg as $key => $val) {
    if (($key+1) % 3 == 1) {
        echo '<div class="layout">';
    }
    ?>
             <div class="detail_find_li_item width33">
				<a href="#" class="ui-link">
					<div class="item_img">
						<img onerror="this.src='/img/detail/logo_middle.png'"
							src="<?php echo empty($val['logo'])?'error':$val['logo'];?>">
					</div>
					<p class="item_tit"><?php echo $val['name']?></p>
				</a>
			</div>
<?php
    
    if (($key + 1) % 3 == 0) {
        echo '</div>';
    }
    
}
?>                
            </div>
	</div>