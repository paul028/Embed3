<?php
require('include/head.php');

?>

<body>

	<div class="sidebar" data-color="green" data-image="">

	<div class="logo">
	  <a href="#" class="simple-text">
	    DAQ
	  </a>
	</div>
	  <div class="sidebar-wrapper">
	        <ul class="nav">
	            <li  class="active">
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

	            <li>
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
						</ul>
					</div>
				</div>
			</nav>
			<br><br>
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header"  data-background-color="green"  id="phDiv">
									<i class="material-icons"  data-toggle="tooltip" data-placement="right" title="pH Level">info</i>
								</div>
								<div class="card-content">
									<p class="category" >PH</p>
									<h4 class="title" id="phData">0</h4>
								</div>
								<div class="card-footer">
									<div class="stats">
										<h4 id="phFooter"></h4>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green" id="tssDiv">
									<i class="material-icons">info</i>
								</div>
								<div class="card-content">
									<p class="category">Turbidity</p>
									<h4 class="title" id="tssData">0</h4>
								</div>
								<div class="card-footer">
									<div class="stats">
										<h4 id="tssFooter"></h4>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green" id="tempDiv">
									<i class="material-icons">info</i>
								</div>
								<div class="card-content">
									<p class="category">Temperature</p>
									<h4 class="title" id="temperatureData">0</h4>
								</div>
								<div class="card-footer">
									<div class="stats">
										<h4 id="temperatureFooter"></h4>
									</div>
								</div>
							</div>
						</div>


					</div>


					<!-- Second Row	-->

					<div class="row">





					</div>

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
	<script src="js/material-kit.js" type="text/javascript"></script>

	<script type="text/javascript" src="js/morris-0.4.1.min.js"></script>
	<script type="text/javascript" src="js/raphael-min.js"></script>
	<script type="text/javascript" src="js/sensors.js" async></script>
</html>
