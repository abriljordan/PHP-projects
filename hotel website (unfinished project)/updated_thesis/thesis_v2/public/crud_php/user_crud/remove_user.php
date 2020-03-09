<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$id = intval($_REQUEST['id']);
$sql = "delete from users where id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>