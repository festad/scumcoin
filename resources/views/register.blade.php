<!doctype html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<meta name="viewport"
	      content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet"
	      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
	      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	      crossorigin="anonymous">

	<link rel="stylesheet"
              href="/css/arch_style.css">

	<title>Registration</title>

    </head>

    <body>
	<script src="/js/arch_style_register.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		     crossorigin="anonymous">
	</script>

	<div class="container">

	    <div class="row">
		<div class="col">
		    
		    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"
			 id="scumcoin_navbar">
			<div class="container-fluid">
			    <a class="navbar-brand" href="/">
				<img src="/s_circle_blue.png" width="40" height="40" alt=""
				     onmouseover="blue2red(this)"
				     onmouseout="red2blue(this)">
			    </a>
			</div>
		    </nav>
		    
		</div>
	    </div>

	    <div class="row h-50">
		
		<div class="col">
		    
		    <form action="/register"
			  method="POST">

			@csrf

			<div class="form-row justify-content-center">
			    <!-- Name -->
			    <div class="form-group">
				<label for="name">Name</label>
				<input id="name"
				       class="form-control"
				       type="text" name="name"
				       placeholder="Name"
				       required/>
			    </div>
			</div>

			<div class="form-row justify-content-center notice-labels
				    notice-labels-name">
			    <div class="form-group">
				<label
				    class="notice row"
				    id="notice-name">
				</label>
			    </div>
			</div>

			<div class="form-row justify-content-center">
			    <!-- Email Address -->
			    <div class="form-group">
				<label for="email">Email</label>
				<input id="email"
				       class="form-control"
				       type="email" name="email"
				       placeholder="Email"
				       required/>
			    </div>
			</div>

			<div class="form-row justify-content-center notice-labels
				    notice-labels-email">
			    <div class="form-group">
				<label
				    class="notice row"
				    id="notice-email">
				</label>
			    </div>
			</div>
			
			<div class="form-row justify-content-center">
			    <!-- Password -->
			    <div class="form-group">
				<label for="password">Password</label>
				<input id="password"
				       class="form-control"
				       type="password" name="password"
				       placeholder="Password"
				       required/>
			    </div>
			</div>

			<div class="form-row justify-content-center
				    notice-labels notice-labels-password">
			    <div class="form-group">
				<label
				    class="notice notice-password row"
				    id="notice-password-nchar"></label>
				
				<label
				    class="notice notice-password row"
				    id="notice-password-digit"></label>

				<label
				    class="notice notice-password row"
				    id="notice-password-special"></label>

				<label
				    class="notice notice-password row"
				    id="notice-password-success"></label>
			    </div>
			</div>

			<div class="form-row justify-content-center">
			    <!-- Confirm Password -->
			    <div class="form-group">
				<label for="password_confirmation">
				    Confirm password
				</label>
				<input id="password_confirmation"
				       class="form-control"
				       type="password" name="password_confirmation"
				       placeholder="Confirm password"
				       required/>
			    </div>
			</div>

			<div class="form-row justify-content-center notice-labels
				    notice-labels-password_confirmation">
			    <div class="form-group">
				<label
				    class="notice row"
				    id="notice-password_confirmation">
				</label>
			    </div>
			</div>
			
			<div class="form-row justify-content-center">
			    <button class="btn btn-primary"
				    type="submit"
				    id="register_button"
				    onmouseover="trans2bluereg()"
				    onmouseout="blue2transreg()">
				Register
			    </button>
			</div>
		    </form>

		    <script>

		     $('.notice-labels').hide();

		     function name_check(name) {
			 return /^[A-Z][a-z]*(( ([A-Z]|[a-z])[a-z]*)* [A-Z][a-z]*|)$/.test(name);
		     }

		     $('#name').on('keyup', function() {
			 $('.notice-labels-name').show();
			 res = name_check($(this).val());
			 if(!res) {
			     $('#notice-name').text("Invalid name.");
			     $('#notice-name').css({
				 color: 'red'
			     });
			 }
			 else {
			     $('#notice-name').text("Valid name!");
			     $('#notice-name').css({
				 color: 'green'
			     });
			 }
			 $('#notice-name').show();
		     });

		     $('#name').on('blur', function() {
			 $('.notice-labels-name').hide();
		     });

		     function email_check(email) {
			 return /^[a-z0-9\.]+@[a-z0-9\.]*[a-z0-9]+\.(jp|com|it|pl|org)$/
			     .test(email);
		     }

		     $('#email').on('keyup', function() {

			 $('.notice-labels-email').show();
			 
			 res = email_check($(this).val());
			 
			 if (!res) {
			     $('#notice-email')
				 .text("Invalid email.");
			     $('#notice-email')
				 .css({
				     color: 'red'
				 });
			 }
			 else {
			     $('#notice-email')
				 .text("Valid email.");
			     $('#notice-email')
				 .css({
				     color: 'green'
				 });
			 }
			 
			 $('#notice-email').show();
			 
		     });

		     $('#email').on('blur', function() {
			 $('.notice-labels-email').hide();
		     });
		     
		     function pass_check(pass) {
			 res = [0,0,0,0,0];
			 if (pass.length > 7)
			     res[1] = 1;
			 if (/\d/.test(pass))
			     res[2] = 1;
			 if (/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(pass))
			     res[3] = 1;
			 if (pass.length > 15)
			     res[4] = 1;
			 if (res[1] == 1 && res[2] == 1
			     && res[3] == 1)
			     res[0] = 1;
			 return res;
		     }
		     
		     $('#password').on('keyup', function() {

			 $('.notice-labels-password').show();
			 
			 res = pass_check($(this).val());
			 
			 if (res[1] == 0) {
			     $('#notice-password-nchar')
				 .text("At least 8 characters.");
			     $('#notice-password-nchar')
				 .css({
				     color: 'red'
				 });
			     $('#notice-password-nchar').show();
			 }
			 else
			     $('#notice-password-nchar').hide();
			 
			 if (res[2] == 0) {
			     $('#notice-password-digit').text("At least a digit.");
			     $('#notice-password-digit')
				 .css({
				     color: 'red'
				 });
			     $('#notice-password-digit').show();
			 }
			 else
			     $('#notice-password-digit').hide();
			 
			 if (res[3] == 0) {
			     $('#notice-password-special').text(
				 "At least a special character:\n"+
				 "`!@#$%^&*()_+\-=[]{};':\"\|,.<>/?~");
			     $('#notice-password-special')
				 .css({
				     color: 'red'
				 });
			     $('#notice-password-special').show();
			 }
			 else
			     $('#notice-password-special').hide();
			 
			 if (res[0] == 1) {
			     $('#notice-password-success').text("Medium!");
			     $('#notice-password-success')
				 .css({
				     color: 'orange'
				 });
			     $('#notice-password-success').show();
			 }
			 else
			     $('#notice-password-success').hide();

			 if (res[0] == 1) {
			     if (res[4] == 1) {
				 $('#notice-password-success').text("Strong!");
				 $('#notice-password-success')
				     .css({
					 color: 'green'
				     });
			     }
			     else {
				 $('#notice-password-success').text("Medium");
				 $('#notice-password-success')
				     .css({
					 color: 'yellow'
				     });
			     }
			     $('#notice-password-success').show();
			 }
			 else {
			     $('#notice-password-success').hide();
			 }
			 
		     });

//		     $('#password').on('blur', function() {
//			 $('.notice-labels-password').hide();
//		     });

		     $('#password_confirmation').on('keyup', function() {
			 $('.notice-labels-password_confirmation').show();
			 res = $('#password').val()
			 == $('#password_confirmation').val() &&
			       pass_check($('#password_confirmation').val())[0]
			 == 1;
			 
			 if(!res) {
			     $('#notice-password_confirmation').text("Passwords are not matching.");
			     $('#notice-password_confirmation').css({
				 color: 'red'
			     });
			 }
			 else {
			     $('#notice-password_confirmation').text("Alright!");
			     $('#notice-password_confirmation').css({
				 color: 'green'
			     });
			 }
			 $('#notice-password_confirmation').show();
		     });

//		     $('#password_confirmation').on('blur', function() {
//			 $('.notice-labels-password_confirmation').hide();
//		     });
		     
		    </script>
		</div>
	    </div>

	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		     integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		     crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
		     integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		     crossorigin="anonymous">
	</script>
    </body>
</html>

