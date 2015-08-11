<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - user_id
 * - type
 * - name
 * - dob
 * - xueli
 * - yasichengji
 * - dianhua
 * - dizhi
 * - email
 * - keyuan
 * - beizhu
 * - created_at
 */
class BaseClient extends DBObject {
  /**
   * Implement parent abstract functions
   */
  protected function setPrimaryKeyName() {
    $this->primary_key = array(
      'id'
    );
  }
  protected function setPrimaryKeyAutoIncreased() {
    $this->pk_auto_increased = TRUE;
  }
  protected function setTableName() {
    $this->table_name = 'client';
  }
  
  /**
   * Setters and getters
   */
   public function setId($var) {
     $this->setDbFieldId($var);
   }
   public function getId() {
     return $this->getDbFieldId();
   }
   public function setUserId($var) {
     $this->setDbFieldUser_id($var);
   }
   public function getUserId() {
     return $this->getDbFieldUser_id();
   }
   public function setType($var) {
     $this->setDbFieldType($var);
   }
   public function getType() {
     return $this->getDbFieldType();
   }
   public function setName($var) {
     $this->setDbFieldName($var);
   }
   public function getName() {
     return $this->getDbFieldName();
   }
   public function setDob($var) {
     $this->setDbFieldDob($var);
   }
   public function getDob() {
     return $this->getDbFieldDob();
   }
   public function setXueli($var) {
     $this->setDbFieldXueli($var);
   }
   public function getXueli() {
     return $this->getDbFieldXueli();
   }
   public function setYasichengji($var) {
     $this->setDbFieldYasichengji($var);
   }
   public function getYasichengji() {
     return $this->getDbFieldYasichengji();
   }
   public function setDianhua($var) {
     $this->setDbFieldDianhua($var);
   }
   public function getDianhua() {
     return $this->getDbFieldDianhua();
   }
   public function setDizhi($var) {
     $this->setDbFieldDizhi($var);
   }
   public function getDizhi() {
     return $this->getDbFieldDizhi();
   }
   public function setEmail($var) {
     $this->setDbFieldEmail($var);
   }
   public function getEmail() {
     return $this->getDbFieldEmail();
   }
   public function setKeyuan($var) {
     $this->setDbFieldKeyuan($var);
   }
   public function getKeyuan() {
     return $this->getDbFieldKeyuan();
   }
   public function setBeizhu($var) {
     $this->setDbFieldBeizhu($var);
   }
   public function getBeizhu() {
     return $this->getDbFieldBeizhu();
   }
   public function setCreatedAt($var) {
     $this->setDbFieldCreated_at($var);
   }
   public function getCreatedAt() {
     return $this->getDbFieldCreated_at();
   }

  
  
  /**
   * self functions
   */
  static function dropTable() {
    return parent::dropTableByName('client');
  }
  
  static function tableExist() {
    return parent::tableExistByName('client');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE TABLE IF NOT EXISTS `client` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT ,
  `type` TINYINT ,
  `name` VARCHAR(24) NOT NULL ,
  `dob` INT ,
  `xueli` TINYINT ,
  `yasichengji` VARCHAR(3) ,
  `dianhua` VARCHAR(20) ,
  `dizhi` VARCHAR(512) ,
  `email` VARCHAR(36) ,
  `keyuan` VARCHAR(36) ,
  `beizhu` TEXT ,
  `created_at` INT ,
  PRIMARY KEY (`id`)
 ,
INDEX `fk-client-user_id-idx` (`user_id` ASC),
CONSTRAINT `fk-client-user_id`
  FOREIGN KEY (`user_id`)
  REFERENCES `site_user` (`id`)
  ON DELETE SET NULL 
  ON UPDATE SET NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'Client') {
    global $mysqli;
    $query = 'SELECT * FROM client WHERE id=' . $id;
    $result = $mysqli->query($query);
    if ($result && $b = $result->fetch_object()) {
      $obj = new $instance();
      DBObject::importQueryResultToDbObject($b, $obj);
      return $obj;
    }
    return null;
  }
  
  static function findAll() {
    global $mysqli;
    $query = "SELECT * FROM client";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Client();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM client LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Client();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM client";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function truncate() {
    global $mysqli;
    $query = "TRUNCATE TABLE client";
    return $mysqli->query($query);
  }
}