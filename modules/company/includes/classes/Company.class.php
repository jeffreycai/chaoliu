<?php
require_once "BaseCompany.class.php";

class Company extends BaseCompany {
  public function __toString() {
    return $this->getName();
  }
}
