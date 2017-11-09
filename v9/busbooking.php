<?php
  include("auth.php");


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
      <h2 >BOOK YOUR TICKETS HERE, <?php echo strtoupper($_SESSION['login_user']); ?>!</h2>
      <form method="post">
        <div class="form-group">
        <label for="depart">From:</label></br>
          <select style="padding:0px;width:100%;float:left;">
            <?php
            ini_set('display_errors', 1);
            $servername = "localhost";
            $username = "root";
            $password = "root123";
            $dbname = "bus";
            $conn = new mysqli($servername, $username, $password,$dbname);
               $query_ak='SELECT DISTINCT fromCity FROM routes';
                $result = $conn->query($query_ak);
         while ($row =  mysqli_fetch_assoc($result)) {
             echo '<option value="'.$row['fromCity']'</option>';
         }
         ?>
          </select>
        </br>
        </div>
        <div class="form-group">
          <label for="depart">From:</label></br>
          <select style="padding:0px;width:100%;float:left;">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
          </select>
        </br>
        </div>

        <div class="form-group input-field" >
          <label for="bday">Date of Journey:</label>
          <input class="form-control" id="datepicker" type="date" name="bday" value="<?php echo $_POST['bday']; ?>">
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
</body>
</html>
