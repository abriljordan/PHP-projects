CREATE VIEW `tifen`.`charges` AS 
select `booking`.`id` AS `id`,concat(`roomtype`.`roomtype`,convert(repeat(' ',2) using latin1),`room`.`room_number`) AS `Room`,
concat(`guest`.`first_name`,convert(repeat(' ',1) using latin1),`guest`.`last_name`) AS `Guestname`,
`booking`.`check_in_date` AS `Arrival`,`booking`.`check_out_date` AS `Departure`,`rate`.`rate` AS `Room rate`,

(((`booking`.`check_out_date` - `booking`.`check_in_date`) + 1) * `rate`.`rate`) AS `Room charge`, 

ifnull(sum(`tmp_transact_charges_tbl`.`amount`),'0') AS `Additional Charges` , 
(((`booking`.`check_out_date` - `booking`.`check_in_date`) + 1) * `rate`.`rate`) + ifnull(sum(`tmp_transact_charges_tbl`.`amount`),'0') AS "Amount Due",

ifnull(sum(tmp_transact_payments_tbl.amount), '0') AS "Payments",

(((((`booking`.`check_out_date` - `booking`.`check_in_date`) + 1) * `rate`.`rate`) + 
   sum(`tmp_transact_charges_tbl`.`amount`)) - sum(tmp_transact_payments_tbl.amount)) AS "Balance Due"

from (((((`booking` join `guest` on((`booking`.`guest_id` = `guest`.`id`))) 
left join `tmp_transact_charges_tbl` on((`guest`.`id` = `tmp_transact_charges_tbl`.`guest_id`))) 
left join tmp_transact_payments_tbl on guest.id = tmp_transact_payments_tbl.guest_id
join `room` on((`room`.`id` = `booking`.`room_id`))) 
join `roomtype` on((`roomtype`.`id` = `room`.`roomtype_id`))) 
join `rate` on((`rate`.`id` = `roomtype`.`rate_id`))) 
group by `booking`.`check_out_date`,`booking`.`check_in_date`,`rate`.`rate`,`guest`.`first_name`,`roomtype`.`roomtype`,
`room`.`room_number`,`guest`.`id`,`booking`.`id` order by `guest`.`id`;

CREATE VIEW payments AS 
 SELECT guest.id AS "Guest ID", CONCAT(room.room_number, SPACE(1), roomtype.roomtype) AS "Room", booking.check_in_date,
 booking.check_out_date, CONCAT(guest.first_name, SPACE(1),guest.last_name) AS "Guest", 
 ifnull(sum(tmp_transact_payments_tbl.amount),'0')AS "Amount Paid", ifnull((tmp_transact_payments_tbl.description),' ' )AS "Payment Description"
   FROM booking
   JOIN guest ON booking.guest_id = guest.id
   LEFT JOIN tmp_transact_payments_tbl ON guest.id = tmp_transact_payments_tbl.guest_id
   JOIN room ON room.id = booking.room_id
   JOIN roomtype ON roomtype.id = room.roomtype_id
   JOIN rate ON rate.id = roomtype.rate_id
  GROUP BY rate.rate, roomtype.roomtype, room.room_number, guest.first_name, guest.last_name, booking.check_out_date, booking.check_in_date, guest.id, tmp_transact_payments_tbl.description
  ORDER BY guest.id;
  
  select guest.id AS "Guest ID",charges."Amount Due",payments."Amount Paid" ,
  (charges."Amount Due"-payments."Amount Paid") AS "Balance Due" 
  from guest
  join guest on charges.guest_id = guest.id
  join payments on guest.id = payments.guest_id 