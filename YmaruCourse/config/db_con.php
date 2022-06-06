<?php

$user='Mebi';
$pas='mesekir';
$db='ymarucourse';
$local='localhost';

$conn= mysqli_connect($local,$user,$pas,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
else{
   // echo "Connected successfully";
}

?>