<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "police_dds";

// // Create connection
// $conn = new mysqli($servername, $username, $password,$dbname);
// if(!$conn){
// 	echo mysqli_error($conn);
// }

$servername = "localhost";
$username = "adeeljav_rpo";
$password = "Usamanaseer@71";
$dbname = "adeeljav_rpo";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
if(!$conn){
	echo mysqli_error($conn);
}



?>