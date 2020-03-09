<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$id = intval($_REQUEST['id']);
$guest_id = $_REQUEST['guest_id'];
$amount = $_REQUEST['amount'];
$description = $_REQUEST['description'];

$sql = "UPDATE tmp_transact_payments_tbl SET guest_id='$guest_id',amount='$amount',description='$description' WHERE id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>
