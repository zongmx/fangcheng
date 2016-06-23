       <form class="form-horizontal" action="{actionUrl}" method="{method}">
	
                <h1 class="form-signin-heading">通行证</h1>
  <div class="form-group">
    
    <div class="col-sm-10">
      <input type="hidden" class="form-control" name="passport_id" id="passport_id" {readonly} value="{passport_id}"  title="请填写1-9位整数" placeholder="" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_ctime" class="col-sm-2 control-label"><span>*</span>创建时间</label>
    <div class="col-sm-10">
      <input type="datetime-local" class="form-control" name="passport_ctime" id="passport_ctime" {readonly} value="<?php echo str_replace(' ', 'T', $passport_ctime) ?>" data-valid="{reg:/^[1-9][0-9]{3}-(0?[1-9]|1[0|1|2])-(0?[1-9]|[1|2][0-9]|3[0|1])\s(0?[1-9]|1[0-9]|2[0-3]):(0?[0-9]|[1|2|3|4|5][0-9]):(0?[0-9]|[1|2|3|4|5][0-9])$/}" title="请填写正确的时间" placeholder="创建时间" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_utime" class="col-sm-2 control-label"><span>*</span>最后修改时间</label>
    <div class="col-sm-10">
      <input type="datetime-local" class="form-control" name="passport_utime" id="passport_utime" {readonly} value="<?php echo str_replace(' ', 'T', $passport_utime) ?>" data-valid="{reg:/^[1-9][0-9]{3}-(0?[1-9]|1[0|1|2])-(0?[1-9]|[1|2][0-9]|3[0|1])\s(0?[1-9]|1[0-9]|2[0-3]):(0?[0-9]|[1|2|3|4|5][0-9]):(0?[0-9]|[1|2|3|4|5][0-9])$/}" title="请填写正确的时间" placeholder="最后修改时间" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_email" class="col-sm-2 control-label"><span>*</span>邮箱</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="passport_email" id="passport_email" {readonly} value="{passport_email}" data-valid="{len:[0,75]}" title="请填写最多(75)个字符" placeholder="邮箱" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_mobile" class="col-sm-2 control-label"><span>*</span>手机号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_mobile" id="passport_mobile" {readonly} value="{passport_mobile}" data-valid="{len:[0,255]}" title="请填写最多(255)个字符" placeholder="手机号" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_password" class="col-sm-2 control-label"><span>*</span>登录密码</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_password" id="passport_password" {readonly} value="{passport_password}" data-valid="{len:[0,255]}" title="请填写最多(255)个字符" placeholder="登录密码" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_type" class="col-sm-2 control-label">类型。1:品牌;2:商户|购物中心;</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_type" id="passport_type" {readonly} value="{passport_type}" data-valid="{int:[-128, 127]}" title="请填写-128到127的整数" placeholder="类型。1:品牌;2:商户|购物中心;" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_name" class="col-sm-2 control-label">姓名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_name" id="passport_name" {readonly} value="{passport_name}" data-valid="{len:[0,255]}" title="请填写最多(255)个字符" placeholder="姓名" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_picture" class="col-sm-2 control-label">头像</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_picture" id="passport_picture" {readonly} value="{passport_picture}" data-valid="{len:[0,255]}" title="请填写最多(255)个字符" placeholder="头像" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_job_title" class="col-sm-2 control-label">职位头衔</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_job_title" id="passport_job_title" {readonly} value="{passport_job_title}" data-valid="{len:[0,255]}" title="请填写最多(255)个字符" placeholder="职位头衔" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_job_area" class="col-sm-2 control-label">职位所在地区</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_job_area" id="passport_job_area" {readonly} value="{passport_job_area}" data-valid="{len:[0,255]}" title="请填写最多(255)个字符" placeholder="职位所在地区" />
    </div>
  </div>
  <div class="form-group">
    <label for="area_id" class="col-sm-2 control-label">地区名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="area_id" id="area_id" {readonly} value="{area_id}" data-valid="{int:[-2147483648, 2147483647]}" title="请填写1-9位整数" placeholder="地区名称" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_business_card" class="col-sm-2 control-label">名片图片地址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_business_card" id="passport_business_card" {readonly} value="{passport_business_card}" data-valid="{len:[0,255]}" title="请填写最多(255)个字符" placeholder="名片图片地址" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_idcard" class="col-sm-2 control-label">身份证号码</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_idcard" id="passport_idcard" {readonly} value="{passport_idcard}" data-valid="{len:[0,255]}" title="请填写最多(255)个字符" placeholder="身份证号码" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_idcard_photo" class="col-sm-2 control-label">身份证正面图片</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_idcard_photo" id="passport_idcard_photo" {readonly} value="{passport_idcard_photo}" data-valid="{len:[0,255]}" title="请填写最多(255)个字符" placeholder="身份证正面图片" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_weixin" class="col-sm-2 control-label">微信号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_weixin" id="passport_weixin" {readonly} value="{passport_weixin}" data-valid="{len:[0,255]}" title="请填写最多(255)个字符" placeholder="微信号" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_ip" class="col-sm-2 control-label">注册时的IP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_ip" id="passport_ip" {readonly} value="{passport_ip}" data-valid="{len:[0,32]}" title="请填写最多(32)个字符" placeholder="注册时的IP" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_id_recommend" class="col-sm-2 control-label">推荐人的ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_id_recommend" id="passport_id_recommend" {readonly} value="{passport_id_recommend}" data-valid="{int:[-2147483648, 2147483647]}" title="请填写1-9位整数" placeholder="推荐人的ID" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_flag" class="col-sm-2 control-label">0普通模式|1总部招商|2代理商</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_flag" id="passport_flag" {readonly} value="{passport_flag}" data-valid="{int:[-128, 127]}" title="请填写-128到127的整数" placeholder="0普通模式|1总部招商|2代理商" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_status_desc" class="col-sm-2 control-label">状态备注--只可以让运营人员看见</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_status_desc" id="passport_status_desc" {readonly} value="{passport_status_desc}" data-valid="{len:[0,255]}" title="请填写最多(255)个字符" placeholder="状态备注--只可以让运营人员看见" />
    </div>
  </div>
  <div class="form-group">
    <label for="passport_status" class="col-sm-2 control-label">状态。1未认证|2通过认证|-1不通过|0待处理（不存在品牌|购物中心）|3复合用户</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="passport_status" id="passport_status" {readonly} value="{passport_status}" data-valid="{int:[-128, 127]}" title="请填写-128到127的整数" placeholder="状态。1未认证|2通过认证|-1不通过|0待处理（不存在品牌|购物中心）|3复合用户" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="{submitType}" class="btn btn-default" id="submit_first" value="提交" />
    </div>
  </div>


        </form>