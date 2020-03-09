<?php require_once("../../../includes/initialize.php"); ?>
<?php 
	$user = new Users();
	$user->first_name = $_POST['first_name'];
	$user->last_name = $_POST['last_name'];
	$user->nickname = $_POST['nickname'];
	$user->userlevel_id = $_POST['userlevel_id'];
	$user->username = $_POST['username'];
	$user->password = $_POST['password'];
			if($user->save()){
				echo json_encode(array('success'=>true));
			} else {
				echo json_encode(array('msg'=>'Some errors occured.'));
			}
?>

