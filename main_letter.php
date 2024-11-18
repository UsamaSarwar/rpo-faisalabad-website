<?php
session_start();
if(empty($_SESSION['user_name'])){
	header("location: signin.php");
}
$user_name = $_SESSION['user_name'];
$u_type = $_SESSION['user_type'];

include"connection.php";
date_default_timezone_set("Asia/Karachi");

?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Create New letter Form</title>

	<link href="img/Icons/Former_logo_of_Punjab_Police_Pakistan.svg" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/Icons/Former_logo_of_Punjab_Police_Pakistan.svg" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/Icons/Former_logo_of_Punjab_Police_Pakistan.svg" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/Icons/Former_logo_of_Punjab_Police_Pakistan.svg" rel="apple-touch-icon" type="image/png">
	<link href="img/Icons/Former_logo_of_Punjab_Police_Pakistan.svg" rel="icon" type="image/png">
	<link href="img/Icons/Former_logo_of_Punjab_Police_Pakistan.svg" rel="shortcut icon">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


<link rel="stylesheet" href="css/separate/vendor/tags_editor.min.css">
<link rel="stylesheet" href="css/separate/vendor/bootstrap-select/bootstrap-select.min.css">
<link rel="stylesheet" href="css/separate/vendor/select2.min.css">
<link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
<link rel="stylesheet" href="css/separate/vendor/bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/lib/ion-range-slider/ion.rangeSlider.css">
	<link rel="stylesheet" href="css/lib/ion-range-slider/ion.rangeSlider.skinHTML5.css">
	
	<link rel="stylesheet" href="css/lib/bootstrap-sweetalert/sweetalert.css">
	<link rel="stylesheet" href="css/separate/vendor/sweet-alert-animations.min.css">
	<script src="js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>


</head>
<body class="with-side-menu">
<?php
	include"header.php";
	?>
<style>
	.form-control{
		color: #8e9fa7!important;
	}
:required:focus {
  box-shadow: 0  0 6px rgba(255,0,0,0.5);
  border: 1px red solid;
  outline: 0;
}

	
</style>
	<div class="page-content">
		<div class="container-fluid">
			<div class="box-typical box-typical-padding">

				<h5 class="m-t-lg with-border" style="margin-bottom: 20px; color: #184d88;"><i class="font-icon"> <img src="img/Icons/diary.svg" style="height: 20px; width: 20px; " alt=""></i> Main Diary <span style="font-size: 15px; color: #545454;">(All fields marked with <span style="color: red;">*</span> are required)</span></h5>
				
				
				
				<?php

if($_POST){
	$dairy_number = $_POST['dairy_number'];
	$dispatch_no = $_POST['dispatch_no'];
	$received_date = $_POST['received_date'];
	$received_time = $_POST['received_time'];
	$received_from = $_POST['received_from'];
	$diary_source = $_POST['diary_source'];
	$dispatch_date = $_POST['dispatch_date'];
	$due_date = $_POST['due_date'];
	$marked_to = $_POST['marked_to'];
	$status = "Pending";
	$remarks = $_POST['remarks'];
	
	$folder = "files/";
	$filename = $_FILES['file']['name'];
	$target = $folder.$filename;
	move_uploaded_file($_FILES['file']['tmp_name'], $target);

	

$insert = "INSERT INTO `main_letter`(`dairy_number`, `dispatch_no`, `received_date`, `received_time`, `received_from`, `diary_source`, `dispatch_date`, `due_date`, `marked_to`, `status`, `file`, `remarks`) VALUES ('$dairy_number','$dispatch_no','$received_date','$received_time','$received_from','$diary_source','$dispatch_date','$due_date','$marked_to' ,'$status','$filename','$remarks')";
	$run = mysqli_query($conn,$insert);
if(!$run){
		?>
		<div class="alert alert-danger" role="alert"><strong class="text-capitalize">Wraning!</strong> <?php echo  mysqli_error($conn);?>
          <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>		
	<?php				
	}else{
		?>
<!--
	<div class="alert alert-success" role="alert" style="width: 100%;"><strong class="text-capitalize">Success!</strong> Data Inserted
		<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>
--><script>
				swal({
					title: "Letter Add and Dispatch Successfully!",
					type: "success",
					confirmButtonClass: "btn-success",
					confirmButtonText: "Done"
				});
				</script>
<?php
	}
  }
?>
				
				
				

<form id="form-signin_v1" name="form-signin_v1"  method="post" enctype="multipart/form-data">
				
				<div class="row" style="padding: 0px 20px;">
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInput">Received From <span style="color: red;">*</span></label>
							<select class="form-control select2" id="received_from" name="received_from" required="true">
							<option> </option>
							<?php
								$select = "SELECT * FROM authority";
								$run = mysqli_query($conn,$select);
								while($data = mysqli_fetch_array($run)):
								?>
								
							<option value="<?php echo $data['id']?>"><?php echo $data['authority_name'];?></option>
					<?php endwhile;?>
							</select>
						</fieldset>
					</div>
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInput">Dairy Number <span style="color: red;">*</span></label>
							<input type="text" class="form-control" name="dairy_number" data-validation="[NOTEMPTY]" data-validation-message="Enter Dairy Number" id="dairy_number" placeholder="Dairy Number">
						</fieldset>
					</div>
					
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="p_number_title" for="exampleInputPassword1">Received Date <span style="color: red;">*</span></label>
							<input type="date"  class="form-control" value="<?php echo date("Y-m-d");?>" data-validation="[NOTEMPTY]" data-validation-message="Select Received Date"  name="received_date" id="received_date"><br>
						</fieldset>
					</div>
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="received_time_title" for="exampleInputPassword1">Time</label>
							<input type="time"  class="form-control" value="<?php echo date("H:i:s");?>"  data-validation="[NOTEMPTY]" data-validation-message="Select Received Time" name="received_time" id="received_time"><br>
						</fieldset>
					</div>
				</div>				
	       <div class="row" style="padding: 0px 20px;">
			   
			   		<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">Marked to <span style="color: red;">*</span></label>
							<select class="form-control select2" id="marked_to" multiple="multiple" name="marked_to" required="true">
							<option>  </option>
							<?php
								$select = "SELECT * FROM branch";
								$run = mysqli_query($conn,$select);
								while($data = mysqli_fetch_array($run)):
								?>
								
							<option value="<?php echo $data['id']?>"><?php echo $data['branch_name'];?></option>
					<?php endwhile;?>
							</select>
						</fieldset>
					</div>
					
			   <div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="dispatch_no_title" for="exampleInputPassword1">Letter Dispatch No. <span style="color: red;">*</span></label>
							<input type="text"  class="form-control" placeholder="Dispatch No." data-validation="[NOTEMPTY]" data-validation-message="Enter Dispatch No."  name="dispatch_no" id="dispatch_no"><br>
						</fieldset>
					</div>
					
					
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="p_number_title" for="exampleInputPassword1">Dispatch Date<span style="color: red;">*</span></label>
							<input type="date"  class="form-control" value="<?php echo date("Y-m-d");?>" data-validation="[NOTEMPTY]" data-validation-message="Select Dispatch Date"  name="dispatch_date" id="dispatch_date"><br>
						</fieldset>
					</div>
			   
			   <div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">Source of Diary <span style="color: red;">*</span></label>
							<select class="form-control select2" id="diary_source" name="diary_source" required="true">
							<span class="font-icon-search"></span>
							<option value="Fax">Fax</option>
							<option value="By Hand" selected>By Hand</option>
							<option value="Call">Call</option>
							<option value="Email">Email</option>
							<option value="Post">Post</option>
							<option value="SMS">SMS</option>
							</select>
						</fieldset>
					</div>
			   
			   
				</div><!--.row-->
	       <div class="row" style="padding: 0px 20px;">
					<div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInput">Due Date</label>
							<input type="date" class="form-control" name="due_date"  id="due_date" placeholder="Full Name">
						</fieldset>
					</div>
					<div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label" id="p_number_title" for="exampleInputPassword1">Select File</label>
							<input type="file"  class="form-control"  name="file" id="file"><br>
						</fieldset>
					</div>
				</div><!--.row-->
	       <div class="row" style="padding: 0px 20px;">
					<div class="col-lg-12">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInput">Subject<span style="color: red;">*</span></label>
							<textarea class="form-control" name="remarks" data-validation="[NOTEMPTY]" data-validation-message="Enter Remarks" rows="3"></textarea>
						</fieldset>
					</div>
				</div><!--.row-->
	
	
			
				<div class="row" style="padding: 0px 20px;">
					<div class="col-md-12 col-sm-12 d-flex justify-content-end" style="margin-top: 10px;">
						<a href="index.php" class="btn btn-rounded btn-inline btn-secondary-outline"  style="padding: 10px 35px;">Cancel</a>
						<input type="submit" value="Save" id="sub" style="padding: 10px 35px;" class="btn btn-rounded btn-inline btn-primary">
					</div>
				</div><!--.row-->
</form>
				
				
			</div><!--.box-typical-->
		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<script src="js/lib/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/lib/popper/popper.min.js"></script>
	<script src="js/lib/tether/tether.min.js"></script>
	<script src="js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>

	<script src="js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
	<script src="js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
	<script src="js/lib/bootstrap-select/bootstrap-select.min.js"></script>

	<script src="js/lib/select2/select2.full.min.js"></script>
	<script src="js/lib/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="js/lib/html5-form-validation/jquery.validation.min.js"></script>

		<script>
	$(function() {
			/* ==========================================================================
			 Validation
			 ========================================================================== */

			$('#form-signin_v1').validate({
				submit: {
					settings: {
						inputContainer: '.form-group'
					}
				}
			});

			$('#form-signin_v2').validate({
				submit: {
					settings: {
						inputContainer: '.form-group',
						errorListClass: 'form-error-text-block',
						display: 'block',
						insertion: 'prepend'
					}
				}
			});

			$('#form-signup_v1').validate({
				submit: {
					settings: {
						inputContainer: '.form-group',
						errorListClass: 'form-tooltip-error'
					}
				}
			});

			$('#form-signup_v2').validate({
				submit: {
					settings: {
						inputContainer: '.form-group',
						errorListClass: 'form-tooltip-error'
					}
				}
			});
		});
	</script>
	
	<script>
	
//	$(document).ready(function(){
//		
//		
//	$("#received_from").on("change",function(){
//		  var d_number = $(this).val();
//		  $.ajax({
//			  url: "diarynum.php",
//			  type: "POST",
//			  data: {roll:d_number},
//			  success: function(data){
//				$("#dairy_number").val(data);
//			  }
//		  });
//	  });
//		
//		
//		
//	})
	</script>
	
	
	
	<script src="js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
	<script src="js/lib/ion-range-slider/ion.rangeSlider.js"></script>
	<script src="js/lib/ion-range-slider/init.js"></script>
	
<script src="js/app.js"></script>
</body>
</html>