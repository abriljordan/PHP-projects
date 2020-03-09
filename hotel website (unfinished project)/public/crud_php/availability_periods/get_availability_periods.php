<?php require_once("../../../includes/initialize.php"); ?>
<?php 	
$rs = mysql_query('select * from view_room_availability_periods');

$result = array();
while($row = mysql_fetch_object($rs)){
	array_push($result, $row);
}
echo json_encode($result);
?>

