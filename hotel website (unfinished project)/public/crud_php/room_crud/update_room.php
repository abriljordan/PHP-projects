<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$id = intval($_REQUEST['id']);
$room = Room::find_by_id($id);
$room->room_number = $_POST['room_number'];
$room->$roomtype_id = $_POST['roomtype_id'];
$room->$smoking_YN_id = $_POST['smoking_YN_id'];
	if($user->save()){
				echo json_encode(array('success'=>true));
			} else {
				echo json_encode(array('msg'=>'Some errors occured.'));
			}
?>
