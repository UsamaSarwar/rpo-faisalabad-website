<?php
session_start();
ob_start();
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
	<title>	Progress Letter Form</title>

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

				<h5 class="m-t-lg with-border" style="margin-bottom: 20px; color: #184d88;"><i class="font-icon"> <img src="img/Icons/diary.svg" style="height: 20px; width: 20px; " alt=""></i> Progress Letter  <span style="font-size: 15px; color: #545454;">(All fields marked with <span style="color: red;">*</span> are required)</span></h5>
				
				
								
				<?php

if($_POST){

	$progress_id = $_POST['progress_id'];
	$dispatch_number = $_POST['dispatch_number'];
	$dispatch_date = $_POST['dispatch_date'];
	$due_date = $_POST['due_date'];
	$remarks = $_POST['remarks'];

	

$insert = "INSERT INTO `progress_sub`(`progress_id`, `dispatch_number`, `dispatch_date`, `due_date`, `remarks`) VALUES ('$progress_id','$dispatch_number','$dispatch_date','$due_date','$remarks')";
	$run = mysqli_query($conn,$insert);
if(!$run){
		?>
		<div class="alert alert-danger" role="alert"><strong class="text-capitalize">Wraning!</strong> <?php echo  mysqli_error($conn);?>
          <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>		
	<?php				
	}else{
	header("location: pp_letter.php");
	}
  }
			

?>
				
		<?php
				$id = $_GET['id'];
				
				$selectp = "SELECT * FROM progress WHERE id = '$id'";
				$runp = mysqli_query($conn,$selectp);
				$datap = mysqli_fetch_array($runp); 
				
				$dist = $datap['district'];
			
	$selectd = "SELECT * FROM distric WHERE id = '$dist'";
	$rund = mysqli_query($conn,$selectd);
	$datad = mysqli_fetch_array($rund);
				
				?>		

<form id="form-signin_v1" name="form-signin_v1"  method="post">
				
			
	       <div class="row" style="padding: 0px 20px;">
			        
					 <div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">Progress Dispatch No<span style="color: red;">*</span></label>
							<input type="text" class="form-control" name="progress_id" value="<?php echo $datap['dispatch_number']; ?>" readonly id="b_name" placeholder="Enter Police Station">
						</fieldset>
					</div>
			   
			  <div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">District<span style="color: red;">*</span></label>
							<input type="text" class="form-control" name="district" value="<?php echo $datad['distric']; ?>" readonly id="b_name" placeholder="Enter Police Station">
						</fieldset>
					</div>
					
			   <div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">Division<span style="color: red;">*</span></label>
							<input type="text" class="form-control" name="division" value="<?php echo $datap['division']; ?>" readonly id="b_name" placeholder="Enter Police Station">
						</fieldset>
					</div>
					
			   <div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">Police Stationr<span style="color: red;">*</span></label>
							<input type="text" class="form-control" name="p_station" value="<?php echo $datap['p_station']; ?>" readonly id="b_name" placeholder="Enter Police Station">
						</fieldset>
					</div>
			   
				</div><!--.row-->
	
					<div class="row" style="padding: 0px 20px;">
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">Crime Head<span style="color: red;">*</span></label>
							<input type="text" class="form-control" name="crime_head" value="<?php echo $datap['crime_head']; ?>" readonly id="b_name" placeholder="Enter FIR Number">
						</fieldset>
					</div>
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">FIR Number<span style="color: red;">*</span></label>
							<input type="text" class="form-control" name="fir_number" value="<?php echo $datap['fir_number']; ?>" readonly id="b_name" placeholder="Enter FIR Number">
						</fieldset>
					</div>	
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="p_number_title" for="exampleInputPassword1">Date<span style="color: red;">*</span></label>
							<input type="date"  class="form-control" data-validation="[NOTEMPTY]" readonly data-validation-message="Enter Dispatch Date"  name="date" value="<?php echo $datap['date']; ?>" id="dispatch_date"><br>
						</fieldset>
					</div>
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" id="p_number_title" for="exampleInputPassword1">Crime<span style="color: red;">*</span></label>
							<input type="text"  class="form-control" data-validation="[NOTEMPTY]" data-validation-message="Enter Crime" placeholder="Enter Crime" name="crime"  value="<?php echo $datap['crime']; ?>" readonly id="dispatch_time"><br>
						</fieldset>
					</div>
					
					
				</div>	
	
		<div class="row" style="padding: 0px 20px;">
					
			    <div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label" id="p_number_title" for="exampleInputPassword1">Dispatch Number<span style="color: red;">*</span></label>
							<input type="text"  class="form-control" data-validation="[NOTEMPTY]" data-validation-message="Enter Dispatch Number"  name="dispatch_number"  id="dispatch_time"><br>
						</fieldset>
					</div>
			   <div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label" id="p_number_title" for="exampleInputPassword1">Dispatch Date<span style="color: red;">*</span></label>
							<input type="date"  class="form-control" data-validation="[NOTEMPTY]" data-validation-message="Enter Dispatch Date"  name="dispatch_date" value="<?php echo date("H:i:s");?>" id="dispatch_time"><br>
						</fieldset>
			</div>
			 <div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label" id="p_number_title" for="exampleInputPassword1">Due Date<span style="color: red;">*</span></label>
							<input type="date"  class="form-control"  name="due_date" value="<?php echo date("H:i:s");?>" id="dispatch_time"><br>
						</fieldset>
			</div>
				   
					
				</div><!--.row-->
	       <div class="row" style="padding: 0px 20px;">
					<div class="col-lg-12">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInput">Remarks<span style="color: red;">*</span></label>
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
	
	
	<script src="js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
	<script src="js/lib/ion-range-slider/ion.rangeSlider.js"></script>
	<script src="js/lib/ion-range-slider/init.js"></script>
	
<script src="js/app.js"></script>
</body>
</html>