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
      <label for="email">'.i18n(array('en' => 'Your E-mail address', 'zh' => '您的电子箱地址')).'</label>
      <input class="form-control" name="email" type="email" id="email" autofocus required="">
    </div>
    <input type="submit" name="submit" class="btn btn-primary btn-block '.(module_enabled('form') ? 'disabled' : '').'" value="'.i18n(array('en' => 'Confirm', 'zh' => '确认')).'" />
    '.(module_enabled('form') ? Form::loadSpamToken('#forget_password', SITEUSER_FORM_SPAM_TOKEN) : '').'
    <div style="text-align:center;"><br /><small><a href="'.uri('users').'">返回登录界面</a></small></div>
  </fieldset>
</form>
';
    return $rtn;
  }

}
