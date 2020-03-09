<?php require_once("../../../includes/initialize.php"); ?>
<?php 
//save guest_info, get last inserted id, perform insert into booking tbl

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_address = $_POST['email_address'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
$sql = "INSERT INTO guest(first_name,last_name,email_address,phone_number,address) VALUES('$first_name','$last_name','$email_address','$phone_number','$address')";
	$result = @mysql_query($sql);
	$id = mysql_insert_id(); //guest id to be inserted in booking tbl
	
//booking
$room_id = $_POST['room_id'];
$guest_id = $_POST['guest_id'];
$user_id = $session->user_id; 
$date_booking_made = strftime("%Y-%m-%d",time());
$hotel_id = 1;
$booking_status_id = $_POST['booking_status_id'];
$check_in_date = $_POST['check_in_date'];
$check_out_date = $_POST['check_out_date'];
$checked_in_date = $_POST['checked_in_date'];
$checked_out_date = $_POST['checked_out_date'];
$sql = "INSERT INTO booking(room_id,guest_id,user_id,date_booking_made,hotel_id,booking_status_id,check_in_date,check_out_date,checked_in_date,checked_out_date ) VALUES('$room_id','$id','$user_id','$date_booking_made','$hotel_id','$booking_status_id','$check_in_date','$check_out_date','$checked_in_date','$checked_out_date')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>

