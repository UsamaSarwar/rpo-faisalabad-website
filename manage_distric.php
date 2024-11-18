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
		<link rel="stylesheet" href="css/lib/bootstrap-sweetalert/sweetalert.css">
	<link rel="stylesheet" href="css/separate/vendor/sweet-alert-animations.min.css">
	<script src="js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
	<link rel="stylesheet" href="css/lib/bootstrap-table/bootstrap-table.min.css">
    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
	
</head>
<body class="with-side-menu control-panel control-panel-compact">

<?php
	include"header.php";
	?>

<div class="page-content">
		<div class="container-fluid">
			<section class="box-typical">
				<div id="toolbar">
					<div class="bootstrap-table-header"> <i class="font-icon"> <img src="img/Icons/laptop.svg" style="height: 35px; width: 35px;" alt=""></i>
 <span style="color: #184d88;">Distric </span> |<span style="font-size: 14px; font-weight: 300;">Manage Distric</span></div>

				</div>
				<div class="table-responsive p-4 table-bordered">
					<table id=""
						   data-toggle="table"
						   class="table table-striped"
						   data-toolbar="#toolbar"
						   data-search="true"
						   data-show-refresh="true"
						   data-show-columns="true"
						   data-show-export="true"
						   data-minimum-count-columns="2"
						   data-pagination="true"
						   data-id-field="id"
						   data-page-list="[10, 25, 50, 100, ALL]"
						   data-show-footer="false"
						   data-response-handler="responseHandler">
						   <thead>
                <tr>
                    <th>Sr #</th>
                    <th>Division Name</th>
                    <th>District Name</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                </tr>
            </thead>
        <tbody>
					
			
				
						<tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
<div class="dropdown dropdown-status classDropup ">
				<button class="btn classBtn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Actions</button>
				<div class="dropdown-menu">
				<a class="dropdown-item" href="#"><i class="font-icon"> <img src="img/Icons/edit.svg" style="height: 15px; width: 15px;" alt=""></i>Edit Branch</a>
					<a class="dropdown-item" href="#" id="not_suspend"><i class="font-icon"> <img src="img/Icons/denied_ck.svg" style="height: 15px; width: 15px;" alt=""></i>Delete Branch</a>
				</div></div>
						
				</td>			</tr>

			
					 </tbody>
					</table>
				</div>
			</section>
		</div><!--.container-fluid-->
	</div><!--.page-content--><!--.page-content-->
	
	
		
	
	
	
	<script src="js/lib/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/lib/popper/popper.min.js"></script>
	<script src="js/lib/tether/tether.min.js"></script>
	<script src="js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	
	<script src="js/lib/ladda-button/spin.min.js"></script>
	<script src="js/lib/ladda-button/ladda.min.js"></script>
	<script src="js/lib/ladda-button/ladda-button-init.js"></script>
	<script type="text/javascript" src="js/lib/jquery-contextmenu/jquery.contextMenu.min.js"></script>
	<script type="text/javascript" src="js/lib/jquery-contextmenu/jquery.ui.position.min.js"></script>

	<script src="js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
	<script src="js/lib/bootstrap-table/bootstrap-table.js"></script>
	<script src="js/lib/bootstrap-table/bootstrap-table-export.min.js"></script>
	<script src="js/lib/bootstrap-table/tableExport.min.js"></script>
	<script src="js/lib/bootstrap-table/bootstrap-table-init.js"></script>


<script src="js/app.js"></script>
</body>
</html>