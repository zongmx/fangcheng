<section data-role="page" id="main_index_1" data-title="方橙-最专业的招商选址大数据平台" class="contain">
    <header data-role="header" data-theme="b"class="header">
        <a href="/news/broadcast" data-role="button" data-shadow="false" data-transition="slide" data-direction="reverse" class="nav-icon-back">返回</a>
        <h1>需求排行榜</h1>
    </header>
    <div class="nav-bar">
        <ul class="nav layout">
            <li class="dropdown-toggle need-type flex" data-id="1" data-nav="need-type"><span class="nav-tit"><?php if($flag == 1){ echo '拓展需求'; }else{echo '招商需求'; } ?></span><i class="caret"></i></li>
            <li class="dropdown-toggle city flex" data-id="2"  data-nav="city"><span class="nav-tit">{area_name}</span><i class="caret"></i></li>
        </ul>
    </div>
    <div data-role="content" class="detail_content">
    <div class="dropdown-wrapper hide category">
        <div class="dropdown-module">
            <div class="scroller-wrapper cl">
                <div class="dropdown-scroller two-scroller" id="dropdown_scroller">
                    <ul>
                        <li data-id="1" class="need-type-wrapper list-wrapper" data-nav="need-type">
                            <ul class="dropdown-list">
                                <li data-need-type-id="1" class="rank <?php if($flag == 1){?> active<?php }?>">拓展需求</li>
                                <li data-need-type-id="2" class="rank <?php if($flag == 2){?> active<?php }?>">招商需求</li>
                            </ul>
                        </li>
                        <li data-id="2" data-nav="city" class="city-wrapper list-wrapper">
                            <ul class="dropdown-list">
                                <?php foreach ($area_arr as $key => $val){?>
                                    <li class="rank activedisableone <?php if($key == $area_id){ ?>active <?php }?>" data-city-id="<?php echo $key;?>" data-city-name="<?php echo $val;?>"><?php echo $val;?></li>
                                <?php }?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php foreach($list as $key=>$val){ 
            if($val['data']){
        ?>
        <div class="need-top-item">
            <h3 class="need-top-tit">{val['top_type_name']}<span>({val['top_title']})</span></h3>
            <ul>
                <?php foreach ($ex as $j => $k){  ?>
                            <li class="nowrap  <?php if($j<3){ ?>it_<?php echo $j+1; }?>"><em><?php echo $j+1;?></em>
                            <span href="/ucenter/demandshow/demandid/{k['top_list_key']}/url/{link}"><?php echo html_entity_decode($k['name']);?></span></li>
                    <?php  }?>
            
                <?php foreach($val['data'] as $k=>$v){ ?>
                    <li class="nowrap <?php if($k<3){ ?>it_<?php echo $k+1; }?>"><em><?php echo $k+1;?></em>
                    <span href="/ucenter/demandshow/demandid/{v['top_list_key']}/url/{link}">{v['name']}</span></li>
                <?php }?>
            </ul>
        </div>
    <?php }
         }?>    
    </div>
    <form action="/details/rankinglist" method="get">
        <input id="type" type="hidden" name="type" value="<?php echo $flag?>"/>
        <input id="area_id" type="hidden" name="area_id" value="<?php echo $area_id ?>"/>
    </form>
</section>
<script type="text/javascript">
	$(function() {
		$('#main_index_1').on('click','span[href]',function() {
			window.location.href = $(this).attr('href');
		})
	})
</script>
