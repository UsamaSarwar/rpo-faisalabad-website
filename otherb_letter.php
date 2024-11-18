<?php
session_start();
if(empty($_SESSION['user_name'])){
	header("location: signin.php");
}
$user_name = $_SESSION['user_name'];
$u_type = $_SESSION['user_type'];

include"connection.php";



$id = $_GET['id'];


$update = "UPDATE `b_letter` SET status = 'Completed' WHERE id = '$id'";
$run = mysqli_query($conn, $update);

if(!$run){
	echo "error";
}else{
	header("location:bd_letters.php");
}







?>