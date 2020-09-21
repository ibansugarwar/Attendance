<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

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
        <h1 class="mt-4">勤務詳細</h1><br>
        <input type="button" onclick="history.back()" value="戻る">
        







    

  <div class="container-fluid">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>日付</th>
          <th>曜日</th>
          <th>出勤時刻</th>
          <th>退勤時刻</th>
          <th>休憩時間</th>
          <th>申請有無</th>
        </th>
      </thead>
      <tbody>
        <?php

        // DB接続
        try{
          $dsn = 'mysql:dbname=ResourceManagement;host=localhost;charset=utf8';
          $user = 'root';
          $password='root';
          $dbh = new PDO($dsn, $user, $password);
          $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

          $sql = 'SELECT inTime FROM attendance WHERE 1';
          $stmt = $dbh->prepare($sql);
          $stmt->execute();

          $sbh = null;
        }catch(Exception $e){
          echo "エラー";
          exit();
        }



        $month = $_POST['month'];
        $week = $_POST['week'];
        $day = $_POST['day'];


$day_array=$_POST['day_array'];
        echo "配列：".$day_array['0'];



        echo '<tr>
        <td><input type=text value=""></td>
        <td>'.$week.'</td>
        <td><input type=text value=""></td>
        <td><input type=text value=""></td>
        <td><input type=text value=""></td>
        <td><input type=text value=""></td>
        </tr>';
        

        ?>


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
