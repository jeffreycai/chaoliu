<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>更新用户权限</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
<?php echo Message::renderMessages(); ?>
<form action="" method="POST">
  <div class="table-responsive">
  <table class="table table-bordered table-hover dataTable no-footer">
    <thead>
        <tr role="row">
          <th></th>
          <?php foreach ($roles as $role): ?>
          <th><?php echo $role->getName() ?></th>
          <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
      <?php foreach ($permissions as $permission): ?>
      <tr>
        <th><?php echo $permission->getName() ?></th>
        <?php foreach ($roles as $r): ?>
        <td><input type="checkbox" value="1" name="role_<?php echo $r->getId() ?>[<?php echo $permission->getId() ?>]" <?php echo $r->hasPermission($permission->getName()) ? 'checked="checked"' : '' ?>/></td>
        <?php endforeach; ?>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  
  <input type="submit" class="btn btn-primary" name="submit" value="<?php echo i18n(array(
    'en' => 'Submit',
    'zh' => '提交'
  )) ?>" />
  </div>
</form>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>



