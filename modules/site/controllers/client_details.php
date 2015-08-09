<?php
/** access control **/
require_login();
require_permission('管理自己的客户');

/** prepare vars **/
$myuser = MySiteUser::getCurrentUser();

/** presentation **/
$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => '客户详情 - ZHANG XUE BING',
    'body_class' => 'client_list'
));
$html->renderOut('site/components/mainnav', array(
    'user' => $myuser
));

$html->output('<div id="page-wrapper" class="gray-bg">');
$html->renderOut('site/components/topnav', array(
    'user' => $myuser
));
$html->renderOut('site/components/page_header', array(
    'title' => '列表',
    'breadcrumb' => array(
        '首页' => uri(''),
        '客户管理' => '#',
        '列表' => uri('client/list'),
        '客户详情' => '#'
    )
));
$html->renderOut('site/client_details', array(
    'user' => $myuser,
//    'users' => MySiteUser::findAllByCompany($myuser->getCompanyId())
));
$html->output('</div>');
        
$html->renderOut('site/components/html_footer');