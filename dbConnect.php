<?php
class dbSelect{

  function db_select_all(){
    try{
      $dsn = 'mysql:dbname=ResourceManagement;host=localhost;charset=utf8';
      $user = 'root';
      $password='root';
      $dbh = new PDO($dsn, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  
      $sql = 'SELECT * FROM attendance WHERE 1';
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
  
      $sbh = null;
    }catch(Exception $e){
      echo "エラー";
      exit();
    }

    return $stmt;
  }
}

