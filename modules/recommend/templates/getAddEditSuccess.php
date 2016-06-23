       <form class="form-horizontal" action="{actionUrl}" method="{method}">
	
                <h1 class="form-signin-heading">顶部导航</h1>

 
  <div class="form-group"> 
  <div class="form-group">
    <label for="area_name" class="col-sm-2 control-label">姓名：</label>
    <div class="col-sm-10">
    {passport_name}
    </div>
  </div>
  
     <div class="form-group">
    <label for="area_name" class="col-sm-2 control-label">负责项目：</label>
    <div class="col-sm-10">
    负责{project}等{project_count}个项目
    </div>
  </div>
  
  <div class="form-group">
    <label for="area_name" class="col-sm-2 control-label">头像：</label>
    <div class="col-sm-10">
    <img src="{passport_picture}">
    </div>
  </div>
  
  
  <div class="form-group">
    <label for="area_name" class="col-sm-2 control-label">信息内容：</label>
    <div class="col-sm-10">
    <textarea rows="10" cols="50" name="recommend_comment_content"></textarea>
    </div>
  </div>

  			<div class="form-group clearfix">
				<div class="form_left img_code code_bg">
					<input id="imgCheckcode"  maxlength="5" name="img_code" value=""
						placeholder="请输入图形验证码" class="sInput form-control text"><img
						id="checkImgDis" src="/img/check.php"
						onclick="return changeIdentifying(this);" style="cursor: pointer;"><a
						style="cursor: pointer;" onclick="return changeIdentifying(this);">看不清</a></span>
				</div>
				<div class="tip imgCodeTip hide"></div>
			</div>
  
  <div class="form-group">
    <label for="area_name" class="col-sm-2 control-label">匿名发布：</label>
    <div class="col-sm-10">
     <input name="recommend_comment_show" type="checkbox" value='1'/> 
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="{submitType}" class="btn btn-default" id="submit_first" value="提交" />
    </div>
  </div>
 </div>
 </form>
        
  <script>
  function changeIdentifying(o){
	  $('#checkImgDis').attr('src', '/img/check.php?' + Math.random());
	  return false;
}
  </script>