<?php
/** access control **/
require_login();
require_permission('管理本公司用户');

/** prepare vars **/
$myuser = MySiteUser::getCurrentUser();

/** handle submission **/
if (isset($_POST['submit'])) {
  // new user belongs to the same company
  $_POST['company_id'] = $myuser->getCompanyId();
  
  // then we call the general process
  unset($uid);
  require_once MODULESROOT . '/siteuser/controllers/backend/user/add_edit_submission.php';
}

/** presentation **/
$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => '添加新用户',
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
    'title' => '添加新用户',
    'breadcrumb' => array(
        '首页' => uri(''),
        '用户管理' => '#',
        '添加新用户' => '#'
    )
));
$html->renderOut('site/siteuser_add');
$html->output('</div>');
        
$html->renderOut('site/components/html_footer');