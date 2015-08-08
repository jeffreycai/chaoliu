<?php
/** access control **/
require_login();
require_permission('管理本公司用户');

/** prepare vars **/
$myuser = MySiteUser::getCurrentUser();

/** presentation **/
$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => '公司职员列表',
    'body_class' => 'siteuser_list'
));
$html->renderOut('site/components/mainnav', array(
    'user' => $myuser
));

$html->output('<div id="page-wrapper" class="gray-bg">');
$html->renderOut('site/components/topnav', array(
    'user' => $myuser
));
$html->renderOut('site/components/page_header', array(
    'title' => '公司职员列表',
    'breadcrumb' => array(
        '首页' => uri(''),
        '用户管理' => '#',
        '公司职员列表' => '#'
    )
));
$html->renderOut('site/siteuser_list', array(
    'user' => $myuser,
    'users' => MySiteUser::findAllByCompany($myuser->getCompanyId())
));
$html->output('</div>');
        
$html->renderOut('site/components/html_footer');