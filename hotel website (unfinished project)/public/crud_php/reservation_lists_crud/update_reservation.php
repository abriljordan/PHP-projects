<?php require_once("../../../includes/initialize.php"); ?>
<?php //guest update
	$id = $_REQUEST['id'];
	$guest = Guest::find_by_id($id);
	$guest->first_name = $_REQUEST['first_name'];
	$guest->last_name = $_REQUEST['last_name'];
	$guest->email_address = $_REQUEST['email_address'];
	$guest->phone_number = $_REQUEST['phone_number'];
	$guest->address = $_REQUEST['address'];
		$user->save();
//update booking

$id = $_REQUEST['id'];
$booking = Booking::find_by_id($id);
$booking->room_id = $_REQUEST['room_id'];
$booking->guest_id = $_REQUEST['guest_id'];
$booking->user_id = $session->user_id; 
$booking->date_booking_made = strftime("%Y-%m-%d",time());
$booking->hotel_id = $_REQUEST['hotel_id'];
$booking->booking_status_id = $_REQUEST['booking_status_id'];
$booking->check_in_date = $_REQUEST['check_in_date'];
$booking->check_out_date = $_REQUEST['check_out_date'];
$booking->checked_in_date = $_REQUEST['checked_in_date'];
$booking->checked_out_date = $_REQUEST['checked_out_date'];

	$booking->save();
?>
