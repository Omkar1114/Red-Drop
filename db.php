<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'reddrop';
//$con = mysqli_connect("localhost","dbusername","dbpassword","dbname");
$con = mysqli_connect($host,$user,$pass,$db);
if (!$con)
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>