<?php
   include('config.php');
   session_start();

   $user_check = $_SESSION['login_user'];
   $user_check2 = $_SESSION['fromCity'];
   $user_check3 = $_SESSION['toCity'];
   $user_check4 =$_SESSION['travel'];
   $user_check5=$_SESSION['busID'];
   $user_check6 =$_SESSION['noseats'];
     echo $user_check;
     echo $user_check2;
     echo $user_check3;
     echo $user_check4;
      echo $user_check5;
       echo $user_check6;

   //$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   //$login_session = $row['username'];

   //if(!isset($_SESSION['login_user'])){
  //    header("location:login.php");
   //}
?>
