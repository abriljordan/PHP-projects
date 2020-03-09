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
    <script type="text/javascript" src="javascripts/jquery-ui-1.8/ui/jquery.ui.tabs.js"></script>
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
		$("#date_Entered").datepicker(pickerOpts);
		$("#date_Deadline").datepicker(pickerOpts);
	});
	var url;
		function addWorkOrder(){
			$('#dlg').dialog('open').dialog('setTitle','New Work Order');
			$('#fm').form('clear');
			url = '../crud_php/work_order_crud/save_work_order.php';
		}		
		function editWorkOrder(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Work Order');
				$('#fm').form('load',row);
				url = '../crud_php/work_order_crud/update_work_order.php?id='+row.id;
			}
		}
		function saveWorkOrder(){
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
		function removeWorkOrder(){
			var row = $('#dg').datagrid('getSelected');
			if (row){$.messager.confirm('Confirm','Are you sure you want to remove this work order?',function(r){
					if (r){	$.post('../crud_php/work_order_crud/remove_work_order.php',{id:row.id},function(result){
							if (result.success){$('#dg').datagrid('reload');	// reload the user data
							} else {$.messager.show({	// show error message
									title: 'Error',	msg: result.msg	
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
	<div title="Work Order List"  closable="false" style="padding:20px;">
	<!--start of content of TAB -->
<table width="700" height="300" class="easyui-datagrid" id="dg" style="width:700px; height:300px" 
title="Work Order List" url="../crud_php/work_order_crud/get_work_order.php" toolbar="#toolbar" rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th width="50" nowrap field="work_order">Description</th>
				<th width="50" nowrap field="category">Category</th>
				<th width="50" nowrap field="room_number">Room Num</th>
			    <th width="50" nowrap field="priority">Priority</th>
				<th width="50" nowrap field="start_date">Entered On</th>
				<th width="50" nowrap field="end_date">Deadline</th>
				<th width="50" nowrap field="nickname">Assigned To</th>
				<th width="50" nowrap field="status">Status</th>
		
			</tr>
		</thead>
	</table>
	<div id="toolbar">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onClick="addWorkOrder()">Add Work Order</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onClick="editWorkOrder()">Edit Work Order</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onClick="removeWorkOrder()">Remove Work Order</a>
	</div>
	<div id="dlg" class="easyui-dialog" style="width:500px; height:400px; padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Work Order</div>
		<form id="fm" method="post">
			<div class="fitem">
				<label>Description:</label>
				<input name="description" ></input>
			</div>
			<!--FOR EACH LOOP CATEGORY -->
			<?php $categories = HousekeepingCategory::find_all(); ?>
			<div class="fitem">
			<label >Category: </label> 
			<select name="category_id">
			<?php foreach($categories as $category): ?>
				<option value="<?php echo $category->id;?>"><?php echo $category->description;?></option>
			<?php endforeach;?>
			</select>
			</div>	
			
			<!--FOR EACH LOOP ROOM NUMBERS -->
			<?php $roomnumbers = Room::find_all(); ?>
			<div class="fitem">
			<label>Room Number: </label> 
			<select name="room_id">
			<?php foreach($roomnumbers as $roomnumber): ?>
				<option value="<?php echo $roomnumber->id;?>"><?php echo $roomnumber->room_number;?></option>
			<?php endforeach;?>
			</select>
			</div>	
			<!--FOR EACH LOOP PRIORITY-->
			<?php $priorities = HousekeepingPriority::find_all(); ?>
			<div class="fitem">
			<label >Priority: </label> 
			<select name="priority_id">
			<?php foreach($priorities as $priority): ?>
				<option value="<?php echo $priority->id;?>"><?php echo $priority->description;?></option>
			<?php endforeach;?>
			</select>
			</div>	
			<div class="fitem">
				<label>Date Entered:</label>
				<input name="start_date" id="date_Entered"></input>
			</div>	
			<div class="fitem">
				<label>Deadline:</label>
				<input name="end_date" id="date_Deadline"></input>
			</div>
			<!--FOR EACH LOOP EMPLOYEES -->
			<?php $employees = Users::find_all(); ?>
			<div class="fitem">
			<label >Assigned To: </label> 
			<select name="user_id">
			<?php foreach($employees as $employee): ?>
				<option value="<?php echo $employee->id;?>"><?php echo $employee->nickname;?></option>
			<?php endforeach;?>
			</select>
			</div>				
			<!--FOR EACH LOOP STATUS -->
			<?php $statuses = HousekeepingStatus::find_all(); ?>
			<div class="fitem">
			<label>Status: </label> 
			<select name="status_id">
			<?php foreach($statuses as $status): ?>
				<option value="<?php echo $status->id; ?>"><?php echo $status->description;?></option>
			<?php endforeach;?>
			</select>
			</div>		
			</form>
	</div>
	<div id="dlg-buttons">
<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveWorkOrder()">Save</a>
<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	<!--end of content--> 
		</div> <!-- end of ROOM TYPE -->
	</div>
		</div><!-- end of div content -->
		</div>
		</div>
	</div>
</body>
</html>