<?php

class attendanceEdit{
  function regist($user,$time){

    require "dbConnect.php";
    $db = new dbConnect;
    $db->db_regist_inTime($user,$time);


    return "aa";
  }

}