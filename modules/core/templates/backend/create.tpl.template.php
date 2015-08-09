<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">[[[ i18n_echo(array(
<?php foreach ($model_names as $lang => $name): ?>
        '<?php echo $lang ?>' => '<?php echo $name ?>',
<?php endforeach; ?>
      )); ]]]</h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">[[[ i18n_echo(array(
            'en' => 'Create', 
            'zh' => '创建'
        )) ]]]</div>
        <div class="panel-body">
          
        [[[ echo Message::renderMessages(); ]]]
          
<form class="form-horizontal" role="form" method="POST" action="[[[ echo uri('admin/<?php echo $model ?>/create') ]]]">
<?php foreach ($form_fields as $field => $settings): $widget = new $settings['widget_class']($field, $settings['widget_conf']); ?>
  <?php echo $widget->render($module, $model); ?>
<?php endforeach; ?>

  <div id="form-field-notice" class="form-group">
    <div class="col-sm-10 col-sm-push-2">
      <small><i>
     <span style="color: rgb(185,2,0); font-weight: bold;">*</span> 标记为必填项
      </i></small>
    </div>
  </div>
  
  <div class="col-sm-10 col-sm-push-2">
    <input type="submit" name="submit" value="[[[ i18n_echo(array(
        'en' => 'Create', 
        'zh' => '创建'
    )) ]]]" class="btn btn-primary">
  </div>
</form>
<div class="clearfix"></div>
          
        </div>
      </div>
    </div>
  </div>
</div>

