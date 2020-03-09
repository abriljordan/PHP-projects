<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
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
		$sql  = "SELECT * FROM tbl_ad ";
		$sql .= "WHERE id = '{$id}' "; 
		$ads = Advertisement::find_by_sql($sql); 
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

<br>
<?php echo output_message($message); ?>
<br/>
<h2>My Advertisements</h2>
<table class = "bordered">
<tr>
	<th>AdID</th>
	<th>UserID</th>
	<th>Category</th>
	<th>Title</th>
	<th>Body</th>
	<th>Price</th>
	<th>Date Posted</th>
		<th>&nbsp;</th>
</tr>	
<?php foreach($ads as $ad): ?>
<tr>
	<td> <?php echo $ad ->ad_id; ?></td>
	<td> <?php echo $ad ->id; ?></td>
	<td> <?php echo $ad ->cat_id; ?></td>
	<td> <?php echo $ad ->title; ?></td>
	<td> <?php echo $ad ->body; ?></td>
	<td> <?php echo $ad ->price; ?></td>
	<td> <?php echo $ad ->date_added; ?></td>
	<td><a href="delete_ad.php?ad_id=<?php echo $ad->ad_id;?>">Delete</td>		
</tr>
<?php endforeach;?>
</table>
<br/>
<a href = "create_ad.php">Create a New Advertisement</a>
<?php include_layout_template('admin_footer.php'); ?>