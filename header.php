	<header class="site-header">
	    <div class="container-fluid">
	        <a href="#" class="site-logo">
	            <img class="hidden-md-down" src="img/Icons/logo.svg" alt=""> 
	            <img class="hidden-lg-down" src="img/logo-2-mob.png" alt="">
	        </a>
	
	        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
	            <span>toggle menu</span>
	        </button>
	
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">
	                    <div class="dropdown dropdown-notification notif">
	                        <a href="#"
	                           class="header-alarm dropdown-toggle active"
	                           id="dd-notification"
	                           data-toggle="dropdown"
	                           aria-haspopup="true"
	                           aria-expanded="false">
	                            <i class="font-icon-alarm"></i>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-notif" aria-labelledby="dd-notification">
	                            <div class="dropdown-menu-notif-header">
	                                Notifications
	                                <span class="label label-pill label-danger">4</span>
	                            </div>
<!--
	                            <div class="dropdown-menu-notif-list">
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="img/photo-64-1.jpg" alt="">
	                                    </div>
	                                    <div class="dot"></div>
	                                    <a href="#">Morgan</a> was bothering about something
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="img/photo-64-2.jpg" alt="">
	                                    </div>
	                                    <div class="dot"></div>
	                                    <a href="#">Lioneli</a> had commented on this <a href="#">Super Important Thing</a>
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="img/photo-64-3.jpg" alt="">
	                                    </div>
	                                    <div class="dot"></div>
	                                    <a href="#">Xavier</a> had commented on the <a href="#">Movie title</a>
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="img/photo-64-4.jpg" alt="">
	                                    </div>
	                                    <a href="#">Lionely</a> wants to go to <a href="#">Cinema</a> with you to see <a href="#">This Movie</a>
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                            </div>
-->
	                            <div class="dropdown-menu-notif-more">
	                                <a href="#">See more</a>
	                            </div>
	                        </div>
	                    </div>
	
	                    <div class="dropdown dropdown-notification messages">
	                        <a href="#"
	                           class="header-alarm dropdown-toggle active"
	                           id="dd-messages"
	                           data-toggle="dropdown"
	                           aria-haspopup="true"
	                           aria-expanded="false">
	                            <i class="font-icon-mail"></i>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-messages" aria-labelledby="dd-messages">
	                            <div class="dropdown-menu-messages-header">
	                                <ul class="nav" role="tablist">
	                                    <li class="nav-item">
	                                        <a class="nav-link active"
	                                           data-toggle="tab"
	                                           href="#tab-incoming"
	                                           role="tab">
	                                            Inbox
	                                            <span class="label label-pill label-danger">8</span>
	                                        </a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link"
	                                           data-toggle="tab"
	                                           href="#tab-outgoing"
	                                           role="tab">Outbox</a>
	                                    </li>
	                                </ul>
	                                <!--<button type="button" class="create">
	                                    <i class="font-icon font-icon-pen-square"></i>
	                                </button>-->
	                            </div>
<!--
	                            <div class="tab-content">
	                                <div class="tab-pane active" id="tab-incoming" role="tabpanel">
	                                    <div class="dropdown-menu-messages-list">
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/avatar-2-64.png" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something.</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/avatar-2-64.png" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something...</span>
	                                        </a>
	                                    </div>
	                                </div>
	                                <div class="tab-pane" id="tab-outgoing" role="tabpanel">
	                                    <div class="dropdown-menu-messages-list">
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/avatar-2-64.png" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something...</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something.</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/avatar-2-64.png" alt=""></span>
	                                            <span class="mess-item-name">Christian Burtons</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                    </div>
	                                </div>
	                            </div>
-->
	                            <div class="dropdown-menu-notif-more">
	                                <a href="#">See more</a>
	                            </div>
	                        </div>
	                    </div>
	
	                    <div class="dropdown dropdown-lang">
	                        <button class="dropdown-toggle" type="button">
	                            <span class="flag-icon flag-icon-pk"></span>
	                        </button>
	                    </div>
	
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img src="img/Icons/Former_logo_of_Punjab_Police_Pakistan.svg" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="logout.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
	                        </div>
	                    </div>
	
	                    <button type="button" class="burger-right">
	                        <i class="font-icon-menu-addl"></i>
	                    </button>
	                </div><!--.site-header-shown-->
	
					
					<?php 
include "connection.php";

$select = "SELECT * FROM user WHERE  user_name = '$user_name' and user_type = '$u_type'";
$run = mysqli_query($conn,$select);
$data = mysqli_fetch_array($run);
		
$department = $data['department'];

$type = $data['user_type'];



?>
					
	                <div class="mobile-menu-right-overlay"></div>
	                <div class="site-header-collapsed">
	                    <div class="site-header-collapsed-in">
	
	                        <form method="post" >
							
								<select name="rdate" class="form-controle" style="margin: 0px 50px;">
									<option value="2022">2022</option>
									<option value="2021">2021</option>
								</select>
						
							<input type="submit" name="year" class="btn btn-rounded btn-inline btn-primary-outline" >
	    
								
								</form>
							<?php
							if(isset($_POST['year'])){
								$rdate = $_POST['rdate'];
							}
							else{
								$rdate = "2022";
							}
							
							?>
							
							
							
<!--


	                        <a class="btn btn-nav btn-rounded btn-inline btn-danger-outline" href="main_dispatch.php">
	                            Main Dispatch
	                        </a>
-->
							
							
<!--
	                        <div class="site-header-search-container">
	                            <form class="site-header-search" style="height: 30px; width: 300px; border-color: #0AB0AE;">
	                                <input type="text" placeholder="Search" >
	                                <button type="submit">
	                                    <span class="font-icon-search"></span>
	                                </button>
	                                <div class="overlay"></div>
	                            </form>
	                        </div>
-->
	                    </div><!--.site-header-collapsed-in-->
	                </div><!--.site-header-collapsed-->
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->


<style>
	.with-sub ul > .hov:hover{
		color: aqua;
	}
</style>






	<div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu" style="background-color: #073b63;">
			    <div class="side-menu-avatar mb-4" style="background-color: #073b63;">
	        <div class="avatar-preview avatar-preview-100">
	            <img src="img/Icons/Former_logo_of_Punjab_Police_Pakistan.svg" alt="">
				<p style="color: white; font-size: 15px; text-transform: uppercase;">
				<?php echo $user_name;?>
				</p>
	        </div>
	    </div>
	    <ul class="side-menu-list">
			<li class="grey">
	            <a href="index.php">
	                <i class="font-icon font-icon-dashboard"></i>
	                <span class="lbl" style="color: #BCBCBC;"><strong>Dashboard</strong></span>
	            </a>
	        </li>
			
			
		<?php 
			
			if($type == "branch"){
				
			?>
					   <li class="grey with-sub">			
			
				 <span>
	                <i class="font-icon"><img src="img/Icons/laptop.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"><strong>Branche's</strong></span>
	            </span>
		 <ul>
		 <li class="brown with-sub">
	            <span>
	                <i class="font-icon"><img src="img/Icons/laptop.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="margin-left: 40px; margin-top: 10px;"><strong>Branche Letters</strong></span>
	            </span>
		 <ul>
	                 <li><a href="b_letter.php"><span class="lbl">Create Branch Dispatch</span></a></li>
	                <li><a href="bd_letters.php"><span class="lbl">Branch Pending Letters</span></a></li>
	                <li><a href="bd_info.php"><span class="lbl">Branch Information Letters</span></a></li>
	                <li><a href="bd_complete.php"><span class="lbl">Branch Complete Letters</span></a></li>
	                <li><a href="bd_all.php"><span class="lbl">Branch All Letters</span></a></li>
	            </ul>
	   </li>
			 
	  <li class="brown with-sub">
	            <span>
	                <i class="font-icon"><img src="img/Icons/laptop.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="margin-left: 40px; margin-top: 10px;"><strong>Diary Branche Letters</strong></span>
	            </span>
		 <ul>
	                <li><a href="btodays_letters.php"><span class="lbl">Today’s Received Letters</span></a></li>
	                <li><a href="bpending_letters.php"><span class="lbl">Pending Received Letters</span></a></li>
	                <li><a href="bcomplete_letters.php"><span class="lbl">Completed Received Letters</span></a></li>
	                <li><a href="ball_letters.php"><span class="lbl">All Received Letters</span></a></li>
	            </ul>
	   </li>	 
			 
		 </ul>
	   </li>
			
		<li class="grey with-sub">
	            <span>
	                <i class="font-icon"><img src="img/Icons/5027831_person_target_user_icon.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"><strong>Due Letter</strong></span>
	            </span>
	            <ul>
	                <li><a href="due_letters.php"><span class="lbl hov">MainDue Letter</span></a></li>
	                <li><a href="bdue_letters.php"><span class="lbl hov">Branch Due Letter</span></a></li>
	                <li><a href="pdue_letters.php"><span class="lbl hov">Progress Due Letter</span></a></li>
	            </ul>
	        </li>
			
			
	<?php 				
	if($user_name == "icc branch"){
		?>
			
		<li class="grey with-sub">
	            <span>
	                <i class="font-icon "> <img src="img/Icons/region.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"><strong>Khuli Kachehri</strong></span>
	            </span>
	            <ul>
	                <li><a href="khachari.php"><span class="lbl">Kachehri</span></a></li>
	                <li><a href="kd_letters.php"><span class="lbl">Dispose Off</span></a></li>
	                <li><a href="kp_letters.php"><span class="lbl">Pendding</span></a></li>
	                <li><a href="kall_letters.php"><span class="lbl">All kachehri</span></a></li>
	            </ul>
	        </li>	
			
			
		
<?php	}
		?>	
			
			
						<?php 				
	if($user_name == "reader branch"){
		?>
			
		<li class="grey with-sub">
	            <span>
	                <i class="font-icon "> <img src="img/Icons/region.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"><strong>Progress</strong></span>
	            </span>
	            <ul>
	                <li><a href="p_letter.php"><span class="lbl">Progress</span></a></li>
	                <li><a href="pp_letter.php"><span class="lbl">Pendding Progress</span></a></li>
	                <li><a href="pc_letter.php"><span class="lbl">Complete</span></a></li>
	                <li><a href="pa_letter.php"><span class="lbl">All Progress</span></a></li>
	            </ul>
	        </li>	
			
			
		
<?php	}
		?>
			
			
			
			
			<?php }

			elseif($type == "district"){
			?>
			
			<li class="grey with-sub">
	            <span>
	                <i class="font-icon "> <img src="img/Icons/region.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"><strong>District's</strong></span>
	            </span>
	            <ul>
	                <li><a href="dtodays_letters.php"><span class="lbl hov">Today’s Letters</span></a></li>
	                <li><a href="dpending_letters.php"><span class="lbl">Pending Letters</span></a></li>
	                <li><a href="dcomplete_letters.php"><span class="lbl">Completed Letters</span></a></li>
	            </ul>
	        </li>
			
			<li class="grey with-sub">
	            <span>
	                <i class="font-icon"><img src="img/Icons/5027831_person_target_user_icon.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"><strong>Due Letter</strong></span>
	            </span>
<ul>
	                <li><a href="due_letters.php"><span class="lbl hov">MainDue Letter</span></a></li>
	                <li><a href="bdue_letters.php"><span class="lbl hov">Branch Due Letter</span></a></li>
	                <li><a href="pdue_letters.php"><span class="lbl hov">Progress Due Letter</span></a></li>
	            </ul>
	        </li>
			
		<?php
			}
			elseif($type == "rpo"){
				
			?>
			
			
			
			

			
<!--
			<li class="grey with-sub">
	            <span>
	                <i class="font-icon"><img src="img/Icons/diary.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"> <strong>Main Dispatch</strong></span>
	            </span>
	            <ul>
	                <li><a href="dispatch.php"><span class="lbl">Dispatch</span></a></li>
	                <li><a href="main_dispatch.php"><span class="lbl">Main Dispatch</span></a></li>
	            </ul>
	        </li>
-->
			
			
	        <li class="grey with-sub">
	            <span>
	                <i class="font-icon"><img src="img/Icons/diary.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"> <strong>Main Diary</strong></span>
	            </span>
	            <ul>
	                <li><a href="main_letter.php"><span class="lbl">Add Main Diary</span></a></li>
	                <li><a href="todays_letters.php"><span class="lbl">Today’s Letters</span></a></li>
	                <li><a href="pending_letters.php"><span class="lbl">Pending Letters</span></a></li>
	                <li><a href="complete_letters.php"><span class="lbl">Completed Letters</span></a></li>
	                <li><a href="all_letters.php"><span class="lbl">All Letters</span></a></li>
	            </ul>
	        </li>
	        
	        
	     <li class="grey with-sub">			
			
				 <span>
	                <i class="font-icon"><img src="img/Icons/laptop.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"><strong>Branche's</strong></span>
	            </span>
		 <ul>
		 <li class="brown with-sub">
	            <span>
	                <i class="font-icon"><img src="img/Icons/laptop.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="margin-left: 40px; margin-top: 10px;"><strong>Branche Letters</strong></span>
	            </span>
		 <ul>
	                <li><a href="bd_letters.php"><span class="lbl">Branch Pending Letters</span></a></li>
	                <li><a href="bd_info.php"><span class="lbl">Branch Information Letters</span></a></li>
	                <li><a href="bd_complete.php"><span class="lbl">Branch Complete Letters</span></a></li>
	                <li><a href="bd_all.php"><span class="lbl">Branch All Letters</span></a></li>
	            </ul>
	   </li>
			 
	  <li class="brown with-sub">
	            <span>
	                <i class="font-icon"><img src="img/Icons/laptop.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="margin-left: 40px; margin-top: 10px;"><strong>Diary Branche Letters</strong></span>
	            </span>
		 <ul>
	                <li><a href="btodays_letters.php"><span class="lbl">Today’s Received Letters</span></a></li>
	                <li><a href="bpending_letters.php"><span class="lbl">Pending Received Letters</span></a></li>
	                <li><a href="bcomplete_letters.php"><span class="lbl">Completed Received Letters</span></a></li>
	                <li><a href="ball_letters.php"><span class="lbl">All Received Letters</span></a></li>
	            </ul>
	   </li>
	   	                <li><a href="add_branch.php"><span class="lbl">Add Branch</span></a></li>
	                <li><a href="manage_branch.php"><span class="lbl">Manage Branch</span></a></li>
			 
		 </ul>
	   </li>
	        
	        
			
		   <!--<li class="grey with-sub">-->
	    <!--        <span>-->
	    <!--            <i class="font-icon"><img src="img/Icons/laptop.svg" style="height: 20px; width: 20px;" alt=""></i>-->
	    <!--            <span class="lbl" style="color: #BCBCBC;"><strong>Branche's</strong></span>-->
	    <!--        </span>-->
	    <!--        <ul>-->
	    <!--            <li><a href="b_letter.php"><span class="lbl">Add Letters</span></a></li>-->
	    <!--            <li><a href="btodays_letters.php"><span class="lbl">Today’s Letters</span></a></li>-->
	    <!--            <li><a href="bpending_letters.php"><span class="lbl">Pending Letters</span></a></li>-->
	    <!--            <li><a href="bcomplete_letters.php"><span class="lbl">Completed Letters</span></a></li>-->
	    <!--            <li><a href="add_branch.php"><span class="lbl">Add Branch</span></a></li>-->
	    <!--            <li><a href="manage_branch.php"><span class="lbl">Manage Branch</span></a></li>-->
	    <!--            <li><a href="ball_letters.php"><span class="lbl">All Letters</span></a></li>-->
	    <!--        </ul>-->
	    <!--    </li>-->
			<li class="grey with-sub">
	            <span>
	                <i class="font-icon "> <img src="img/Icons/region.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"><strong>District's</strong></span>
	            </span>
	            <ul>
	                <li><a href="dtodays_letters.php"><span class="lbl hov">Today’s Letters</span></a></li>
	                <li><a href="dpending_letters.php"><span class="lbl">Pending Letters</span></a></li>
	                <li><a href="dcomplete_letters.php"><span class="lbl">Completed Letters</span></a></li>
	                <li><a href="add_distric.php"><span class="lbl">Add District</span></a></li>
	                <li><a href="manage_distric.php"><span class="lbl">Manage District</span></a></li>
	            </ul>
	        </li>
			<li class="grey with-sub">
	            <span>
	                <i class="font-icon"> <img src="img/Icons/4308306_approval_authority_legal_mark_rubber_icon.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"><strong>Issue Authority</strong></span>
	            </span>
	            <ul>
	                <li><a href="add_authority.php"><span class="lbl hov">Add Authority</span></a></li>
	                <li><a href="manage_authority.php"><span class="lbl">Manage Authority</span></a></li>
	            </ul>
	        </li>
			<li class="grey with-sub">
	            <span>
	                <i class="font-icon"><img src="img/Icons/5027831_person_target_user_icon.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"><strong>User Management</strong></span>
	            </span>
	            <ul>
	                <li><a href="user.php"><span class="lbl hov">Add User</span></a></li>
	                <li><a href="#"><span class="lbl">Manage User</span></a></li>
	            </ul>
	        </li>
			<li class="grey with-sub">
	            <span>
	                <i class="font-icon"><img src="img/Icons/5027831_person_target_user_icon.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"><strong>Due Letter</strong></span>
	            </span>
	            <ul>
	                <li><a href="due_letters.php"><span class="lbl hov">MainDue Letter</span></a></li>
	                <li><a href="bdue_letters.php"><span class="lbl hov">Branch Due Letter</span></a></li>
	                <li><a href="pdue_letters.php"><span class="lbl hov">Progress Due Letter</span></a></li>
	            </ul>
	        </li>
			
			<li class="grey with-sub">
	            <span>
	                <i class="font-icon "> <img src="img/Icons/region.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"><strong>Khuli Kachehri</strong></span>
	            </span>
	            <ul>
	                <li><a href="khachari.php"><span class="lbl">Kachehri</span></a></li>
	                <li><a href="kd_letters.php"><span class="lbl">Dispose Off</span></a></li>
	                <li><a href="kp_letters.php"><span class="lbl">Pendding</span></a></li>
	                <li><a href="kall_letters.php"><span class="lbl">All kachehri</span></a></li>
	            </ul>
	        </li>
			<li class="grey with-sub">
	            <span>
	                <i class="font-icon "> <img src="img/Icons/region.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"><strong>Progress</strong></span>
	            </span>
	            <ul>
	                <li><a href="p_letter.php"><span class="lbl">Progress</span></a></li>
	                <li><a href="pp_letter.php"><span class="lbl">Pendding Progress</span></a></li>
	                <li><a href="pc_letter.php"><span class="lbl">Complete</span></a></li>
	                <li><a href="pa_letter.php"><span class="lbl">All Progress</span></a></li>
	            </ul>
	        </li>
			
			<?php }
			elseif($type == "ad"){
			
			?>
			
<!--
			<li class="grey with-sub">
	            <span>
	                <i class="font-icon"><img src="img/Icons/diary.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"> <strong>Main Dispatch</strong></span>
	            </span>
	            <ul>
	                <li><a href="dispatch.php"><span class="lbl">Dispatch</span></a></li>
	                <li><a href="main_dispatch.php"><span class="lbl">Main Dispatch</span></a></li>
	            </ul>
	        </li>
-->
	        <li class="grey with-sub">
	            <span>
	                <i class="font-icon"><img src="img/Icons/diary.svg" style="height: 20px; width: 20px;" alt=""></i>
	                <span class="lbl" style="color: #BCBCBC;"> <strong>Main Diary</strong></span>
	            </span>
	            <ul>
	                <li><a href="main_letter.php"><span class="lbl">Add Main Diary</span></a></li>
	                <li><a href="todays_letters.php"><span class="lbl">Today’s Letters</span></a></li>
	                <li><a href="pending_letters.php"><span class="lbl">Pending Letters</span></a></li>
	                <li><a href="complete_letters.php"><span class="lbl">Completed Letters</span></a></li>
	                <li><a href="all_letters.php"><span class="lbl">All Letters</span></a></li>
	            </ul>
	        </li>
			

			
			<?php
			}
			?>
			
			
			
	    </ul>
		</nav><!--.side-menu-->