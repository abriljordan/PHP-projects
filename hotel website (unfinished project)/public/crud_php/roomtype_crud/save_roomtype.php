<?php require_once("../../../includes/initialize.php"); ?>
<?php 
	$roomtype = new RoomType();
	$roomtype->first_name = $_POST['roomtype'];
	$roomtype->last_name = $_POST['rate_id'];
	$roomtype->nickname = $_POST['capacity'];
	$roomtype->userlevel_id = $_POST['description'];
			if($user->save()){
				echo json_encode(array('success'=>true));
			} else {
				echo json_encode(array('msg'=>'Some errors occured.'));
			}
?>

