<?php
include"connection.php";

$roll = $_POST['roll'];



$select = "SELECT * FROM kachehri_subtype WHERE kachehri_type = '$roll'";
$run = mysqli_query($conn,$select);

$output = "";
if(mysqli_num_rows($run) > 0 ){

	while($row = mysqli_fetch_assoc($run)){
                $output .= "<option>".$row['type']."</option>";
              
	}
    mysqli_close($conn);

    echo $output;
}else{
    echo "No Record Found";
}


?>