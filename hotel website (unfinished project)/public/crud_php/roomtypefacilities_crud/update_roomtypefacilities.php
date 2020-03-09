<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$id = intval($_REQUEST['id']);
$roomtype_id = $_REQUEST['roomtype_id'];
$facility_id = $_REQUEST['facility_id'];
$sql = "UPDATE roomtype_facilities SET roomtype_id='$roomtype_id',facility_id='$facility_id' WHERE id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>
