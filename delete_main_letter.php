<?php
session_start();
if(empty($_SESSION['user_name'])){
	header("location: signin.php");
}
$user_name = $_SESSION['user_name'];
$u_type = $_SESSION['user_type'];

include"connection.php";



$id = $_GET['id'];

$delete = "DELETE FROM main_letter WHERE id = '$id'";
$run = mysqli_query($conn,$delete);
if(!$run){
	
echo mysqli_error($conn);
}
else{
	header("location: pending_letters.php");
}





?>