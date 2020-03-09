<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { 
redirect_to("login.php");
 }
?>
<?php include_layout_template('admin_header.php'); 
date_default_timezone_set('Asia/Manila');
echo date(DATE_RFC822);
?>


	<h2>Menu</h2>
	<?php echo output_message($message); ?>
	<ul>
		<li><a href="create_category.php">Create Category</a></li>
		<li><a href="category_list.php">List of Categories</a></li>
		<li><a href="member_list.php">List of Members</a></li>		
		<li><a href="logout.php">Logout</a></li>
	</ul>
	
<?php 
//session object
echo $session->user_id; 
/*category id


*/
?>
<?php include_layout_template('admin_footer.php'); ?>
		
