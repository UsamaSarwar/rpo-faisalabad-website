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

				<h5 class="m-t-lg with-border" style="margin-bottom: 20px; color: #184d88;"><i class="font-icon"> <img src="img/Icons/diary.svg" style="height: 20px; width: 20px; " alt=""></i> Branches  <span style="font-size: 15px; color: #545454;">(All fields marked with <span style="color: red;">*</span> are required)</span></h5>
				
				
								
				<?php
				
					
$selectm = "SELECT * FROM user WHERE user_name = '$user_name'";
$runm = mysqli_query($conn,$selectm);
$datam = mysqli_fetch_array($runm);
				
$mark = $datam['department'];
				
$selectb = "SELECT * FROM branch WHERE id = '$mark'";
$runb = mysqli_query($conn,$selectb);
$datab = mysqli_fetch_array($runb);
	
$b_name = $datab['branch_name'];		
$p_code = $datab['previous_number'];
$short_code = $datab['short_code'];
		
$selectbm = "SELECT COUNT(*) FROM branch_mark WHERE dispatch_from = '$b_name'";
$runbm = mysqli_query($conn,$selectbm);
$databm = mysqli_fetch_array($runbm);
				
$selectmain = "SELECT COUNT(*) FROM main_dispatch WHERE dispatch_from = 'branch' and branch_name = '$b_name'";
$runmain = mysqli_query($conn,$selectmain);
$datamain = mysqli_fetch_array($runmain);
				
$selecr = "SELECT COUNT(*) FROM b_letter WHERE branch_name = '$b_name'";
$ru = mysqli_query($conn,$selecr);
$dat = mysqli_fetch_array($ru);

$nu = $dat['COUNT(*)'];
				
$num = $datamain['COUNT(*)'];
				
				
$codes = $databm['COUNT(*)'];	
     $code = $codes + 1 + $p_code + $num +$nu;
    	if($code < 10){
	
	$code = "0".$code;
	}
	else{
	$code = $code;
	}
	$branchname = $datab['branch_name'];
		

if($_POST){
	$dispatch_date = $_POST['dispatch_date'];
	$dispatch_time = $_POST['dispatch_time'];
	$marked_to = $_POST['marked_to'];
	$branch_dispatch = $_POST['branch_dispatch'];	
	$officer_name = $_POST['officer_name'];
	$due_date = $_POST['due_date'];
	$current_status = $_POST['current_status'];
	$remarks = $_POST['remarks'];
	
	if($marked_to == "other"){
	$mark_other = $_POST['mark_other'];
	}else{
	$mark_other = " ";
	}
	
	
for($x = 0; $x < count((array)$_POST['marked_to']); $x++) {
	

$insert = "INSERT INTO `b_letter`(`branch_name`, `dispatch_date`, `dispatch_time`, `marked_to`,`other_mark`, `branch_dispatch`, `officer_name`, `due_date`, `status`, `remarks`) VALUES ('$branchname','$dispatch_date','$dispatch_time','".$_POST['marked_to'][$x]."','$mark_other','$branch_dispatch','$officer_name','$due_date','$current_status','$remarks')";
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
					title: "Dispatch Successfully!",
					type: "success",
					confirmButtonClass: "btn-success",
					confirmButtonText: "Done"
				});
				</script>
<?php
	}
	
}
	
  }
			

?>
				
				

<form id="form-signin_v1" name="form-signin_v1"  method="post">
				
				<div class="row" style="padding: 0px 20px;">
					<div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">Branch Name <span style="color: red;">*</span></label>
							<input type="text" class="form-control" readonly name="dispatch_from" value="<?php echo $branchname;?>" id="b_name" placeholder="Enter Branch Name">
						</fieldset>
					</div>
					<div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label" id="p_number_title" for="exampleInputPassword1">Dispatch Date<span style="color: red;">*</span></label>
							<input type="date"  class="form-control" data-validation="[NOTEMPTY]" data-validation-message="Enter Dispatch Date"  name="dispatch_date" value="<?php echo date("Y-m-d");?>" id="dispatch_date"><br>
						</fieldset>
					</div>
					<div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label" id="p_number_title" for="exampleInputPassword1">Dispatch Time<span style="color: red;">*</span></label>
							<input type="time"  class="form-control" data-validation="[NOTEMPTY]" data-validation-message="Enter Dispatch Date"  name="dispatch_time" value="<?php echo date("H:i:s");?>" id="dispatch_time"><br>
						</fieldset>
					</div>
					
				</div>				
	       <div class="row" style="padding: 0px 20px;">
			        
					<div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">Marked to <span style="color: red;">*</span></label>
							<select class="form-control select2" id="marked_to" multiple="multiple" name="marked_to[]" required="true">
							<option></option>
							<?php
								$select = "SELECT * FROM distric";
								$run = mysqli_query($conn,$select);
								while($data = mysqli_fetch_array($run)):
								?>
								
							<option value="<?php echo $data['id']?>"><?php echo $data['distric'];?></option>
					<?php endwhile;?>
								<option value="other"> Other</option>
							</select>
						</fieldset>
					</div>
			   <div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label" id="p_number_title" for="exampleInputPassword1">Branch Dispatch # <span style="color: red;">*</span></label>
							<input type="text"  class="form-control" data-validation="[NOTEMPTY]" data-validation-message="Enter Branch Dispatch No"  name="branch_dispatch" id="branch_dispatch"><br>
						</fieldset>
					</div>
					<div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label" id="p_number_title" for="exampleInputPassword1">Officer Name</label>
							<input type="text"  class="form-control" placeholder="Officer Name"  name="officer_name" id="officer_name"><br>
						</fieldset>
					</div>
				</div><!--.row-->
	
	<style>
		.hei{
			display: none;
		}
	</style>
	<div class="hei" id="re">
		       <div class="row" style="padding: 0px 20px;">
					<div class="col-lg-12">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInput">Mark to Other</label>
							<input type="text" class="form-control" name="mark_other" id="due_date" placeholder="Mark Other">
						</fieldset>
					</div>
					
				</div><!--.row-->
	    </div> 
		<div class="row" style="padding: 0px 20px;">
					<div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInput">Due Task Date</label>
							<input type="date" class="form-control" name="due_date" id="due_date" placeholder="Full Name">
						</fieldset>
					</div>

			       <div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label" id="course_title" for="exampleemail">Current Status of Letter<span style="color: red;">*</span></label>
							<select class="form-control select2" id="current_status" name="current_status" required="true">
							<span class="font-icon-search"></span>
							<option value="Pending" selected>Pending</option>
							<option value="Information">Information</option>
					
							</select>
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
	
	<script>
	
	$(document).ready(function(){
		
		
	$("#marked_to").on("change",function(){
		  var marked_to = $("#marked_to").val();
		
		if(marked_to == "other"){
		$("#re").removeClass();	
		}
		else{
		$("#re").addClass("hei");	
		}
		
		
	  });
		
	})
	</script>
	
	
	<script src="js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
	<script src="js/lib/ion-range-slider/ion.rangeSlider.js"></script>
	<script src="js/lib/ion-range-slider/init.js"></script>
	
<script src="js/app.js"></script>
</body>
</html>