<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
if(empty($_GET['id'])){
	$session->message("No User ID was provided.");
	redirect_to('category_list.php'); 
	}

$member = User::find_by_id($_GET['id']);
	if($member && $member->delete()){
	$session->message("The member{$member->first_name}  was deleted.");
	redirect_to('member_list.php');
	}else {
	$session->message("The member could not be deleted.");
    		

redirect_to('member_list.php');}
?>
<?php if(isset($database)) { $database->close_connection(); } ?>