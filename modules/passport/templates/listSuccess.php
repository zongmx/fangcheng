<div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">通行证-列表</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-6">
          <table class="table table-striped">
<thead>
  <tr>
    <th></th>
    <th>创建时间</th>
    <th>最后修改时间</th>
    <th>邮箱</th>
    <th>手机号</th>
    <th>登录密码</th>
    <th>类型。1:品牌;2:商户|购物中心;</th>
    <th>姓名</th>
    <th>头像</th>
    <th>职位头衔</th>
    <th>职位所在地区</th>
    <th>地区名称</th>
    <th>名片图片地址</th>
    <th>身份证号码</th>
    <th>身份证正面图片</th>
    <th>微信号</th>
    <th>注册时的IP</th>
    <th>推荐人的ID</th>
    <th>0普通模式|1总部招商|2代理商</th>
    <th>状态备注--只可以让运营人员看见</th>
    <th>状态。1未认证|2通过认证|-1不通过|0待处理（不存在品牌|购物中心）|3复合用户</th>
  </tr>
</thead>
<tbody>
  <!-- begin list -->
    <tr>
    <td>{list_V['passport_id']}</td>
    <td>{list_V['passport_ctime']}</td>
    <td>{list_V['passport_utime']}</td>
    <td>{list_V['passport_email']}</td>
    <td>{list_V['passport_mobile']}</td>
    <td>{list_V['passport_password']}</td>
    <td>{list_V['passport_type']}</td>
    <td>{list_V['passport_name']}</td>
    <td>{list_V['passport_picture']}</td>
    <td>{list_V['passport_job_title']}</td>
    <td>{list_V['passport_job_area']}</td>
    <td>{list_V['area_id']}</td>
    <td>{list_V['passport_business_card']}</td>
    <td>{list_V['passport_idcard']}</td>
    <td>{list_V['passport_idcard_photo']}</td>
    <td>{list_V['passport_weixin']}</td>
    <td>{list_V['passport_ip']}</td>
    <td>{list_V['passport_id_recommend']}</td>
    <td>{list_V['passport_flag']}</td>
    <td>{list_V['passport_status_desc']}</td>
    <td>{list_V['passport_status']}</td>
    </tr>
  <!-- end list -->
</tbody>
</table>
          {__page['code']}
        </div>
    </div>
</div>