<?php
$conn = new mysqli("localhost","root", "", "c120098");

if($conn->connect_error){
   echo $conn->error;
}



?>