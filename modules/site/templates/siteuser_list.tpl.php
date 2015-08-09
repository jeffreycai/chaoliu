<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5><?php echo $user->getCompany()->getName() ?>职员列表</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
          <table class="table">
            <thead>
              <tr>
                <th>姓名</th>
                <th>职称</th>
                <th>雇佣关系</th>
                <th>最近一次登录时间</th>
                <th>注册日期</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
<?php foreach ($users as $user): ?>
              <tr>
                <td><?php echo $user->getProfile()->getNickname() ?></td>
                <td><?php echo $user->getRoles(true) ?></td>
                <td><?php echo $user->getActive() ?  '在职' : '离职' ?></td>
                <td><?php echo $user->getLastLogin('Y-m-d H:i:s') ?></td>
                <td><?php echo $user->getCreatedAt('Y-m-d H:i:s') ?></td>
                <td>
                  <div class="btn-group" role="group">
                    <a href="<?php echo uri('siteuser/edit/' . $user->getId()) ?>" class="btn btn-xs btn-primary"><span class="fa fa-paste"></span> 编辑</a>
                    <a href="<?php echo uri('siteuser/delete/' . $user->getId()) ?>" data-name="<?php echo $user->getProfile()->getNickname() ?>" data-uid="<?php echo $user->getId() ?>" class="btn btn-xs btn-danger delete"><span class="fa fa-times"></span> 删除</a>
                  </div>
                </td>
              </tr>
<?php endforeach; ?>
            </tbody>
          </table>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $('.btn-xs.delete').click(function(){
    var name = $(this).data('name');
    var uid = $(this).data('uid');
    var row = $(this).parents('tr').first();
    var answer = swal({
        title: "删除用户",
        text: "你即将删除用户 \"" + name + "\" 极其所有信息",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "是的，我确定删除!",
        closeOnConfirm: false
    }, function(){
      $.post('<?php echo uri('siteuser/delete') ?>/'+uid, 'uid='+uid, function(data){
        if (data.status == 'success') {
          row.fadeOut();
          swal("已删除!", "该用户已成功删除.", "success");
        } else {
          swal("系统错误", data.message, "error");
        }
      }, 'json');
    });
    return false;
  });
</script>