<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'Client',
        'zh' => '客户',
      )); ?></h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading"><?php i18n_echo(array(
            'en' => 'Create', 
            'zh' => '创建'
        )) ?></div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
<form class="form-horizontal" role="form" method="POST" action="<?php echo uri('admin/client/create') ?>">
  
<div class='form-group'>
  <label class='col-sm-2 control-label'>user_id <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <select class='form-control' id='user_id' name='user_id'>
      <option value='1' <?php echo ($object->isNew() ? (isset($_POST['user_id']) ? ($_POST['user_id'] == '1' ? 'selected="selected"' : '') : '') : ($object->getUserId() == "1" ? "selected='selected'" : "")) ?>>职员1</option>
      <option value='2' <?php echo ($object->isNew() ? (isset($_POST['user_id']) ? ($_POST['user_id'] == '2' ? 'selected="selected"' : '') : '') : ($object->getUserId() == "2" ? "selected='selected'" : "")) ?>>职员2</option>
      <option value='3' <?php echo ($object->isNew() ? (isset($_POST['user_id']) ? ($_POST['user_id'] == '3' ? 'selected="selected"' : '') : '') : ($object->getUserId() == "3" ? "selected='selected'" : "")) ?>>职员3</option>
    </select>
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label'>type </label>
  <div class='col-sm-10'>
    <select class='form-control' id='type' name='type'>
      <option value='1' <?php echo ($object->isNew() ? (isset($_POST['type']) ? ($_POST['type'] == '1' ? 'selected="selected"' : '') : '') : ($object->getType() == "1" ? "selected='selected'" : "")) ?>>留学</option>
      <option value='2' <?php echo ($object->isNew() ? (isset($_POST['type']) ? ($_POST['type'] == '2' ? 'selected="selected"' : '') : '') : ($object->getType() == "2" ? "selected='selected'" : "")) ?>>移民</option>
    </select>
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='name'>name <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['name']) ? strip_tags($_POST['name']) : '') : $object->getName()))) ?>' type='text' class='form-control' id='name' name='name' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='chushengriqi'>chushengriqi </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['chushengriqi']) ? strip_tags($_POST['chushengriqi']) : '') : $object->getChushengriqi()))) ?>' type='text' class='form-control' id='chushengriqi' name='chushengriqi' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label'>xueli </label>
  <div class='col-sm-10'>
    <select class='form-control' id='xueli' name='xueli'>
      <option value='0' <?php echo ($object->isNew() ? (isset($_POST['xueli']) ? ($_POST['xueli'] == '0' ? 'selected="selected"' : '') : '') : ($object->getXueli() == "0" ? "selected='selected'" : "")) ?>>-- 请选择 --</option>
      <option value='初中' <?php echo ($object->isNew() ? (isset($_POST['xueli']) ? ($_POST['xueli'] == '初中' ? 'selected="selected"' : '') : '') : ($object->getXueli() == "初中" ? "selected='selected'" : "")) ?>>初中</option>
      <option value='高中' <?php echo ($object->isNew() ? (isset($_POST['xueli']) ? ($_POST['xueli'] == '高中' ? 'selected="selected"' : '') : '') : ($object->getXueli() == "高中" ? "selected='selected'" : "")) ?>>高中</option>
      <option value='大专' <?php echo ($object->isNew() ? (isset($_POST['xueli']) ? ($_POST['xueli'] == '大专' ? 'selected="selected"' : '') : '') : ($object->getXueli() == "大专" ? "selected='selected'" : "")) ?>>大专</option>
      <option value='本科' <?php echo ($object->isNew() ? (isset($_POST['xueli']) ? ($_POST['xueli'] == '本科' ? 'selected="selected"' : '') : '') : ($object->getXueli() == "本科" ? "selected='selected'" : "")) ?>>大学</option>
      <option value='研究生' <?php echo ($object->isNew() ? (isset($_POST['xueli']) ? ($_POST['xueli'] == '研究生' ? 'selected="selected"' : '') : '') : ($object->getXueli() == "研究生" ? "selected='selected'" : "")) ?>>研究生</option>
    </select>
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label'>yasichengji </label>
  <div class='col-sm-10'>
    <select class='form-control' id='yasichengji' name='yasichengji'>
      <option value='0' <?php echo ($object->isNew() ? (isset($_POST['yasichengji']) ? ($_POST['yasichengji'] == '0' ? 'selected="selected"' : '') : '') : ($object->getYasichengji() == "0" ? "selected='selected'" : "")) ?>>-- 请选择 --</option>
      <option value='3' <?php echo ($object->isNew() ? (isset($_POST['yasichengji']) ? ($_POST['yasichengji'] == '3' ? 'selected="selected"' : '') : '') : ($object->getYasichengji() == "3" ? "selected='selected'" : "")) ?>>3</option>
      <option value='3.5' <?php echo ($object->isNew() ? (isset($_POST['yasichengji']) ? ($_POST['yasichengji'] == '3.5' ? 'selected="selected"' : '') : '') : ($object->getYasichengji() == "3.5" ? "selected='selected'" : "")) ?>>3.5</option>
      <option value='4' <?php echo ($object->isNew() ? (isset($_POST['yasichengji']) ? ($_POST['yasichengji'] == '4' ? 'selected="selected"' : '') : '') : ($object->getYasichengji() == "4" ? "selected='selected'" : "")) ?>>4</option>
      <option value='4.5' <?php echo ($object->isNew() ? (isset($_POST['yasichengji']) ? ($_POST['yasichengji'] == '4.5' ? 'selected="selected"' : '') : '') : ($object->getYasichengji() == "4.5" ? "selected='selected'" : "")) ?>>4.5</option>
      <option value='5' <?php echo ($object->isNew() ? (isset($_POST['yasichengji']) ? ($_POST['yasichengji'] == '5' ? 'selected="selected"' : '') : '') : ($object->getYasichengji() == "5" ? "selected='selected'" : "")) ?>>5</option>
      <option value='5.5' <?php echo ($object->isNew() ? (isset($_POST['yasichengji']) ? ($_POST['yasichengji'] == '5.5' ? 'selected="selected"' : '') : '') : ($object->getYasichengji() == "5.5" ? "selected='selected'" : "")) ?>>5.5</option>
      <option value='6' <?php echo ($object->isNew() ? (isset($_POST['yasichengji']) ? ($_POST['yasichengji'] == '6' ? 'selected="selected"' : '') : '') : ($object->getYasichengji() == "6" ? "selected='selected'" : "")) ?>>6</option>
      <option value='6.5' <?php echo ($object->isNew() ? (isset($_POST['yasichengji']) ? ($_POST['yasichengji'] == '6.5' ? 'selected="selected"' : '') : '') : ($object->getYasichengji() == "6.5" ? "selected='selected'" : "")) ?>>6.5</option>
      <option value='7' <?php echo ($object->isNew() ? (isset($_POST['yasichengji']) ? ($_POST['yasichengji'] == '7' ? 'selected="selected"' : '') : '') : ($object->getYasichengji() == "7" ? "selected='selected'" : "")) ?>>7</option>
      <option value='7.5' <?php echo ($object->isNew() ? (isset($_POST['yasichengji']) ? ($_POST['yasichengji'] == '7.5' ? 'selected="selected"' : '') : '') : ($object->getYasichengji() == "7.5" ? "selected='selected'" : "")) ?>>7.5</option>
      <option value='8' <?php echo ($object->isNew() ? (isset($_POST['yasichengji']) ? ($_POST['yasichengji'] == '8' ? 'selected="selected"' : '') : '') : ($object->getYasichengji() == "8" ? "selected='selected'" : "")) ?>>8</option>
      <option value='8.5' <?php echo ($object->isNew() ? (isset($_POST['yasichengji']) ? ($_POST['yasichengji'] == '8.5' ? 'selected="selected"' : '') : '') : ($object->getYasichengji() == "8.5" ? "selected='selected'" : "")) ?>>8.5</option>
      <option value='9' <?php echo ($object->isNew() ? (isset($_POST['yasichengji']) ? ($_POST['yasichengji'] == '9' ? 'selected="selected"' : '') : '') : ($object->getYasichengji() == "9" ? "selected='selected'" : "")) ?>>9</option>
    </select>
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='dianhua'>dianhua <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['dianhua']) ? strip_tags($_POST['dianhua']) : '') : $object->getDianhua()))) ?>' type='text' class='form-control' id='dianhua' name='dianhua' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='dizhi'>dizhi <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <textarea class='form-control' rows='5' id='dizhi' name='dizhi' required><?php echo ($object->isNew() ? (isset($_POST['dizhi']) ? htmlentities($_POST['dizhi']) : '') : htmlentities($object->getDizhi())) ?></textarea>
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='email'>email <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['email']) ? strip_tags($_POST['email']) : '') : $object->getEmail()))) ?>' type='email' class='form-control' id='email' name='email' required size=30 />
  </div>
</div>
<div class='form-group'>
  <label class='col-sm-2 control-label' for='retype_email'><?php echo i18n(array('en' => 'Retype', 'zh' => '再输一次')) ?> email <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', (isset($_POST['retype_email']) ? strip_tags($_POST['retype_email']) : ''))) ?>' type='email' class='form-control' id='retype_email' name='retype_email' required size=30 />
  </div>
</div>
<div class='hr-line-dashed'></div>
    
<div class='form-group'>
  <label class='col-sm-2 control-label' for='beizhu'>beizhu </label>
  <div class='col-sm-10'>
    <textarea class='form-control' rows='5' id='beizhu' name='beizhu'><?php echo ($object->isNew() ? (isset($_POST['beizhu']) ? htmlentities($_POST['beizhu']) : '') : htmlentities($object->getBeizhu())) ?></textarea>
  </div>
</div>
<div class='hr-line-dashed'></div>

  <div id="form-field-notice" class="form-group">
    <div class="col-sm-10 col-sm-push-2">
      <small><i>
     <span style="color: rgb(185,2,0); font-weight: bold;">*</span> 标记为必填项
      </i></small>
    </div>
  </div>
  
  <div class="col-sm-10 col-sm-push-2">
    <input type="submit" name="submit" value="<?php i18n_echo(array(
        'en' => 'Create', 
        'zh' => '创建'
    )) ?>" class="btn btn-primary">
  </div>
</form>
<div class="clearfix"></div>
          
        </div>
      </div>
    </div>
  </div>
</div>

