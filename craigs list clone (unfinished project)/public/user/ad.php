<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>
<?php include_layout_template('index_header.php'); ?>
	<h2>Ad Management</h2>
	<ul>
	<li><a href="list_ads.php">List of Ads	</a></li>
	<li><a href="create_ad.php">Create Ads</a></li>
	<li><a href="#">Home</a></li>	
	<li><a href="logout.php">Logout</a></li>
	</ul>
<?php include_layout_template('admin_footer.php'); ?>
		
