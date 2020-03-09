<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>
<?php include_layout_template('index_header.php'); ?>
	<h2>Profile Management</h2>
	<ul>
	<li><a href="#">View Profile</a><li>
	<li><a href="#">Edit Profile</a><li>
	</ul>	
<?php include_layout_template('admin_footer.php'); ?>
		
