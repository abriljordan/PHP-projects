  <!--RIGHT SIDE--->
<?php
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

<!-- 
PHP & Web Development page 306 : Search example
-->
  <div class="right_sidebar">
		<div class="inner box">
                <div id="sidebar">      
            <input type="text" value=" " name="search" id="search" size="20" />
			 <input type="submit" name="search" value="Search" />
			<br/>
			<br/>
			<br/>
			<a href="./user/registration.php">Register</a>
          	<a href="./user/login.php">Login</a>
		  </div>
		</div>
	</div>