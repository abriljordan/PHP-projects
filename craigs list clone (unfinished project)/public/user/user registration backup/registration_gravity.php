<!---registration area -->
<?php require_once("../../includes/initialize.php"); ?>
<link rel="stylesheet" type="text/css" href="../stylesheets/project_css.css" />
<link rel="stylesheet" href="../stylesheets/general.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../stylesheets/gravity_registration.css" type="text/css" media="screen" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="../javascripts/js/jquery.easing.1.3.js.js"></script>
<script type="text/javascript">
$(function() 
{
$("ul li:first").show();
var ck_username = /^[A-Za-z0-9_]{3,20}$/;
var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i 
var ck_password =  /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;

$('#email').keyup(function()
{
var email=$(this).val();
if (!ck_email.test(email)) 
{
 $(this).next().show().html("Enter valid email");
}else{

$(this).next().hide();
$("li").next("li.username").slideDown({duration: 'slow',easing: 'easeOutElastic'});
}});
$('#username').keyup(function()
{
var username=$(this).val();
if (!ck_username.test(username)) {
 $(this).next().show().html("Min 3 charts no Space");}

 else{
$(this).next().hide();
$("li").next("li.password").slideDown({duration: 'slow',easing: 'easeOutElastic'});
}});
$('#password').keyup(function(){
var password=$(this).val();
if (!ck_password.test(password)) {
 $(this).next().show().html("Min 6 Charts");}

 else{
$(this).next().hide();
$("li").next("li.submit").slideDown({duration: 'slow',easing: 'easeOutElastic'});
}});
$('#submit').click(function(){
var email=$("#email").val();
var username=$("#username").val();
var password=$("#password").val();
if(ck_email.test(email) && ck_username.test(username) && ck_password.test(password) )
{ $("#form").show().html("<h1>Thank you!</h1>");}
else{}return false;});})
</script>

<div class="container_980px">
	<?php include_layout_template('header_column.php');?>
	<?php include_layout_template('left_column.php'); ?>	
	 <div class="center">
		<div class="inner box">	
			<div id ="registration">
				<div id="container">
		<!--Edit-->
		<h1>Registration process</h1>
	<div id="form">
<h2>10 Seconds Registration</h2>
More tutorials <a href='http://9lessons.info'>9lessons.info</a>. Tutorial link <a href='http://www.9lessons.info/2011/01/gravity-registration-form-with-jquery.html'>click here</a>
<form method="post" >
<ul>
<li class="email">
<label>Email: </label><br/> 
<input type="text" name="email" id="email" />
<span class="error"></span>
</li>
<li class="username">
<label>Username: </label><br/> 
<input type="text" name="name" id="username" />
<span class="error"></span>
</li>

<li class="password">
<label>Password: </label><br/> 
<input type="password" name="password" id="password" />
<span class="error"></span>
</li>

<li class="password">
<label>Confirm Password: </label><br/> 
<input type="password" name="password1" id="password1" />
<span class="error"></span>
</li>


<li class="submit">
<input type="submit" value=" Register " id='submit'/>
</li>
</ul>
</form>
</div>
	
		<!--end of edit-->
		
	</div>
	<script type="text/javascript" src="jquery/jquery.js"></script>
	<script type="text/javascript" src="javascripts/validation.js"></script>
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
	