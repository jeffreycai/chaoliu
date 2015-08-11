<?php

$object = new Client();
  
// handle form submission
if (isset($_POST['submit'])) {
  $error_flag = false;

  /// validation
  
  // validation for $user_id
  $user_id = isset($_POST["user_id"]) ? strip_tags($_POST["user_id"]) : null;
  if (empty($user_id)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "user_id is required.", "zh" => "请填写user_id"))));
    $error_flag = true;
  }
  
  // validation for $type
  $type = isset($_POST["type"]) ? strip_tags($_POST["type"]) : null;  
  // validation for $name
  $name = isset($_POST["name"]) ? strip_tags($_POST["name"]) : null;
  if (empty($name)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "name is required.", "zh" => "请填写name"))));
    $error_flag = true;
  }
  
  // validation for $dob
  $dob = isset($_POST["dob"]) ? strip_tags($_POST["dob"]) : null;  
  // validation for $chushengriqi
  $chushengriqi = isset($_POST["chushengriqi"]) ? strip_tags($_POST["chushengriqi"]) : null;  
  // validation for $xueli
  $xueli = isset($_POST["xueli"]) ? strip_tags($_POST["xueli"]) : null;  
  // validation for $yasichengji
  $yasichengji = isset($_POST["yasichengji"]) ? strip_tags($_POST["yasichengji"]) : null;  
  // validation for $dianhua
  $dianhua = isset($_POST["dianhua"]) ? strip_tags($_POST["dianhua"]) : null;
  if (empty($dianhua)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "dianhua is required.", "zh" => "请填写dianhua"))));
    $error_flag = true;
  }
  
  // validation for $dizhi
  $dizhi = isset($_POST["dizhi"]) ? $_POST["dizhi"] : null;
  if (empty($dizhi)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "dizhi is required.", "zh" => "请填写dizhi"))));
    $error_flag = true;
  }
  
  // validation for $email
  $email = isset($_POST["email"]) ? strip_tags($_POST["email"]) : null;
  $retype_email = isset($_POST["retype_email"]) ? strip_tags($_POST["retype_email"]) : null;
  if (empty($email)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "email is required.", "zh" => "请填写email"))));
    $error_flag = true;
  }

  if (strlen($email) >= 30) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "Max length for email is 30", "zh" => "email 不能超过30个字符"))));
    $error_flag = true;
  }

  if ($email != $retype_email) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "Retype value does not match for email", "zh" => "再次输入的email与原值不匹配"))));
    $error_flag = true;
  }
  
  // validation for $keyuan
  $keyuan = isset($_POST["keyuan"]) ? strip_tags($_POST["keyuan"]) : null;  
  // validation for $beizhu
  $beizhu = isset($_POST["beizhu"]) ? $_POST["beizhu"] : null;  /// proceed submission
  
  // proceed for $user_id
  if (!empty($user_id)) {
    $object->setUserId($user_id);
  }
  
  // proceed for $type
  if (!empty($type)) {
    $object->setType($type);
  }
  
  // proceed for $name
  $object->setName($name);
  
  // proceed for $dob
  $object->setDob($dob);
  
  // proceed for $chushengriqi
  $object->setChushengriqi($chushengriqi);
  
  // proceed for $xueli
  if (!empty($xueli)) {
    $object->setXueli($xueli);
  }
  
  // proceed for $yasichengji
  if (!empty($yasichengji)) {
    $object->setYasichengji($yasichengji);
  }
  
  // proceed for $dianhua
  $object->setDianhua($dianhua);
  
  // proceed for $dizhi
  $object->setDizhi($dizhi);
  
  // proceed for $email
  $object->setEmail($email);
  
  // proceed for $keyuan
  if (!empty($keyuan)) {
    $object->setKeyuan($keyuan);
  }
  
  // proceed for $beizhu
  $object->setBeizhu($beizhu);
  if ($error_flag == false) {
    if ($object->save()) {
      Message::register(new Message(Message::SUCCESS, i18n(array("en" => "Record saved", "zh" => "记录保存成功"))));
      HTML::forwardBackToReferer();
    } else {
      Message::register(new Message(Message::DANGER, i18n(array("en" => "Record failed to save", "zh" => "记录保存失败"))));
    }
  }
}



$html = new HTML();

$html->renderOut('core/backend/html_header', array(
  'title' => i18n(array(
  'en' => 'Create Client',
  'zh' => 'Create 客户',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('client/backend/client_create', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

