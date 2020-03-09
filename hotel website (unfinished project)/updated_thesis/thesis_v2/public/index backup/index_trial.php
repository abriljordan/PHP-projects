<?php require_once("../includes/initialize.php"); ?>
<?php require_once("/layouts/forms.php");?>
<?php 
		if(isset($_POST['submit'])){
			$checkindatepicker = $_POST['checkindatepicker'];
			$checkoutdatepicker = $_POST['checkoutdatepicker'];
			$room = $_POST['room'];
			$sql  = "SELECT room_type.id, room_type.room_type, room.roomnum, room_booking.room_id,";
			$sql .= "room_booking.date_booking_from, room_booking.date_booking_to ";
			$sql .=	"FROM room ";
			$sql .=	"JOIN room_type ON room_type.id = room.room_type_id ";
			$sql .=	"JOIN room_booking ON room.id = room_booking.id "; 
			$sql .=	"WHERE room_booking.date_booking_from BETWEEN '{$checkindatepicker}' AND '{$checkoutdatepicker}' - 1 ";
			$sql .= "AND room_type = '{$room}' ";
			$sql .=	"OR room_booking.date_booking_to - 1 BETWEEN '{$checkindatepicker}' AND '{$checkoutdatepicker}' ";
			$sql .= "AND room_type = '{$room}' ";
			$sql .=	"OR room_booking.date_booking_from < '{$checkindatepicker}' AND room_booking.date_booking_to - 1 > '{$checkoutdatepicker}' - 1 ";
			$sql .= "AND room_type = '{$room}'";					
				if($database->room_availability($sql) > 0){
					echo '<b>Not Available</b>';
					}else{
					echo '<b>Available</b>';
					//call function that displays Proceed->info gathering
				}
	}else{
			$checkindatepicker = "";
			$checkoutdatepicker = "";
			$room = "";
	}
		/*
		$_SESSION['checkindatepicker'] = $checkindatepicker;
		$_SESSION['checkoutdatepicker'] = $checkoutdatepicker;
.		$_SESSION['room'] = $room;
		*/
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Jampason Resort</title>
	<link href="stylesheets/thrColLiqHdr.css" rel="stylesheet" type="text/css">
	<link type="text/css" href="javascripts/jquery-ui-1.8/themes/base/jquery.ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="javascripts/jquery-ui-1.8/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="javascripts/jquery-ui-1.8/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="javascripts/jquery-ui-1.8/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="javascripts/jquery-ui-1.8/ui/jquery.ui.datepicker.js"></script>
    <script type="text/javascript" src="javascripts/jquery.ad-gallery.js"></script>
	<script type="text/javascript">
	<!--boundary -->
	$(function() {
		var pickerOpts = {
		minDate: new Date(),
		maxDate: "+10",
		changeMonth: true,
		changeYear: true,
		dateFormat: $.datepicker.ATOM
		};
		$("#checkindatepicker").datepicker(pickerOpts);		
		$("#checkoutdatepicker").datepicker(pickerOpts);
	});
	</script>
</head>
<body>
	<!--<form method="post" name="form1" id="form1" action="index_trial.php">-->
	<form method="post" id="form1" name="form1" action="index_trial.php" >
	<h2>Reservation</h2><br/>    
	<label for = "checkindatepicker">Check in date:</label> 
	<input type="text" autocomplete="off" name="checkindatepicker" id="checkindatepicker" value="<?php echo htmlentities($checkindatepicker); ?>" class="easyui-validatebox" required/> <br/>
	<label for = "checkoutdatepicker">Check out date:</label>
	<input type="text" autocomplete="off" name="checkoutdatepicker" id="checkoutdatepicker" value="<?php echo htmlentities($checkoutdatepicker); ?>" class="easyui-validatebox" required/><br/>
	<?php $rooms = RoomType::find_all(); ?>
	<label for="room">Type of Room: </label>
	  <select name="room">
		<!--use $_SESSION variable -->
		<option value="<?php echo htmlentities($room); ?>" selected="selected">--Select One--</option>
	    <?php foreach($rooms as $room):?>
	    <option value="<?php echo $room->room_type; ?>"><?php echo $room->room_type; ?></option>
	    <?php endforeach;?>
	  </select>
	<br/>
	<input type="submit" id="button1" name="submit" value="Submit" />	
	<br/>
	<?php echo $today = date('y-m-j'); 
	?>
	</form>	
</body>
</html>
