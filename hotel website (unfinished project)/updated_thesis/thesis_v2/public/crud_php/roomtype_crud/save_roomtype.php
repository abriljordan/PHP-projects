<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$roomtype = $_POST['roomtype'];
$rate_id = $_POST['rate_id'];
$capacity = $_POST['capacity'];
$description = $_POST['description'];
$sql = "INSERT INTO roomtype(roomtype,rate_id,capacity,description) ";
$sql .= "VALUES('$roomtype','$rate_id','$capacity','$description')";
$result = @mysql_query($sql);
	if($result){
		echo json_encode(array('success'=>true));
	}else{
		echo json_encode(array('msg'=>'Some errors occured.'));
	}
?>

