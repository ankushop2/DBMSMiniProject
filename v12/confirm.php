<?php
  ini_set('display_errors', 1);
  if ($_POST["confirm"]) {
    $servername = "localhost";
    $username = "root";
    $password = "dhruthi";
    $dbname = "bus";
    $conn = new mysqli($servername, $username, $password,$dbname);
    $query  = 'SELECT max(Tid) FROM `tickets`';
      $result = $conn->query($query);
      $row = mysqli_fetch_array($result);
      $maxID = $row["max(Tid)"];
      $newID = $maxID + 1;
   
   session_start();
   $uID = $_SESSION['uid'];
   $busID=$_SESSION['busID'];
   $seats =$_SESSION['noseats'];
   $cost=$_SESSION['costaf'];
    
    $sql = "INSERT INTO tickets (Tid,BusID,user,noseats,cost) VALUES ('$newID','$busID','$uID','$seats','$costaf')";
    $result = $conn->query($query);
    $conn->close();
    header("location: booking.php");
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
   margin-left:170px;
}
.center {
   text-align:center;
}

</style>
</head>
<body>
<div class="container morepadd">
  <div class="row">
    <div class="col-md-6 col-md-offset-3 loginForm">
      <h1 class="center"><strong>TICKET HAS BEEN CONFIRMED!</strong></h1>
      <form method="post">
       <input type="submit" name="goback" class="btn btn-danger " value="Cancel"/>
        <input type="submit" name="confirm" class="btn btn-success btn-lg btnpadd" value="Confirm"/>
      </form>
    </div>
  </div>
</div>
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</script>
</body>
</html>
