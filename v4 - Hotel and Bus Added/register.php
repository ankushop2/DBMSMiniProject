<?php
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "root123";
$dbname = "bus";
$conn = new mysqli($servername, $username, $password,$dbname);
$ID = $_POST['username'];
$Pass = $_POST['password'];
$phone = $_POST['phNo'];
$address = $_POST['address'];
$dob = $_POST['bday'];
$credit = $_POST['cc'];
$date = str_replace('/', '-', $dob);
/*
echo $ID." ";
echo $Pass." ";
echo $phone." ";
echo $address." ";
echo $dob." ";
echo $credit;
*/

$sql = "INSERT INTO registered (username, phNo, address,cc,dob,password) VALUES ('$ID','$phone','$address','$credit','$date','$password')";
$sql2 = "INSERT INTO login (username,password) VALUES ('$ID','$Pass')";
if (($conn->query($sql))&&($conn->query($sql2)) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
