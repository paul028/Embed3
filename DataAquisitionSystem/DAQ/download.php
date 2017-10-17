<?php
require('include/header.php');
require('navbar.php');
?>
	<div class="container well">
	
	<form class="w3-container" action="php/dlConductivity.php" method="POST">
	Select Sensor:
	<select class="w3-input w3-border" name="sensor">;
				<?php
					$host = "localhost";
					$user = "root";
					$pass = "linux";
					$dbname = "edc";

					$con = new mysqli($host,$user,$pass,$dbname)
					or die ('Cannot connect to db');

					$result = $con->query("SELECT * FROM sensors;");

					while ($row = $result->fetch_assoc()) 
					{
						unset($id, $name);
						$id = $row['sensor_no'];
						$name = $row['sensor_name']; 
						echo '<option value="'.$id.'">'.$name.'</option>';
					}
					
				?> 
	</select>
	<br>
	Select Start Date:
	<input class="w3-input w3-border" name="startdate" type="date" max="2100-12-31">
	<br>
	Select End Date:
	<input class="w3-input w3-border" name="enddate" type="date" max="2100-12-31">
	<br>
	<br>
	<center><button class="w3-btn w3-green" style="width:auto; padding:15px;">Download</button>
	</center>
	</form>
	</div>

<?php require('include/footer.php');?>

