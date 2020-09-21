<?php
if(isset($_POST['in'])) {
  require "dbConnect.php";
  $db = new dbConnect;
  $db->db_regist_inTime("2020-09-01","1","12:11:12");
  echo "OK";

}else{

}
?>












<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>勤怠管理</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading">サイドバー</div>
  <div class="list-group list-group-flush">
    <a href="./attendance.php" class="list-group-item list-group-item-action bg-light">勤怠管理画面</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">２</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">３</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">４</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">５</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">６</a>
  </div>
</div>
<!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">









      
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <!-- <button class="btn btn-primary" id="menu-toggle">トグル</button> -->

        <form action="attendance.php" method="post">
          <button class="btn btn-primary" id="dakoku" type="submit" name="in">出勤</button>
          <p>ここに時刻をリアルタイムで表示</p>
          <button class="btn btn-primary" id="dakoku" type="submit" name="out">退勤</button>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>













      <div class="container-fluid">
        <h1 class="mt-4">勤怠管理</h1>
        









    <!-- 選択年月 -------------------------------------------------------------------->
    <!-- <form name = "y_m" method="POST"> -->
      <select name='year'>
        <option value='2020'>2020年</option>
        <option value='2019'>2019年</option>
        <option value='2018'>2018年</option>
        <option value='2017'>2017年</option>
        <option value='2016'>2016年</option>
        <option value='2015'>2015年</option>
      </select>

      <?php
        // $this_month = date("m");
        // $today = date("Y-m-d H:i:s");
        // echo $this_month.'<br>';
        // echo $today;



      ?>

      <select name='month'>
        <option value='4'>4月</option>
        <option value='5'>5月</option>
        <option value='6'>6月</option>
        <option value='7'>7月</option>
        <option value='8'>8月</option>
        <option value='9'>9月</option>
        <option value='10'>10月</option>
        <option value='11'>11月</option>
        <option value='12'>12月</option>
        <option value='1'>1月</option>
        <option value='2'>2月</option>
        <option value='3'>3月</option>
      </select>
      <input type="submit" name = "t_m_sub" value="表示">
    <!-- </form> -->

    <!------------------------------------------------------------------------------------>




















  <div class="container-fluid">
    <table class="table table-hover">
      <form method="POST" action="attendanceDetails.php">
        <thead>
          <tr>
            <th>日付</th>
            <th>曜日</th>
            <th>出勤時刻</th>
            <th>退勤時刻</th>
            <th>休憩時間</th>
            <th>申請有無</th>
            <th>日締め</th>
          </tr>
        </thead>
        <tbody>

          <?php
          /* DB接続 ********************************************************************************/
          require "dbConnect.php";
          $db = new dbConnect;
          $stmt = $db->db_select_all();

          /****************************************************************************************/
          $week_array = array( "日", "月", "火", "水", "木", "金", "土" );
          $week_end = date("t"); //プルダウンから選んだ月の最終日を格納
          $day_array=[];


          for($i=1; $i <= $week_end; $i++){
            $day = '2020-09-'.str_pad($i, 2, '0',STR_PAD_LEFT);
            // $day_array[$i-1]=$i;
            $week_num = date('w', strtotime($day));
            $week = $week_array[$week_num];

            echo '<input type="hidden" name=day value="'.$i.'">';
            echo '<input type="hidden" name=month'.$i.' value="">';
            echo '<input type="hidden" name=week value="'.$week.'">';
            echo '<input type="hidden" name=day_array["'.$i.']">';

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);  // DB検索結果を1行取り出し
            if($rec == true){
              $db_inTime = $rec['inTime'];
              $db_outTime = $rec['outTime'];
              $db_restTime = $rec['restTime'];
            }else{
              $db_inTime = "";
              $db_outTime = "";
              $db_restTime = "";
            }
            // echo $rec['inTime'];

            if($week_num == 0){
              echo '<tr style="background-color:red">';
            }elseif($week_num == 1){
              echo '<tr style="background-color:skyblue">';
            }else{
              echo '<tr>';
            }
            // echo '<td><a href="./attendanceDetails.php">'.$i.'</a></td>
            echo '<td><input type="submit" action="./attendanceDetails.php" value="'.$i.'"></td>
            <td>'.$week_array[date('w', strtotime($day))].'</td>
            <td>'.$db_inTime.'</td>
            <td>'.$db_outTime.'</td>
            <td>'.$db_restTime.'</td>
            <td>'.date('m').'</td>
            <td></td>
          </tr>';
          }

        ?>
      </form>

      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->










  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
