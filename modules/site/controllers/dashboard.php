<?php

require_login();

$user = MySiteUser::getCurrentUser();


$html = new HTML();
$html->renderOut('site/components/html_header', array(
    'title' => $settings['sitename'],
    'body_class' => 'dashboard'
));
$html->renderOut('site/components/mainnav', array(
    'user' => $user
));

$html->output('<div id="page-wrapper" class="gray-bg">');
$html->renderOut('site/components/topnav', array(
    'user' => $user
));
// TODO
$html->renderOut('site/dashboard', array(
    'user' => $user
));
$html->output('</div>');
        
$html->renderOut('site/components/html_footer');
