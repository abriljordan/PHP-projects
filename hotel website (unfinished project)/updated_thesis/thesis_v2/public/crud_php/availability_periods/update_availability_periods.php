<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$id = intval($_REQUEST['id']);
$guest_id = $_REQUEST['guest_id'];
$description = $_REQUEST['description'];
$amount = $_REQUEST['amount'];

$sql = "UPDATE employee SET username='$username',password='$password',nickname='$nickname',first_name='$first_name',last_name='$last_name',user_level_id='$user_level_id' WHERE id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>
