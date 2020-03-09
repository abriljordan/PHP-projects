<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$id = $_REQUEST['id'];
$user = Users::find_by_id($id);
if($user->delete()){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>