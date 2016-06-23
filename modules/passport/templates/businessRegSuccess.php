<div class="container form_main">
    <div class="row form_head">
        <div class="form_head_log">
            <h3>快速注册</h3>
        </div>
    </div>
    <div class="row form_content">
    	<form role="form">
    	<!-- 第一部分 快速注册 start -->
			<?php __slot("registerStepOne");?>
    	<!-- 第一部分 end -->

    	</form>
    </div>
<?php __slot("regFoot");?>
</div>