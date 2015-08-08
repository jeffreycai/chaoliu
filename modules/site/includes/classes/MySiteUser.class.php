<?php

require_once MODULESROOT . DS . 'siteuser' . DS . 'includes' . DS . 'classes' . DS . 'SiteUser.class.php';

class MySiteUser extends SiteUser {

  static function renderLoginForm() {
    $rtn = Message::renderMessages() . '
<form role="form" action="' . uri('users/login', false) . '" method="post" id="login">
  <fieldset>
    <div class="form-group">
      <input class="form-control" name="email" id="email" autofocus required="" placeholder="' . i18n(array('en' => 'E-mail or username', 'zh' => '电子邮件或者用户名')) . '">
    </div>
    <div class="form-group">
      <input class="form-control" name="password" id="password" type="password" value="" required="" placeholder="' . i18n(array('en' => 'Password', 'zh' => '密码')) . '">
    </div>
    <div class="form-group">
      <label>
      <input type="checkbox" name="remember" value="1" /> ' . i18n(array('en' => 'Remember me', 'zh' => '30天内免登录')) . '
      </label>
    </div>
    <input type="submit" name="submit" class="btn btn-primary btn-block ' . (module_enabled('form') ? 'disabled' : '') . '" value="' . i18n(array('en' => 'Login', 'zh' => '登录')) . '" />
    <br /><div style="text-align:center;"><small class="forget"><a href="' . uri('users/forget-password') . '">' . i18n(array('en' => 'forget password?', 'zh' => '忘记密码了?')) . '</a></small></div>
    ' . (module_enabled('form') ? Form::loadSpamToken('#login', SITEUSER_FORM_SPAM_TOKEN) : '') . '
  </fieldset>
</form>
';
    return $rtn;
  }

  static function renderForgetPasswordForm() {
    $rtn = Message::renderMessages() . '
<form role="form" action="" method="post" id="forget_password">
  <fieldset>
    <div class="form-group">
      <label for="email">' . i18n(array('en' => 'Your E-mail address', 'zh' => '您的电子箱地址')) . '</label>
      <input class="form-control" name="email" type="email" id="email" autofocus required="">
    </div>
    <input type="submit" name="submit" class="btn btn-primary btn-block ' . (module_enabled('form') ? 'disabled' : '') . '" value="' . i18n(array('en' => 'Confirm', 'zh' => '确认')) . '" />
    ' . (module_enabled('form') ? Form::loadSpamToken('#forget_password', SITEUSER_FORM_SPAM_TOKEN) : '') . '
    <div style="text-align:center;"><br /><small><a href="' . uri('users') . '">返回登录界面</a></small></div>
  </fieldset>
</form>
';
    return $rtn;
  }

  static function renderUpdateFormFrontend(SiteUser $user = null, $action = '') {
    // set default action value
    if ($action != '') {
      $action = uri($action);
    }

    // get vars from form submission
    $username = isset($_POST['username']) ? strip_tags($_POST['username']) : (isset($user) ? $user->getUsername() : '');
    $email = isset($_POST['email']) ? strip_tags($_POST['email']) : (isset($user) ? $user->getEmail() : '');
    $password = '';
    $password_confirm = '';
    if ($user && $user->getId() == MySiteUser::getCurrentUser()->getId()) {
      // when updating self profile, we don't include 'active'
      $active_field = '';
    } else {
      $active = isset($_POST['active']) ? strip_tags($_POST['active']) : (isset($user) ? $user->getActive()."" : false);
      $active_field = '
  <div class="form-group" id="form-field-active">
    <label class="col-sm-2 control-label" for="active">' . i18n(array('en' => 'Active', 'zh' => '是否在职')) . '</label>
    <div class="col-sm-10">
      <select class="form-control" name="active" id="active">
        <option value="1" '.($active == "1" ? 'selected=selected' : '').'>在职</option>
        <option value="0" '.($active == "0" ? 'selected=selected' : '').'>离职</option>
      </select>
    </div>
  </div>
  <div class="hr-line-dashed"></div>';
    }

    $mandatory_label = ' <span style="color: rgb(185,2,0); font-weight: bold;">*</span>';

    $roles_form_markup = '<div id="form-field-roles"><label class="col-sm-2 control-label">Roles</label><div class="col-sm-10"><ul class="checkbox">';
    foreach (SiteRole::findAll() as $role) {
      $roles_form_markup .= '<li><label><input type="checkbox" name="roles[' . $role->getid() . ']" value=1 ' . (isset($_POST['roles']) ? (isset($_POST['roles'][$role->getId()]) ? 'checked="checked"' : '') : ($user && $user->hasRole($role->getName()) ? 'checked="checked"' : '')) . ' />' . $role->getName() . '</label></li>';
    }
    $roles_form_markup .= '</ul></div></div>';

    $rtn = '
<form class="form-horizontal" action="' . $action . '" method="POST" enctype="multipart/form-data">
  <div class="form-group" id="form-field-email" >
    <label class="col-sm-2 control-label" for="email">' . i18n(array('en' => 'Email', 'zh' => '电子邮箱')) . $mandatory_label . '</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" value="' . $email . '" required />
    </div>
  </div>
  <div class="hr-line-dashed"></div>
  <div class="form-group" id="form-field-password">
    <label class="col-sm-2 control-label" for="password">' . i18n(array('en' => 'Password', 'zh' => '密码')) . $mandatory_label . ' </label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" value="' . $password . '" required />
      <span class="help-block m-b-none"><small>(' . i18n(array('en' => 'at least 6 letters', 'zh' => '至少6位')) . ')</small></span>
    </div>
  </div>
  <div class="form-group" id="form-field-password_confirm">
    <label class="col-sm-2 control-label" for="password_confirm">' . i18n(array('en' => 'Password again', 'zh' => '再次确认密码')) . $mandatory_label . '</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password_confirm" name="password_confirm" value="' . $password_confirm . '" required />
    </div>
  </div>
  <div class="hr-line-dashed"></div>
  ' . (class_exists('SiteProfile') ? SiteProfile::renderUpdateForm($user) : '') . '
  <div class="hr-line-dashed"></div>
'.$active_field.'
  <input type="hidden" value=1 name="noemailnotification" />
  ' . (is_backend() ? $roles_form_markup : '') . '
  <div class="form-group" id="form-field-notice">
    <div class="col-sm-10 col-sm-push-2">
      <small><i>
    ' . $mandatory_label . i18n(array(
                'en' => ' indicates mandatory fields',
                'zh' => ' 标记为必填项'
            )) . '
      </i></small>
    </div>
  </div>
  <div class="col-sm-10 col-sm-push-2">
    <button type="submit" name="submit" class="btn btn-primary">' . (is_null($user) ? i18n(array('en' => 'Add new user', 'zh' => '添加新用户')) : i18n(array('en' => 'Update user', 'zh' => '更新用户'))) . '</button>
  </div>
  
</form>
';
    return $rtn;
  }
  
  static function renderCreateFormFrontend(MySiteUser $user = null, $action = '') {
    // set default action value
    if ($action != '') {
      $action = uri($action);
    }

    // get vars from form submission
    $username = isset($_POST['username']) ? strip_tags($_POST['username']) : (isset($user) ? $user->getUsername() : '');
    $email = isset($_POST['email']) ? strip_tags($_POST['email']) : (isset($user) ? $user->getEmail() : '');
    $password = '';
    $password_confirm = '';
    if ($user && $user->getId() == MySiteUser::getCurrentUser()->getId()) {
      // when updating self profile, we don't include 'active'
      $active_field = '';
    } else {
      $active = isset($_POST['active']) ? strip_tags($_POST['active']) : (isset($user) ? $user->getActive()."" : false);
      $active_field = '
  <div class="form-group" id="form-field-active">
    <label class="col-sm-2 control-label" for="active">' . i18n(array('en' => 'Active', 'zh' => '是否在职')) . '</label>
    <div class="col-sm-10">
      <select class="form-control" name="active" id="active">
        <option value="1" '.($active && $active == "1" ? 'selected=selected' : '').'>在职</option>
        <option value="0" '.($active && $active == "0" ? 'selected=selected' : '').'>离职</option>
      </select>
    </div>
  </div>
  <div class="hr-line-dashed"></div>';
    }

    $mandatory_label = ' <span style="color: rgb(185,2,0); font-weight: bold;">*</span>';

    $roles_form_markup = '<div id="form-field-roles"><label class="col-sm-2 control-label">Roles</label><div class="col-sm-10"><ul class="checkbox">';
    foreach (SiteRole::findAll() as $role) {
      $roles_form_markup .= '<li><label><input type="checkbox" name="roles[' . $role->getid() . ']" value=1 ' . (isset($_POST['roles']) ? (isset($_POST['roles'][$role->getId()]) ? 'checked="checked"' : '') : ($user && $user->hasRole($role->getName()) ? 'checked="checked"' : '')) . ' />' . $role->getName() . '</label></li>';
    }
    $roles_form_markup .= '</ul></div></div>';

    $rtn = '
<form class="form-horizontal" action="' . $action . '" method="POST" enctype="multipart/form-data">
  <div class="form-group" id="form-field-email" >
    <label class="col-sm-2 control-label" for="email">' . i18n(array('en' => 'Email', 'zh' => '电子邮箱')) . $mandatory_label . '</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" value="' . $email . '" required />
    </div>
  </div>
  <div class="hr-line-dashed"></div>
  <div class="form-group" id="form-field-password">
    <label class="col-sm-2 control-label" for="password">' . i18n(array('en' => 'Password', 'zh' => '密码')) . $mandatory_label . ' </label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" value="' . $password . '" required />
      <span class="help-block m-b-none"><small>(' . i18n(array('en' => 'at least 6 letters', 'zh' => '至少6位')) . ')</small></span>
    </div>
  </div>
  <div class="form-group" id="form-field-password_confirm">
    <label class="col-sm-2 control-label" for="password_confirm">' . i18n(array('en' => 'Password again', 'zh' => '再次确认密码')) . $mandatory_label . '</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password_confirm" name="password_confirm" value="' . $password_confirm . '" required />
    </div>
  </div>
  <div class="hr-line-dashed"></div>
  ' . (class_exists('SiteProfile') ? SiteProfile::renderUpdateForm($user) : '') . '
  <div class="hr-line-dashed"></div>
'.$active_field.'
  <input type="hidden" value=1 name="noemailnotification" />
  ' . (is_backend() ? $roles_form_markup : '') . '
  <div class="form-group" id="form-field-notice">
    <div class="col-sm-10 col-sm-push-2">
      <small><i>
    ' . $mandatory_label . i18n(array(
                'en' => ' indicates mandatory fields',
                'zh' => ' 标记为必填项'
            )) . '
      </i></small>
    </div>
  </div>
  <div class="col-sm-10 col-sm-push-2">
    <button type="submit" name="submit" class="btn btn-primary">' . (is_null($user) ? i18n(array('en' => 'Add new user', 'zh' => '添加新用户')) : i18n(array('en' => 'Update user', 'zh' => '更新用户'))) . '</button>
  </div>
  
</form>
';
    return $rtn;
  }
  
  static function findAllByCompany($cid) {
    global $mysqli;
    $query = "SELECT * FROM site_user WHERE company_id=" . $cid;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new MySiteUser();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  public function getLastLogin($format = 'Y-m-d H:i:s') {
    if ($format) {
      return $this->getDbFieldLast_login() ? date($format, $this->getDbFieldLast_login()) : 'N/A';
    } else 
      return $this->getDbFieldLast_login();
  }
  
  public function getCreatedAt($format = 'Y-m-d H:i:s') {
    if ($format) {
      return $this->getDbFieldCreated_at() ? date($format, $this->getDbFieldCreated_at()) : 'N/A';
    } else 
      return $this->getDbFieldCreated_at();
  }

}
