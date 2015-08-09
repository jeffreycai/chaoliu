<?php
/** access control **/
require_login();
require_permission('管理自己的客户');

/** prepare vars **/
$myuser = MySiteUser::getCurrentUser();

/** handle submission **/
// TODO

/** presentation **/
$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => '修改客户资料',
    'body_class' => 'client_edit'
));
$html->renderOut('site/components/mainnav', array(
    'user' => $myuser
));

$html->output('<div id="page-wrapper" class="gray-bg">');
$html->renderOut('site/components/topnav', array(
    'user' => $myuser
));
$html->renderOut('site/components/page_header', array(
    'title' => '修改客户资料',
    'breadcrumb' => array(
        '首页' => uri(''),
        '客户管理' => '#',
        '列表' => uri('client/list'),
        '修改客户资料' => '#'
    )
));
$html->renderOut('site/client_edit', array(
    'object' => new Client()
));
$html->output('</div>');
        
$html->renderOut('site/components/html_footer');