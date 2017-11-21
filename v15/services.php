<?php
if ($_POST["submit"]) {
  if (!$_POST['username']) {
    $error.="<br />Please enter Amount";
  }
  if (!$_POST['password']) {
    $error.="<br />Please enter your pin";
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
      session_start();

      $uID = $_SESSION['uid'];
      $ID = $_POST['username'];
      $Pass = $_POST['password'];
      $query = "SELECT max(balance) FROM payment where uid = '$uID' ";
   $result = $conn->query($query);
    $row = mysqli_fetch_array($result);
   $currbalance = $row["max(balance)"];
   $currbalance  = $currbalance + $ID;
   $sql = "UPDATE `payment` SET `balance` = '$currbalance' WHERE `payment`.`uid` = '$uID'";
  $result = $conn->query($sql);   
  header("location: booking.php");         
      
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
   margin-left:265px;
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
      <h1 class="center"><strong>Enter Amount to be added</strong></h1>
      <?php echo $result; ?>
      <form method="post">
        <div class="form-group">
          <label for="username">Enter Amount:</label>
          <input type="text" name="username" class="form-control" value="<?php echo $_POST['username']; ?>" />
        </div>
        <div class="form-group input-field" >
          <label for="password">Pin:</label>
          <input  class="form-control" type="password" name="password" value="<?php echo $_POST['password']; ?>">
        </div>
        <input type="submit" name="submit" class="btn btn-success btn-lg btnpadd" value="Submit"/>
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
