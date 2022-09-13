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
	<script src="/js/arch_js_style.js"></script>


	<div class="container">

	    <div class="row">
		<div class="col">
		    
		    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"
			 id="scumcoin_navbar">
			<div class="container-fluid">
			    <a class="navbar-brand" href="/">
				<img src="s_circle_blue.png" width="40" height="40" alt=""
				     onmouseover="blue2red(this)"
				     onmouseout="red2blue(this)">
			    </a>
			</div>
		    </nav>
		    
		</div>
	    </div>

	    <div class="row h-50">
		
		<div class="col">
		    
		    <form action="/register" method="POST">

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


			<div class="form-row justify-content-center">
			    <!-- Confirm Password -->
			    <div class="form-group">
				<label for="password_confirmation">Confirm password</label>
				<input id="password_confirmation"
				       class="form-control"
				       type="password" name="password_confirmation"
				       placeholder="Confirm password"
				       required/>
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

