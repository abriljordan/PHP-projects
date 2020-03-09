<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$id = intval($_REQUEST['id']);
$roomtype = $_REQUEST['roomtype'];
$rate_id = $_REQUEST['rate_id'];
$capacity = $_REQUEST['capacity'];
$description = $_REQUEST['description'];
$sql = "UPDATE roomtype SET roomtype='$roomtype',rate_id='$rate_id',capacity='$capacity', description='$description' WHERE id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>
