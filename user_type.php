<?php

include"connection.php";

	if($_POST['type'] == ""){
		$sql = "SELECT * FROM user_type";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['type_value']}'>{$row['type_name']}</option>";
		}
	}else if($_POST['type'] == "departmentData"){
		
		if($_POST['id'] == "branch"){

		$sql = "SELECT * FROM branch";
		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['id']}'>{$row['branch_name']}</option>";
		}
		}
		
		elseif($_POST['id'] == "district"){
			
		$sql = "SELECT * FROM distric ";
		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['id']}'>{$row['distric']}</option>";
		}			
		}
		
		elseif($_POST['id'] == "rpo"){
			
		  $str .= "<option value='rpo'>Rpo Office</option>";
		  $str .= "<option value='ad'>AD Office</option>";
			
		}
		
	}

	echo $str;
 ?>
