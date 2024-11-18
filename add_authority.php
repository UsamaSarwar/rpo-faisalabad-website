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
	<title>Create New Authority Form</title>

	<link href="img/Icons/Former_logo_of_Punjab_Police_Pakistan.svg" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/Icons/Former_logo_of_Punjab_Police_Pakistan.svg" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/Icons/Former_logo_of_Punjab_Police_Pakistan.svg" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/Icons/Former_logo_of_Punjab_Police_Pakistan.svg" rel="apple-touch-icon" type="image/png">
	<link href="img/Icons/Former_logo_of_Punjab_Police_Pakistan.svg" rel="icon" type="image/png">
	<link href="img/Icons/Former_logo_of_Punjab_Police_Pakistan.svg" rel="shortcut icon">>

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

				<h5 class="m-t-lg with-border" style="margin-bottom: 20px; color: #184d88;"><i class="font-icon"> <img src="img/Icons/diary.svg" style="height: 20px; width: 20px; " alt=""></i> Add Authority <span style="font-size: 15px; color: #545454;">(All fields marked with <span style="color: red;">*</span> are required)</span></h5>
				
				
				<?php

if($_POST){
	$authority_name = $_POST['authority_name'];
	$code = $_POST['code'];
	$remarks = $_POST['remarks'];

$insert = "INSERT INTO `authority`(`authority_name`, `code`, `remarks`) VALUES ('$authority_name','$code','$remarks')";
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
					title: "Distric add Successfully!",
					type: "success",
					confirmButtonClass: "btn-success",
					confirmButtonText: "Done"
				});
				</script>
<?php
	}
  }
?>
				

<form id="form-signin_v1" name="form-signin_v1"  method="post">
				
				<div class="row" style="padding: 0px 20px;">
					<div class="col-lg-8">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInput">Name of Authority <span style="color: red;">*</span></label>
							<input type="text" class="form-control" name="authority_name" data-validation="[NOTEMPTY]" data-validation-message="Enter Name of Authority" id="authority_name" placeholder="Name of Authority">
						</fieldset>
					</div>
					<div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">Code<span style="color: red;">*</span></label>
							<input type="text" class="form-control" name="code" data-validation="[NOTEMPTY]" data-validation-message="Enter Code" id="code" placeholder="Enter Code">
						</fieldset>
					</div>
				</div>				

	       <div class="row" style="padding: 0px 20px;">
					<div class="col-lg-12">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInput">Remarks<span style="color: red;">*</span></label>
							<textarea class="form-control" name="remarks" rows="3"></textarea>
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