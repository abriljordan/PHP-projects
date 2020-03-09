<?php
require_once(LIB_PATH.DS.'database.php');
class RoomBooking extends DatabaseObject{
	protected static $table_name = "room_booking";
	protected static $db_fields = array('id','room_id','date_booking_from','date_booking_to');
	public $id;
	public $room_id;
	public $date_booking_from;
	public $date_booking_to;
	//not functioning properly
	public static function room_availability($sql){
		global $database;
		return $database->num_rows($database->query($sql));
	}
	
	/* how to use in index.php
	if (isset($_POST['submit'])) { 
		$arrival = $_POST['arrival'];
		$checkout = $_POST['checkout'];
	
	$sql  = "SELECT room_type.id, room_type.room_type, room.roomnum, room_booking.room_id, ";
	$sql .= "room_booking.date_booking_from, room_booking.date_booking_to ";
	$sql .=	"FROM room ";
	$sql .=	"JOIN room_type ON room_type.id = room.room_type_id ";
	$sql .=	"JOIN room_booking ON room.id = room_booking.id "; 
	$sql .=	"WHERE room_booking.date_booking_from BETWEEN {$arrival} AND {$checkout} - 1 ";
	$sql .=	"OR room_booking.date_booking_to - 1 BETWEEN {$arrival} AND {$checkout} ";
	$sql .=	"OR room_booking.date_booking_from < {$arrival} AND room_booking.date_booking_to - 1 > {$checkout} - 1 ";
		
		if($database->booking_availability($sql) > 0){
			echo '<b>Not Available</b>';
			}else{
				echo '<b>Available</b>';
			}
	}
	*/
}
?>