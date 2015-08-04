<?php

$html = new HTML();

$html->renderOut('site/components/single_form_header', array('title' => '重置密码'));
$html->renderOut('site/siteuser/forget_password');
$html->renderOut('site/components/single_form_footer');


exit;

