<?php
 $connect = mysqli_connect("localhost", "edc", "test2016", "waterquality");  
 $output = '';
 $sql = "select d.value, s.unit, d.log_date
from data_logger d
join sensors s
on( s.sensor_no = d.sensor_no)
where d.sensor_no =2
order by d.log_date desc limit 1";
 $result = mysqli_query($connect, $sql);
 if($result)
 {
$row = mysqli_fetch_array($result);
	$output .= ''.$row['value'];
 }
 else
 {
      $output .= 'error';
 }
 echo $output;
 ?>
