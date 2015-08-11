<?php
/** access control **/
require_login();
require_permission('管理自己的客户');

/** prepare vars **/
$myuser = MySiteUser::getCurrentUser();
$page = isset($_GET['page']) ? strip_tags($_GET['page']) : 1;

/** presentation **/
$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => '列表',
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
        '列表' => '#'
    )
));
$perpage = 50;
$total = Client::countAll();
$total_page = ceil($total / $perpage);
$html->renderOut('site/client_list', array(
    'user' => $myuser,
    'objects' => has_permission('管理所有客户') ? Client::findAllWithPage($page, $perpage) : (has_permission('管理本公司用户') ? Client::findAllWithPage($page, $perpage, $myuser->getCompanyId()) : array()),
    'current_page' => $page,
    'total_page' => $total_page,
    'total' => $total,
    'pager' => $html->render('core/components/pagination', array('total' => $total_page, 'page' => $page)),
    'start_entry' => ($page - 1)*$perpage + 1,
    'end_entry' => min(array($total, $page*$perpage))
));
$html->output('</div>');
        
$html->renderOut('site/components/html_footer');