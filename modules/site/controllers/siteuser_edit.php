<?php
/** access control **/
require_login();
require_permission('管理本公司用户');

/** prepare vars **/
$myuser = MySiteUser::getCurrentUser();
$uid = isset($vars[1]) ? $vars[1] : null;
$user_to_edit = MySiteUser::findById($uid);
if (!$user_to_edit) {
  dispatch('site/404');
  exit;
}

/** handle submission **/
if (isset($_POST['submit'])) {
  // we uncomment the following fields coz we don't want user to change
  $no_change = array(
      'company_id'
  );
  foreach ($no_change as $field) {
    if (isset($_POST[$field])) {
      unset($_POST[$field]);
    }
  }
  // then we call the general process
  $uid = $uid;
  require_once MODULESROOT . '/siteuser/controllers/backend/user/add_edit_submission.php';
}

/** presentation **/
$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => '编辑用户信息',
    'body_class' => 'siteuser_edit'
));
$html->renderOut('site/components/mainnav', array(
    'user' => $myuser
));

$html->output('<div id="page-wrapper" class="gray-bg">');
$html->renderOut('site/components/topnav', array(
    'user' => $myuser
));
$html->renderOut('site/components/page_header', array(
    'title' => '编辑用户信息',
    'breadcrumb' => array(
        '首页' => uri(''),
        '用户管理' => '#',
        '公司职员列表' => uri('siteuser/list'),
        '编辑用户信息' => '#'
    )
));
$html->renderOut('site/siteuser_edit', array(
    'user' => $user_to_edit
));
$html->output('</div>');
        
$html->renderOut('site/components/html_footer');