<?php require_once("./../includes/initialize.php"); ?>
<link rel="stylesheet" type="text/css" href="stylesheets/project_css.css" />
<link rel="stylesheet" href="stylesheets/general.css" type="text/css" media="screen" />
<link href="./stylesheets/YP2.css" rel="stylesheet" type="text/css" />
<?php 
 include_layout_template('header_column.php');
?>
<div class="container_980px">
<?php
	include_layout_template('left_column.php'); 
	include_layout_template('right_column.php'); ?>	
<?php 
	$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
	$per_page = 5;
	$total_count = Views::count_all();
	$pagination = new Pagination($page, $per_page, $total_count);
$cat_id = $_GET['id'];
$sql = "SELECT * FROM advertisements ";
$sql .= "WHERE cat_id = '{$cat_id}'"; 
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$ads = Views::find_by_sql($sql);
?>
<div class = "center">
	<div class = "inner box">
		<h2>Ads List Details</h2>
		<br/>
		<?php foreach($ads as $ad): ?>
				<ul>
			<li class = "even">
					<div style="float: left; margin-left: 10px;">
						<img src="<?php echo $ad->image_path(); ?>" width="200" />
					</a>
					<p><?php 
					echo $ad->filename;					
					 ?></p>
					 
					</div>
						<?php echo $ad->caption;?> <br/>
						<?php echo "Title: " . $ad->title;?> <br/>
						<?php echo "Body : " . $ad->body;?>  <br/>
						<?php echo "Price : " . $ad->price;?> <br/>
						<?php echo "Posted by: " . $ad->first_name;?> <br/>
						<?php echo "Contact info: " . $ad->contact;?> <br/>		
						<?php echo "Posted on: " . $ad->date_added;?> <br/>
			</li>
				</ul>
		<?php endforeach;?>
		<div id="pagination" style="clear: both;">
<?php
	if($pagination->total_pages() > 1) {
		if($pagination->has_previous_page()) { 
    	echo "<a href=\"ad_list_by_category.php?page=";
      echo $pagination->previous_page();
      echo "\">&laquo; Previous</a> "; 
    }
		for($i=1; $i <= $pagination->total_pages(); $i++) {
			if($i == $page) {
				echo " <span class=\"selected\">{$i}</span> ";
			} else {
				echo " <a href=\"ad_list_by_category.php?page={$i}\">{$i}</a> "; 
			}
		}
		if($pagination->has_next_page()) { 
			echo " <a href=\"ad_list_by_category.php?page=";
			echo $pagination->next_page();
			echo "\">Next &raquo;</a> "; 
    }
}
?>
</div>
	</div>
	
	
	
</div>

</div>
