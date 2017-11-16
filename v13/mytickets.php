<?php
/*ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "root123";
$dbname = "bus";
$conn = new mysqli($servername, $username, $password,$dbname);
$uid = $_SESSION['uid'];
//$query = "SELECT * FROM tickets where user = '$uid';
$query2 = "SELECT tickets.tid,tickets.BusID,tickets.cost,tickets.noseats,routes.toCity,routes.fromCity,routes.dep_date,routes.dep_time,routes.arr_date,routes.arr_time FROM routes,tickets where tickets.BusID = routes.bid and tickets.user='$uid'ORDER BY tickets.Tid DESC";
$result = $conn->query($query2);
$rowaf =  mysqli_fetch_array($result)
$busaf=$rowaf['BusID'];
  session_start();
  $tid=$_POST["tid"];
  $_SESSION['tid']=$tid;
  if ($_POST["cancel"]) {
    header("location: ticketCancel.php");
  }*/

?>
<!doctype html>
<html>
<head>
<title>Loggin in</title>
<meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/
bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/
bootstrap-theme.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
html , body {
   height: 100%;
}
.container {
   background-image:url("source/home/css/image.jpg");
   position: relative;
   width:100%;
   height:100%;
   background-position: center;
   background-repeat: no-repeat;
   background-size: cover;
   padding-top:140px;
}
.loginForm {
border:2px solid green;
border-radius:10px;
margin-top:20px;
background-color:#e1e1e1;
}
form {
padding-top:10px;
padding-bottom:20px;
}
.morepadd {
   padding-top:90px;
}
.btnpadd {
   margin-left:350px;
}
.center {
   text-align:center;
}

</style>
</head>
<body>
<div class="container morepadd">

    <div class="col-md-9 col-md-offset-2 loginForm">
      <h1 class="center">CONFIRMED TICKETS</h1>
      <table class="table table-bordered table-hover" >

          <thead class>
            <tr>
              <th bgcolor="  #82e0aa  ">Ticket ID</th>
              <th bgcolor="  #82e0aa  ">BUS ID</th>
              <th bgcolor="  #82e0aa  ">From</th>
              <th bgcolor="  #82e0aa  ">To</th>
              <th bgcolor="  #82e0aa  ">Departure Date</th>
              <th bgcolor="  #82e0aa  ">Departure time</th>
              <th bgcolor="  #82e0aa  ">Arrival Date</th>
              <th bgcolor="  #82e0aa  ">Arrival Time</th>
              <th bgcolor="  #82e0aa  ">Seats</th>
              <th bgcolor="  #82e0aa  ">Cost</th>
            </tr>
          </thead>
          <tbody>
          <?php
          session_start();
          ini_set('display_errors', 1);
          $servername = "localhost";
          $username = "root";
          $password = "root123";
          $dbname = "bus";
          $conn = new mysqli($servername, $username, $password,$dbname);
          $uid = $_SESSION['uid'];
          //$query = "SELECT * FROM tickets where user = '$uid';
          $query2 = "SELECT tickets.tid,tickets.BusID,tickets.cost,tickets.noseats,routes.toCity,routes.fromCity,routes.dep_date,routes.dep_time,routes.arr_date,routes.arr_time FROM routes,tickets where tickets.BusID = routes.bid and tickets.user='$uid'ORDER BY tickets.Tid DESC";
          $result = $conn->query($query2);
          while($row =  mysqli_fetch_array($result)) {
                  echo '<tr>
                            <td bgcolor=" #5dade2 "scope="row">' . $row["tid"] .'</td>
                            <td bgcolor=" #5dade2 "scope="row">' . $row["BusID"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["fromCity"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["toCity"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["dep_time"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["dep_date"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["arr_date"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["arr_time"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["noseats"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["cost"] .'</td>
                          </tr>';
            }
          ?>
        </tbody>
        </div>
      </table>
      <form action="ticketCancel.php" method="get">
        <div class="form-group">
          <label for="tid">Enter Ticket ID:</label>
          <input type="text" name="tid" class="form-control"/>
        </div>
        <input type="submit" name="cancel" class="btn btn-success btn-lg" value="Cancel"/>
        <button type="submit" name="view" class="btn btn-success btn-lg" formaction="viewTicket.php">View Ticket</button>
      </form>
    </div>
    <!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</script>
</body>
</html>