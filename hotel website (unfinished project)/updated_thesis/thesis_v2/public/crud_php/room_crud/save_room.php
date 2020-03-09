<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$room_number = $_POST['room_number'];
$roomtype_id = $_POST['roomtype_id'];
$smoking_YN_id = $_POST['smoking_YN_id'];
$sql = "INSERT INTO room(room_number,roomtype_id,smoking_YN_id) VALUES('$room_number','$roomtype_id','$smoking_YN_id')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>

