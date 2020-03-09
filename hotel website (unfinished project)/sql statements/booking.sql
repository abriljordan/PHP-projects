--ROOMS RESERVED
SELECT booking.room_id, booking.arrival, booking.checkout 
FROM booking
WHERE (((booking.arrival) BETWEEN [arrival date] AND [checkout date]-1))
OR ((([checkout]-1) BETWEEN [arrival date] AND [checkout date]))
OR (((booking.arrival) < [arrival date] AND ((checkout - 1 > [checkout date] - 1));

--ROOMS AVAILABLE
SELECT rooms.roomnum 
FROM rooms LEFT JOIN rooms_reserved ON rooms.roomnum = rooms_reserved.room
WHERE (((rooms_reserved.room) is null ));

CREATE VIEW rooms_available AS
SELECT room.roomnum , room.id
FROM room LEFT JOIN rooms_reserved ON room.roomnum = rooms_reserved.room_id
WHERE (((rooms_reserved.room_id) is null ));

SELECT booking.room_id, booking.arrival, booking.checkout 
FROM booking
WHERE (((booking.arrival) BETWEEN '2012-01-18' AND '2012-01-20-1'))
OR (((checkout-1) BETWEEN '2012-01-18' AND '2012-01-20'))
OR (((booking.arrival) < '2012-01-18' AND ((checkout - 1 > '2012-01-20' - 1))
	
	$start = $_POST['$arrival'];
	$end = $_POST['departure'];
		$sql . = "SELECT booking.room_id, booking.arrival, booking.checkout "; 
		$sql . = " FROM booking ";
		$sql . = " WHERE booking.arrival BETWEEN '$start' AND '$end' - 1 ";
		$sql . = " OR checkout-1 BETWEEN '$start' AND '$end' ";
		$sql . = " OR booking.arrival < '$start' AND checkout - 1 > '$end' - 1 ";
	$booking  = Booking::find_by_sql($sql);
	public static function rooms_reserved($arrival="", $checkout=""){
		global $database;
		$sql . = "SELECT booking.room_id, booking.arrival, booking.checkout "; 
		$sql . = "FROM booking ";
		$sql . = "WHERE booking.arrival BETWEEN '{$arrival}' AND '{$checkout}' - 1 ";
		$sql . = "OR checkout-1 BETWEEN '{$arrival}' AND '{$checkout}' ";
		$sql . = "OR booking.arrival < '{$arrival}' AND checkout - 1 > '{$checkout}' - 1 ";
		$result_array = self::find_by_sql($sql);
			return !empty($result_array) ? array_shift($result_array) : false;
	}
	public static function rooms_available(){
	
	}
SELECT booking.room_id, booking.arrival, booking.checkout 
FROM booking
WHERE booking.arrival BETWEEN '2012-01-18' AND '2012-01-20' - 1
OR checkout-1 BETWEEN '2012-01-18' AND '2012-01-20'
OR booking.arrival < '2012-01-18' AND checkout - 1 > '2012-01-20' - 1