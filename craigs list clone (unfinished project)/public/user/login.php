<?php
require_once("../../includes/initialize.php");
if($session->is_logged_in()) {
  redirect_to("index.php");
}
if (isset($_POST['submit'])) { 
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  
	$found_user = User::authenticate($username, $password);
  if ($found_user) {
    $session->login($found_user);
		log_action('Login', "{$found_user->username} logged in."); //logfile
  }else{$message = "Username/password combination incorrect.";
  }} else { 
  $username = "";
  $password = "";}
?>
<head>
<link rel="stylesheet" type="text/css" href="../stylesheets/project_css.css" />
<link rel="stylesheet" href="../stylesheets/general.css" type="text/css" media="screen" />
<link href="../stylesheets/YP2.css" rel="stylesheet" type="text/css" />
<link href="../stylesheets/login_css.css" rel="stylesheet" type="text/css" />
</head>
<?php 
 include_layout_template('header_column.php');
?>
<!--container of left, right & center column -->
<div class="container_980px">
	<?php include_layout_template('left_column.php'); ?>	

	<!-- start of center column-->	
	<div class="center">
		<div class="inner box">	
- 			<div id="form">
<form action= "login.php" method="post" >
<div class = "table" style="margin:5px;">
<ul>
	<li class="username">
	<label>Username: </label><br/> 
		<input type="text" name="username"  maxlength="30" value="<?php echo htmlentities($username); ?>" />	
		<span class="error"></span>
	</li>
<li class="password">
<label>Password: </label><br/> 
<input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>"  />
<span class="error"></span>
</li>
<li class="submit">
<input type="submit" name = "submit" value="Login"/>
</li>
</ul>

</div>
</form>
</div>

		</div>
	</div>
<!-- start of right column-->	
<div class="right_sidebar">
		<div class="inner box">
                <div id="sidebar">
                    <div class="sidebarbox"></div>
                Empty         
		  </div>
		</div>
</div><!-- end of right column-->	

</div>