<?php
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "root123";
$dbname = "bus";
$conn = new mysqli($servername, $username, $password,$dbname);
  $ID = $_POST['username'];
   $Pass = $_POST['password'];
       session_start();
       if(!empty($_POST['username'])){
         $query = "SELECT * FROM login where username = '$ID' AND password = '$Pass'";
         $result = $conn->query($query);
         $rows = mysqli_num_rows($result);
         if ($rows == 1) {
            $_SESSION['login_user']=$ID; // Initializing Session
              //header("location: profile.php"); // Redirecting To Other Page
              echo "SUCCESSFULLY";
            } else {
              $error = "Username or Password is invalid";
            }

       }
?>
