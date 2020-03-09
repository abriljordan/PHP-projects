<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$guest_id = $_REQUEST['guest_id'];
$description = $_REQUEST['description'];
$amount = $_REQUEST['amount'];
$sql = "INSERT INTO tmp_transact_payments_tbl(guest_id,description,amount) VALUES('$guest_id','$description','$amount')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>

