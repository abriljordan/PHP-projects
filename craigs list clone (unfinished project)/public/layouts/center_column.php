<!--center column-->
<?php require_once("./../includes/initialize.php");?>
<?php //PAGINATION
/*
		$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
		$per_page = 10;
		$total_count = Advertisement::count_all();
		$pagination = new Pagination($page, $per_page, $total_count);
		$sql = "SELECT * FROM advertisements ";
		$sql .= "LIMIT {$per_page} ";
		$sql .= "OFFSET {$pagination->offset()}";
		$ads = Advertisement::find_by_sql($sql); */
?>	
<?php 
 include_layout_template('category_list_user.php');
?>



