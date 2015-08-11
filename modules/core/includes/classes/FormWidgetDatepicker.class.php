<?php
require_once 'FormWidget.class.php';

class FormWidgetDatepicker extends FormWidget {
  private $name;
  private $required;
  
  public function __construct($name, $conf) {
    parent::__construct($conf);
    $this->name = $name;
    $this->required = isset($conf['required']) ? $conf['required'] : 0;
  }
  
  public function render($module, $model) {
    $rtn = "";
    $prepopulate = '($object->isNew() ? ' . "(isset(\$_POST['$this->name']) ? strip_tags(\$_POST['$this->name']) : '')" . ' : $object->get' . format_as_class_name($this->name) . '())';
    $id = get_random_string(5);
    $rtn .=
"\n<div id='$id' class='form-group'>
  <label class='col-sm-2 control-label' for='$this->name'>$this->name ".($this->required ? $this->mandatory_field : '')."</label>
  <div class='col-sm-10'>
    <div class='input-group'>
      <span class='input-group-addon'><i class='fa fa-calendar'></i></span><input value='[[[ echo htmlentities(str_replace('\'', '\"', $prepopulate)) ]]]' type='text' class='form-control' id='$this->name' name='$this->name'".($this->required ? ' required' : '')." />
    </div>
  </div>
</div>
<div class='hr-line-dashed'></div>
";
    
    $rtn .= '
[[[  // include jquery-ui library if not
    $already_included_at_frontend = Asset::checkAssetAdded(\'jquery-ui\', \'js\', \'frontend\') || Asset::checkAssetAdded(\'jquery_ui\', \'js\', \'frontend\');
    if (!$already_included_at_frontend) {
      echo( "\n".\'<script type="text/javascript" src="\'.uri(\'modules/core/assets/jquery-ui-1.11.4.custom/jquery-ui.min.js\').\'"></script>\'."\n" );
      echo( "\n".\'<script type="text/javascript">loadCSS("\'.uri(\'modules/core/assets/jquery-ui-1.11.4.custom/jquery-ui.min.js\').\'")</script>\'."\n" );
      Asset::addDynamicAsset(\'jquery_ui\', \'js\', \'frontend\', \'<script type="text/javascript" src="\'.uri(\'modules/core/assets/jquery-ui-1.11.4.custom/jquery-ui.min.js\').\'"></script>\');
    }
    $already_included_at_backend = Asset::checkAssetAdded(\'jquery-ui\', \'js\', \'backend\') || Asset::checkAssetAdded(\'jquery_ui\', \'js\', \'backend\');
    if (!$already_included_at_backend) {
      echo( "\n".\'<script type="text/javascript" src="\'.uri(\'modules/core/assets/jquery-ui-1.11.4.custom/jquery-ui.min.js\').\'"></script>\'."\n" );
      echo( "\n".\'<script type="text/javascript">loadCSS("\'.uri(\'modules/core/assets/jquery-ui-1.11.4.custom/jquery-ui.min.js\').\'")</script>\'."\n" );
      Asset::addDynamicAsset(\'jquery_ui\', \'js\', \'backend\', \'<script type="text/javascript" src="\'.uri(\'modules/core/assets/jquery-ui-1.11.4.custom/jquery-ui.min.js\').\'"></script>\');
    }
]]]
';
//    $already_included_at_frontend = Asset::checkAssetAdded('jquery-ui', 'js', 'frontend') || Asset::checkAssetAdded('jquery_ui', 'js', 'frontend');
//    if (!$already_included_at_frontend) {
//      $rtn .= "\n".'<script type="text/javascript" src="'.uri('modules/core/assets/jquery-ui-1.11.4.custom/jquery-ui.min.js').'"></script>'."\n";
//      $rtn .= "\n".'<script type="text/javascript">loadCSS('.uri('modules/core/assets/jquery-ui-1.11.4.custom/jquery-ui.min.js').')</script>'."\n";
//      Asset::addDynamicAsset('jquery_ui', 'js', 'frontend', '<script type="text/javascript" src="'.uri('modules/core/assets/jquery-ui-1.11.4.custom/jquery-ui.min.js').'"></script>');
//    }
//    $already_included_at_backend = Asset::checkAssetAdded('jquery-ui', 'js', 'backend') || Asset::checkAssetAdded('jquery_ui', 'js', 'backend');
//    if (!$already_included_at_backend) {
//      $rtn .= "\n".'<script type="text/javascript" src="'.uri('modules/core/assets/jquery-ui-1.11.4.custom/jquery-ui.min.js').'"></script>'."\n";
//      $rtn .= "\n".'<script type="text/javascript">loadCSS('.uri('modules/core/assets/jquery-ui-1.11.4.custom/jquery-ui.min.js').')</script>'."\n";
//      Asset::addDynamicAsset('jquery_ui', 'js', 'backend', '<script type="text/javascript" src="'.uri('modules/core/assets/jquery-ui-1.11.4.custom/jquery-ui.min.js').'"></script>');
//    }

    return $rtn;
  }
  
  public function validate() {
    $rtn = "\n  // validation for $".$this->name."\n";
    $rtn .= '  $'.$this->name.' = isset($_POST["'.$this->name.'"]) ? strip_tags($_POST["'.$this->name.'"]) : null;';
    if ($this->required) {
      $rtn .= '
  if (empty($'.$this->name.')) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "'.$this->name.' is required.", "zh" => "请填写'.$this->name.'"))));
    $error_flag = true;
  }
';
    }
    return $rtn;
  }
  
  public function proceed() {
    $rtn = "\n  // proceed for $".$this->name."\n";
    $rtn .= '  $object->set'.format_as_class_name($this->name).'($'.$this->name.');
';
    return $rtn;
  }
}