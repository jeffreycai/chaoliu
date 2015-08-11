<?php

require_once __DIR__ . DS . '..' . DS . '..' . DS . 'bootstrap.php';

if (is_cli()) {
  $names = array(
      'ZHENG XIAOHONG', 'WANG LIANGLIANG', 'LI YUNQIAN', 'LIU SHITAO', 'CHENG LANLAN', 'SUN XINWEI', 'QIAN WUCHAO', 'ZHAO LIUYUN', 'TAN GUOQIANG', 'WEI BEIFEI', 'XIA FEIFEI'
  );

  $shengs = array('上海市', '江苏省', '湖南省', '四川省', '云南省', '广西省', '广东省', '台湾省');
  $qus = array('宝山区', '周口店', '宁乡', '沩水镇', '张家界', '小四通', '黄埔区', '晋安区');
  $address = rand(10, 99) . '村' . rand(300, 900) . '号';


  $dob_range_start = 381416400;
  $dob_range_end = 917874000;


  foreach ($names as $name) {
    $client = new Client();

    $client->setType(array_rand(Client::$TYPEs));
    $client->setName($name);
    $client->setDob(rand($dob_range_start, $dob_range_end));
    $client->setXueli(array_rand(Client::$XUELIs));
    $client->setYasichengji(array_rand(Client::$YASIs));
    $client->setDianhua('+86 ' . rand(2156299999, 2156292999));
    $client->setDizhi($shengs[array_rand($shengs)] . ' ' . $qus[array_rand($qus)] . ' ' . $address);
    $client->setEmail(get_random_string(5) . '@gmail.com');
    $client->setKeyuan(array_rand(Client::$KEYUANs));
    $client->setCreatedAt(rand(1439164648, 1439264648));
    $client->setUserId(rand(3,4));
    $client->save();
  }
}