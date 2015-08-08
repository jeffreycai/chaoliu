<?php
/** access control **/
require_login();
require_permission('更新自己的信息');

/** prepare vars **/
$myuser = MySiteUser::getCurrentUser();

/** submission handle **/
if (isset($_POST['submit'])) {
  // we uncomment the following fields coz we don't want user to change
  $no_change = array(
      'company_id',
      'roles',
      'active'
  );
  foreach ($no_change as $field) {
    if (isset($_POST[$field])) {
      unset($_POST[$field]);
    }
  }
  // then we call the general process
  $uid = $myuser->getId();
  require_once MODULESROOT . '/siteuser/controllers/backend/user/add_edit_submission.php';
}

/** presentation **/
$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => '更新个人信息',
    'body_class' => 'profile'
));
$html->renderOut('site/components/mainnav', array(
    'user' => $myuser
));

$html->output('<div id="page-wrapper" class="gray-bg">');
$html->renderOut('site/components/topnav', array(
    'user' => $myuser
));
$html->renderOut('site/components/page_header', array(
    'title' => '修改个人信息',
    'breadcrumb' => array(
        '首页' => uri(''),
        '个人信息' => '#',
        '修改个人信息' => '#'
    )
));
$html->renderOut('site/profile', array(
    'user' => $myuser
));
$html->output('</div>');
        
$html->renderOut('site/components/html_footer');