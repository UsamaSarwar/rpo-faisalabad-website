<?php
include"connection.php";

$roll = $_POST['roll'];

$select = "SELECT COUNT(*) FROM main_letter WHERE received_from = '$roll'";
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


$select = "SELECT * FROM authority WHERE id = '$roll'";
$run = mysqli_query($conn,$select);

$output = "";
if(mysqli_num_rows($run) > 0 ){

              $row = mysqli_fetch_assoc($run);
	if($row['authority_name'] == "PM-CM"){
		$code = $code + 106;
	}
	if($row['authority_name'] == "D"){
		$code = $code + 23921;
	}
	if($row['authority_name'] == "G"){
		$code = $code + 7300;
	}
	if($row['authority_name'] == "IG"){
		$code = $code + 7587;
	}
	
	
	
                $output =$code."/".$row['authority_name'];
              

    mysqli_close($conn);

    echo $output;
}else{
    echo "No Record Found";
}


?>