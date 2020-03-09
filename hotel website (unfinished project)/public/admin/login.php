<?php 
require_once("../../includes/initialize.php");
if($session->is_logged_in()) {
  redirect_to("index.php");
}
if (isset($_POST['submit'])) { 
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $found_user = Users::authenticate($username, $password);
  if ($found_user) {
    $session->login($found_user);
		log_action('Login', "{$found_user->username} logged in.");
    redirect_to("index.php");
  } else {
    $message = "Username/password combination incorrect.";
  }
  } else { 
  $username = "";
  $password = "";
}
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Login Page</title>
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../stylesheets/login.css" />
</head>
<body>
	<form id="login-form" action="login.php" method="post">
		<fieldset>
			<legend>Log in</legend>
			<?php echo output_message($message); ?><br/>
			<label for="login">Username</label>
			<input type="text"  name="username" autocomplete="off" value="<?php echo htmlentities($username); ?>"/>
			<div class="clear"></div>
			<label for="password">Password</label>
			<input type="text" name="password"autocomplete="off"  value="<?php echo htmlentities($password); ?>"/>
			<div class="clear"></div>
				<div class="clear"></div>
			<br />
			<input type="submit" style="margin: -20px 0 0 287px;" class="button" name="submit" value="Login"/>	    
		</fieldset>
	</form>
</body
</html>