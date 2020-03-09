<?php require_once('../../includes/initialize.php');
if(!$session->is_logged_in()) {
  redirect_to("login.php");}
?>
<html>
<head>
<title>Admin Panel - Jampason Resort</title>
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
			$("#checkin").datepicker(pickerOpts);
			$("#checkout").datepicker(pickerOpts);
			$("#expiration_date").datepicker(pickerOpts);
			
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
			url = '../crud_php/user_crud/save_user.php';
		}
		
		function editReservation(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Reservation');
				$('#fm').form('load',row);
				url = '../crud_php/user_crud/update_user.php?id='+row.id;
			}
		}
		function saveReservation(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg').dialog('close');		// close the dialog
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
		function removeUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to remove this reservation?',function(r){
					if (r){
						$.post('../crud_php/user_crud/remove_user.php',{id:row.id},function(result){
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
	<h2>Admin Panel</h2>
	<a href="logout.php">Logout</a>
	<div class="easyui-layout" style="width:1000px;height:900px;">
		<div region="north" style="overflow:hidden;height:60px;padding:10px">
			<h2>Layout in Panel</h2>
		</div>
		<div region="south" style="height:50px;background:#fafafa;">
		</div>
		<div region="east" title="East" style="width:200px;">
		</div>
		<!-- sidebar left -->
		<div region="west" title="Navigation Bar" style="width:200px;">
			<!--Navigation buttons-->
			<div style="padding:5px; background:#fafafa; width:150px;">
<li><?php echo SmartUrl::buildLink('http://localhost/thesis_v2/public/admin','quickoverview.php', 'Quick Overview');?></li>
			</div>
			<div style="padding:5px; background:#fafafa; width:150px;">
<li><?php echo SmartUrl::buildLink('http://localhost/thesis_v2/public/admin','add_guests.php', 'Add Guests');?></li>
			</div>
			<div style="padding:5px; background:#fafafa; width:150px;">
<li><?php echo SmartUrl::buildLink('http://localhost/thesis_v2/public/admin','reservation_list.php', 'Reservations');?></li>
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
title="Reservation Lists" url="../crud_php/reservation_lists_crud/get_reservations.php" toolbar="#toolbar" rownumbers="true" fitColumns="true" singleSelect="true">
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
<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onClick="removeReservation()">Remove Reservation</a>
	</div>
	<div id="dlg" class="easyui-dialog" style="width:600px; height:550px; padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">New Reservation</div>
		<form id="fm" method="post">
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
						<input name="checkin" id="checkin" ><br/>
					</div>
					<div class="fitem">
						<label>Check out:</label>
						<input name="checkout" id="checkout" ><br/>
					</div>
			</fieldset>
			<fieldset>
					<legend>Guest Info</legend>
					<div class="fitem">
						<label>First Name:</label>
						<input name="first_name"  required></input>
					</div>
					<div class="fitem">
						<label>Last Name:</label>
						<input name="last_name" required></input>
					</div>
					<div class="fitem">
						<label>Email:</label>
						<input name="email_address"  required></input>
					</div>
					<div class="fitem">
						<label>Phone #</label>
						<input name="phone_number"  required></input>
					</div>
					<div class="fitem">
						<label>Address</label>
						<input name="address"  required></input>
					</div>
			</fieldset>
			<fieldset>
					<legend>Billing Info</legend>
					<div class="fitem">
							
							<label>Payment Method:</label>
								<input type="radio" name="group_name" value="cc" id="group_name_0"/>Credit Card
								<input type="radio" name="group_name" value="cash" id="group_name_1"/>Cash
								<div id="cc_box" style="width: 350px; background: white; color: black; border: 1px solid; padding: 5px;">
										<?php $cardtypes = CardType::find_all(); ?>
										<label>Credit Card: </label>
										<select name = "card_type_id">
											<?php foreach($cardtypes as $cardtype):?>
											<option value="<?php echo $cardtype->id?>"><?php echo $cardtype->card_type?></option>
											<?php endforeach;?>
									</select>
									<div class="fitem">
									<label>Expiration Date:</label>
									<input name="expiration_date" id="expiration_date"  required></input>
									</div>
									<div class="fitem">
									<label>Card Number:</label>
									<input name="card_number"  required></input>
									</div>
									<div class="fitem">
									<label>Security Code:</label>
									<input name="security_code" required></input>
									</div>
									<div class="fitem">
									<label>Name on Card:</label>
									<input name="name_on_card"  required></input>
									</div>
									
								</div>
								<div id="cash_box" style="width: 200px; background: white; color: black; border: 1px solid; padding: 5px;">
									<div class="fitem">
									<label>Amount:</label>
									<input name="amount" required</input>
									</div>
							</div>	
						</div>
					
			
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()">Save</a>
<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	<!-- end of content -->
			</div>
		</div>
		</div>
	</div>
</body>
</html>