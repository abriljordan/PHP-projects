<?php require_once("../includes/initialize.php"); ?>

<?php
/*
if(isset($_POST['submit'])){
			//$checkindatepicker = '2012-01-01';
			//$checkoutdatepicker = '2012-01-07';
			$checkindatepicker = $_POST['checkindatepicker'];
			$checkoutdatepicker = $_POST['checkoutdatepicker'];
			$room = $_POST['room'];
*/
			$room = 'standard';
			$sql  = "SELECT room_type.id, room_type.room_type, room.roomnum, room_booking.room_id, ";
			$sql .= "room_booking.date_booking_from, room_booking.date_booking_to ";
			$sql .=	"FROM room ";
			$sql .=	"JOIN room_type ON room_type.id = room.room_type_id ";
			$sql .=	"JOIN room_booking ON room.id = room_booking.id "; 
			$sql .=	"WHERE room_booking.date_booking_from BETWEEN '{$checkindatepicker}' AND '{$checkoutdatepicker}' - 1 ";
			$sql .= "AND room_type = '{$room}'";
			$sql .=	"OR room_booking.date_booking_to - 1 BETWEEN '{$checkindatepicker}' AND '{$checkoutdatepicker}' ";
			$sql .= "AND room_type = '{$room}'";
			$sql .=	"OR room_booking.date_booking_from < '{$checkindatepicker}' AND room_booking.date_booking_to - 1 > '{$checkoutdatepicker}' - 1 ";
			$sql .= "AND room_type = '{$room}'";					
			/*  if(RoomBooking::room_availability($sql) > 0){
					echo '<b>Not Available</b>';
				}else{echo '<b>Available</b>';
					//call function that displays Proceed->info gathering}*/
				if($database->room_availability($sql) > 0){
					echo '<b>Not Available</b>';
					}else{
					echo '<b>Available</b>';
					//call function that displays Proceed->info gathering
				}
	}
	
	?>