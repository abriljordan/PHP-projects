<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$id = intval($_REQUEST['id']);
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$nickname = $_REQUEST['nickname'];
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$sql = "UPDATE employee SET username='$username',password='$password',nickname='$nickname',first_name='$first_name',last_name='$last_name' WHERE id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>
