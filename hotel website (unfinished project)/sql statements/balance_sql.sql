  SELECT CONCAT(roomtype.roomtype,SPACE(1),room.room_number) AS "Room", 
	CONCAT(guest.first_name,SPACE(1),guest.last_name) AS "Guestname", 
 booking.check_in_date, booking.check_out_date, 
 
 
 (booking.check_out_date - booking.check_in_date) + 1)* rate.rate + sum(tmp_transact_charges_tbl.amount) AS "Amount Due",
 sum(tmp_transact_payments_tbl.amount) AS "Amount Paid", 
 
 
 ((booking.check_out_date - booking.check_in_date) + 1) * rate.rate + sum(tmp_transact_charges_tbl.amount)) 
	- sum(tmp_transact_payments_tbl.amount) AS "Balance Due"
	
   FROM booking
   JOIN guest ON booking.guest_id = guest.id
   JOIN room ON room.id = booking.room_id
   JOIN roomtype ON roomtype.id = room.roomtype_id
   JOIN rate ON rate.id = roomtype.rate_id
   LEFT JOIN tmp_transact_charges_tbl ON guest.id = tmp_transact_charges_tbl.guest_id
   LEFT JOIN tmp_transact_payments_tbl ON guest.id = tmp_transact_payments_tbl.guest_id
  GROUP BY rate.rate, roomtype.roomtype, room.room_number, guest.first_name, guest.last_name, booking.check_out_date, booking.check_in_date
