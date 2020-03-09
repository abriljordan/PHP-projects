<?php //require_once("../../../includes/initialize.php"); ?>

<?php require_once("../includes/initialize.php"); ?>
<?php 

$guest = new Guest();
$guest->first_name = "stephanie";
$guest->last_name = "canete";
$guest->email_address = "pixai@yahoo.com";
$guest->phone_number = 231;
$guest->address = "davao";
	$guest->save();

	$book = new Booking();
			$id = $database->insert_id();
		$book->room_id = 1;
		$book->guest_id = $id;
		$book->user_id = 1; 
		$book->date_booking_made = strftime("%Y-%m-%d",time());
		$book->hotel_id = 1;
		$book->booking_status_id = 1;
		$book->check_in_date = "2012-02-15";
		$book->check_out_date = "2012-02-16";
		$book->checked_in_date = "2012-02-15";
		$book->checked_out_date = "2012-02-15";
			$book->save();
	
			

?>

