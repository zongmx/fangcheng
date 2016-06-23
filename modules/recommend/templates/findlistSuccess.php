<?php 
$brand_Config = [
    'head_cate' => true,
	'slot_1013'=> true,
    'slot_1014' => true,
    'slot_1015' => true,
    'slot_1016' => true,
];

$mall_Config = [
    'head_area' => true,
	'slot_15' => true,
    'slot_16' => true,
    'slot_17' => true,
    'area_brand' => true,
];

$third_party = [
	'area_brand' => true,
    'area_mall' => true,
];

switch ($user)
{
	case 'brand':
		$data = $brand_Config;
		break;
	case 'mall':
		$data = $mall_Config;
		break;
	case 'thirdparty':
		$data = $third_party;
		break;
};

?>

<section data-role="page" id="main_index_1" data-title="方橙"
	class="contain" data-role="none">
	<header data-role="header" data-theme="b" class="header">
		<a href="#" data-role="button" data-shadow="false"
			data-transition="slide" data-direction="reverse"
			class="nav-icon-home">首页</a>
		<h1>方橙</h1>
		<div data-role="navbar" class="navbar">
			<ul>
				<li><a href="#">热点资讯</a></li>
				<li><a href="#">需求广播</a></li>
				<li><a href="#" class="ui-btn-active">发现</a></li>
			</ul>
		</div>
	</header>
<?php if($data['head_cate'] == true) {?>
	<div class="nav-bar">
		<ul class="nav layout">
			<li class="dropdown-toggle formats flex" data-nav="formats"
				data-id="2"><span class="nav-tit">全部业态</span> <i class="caret"></i></li>
		</ul>
	</div>

	<div class="dropdown-wrapper hide category">
		<div class="dropdown-module">
			<div class="scroller-wrapper cl">
				<div class="dropdown-scroller two-scroller" id="dropdown_scroller">
					<ul>
						<li data-id="2" data-nav="formats"
							class="formats-wrapper list-wrapper active">
							<ul class="dropdown-list">
								<ul class="dropdown-list category">
									<li data-formats-id="1000000" data-formats-name="全部业态"
										class="active">全部业态</li>
									<li data-formats-id="10000" data-formats-name="餐饮">餐饮</li>
									<li data-formats-id="20000" data-formats-name="购物">购物</li>
									<li data-formats-id="30000" data-formats-name="亲子儿童">亲子儿童</li>
									<li data-formats-id="40000" data-formats-name="教育培训">教育培训</li>
									<li data-formats-id="50000" data-formats-name="休闲娱乐">休闲娱乐</li>
									<li data-formats-id="60000" data-formats-name="生活服务">生活服务</li>
									<li data-formats-id="70000" data-formats-name="美妆丽人">美妆丽人</li>
									<li data-formats-id="80000" data-formats-name="酒店公寓">酒店公寓</li>
									<li data-formats-id="90000" data-formats-name="百货超市">百货超市</li>
									<li data-formats-id="100000" data-formats-name="其他">其他</li>
								</ul>
							</ul>
						</li>
					</ul>
				</div>
				<div class="dropdown-sub-scroller two-scroller"
					id="dropdown_sub_scroller">
					<ul>
						<li class="list-wrapper formats-wrapper" data-nav="formats">
							<ul class="dropdown-list subCategory">
								<li class="all" data-formats-id="1" data-formats-name="全部来源"><i
									class="check_bg"></i>全部来源</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php }?>
		
	
<?php if($data['slot_1013'] == true) {?>
<section class="detail_section margin-top-10">
		<div class="detail_content_find">
			<div
				class="detail_section_head detail_content_head_f layout layout-align-start-center">
				<div flex="" class="detail_content_tit">热门商业体</div>
			</div>
		</div>
        <div id="hot_mall"></div>
	</section>
	<script type="text/javascript">
    $(function(){
    $.ajax({
         type:"post",
         url:'/details/slot/id/1013/area_id/86999030',
         dataType:'html',
         success:function(e){
         $("#hot_mall").html(e);
         }
         })
         });
</script>			
<?php }?>
		   
<?php if($data['slot_1015'] == true){?>
<section class="detail_section margin-top-10" id="new_mall"></section>
	<script type="text/javascript">
    $(function(){
    $.ajax({
         type:"post",
         url:'/details/slot/id/1015/area_id/86999030',
         dataType:'html',
         success:function(e){
         $("#new_mall").html(e);
         }
         })
         });
</script>		
<?php } ?>		
	      
<?php if($data['slot_1016'] == true){?>
<section class="detail_section margin-top-10" id="soon_mall"></section>
<script type="text/javascript">
    $(function(){
    $.ajax({
         type:"post",
         url:'/details/slot/id/1016/area_id/86999030',
         dataType:'html',
         success:function(e){
         $("#soon_mall").html(e);
         }
         })
         });
</script>		
<?php } ?>
        
<?php if($data['slot_1014'] == true) {?>
<section class="detail_section margin-top-10" id="interest_mall"></section>
<script type="text/javascript">
    $(function(){
    $.ajax({
         type:"post",
         url:'/details/slot/id/1014/brand_id/10001/cat_id/20000',
         dataType:'html',
         success:function(e){
         $("#interest_mall").html(e);
         }
         })
         });
</script>		
<?php }?>	

	
	
<?php if($data['slot_15'] == true && $data['slot_17'] == true ){ ?>
	<script src="/js/need-list.js"></script>
	<div data-role="content" class="detail_content">
		<div class="detail_main">
			<section class="detail_section margin-top-10">
				<div class="detail_section_head layout layout-align-start-center">
					<div class="detail_section_tit font-size-14">
						发布品牌<span>(南京)</span>
					</div>
				</div>

                <div id="hot_brand" class="detail_content_find"></div>
                <div class="detail_content_find" id="fast_brand"></div>
		
		  </section>
		</div>
    </div>

<script type="text/javascript">
//热门品牌
    $(function(){
    $.ajax({
         type:"post",
         url:'/details/slot/id/15/area_id/86999030/cat_id/10000',
         dataType:'html',
         success:function(e){
         $("#hot_brand").html(e);
         }
         })
         });
</script>
<script type="text/javascript">
//上升最快品牌
    $(function(){
    $.ajax({
         type:"post",
         url:'/details/slot/id/17/area_id/86999030/cat_id/10000',
         dataType:'html',
         success:function(e){
         $("#fast_brand").html(e);
         }
         })
         });
</script>
		


<?php }?>	
			
			
		
<?php if($data['area_mall'] == true){?>
<section class="detail_section margin-top-10">
	<div class="detail_section_head layout layout-align-start-center">
		<div class="detail_section_tit font-size-14">热门商业体</div>
		<div class="detail_content_tag custom-slider-box">
			<fieldset data-role="controlgroup" data-type="horizontal"
				data-mini="true" class="custom-slider">
				    <select name="select-custom-16" id="select-custom-16"
					data-native-menu="false">         
					<option value="#">北京</option>         
					<option value="#">南京</option>         
					<option value="#">上海</option>     
				</select>
			</fieldset>
		</div>
	</div>
	<div id="hot_mall"></div>
</section>
<script type="text/javascript">
    $(function(){
    $.ajax({
         type:"post",
         url:'/details/slot/id/1013/area_id/86999030',
         dataType:'html',
         success:function(e){
         $("#hot_mall").html(e);
         }
         })
         });
</script>
<?php }?>
		
<?php if($data['area_brand'] == true) {?>
<section class="detail_section margin-top-10">
	<div class="detail_section_head layout layout-align-start-center">
		<div class="detail_section_tit font-size-14">发现各地品牌</div>
		<div class="detail_content_tag custom-slider-box">
			<fieldset data-role="controlgroup" data-type="horizontal"
				data-mini="true" class="custom-slider">
				    <select name="select-custom-16" id="select-custom-16"
					data-native-menu="false">         
					<option value="#">北京</option>         
					<option value="#">南京</option>         
					<option value="#">上海</option>     
				</select>
			</fieldset>
		</div>
	</div>
	<div class="detail_section_main">
		<div id="find_hot_brand" class="detail_content_find" ></div>
		<div id="find_soon_brand" class="detail_content_find" ></div>
	</div>
</section>
<script type="text/javascript">
//热门品牌
    $(function(){
    $.ajax({
         type:"post",
         url:'/details/slot/id/15/area_id/86999030/cat_id/10000',
         dataType:'html',
         success:function(e){
         $("#find_hot_brand").html(e);
         }
         })
         });
    
    $(function(){
        $.ajax({
             type:"post",
             url:'/details/slot/id/17/area_id/86999030/cat_id/10000',
             dataType:'html',
             success:function(e){
             $("#find_soon_brand").html(e);
             }
             })
             });
    
</script>
<?php }?>		
			
<?php if($data['slot_16'] == true){?>
<section class="detail_section margin-top-10" id="interest_brand"></section>
<script type="text/javascript">
    $(function(){
    $.ajax({
         type:"post",
         url:'/details/slot/id/16/mall_id/423/cat_id/20000',
         dataType:'html',
         success:function(e){
         $("#interest_brand").html(e);
         }
         })
         });
</script>
<?php }?>

<?php __slot('passport','footer');?>
</section>



