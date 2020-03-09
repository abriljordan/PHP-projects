<?php 
//Display all categories in the center column
	$categories = Category::find_all(); 
	
?>
<div class="center">
		<div class="inner box">			
				<h2>Categories</h2>
			<?php foreach($categories as $category): ?>
					<ul>
	<li class = "even">
		<a href="ad_list_by_category.php?id=<?php echo $category->cat_id; ?> ">
			<?php echo $category->category_name;?>
		</a>
	</li>					
					</ul>
			<?php endforeach;?>
		</div>
</div> 
