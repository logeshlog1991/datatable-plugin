<?php
$localhost = 'localhost';
$user = 'root';
$pass = '';
$db = 'ecommarce';

$conn = new mysqli($localhost,$user,$pass,$db);

if($conn->error){
	echo $conn->error;
}
?>