<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
if(empty($_GET['cat_id'])){
	$session->message("No category ID was provided.");
	redirect_to('category_list.php'); 
	}
$category = Category::find_by_id($_GET['cat_id']);
	if($category && $category->delete()){
	$session->message("The category{$category->category_name} was deleted.");
	redirect_to('category_list.php');
	}else {
	$session->message("The category could not be deleted.");   		
redirect_to('category_list.php');}
?>
<?php if(isset($database)) { $database->close_connection(); } ?>