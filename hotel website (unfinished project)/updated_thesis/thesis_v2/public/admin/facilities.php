<?php require_once('../../includes/initialize.php');
if(!$session->is_logged_in()) {
  redirect_to("login.php");}
?>
<html>
<head>
<title>Admin Panel - Jampason Resort</title>
<link rel="stylesheet" type="text/css" href="../javascripts/jquery-easyui-1.2.5/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../javascripts/jquery-easyui-1.2.5/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../javascripts/jquery-easyui-1.2.5/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../javascripts/jquery-easyui-1.2.5/demo/demo.css">		
	<script type="text/javascript" src="../javascripts/jquery-easyui-1.2.5/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="../javascripts/jquery-easyui-1.2.5/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="../javascripts/jquery.history.js"></script>
	<script type="text/javascript" src="../javascripts/jquery-getpage_content.js"></script>
	<!--<script type="text/javascript" src="../javascripts/jquery-CRUD.js"></script>-->
    <link href="../stylesheets/jquery-CRUD.css" media="all" rel="stylesheet" type="text/css" />
	    <?php //include_layout_template('admin_scripts.php'); ?>
		<script type="text/javascript">
		//url="../crud_php/user_crud/get_users.php"
		var url;
		function newUser(){
			$('#dlg').dialog('open').dialog('setTitle','New User');
			$('#fm').form('clear');
			url = '../crud_php/facility_crud/save_facility.php';
		}
		
		/*
		function newRoom(){
			$('#dlg').dialog('open').dialog('setTitle','New Room');
			$('#fm').form('clear');
			url = 'save_room.php';
		} 
		USAGE
	<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onClick="newRoom()">New Room</a>
		*/
		
		function editUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit User');
				$('#fm').form('load',row);
				url = '../crud_php/facility_crud/update_facility.php?id='+row.id;
			}
		}
		function saveUser(){
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
				$.messager.confirm('Confirm','Are you sure you want to remove this user?',function(r){
					if (r){
						$.post('../crud_php/facility_crud/remove_facility.php',{id:row.id},function(result){
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
			<!--<a href="#page1" rel="ajax" class="easyui-linkbutton">Users</a>-->
<li><?php echo SmartUrl::buildLink('http://localhost/thesis_v2/public/admin','quickoverview.php', 'Quick Overview');?></li>
			</div>
			<div style="padding:5px; background:#fafafa; width:150px;">
			<!--<a href="#page1" rel="ajax" class="easyui-linkbutton">Users</a>-->
<li><?php echo SmartUrl::buildLink('http://localhost/thesis_v2/public/admin','usermanagement.php', 'User Management');?></li>
			</div>
		</div>
		<div region="center" title="Main Title" style="background:#fafafa;overflow:hidden">
		<div id="body">
			<div id="content">
				<!-- Ajax Content -->
<table width="600" height="300" class="easyui-datagrid" id="dg" style="width:600px; height:300px" 
title="User Management" url="../crud_php/user_crud/get_facility.php" toolbar="#toolbar" rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th width="50" nowrap field="facility_name">Facility Name</th>
				<th width="50" nowrap field="price">Price</th>
				<th width="50" nowrap field="description">Description</th>
			</tr>
		</thead>
		
	</table>
	<div id="toolbar">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onClick="newUser()">New Facility</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onClick="editUser()">Edit Facility</a>
<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onClick="removeUser()">Remove Facility</a>
	</div>
	<div id="dlg" class="easyui-dialog" style="width:400px; height:400px; padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">User Information</div>
		<form id="fm" method="post">
			<div class="fitem">
				<label>Facility Name</label>
				<input name="facility_name" class="easyui-validatebox" required></input>
			</div>
			<div class="fitem">
				<label>Price</label>
				<input name="price" class="easyui-validatebox" required></input>
			</div>
			<div class="fitem">
				<label>Description:</label>
				<input name="facility_description" class="easyui-validatebox" required></input>
			</div>
			<div class="fitem">
				<label>First Name:</label>
				<input name="first_name" class="easyui-validatebox" required></input>
			</div>
			<div class="fitem">
				<label>Last Name:</label>
				<input name="last_name" class="easyui-validatebox" required></input>
			</div>
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