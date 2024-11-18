<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" extension-installed="true"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<!-- Meta data -->
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

		<!-- Title -->
		<title>Punjab Police - Digital Diary System</title>
		<!-- Bootstrap css -->
		<link href="./Punjab Police - Digital Diary System_files/bootstrap.min.css" rel="stylesheet">
		<!-- Style css -->
		<link href="./Punjab Police - Digital Diary System_files/style.css" rel="stylesheet">
		<link href="./Punjab Police - Digital Diary System_files/default.css" rel="stylesheet">
		<!--Font icons css-->
		<link href="./Punjab Police - Digital Diary System_files/icons.css" rel="stylesheet">
		<!-- Color-palette css-->
		<link rel="stylesheet" href="./Punjab Police - Digital Diary System_files/skins.css">


</head>
	<body class="app" style="background-color: rgb(7, 59, 99);" cz-shortcut-listen="true">

		<!-- Loader -->
		<div id="loading" style="display: none;">
			<img src="./Punjab Police - Digital Diary System_files/loader.svg" class="loader-img" alt="Loader">
		</div>
<style>
	.logo{
		height: 150px;
		width: 150px;
		background-color: white;
		border-radius: 50%;
		display: flex;
		justify-content: center;
		align-items: center;	
		margin: 0px auto;
	}
	.m-logo{
		position: absolute;
		top: 40px;
	}
	.s-heading{
		color: #c7eafb;
	}
	.heading{
		color: white;
	}

</style>
		
		<div class="container-fluid" style="margin: 5rem 0rem 6rem 0rem;">
			<div class="row">
				<div class="col-12 p-4" style="background-color: #f41919;"></div>
				<div class="col-12 p-4" style="background-color: #000063;"></div>
				<div class="col-12 m-logo">
				<div class="logo"><img src="./Punjab Police - Digital Diary System_files/Former_logo_of_Punjab_Police_Pakistan.svg" alt=""> </div>
				</div>
			</div>
		</div>
		
		<!-- Page opened -->
		<div class="">
				<!-- container opened -->
				<div class="container mb-5">
								<div class="row">
									<div class="col-lg-8">
									<div class="row">
										<div class="col-lg-12 col-sm-6 mb-5 ml-5">
											<h4 class="s-heading" style="margin-left: 110px">Punjab Police</h4>
											<h1 class="heading">Digital Diary System</h1>
										</div>
										<div class="col-lg-7 col-sm-6 mt-5 mb-4">
											<img src="./Punjab Police - Digital Diary System_files/Urdu-Text.png" alt="">
										
										</div>
										
									</div>
									
									</div>
									<div class="col-md-12 col-lg-4" style="background-color: white; border-radius: 30px;">
										<div class="card-body about-con pabout">
											<h2 class="text-center  mb-4" style="color: red;">Sign In</h2>
											<h5 class="text-center  mb-4">Login to access your account.</h5>
											
											
																<?php
											
include"connection.php";
if($_POST)
{
$user_name = $_POST['user_name'];
$user_name = strtolower($user_name);
$u_password = $_POST['u_password'];

$select = "select * from user where user_name = '$user_name' and password = '$u_password'";
$res = mysqli_query($conn,$select);
$data = mysqli_fetch_array($res);

if($data['user_name']!= $user_name and $data['password']!= $u_password)
{
	echo "<div class='alert alert-danger'>Incorrect username and password</div>";
}
elseif($data['user_name'] == $user_name and $data['password'] == $u_password)
{
	$_SESSION['user_name'] = $data['user_name'];
	$_SESSION['user_type'] = $data['user_type'];
    header("location:index.php");
}
}
mysqli_close($conn);											
											
?>
											
											
											<form method="post">
											<div class="form-group">
												<input type="text" class="form-control" required name="user_name" placeholder="User Name">
											</div>
											<div class="form-group">
												<input type="password" class="form-control" required name="u_password" id="exampleInputPassword1" placeholder="Password">
											</div>
											<div class="form-group d-flex justify-content-center">
												<label class="custom-control custom-checkbox">
													<a href="#" class="float-right small text-info">Forgot password?</a>
												</label>
											</div>
											<div class="form-footer mt-1 d-flex justify-content-center">
<!--												<a href="index.php" class="btn btn-primary btn-lg btn-pill"> LOGIN</a>-->
												<input type="submit" value="LOGIN" class="btn btn-primary btn-lg btn-pill">
											</div>
											</form>
											
											
							</div>
						</div>
					</div>
				</div>
			
			<div class="container mt-8 mb-3">
				<div class="row">
					<div class="col-12">
						<hr style="margin-bottom: 0px;">
						<span class="s-heading">© 2022. All Rights Reserved: Punjab Police (RPO Office Faisalabad)</span>
						<span class="s-heading" style="float: right;">Design and Developed by <a href="https://csoftsystems.com/" style="color: red;">CSOFT Systems</a> </span>
					</div>
				</div>	
			</div>
				<!-- container closed -->
		</div>
		<!-- Page closed -->



		<!-- Custom js-->
		<script src="./Punjab Police - Digital Diary System_files/custom.js.download"></script>

	

</body></html>