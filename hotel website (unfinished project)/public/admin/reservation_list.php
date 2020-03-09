<?php require_once('../../includes/initialize.php');
if(!$session->is_logged_in()) {
  redirect_to("login.php");}
?>
<html>
<head>
<title>Admin Panel - Jampason Resort</title>
	<?php $id=$session->user_id; 
	 $sql= "select * from users where id=$id";
	 $users = Users::find_by_sql($sql);
	?>
	<?php foreach($users as $user);?>
	<p>Welcome <?php echo $user->full_name();?></p>	
	
<link type="text/css" href="../javascripts/jquery-ui-1.8/themes/base/jquery.ui.all.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../javascripts/jquery-easyui-1.2.5/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../javascripts/jquery-easyui-1.2.5/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../javascripts/jquery-easyui-1.2.5/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../javascripts/jquery-easyui-1.2.5/demo/demo.css">		
	<script type="text/javascript" src="../javascripts/jquery-easyui-1.2.5/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="../javascripts/jquery-easyui-1.2.5/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="../javascripts/jquery.history.js"></script>
	<script type="text/javascript" src="../javascripts/jquery-getpage_content.js"></script>
	<script type="text/javascript" src="../javascripts/jquery-ui-1.8/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="../javascripts/jquery-ui-1.8/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="../javascripts/jquery-ui-1.8/ui/jquery.ui.datepicker.js"></script>
    
    <link href="../stylesheets/jquery-CRUD.css" media="all" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
		$(document).ready(function() {
			var pickerOpts = {
			minDate: new Date(),
			changeMonth: true,
			changeYear: true,
			dateFormat: $.datepicker.ATOM
			};
			$("#check_in_date").datepicker(pickerOpts);
			$("#check_out_date").datepicker(pickerOpts);
			$("#expiration_date").datepicker(pickerOpts);
			
			$("#checked_in_date").datepicker(pickerOpts);
			$("#checked_out_date").datepicker(pickerOpts);
			
			//payment methods
			 $("input[name$='group_name']").click(function(){
									  var radio_value = $(this).val();
									  if(radio_value=='cc') {
										$("#cc_box").show("slow");
										 $("#cash_box").hide();
									  }
									  else if(radio_value=='cash') {
									   $("#cash_box").show("slow");
										$("#cc_box").hide();
									   }
									  });
									  $("#cc_box").hide();
									  $("#cash_box").hide();
		});
		//CRUD Methods
		var url;
		function newReservation(){
			$('#dlg').dialog('open').dialog('setTitle','New Reservation');
			$('#fm').form('clear');
			url = '../crud_php/reservation_lists_crud/save_reservation.php';
		}
		
		function editReservation(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Reservation');
				$('#fm').form('load',row);
				url = '../crud_php/reservation_lists_crud/update_reservation.php?id='+row.id;
			}		}
		function saveReservation(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					$('#dlg').dialog('close');		// close the dialog
					if (result.success){
						$('#dg').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
		}
		function removeReservation(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to remove this reservation?',function(r){
					if (r){
						$.post('../crud_php/reservation_lists_crud/remove_reservation.php',{id:row.id},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.msg
								});
							}
						},'json');
					}
				});
			}
		}
	</script>	
</head>
<body>
	<h2>Admin Panel </h2>
	<a href="logout.php">Logout</a>
	<div class="easyui-layout" style="width:1000px;height:900px;">
		<div region="north" style="overflow:hidden;height:60px;padding:10px">
		</div>
		<div region="south" style="height:50px;background:#fafafa;">
		</div>

		<!-- sidebar left -->
		<div region="west" title="Navigation Bar" style="width:200px;">
			<!--Navigation buttons-->
			<div style="padding:5px; background:#fafafa; width:150px;">
<li><?php echo SmartUrl::buildLink('http://localhost/thesis_v2/public/admin','index.php', 'Quick Overview');?></li>
			</div>
			<div style="padding:5px; background:#fafafa; width:150px;">
<li><?php echo SmartUrl::buildLink('http://localhost/thesis_v2/public/admin','room_availability.php', 'Availability');?></li>
			</div>
			<div style="padding:5px; background:#fafafa; width:150px;">
<li><?php echo SmartUrl::buildLink('http://localhost/thesis_v2/public/admin','reservation_list.php', 'Reservations');?></li>
			</div>
			<div style="padding:5px; background:#fafafa; width:150px;">
<li><?php echo SmartUrl::buildLink('http://localhost/thesis_v2/public/admin','payments_charges.php', 'Payments/Charges');?></li>
			</div>
			<div style="padding:5px; background:#fafafa; width:150px;">
<li><?php echo SmartUrl::buildLink('http://localhost/thesis_v2/public/admin','invoice.php', 'Invoice');?></li>
			</div>
			<div style="padding:5px; background:#fafafa; width:150px;">
<li><?php echo SmartUrl::buildLink('http://localhost/thesis_v2/public/admin','housekeeping.php', 'Housekeeping');?></li>
			</div>
			<div style="padding:5px; background:#fafafa; width:150px;">
<li><?php echo SmartUrl::buildLink('http://localhost/thesis_v2/public/admin','reports.php', 'Reports');?></li>
			</div>
			<div style="padding:5px; background:#fafafa; width:150px;">
<li><?php echo SmartUrl::buildLink('http://localhost/thesis_v2/public/admin','photomanager.php', 'Photo Manager');?></li>
			</div>
			<div style="padding:5px; background:#fafafa; width:150px;">
<li><?php echo SmartUrl::buildLink('http://localhost/thesis_v2/public/admin','usermanagement.php', 'User Management');?></li>
			</div>
			<div style="padding:5px; background:#fafafa; width:150px;">
<li><?php echo SmartUrl::buildLink('http://localhost/thesis_v2/public/admin','settings.php', 'Settings');?></li>
			</div>
		</div>
		<div region="center" title="Main Title" style="background:#fafafa;overflow:hidden">
		<div id="body">
			<div id="content">
				<!-- Ajax Content -->
	<table width="600" height="300" class="easyui-datagrid" id="dg" style="width:700px; height:400px" 
title="Reservation Lists" url="../crud_php/reservation_lists_crud/get_reservation.php" toolbar="#toolbar" rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th width="50" nowrap field="arrival">Arrival</th>
				<th width="50" nowrap field="dept">Dept</th>
				<th width="70" nowrap field="guestname">Guest Name</th>
				<th width="50" nowrap field="room_number">Room</th>
				<th width="50" nowrap field="roomtype">Room Type</th>
				<th width="50" nowrap field="user">User</th>
				<th width="50" nowrap field="bookingstatus">Status</th>
				</tr>
		</thead>
	</table>
	<div id="toolbar">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onClick="newReservation()">New Reservation</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onClick="editReservation()">Edit Reservation</a>
	</div>
	<div id="dlg" class="easyui-dialog" style="width:600px; height:550px; padding:10px 20px" closed="true" buttons="#dlg-buttons">
							<?php $sql = "select * from hotel where id=1 limit 1";
								$hotels=Hotel::find_by_sql($sql);
								foreach($hotels as $hotel);?>
		<div class="ftitle"><?php echo $hotel->name;?>&nbsp;Reservation</div>
		<form id="fm" method="post">
		<fieldset>
					<legend>Guest Info</legend>
					<div class="fitem">
						<label>First Name:</label>
						<input type="text" name="first_name" autocomplete="off" required></input>
					</div>
					<div class="fitem">
						<label>Last Name:</label>
						<input type="text" name="last_name" autocomplete="off" required></input>
					</div>
					<div class="fitem">
						<label>Email:</label>
						<input type="email"  name="email_address" autocomplete="off" placeholder="user@example.com" required></input>
					</div>
					<div class="fitem">
						<label>Phone #</label>
						<input name="phone_number" autocomplete="off" required></input>
					</div>
					<div class="fitem">
						<label>Address</label>
						<input name="address" autocomplete="off" required></input>
					</div>
			</fieldset>		

		<fieldset>
					<legend>Stay Info</legend>
						<div class="fitem">
						<?php $rooms= View_Room_RoomType::find_all(); ?>
						<label>Room Numbers: </label>
							<select name="room_id">
								<?php foreach($rooms as $room): ?>
										<option value="<?php echo $room->room_id?>"><?php echo $room->room; ?></option>
								<?php endforeach?>
							</select>
						</div>			
					<div class="fitem">
						<label>Check in: </label>
						 <input type="text" name="check_in_date" id="check_in_date" required><br/>
					</div>
					<div class="fitem">
						<label>Check out:</label>
						<input type="text" name="check_out_date" id="check_out_date" required><br/>
					</div>
					<div class="fitem">
						<?php $statuses= BookingStatus::find_all(); ?>
						<label>Status: </label>
							<select name="booking_status_id">
								<?php foreach($statuses as $status): ?>
										<option value="<?php echo $status->id?>"><?php echo $status->status; ?></option>
								<?php endforeach?>
							</select>
					</div>		
			</fieldset>
			
			<fieldset>
					<legend>In/Out</legend>
							<div class="fitem">
						<label>Check in: </label>
						<input name="checked_in_date" id="checked_in_date" ><br/>
					</div>
					<div class="fitem">
						<label>Check out:</label>
						<input name="checked_out_date" id="checked_out_date" ><br/>
					</div>					
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveReservation()">Save</a>
<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	<!-- end of content -->
			</div>
		</div>
		</div>
	</div>
</body>
</html>