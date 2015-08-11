<?php
/** access control **/
require_login();
require_permission('管理自己的客户');

/** get vars **/
$cid = isset($vars[1]) ? strip_tags($vars[1]) : null;

/** delete client **/
$response = new stdClass();

$client = Client::findById($cid);

// permisison check if you want to delete client that is not yours
if ($client->getUserId() != MySiteUser::getCurrentUser()->getId()) {
  if (!has_permission('管理所有客户')) {
    $response->status = 'error';
    $response->message = '你没有权限进行此操作';
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
  }
}


if (!$client) {
  $response->status = 'error';
  $response->message = '此客户不存在';
} else if ($client->delete()) {
  $response->status = 'success';
} else {
  $response->status = 'error';
  $response->message = '删除用户失败';
}

header('Content-Type: application/json');
echo json_encode($response);