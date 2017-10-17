<?php
	if(isset($_POST['sensor'],$_POST['startdate'],$_POST['enddate']))
	{
		$sensor = $_POST['sensor'];
		$date1 = $_POST['startdate'];
		$date2 = $_POST['enddate'];

		$startdate = date("Y-m-d", strtotime($date1));
		$enddate = date("Y-m-d", strtotime($date2));

		$host="localhost";
		$username="edc";
		$password="test2016";
		$dbname="waterquality";
		$con = new mysqli($host, $username, $password,$dbname);

		$sql_data="select d.value, s.unit, d.log_date
		from data_logger d
		join sensors s
		on( s.sensor_no = d.sensor_no)
		where s.sensor_no ='$sensor' and d.log_date between '$startdate' and '$enddate'
		order by d.log_date desc";
		$result_data=$con->query($sql_data);
		$results=array();

		$filename = 'Data-Sensor-'.$sensor.'.xls';


		// Download file
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header("Content-Type: application/vnd.ms-excel");


		$flag = false;
		while ($row = mysqli_fetch_assoc($result_data)) {
			if (!$flag) {
				// display field/column names as first row
				echo implode("\t", array_keys($row)) . "\r\n";
				$flag = true;
			}
			echo implode("\t", array_values($row)) . "\r\n";
		}
	}
    ?>
