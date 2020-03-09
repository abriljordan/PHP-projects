<!---registration area -->

			<div id ="registration">
				<div id="container">
		<h1>Registration process</h1>
		<?if( isset($_POST['send']) && (!validateName($_POST['name']) || !validateEmail($_POST['email']) || !validatePasswords($_POST['pass1'], $_POST['pass2']) || !validateMessage($_POST['message']) ) ):?>
				<div id="error">
					<ul>
						<?if(!validateName($_POST['name'])):?>
						<?endif?>
						<?if(!validateEmail($_POST['email'])):?>
						<?endif?>
						<?if(!validatePasswords($_POST['pass1'], $_POST['pass2'])):?>
						<?endif?>
						<?if(!validateMessage($_POST['message'])):?>
						<?endif?>
					</ul>
				</div>
			<?elseif(isset($_POST['send'])):?>
		<?endif?>
		<form method="post" id="customForm" action="">
			<div>
				<label for="name">Name</label>
				<input id="name" name="name" type="text" />
				<span id="nameInfo">What's your name?</span>
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
				<label for="message">Message</label>
				<textarea id="message" name="message" cols="" rows=""></textarea>
			</div>
			<div>
				<input id="send" name="send" type="submit" value="Send" />
			</div>
		</form>
	</div>
	<script type="text/javascript" src="jquery/jquery.js"></script>
	<script type="text/javascript" src="javascripts/validation.js"></script>
			</div>
			
			
		