<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$rate = $_POST['rate'];
$description = $_POST['description'];
$sql = "INSERT INTO rate(rate,description) VALUES('$rate','$description')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>

