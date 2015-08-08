<?php
/** access control **/
require_login();
require_permission('管理本公司用户');

/** get vars **/
$uid = isset($vars[1]) ? strip_tags($vars[1]) : null;

/** delete user **/
$response = new stdClass();

$user = MySiteUser::findById($uid);
if (!$user) {
  $response->status = 'error';
  $response->message = '此用户不存在';
} else if ($user->delete()) {
  $response->status = 'success';
} else {
  $response->status = 'error';
  $response->message = '删除用户失败';
}

header('Content-Type: application/json');
echo json_encode($response);