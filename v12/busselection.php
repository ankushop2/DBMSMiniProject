<?php
if ($_POST["submit"]) {
  if (!$_POST['busid']) {
    $error.="<br />Please enter your Bus ID";
  }
  if (!$_POST['noseats']) {
    $error.="<br />Please enter your Number of Seats";
  }
  if ($error) {
    $result='<div class="alert alert-danger"><strong>There were error(s)in your form:</strong>'.$error.'</div>';
  }
  else {
      ini_set('display_errors', 1);
      $servername = "localhost";
      $username = "root";
      $password = "root123";
      $dbname = "bus";
      $conn = new mysqli($servername, $username, $password,$dbname);
      $busID = $_POST['busid'];
      $noSeats = $_POST['noseats'];
      session_start();
      $_SESSION['busID'] = $busID;
      $_SESSION['noseats'] = $noSeats;
      header("location: ticket.php");
    }
}
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
   margin-left:420px;
}
.center {
   text-align:center;
}

</style>
</head>
<body>
<div class="container morepadd">

    <div class="col-md-9 col-md-offset-2 loginForm">
      <table class="table table-bordered">

          <thead class>
            <tr>
              <th>#</th>
              <th>BusID</th>
              <th>From</th>
              <th>To</th>
              <th>Departure Date</th>
              <th>Departure time</th>
              <th>Arrival Date</th>
              <th>Arrival Time</th>
              <th>Available Seats</th>
              <th>Cost</th>
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
          $fromCity = $_SESSION['fromCity'];
          $toCity = $_SESSION['toCity'];
          $travel =$_SESSION['travel'];
          $date = DateTime::createFromFormat('m/d/Y', $travel);
          $date = $date->format('Y-m-d');
          //echo $fromCity;
          //echo $toCity;
          //echo $date;
          $query = "SELECT * FROM routes where fromCity = '$fromCity' AND toCity = '$toCity' AND dep_date = '$date'";
          $result = $conn->query($query);
          while($row =  mysqli_fetch_array($result)) {
                  echo '<tr>
                            <td scope="row">' . $row["rid"]. '</td>
                            <td>' . $row["bid"] .'</td>
                            <td> '.$row["fromCity"] .'</td>
                            <td> '.$row["toCity"] .'</td>
                            <td> '.$row["dep_date"] .'</td>
                            <td> '.$row["dep_time"] .'</td>
                            <td> '.$row["arr_date"] .'</td>
                            <td> '.$row["arr_time"] .'</td>
                            <td> '.$row["availseats"] .'</td>
                            <td> '.$row["cost"] .'</td>
                          </tr>';
            }
          ?>
        </tbody>
        </div>
      </table>
      <form method="post">
        <div class="form-group">
          <label for="busid">Enter BUS ID:</label>
          <input type="text" name="busid" class="form-control"/>
        </div>
        <div class="form-group input-field" >
          <label for="noseats">Enter Number of Seats:</label>
          <input  class="form-control" type="text" name="noseats">
        </div>
        <input type="submit" name="submit" class="btn btn-success btn-lg btnpadd" value="Submit"/>
      </form>
    </div>
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</script>
</body>
</html>
