<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$guest = new Guest();
$guest->first_name = $_POST['first_name'];
$guest->last_name = $_POST['last_name'];
$guest->email_address = $_POST['email_address'];
$guest->phone_number = $_POST['phone_number'];
$guest->address = $_POST['address'];
	$guest->save();

	$book = new Booking();
		$id = $database->insert_id();	
		$book->room_id = $_POST['room_id'];
		$book->guest_id = $id;
		$book->user_id = $session->user_id; 
		$book->date_booking_made = strftime("%Y-%m-%d",time());
		$book->hotel_id = 1;
		$book->booking_status_id = $_POST['booking_status_id'];
		$book->check_in_date = $_POST['check_in_date'];
		$book->check_out_date = $_POST['check_out_date'];
		$book->checked_in_date = $_POST['checked_in_date'];
		$book->checked_out_date = $_POST['checked_out_date'];
			
			if($book->save()){
				echo json_encode(array('success'=>true));
			} else {
				echo json_encode(array('msg'=>'Some errors occured.'));
			}
?>

