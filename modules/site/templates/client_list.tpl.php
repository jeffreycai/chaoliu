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
          <div class="row">
            <div class="col-sm-3">
              <div class="input-group"><input type="text" class="input-sm form-control" placeholder="Search"> <span class="input-group-btn">
                  <button class="btn btn-sm btn-primary" type="button"> 搜索</button> </span>
              </div>
            </div>
          </div>
          
          <div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTable no-footer">
  <thead>
      <tr role="row">
                
                <th>姓名</th>
                <th>负责职员</th>
                <th>客户类型</th>
                <th>进度</th>
                <th>雅思成绩</th>
                <th>电话</th>
                <th>邮件</th>
                <th>录入时间</th>
                <th>操作</th>
      </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="<?php echo uri('client/details/1') ?>">ZHANG XUE LIN</a></td>
      <td>职员1</td>
      <td>留学</td>
      <td class="">
        <small>已完成: 48%</small>
        <div class="progress progress-mini">
          <div class="progress-bar" style="width: 48%;"></div>
        </div>
      </td>
      <td>6</td>
      <td>+86 13455454565</td>
      <td>zhang@lin.com</td>
      <td>2015-07-12</td>
      <td>
        <div class="btn-group" role="group">
          <a href="<?php echo uri('client/details/1') ?>" class="btn btn-xs btn-primary"><span class="fa fa-paste"></span> 查看案例</a>
          
        </div>
      </td>
    </tr>
    <tr>
      <td><a href="<?php echo uri('client/details/1') ?>">WANG XIAO BING</a></td>
      <td>职员2</td>
      <td>留学</td>
      <td class="">
        <small>已完成: 12%</small>
        <div class="progress progress-mini">
          <div class="progress-bar" style="width: 12%;"></div>
        </div>
      </td>
      <td>6.5</td>
      <td>+86 2156852525</td>
      <td>xiaobing@gmail.com</td>
      <td>2015-07-14</td>
      <td>
        <div class="btn-group" role="group">
          <a href="<?php echo uri('client/details/1') ?>" class="btn btn-xs btn-primary"><span class="fa fa-paste"></span> 查看案例</a>
        </div>
      </td>
    </tr>
    <tr>
      <td><a href="<?php echo uri('client/details/1') ?>">QIAN FENG</a></td>
      <td>职员2</td>
      <td>留学</td>
      <td class="">
        <small>已完成: 65%</small>
        <div class="progress progress-mini">
          <div class="progress-bar" style="width: 65%;"></div>
        </div>
      </td>
      <td>4</td>
      <td>+86 52636525</td>
      <td>qianfeng77@qq.com</td>
      <td>2015-04-14</td>
      <td>
        <div class="btn-group" role="group">
          <a href="<?php echo uri('client/details/1') ?>" class="btn btn-xs btn-primary"><span class="fa fa-paste"></span> 查看案例</a>
        </div>
      </td>
    </tr>
    <tr>
      <td><a href="<?php echo uri('client/details/1') ?>">CHENG LANLAN</a></td>
      <td>职员1</td>
      <td>留学</td>
      <td class="">
        <small>已完成: 90%</small>
        <div class="progress progress-mini">
          <div class="progress-bar" style="width: 90%;"></div>
        </div>
      </td>
      <td>N/A</td>
      <td>+86 55425415</td>
      <td>lalan_cheng@163.com</td>
      <td>2015-04-25</td>
      <td>
        <div class="btn-group" role="group">
          <a href="<?php echo uri('client/details/1') ?>" class="btn btn-xs btn-primary"><span class="fa fa-paste"></span> 查看案例</a>
        </div>
      </td>
    </tr>
  </tbody>
</table>
          </div>
          <div class="dataTables_paginate paging_simple_numbers" id=""><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="DataTables_Table_0" tabindex="0" id="DataTables_Table_0_previous"><a href="#">Previous</a></li><li class="paginate_button active" aria-controls="DataTables_Table_0" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a href="#">2</a></li><li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a href="#">3</a></li><li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a href="#">4</a></li><li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a href="#">5</a></li><li class="paginate_button " aria-controls="DataTables_Table_0" tabindex="0"><a href="#">6</a></li><li class="paginate_button next" aria-controls="DataTables_Table_0" tabindex="0" id="DataTables_Table_0_next"><a href="#">Next</a></li></ul></div>
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