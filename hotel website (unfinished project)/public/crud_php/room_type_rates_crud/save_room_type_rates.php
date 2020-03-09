<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$room_type_rate = new Rate();
$room_type_rate->rate = $_POST['rate'];
$room_type_rate->description = $_POST['description'];
			if($user->save()){
				echo json_encode(array('success'=>true));
			} else {
				echo json_encode(array('msg'=>'Some errors occured.'));
			}
?>

