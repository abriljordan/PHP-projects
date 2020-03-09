<!---registration area -->
<?php require_once("../../includes/initialize.php"); ?>
<?php //if($session->is_logged_in()) {redirect_to("../index.php");} ?>
<link rel="stylesheet" type="text/css" href="../stylesheets/project_css.css" />
<link rel="stylesheet" href="../stylesheets/general.css" type="text/css" media="screen" />
<link href="../stylesheets/YP2.css" rel="stylesheet" type="text/css" />
<?php include_layout_template('header_column.php');?>

<div class="container_980px">
	<?php include_layout_template('left_column.php'); ?>	
	 <div class="center">
		<div class="inner box">	
			<div id ="registration">
				<div id="container">
		<h1>Registration process</h1>
		<?if( isset($_POST['send']) && (!validateName($_POST['firstname']) || (!validateName($_POST['lastname']) || (!validateName($_POST['username']) ||!validateEmail($_POST['email']) || !validatePasswords($_POST['pass1'], $_POST['pass2'])  ) ):?>
				<div id="error">
					<ul>
						<?if(!validateName($_POST['firstname'])):?><?endif?>
						<?if(!validateName($_POST['lastname'])):?><?endif?>
						<?if(!validateName($_POST['username'])):?><?endif?>
						<?if(!validateEmail($_POST['email'])):?><?endif?>
						<?if(!validatePasswords($_POST['pass1'], $_POST['pass2'])):?><?endif?>
					</ul>
				</div>
			<?elseif(isset($_POST['send'])):?>
		<?endif?>
<!--instantiate object -->
		<?php 
		if(isset($_POST['send'])){
			$new_user = new User();
			$new_user->first_name = trim($_POST['firstname']);
			$new_user->last_name = trim($_POST['lastname']);
			$new_user->username = trim($_POST['username']);
			$new_user->password = trim($_POST['pass1']);
			$new_user->email = trim($_POST['email']);
			if($new_user && $new_user->save()){
				redirect_to('login.php');
			}
		}
		?>
		<form method="post" id="customForm" action="registration.php">
			<div>
				<label for="firstname">First Name</label>
				<input id="firstname" name="firstname" type="text" />
				<span id="firstnameInfo">What's your name?</span>
			</div>
			<div>
				<label for="lastname">Last Name</label>
				<input id="lastname" name="lastname" type="text" />
				<span id="lastnameInfo">What's your name?</span>
			</div>
			<div>
				<label for="username">User Name</label>
				<input id="username" name="username" type="text" />
				<span id="usernameInfo">What's your name?</span>
			</div>
			<div>
				<label for="email">E-mail</label>
				<input id="email" name="email" type="text" />
				<span id="emailInfo">Valid E-mail please.</span>
			</div>
			<div>
				<label for="pass1">Password</label>
				<input id="pass1" name="pass1" type="password" />
				<span id="pass1Info">At least 5 characters: letters, numbers and '_'</span>
			</div>
			<div>
				<label for="pass2">Confirm Password</label>
				<input id="pass2" name="pass2" type="password" />
				<span id="pass2Info">Confirm password</span>
			</div>
			<div>
				<input id="send" name="send" type="submit" value="Send" />
			</div>
		</form>
	</div>
	<script type="text/javascript" src="../jquery/jquery.js"></script>
	<script type="text/javascript" src="../javascripts/validation.js"></script>
			</div>			
		</div>
	</div>
	<div class="right_sidebar">
		<div class="inner box">
                <div id="sidebar">
                    <div class="sidebarbox"></div>
					Empty
		  </div>
		</div>
	</div>
	</div>
	