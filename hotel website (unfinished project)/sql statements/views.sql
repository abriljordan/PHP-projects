CREATE VIEW view_users AS
SELECT first_name, last_name, nickname, username, password, userlevel.description
FROM users
JOIN userlevel ON users.userlevel_id = userlevel.id

CREATE VIEW  view_roomtype AS
SELECT  roomtype.roomtype, roomtype.description AS roomtype_description, roomtype.capacity AS roomtype_capacity,  rate.rate, rate.description AS rate_description
FROM roomtype
JOIN rate ON roomtype.rate_id = rate.id;

RESERVATION LIST
create view view_reservationlists as
SELECT booking.check_in_date AS arrival ,booking.check_out_date AS dept,
  CONCAT(guest.first_name, SPACE(1),guest.last_name) AS guestname, room.room_number, roomtype.roomtype, 
  userlevel.description as user , booking_status.status as bookingstatus
FROM booking
JOIN room ON room.id = booking.room_id 
JOIN roomtype ON roomtype.id = room.roomtype_id 
JOIN booking_status ON booking.booking_status_id = booking_status.id 
JOIN guest ON guest.id = booking.guest_id 
JOIN users ON booking.user_id = users.id 
JOIN userlevel ON  users.userlevel_id = userlevel.id;
ORIGIN--->
SELECT 
  booking.id, 
  room.id, 
  room.roomtype_id, 
  roomtype.id, 
  booking.roombooking_status_id, 
  booking_status.id, 
  booking.check_in_date, 
  booking.check_out_date, 
  booking.guest_id, 
  guest.id, 
  users.id, 
  booking.user_id, 
  users.userlevel_id, 
  userlevel.id, 
  roomtype.roomtype, 
  room.room_number, 
  guest.first_name, 
  guest.last_name, 
  userlevel.description, 
  booking_status.status, 
  booking.room_id
FROM 
  public.booking, 
  public.room, 
  public.roomtype, 
  public.booking_status, 
  public.guest, 
  public.users, 
  public.userlevel
WHERE 
  booking.roombooking_status_id = booking_status.id AND
  booking.user_id = users.id AND
  room.room_number = booking.room_id AND
  roomtype.id = room.roomtype_id AND
  guest.id = booking.guest_id AND
  users.userlevel_id = userlevel.id;
