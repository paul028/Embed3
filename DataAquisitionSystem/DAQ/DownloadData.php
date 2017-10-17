<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="images/edclogo.png" />
	<link rel="icon" type="image/png" href="images/edclogo.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Download Data</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/morris.css" rel="stylesheet">
	<link href="css/material-dashboard.css" rel="stylesheet"/>
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/RobotoFont-Material.css" />

</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-color="green" data-image="../assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="#" class="simple-text">
					RedCaps
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li>
	                    <a href="index.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="ViewPH.php">
	                        <i class="material-icons">insert_chart</i>
	                        <p>pH Graph</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="ViewTSS.php">
	                        <i class="material-icons">insert_chart</i>
	                        <p>Turbidity Graph</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="ViewTemperature.php">
	                        <i class="material-icons">insert_chart</i>
	                        <p>Temperature Graph</p>
	                    </a>
	                </li>
	                <li class="active">
	                    <a href="DownloadData.php">
	                        <i class="material-icons">save</i>
	                        <p>Download Data</p>
	                    </a>
	                </li>

	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><img src="images/logo.png" alt="Rounded Image" class="img-rounded img-responsive"></a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="tooltip" data-placement="top" title="Settings">
	 							   <i class="material-icons" >settings</i>
	 							   <p class="hidden-lg hidden-md">Settings</p>
		 						</a>
							</li>
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">lock</i>
	 							   <p class="hidden-lg hidden-md">Logout</p>
		 						</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<br><br>

			<div class="content">
				<div class="container-fluid">
						<form class="container-fluid" action="php/dlData.php" method="POST">
					<div class="card card-stats">
								<div class="card-header" data-background-color="green">
								<i class="material-icons" data-toggle="tooltip" data-placement="right" title="Provide correct details">info</i>
								</div>
								<div class="card-content">
								<div class="row">
								<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="title">
									Select Sensor:
								</div>
									<select class="form-control" name="sensor" id="sensor">;
										<?php
											$host = "localhost";
											$user = "edc";
											$pass = "test2016";
											$dbname = "waterquality";

											$con = new mysqli($host,$user,$pass,$dbname)
											or die ('Cannot connect to db');

											$result = $con->query("SELECT * FROM sensors;");

											while ($row = $result->fetch_assoc())
											{
												unset($id, $name);
												$id = $row['sensor_no'];
												$name = $row['sensor_name'];
												echo '<option class="form-control" value="'.$id.'">'.$name.'</option>';
											}

										?>
									</select>
								</div>
								<div class="col-lg-4 col-md-6 col-sm-6">
									<div class="title">
										Select Start Date:
									</div>
										<input type="datetime" class="datepicker form-control" name="startdate" type="date" value="<?php echo date('m/d/Y'); ?>"  />
									</div>

									<div class="col-lg-4 col-md-6 col-sm-6">
									<div class="title">
										Select End Date:
									</div>
									<input type="datetime" class="datepicker form-control" name="enddate" type="date" value="<?php echo date('m/d/Y'); ?>"/>
									</div>
								</div>
								<div class="card-footer">
									<div class="stats">
										<input type="submit" class="btn btn-success" value="Download" style="width:auto; padding:15px;"/>



									</div>

								</div>
								<div id="Chart"></div>
							</div>
					</form>

				</div>
			</div>

		</div>

	</div>

</body>
	<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/material.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-notify.js"></script>
	<script src="js/material-dashboard.js"></script>
	<script type="text/javascript" src="js/sensors.js" async></script>

	<script src="js/nouislider.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="js/material-kit.js" type="text/javascript"></script>

	<script type="text/javascript" src="js/sensors.js" async></script>
	<script type="text/javascript" src="js/morris-0.4.1.min.js"></script>
	<script type="text/javascript" src="js/raphael-min.js"></script>
</html>
