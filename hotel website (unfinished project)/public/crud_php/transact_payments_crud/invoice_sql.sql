create view balance_due as

select `guest`.`id` AS `id`,concat(`roomtype`.`roomtype`,convert(repeat(' ',2) using latin1),`room`.`room_number`) AS `Room`,

concat(`guest`.`first_name`,convert(repeat(' ',1) using latin1),`guest`.`last_name`) AS `Guestname`,
`booking`.`check_in_date` AS `Arrival`, `booking`.`check_out_date` AS `Departure`,`rate`.`rate` AS `Room_rate`,
(((`booking`.`check_out_date` - `booking`.`check_in_date`) + 1) * `rate`.`rate`) AS `Room_charge`,

	ifnull(sum(`tmp_transact_charges_tbl`.`amount`),'0') AS `Additional_charges`,
(((`booking`.`check_out_date` - `booking`.`check_in_date`) + 1) * `rate`.`rate`)+

	ifnull(sum(`tmp_transact_charges_tbl`.`amount`),'0') as "Amount_due",

	ifnull(sum(tmp_transact_payments_tbl.amount), '0') as "Payments",
((((`booking`.`check_out_date` - `booking`.`check_in_date`) + 1) * `rate`.`rate`) + 

	ifnull(sum(`tmp_transact_charges_tbl`.`amount`),'0')) - ifnull(sum(tmp_transact_payments_tbl.amount), '0') as "Balance_due"
	
from ((((((`booking` join `guest` on((`booking`.`guest_id` = `guest`.`id`))) 

left join `tmp_transact_charges_tbl` on((`guest`.`id` = `tmp_transact_charges_tbl`.`guest_id`))) 

left join `tmp_transact_payments_tbl` on((`guest`.`id` = `tmp_transact_payments_tbl`.`guest_id`))) 

join `room` on((`room`.`id` = `booking`.`room_id`))) 

join `roomtype` on((`roomtype`.`id` = `room`.`roomtype_id`))) 

join `rate` on((`rate`.`id` = `roomtype`.`rate_id`)))

group by `booking`.`check_out_date`,`booking`.`check_in_date`,`rate`.`rate`,`guest`.`first_name`,`roomtype`.`roomtype`,`room`.`room_number`,
`guest`.`id`,`booking`.`id` , tmp_transact_charges_tbl.guest_id, tmp_transact_payments_tbl.guest_id

order by `guest`.`id`;