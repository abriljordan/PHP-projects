<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$card_type = $_POST['card_type'];
$description = $_POST['description'];
$sql = "INSERT INTO card_type(card_type,description) VALUES('$card_type','$description')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>

