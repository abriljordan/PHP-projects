<?php require_once('../../includes/initialize.php');
if(!$session->is_logged_in()) {
  redirect_to("login.php");}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
	<script src="js/advancedtable.js" type="text/javascript" language="javascript"></script>
	<script language="javascript" type="text/javascript">
	$().ready(function() {
		$("#searchtable").show();
		$("#table1").advancedtable({searchField: "#search", loadElement: "#loader", searchCaseSensitive: false, ascImage: "images/up.png", descImage: "images/down.png"});
	});
</script>
	<link href="css/advancedtable.css" rel="stylesheet" type="text/css" />
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
		<div region="center" title="Invoice" style="background:#fafafa;overflow:hidden">
		<div id="body">
			<div id="content">
				<!-- Ajax Content -->	
	<div id="tt" class="easyui-tabs" tools="#tab-tools" style="width:700px;height:500px;">		
	<div title="Invoice"  closable="false" style="padding:20px;">
	<!--start of content of TAB -->
		 <table width="100%" class="normal" id="searchtable" border="0" cellspacing="4" cellpadding="0" style="display:none;">
       <tr>
         <td width="27%"><input name="search" type="text" id="search" style="display:none;" /></td>
         <td width="73%"><div id="loader" style="display:none;"><img src="loader.gif" alt="Laoder" /></div></td>
       </tr>
     </table>
    <table width="100%" id="table1" class="advancedtable" border="0" cellspacing="0" cellpadding="0">
		 <thead>
		   <tr>
			
			 <th>Room</th>
			 <th>Guest</th>
			 <th>Arrival</th>
			 <th>Departure</th>
			 <th>Amount Due</th>
 			 <th>Payments</th>
			 <th>Balance Due</th>
 			 <th></th>
			 
		   </tr>
		 </thead>
			<?php $bookings=BalanceDue::find_all(); ?>
				<tbody>
				<?php foreach($bookings as $booking): ?>
				   <tr>
						 <td><?php echo $booking->Room; ?></td>
						 <td><?php echo $booking->Guestname; ?></td>
						 <td><?php echo $booking->Arrival; ?></td>
						 <td><?php echo $booking->Departure; ?></td>
						 <td><?php echo $booking->Amount_due; ?></td>
						 <td><?php echo $booking->Payments; ?></td>
						 <td><?php echo $booking->Balance_due; ?></td>
						 
						 <td><a href='editableinvoice/print_invoice.php?id=<?php echo $booking->id; ?>' target='_blank'>Print Invoice</a></td>
				   </tr>
				   <?php endforeach; ?>
				</tbody>
     </table>
	<!--end of content--> 
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