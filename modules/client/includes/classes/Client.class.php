<?php
require_once "BaseClient.class.php";

class Client extends BaseClient {
  /** client type **/
  const TYPE_LIUXUE = 1;
  const TYPE_YIMING = 2;
  static $TYPEs = array(
      self::TYPE_LIUXUE => '留学',
      self::TYPE_YIMING => '移民'
  );
  /** xue li **/
  const XUELI_XIAOXUE = 10;
  const XUELI_CHUZHONG = 20;
  const XUELI_GAOZHONG = 30;
  const XUELI_DAZHUAN = 40;
  const XUELI_BENKE = 50;
  const XUELI_YANJIUSHENG = 60;
  const XUELI_BOSHI = 70;
  const XUELI_BOSHIHOU = 80;
  static $XUELIs = array(
      self::XUELI_XIAOXUE => '小学',
      self::XUELI_CHUZHONG => '初中',
      self::XUELI_GAOZHONG => '高中',
      self::XUELI_DAZHUAN => '大专',
      self::XUELI_BENKE => '本科',
      self::XUELI_YANJIUSHENG => '研究生',
      self::XUELI_BOSHI => '博士',
      self::XUELI_BOSHIHOU => '博士后'
  );
  /** ya si cheng ji **/
  static $YASIs = array(
      '3' => 3,
      '3.5' => 3.5,
      '4' => 4,
      '5' => 5,
      '5.5' => 5.5,
      '6' => 6,
      '6.5' => 6.5,
      '7' => 7,
      '7.5' => 7.5,
      '8' => 8,
      '8.5' => 8.5,
      '9' => 9
  );
  /** ke yuan **/
  const KEYUAN_TUIJIAN = 1;
  const KEYUAN_WANGLUO = 2;
  const KEYUAN_DIANHUA = 3;
  const KEYUAN_XIANXIATUIGUANG = 4;
  static $KEYUANs = array(
      self::KEYUAN_TUIJIAN => '推荐',
      self::KEYUAN_WANGLUO => '网络',
      self::KEYUAN_DIANHUA => '电话',
      self::KEYUAN_XIANXIATUIGUANG => '线下推广'
  );
  
  static function findAll($company = null) {
    global $mysqli;
    $query = "SELECT c.* FROM client AS c";
    if ($company) {
      $query .= " INNER JOIN site_user AS su ON c.user_id=su.id WHERE su.company_id=" . MySiteUser::getCurrentUser()->getCompanyId();
    }
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Client();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  /*****
   *  FUNCTIONS
   *****/
  public function getSiteuser() {
    return MySiteUser::findById($this->getUserId());
  }
  
  public function getCreatedAt($format = false) {
    if ($format) {
      return date($format, $this->getDbFieldCreated_at());
    }
    return $this->getDbFieldCreated_at();
  }
  
  static function findAllWithPage($page, $entries_per_page, $company = null) {
    global $mysqli;
    $query = "SELECT c.* FROM client AS c";
    if ($company) {
      $query .= " INNER JOIN site_user AS su ON c.user_id=su.id WHERE su.company_id=" . MySiteUser::getCurrentUser()->getCompanyId();
    }
    $query .= " LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Client();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll($company = null) {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM client AS c";
    if ($company) {
      $query .= " INNER JOIN site_user AS su ON c.user_id=su.id WHERE su.company_id=" . MySiteUser::getCurrentUser()->getCompanyId();
    }
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
}
