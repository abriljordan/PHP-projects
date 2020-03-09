<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$id = intval($_REQUEST['id']);
$card_type = $_REQUEST['card_type'];
$description = $_REQUEST['description'];
$sql = "UPDATE card_type SET card_type='$card_type',description='$description' WHERE id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>
