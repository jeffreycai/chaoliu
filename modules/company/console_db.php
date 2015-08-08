<?php
  //-- Company:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "company") {
      echo " - Drop table 'company' ";
      echo Company::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- Company:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "company") ) {
  //- create tables if not exits
  echo " - Create table 'company' ";
  echo Company::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  