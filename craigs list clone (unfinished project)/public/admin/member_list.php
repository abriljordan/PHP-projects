<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php $members = User::find_all(); ?>
<?php include_layout_template('admin_header.php'); ?>
<h2>Members</h2>
<br>
<?php echo output_message($message); ?>
<br>
<table class = "bordered">
<tr>
	<th>ID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Username</th>
	<th>Password</th>	
		<th>&nbsp;</th>
</tr>	
<?php foreach($members as $member): ?>
<tr>
	<td> <?php echo $member ->id; ?></td>
	<td> <?php echo $member ->first_name; ?></td>
	<td> <?php echo $member ->last_name; ?></td>
	
	<td> <?php echo $member ->username; ?></td>
	<td> <?php echo $member ->password; ?></td>
	
	<td> <a href="delete_member.php?id=<?php echo $member->id;?>">Delete</td>		
</tr>
<?php endforeach;?>
</table>
<br/>
<?php include_layout_template('admin_footer.php'); ?>