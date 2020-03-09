CREATE VIEW user AS 
SELECT employee.id, first_name, last_name, nickname, username, password, user_level.description
FROM user_level
JOIN employee ON employee.user_level_id = user_level.id

SELECT room_type.id, room_type, room_type.rate_id, rate.id, rate_description, rate
FROM room_type
JOIN rate ON rate.id = room_type.rate_id

CREATE VIEW rooms AS --->view_rooms
SELECT room.roomnum, room_type.room_type
FROM room_type
JOIN room ON room.room_type_id = room_type.id