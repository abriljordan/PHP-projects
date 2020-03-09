<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php
if(empty($_GET['ad_id'])){
	$session->message("No Ad ID was provided.");
	redirect_to('ad_list.php'); }
$ad = Advertisement::find_by_id($_GET['ad_id']);
	if($ad && $ad->delete()){
	$session->message("{$ad->title} was deleted.");
	redirect_to('ad_list.php');
	}else {
	$session->message("The ad could not be deleted.");  		
redirect_to('ad_list.php');}
?>
<?php if(isset($database)) { $database->close_connection(); } ?>