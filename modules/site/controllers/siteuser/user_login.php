<?php

$html = new HTML();

$html->renderOut('site/components/single_form_header', array('title' => '用户登录'));
$html->renderOut('site/siteuser/login');
$html->renderOut('site/components/single_form_footer');


exit;