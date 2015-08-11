<?php
  //-- Client:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "client") {
      echo " - Drop table 'client' ";
      echo Client::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- Client:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "client") ) {
  //- create tables if not exits
  echo " - Create table 'client' ";
  echo Client::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  
  //-- Document:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "client") {
      echo " - Drop table 'document' ";
      echo Document::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- Document:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "document") ) {
  //- create tables if not exits
  echo " - Create table 'document' ";
  echo Document::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  