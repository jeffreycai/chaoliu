<?php
/** access control **/
require_login();
require_permission('管理用户权限');

/** prepare vars **/
$myuser = MySiteUser::getCurrentUser();

/** handle submission **/
if (isset($_POST['submit'])) {
  SitePermissionRole::truncate();
  foreach ($_POST as $key => $val) {
    if (strstr($key, 'role_')) {
      $tokens = explode('_', $key);
      $role_id = (int)$tokens[1];
      foreach ($val as $permission_id => $v) {
        $spr = new SitePermissionRole();
        $spr->setRoleId($role_id);
        $spr->setPermissionId($permission_id);
        $spr->save();
      }
    }
  }
  Message::register(new Message(Message::SUCCESS, '用户权限更新成功!'));
  HTML::forwardBackToReferer();
}

/** presentation **/
$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => '管理用户权限',
    'body_class' => 'permission'
));
$html->renderOut('site/components/mainnav', array(
    'user' => $myuser
));

$html->output('<div id="page-wrapper" class="gray-bg">');
$html->renderOut('site/components/topnav', array(
    'user' => $myuser
));
$html->renderOut('site/components/page_header', array(
    'title' => '管理用户权限',
    'breadcrumb' => array(
        '首页' => uri(''),
        '客户管理' => '#',
        '管理用户权限' => '#'
    )
));
$html->renderOut('site/siteuser_permission', array(
    'permissions' => SitePermission::findAll(),
    'roles' => SiteRole::findAll()
));
$html->output('</div>');
        
$html->renderOut('site/components/html_footer');