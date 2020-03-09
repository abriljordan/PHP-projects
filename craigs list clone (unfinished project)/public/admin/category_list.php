<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php $categories = Category::find_all(); ?>
<?php include_layout_template('admin_header.php'); ?>
<h2>Categories</h2>
<br>
<?php echo output_message($message); ?>
<br>
<table class = "bordered">
<tr>
	<th>ID</th>
	<th>Category Name</th>
		<th>&nbsp;</th>
</tr>	
<?php foreach($categories as $category): ?>
<tr>
	<td> <?php echo $category ->cat_id; ?></td>
	<td> <?php echo $category ->category_name; ?></td>
	
	<td> <a href="delete_category.php?cat_id=<?php echo $category->cat_id;?>">Delete</td>		
</tr>
<?php endforeach;?>
</table>
<br/>
<a href = "create_category.php">Create a New Category</a>
<?php include_layout_template('admin_footer.php'); ?>