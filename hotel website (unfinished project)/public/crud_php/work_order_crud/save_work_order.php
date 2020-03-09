<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$description = $_POST['description'];
$category_id = $_POST['category_id'];
$room_id = $_POST['room_id'];
$priority_id = $_POST['priority_id'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$user_id = $_POST['user_id'];
$status_id = $_POST['status_id'];

$sql = "INSERT INTO housekeeping(user_id,description,category_id,room_id,priority_id ,start_date,end_date,status_id) ";
$sql .= "VALUES('$user_id','$description','$category_id','$room_id','$priority_id','$start_date','$end_date','$status_id')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>

