<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>客户列表</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
          <!--
          <div class="row">
            <div class="col-sm-3">
              <div class="input-group"><input type="text" class="input-sm form-control" placeholder="Search"> <span class="input-group-btn">
                  <button class="btn btn-sm btn-primary" type="button"> 搜索</button> </span>
              </div>
            </div>
          </div>
          -->
          
          <div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTable no-footer">
  <thead>
      <tr role="row">
                <th>姓名</th>
                <th>负责职员</th>
                <th>公司</th>
                <th>客户类型</th>
                <th>进度</th>
                <th>电话</th>
                <th>邮件</th>
                <th>录入时间</th>
                <th>操作</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($objects as $object): ?>
    <tr>
            <td><a href="<?php echo uri('client/details/' . $object->getId()) ?>"><?php echo $object->getName() ?></a></td>
            <td><?php echo $object->getSiteuser()->getProfile()->getNickname() ?></td>
            <td><?php echo $object->getSiteuser()->getCompany() ?></td>
            <td><?php echo Client::$TYPEs[$object->getType()] ?></td>
            <td><?php // TODO ?></td>
            <td><?php echo $object->getDianhua() ?></td>
            <td><?php echo $object->getEmail() ?></td>
            <td><?php echo $object->getCreatedAt('Y-m-d') ?></td>
            <td>
        <div class="btn-group">
          <a href="<?php echo uri('client/details/' . $object->getId()) ?>" class="btn btn-xs btn-primary"><span class="fa fa-paste"></span> 查看案例</a>
          <a href="<?php echo uri('client/edit/' . $object->getId()) ?>" class="btn btn-xs btn-default"><span class="fa fa-edit"></span> 修改</a>
          <a href="<?php echo uri('client/delete/' . $object->getId()) ?>" data-name="<?php echo $object->getName() ?>" data-cid="<?php echo $object->getId() ?>" class="btn btn-xs btn-danger delete"><span class="fa fa-times"></span> 删除</a>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
          </div>
          <div class="row">
  <div class="col-sm-12" style="text-align: right;">
  <?php i18n_echo(array(
      'en' => 'Showing ' . $start_entry . ' to ' . $end_entry . ' of ' . $total . ' entries', 
      'zh' => '显示' . $start_entry . '到' . $end_entry . '条记录，共' . $total . '条记录',
  )); ?>
  </div>
  <div class="col-sm-12" style="text-align: right;">
  <?php echo $pager; ?>
  </div>
</div>          

          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $('.btn-xs.delete').click(function(){
    var name = $(this).data('name');
    var cid = $(this).data('cid');
    var row = $(this).parents('tr').first();
    var answer = swal({
        title: "删除客户",
        text: "你即将删除客户 \"" + name + "\" 及其所有信息",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "是的，我确定删除!",
        closeOnConfirm: false
    }, function(){
      $.post('<?php echo uri('client/delete') ?>/'+cid, function(data){
        if (data.status == 'success') {
          row.fadeOut();
          swal("已删除!", "该客户已成功删除.", "success");
        } else {
          swal("系统错误", data.message, "error");
        }
      }, 'json');
    });
    return false;
  });
</script>