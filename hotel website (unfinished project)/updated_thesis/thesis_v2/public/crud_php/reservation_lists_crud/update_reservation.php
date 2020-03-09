<?php require_once("../../../includes/initialize.php"); ?>
<?php 
	//guest update
	$id = intval($_REQUEST['id']);
	$first_name = $_REQUEST['first_name'];
	$last_name = $_REQUEST['last_name'];
	$email_address = $_REQUEST['email_address'];
	$phone_number = $_REQUEST['phone_number'];
	$address = $_REQUEST['address'];
	$sql = "UPDATE users SET username='$username',password='$password',nickname='$nickname',first_name='$first_name',last_name='$last_name',user_level_id='$user_level_id' WHERE id=$id";
	$result = @mysql_query($sql);

//update booking
$room_id = $_POST['room_id'];
$guest_id = $_POST['guest_id'];
$user_id = $_POST['user_id'];
$user_id = $session->user_id; 

$date_booking_made = strftime("%Y-%m-%d",time());
$hotel_id = $_POST['hotel_id'];
$booking_status_id = $_POST['booking_status_id'];
$check_in_date = $_POST['check_in_date'];
$check_out_date = $_POST['check_out_date'];
$checked_in_date = $_POST['checked_in_date'];
$checked_out_date = $_POST['checked_out_date'];

$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>
