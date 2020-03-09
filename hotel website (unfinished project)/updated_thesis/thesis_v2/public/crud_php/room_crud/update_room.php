<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$id = intval($_REQUEST['id']);
$room_number = $_REQUEST['room_number'];
$roomtype_id = $_REQUEST['roomtype_id'];
$smoking_YN_id = $_REQUEST['smoking_YN_id'];
$sql = "UPDATE room SET room_number='$room_number',roomtype_id='$roomtype_id',smoking_YN_id='$smoking_YN_id' WHERE id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>
