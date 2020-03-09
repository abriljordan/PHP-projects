<?php require_once("../includes/initialize.php"); ?>
<?php
	$id = $_POST['roomtype_id'];
	//	$query  = "select * from ajax_categories where pid = ".$id;
	//$sql  = "SELECT * FROM  room WHERE roomtype_id = '{$id}' ";
	$sql = "SELECT room.id , room.room_number,room.roomtype_id , roomtype.roomtype, roomtype.id ";
	$sql .= "FROM room JOIN roomtype ON roomtype.id = room.roomtype_id WHERE  roomtype.id = '{$id}' AND room.roomtype_id = '{$id}'";	
	$result = mysql_query($sql);
?>
		<?php if(mysql_num_rows($result)>0) ?>

		<select name="room_id" class="parent">

		<?php $rooms = Room::find_all(); ?>

			<?php foreach($rooms as $room):?>
			
				<option value="<?php echo $room->id;?>"><?php echo $room->room_number;?></option>
			
			<?php endforeach;?>
		
		</select>	
		
	
	
	
	


