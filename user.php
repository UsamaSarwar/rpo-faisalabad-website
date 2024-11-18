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
	<title>Punjab Police - Digital Diary System</title>

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

	
</style>
	<div class="page-content">
		<div class="container-fluid">
			<div class="box-typical box-typical-padding">

				<h5 class="m-t-lg with-border" style="margin-bottom: 20px; color: #184d88;"><i class="font-icon"> <img src="img/Icons/diary.svg" style="height: 20px; width: 20px; " alt=""></i>  Add new User <span style="font-size: 15px; color: #545454;">(All fields are required)</span></h5>
				
				<?php

if($_POST){
	$user_name = $_POST['user_name'];
	$user_name = strtolower($user_name);
	$cnic_number = $_POST['cnic_number'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];
	$number = $_POST['number'];
	$user_type = $_POST['user_type'];
	$department = $_POST['department'];
	$remarks = $_POST['remarks'];

$insert = "INSERT INTO `user`(`user_name`, `cnic_number`, `password`, `re_password`, `number`, `user_type`, `department`, `remarks`) VALUES  ('$user_name','$cnic_number','$password','$re_password','$number','$user_type','$department','$remarks')";
	$run = mysqli_query($conn,$insert);
if(!$run){
		?>
		<div class="alert alert-danger" role="alert"><strong class="text-capitalize">Wraning!</strong> <?php echo  mysqli_error($conn);?>
          <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>		
	<?php				
	}else{
	
 ?>
	<script>
				swal({
					title: "User Create Successfully!",
					type: "success",
					confirmButtonClass: "btn-success",
					confirmButtonText: "Done"
				});
				</script>			
<?php 
 
	
	
         }
	
  }
?>
				
				<form method="post" id="form-signup_v1" name="form-signup_v1">
				
				<div class="row" style="padding: 5px 20px;">
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" for="exampleemail">Create Username </label>
							<input type="text" class="form-control" data-validation="L>=6, L<=18, NOSPACE]" data-validation-message="Username must be between 6 and 18 characters. No special characters allowed." data-validation-regex="/^((?!admin).)*$/i"
											   data-validation-regex-message="The word &quot;Admin&quot; is not allowed in the Username"  name="user_name" placeholder="Create Username">
						</fieldset>
					</div>
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" for="exampleemail">CNIC Number </label>
							<input type="text" class="form-control" data-validation="[NOTEMPTY]" data-validation-message="Enter valid CNIC Number" data-inputmask="'mask': '99999-9999999-9'" required name="cnic_number" id="cnic_number" placeholder="Enter Valid CNIC">
						</fieldset>
					</div>
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" for="signup_v1-password">Password</label>
								<div class="form-control-wrapper">
									<input id="signup_v1-password"
										   class="form-control"
										   name="password"
										   type="password" data-validation="[L>=8]"
										   data-validation-message=" " data-validation-regex="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/i"
											   data-validation-regex-message="Password contains at least eight characters, including at least one number and includes both lower and uppercase letters">
								</div>
						</fieldset>
						
					</div>
					<div class="col-lg-3">
						<fieldset class="form-group">
							<label class="form-label" for="signup_v1-password-confirm">Confirm Password</label>
									<div class="form-control-wrapper">
										<input id="signup_v1-password-confirm"
											   class="form-control"
											   name="re_password"
											   type="password" data-validation="[V==password]"
											   data-validation-message="Confirm password does not match the password">
									</div>
						</fieldset>
					</div>
				</div><!--.row-->
				<div class="row" style="padding: 5px 20px;">
					<div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label" for="exampleemail">User Number </label>
							<input type="text" class="form-control" name="number" data-validation="[NOTEMPTY]" data-validation-message="Enter User Number" id="dairy_number" placeholder="User Number">

						</fieldset>
					</div>
					<div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInputDisabled">User Type</label>
							<select class="form-control select2" name="user_type" id="user_type">
								<option> Select Type</option>
							</select>
						</fieldset>
					</div>
					<div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInputDisabled">Select Department</label>
							<select class="form-control select2" name="department" id="department">
								<option> Select Department</option>

							</select>
						</fieldset>
					</div>

				</div><!--.row-->
				<div class="row" style="padding: 0px 20px;">
					<div class="col-md-12 col-sm-6">
						<fieldset class="form-group">
							<label class="form-label" for="email">Remarks</label>
							<textarea class="form-control" name="remarks" rows="5">Remarks</textarea>
<!--							<input type="email" class="form-control" id="city1" placeholder="Remarks">-->
						</fieldset>
					</div>
				</div><!--.row-->
				<div class="row" style="padding: 5px 20px;">
					<div class="col-md-12 col-sm-12 d-flex justify-content-end" style="margin-top: 10px;">
						<input type="reset" value="Cancel" style="padding: 10px 35px;" class="btn btn-rounded btn-inline btn-secondary-outline">
						<input type="submit" value="Save"  style="padding: 10px 35px;" class="btn btn-rounded btn-inline btn-primary">
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
	<script src="js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
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

	<script type="text/javascript">
  $(document).ready(function(){
  	function loadData(type, category_id){
  		$.ajax({
  			url : "user_type.php",
  			type : "POST",
  			data: {type : type, id : category_id},
  			success : function(data){
  				if(type == "departmentData"){
  					$("#department").html(data);
  				}else{
  					$("#user_type").append(data);
  				}
  				
  			}
  		});
  	}

  	loadData();

  	$("#user_type").on("change",function(){
  		var user_type = $("#user_type").val();

  		if(user_type != ""){
  			loadData("departmentData", user_type);
  		}else{
  			$("#department").html("");
  		}

  		
  	})
  });
</script>
	
<script type="text/javascript">
  $(document).ready(function(){
  	function loadData(type, category_id){
  		$.ajax({
  			url : "user_type.php",
  			type : "POST",
  			data: {type : type, id : category_id},
  			success : function(data){
  				if(type == "stateData"){
  					$("#state").html(data);
  				}else{
  					$("#country").append(data);
  				}
  				
  			}
  		});
  	}

  	loadData();

  	$("#country").on("change",function(){
  		var country = $("#country").val();

  		if(country != ""){
  			loadData("stateData", country);
  		}else{
  			$("#state").html("");
  		}

  		
  	})
  });
</script>

			<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
	<script>
    $(":input").inputmask();

   </script>
	
<script src="js/app.js"></script>
</body>
</html>