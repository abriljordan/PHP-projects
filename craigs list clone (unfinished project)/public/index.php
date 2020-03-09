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
     include_layout_template('center_column.php');
	 include_layout_template('right_column.php'); ?>	
		<?php echo strftime("%Y-%m-%d",time());?>
		</div>
	</div>	
	<div class="center">
		<div class="inner box">	
</div>
	</div>
	<div class="right_sidebar">
		<div class="inner box">
                <div id="sidebar">
                    <div class="sidebarbox"></div>
                Search
                <p id="searchbox">
                <input type="text" value="" name="s" id="searchinp" size="14" />
                <input type="image" src="images/iconsearch.gif" id="searchsubmit" />
                </p>
		    Username:
		      <input type="text" name="username" maxlength="30" value="<?php //echo htmlentities($username); ?>" />
		    Password:
		      <input type="password" name="password" maxlength="30" value="<?php //echo htmlentities($password); ?>" />
		    <input type="submit" name="submit" value="Login" />
			<a href="./user/registration.php">Register</a>
          
		  </div>
		</div>
	</div>
	
</div>











