<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$id = $_REQUEST['id'];
$user = Users::find_by_id($id);
	$user->first_name = $_REQUEST['first_name'];
	$user->last_name = $_REQUEST['last_name'];
	$user->nickname = $_REQUEST['nickname'];
	$user->userlevel_id = $_REQUEST['userlevel_id'];
	$user->username = $_REQUEST['username'];
	$user->password = $_REQUEST['password'];
if ($user->save()){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>
