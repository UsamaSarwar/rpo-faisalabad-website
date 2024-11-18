<?php
include"connection.php";

$roll = $_POST['roll'];

   $selectm = "SELECT COUNT(*) FROM main_dispatch WHERE dispatch_from = 'main'";
   $runm = mysqli_query($conn,$selectm);
   $datam = mysqli_fetch_array($runm);

	$codes = $datam['COUNT(*)'];
	 $code = $codes + 1;
		if($code < 10){

	$code = "0".$code;
	}
	else{
	$code = $code;
	}
   $code = $code+17204;


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