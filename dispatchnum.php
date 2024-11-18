<?php
include"connection.php";

$roll = $_POST['roll'];

$select = "SELECT COUNT(*) FROM main_letter WHERE marked_to = '$roll'";
$run = mysqli_query($conn,$select);
$data = mysqli_fetch_array($run);
	
	$codes = $data['COUNT(*)'];
     $code = $codes + 1;
    	if($code < 10){
	
	$code = "0".$code;
	}
	else{
	$code = $code;
	}


$select = "SELECT * FROM branch WHERE id = '$roll'";
$run = mysqli_query($conn,$select);

$output = "";
if(mysqli_num_rows($run) > 0 ){

              $row = mysqli_fetch_assoc($run);
                $output =$code."/".$row['short_code'];
              

    mysqli_close($conn);

    echo $output;
}else{
    echo "No Record Found";
}


?>