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
<link rel="stylesheet" href="css/lib/lobipanel/lobipanel.min.css">
<link rel="stylesheet" href="css/separate/vendor/lobipanel.min.css">
<link rel="stylesheet" href="css/lib/jqueryui/jquery-ui.min.css">
<link rel="stylesheet" href="css/separate/pages/widgets.min.css">
	<link rel="stylesheet" href="css/separate/vendor/slick.min.css">
<link rel="stylesheet" href="css/separate/vendor/select2.min.css">
		<link rel="stylesheet" href="css/lib/bootstrap-table/bootstrap-table.min.css">
    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
	
	<style>
	body {
  background-image: url('img/Icons/Former_logo_of_Punjab_Police_Pakistan.svg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
		background-blend-mode: overlay;
}
	
	</style>
</head>
<body class="with-side-menu control-panel control-panel-compact">

<?php
	include"header.php";
	?>

	<div class="page-content">
	    <div class="container-fluid">
	        <div class="row">
				<div class="col-xl-12 mb-5 p-3" style="background-color: #D2D1D1;">
					<div class="row">
						<div class="col-sm-2">
						<img src="img/Icons/white-logo.svg" height="100px" alt="">
						</div>
						<div class="col-sm-6">
							<h3>Welcome back! Digital Diary System</h3>
							<h5>Punjab Police RPO Office Faisalabad</h5>
						</div>
						<div class="col-sm-4">
							<img src="img/Icons/Urdu-Text-1.png" alt="">
						
						</div>
					</div>
				</div>
				
				
			
				<?php
				if($type == "branch"){
					
	
	
	$selectb = "SELECT * FROM branch WHERE id = '$department'";
	$runb = mysqli_query($conn,$selectb);
	$datab = mysqli_fetch_array($runb);
					
	$bname = $datab['branch_name'];
	
			
	$selectbdp = "SELECT COUNT(*) FROM b_letter WHERE status = 'Pending' and branch_name = '$bname' and YEAR(dispatch_date) = '$rdate'";
	$runbdp = mysqli_query($conn,$selectbdp);
	$databdp = mysqli_fetch_array($runbdp);
					
	$selectbdi = "SELECT COUNT(*) FROM b_letter WHERE status = 'Information' and branch_name = '$bname' and YEAR(dispatch_date) = '$rdate'";
	$runbdi = mysqli_query($conn,$selectbdi);
	$databdi = mysqli_fetch_array($runbdi);
					
	$selectbdc = "SELECT COUNT(*) FROM b_letter WHERE status = 'Completed' and branch_name = '$bname' and YEAR(dispatch_date) = '$rdate'";
	$runbdc = mysqli_query($conn,$selectbdc);
	$databdc = mysqli_fetch_array($runbdc);
	
	$pending =$databdp['COUNT(*)'];
	$info =$databdi['COUNT(*)'];
	$complete =$databdc['COUNT(*)'];
					
	$total = $pending + $info +$complete;
	
	if($total == 0){
		$pre = 0;
	}else{				
					
	$p = $info + $complete;
					
	$per = $p * 100/$total;
	}
					

					
				
	?>		
				
				
				
				
				
				<div class="col-md-6">
				<section class="widget">
						<header class="widget-header-dark">Branch Letter</header>
						<div class="tab-content widget-tabs-content">
							<div class="tab-pane active" id="w-1-tab-1" role="tabpanel">
								<div class="circle-progress-bar-typical pieProgress"
									 role="progressbar" data-goal="<?php echo $per;?>"
									 data-barcolor="#00a8ff"
									 data-barsize="10"
									 aria-valuemin="0"
									 aria-valuemax="100">
									<span class="pie_progress__number">0%</span>
								</div>
							</div>
							<div class="tab-pane" id="w-1-tab-2" role="tabpanel">
								<center>Tasks</center>
							</div>
							<div class="tab-pane" id="w-1-tab-3" role="tabpanel">
								<center>Event</center>
							</div>
						</div>
						<div class="widget-tabs-nav colored">
							<ul class="tbl-row" role="tablist">
								<li class="nav-item">
									<a class="nav-link red" data-toggle="tab" href="#w-4-tab-1" role="tab">
										<div><h3> <?php echo $pending;?></h3></div>
										<div>Pending</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link orange" data-toggle="tab" href="#w-4-tab-2" role="tab">
										<div><h3> <?php echo $info;?></h3></div>
										<div>Information</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link green" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $complete;?></h3></div>
										<div>Complete</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link blue" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $total;?></h3></div>
										<div>Total</div>
									</a>
								</li>
							</ul>
						</div>
					</section><!--.widget-->
				
				</div>
				
				
				<?php
					
				
	$selectbp = "SELECT COUNT(*) FROM main_letter WHERE status = 'Pending' and marked_to = '$department' and YEAR(dispatch_date) = '$rdate'";
	$runbp = mysqli_query($conn,$selectbp);
	$databp = mysqli_fetch_array($runbp);
					
	$selectbi = "SELECT COUNT(*) FROM main_letter WHERE status = 'Information' and marked_to = '$department' and YEAR(dispatch_date) = '$rdate'";
	$runbi = mysqli_query($conn,$selectbi);
	$databi = mysqli_fetch_array($runbi);
					
	$selectbc = "SELECT COUNT(*) FROM main_letter WHERE status = 'Completed' and marked_to = '$department' and YEAR(dispatch_date) = '$rdate'";
	$runbc = mysqli_query($conn,$selectbc);
	$databc = mysqli_fetch_array($runbc);
	
	$bs = "SELECT * FROM branch WHERE id = '$department'";
	$rb = mysqli_query($conn, $bs);
	$dbs = mysqli_fetch_array($rb);
	
	$bnames = $dbs['branch_name'];
					
	$selectbpb = "SELECT COUNT(*) FROM branch_mark WHERE current_status = 'Pending' and dispatch_from = '$bnames' and YEAR(dispatch_date) = '$rdate'";
	$runbpb = mysqli_query($conn,$selectbpb);
	$databpb = mysqli_fetch_array($runbpb);
					
	
	$dpending =$databp['COUNT(*)'];
	$bdpending =$databpb['COUNT(*)'];
	
	$bpendings = $dpending - $bdpending;				
					
	$dinfo =$databi['COUNT(*)'];
	$dcomplete =$databc['COUNT(*)'];
					
	$dtotal = $dpending + $dinfo +$dcomplete;
					
	if($dtotal == 0){
		$dpre = 0;
	}else{				
	
					
	$dp = $dinfo + $dcomplete;
					
	$dpre = $dp *100/$dtotal;
	}
				?>
				
				
				
				<div class="col-md-6">
				<section class="widget">
						<header class="widget-header-dark">Diary Received Letter</header>
						<div class="tab-content widget-tabs-content">
							<div class="tab-pane active" id="w-1-tab-1" role="tabpanel">
								<div class="circle-progress-bar-typical pieProgress"
									 role="progressbar" data-goal="<?php echo $dpre;?>"
									 data-barcolor="#00a8ff"
									 data-barsize="10"
									 aria-valuemin="0"
									 aria-valuemax="100">
									<span class="pie_progress__number">0%</span>
								</div>
							</div>
							<div class="tab-pane" id="w-1-tab-2" role="tabpanel">
								<center>Tasks</center>
							</div>
							<div class="tab-pane" id="w-1-tab-3" role="tabpanel">
								<center>Event</center>
							</div>
						</div>
						<div class="widget-tabs-nav colored">
							<ul class="tbl-row" role="tablist">
								<li class="nav-item">
									<a class="nav-link red active" data-toggle="tab" href="#w-4-tab-1" role="tab">
										<div><h3> <?php echo $bpendings;?></h3></div>
										<div>Branch Pending</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link red" data-toggle="tab" href="#w-4-tab-4" role="tab">
										<div><h3> <?php echo $bdpending;?></h3></div>
										<div>District Pending</div>
									</a>
								</li>


								<li class="nav-item">
									<a class="nav-link orange" data-toggle="tab" href="#w-4-tab-2" role="tab">
										<div><h3> <?php echo $dinfo;?></h3></div>
										<div>Information</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link green" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $dcomplete;?></h3></div>
										<div>Complete</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link blue" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $dtotal;?></h3></div>
										<div>Total</div>
									</a>
								</li>
							</ul>
						</div>
					</section><!--.widget-->
				
				</div>
				
				
			<?php
				
				if($user_name == "icc branch"){
					
				
	$selectkp = "SELECT COUNT(*) FROM kachehri WHERE status = 'Pending' and YEAR(date) = '$rdate'";
	$runkp = mysqli_query($conn,$selectkp);
	$datakp = mysqli_fetch_array($runkp);
					
	$selectk = "SELECT COUNT(*) FROM kachehri WHERE status = 'Dispose Off' and YEAR(date) = '$rdate'";
	$runk = mysqli_query($conn,$selectk);
	$datak = mysqli_fetch_array($runk);
					
	
	$kpending =$datakp['COUNT(*)'];
	$kinfo =$datak['COUNT(*)'];
					
	$ktotal = $kpending + $kinfo;
					
	if($ktotal == 0){
		$kpre = 0;
	}else{				
	
  $kpree = ($kinfo/$ktotal)*100;
	}
				?>		
				
				
				
			<div class="col-md-3"></div>	
				
			<div class="col-md-6">
				<section class="widget">
						<header class="widget-header-dark">Received Kachehri</header>
						<div class="tab-content widget-tabs-content">
							<div class="tab-pane active" id="w-1-tab-1" role="tabpanel">
								<div class="circle-progress-bar-typical pieProgress"
									 role="progressbar" data-goal="<?php echo $kpree?>"
									 data-barcolor="#00a8ff"
									 data-barsize="10"
									 aria-valuemin="0"
									 aria-valuemax="100">
									<span class="pie_progress__number">0%</span>
								</div>
							</div>
							<div class="tab-pane" id="w-1-tab-2" role="tabpanel">
								<center>Tasks</center>
							</div>
							<div class="tab-pane" id="w-1-tab-3" role="tabpanel">
								<center>Event</center>
							</div>
						</div>
						<div class="widget-tabs-nav colored">
							<ul class="tbl-row" role="tablist">
								<li class="nav-item">
									<a class="nav-link red active" data-toggle="tab" href="#w-4-tab-1" role="tab">
										<div><h3> <?php echo $kpending?></h3></div>
										<div>Pending</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link orange" data-toggle="tab" href="#w-4-tab-2" role="tab">
										<div><h3><?php echo $kinfo?></h3></div>
										<div>Dispose Off</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link blue" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $ktotal?></h3></div>
										<div>Total</div>
									</a>
								</li>
							</ul>
						</div>
					</section><!--.widget-->
				
				</div>
				
				
				
					
			<?php	}	
				?>
				
				
				
							<?php
				
				if($user_name == "reader branch"){
									
	$selectkpp = "SELECT COUNT(*) FROM progress WHERE status = 'Pending' ";
	$runkpp = mysqli_query($conn,$selectkpp);
	$datakpp = mysqli_fetch_array($runkpp);
					
	$selectkp = "SELECT COUNT(*) FROM progress WHERE status = 'Completed' ";
	$runkp = mysqli_query($conn,$selectkp);
	$datakp = mysqli_fetch_array($runkp);
					
	
	$kpendingp =$datakpp['COUNT(*)'];
	$kinfop =$datakp['COUNT(*)'];
					
	$ktotalp = $kpendingp + $kinfop;
					
	if($ktotalp == 0){
		$kprep = 0;
	}else{				
	
  $kpreep = ($kinfop/$ktotalp)*100;
	}
					?>	
								
				<div class="col-md-3"></div>
				
						<div class="col-md-6">
				<section class="widget">
						<header class="widget-header-dark">Progress Letter</header>
						<div class="tab-content widget-tabs-content">
							<div class="tab-pane active" id="w-1-tab-1" role="tabpanel">
								<div class="circle-progress-bar-typical pieProgress"
									 role="progressbar" data-goal="<?php echo $kpreep?>"
									 data-barcolor="#00a8ff"
									 data-barsize="10"
									 aria-valuemin="0"
									 aria-valuemax="100">
									<span class="pie_progress__number">0%</span>
								</div>
							</div>
							<div class="tab-pane" id="w-1-tab-2" role="tabpanel">
								<center>Tasks</center>
							</div>
							<div class="tab-pane" id="w-1-tab-3" role="tabpanel">
								<center>Event</center>
							</div>
						</div>
						<div class="widget-tabs-nav colored">
							<ul class="tbl-row" role="tablist">
								<li class="nav-item">
									<a class="nav-link red active" data-toggle="tab" href="#w-4-tab-1" role="tab">
										<div><h3>  <?php echo $kpendingp?></h3></div>
										<div>Pending</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link orange" data-toggle="tab" href="#w-4-tab-2" role="tab">
										<div><h3><?php echo $kinfop?></h3></div>
										<div>Complete</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link blue" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $ktotalp?></h3></div>
										<div>Total</div>
									</a>
								</li>
							</ul>
						</div>
					</section><!--.widget-->
				
				</div>	
				

					
			<?php	}	
				?>
				
				
				<div class="col-xl-12 dahsboard-column">
	                <section class="box-typical box-typical-dashboard panel panel-default scrollable">
						
				<div id="toolbar">
					<div class="bootstrap-table-header"> <i class="font-icon"> <img src="img/Icons/laptop.svg" style="height: 35px; width: 35px;" alt=""></i>
 <span style="color: #184d88;">District Details</span></div>

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
						   data-response-handler="responseHandler" style="font-weight: 700;">
						   <thead>
                <tr>
                    <th>District Name</th>
                    <th>Pending Letter's</th>
                    <th>Information Letter's</th>
                    <th>Complete Letter's</th>
                    <th>Total Letter's</th>
                    <th>Complete %</th>
                </tr>
            </thead>
        <tbody>
			
		<?php
			
		$selectd = "SELECT * FROM distric";
		$rund = mysqli_query($conn,$selectd);
		while($datad = mysqli_fetch_array($rund)):
					
		$id = $datad['id'];
					
		$selectbmp = "SELECT COUNT(*) FROM branch_mark WHERE current_status = 'Pending' and marked_to = '$id' and dispatch_from = '$bname'";
		$runbmp = mysqli_query($conn,$selectbmp);
		$databmp = mysqli_fetch_array($runbmp);
					
		$selectbmi = "SELECT COUNT(*) FROM branch_mark WHERE current_status = 'Information' and marked_to = '$id' and dispatch_from = '$bname'";
		$runbmi = mysqli_query($conn,$selectbmi);
		$databmi = mysqli_fetch_array($runbmi);
					
		$selectbmc = "SELECT COUNT(*) FROM branch_mark WHERE current_status = 'Completed' and marked_to = '$id' and dispatch_from = '$bname'";
		$runbmc = mysqli_query($conn,$selectbmc);
		$databmc = mysqli_fetch_array($runbmc);
					
					
		$selectbdp = "SELECT COUNT(*) FROM b_letter WHERE status = 'Pending' and marked_to = '$id' and branch_name = '$bname' and YEAR(dispatch_date) = '$rdate'";
		$runbdp = mysqli_query($conn,$selectbdp);
		$databdp = mysqli_fetch_array($runbdp);
					
		$selectbdi = "SELECT COUNT(*) FROM b_letter WHERE status = 'Information' and marked_to = '$id' and branch_name = '$bname' and YEAR(dispatch_date) = '$rdate'";
		$runbdi = mysqli_query($conn,$selectbdi);
		$databdi = mysqli_fetch_array($runbdi);
					
		$selectbddc = "SELECT COUNT(*) FROM b_letter WHERE status = 'Completed' and marked_to = '$id' and branch_name = '$bname' and YEAR(dispatch_date) = '$rdate'";
		$runbdc = mysqli_query($conn,$selectbddc);
		$databdc = mysqli_fetch_array($runbdc);			
		
				
		$pendingp = $databmp['COUNT(*)'];
		$infop = $databmi['COUNT(*)'];
		$completep = $databmc['COUNT(*)'];
					
					
		$pendingpp = $databdp['COUNT(*)'];
		$infopp = $databdi['COUNT(*)'];
		$completepp = $databdc['COUNT(*)'];
					
		$totalp = $pendingpp +$infopp + $completepp + $pendingp + $infop + $completep;
					
   if($totalp == 0){
		$prep = 0;
	}else{				
					
	$pp = $infopp + $completepp ;
					
	$prep = $pp * 100/$totalp;
	}
					
		
			
			?>	
							
		<tr>
                    <td align="center"><?php echo $datad['distric']?></td>
                    <td align="center"><?php echo $pendingp +$pendingpp;?></td>
                    <td align="center"><?php echo $infop +$infopp;?></td>
		            <td align="center"><?php echo $completepp +$completep; ?></td>
                    <td align="center"><?php echo $totalp?></td>
                    <td align="center"><?php echo round($prep)."%"?></td>
                    
			</tr>
			<?php
			endwhile;
			?>
			
			<?php
		$selectbdpo = "SELECT COUNT(*) FROM b_letter WHERE status = 'Pending' and marked_to = 'Other' and branch_name = '$bname' and YEAR(dispatch_date) = '$rdate'";
		$runbdpo = mysqli_query($conn,$selectbdpo);
		$databdpo = mysqli_fetch_array($runbdpo);
					
		$selectbdio = "SELECT COUNT(*) FROM b_letter WHERE status = 'Information' and marked_to = 'Other' and branch_name = '$bname' and YEAR(dispatch_date) = '$rdate'";
		$runbdio = mysqli_query($conn,$selectbdio);
		$databdio = mysqli_fetch_array($runbdio);
					
		$selectbddco = "SELECT COUNT(*) FROM b_letter WHERE status = 'Completed' and marked_to = 'Other' and branch_name = '$bname' and YEAR(dispatch_date) = '$rdate'";
		$runbdco = mysqli_query($conn,$selectbddco);
		$databdco = mysqli_fetch_array($runbdco);
					
		$pendingppo = $databdpo['COUNT(*)'];
		$infoppo = $databdio['COUNT(*)'];
		$completeppo = $databdco['COUNT(*)'];
					
		$totalpo = $pendingppo +$infoppo + $completeppo;
					
   if($totalpo == 0){
		$prepo = 0;
	}else{				
					
	$ppo = $infopo + $completeppo ;
					
	$prepo = $ppo * 100/$totalpo;
	}			
					
			?>
			
			<tr>
                    <td align="center">Other</td>
                    <td align="center"><?php echo $pendingppo;?></td>
                    <td align="center"><?php echo $infoppo;?></td>
		            <td align="center"><?php echo $completeppo; ?></td>
                    <td align="center"><?php echo $totalpo?></td>
                    <td align="center"><?php echo round($prepo)."%"?></td>
                    
			</tr>
			
			
					 </tbody>
					</table>
				</div>
<!--.box-typical-body-->
	                </section><!--.box-typical-dashboard-->
	            </div><!--.col-->
				
				
				
				<?php
				}elseif($type == "district"){
					
	$selectds = "SELECT * FROM distric WHERE id = '$department'";
	$runds = mysqli_query($conn,$selectds);
	$datads = mysqli_fetch_array($runds);
					
	$did = $datads['id'];
	
	$selectbdpd = "SELECT COUNT(*) FROM b_letter WHERE status = 'Pending' and marked_to = '$did' and YEAR(dispatch_date) = '$rdate'";
	$runbdpd = mysqli_query($conn,$selectbdpd);
	$databdpd = mysqli_fetch_array($runbdpd);

	$selectbdid = "SELECT COUNT(*) FROM b_letter WHERE status = 'Information' and marked_to = '$did' and YEAR(dispatch_date) = '$rdate'";
	$runbdid = mysqli_query($conn,$selectbdid);
	$databdid = mysqli_fetch_array($runbdid);

	$selectbddcd = "SELECT COUNT(*) FROM b_letter WHERE status = 'Completed' and marked_to = '$did' and YEAR(dispatch_date) = '$rdate'";
	$runbdcd = mysqli_query($conn,$selectbddcd);
	$databdcd = mysqli_fetch_array($runbdcd);
					
	$selectbdpdd = "SELECT COUNT(*) FROM branch_mark WHERE current_status = 'Pending' and marked_to = '$did' and YEAR(dispatch_date) = '$rdate'";
	$runbdpdd = mysqli_query($conn,$selectbdpdd);
	$databdpdd = mysqli_fetch_array($runbdpdd);

	$selectbdidd = "SELECT COUNT(*) FROM branch_mark WHERE current_status = 'Information' and marked_to = '$did' and YEAR(dispatch_date) = '$rdate'";
	$runbdidd = mysqli_query($conn,$selectbdidd);
	$databdidd = mysqli_fetch_array($runbdidd);

	$selectbddcdd = "SELECT COUNT(*) FROM branch_mark WHERE current_status = 'Completed' and marked_to = '$did' and YEAR(dispatch_date) = '$rdate'";
	$runbdcdd = mysqli_query($conn,$selectbddcdd);
	$databdcdd = mysqli_fetch_array($runbdcdd);
					
					
	$pendingdd = $databdpd['COUNT(*)'] + $databdpdd['COUNT(*)'];
	$infodd = $databdid['COUNT(*)'] + $databdidd['COUNT(*)'];
	$completedd = $databdcd['COUNT(*)'] + $databdcdd['COUNT(*)'];
					
					
	$totaldd = $pendingdd +$infodd + $completedd;
					
   if($totaldd == 0){
		$predd = 0;
	}else{				
					
	$ddd = $infodd + $completedd ;
					
	$predd = $ddd * 100/$totaldd;
	}
					
					
				
				?>
				
				
			<div class="col-md-6">
				<section class="widget">
						<header class="widget-header-dark">Received Letter</header>
						<div class="tab-content widget-tabs-content">
							<div class="tab-pane active" id="w-1-tab-1" role="tabpanel">
								<div class="circle-progress-bar-typical pieProgress"
									 role="progressbar" data-goal="<?php echo $predd?>"
									 data-barcolor="#00a8ff"
									 data-barsize="10"
									 aria-valuemin="0"
									 aria-valuemax="100">
									<span class="pie_progress__number">0%</span>
								</div>
							</div>
							<div class="tab-pane" id="w-1-tab-2" role="tabpanel">
								<center>Tasks</center>
							</div>
							<div class="tab-pane" id="w-1-tab-3" role="tabpanel">
								<center>Event</center>

							</div>
						</div>
						<div class="widget-tabs-nav colored">
							<ul class="tbl-row" role="tablist">
								<li class="nav-item">
									<a class="nav-link red active" data-toggle="tab" href="#w-4-tab-1" role="tab">
										<div><h3> <?php echo $pendingdd;?></h3></div>
										<div>Pending</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link orange" data-toggle="tab" href="#w-4-tab-2" role="tab">
										<div><h3> <?php echo $infodd?></h3></div>
										<div>Information</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link green" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $completedd;?></h3></div>
										<div>Complete</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link blue" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $totaldd;?></h3></div>
										<div>Total</div>
									</a>
								</li>
							</ul>
						</div>
					</section><!--.widget-->
				
				</div>
				
				
				
				
				
				<?php
				}
				elseif($type == "ad"){
					
					
	$selec = "SELECT COUNT(*) FROM main_letter WHERE status = 'Pending' and YEAR(dispatch_date) = '$rdate'";
	$ru = mysqli_query($conn,$selec);
	$dap = mysqli_fetch_array($ru);
					

	$selectbdddc = "SELECT COUNT(*) FROM main_letter WHERE status = 'Completed' and YEAR(dispatch_date) = '$rdate'";
	$runbdddc = mysqli_query($conn,$selectbdddc);
	$databdddc = mysqli_fetch_array($runbdddc);
	
	$pendingd =$dap['COUNT(*)'];
	$completed =$databdddc['COUNT(*)'] ;
	
					
	 $totald = $pendingd +$completed;
	
				
	
	if($totald == 0){
		$pred = 0;
	}else{				
					
	$pred = $completed * 100/$totald;
	}		
					
					
					
				?>
								
				<div class="col-md-6">
				<section class="widget">
						<header class="widget-header-dark">Diary Letter</header>
						<div class="tab-content widget-tabs-content">
							<div class="tab-pane active" id="w-1-tab-1" role="tabpanel">
								<div class="circle-progress-bar-typical pieProgress"
									 role="progressbar" data-goal="<?php echo $pred;?>"
									 data-barcolor="#00a8ff"
									 data-barsize="10"
									 aria-valuemin="0"
									 aria-valuemax="100">
									<span class="pie_progress__number">0%</span>
								</div>
							</div>
							<div class="tab-pane" id="w-1-tab-2" role="tabpanel">
								<center>Tasks</center>
							</div>
							<div class="tab-pane" id="w-1-tab-3" role="tabpanel">
								<center>Event</center>
							</div>
						</div>
						<div class="widget-tabs-nav colored">
							<ul class="tbl-row" role="tablist">
								<li class="nav-item">
									<a class="nav-link red active" data-toggle="tab" href="#w-4-tab-1" role="tab">
										<div><h3> <?php echo $pendingd?></h3></div>
										<div>Pending</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link green" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $completed?></h3></div>
										<div>Complete</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link blue" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $totald?></h3></div>
										<div>Total</div>
									</a>
								</li>
							</ul>
						</div>
					</section><!--.widget-->
				
				</div>
				
				
			<?php 
				
					
	$sekelt = "SELECT COUNT(*) FROM main_dispatch WHERE status = 'Pending' and YEAR(dispatch_date) = '$rdate'";
    $runk = mysqli_query($conn,$sekelt);
	$daka = mysqli_fetch_array($runk);
					
					
	$sekeltd = "SELECT COUNT(*) FROM main_dispatch WHERE status = 'Complete' and YEAR(dispatch_date) = '$rdate'";
	$runkd = mysqli_query($conn,$sekeltd);
	$dakad = mysqli_fetch_array($runkd);
	
	$pendingd =$daka['COUNT(*)'];
	$completed =$dakad['COUNT(*)'];
					
	 $totald = $pendingd +$completed;
	
				
	
	if($totald == 0){
		$pred = 0;
	}else{				
					
	$pred = $completed * 100/$totald;
	}					
					
					
?>	
				
				
				
				
				<div class="col-md-6">
				<section class="widget">
						<header class="widget-header-dark">Dispatch Letter</header>
						<div class="tab-content widget-tabs-content">
							<div class="tab-pane active" id="w-1-tab-1" role="tabpanel">
								<div class="circle-progress-bar-typical pieProgress"
									 role="progressbar" data-goal="<?php echo $pred?>"
									 data-barcolor="#00a8ff"
									 data-barsize="10"
									 aria-valuemin="0"
									 aria-valuemax="100">
									<span class="pie_progress__number">0%</span>
								</div>
							</div>
							<div class="tab-pane" id="w-1-tab-2" role="tabpanel">
								<center>Tasks</center>
							</div>
							<div class="tab-pane" id="w-1-tab-3" role="tabpanel">
								<center>Event</center>
							</div>
						</div>
						<div class="widget-tabs-nav colored">
							<ul class="tbl-row" role="tablist">
								<li class="nav-item">
									<a class="nav-link red active" data-toggle="tab" href="#w-4-tab-1" role="tab">
										<div><h3> <?php echo $pendingd?></h3></div>
										<div>Pending</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link green" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $completed?></h3></div>
										<div>Complete</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link blue" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $totald?></h3></div>
										<div>Total</div>
									</a>
								</li>
							</ul>
						</div>
					</section><!--.widget-->
				
				</div>
				
				
				<div class="col-xl-12">
	                <section class="box-typical box-typical-dashboard panel panel-default scrollable">
						
				<div id="toolbar1">
					<div class="bootstrap-table-header"> <i class="font-icon"> <img src="img/Icons/laptop.svg" style="height: 35px; width: 35px;" alt=""></i>
 <span style="color: #184d88;">Dispatch Detail</span></div>

				</div>
				<div class="table-responsive p-4 table-bordered">
					<table id=""
						   data-toggle="table"
						   class="table table-striped"
						   data-toolbar="#toolbar1"
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
                    <th>Branch Name</th>
                    <th>Pending Letter's</th>
                    <th>Information Letter's</th>
                    <th>Complete Letter's</th>
                    <th>Total Letter's</th>
                    <th>Complete %</th>
                </tr>
            </thead>
        <tbody>
							
<?php
			
		$selectd = "SELECT * FROM branch";
		$rund = mysqli_query($conn,$selectd);
		while($datad = mysqli_fetch_array($rund)):
					
		$id = $datad['id'];
					
					
		$selectbdp = "SELECT COUNT(*) FROM main_dispatch WHERE status = 'Pending' and received_from = '$id' and YEAR(dispatch_date) = '$rdate'";
		$runbdp = mysqli_query($conn,$selectbdp);
		$databdp = mysqli_fetch_array($runbdp);
					
		$selectbdi = "SELECT COUNT(*) FROM main_dispatch WHERE status = 'Information' and received_from = '$id' and YEAR(dispatch_date) = '$rdate'";
		$runbdi = mysqli_query($conn,$selectbdi);
		$databdi = mysqli_fetch_array($runbdi);
					
		$selectbddc = "SELECT COUNT(*) FROM main_dispatch WHERE status = 'Complete' and received_from = '$id' and YEAR(dispatch_date) = '$rdate'";
		$runbdc = mysqli_query($conn,$selectbddc);
		$databdc = mysqli_fetch_array($runbdc);			
		
					
		$pendingp =  $databdp['COUNT(*)'];
		$infop =  $databdi['COUNT(*)'];
		$completep =  $databdc['COUNT(*)'];

					
		$totalp = $pendingp +$infop + $completep;
					
   if($totalp == 0){
		$prep = 0;
	}else{				
	   
	$pp = $infop + $completep ;
		
  if($pp == 0){
		$prep = 0;
	}else{	
	   
	$prep = $pp * 100/$totalp;
	  
  }
	}
			?>									
		<tr>
                    <td align="center"><?php echo $datad['branch_name']?></td>
                    <td align="center"><?php echo $pendingp ;?></td>
                    <td align="center"><?php echo $infop ;?></td>
		            <td align="center"><?php echo $completep ; ?></td>
                    <td align="center"><?php echo $totalp?></td>
                    <td align="center"><?php echo round($prep)."%"?></td>
                    
			</tr>
			<?php
			endwhile;
			?>
			
			
			
					 </tbody>
					</table>
				</div>
<!--.box-typical-body-->
	                </section><!--.box-typical-dashboard-->
	            </div><!--.col-->
				
				
				
				<div class="col-xl-12">
	                <section class="box-typical box-typical-dashboard panel panel-default scrollable">
						
				<div id="toolbar2">
					<div class="bootstrap-table-header"> <i class="font-icon"> <img src="img/Icons/laptop.svg" style="height: 35px; width: 35px;" alt=""></i>
 <span style="color: #184d88;">Branch Detail</span></div>

				</div>
				<div class="table-responsive p-4 table-bordered">
					<table id=""
						   data-toggle="table"
						   class="table table-striped"
						   data-toolbar="#toolbar2"
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
                    <th>Branch Name</th>
                    <th>Branch Pending</th>
                    <th>District Pending</th>
                    <th>Information Letter's</th>
                    <th>Complete Letter's</th>
                    <th>Total Letter's</th>
                    <th>Complete %</th>
                </tr>
            </thead>
        <tbody>
							
<?php
			
		$selectd = "SELECT * FROM branch";
		$rund = mysqli_query($conn,$selectd);
		while($datad = mysqli_fetch_array($rund)):
					
		$id = $datad['id'];
					
		$b_name = $datad['branch_name'];
					
		$selectbmp = "SELECT COUNT(*) FROM main_letter WHERE status = 'Pending' and marked_to = '$id' and YEAR(dispatch_date) = '$rdate'";
		$runbmp = mysqli_query($conn,$selectbmp);
		$databmp = mysqli_fetch_array($runbmp);
					
		$selectbmi = "SELECT COUNT(*) FROM main_letter WHERE status = 'Information' and marked_to = '$id' and YEAR(dispatch_date) = '$rdate'";
		$runbmi = mysqli_query($conn,$selectbmi);
		$databmi = mysqli_fetch_array($runbmi);
					
		$selectbmc = "SELECT COUNT(*) FROM main_letter WHERE status = 'Complete' and marked_to = '$id' and YEAR(dispatch_date) = '$rdate'";
		$runbmc = mysqli_query($conn,$selectbmc);
		$databmc = mysqli_fetch_array($runbmc);
					
		$selectbdp = "SELECT COUNT(*) FROM b_letter WHERE status = 'Pending' and branch_name = '$b_name' and YEAR(dispatch_date) = '$rdate'";
		$runbdp = mysqli_query($conn,$selectbdp);
		$databdp = mysqli_fetch_array($runbdp);

		$selectbdi = "SELECT COUNT(*) FROM b_letter WHERE status = 'Information' and branch_name = '$b_name' and YEAR(dispatch_date) = '$rdate'";
		$runbdi = mysqli_query($conn,$selectbdi);
		$databdi = mysqli_fetch_array($runbdi);

		$selectbdc = "SELECT COUNT(*) FROM b_letter WHERE status = 'Complete' and branch_name = '$b_name' and YEAR(dispatch_date) = '$rdate'";
		$runbdc = mysqli_query($conn,$selectbdc);
		$databdc = mysqli_fetch_array($runbdc);
					
		
		$selectbmpb = "SELECT COUNT(*) FROM branch_mark WHERE current_status = 'Pending' and dispatch_from = '$b_name' and YEAR(dispatch_date) = '$rdate'";
		$runbmpb = mysqli_query($conn,$selectbmpb);
		$databmpb = mysqli_fetch_array($runbmpb);
		
					
		$pendingp = $databmp['COUNT(*)'];
		$pendingpb = $databmpb['COUNT(*)'];
					
		$bpending = $pendingp - $pendingpb;
					
		$infop = $databmi['COUNT(*)'] ;
		$completep = $databmc['COUNT(*)'];

					
		$totalp = $pendingp +$infop + $completep + $databdp['COUNT(*)'] + $databdi['COUNT(*)'] + $databdc['COUNT(*)'] ;
					
   if($totalp == 0){
		$prep = 0;
	}else{				
	   
	$pp = $infop + $completep + $databdi['COUNT(*)'] + $databdc['COUNT(*)']; 
		
  if($pp == 0){
		$prep = 0;
	}else{	
	   
	$prep = $pp * 100/$totalp;
	  
  }
	}
					
		
			
			?>	
							
		<tr>
                    <td align="center"><?php echo $datad['branch_name']?></td>
                    <td align="center"><?php echo $bpending ;?></td>
                    <td align="center"><?php echo $pendingpb + $databdp['COUNT(*)'] ;?></td>
                    <td align="center"><?php echo $infop + $databdi['COUNT(*)']  ;?></td>
		            <td align="center"><?php echo $completep + $databdc['COUNT(*)']  ; ?></td>
                    <td align="center"><?php echo $totalp?></td>
                    <td align="center"><?php echo round($prep)."%"?></td>
                    
			</tr>
			<?php
			endwhile;
			?>
			
					 </tbody>
					</table>
				</div>
<!--.box-typical-body-->
	                </section><!--.box-typical-dashboard-->
	            </div><!--.col-->
				
				
				
				
				
				
				
				
				
				<?php
				}
				elseif($type == "rpo"){
					
					
	$selec = "SELECT COUNT(*) FROM main_letter WHERE status = 'Pending' and YEAR(dispatch_date) = '$rdate'";
	$ru = mysqli_query($conn,$selec);
	$dap = mysqli_fetch_array($ru);
					

	$selectbdddc = "SELECT COUNT(*) FROM main_letter WHERE status = 'Completed' and YEAR(dispatch_date) = '$rdate'";
	$runbdddc = mysqli_query($conn,$selectbdddc);
	$databdddc = mysqli_fetch_array($runbdddc);
	
	$selectbdddi = "SELECT COUNT(*) FROM main_letter WHERE status = 'Information' and YEAR(dispatch_date) = '$rdate'";
	$runbdddi = mysqli_query($conn,$selectbdddi);
	$databdddi = mysqli_fetch_array($runbdddi);
	
	$pendingd =$dap['COUNT(*)'];
	$completed =$databdddc['COUNT(*)'] + $databdddi['COUNT(*)'];
					
	 $totald = $pendingd +$completed;
	
				
	
	if($totald == 0){
		$pred = 0;
	}else{				
					
	$pred = $completed * 100/$totald;
	}
					
					
					
					
				
				?>
				
				<div class="col-md-6">
				<section class="widget">
						<header class="widget-header-dark">Diary Letter</header>
						<div class="tab-content widget-tabs-content">
							<div class="tab-pane active" id="w-1-tab-1" role="tabpanel">
								<div class="circle-progress-bar-typical pieProgress"
									 role="progressbar" data-goal="<?php echo $pred?>"
									 data-barcolor="#00a8ff"
									 data-barsize="10"
									 aria-valuemin="0"
									 aria-valuemax="100">
									<span class="pie_progress__number">0%</span>
								</div>
							</div>
							<div class="tab-pane" id="w-1-tab-2" role="tabpanel">
								<center>Tasks</center>
							</div>
							<div class="tab-pane" id="w-1-tab-3" role="tabpanel">
								<center>Event</center>
							</div>
						</div>
						<div class="widget-tabs-nav colored">
							<ul class="tbl-row" role="tablist">
								<li class="nav-item">
									<a class="nav-link red active" data-toggle="tab" href="#w-4-tab-1" role="tab">
										<div><h3> <?php echo $pendingd?></h3></div>
										<div>Pending</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link green" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $completed?></h3></div>
										<div>Complete</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link blue" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $totald?></h3></div>
										<div>Total</div>
									</a>
								</li>
							</ul>
						</div>
					</section><!--.widget-->
				
				</div>
				
				
				<?php 
	$selectbdp = "SELECT COUNT(*) FROM b_letter WHERE status = 'Pending' and YEAR(dispatch_date) = '$rdate'";
	$runbdp = mysqli_query($conn,$selectbdp);
	$databdp = mysqli_fetch_array($runbdp);
					
	$selectbdi = "SELECT COUNT(*) FROM b_letter WHERE status = 'Information' and YEAR(dispatch_date) = '$rdate'";
	$runbdi = mysqli_query($conn,$selectbdi);
	$databdi = mysqli_fetch_array($runbdi);
					
	$selectbdc = "SELECT COUNT(*) FROM b_letter WHERE status = 'Complete' and YEAR(dispatch_date) = '$rdate'";
	$runbdc = mysqli_query($conn,$selectbdc);
	$databdc = mysqli_fetch_array($runbdc);
	
	$pending =$databdp['COUNT(*)'];
	$info =$databdi['COUNT(*)'];
	$complete =$databdc['COUNT(*)'];
					
	$total = $pending + $info +$complete;
	
	if($total == 0){
		$pre = 0;
	}else{				
					
	$p = $info + $complete;
	if($p == 0){
		$pre = 0;
	}else{
					
	$pre = $p * 100/$total;
	}
	}
					
				
				
				?>
				
				
				
				
				
	            <div class="col-md-6">
				<section class="widget">
						<header class="widget-header-dark">Branch Dispatch Letter</header>
						<div class="tab-content widget-tabs-content">
							<div class="tab-pane active" id="w-1-tab-1" role="tabpanel">
								<div class="circle-progress-bar-typical pieProgress"
									 role="progressbar" data-goal="<?php echo $pre?>"
									 data-barcolor="#00a8ff"
									 data-barsize="10"
									 aria-valuemin="0"
									 aria-valuemax="100">
									<span class="pie_progress__number">0%</span>
								</div>
							</div>
							<div class="tab-pane" id="w-1-tab-2" role="tabpanel">
								<center>Tasks</center>
							</div>
							<div class="tab-pane" id="w-1-tab-3" role="tabpanel">
								<center>Event</center>
							</div>
						</div>
						<div class="widget-tabs-nav colored">
							<ul class="tbl-row" role="tablist">
								<li class="nav-item">
									<a class="nav-link red active" data-toggle="tab" href="#w-4-tab-1" role="tab">
										<div><h3> <?php echo $pending?></h3></div>
										<div>Pending</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link orange" data-toggle="tab" href="#w-4-tab-2" role="tab">
										<div><h3><?php echo $info?></h3></div>
										<div>Information</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link green" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $complete?></h3></div>
										<div>Complete</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link blue" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $total?></h3></div>
										<div>Total</div>
									</a>
								</li>
							</ul>
						</div>
					</section><!--.widget-->
				
				</div>
				
		<?php
				
	$selectbp = "SELECT COUNT(*) FROM main_letter WHERE status = 'Pending' and YEAR(dispatch_date) = '$rdate'";
	$runbp = mysqli_query($conn,$selectbp);
	$databp = mysqli_fetch_array($runbp);
					
	$selectbi = "SELECT COUNT(*) FROM main_letter WHERE status = 'Information' and YEAR(dispatch_date) = '$rdate'";
	$runbi = mysqli_query($conn,$selectbi);
	$databi = mysqli_fetch_array($runbi);
					
	$selectbc = "SELECT COUNT(*) FROM main_letter WHERE status = 'Completed' and YEAR(dispatch_date) = '$rdate'";
	$runbc = mysqli_query($conn,$selectbc);
	$databc = mysqli_fetch_array($runbc);
					
	$selectbpb = "SELECT COUNT(*) FROM branch_mark WHERE current_status = 'Pending' and YEAR(dispatch_date) = '$rdate'";
	$runbpb = mysqli_query($conn,$selectbpb);
	$databpb = mysqli_fetch_array($runbpb);
					
	
	$dpending =$databp['COUNT(*)'];
	$dpendingb =$databpb['COUNT(*)'];
					
	$bpendind = $dpending - $dpendingb;				
					
	$dinfo =$databi['COUNT(*)'];
	$dcomplete =$databc['COUNT(*)'];
					
	$dtotal = $dpending + $dinfo +$dcomplete;
					
	if($dtotal == 0){
		$dpre = 0;
	}else{				
	
					
	$dp = $dinfo + $dcomplete;
					
	$dpre = $dp *100/$dtotal;
	}
				?>
				
				
				
				<div class="col-md-6">
				<section class="widget">
						<header class="widget-header-dark">Branch Diary Received Letter</header>
						<div class="tab-content widget-tabs-content">
							<div class="tab-pane active" id="w-1-tab-1" role="tabpanel">
								<div class="circle-progress-bar-typical pieProgress"
									 role="progressbar" data-goal="<?php echo $dpre?>"
									 data-barcolor="#00a8ff"
									 data-barsize="10"
									 aria-valuemin="0"
									 aria-valuemax="100">
									<span class="pie_progress__number">0%</span>
								</div>
							</div>
							<div class="tab-pane" id="w-1-tab-2" role="tabpanel">
								<center>Tasks</center>
							</div>
							<div class="tab-pane" id="w-1-tab-3" role="tabpanel">
								<center>Event</center>
							</div>
						</div>
						<div class="widget-tabs-nav colored">
							<ul class="tbl-row" role="tablist">
								<li class="nav-item">
									<a class="nav-link red active" data-toggle="tab" href="#w-4-tab-1" role="tab">
										<div><h3> <?php echo $bpendind?></h3></div>
										<div>Branch Pending</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link red" data-toggle="tab" href="#w-4-tab-4" role="tab">
										<div><h3> <?php echo $dpendingb?></h3></div>
										<div>Districs Pending</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link orange" data-toggle="tab" href="#w-4-tab-2" role="tab">
										<div><h3><?php echo $dinfo?></h3></div>
										<div>Information</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link green" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $dcomplete?></h3></div>
										<div>Complete</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link blue" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $dtotal?></h3></div>
										<div>Total</div>
									</a>
								</li>
							</ul>
						</div>
					</section><!--.widget-->
				
				</div>
				
				
	<?php
				
	$selectkp = "SELECT COUNT(*) FROM kachehri WHERE status = 'Pending' ";
	$runkp = mysqli_query($conn,$selectkp);
	$datakp = mysqli_fetch_array($runkp);
					
	$selectk = "SELECT COUNT(*) FROM kachehri WHERE status = 'Dispose Off' ";
	$runk = mysqli_query($conn,$selectk);
	$datak = mysqli_fetch_array($runk);
					
	
	$kpending =$datakp['COUNT(*)'];
	$kinfo =$datak['COUNT(*)'];
					
	$ktotal = $kpending + $kinfo;
					
	if($ktotal == 0){
		$kpre = 0;
	}else{				
	
  $kpree = ($kinfo/$ktotal)*100;
	}
				?>		
				
				
				
				
				
			<div class="col-md-6">
				<section class="widget">
						<header class="widget-header-dark">Received Kachehri</header>
						<div class="tab-content widget-tabs-content">
							<div class="tab-pane active" id="w-1-tab-1" role="tabpanel">
								<div class="circle-progress-bar-typical pieProgress"
									 role="progressbar" data-goal="<?php echo $kpree?>"
									 data-barcolor="#00a8ff"
									 data-barsize="10"
									 aria-valuemin="0"
									 aria-valuemax="100">
									<span class="pie_progress__number">0%</span>
								</div>
							</div>
							<div class="tab-pane" id="w-1-tab-2" role="tabpanel">
								<center>Tasks</center>
							</div>
							<div class="tab-pane" id="w-1-tab-3" role="tabpanel">
								<center>Event</center>
							</div>
						</div>
						<div class="widget-tabs-nav colored">
							<ul class="tbl-row" role="tablist">
								<li class="nav-item">
									<a class="nav-link red active" data-toggle="tab" href="#w-4-tab-1" role="tab">
										<div><h3> <?php echo $kpending?></h3></div>
										<div>Pending</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link orange" data-toggle="tab" href="#w-4-tab-2" role="tab">
										<div><h3><?php echo $kinfo?></h3></div>
										<div>Dispose Off</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link blue" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $ktotal?></h3></div>
										<div>Total</div>
									</a>
								</li>
							</ul>
						</div>
					</section><!--.widget-->
				
				</div>
				
					<?php
				
	$selectkpp = "SELECT COUNT(*) FROM progress WHERE status = 'Pending' ";
	$runkpp = mysqli_query($conn,$selectkpp);
	$datakpp = mysqli_fetch_array($runkpp);
					
	$selectkp = "SELECT COUNT(*) FROM progress WHERE status = 'Completed' ";
	$runkp = mysqli_query($conn,$selectkp);
	$datakp = mysqli_fetch_array($runkp);
					
	
	$kpendingp =$datakpp['COUNT(*)'];
	$kinfop =$datakp['COUNT(*)'];
					
	$ktotalp = $kpendingp + $kinfop;
					
	if($ktotalp == 0){
		$kprep = 0;
	}else{				
	
  $kpreep = ($kinfop/$ktotalp)*100;
	}
				?>	
				
				<div class="col-md-3"></div>
				
						<div class="col-md-6">
				<section class="widget">
						<header class="widget-header-dark">Progress Letter</header>
						<div class="tab-content widget-tabs-content">
							<div class="tab-pane active" id="w-1-tab-1" role="tabpanel">
								<div class="circle-progress-bar-typical pieProgress"
									 role="progressbar" data-goal="<?php echo $kpreep?>"
									 data-barcolor="#00a8ff"
									 data-barsize="10"
									 aria-valuemin="0"
									 aria-valuemax="100">
									<span class="pie_progress__number">0%</span>
								</div>
							</div>
							<div class="tab-pane" id="w-1-tab-2" role="tabpanel">
								<center>Tasks</center>
							</div>
							<div class="tab-pane" id="w-1-tab-3" role="tabpanel">
								<center>Event</center>
							</div>
						</div>
						<div class="widget-tabs-nav colored">
							<ul class="tbl-row" role="tablist">
								<li class="nav-item">
									<a class="nav-link red active" data-toggle="tab" href="#w-4-tab-1" role="tab">
										<div><h3>  <?php echo $kpendingp?></h3></div>
										<div>Pending</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link orange" data-toggle="tab" href="#w-4-tab-2" role="tab">
										<div><h3><?php echo $kinfop?></h3></div>
										<div>Complete</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link blue" data-toggle="tab" href="#w-4-tab-3" role="tab">
										<div><h3> <?php echo $ktotalp?></h3></div>
										<div>Total</div>
									</a>
								</li>
							</ul>
						</div>
					</section><!--.widget-->
				
				</div>	
				
				
				
				
				
				<div class="col-xl-12 dahsboard-column">
	                <section class="box-typical box-typical-dashboard panel panel-default scrollable">
						
				<div id="toolbar">
					<div class="bootstrap-table-header"> <i class="font-icon"> <img src="img/Icons/laptop.svg" style="height: 35px; width: 35px;" alt=""></i>
 <span style="color: #184d88;">Branch Detail</span></div>

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
                    <th align="center">&nbsp; &nbsp; &nbsp; Branch Names</th>
                    <th>Branch Pending </th>
                    <th>District Pending</th>
                    <th align="center">&nbsp; &nbsp; &nbsp;Information Letter's</th>
                    <th align="center">&nbsp; &nbsp; &nbsp;Complete Letter's</th>
                    <th align="center">&nbsp; &nbsp; &nbsp;Total Letter's</th>
                    <th align="center">&nbsp; &nbsp; &nbsp;Complete %</th>
                </tr>
            </thead>
        <tbody>
							
<?php
			
		$selectd = "SELECT * FROM branch";
		$rund = mysqli_query($conn,$selectd);
		while($datad = mysqli_fetch_array($rund)):
					
		$id = $datad['id'];
		$b_name = $datad['branch_name'];
					
		$selectbmp = "SELECT COUNT(*) FROM main_letter WHERE status = 'Pending' and marked_to = '$id' and YEAR(dispatch_date) = '$rdate'";
		$runbmp = mysqli_query($conn,$selectbmp);
		$databmp = mysqli_fetch_array($runbmp);
					
		$selectbmi = "SELECT COUNT(*) FROM main_letter WHERE status = 'Information' and marked_to = '$id' and YEAR(dispatch_date) = '$rdate'";
		$runbmi = mysqli_query($conn,$selectbmi);
		$databmi = mysqli_fetch_array($runbmi);
					
		$selectbmc = "SELECT COUNT(*) FROM main_letter WHERE status = 'Completed' and marked_to = '$id' and YEAR(dispatch_date) = '$rdate'";
		$runbmc = mysqli_query($conn,$selectbmc);
		$databmc = mysqli_fetch_array($runbmc);
					
					
// 		$selectbdp = "SELECT COUNT(*) FROM main_dispatch WHERE status = 'Pending' and received_from = '$id'";
// 		$runbdp = mysqli_query($conn,$selectbdp);
// 		$databdp = mysqli_fetch_array($runbdp);
					
// 		$selectbdi = "SELECT COUNT(*) FROM main_dispatch WHERE status = 'Information' and received_from = '$id'";
// 		$runbdi = mysqli_query($conn,$selectbdi);
// 		$databdi = mysqli_fetch_array($runbdi);
					
// 		$selectbddc = "SELECT COUNT(*) FROM main_dispatch WHERE status = 'Completed' and received_from = '$id'";
// 		$runbdc = mysqli_query($conn,$selectbddc);
// 		$databdc = mysqli_fetch_array($runbdc);			
		
		$selectbmpb = "SELECT COUNT(*) FROM branch_mark WHERE current_status = 'Pending' and dispatch_from = '$b_name' and YEAR(dispatch_date) = '$rdate'";
		$runbmpb = mysqli_query($conn,$selectbmpb);
		$databmpb = mysqli_fetch_array($runbmpb);
		
					
		$pendingp = $databmp['COUNT(*)'];
		$pendingpb = $databmpb['COUNT(*)'];
					
		$bpending = $pendingp - $pendingpb;
					
		$infop = $databmi['COUNT(*)'] ;
		$completep = $databmc['COUNT(*)'];
					
		$totalp = $pendingp +$infop + $completep ;
					
   if($totalp == 0){
		$prep = 0;
	}else{				
	   
	$pp = $infop + $completep ;
		
  if($pp == 0){
		$prep = 0;
	}else{	
	   
	$prep = $pp * 100/$totalp;
	  
  }
	}
					
		
			
			?>	
							
		<tr>
                    <td align="center">&nbsp; &nbsp; &nbsp;<?php echo $datad['branch_name']?></td>
                    <td align="center"><?php echo $bpending ;?></td>
                    <td align="center"><?php echo $pendingpb ;?></td>
                    <td align="center">&nbsp; &nbsp; &nbsp;<?php echo $infop;?></td>
		            <td align="center">&nbsp; &nbsp; &nbsp;<?php echo $completep; ?></td>
                    <td align="center">&nbsp; &nbsp; &nbsp;<?php echo $totalp?></td>
                    <td align="center">&nbsp; &nbsp; &nbsp;<?php echo round($prep)."%"?></td>
                    
			</tr>
			<?php
			endwhile;
			?>
			
			
					 </tbody>
					</table>
				</div>
<!--.box-typical-body-->
	                </section><!--.box-typical-dashboard-->
	            </div><!--.col-->
				
				
				<div class="col-xl-12 dahsboard-column">
	                <section class="box-typical box-typical-dashboard panel panel-default scrollable">
						
				<div id="toolbar1">
					<div class="bootstrap-table-header"> <i class="font-icon"> <img src="img/Icons/laptop.svg" style="height: 35px; width: 35px;" alt=""></i>
 <span style="color: #184d88;">District Detail</span></div>

				</div>
				<div class="table-responsive p-4 table-bordered">
					<table id=""
						   data-toggle="table"
						   class="table table-striped"
						   data-toolbar="#toolbar1"
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
                    <th align="center">District Name</th>
                    <th align="center">Pending Letter's</th>
                    <th align="center">Information Letter's</th>
                    <th align="center">Complete Letter's</th>
                    <th align="center">Total Letter's</th>
                    <th align="center">Complete %</th>
                </tr>
            </thead>
        <tbody>
							
		<?php
			
		$selectd = "SELECT * FROM distric";
		$rund = mysqli_query($conn,$selectd);
		while($datad = mysqli_fetch_array($rund)):
					
		$id = $datad['id'];
					
		$selectbmp = "SELECT COUNT(*) FROM branch_mark WHERE current_status = 'Pending' and marked_to = '$id' and YEAR(dispatch_date) = '$rdate'";
		$runbmp = mysqli_query($conn,$selectbmp);
		$databmp = mysqli_fetch_array($runbmp);
					
		$selectbmi = "SELECT COUNT(*) FROM branch_mark WHERE current_status = 'Information' and marked_to = '$id' and YEAR(dispatch_date) = '$rdate'";
		$runbmi = mysqli_query($conn,$selectbmi);
		$databmi = mysqli_fetch_array($runbmi);
					
		$selectbmc = "SELECT COUNT(*) FROM branch_mark WHERE current_status = 'Completed' and marked_to = '$id' and YEAR(dispatch_date) = '$rdate'";
		$runbmc = mysqli_query($conn,$selectbmc);
		$databmc = mysqli_fetch_array($runbmc);
					
					
		$selectbdp = "SELECT COUNT(*) FROM b_letter WHERE status = 'Pending' and marked_to = '$id' and YEAR(dispatch_date) = '$rdate'";
		$runbdp = mysqli_query($conn,$selectbdp);
		$databdp = mysqli_fetch_array($runbdp);
					
		$selectbdi = "SELECT COUNT(*) FROM b_letter WHERE status = 'Information' and marked_to = '$id' and YEAR(dispatch_date) = '$rdate'";
		$runbdi = mysqli_query($conn,$selectbdi);
		$databdi = mysqli_fetch_array($runbdi);
					
		$selectbddc = "SELECT COUNT(*) FROM b_letter WHERE status = 'Completed' and marked_to = '$id' and YEAR(dispatch_date) = '$rdate'";
		$runbdc = mysqli_query($conn,$selectbddc);
		$databdc = mysqli_fetch_array($runbdc);			
		
					
		$pendingp = $databmp['COUNT(*)'] +$databdp['COUNT(*)'];
		$infop = $databmi['COUNT(*)'] + $databdi['COUNT(*)'];
		$completep = $databmc['COUNT(*)'] + $databdc['COUNT(*)'];
					
		$totalp = $pendingp +$infop + $completep ;
					
   if($totalp == 0){
		$prep = 0;
	}else{				
	   
	$pp = $infop + $completep ;
		
  if($pp == 0){
		$prep = 0;
	}else{	
	   
	$prep = round($pp * 100/$totalp);
	  
  }
	}
					
		
			
			?>	
							
		<tr>
                    <td align="center">&nbsp; &nbsp; &nbsp;<?php echo $datad['distric']?></td>
                    <td align="center">&nbsp; &nbsp; &nbsp;<?php echo $pendingp;?></td>
                    <td align="center">&nbsp; &nbsp; &nbsp;<?php echo $infop;?></td>
		            <td align="center">&nbsp; &nbsp; &nbsp;<?php echo $completep; ?></td>
                    <td align="center">&nbsp; &nbsp; &nbsp;<?php echo $totalp?></td>
                    <td align="center">&nbsp; &nbsp; &nbsp;<?php echo round($prep)."%"?></td>
                    
			</tr>
			<?php
			endwhile;
			?>

					 </tbody>
					</table>
				</div>
<!--.box-typical-body-->
	                </section><!--.box-typical-dashboard-->
	            </div><!--.col-->
				
				
				
				
				
				<?php }?>
	        </div><!--.row-->
	
	    </div><!--.container-fluid-->
	</div><!--.page-content-->



	<script src="js/lib/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/lib/popper/popper.min.js"></script>
	<script src="js/lib/tether/tether.min.js"></script>
	<script src="js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>

	<script type="text/javascript" src="js/lib/jqueryui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/lib/lobipanel/lobipanel.min.js"></script>
	<script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	
	<script src="js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
	<script src="js/lib/bootstrap-table/bootstrap-table.js"></script>
	<script src="js/lib/bootstrap-table/bootstrap-table-export.min.js"></script>
	<script src="js/lib/bootstrap-table/tableExport.min.js"></script>
	<script src="js/lib/bootstrap-table/bootstrap-table-init.js"></script>
	
		<script src="js/lib/asPieProgress/jquery-asPieProgress.min.js"></script>

	
		<script src="js/lib/slick-carousel/slick.min.js"></script>
	<script>
		$(function() {
			$(".circle-progress-bar").asPieProgress({
				namespace: 'asPieProgress',
				speed: 500
			});

			$(".circle-progress-bar").asPieProgress("start");


			$(".circle-progress-bar-typical").asPieProgress({
				namespace: 'asPieProgress',
				speed: 25
			});

			$(".circle-progress-bar-typical").asPieProgress("start");

			$('.widget-chart-combo-content-in, .widget-chart-combo-side').matchHeight();

			/* ==========================================================================
			 Widget weather slider
			 ========================================================================== */

			$('.widget-weather-slider').slick({
				arrows: false,
				dots: true,
				infinite: false,
				slidesToShow: 4,
				slidesToScroll: 4
			});
		});
	</script>
	
	
<script src="js/app.js"></script>
</body>
</html>