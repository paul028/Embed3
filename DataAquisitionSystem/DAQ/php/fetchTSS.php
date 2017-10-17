<?php
$con = mysql_connect('localhost','edc','test2016') ;

mysql_select_db('waterquality', $con);

$query = mysql_query('SELECT value As Sensor,log_date As Date FROM data_logger where sensor_no =1  GROUP BY log_date ORDER BY log_date desc LIMIT 300')or die(mysql_error());

$table = array();

$rows = array();
while($r = mysql_fetch_assoc($query)) {
    $temp = array();
    $rows[] = array('x' => $r['Date'],'y' => (float) $r['Sensor']);
}
$table = $rows;

$jsonTable = json_encode($table);

header('Cache-Control: no-cache, must-revalidate');
header('Content-type: application/json');

// return the JSON data
echo $jsonTable;
?>
