<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>
<link rel="stylesheet" type="text/css" href="../stylesheets/project_css.css" />
<link rel="stylesheet" href="../stylesheets/general.css" type="text/css" media="screen" />
<link href="../stylesheets/YP2.css" rel="stylesheet" type="text/css" />

<?php include_layout_template('header_column.php'); ?>
<div class="container_980px">
<?php 
include_layout_template('left_column_user.php'); 
include_layout_template('right_column.php');
?>	
	<?php 
		$id = $session->user_id;
		$sql  = "SELECT * FROM tbl_user ";
		$sql .= "WHERE id = '{$id}' "; 
    	$users = User::find_by_sql($sql);
		?>
		<?php foreach($users as $user): ?>
<tr>
	<h2>WELCOME</h2>
	<td> <?php echo $user ->first_name; ?></td>
	<td> <?php echo $user ->last_name; ?></td>
	</tr>
<?php endforeach;?>
<?php include_layout_template('admin_footer.php'); ?>
		
