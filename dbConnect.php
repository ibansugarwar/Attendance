<?php
class dbConnect{
  function db_connect(){
    try{
      $dsn = 'mysql:dbname=ResourceManagement;host=localhost;charset=utf8';
      $user = 'root';
      $password='root';
      $dbh = new PDO($dsn, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
      echo "接続エラー";
      exit();
    }

    return $dbh;
  }

  function db_select_all(){
    try{
      $dbh = $this->db_connect();

      $sql = 'SELECT * FROM attendance WHERE 1';
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
  
      $sbh = null;
    }catch(Exception $e){
      echo "抽出エラー";
      exit();
    }

    return $stmt;
  }

  function db_regist_inTime($date,$userID,$time){
    try{
      $dbh = $this->db_connect();

      $sql = 'UPDATE attendance SET inTime=? WHERE date=? AND id=?';
      $stmt = $dbh->prepare($sql);
      $data[] = $time;
      $data[] = $date;
      $data[] = $userID;
      $stmt->execute($data);
      echo $data;
  
      $sbh = null;
    }catch(Exception $e){
      echo "登録エラー";
      exit();
    }
    return "";
  }



}

