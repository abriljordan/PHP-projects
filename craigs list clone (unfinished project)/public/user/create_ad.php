<?php require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php");  }
?>
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
$max_file_size = 1048576; 
 	if(isset($_POST['submit'])){
		$new_ad = new Advertisement();
		$new_ad->id = $session->user_id; 
		$new_ad->cat_id = '{$catid}';//pg 683, inserting record
		$new_ad->title = trim($_POST['title']);
		$new_ad->body = trim($_POST['body']);
		$new_ad->price = trim($_POST['price']);
		$new_ad->date_added = strftime("%Y-%m-%d %H:%M:%S", time());
		$new_ad->caption = trim($_POST['caption']);
		$new_ad->attach_file($_FILES['file_upload']);
		if($new_ad->save()){ 
		$session->message(" Ad created successfully");
		}
	}
	$categories = Category::find_all();	
?>
<head>
<h2>Create your Advertisements</h2>
  <form action="create_ad.php" enctype="multipart/form-data" method="POST">
</head>
<body>
<div id = "wrapper">
<div class = "table" style="width: 400px">
<ul>
	<li >Title</li>
		<input type="text" name="title" value="" />
	<li >Body</li>
		<textarea name="body"  rows="4" columns = "36"> </textarea><br /><br />
	<li >Price</li>
		<input type="text" name="price" maxlength="30" value="" />
	<br/>
	
	
<label for="category">Category</label><br/> 
	<select name="category">
		<option>Select One</option>
			<?php foreach($categories as $category): ?>
			<?php $catid = $category->cat_id;?>
				<option value = <?php echo $catid;?>> <?php echo $category->category_name;?> </option>
				<?php echo $catid;?>
						 <?php endforeach;?>
		</select>
		
		
<br/><!-- $option_block .= "<option value=\"$id\">$l_name, $f_name</option>";-->
<!--ad image-->
<li >Upload picture</li>
<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
    <p><input type="file" name="file_upload" /></p>
    Caption: <input type="text" name="caption" value="" />
		<li class = "submit"></li>
	<input type="submit" name="submit" value="Submit" />
</ul>
</div>
</div>
</body>
</form>
<?php include_layout_template('user_footer.php');?>  