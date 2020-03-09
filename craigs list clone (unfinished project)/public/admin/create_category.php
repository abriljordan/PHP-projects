<?php 
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php");  }?>
<?php 
	if(isset($_POST['submit'])){
		$new_cat = new Category();
		$new_cat->category_name = trim($_POST['category_name']);		
		if($new_cat->save()){
		redirect_to('index.php');	
		}else{
		redirect_to('create_category.php');
		}
		
	}
?>
<?php include_layout_template('create_ad_header.php');?>
<head>
<h2>Create Category</h2>
  <form action="create_category.php" method="POST">
	<link href="../stylesheets/reg_css.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
<div id = "wrapper">
<div class = "table" style="width: 400px">
<ul>
<li >Category Name</li>
<input type="text" name="category_name" maxlength="30" value="" />
<li class = "submit"></li>
<input type="submit" name="submit" value="Submit" />
</ul>
</div>
</div>
</body>
	
<?php include_layout_template('user_footer.php');?>  