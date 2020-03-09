<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$id = intval($_REQUEST['id']);
$rate = $_REQUEST['rate'];
$description = $_REQUEST['description'];
$sql = "UPDATE rate SET rate='$rate',description='$description' WHERE id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>
