<?php
session_start();
if(empty($_SESSION['user_name'])){
	header("location: signin.php");
}
$user_name = $_SESSION['user_name'];
$u_type = $_SESSION['user_type'];

include"connection.php";
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>	Branch Mark Form</title>

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

				<h5 class="m-t-lg with-border" style="margin-bottom: 20px; color: #184d88;"><i class="font-icon"> <img src="img/Icons/diary.svg" style="height: 20px; width: 20px; " alt=""></i> Kachehri Form  <span style="font-size: 15px; color: #545454;">(All fields marked with <span style="color: red;">*</span> are required)</span></h5>
				
<?php

if($_POST){
	$place = $_POST['place'];
	$dispatch_number = $_POST['dispatch_number'];
	$applicant_name = $_POST['applicant_name'];
	$s_o_applicant = $_POST['s_o_applicant'];
	$cnic_number = $_POST['cnic_number'];
	$cell_number = $_POST['cell_number'];
	$date = $_POST['date'];
	$application_type = $_POST['application_type'];
	$unit = $_POST['unit'];
	$mark_to = $_POST['mark_to'];
	$status = "Pending";
	$remarks = $_POST['remarks'];
	
	$folder = "files/";
	$filename = $_FILES['file']['name'];
	$target = $folder.$filename;
	move_uploaded_file($_FILES['file']['tmp_name'], $target);

	

$insert = "INSERT INTO `kachehri`(`place`, `dispatch_number`, `applicant_name`, `s_o_applicant`, `cnic_number`, `cell_number`, `date`, `application_type`, `unit`, `mark_to`, `status`, `file`, `remarks`) VALUES ('$place','$dispatch_number','$applicant_name','$s_o_applicant','$cnic_number','$cell_number','$date','$application_type','$unit','$mark_to','$status','$filename','$remarks')";
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
					title: "Kachehri Add Successfully!",
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
							<label class="form-label" for="exampleInput">Place Kachari <span style="color: red;">*</span></label>
							<input type="text" class="form-control" name="place" value="" data-validation="[NOTEMPTY]" data-validation-message="Enter Dispatch Number" id="placer" placeholder="Enter Dispatch Number">
						</fieldset>
					</div>
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInput">Dispatch # <span style="color: red;">*</span></label>
							<input type="text" class="form-control" name="dispatch_number" value="" data-validation="[NOTEMPTY]" data-validation-message="Enter Dispatch Number" id="dispatch_number" placeholder="Enter Dispatch Number">
						</fieldset>
					</div>
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="p_number_title" for="exampleInputPassword1">Name Applicant <span style="color: red;">*</span></label>
							<input type="text"  class="form-control" data-validation="[NOTEMPTY]" data-validation-message="Enter Branch Name"  name="applicant_name" id="p_number"><br>
						</fieldset>
					</div>
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="p_number_title" for="exampleInputPassword1">Name(S/O) <span style="color: red;">*</span></label>
							<input type="text"  class="form-control" data-validation="[NOTEMPTY]" data-validation-message="Enter Branch Name"  name="s_o_applicant" id="p_number"><br>
						</fieldset>
					</div>
					
				</div>				
	       <div class="row" style="padding: 0px 20px;">
			        <div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" for="exampleemail">CNIC Number </label>
							<input type="text" class="form-control" data-validation="[NOTEMPTY]" data-validation-message="Enter valid CNIC Number" data-inputmask="'mask': '99999-9999999-9'" required name="cnic_number" id="cnic_number" placeholder="Enter Valid CNIC">
						</fieldset>
					</div>
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" for="exampleemail">Cell Number </label>
							<input type="text" class="form-control" data-validation="[NOTEMPTY]" data-validation-message="Enter valid Cell Number"  required name="cell_number" id="cell_number" placeholder="Enter Valid Cell">
						</fieldset>
					</div>
			   <div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">Date <span style="color: red;">*</span></label>
							<input type="date" class="form-control" name="date" data-validation="[NOTEMPTY]" data-validation-message="Enter Date" id="full_name" placeholder="Enter Branch Name">
						</fieldset>
					</div>
			   	 <div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">Application Type<span style="color: red;">*</span></label>
							<select class="form-control select2" id="application_type" name="application_type" required="true">
							<span class="font-icon-search"></span>
							<option value="FRI Registration">FIR Registration</option>
							<option value="Corruption">Corruption</option>
							<option value="High-Handedness">High-Handedness</option>
							<option value="Change of investigation">Change of Investigation</option>
							<option value="Faulty investigation">Faulty investigation</option>
							<option value="Arrest of Accused">Arrest of Accused</option>
							<option value="Enquiry">Enquiry</option>
					
							</select>
						</fieldset>
			   </div>
				</div><!--.row-->
	       <div class="row" style="padding: 0px 20px;">
			   
			   <div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">District / Unit<span style="color: red;">*</span></label>
							<select class="form-control select2" id="unit" name="unit" required="true">
							<span class="font-icon-search"></span>
							<option></option>
								<?php
								$selectk = "SELECT * FROM kachehri_type";
								$runk = mysqli_query($conn,$selectk);
								while($datak = mysqli_fetch_array($runk)):
								?>
								<option value="<?php echo $datak["id"];?>"><?php echo $datak["type"];?></option>
								
					<?php 
						endwhile;	
						?>
							</select>
						</fieldset>
			   </div>
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">Mark To<span style="color: red;">*</span></label>
							<select class="form-control select2" id="mark_to" name="mark_to" required="true">

							</select>
						</fieldset>
			   </div>
			       <div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">Status <span style="color: red;">*</span></label>
							<select class="form-control select2" id="current_status" name="status" required="true">
							<span class="font-icon-search"></span>
							<option value="Pending" selected>Pending</option>
					
							</select>
						</fieldset>
					</div>
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInput">File</label>
							<input type="file" class="form-control" name="file" id="due_date" placeholder="Full Name">
						</fieldset>
					</div>	
			   
				</div><!--.row-->
	       <div class="row" style="padding: 0px 20px;">
					<div class="col-lg-12">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInput">Subjact<span style="color: red;">*</span></label>
							<textarea class="form-control" name="remarks" data-validation="[NOTEMPTY]" data-validation-message="Enter Branch Name" rows="3"></textarea>
						</fieldset>
					</div>
				</div><!--.row-->
	
	
			
				<div class="row" style="padding: 0px 20px;">
					<div class="col-md-12 col-sm-12 d-flex justify-content-end" style="margin-top: 10px;">
						<a href="index.php" class="btn btn-rounded btn-inline btn-secondary-outline"  style="padding: 10px 35px;">Cancle</a>
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
	
	<script src="js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
	<script src="js/lib/ion-range-slider/ion.rangeSlider.js"></script>
	<script src="js/lib/ion-range-slider/init.js"></script>
	
	
	
		<script>
	
	$(document).ready(function(){
		
		
	$("#unit").on("change",function(){
		  var unit = $(this).val();
		  $.ajax({
			  url: "khachari_type.php",
			  type: "POST",
			  data: {roll:unit},
			  success: function(data){
				$("#mark_to").append(data);
			  }
		  });
	  });
		
		
		
	})
	</script>
	
	
<script src="js/app.js"></script>
</body>
</html>