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
<link rel="stylesheet" type="text/css" href="../javascripts/jquery-easyui-1.2.5/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../javascripts/jquery-easyui-1.2.5/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../javascripts/jquery-easyui-1.2.5/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../javascripts/jquery-easyui-1.2.5/demo/demo.css">		
	<script type="text/javascript" src="../javascripts/jquery-easyui-1.2.5/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="../javascripts/jquery-easyui-1.2.5/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="../javascripts/jquery.history.js"></script>
	<script type="text/javascript" src="../javascripts/jquery-getpage_content.js"></script>
    <script type="text/javascript" src="javascripts/jquery-ui-1.8/ui/jquery.ui.tabs.js"></script>
    <link href="../stylesheets/jquery-CRUD.css" media="all" rel="stylesheet" type="text/css" />
		<script type="text/javascript">	
		<!--ROOM TYPE FUNCTIONS-->
		var url;
		function addRoomType(){
			$('#dlg').dialog('open').dialog('setTitle','New Room Type');
			$('#fm').form('clear');
			url = '../crud_php/roomtype_crud/save_roomtype.php';
		}		
		function editRoomType(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Room Type');
				$('#fm').form('load',row);
				url = '../crud_php/roomtype_crud/update_roomtype.php?id='+row.id;
			}
		}
		function saveRoomType(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');},
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
		function removeRoomType(){
			var row = $('#dg').datagrid('getSelected');
			if (row){$.messager.confirm('Confirm','Are you sure you want to remove this room type?',function(r){
					if (r){	$.post('../crud_php/roomtype_crud/remove_roomtype.php',{id:row.id},function(result){
							if (result.success){$('#dg').datagrid('reload');	// reload the user data
							} else {$.messager.show({	// show error message
									title: 'Error',	msg: result.msg	
								});	
							}
						},'json');	
					}
				});
			}
		} <!--END OF Room Type FUNCTIONS -->
	<!--FACILITY FUNCTIONS-->
	var url;
		function addFacility(){
			$('#dlg2').dialog('open').dialog('setTitle','New Facility');
			$('#fm2').form('clear');
			url = '../crud_php/facility_crud/save_facility.php';
		}		
		function editFacility(){
			var row = $('#dg2').datagrid('getSelected');
			if (row){
				$('#dlg2').dialog('open').dialog('setTitle','Edit Facility');
				$('#fm2').form('load',row);
				url = '../crud_php/facility_crud/update_facility.php?id='+row.id;
			}
		}
		function saveFacility(){
			$('#fm2').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg2').dialog('close');		// close the dialog
						$('#dg2').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});						
						}
					}
				});
			}
		function removeFacility(){
			var row = $('#dg2').datagrid('getSelected');
			if (row){$.messager.confirm('Confirm','Are you sure you want to remove this facility?',function(r){
					if (r){	$.post('../crud_php/facility_crud/remove_facility.php',{id:row.id},function(result){
							if (result.success){$('#dg2').datagrid('reload');	// reload the user data
							} else {$.messager.show({	// show error message
									title: 'Error',	msg: result.msg	
								});	
							}
						},'json');	
					}
				});
			}
		} <!--END OF FACILITY FUNCTIONS -->
		
		<!--ROOM FUNCTIONS-->
	var url;
		function addRoom(){
			$('#dlg3').dialog('open').dialog('setTitle','New Room');
			$('#fm3').form('clear');
			url = '../crud_php/room_crud/save_room.php';
		}		
		function editRoom(){
			var row = $('#dg3').datagrid('getSelected');
			if (row){
				$('#dlg3').dialog('open').dialog('setTitle','Edit Room');
				$('#fm3').form('load',row);
				url = '../crud_php/room_crud/update_room.php?id='+row.id;
			}
		}
		function saveRoom(){
			$('#fm3').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg3').dialog('close');		// close the dialog
						$('#dg3').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});						
						}
					}
				});
			}
		function removeRoom(){
			var row = $('#dg3').datagrid('getSelected');
			if (row){$.messager.confirm('Confirm','Are you sure you want to remove this room?',function(r){
					if (r){	$.post('../crud_php/room_crud/remove_room.php',{id:row.id},function(result){
							if (result.success){$('#dg3').datagrid('reload');	// reload the user data
							} else {$.messager.show({	// show error message
									title: 'Error',	msg: result.msg	
								});	
							}
						},'json');	
					}
				});
			}
		} <!--END OF ROOM FUNCTIONS -->
		
		<!--PAYMENT METHOD FUNCTIONS-->
	var url;
		function addRoomTypeRates(){
			$('#dlg4').dialog('open').dialog('setTitle','New Room Type Rates');
			$('#fm4').form('clear');
			url = '../crud_php/room_type_rates_crud/save_room_type_rates.php';
		}		
		function editRoomTypeRates(){
			var row = $('#dg4').datagrid('getSelected');
			if (row){
				$('#dlg4').dialog('open').dialog('setTitle','Edit Room Type Rates');
				$('#fm4').form('load',row);
				url = '../crud_php/room_type_rates_crud/update_room_type_rates.php?id='+row.id;
			}
		}
		function saveRoomTypeRates(){
			$('#fm4').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg4').dialog('close');		// close the dialog
						$('#dg4').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});						
						}
					}
				});
			}
		function removeRoomTypeRates(){
			var row = $('#dg4').datagrid('getSelected');
			if (row){$.messager.confirm('Confirm','Are you sure you want to remove this room type rate?',function(r){
					if (r){	$.post('../crud_php/room_type_rates_crud/remove_room_type_rates.php',{id:row.id},function(result){
							if (result.success){$('#dg4').datagrid('reload');	// reload the user data
							} else {$.messager.show({	// show error message
									title: 'Error',	msg: result.msg	
								});	
							}
						},'json');	
					}
				});
			}
		} <!--END OF PAYMENT METHOD FUNCTIONS -->
		
<!--CARD TYPE FUNCTIONS-->
	var url;
		function addCardType(){
			$('#dlg5').dialog('open').dialog('setTitle','New Card Type');
			$('#fm5').form('clear');
			url = '../crud_php/card_type_crud/save_card_type.php';
		}		
		function editCardType(){
			var row = $('#dg5').datagrid('getSelected');
			if (row){
				$('#dlg5').dialog('open').dialog('setTitle','Edit Card Type');
				$('#fm5').form('load',row);
				url = '../crud_php/card_type_crud/update_card_type.php?id='+row.id;
			}
		}
		function saveCardType(){
			$('#fm5').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg5').dialog('close');		// close the dialog
						$('#dg5').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});						
						}
					}
				});
			}
		function removeCardType(){
			var row = $('#dg5').datagrid('getSelected');
			if (row){$.messager.confirm('Confirm','Are you sure you want to remove this card type?',function(r){
					if (r){	$.post('../crud_php/card_type_crud/remove_card_type.php',{id:row.id},function(result){
							if (result.success){$('#dg5').datagrid('reload');	// reload the user data
							} else {$.messager.show({	// show error message
									title: 'Error',	msg: result.msg	
								});	
							}
						},'json');	
					}
				});
			}
		} <!--END OF CARD TYPE FUNCTIONS -->
		
<!--ROOM FACILITIES FUNCTIONS-->
	var url;
		function addRoomFacilities(){
			$('#dlg6').dialog('open').dialog('setTitle','New Room Facilites');
			$('#fm6').form('clear');
			url = '../crud_php/roomtypefacilities_crud/save_roomtypefacilities.php';
		}		
		function editRoomFacilities(){
			var row = $('#dg6').datagrid('getSelected');
			if (row){
				$('#dlg6').dialog('open').dialog('setTitle','Edit Room Facilities');
				$('#fm6').form('load',row);
				url = '../crud_php/roomtypefacilities_crud/update_roomtypefacilities.php?id='+row.id;
			}
		}
		function saveRoomFacilities(){
			$('#fm6').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg6').dialog('close');		// close the dialog
						$('#dg6').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});						
						}
					}
				});
			}
		function removeRoomFacilities(){
			var row = $('#dg6').datagrid('getSelected');
			if (row){$.messager.confirm('Confirm','Are you sure you want to remove this room facility?',function(r){
					if (r){	$.post('../crud_php/roomtypefacilities_crud/remove_roomtypefacilities.php',{id:row.id},function(result){
							if (result.success){$('#dg6').datagrid('reload');	// reload the user data
							} else {$.messager.show({	// show error message
									title: 'Error',	msg: result.msg	
								});	
							}
						},'json');	
					}
				});
			}
		} <!--END OF CARD TYPE FUNCTIONS -->
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
	<div id="tt" class="easyui-tabs" tools="#tab-tools" style="width:700px;height:500px;">		
		<!--ROOM TYPE-->
	<div title="Room Type"  closable="false" style="padding:20px;">
	<script type="text/javascript">
	
		</script>
	<!--start of content of TAB -->
<table width="600" height="300" class="easyui-datagrid" id="dg" style="width:600px; height:300px" 
title="Room Type" url="../crud_php/roomtype_crud/get_roomtype.php" toolbar="#toolbar" rownumbers="true" fitColumns="true" singleSelect="true">
		<thead><tr>
				<th width="50" nowrap field="roomtype">Room Type</th>
				<th width="50" nowrap field="roomtype_description">Description</th>
				<th width="50" nowrap field="roomtype_capacity">Capacity</th>
				<th width="50" nowrap field="rate">Rate</th>
				<th width="50" nowrap field="rate_description">Rate Description</th>
		</tr></thead>
	</table>
	<div id="toolbar">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onClick="addRoomType()">Add Room Type</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onClick="editRoomType()">Edit Room Type</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onClick="removeRoomType()">Remove Room Type</a>
	</div>
	<div id="dlg" class="easyui-dialog" style="width:400px; height:400px; padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Room Type</div>
		<form id="fm" method="post">
			<div class="fitem">
				<label>Room Type:</label>
				<input name="roomtype" required></input>
			</div>
			<div class="fitem">
				<?php $rates = Rate::find_all() ?>
				<label>Rate:</label>
					<select name="rate_id">
					<?php foreach($rates as $rate): ?>
						<option value="<?php echo $rate->id;?>"><?php echo $rate->rate;?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="fitem">
				<label>Capacity:</label>
				<input name="capacity" required></input>
			</div>
			<div class="fitem">
				<label>Description:</label>
				<input name="description" required></input>
			</div>
			</form>
	</div>
	<div id="dlg-buttons">
<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveRoomType()">Save</a>
<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	<!--end of content--> 
		</div> <!-- end of ROOM TYPE -->
		<!--TAB FACILITY VERSION 2-->
	<div title="Facility"  closable="false" style="padding:20px;">
	<!--start of content of TAB -->
<table width="600" height="300" class="easyui-datagrid" id="dg2" style="width:600px; height:300px" 
title="Facility" url="../crud_php/facility_crud/get_facility.php" toolbar="#toolbar2" rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th width="50" nowrap field="name">Facility Name</th>
				<th width="50" nowrap field="description">Description</th>
				</tr>
		</thead>
	</table>
	<div id="toolbar2">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onClick="addFacility()">Add Facility</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onClick="editFacility()">Edit Facility</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onClick="removeFacility()">Remove Facility</a>
	</div>
	<div id="dlg2" class="easyui-dialog" style="width:400px; height:400px; padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Facility</div>
		<form id="fm2" method="post">
			<div class="fitem">
				<label>Facility Name:</label>
				<input name="name" required></input>
			</div>
			<div class="fitem">
				<label>Description:</label>
				<input name="description"></input>
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveFacility()">Save</a>
<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg2').dialog('close')">Cancel</a>
	</div>
	<!--end of content -->
		</div> <!-- end of TAB facility -->		
		
		<!--ROOM TAB-->
		<div title="Room"  closable="false" style="padding:20px;">
	<!--start of content of TAB -->
<table width="600" height="300" class="easyui-datagrid" id="dg3" style="width:600px; height:300px" 
title="Room" url="../crud_php/room_crud/get_room.php" toolbar="#toolbar3" rownumbers="true" fitColumns="true" singleSelect="true">
		<thead><tr>
				<th width="50" nowrap field="room_number">Room Number</th>
				<th width="50" nowrap field="roomtype">Room Type</th>
				<th width="50" nowrap field="smoking">Smoking</th>

		</tr></thead>
	</table>
	<div id="toolbar3">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onClick="addRoom()">Add Room</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onClick="editRoom()">Edit Room</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onClick="removeRoom()">Remove Room</a>
	</div>
	<div id="dlg3" class="easyui-dialog" style="width:400px; height:400px; padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Room</div>
		<form id="fm3" method="post">
			<div class="fitem">
				<label>Room Number:</label>
				<input name="room_number" required></input>
			</div>
				<div class="fitem">
				<?php $roomtypes = RoomType::find_all() ?>
				<label >Room Type: </label> 
				<select name="roomtype_id">
					<?php foreach($roomtypes as $roomtype): ?>
						<option value="<?php echo $roomtype->id;?>"><?php echo $roomtype->roomtype;?></option>
					<?php endforeach;?>
				</select>
				</div>
				<div class="fitem">
				<?php $smokingyns = SmokingYN::find_all() ?>
				<label >Smoking: </label> 
				<select name="smoking_YN_id">
					<?php foreach($smokingyns as $smokingyn): ?>
						<option value="<?php echo $smokingyn->id;?>"><?php echo $smokingyn->description;?></option>
					<?php endforeach;?>
				</select>
				</div>					
		</form>
	</div>
	<div id="dlg-buttons">
<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveRoom()">Save</a>
<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg3').dialog('close')">Cancel</a>
	</div>
	<!--end of content -->
		</div> <!-- end of TAB ROOM -->		

<!--ROOM FACILTIES TAB-->
		<div title="Room Facilities"  closable="false" style="padding:20px;">
	<!--start of content of TAB -->
<table width="600" height="300" class="easyui-datagrid" id="dg6" style="width:600px; height:300px" 
title="Room Facilities" url="../crud_php/roomtypefacilities_crud/get_roomtypefacilities.php" toolbar="#toolbar6" rownumbers="true" fitColumns="true" singleSelect="true">
		<thead><tr>
				<th width="50" nowrap field="roomtype">Room Type</th>
				<th width="50" nowrap field="facility_name">Facility</th>
		</tr></thead>
	</table>
	<div id="toolbar6">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onClick="addRoomFacilities()">Add Room Facilities</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onClick="editRoomFacilities()">Edit Room Facilities</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onClick="removeRoomFacilities()">Remove Room Facilities</a>
	</div>
	<div id="dlg6" class="easyui-dialog" style="width:400px; height:400px; padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Room Facility</div>
		<form id="fm6" method="post">
				<?php $roomtypes = RoomType::find_all() ?>
				<div class="fitem">
				<label >Room Type: </label> 
				<select name="roomtype_id">
					<?php foreach($roomtypes as $roomtype): ?>
						<option value="<?php echo $roomtype->id;?>"><?php echo $roomtype->roomtype;?></option>
					<?php endforeach;?>
				</select>
				</div>	
				
				<?php $facilities = Facility::find_all() ?>
				<div class="fitem">
				<label >Room Type: </label> 
				<select name="facility_id">
					<?php foreach($facilities as $facility): ?>
						<option value="<?php echo $facility->id;?>"><?php echo $facility->description;?></option>
					<?php endforeach;?>
				</select>
				</div>	
				<!--
				<div class="fitem">
					<label>Facility:</label>
					<input name="facility_name" required></input>
				</div>
				-->
		</form>
	</div>
	<div id="dlg-buttons">
<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveRoomFacilites()">Save</a>
<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg6').dialog('close')">Cancel</a>
	</div>
	<!--end of content -->
		</div> <!-- end of TAB ROOM FACILITIES-->	
		
		<!--PAYMENT Method TAB-->
		<div title="Room Type Rates"  closable="false" style="padding:20px;">
	<!--start of content of TAB -->
<table width="600" height="300" class="easyui-datagrid" id="dg4" style="width:600px; height:300px" 
title="Room Type Rates" url="../crud_php/room_type_rates_crud/get_room_type_rates.php" toolbar="#toolbar4" rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th width="50" nowrap field="rate">Rate</th>
				<th width="50" nowrap field="description">Description</th>
				</tr>
		</thead>
	</table>
	<div id="toolbar4">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onClick="addRoomTypeRates()">Add Room Type Rate</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onClick="editRoomTypeRates()">Edit Room Type Rate</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onClick="removeRoomTypeRates()">Remove Room Type Rate</a>
	</div>
	<div id="dlg4" class="easyui-dialog" style="width:400px; height:400px; padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Rate</div>
		<form id="fm4" method="post">
			<div class="fitem">
				<label>Rate:</label>
				<input name="rate" required></input>
			</div>
			<div class="fitem">
				<label>Description:</label>
				<input name="description" ></input>
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveRoomTypeRates()">Save</a>
<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg4').dialog('close')">Cancel</a>
	</div>
	<!--end of content -->
		</div> <!-- end of TAB facility -->		
		

		

			
		
	</div>
		</div><!-- end of div content -->
		</div>
		
		</div>
	</div>
</body>
</html>