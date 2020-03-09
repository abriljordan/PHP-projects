<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$id = intval($_REQUEST['id']);
$room_type_rate = Rate::find_by_id($id);
$room_type_rate->rate = $_POST['rate'];
$room_type_rate->description = $_POST['description'];
			if($user->save()){
				echo json_encode(array('success'=>true));
			} else {
				echo json_encode(array('msg'=>'Some errors occured.'));
			}
?>
