<?php 
require_once('../../includes/initialize.php');
?>
<?php 
	if(isset($_POST['submit'])){
		$new_client = new User();
		$new_client->first_name = trim($_POST['first_name']);
		$new_client->last_name = trim($_POST['last_name']);
		//$new_client->email = trim($_POST['email']);
		$new_client->username = trim($_POST['username']);
		$new_client->password = trim($_POST['password']);
		//continue registration.php class, show example test.php
		//create account, insert into table
		if($new_client->create()){
			//Success
		$message = "Account successfully created.";		
		}else{ //Failure
			$message = "Failed to register";
		}		
	}
?>
<?php include_layout_template('registration_header.php');?>
<head>
<h2>Create your account</h2>
  <form action="register.php" method="POST">
	<link href="../stylesheets/reg_css.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
<div id = "wrapper">
<div class = "table" style="width: 400px">
<ul>
<li class = "even">First Name</li>
<input type="text" name="first_name" maxlength="30" value="" />
<li class = "odd">Last Name</li>
<input type="text" name="last_name" maxlength="30" value="" />
<!--
<li class = "even">E-mail</li>
<input type="text" name="username" maxlength="30" value="" />
-->
<li class = "odd">User Name</li>
<input type="text" name="username" maxlength="30" value="" />

<li class = "even">Password</li>
<input type="password" name="password" maxlength="30" value="" />


<!--
<li class = "odd">Retype Password</li>
<input type="password" name="password" maxlength="30" value="" />
-->
<li class = "submit"></li>
<input type="submit" name="submit" value="Submit" />
</ul>
</div>
</div>
</body>
	
<?php include_layout_template('user_footer.php');?>  