<?php
if(!$_SESSION["username"] && !$_SESSION["userid"]){
	header("Location:../index.php");
}
else{


?>
<div class="sidebar app-aside" id="sidebar">
				<div class="sidebar-container perfect-scrollbar">

<nav>

						<!-- start: MAIN NAVIGATION MENU -->
						<div class="navbar-title">
							<span>Main Navigation</span>
						</div>
						<ul class="main-navigation-menu">
							<li>
								<a href="dashboard.php">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-home"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Home </span>
										</div>
									</div>
								</a>
							</li>

							<li>
								<a href="notification.php">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-bell"></i>
										</div>
										<div class="item-inner">
											<?php
		$nots=mysqli_query($con, "SELECT * FROM notifications WHERE docId='".$_SESSION['userid']."'");
		$counts=0;
while ($row=mysqli_fetch_array($nots)) {
	 $counts=$counts+1;} ?>

											<span class="title"> Notification </span><?php echo '(<span style="color:red;">'.$counts.'</span>)'; ?>

										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="appointment-history.php">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-bookmark"></i>
										</div>
										<div class="item-inner">
											<?php
		$nots=mysqli_query($con, "SELECT * FROM appointment WHERE docId='".$_SESSION['userid']."' and status='0'");
		$counts=0;
while ($row=mysqli_fetch_array($nots)) {
	 $counts=$counts+1;} ?>
											<span class="title"> Appointment </span>
											<?php echo '(<span style="color:red; font-weight:bolder;">'.$counts.'</span>)'; ?>
										</div>
									</div>
								</a>
							</li>
								<li>
								<a href="manage-patient.php">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-info"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Patient Information </span>
										</div>
									</div>
								</a>
							</li>
								<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-filter"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Laboratory </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">

									<li>
										<a href="lab-response.php">
											<span class="title"> Laboratory Report</span>
										</a>
									</li>
									<li>
										<a href="pend-req.php">
											<span class="title"> Pending Laboratory request</span>
										</a>
									</li>
								</ul>
								</li>
								<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-plug"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Radioscopy </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">

									<li>
										<a href="xray-response.php">
											<span class="title"> Radioscopy Report</span>
										</a>
									</li>
									<li>
										<a href="pend-xreq.php">
											<span class="title"> Pending Radioscopy request</span>
										</a>
									</li>
								</ul>
								</li>

						</ul>
						<!-- end: CORE FEATURES -->

					</nav>
					</div>
			</div>
			<?php } ?>
