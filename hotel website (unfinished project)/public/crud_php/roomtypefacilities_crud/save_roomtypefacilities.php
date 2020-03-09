<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$roomtype_id = $_POST['roomtype_id'];
$facility_id = $_POST['facility_id'];
$sql = "INSERT INTO roomtype_facilities(roomtype_id,facility_id) VALUES('$roomtype_id','$facility_id')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>

