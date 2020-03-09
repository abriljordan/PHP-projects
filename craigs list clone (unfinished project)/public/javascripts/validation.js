$(document).ready(function(){
	//global vars

	var form = $("#customForm");
	var firstname = $("#firstname");
	var firstnameInfo = $("#firstnameInfo");
	var lastname = $("#lastname");
	var lastnameInfo = $("#lastnameInfo");
	var username = $("#username");
	var usernameInfo = $("#usernameInfo");
	var email = $("#email");
	var emailInfo = $("#emailInfo");
	var pass1 = $("#pass1");
	var pass1Info = $("#pass1Info");
	var pass2 = $("#pass2");
	var pass2Info = $("#pass2Info");
	
	//On blur
	firstname.blur(validatefirstName);
	lastname.blur(validatelastName);
	username.blur(validateuserName);
	email.blur(validateEmail);
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);
	//On key press
	firstname.keyup(validatefirstName);
	lastname.keyup(validatelastName);
	username.keyup(validateuserName);
	pass1.keyup(validatePass1);
	pass2.keyup(validatePass2);
	//On Submitting
	form.submit(function(){
		if(validatefirstName() & validatelastName() & validateuserName()& validateEmail() & validatePass1() & validatePass2())
			return true
		else
			return false;
	});
	
	//validation functions
	function validateEmail(){
		//testing regular expression
		var a = $("#email").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//if it's valid email
		if(filter.test(a)){
			email.removeClass("error");
			emailInfo.text("Valid E-mail please, you will need it to log in!");
			emailInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			email.addClass("error");
			emailInfo.text("Type a valid e-mail please :P");
			emailInfo.addClass("error");
			return false;
		}
	}
	function validatefirstName(){
		//if it's NOT valid
		if(firstname.val().length < 4){
			firstname.addClass("error");
			firstnameInfo.text("We want names with more than 3 letters!");
			firstnameInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			firstname.removeClass("error");
			firstnameInfo.text("What's your first name?");
			firstnameInfo.removeClass("error");
			return true;
		}
	}
	
	function validatelastName(){
		//if it's NOT valid
		if(lastname.val().length < 4){
			lastname.addClass("error");
			lastnameInfo.text("We want names with more than 3 letters!");
			lastnameInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			lastname.removeClass("error");
			lastnameInfo.text("What's your last name?");
			lastnameInfo.removeClass("error");
			return true;
		}
	}
	
	
	function validateuserName(){
		//if it's NOT valid
		if(username.val().length < 4){
			username.addClass("error");
			usernameInfo.text("We want names with more than 3 letters!");
			usernameInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			username.removeClass("error");
			usernameInfo.text("What's your user name?");
			usernameInfo.removeClass("error");
			return true;
		}
	}
	
	
	
	
	
	function validatePass1(){
		var a = $("#password1");
		var b = $("#password2");

		//it's NOT valid
		if(pass1.val().length <5){
			pass1.addClass("error");
			pass1Info.text("Remember: At least 5 characters: letters, numbers and '_'");
			pass1Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			pass1.removeClass("error");
			pass1Info.text("At least 5 characters:letters, numbers and '_'");
			pass1Info.removeClass("error");
			validatePass2();
			return true;
		}
	}
	function validatePass2(){
		var a = $("#password1");
		var b = $("#password2");
		//are NOT valid
		if( pass1.val() != pass2.val() ){
			pass2.addClass("error");
			pass2Info.text("Passwords doesn't match!");
			pass2Info.addClass("error");
			return false;
		}
		//are valid
		else{
			pass2.removeClass("error");
			pass2Info.text("Confirm password");
			pass2Info.removeClass("error");
			return true;
		}
	}

});