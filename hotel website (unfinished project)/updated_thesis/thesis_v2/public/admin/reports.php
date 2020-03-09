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
		<div region="center" title="Reports" style="background:#fafafa;overflow:hidden">
		<div id="body">
			<div id="content">
				<!-- Ajax Content -->	
		<table>
			<tr><td width="200">Guests List</td><td width="100"><a href='report_guests_list.php' target='_blank'>Print Report</a></td></tr> 
			<tr><td width="200">Reservation Report </td><td width="100"><a href="reservation_report.php" title="PDF [new window]" target="_blank">PDF</a></td></tr> 
			<tr><td width="200">Billing Report </td><td width="100"> <a href="billing_report.php" title="PDF [new window]" target="_blank">PDF</a></td></tr> 

		</table>	
		</div><!-- end of div content -->
		</div>
		
		</div>
	</div>
</body>
</html>