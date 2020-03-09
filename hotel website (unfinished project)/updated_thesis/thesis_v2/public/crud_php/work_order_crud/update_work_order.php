<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$id = intval($_REQUEST['id']);
$user_id = $_REQUEST['user_id'];
$description = $_REQUEST['description'];
$category_id = $_REQUEST['category_id'];
$room_id = $_REQUEST['room_id'];
$priority_id = $_REQUEST['priority_id'];
$start_date = $_REQUEST['start_date'];
$end_date = $_REQUEST['end_date'];
$status_id = $_REQUEST['status_id'];

$sql = "UPDATE housekeeping SET user_id='$user_id',description='$description',category_id='$category_id',room_id='$room_id',priority_id='$priority_id',start_date='$start_date',end_date='$end_date',status_id='$status_id' WHERE id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>
