--select * 
--from rooms
--join type_of_rooms on type_of_rooms.id = rooms.id

--select room_number, type_of_room from rooms, type_of_rooms
--where rooms.type_of_room_id = type_of_rooms.id

SELECT 
  bookings.room_id, 
  rooms.id, 
  rooms.type_of_room_id, 
  type_of_rooms.id
FROM 
  public.bookings, 
  public.type_of_rooms, 
  public.rooms
WHERE 
  bookings.room_id = rooms.id AND
  rooms.type_of_room_id = type_of_rooms.id;