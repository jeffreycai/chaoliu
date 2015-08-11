<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - client_id
 * - type
 * - name
 * - uri
 */
class BaseDocument extends DBObject {
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
    $this->table_name = 'document';
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
   public function setClientId($var) {
     $this->setDbFieldClient_id($var);
   }
   public function getClientId() {
     return $this->getDbFieldClient_id();
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
   public function setUri($var) {
     $this->setDbFieldUri($var);
   }
   public function getUri() {
     return $this->getDbFieldUri();
   }

  
  
  /**
   * self functions
   */
  static function dropTable() {
    return parent::dropTableByName('document');
  }
  
  static function tableExist() {
    return parent::tableExistByName('document');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE TABLE IF NOT EXISTS `document` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `client_id` INT ,
  `type` VARCHAR(4) ,
  `name` VARCHAR(255) ,
  `uri` VARCHAR(255) ,
  PRIMARY KEY (`id`)
 ,
INDEX `fk-document-client_id-idx` (`client_id` ASC),
CONSTRAINT `fk-document-client_id`
  FOREIGN KEY (`client_id`)
  REFERENCES `client` (`id`)
  ON DELETE CASCADE 
  ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'Document') {
    global $mysqli;
    $query = 'SELECT * FROM document WHERE id=' . $id;
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
    $query = "SELECT * FROM document";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Document();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM document LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Document();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM document";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function truncate() {
    global $mysqli;
    $query = "TRUNCATE TABLE document";
    return $mysqli->query($query);
  }
}