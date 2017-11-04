<?php
  if ($_POST["submit"]) {
    if (!$_POST['username']) {
      $error="<br />Please enter your name";
    }
    if (!$_POST['phNo']) {
      $error.="<br />Please enter your Phone Number";
    }
    if (!$_POST['bday']) {
      $error.="<br />Please enter your Birth Date";
    }
    if (!$_POST['address']) {
      $error.="<br />Please enter your Address";
    }
    if (!$_POST['cc']) {
      $error.="<br />Please enter your Credit Card Number";
    }
    if (!$_POST['password']) {
      $error.="<br />Please enter a Password";
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
      $ID = $_POST['username'];
      $pass = $_POST['password'];
      $phone = $_POST['phNo'];
      $address = $_POST['address'];
      $dob = $_POST['bday'];
      $credit = $_POST['cc'];
      $dob=$_POST['bday'];
      $date = DateTime::createFromFormat('d/m/Y', $dob);
      $date = $date->format('Y-m-d');
      /*
      echo $ID." ";
      echo $Pass." ";
      echo $phone." ";
      echo $address." ";
      echo $dob." ";
      echo $credit;
      */

      $sql = "INSERT INTO registered (username, phNo, address,cc,dob,password) VALUES ('$ID','$phone','$address','$credit','$date','$pass')";
      $sql2 = "INSERT INTO login (username,password) VALUES ('$ID','$pass')";
      if (($conn->query($sql))&&($conn->query($sql2)) === TRUE) {
          $result='<div class="alert alert-success"><strong>Registration Successful !</strong> </div>';
      } else {
          $result='<div class="alert alert-danger"><strong>There were an error in creation, Please try again :</strong>'. $conn->error.'</div>';
      }
      $conn->close();
    }
}
?>
<!doctype html>
<html>
<head>
<title>Registration</title>
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
background-color: #e1e1e1;
}
form {
padding-bottom:15px;
}
.morepadd {
   padding-top:40px;
}
</style>
</head>
<body>
<div class="container morepadd">
  <div class="row">
    <div class="col-md-6 col-md-offset-3 loginForm">
      <h1 ><strong>NEW USER SIGN-UP</strong></h1>
      <?php echo $result; ?>
      <form method="post">
        <div class="form-group">
          <label for="username">Your Name:</label>
          <input type="text" name="username" class="form-control" value="<?php echo $_POST['username']; ?>" />
        </div>
        <div class="form-group">
          <label for="phNo">Phone Number</label>
          <input type="text" name="phNo" class="form-control" value="<?php echo $_POST['phNo']; ?>" />
        </div>

        <div class="form-group input-field" >
          <label for="bday">DOB</label>
          <input class="form-control" id="datepicker" type="date" name="bday" value="<?php echo $_POST['bday']; ?>">
        </div>

        <div class="form-group input-field" >
          <label for="address">Address</label>
          <input class="form-control" type="text" name="address" value="<?php echo $_POST['address']; ?>"/>
        </div>
        <div class="form-group input-field" >
          <label for="cc">Credit Card Number</label>
          <input class="form-control" type="password" name="cc" value="<?php echo $_POST['cc']; ?>" />
        </div>

        <div class="form-group input-field" >
          <label for="password">Password</label>
          <input  class="form-control" type="password" name="password" value="<?php echo $_POST['password']; ?>">
        </div>

        <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit"/>
      </form>
    </div>
  </div>
</div>
<script>
$( function() {
  $( "#datepicker" ).datepicker();
} );
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</script>
</body>
</html>
