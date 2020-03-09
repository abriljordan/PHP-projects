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
	<!--CHARGES TAB FUNCTIONS-->
		var url;
		function add(){
			$('#dlg').dialog('open').dialog('setTitle','New Charges');
			$('#fm').form('clear');
			url = '../crud_php/transact_charges_crud/save_transact_charges.php';
		}		
		function edit(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Charges');
				$('#fm').form('load',row);
				url = '../crud_php/transact_charges_crud/update_transact_charges.php?id='+row.id;
			}
		}	
		function save(){
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
		function remove(){
			var row = $('#dg').datagrid('getSelected');
			if (row){$.messager.confirm('Confirm','Are you sure you want to remove this Charges?',function(r){
					if (r){	$.post('../crud_php/transact_charges_crud/remove_transact_charges.php',{id:row.id},function(result){
							if (result.success){$('#dg').datagrid('reload');	// reload the user data
							} else {$.messager.show({	// show error message
									title: 'Error',	msg: result.msg	
								});	
							}
						},'json');	
					}
				});
			}
		} <!--END OF CHARGES TAB FUNCTIONS -->
		<!--PAYMENTS TAB FUNCTIONS-->
		var url;
		function addPayment(){
			$('#dlg1').dialog('open').dialog('setTitle','New Payments');
			$('#fm1').form('clear');
			url = '../crud_php/transact_payments_crud/save_transact_payments.php';
		}		
		function editPayment(){
			var row = $('#dg1').datagrid('getSelected');
			if (row){
				$('#dlg1').dialog('open').dialog('setTitle','Edit Payments');
				$('#fm1').form('load',row);
				url = '../crud_php/transact_payments_crud/update_transact_payments.php?id='+row.id;
			}
		}	
		function savePayment(){
			$('#fm1').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg1').dialog('close');		// close the dialog
						$('#dg1').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});						
						}
					}
				});
			}
		function removePayment(){
			var row = $('#dg1').datagrid('getSelected');
			if (row){$.messager.confirm('Confirm','Are you sure you want to remove this Charges?',function(r){
					if (r){	$.post('../crud_php/transact_payments_crud/remove_transact_payments.php',{id:row.id},function(result){
							if (result.success){$('#dg1').datagrid('reload');	// reload the user data
							} else {$.messager.show({	// show error message
									title: 'Error',	msg: result.msg	
								});	
							}
						},'json');	
					}
				});
			}
		} <!--END OF PAYMENTS TAB FUNCTIONS -->
	
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
		<div region="center" title="Invoice" style="background:#fafafa;overflow:hidden">
		<div id="body">
			<div id="content">
				<!-- Ajax Content -->	
	<div id="tt" class="easyui-tabs" tools="#tab-tools" style="width:700px;height:500px;">		
	
	<div title="Charges"  closable="false" style="padding:20px;">
	<!--start of content of TAB -->
<table width="700" height="300" class="easyui-datagrid" id="dg" style="width:700px; height:300px" 
title="Guests" url="../crud_php/transact_charges_crud/get_transact_charges.php" toolbar="#toolbar" rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th width="50" nowrap field="room">Room</th>
				<th width="50" nowrap field="guestname">Name</th>
				<th width="50" nowrap field="check_in_date">Check in</th>
				<th width="50" nowrap field="check_out_date">Check out</th>
				<th width="50" nowrap field="total_charges">Total</th>
			</tr>
		</thead>
</table>
	<div id="toolbar">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onClick="add()">Add</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onClick="edit()">Edit</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onClick="remove()">Remove</a>
	</div>
	<div id="dlg" class="easyui-dialog" style="width:400px; height:300px; padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Charges</div>
		<form id="fm" method="post">
			<div class="fitem">
				<?php $guests = Guest::find_all();?>
				<label>Guest Name:</label><!--destination tmp_transact_tbl-->
				<select name="guest_id">
					<?php foreach ($guests as $guest):?>
						<option value="<?php echo $guest->id?>"><?php echo $guest->first_name;?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="fitem">
				<label>Description:</label>
				<input name="description" required></input>
			</div>
			<div class="fitem">
				<label>Amount:</label>
				<input name="amount" required></input>
			</div>
		</form>
	</div>
	
	
	<div id="dlg-buttons">
<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="save()">Save</a>
<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	<!--end of content--> 
		</div>
		
		
		<!--PAYMENTS TAB  -->
			<div title="Payments"  closable="false" style="padding:20px;">
	<!--start of content of TAB -->
<table width="700" height="300" class="easyui-datagrid" id="dg1" style="width:700px; height:300px" 
title="Guests" url="../crud_php/transact_payments_crud/get_transact_payments.php" toolbar="#toolbar1" rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th width="50" nowrap field="room">Room</th>
				<th width="70" nowrap field="guestname">Name</th>
				<th width="50" nowrap field="check_in_date">Check in</th>
				<th width="50" nowrap field="check_out_date">Check out</th>
				<th width="50" nowrap field="total_charges">Total Charges</th>
				<th width="50" nowrap field="total_payments">Total Payment</th>
				<th width="50" nowrap field="balance">Balance</th>
				<th width="50" nowrap field="print"></th>

			</tr>
		</thead>
</table>
	<div id="toolbar1">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onClick="addPayment()">Add</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onClick="editPayment()">Edit</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onClick="removePayment()">Remove</a>
	</div>
	<div id="dlg1" class="easyui-dialog" style="width:400px; height:300px; padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Add Payment</div>
		<form id="fm1" method="post">
			
			<div class="fitem">
				<?php $guests = Guest::find_all();?>
				<label>Guest Name:</label>
				<select name="guest_id">
					<?php foreach ($guests as $guest):?>
						<option value="<?php echo $guest->id?>"><?php echo $guest->first_name;?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="fitem">
				<label>Description:</label>
				<input name="description" required></input>
			</div>
			<div class="fitem">
				<label>Amount:</label>
				<input name="amount" required></input>
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="savePayment()">Save</a>
<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg1').dialog('close')">Cancel</a>
	</div>
	<!--end of content--> 
		</div>
		<!-- END OF PAYMENTS TAB -->	
	</div>
	
	
		</div><!-- end of div content -->
		</div>
		
		</div>
	</div>
</body>
</html>