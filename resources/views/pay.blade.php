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

	<title>Pay</title>

    </head>

    <body>
	<script src="/js/arch_style_pay.js"></script> // TODO !!


	<div class="container">

	    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" 
		 id="scumcoin_navbar">
		<div class="container-fluid">
		    <a class="navbar-brand" href="#">
			<img src="s_circle_blue.png" width="40" height="40" alt=""
			     onmouseover="blue2red(this)"
			     onmouseout="red2blue(this)">
		    </a>

		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
			    data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" 
			    aria-expanded="false" aria-label="Toggle navigation"
			    id="navbar_toggler">
			<span class="navbar-toggler-icon"></span>
		    </button>

		    <div class="collapse navbar-collapse" id="navbarCollapse">

			@auth
			<ul class="navbar-nav mb-2 mb-md-0 me-auto">
			    <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#"
				   role="button" data-toggle="dropdown"
				   aria-haspopup="true" aria-expanded="false">
				    {{ Auth::user()->name }}
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				    <a class="dropdown-item" href="#">
					{{ Auth::user()->email }}
				    </a>
				    <a class="dropdown-item" href="#">
					{{ Auth::user()->balance }}
				    </a>
				    <div class="dropdown-divider"></div>
				    <a class="dropdown-item"
				       href={{ sprintf("/user/%s/pay", Auth::user()->pubkey) }}>
					Pay
				    </a>
				    <div class="dropdown-divider"></div>
				    <a class="dropdown-item" href="/logout">Log out</a>
				</div>
			    </li>
			</ul>
			@endauth

			@guest
			<form class="d-flex ml-auto"
				     action="/login">
			    @csrf
			    
			    <button class="btn btn-outline-success" 
				    type="submit" id="login_button"
				    onmouseover="trans2bluelog()"
				    onmouseout="blue2translog()">
				Login
			    </button>
			    
			    <button class="btn btn-outline-success" 
				    type="submit" id="register_button"
				    onmouseover="trans2bluereg()"
				    onmouseout="blue2transreg()"
				    formaction="/register">
				Register
			    </button>
			</form>
			@endguest

			
		    </div>
		</div>
	    </nav>

	    <div class="row h-50">
		
		<div class="col">

		    // TODO !!
		    <form method="POST" action={{ sprintf("/user/%s/pay", Auth::user()->pubkey) }}>

			@csrf

			<div class="form-row justify-content-center">
			
			    <div class="form-group">
				<label for="pubkey">Receiver</label>
				<select id="email"
				    class="form-control"
					id="pubkey">
				    @foreach ($users as $user)
					<option>{{ $user->pubkey }}</option>
				    @endforeach
				</select>
			    </div>
			</div>	    


			<div class="form-row justify-content-center">
			    
			    <div class="form-group">
				<label for="amount">Amount</label>
				<input id="amount"
				       class="form-control"
				       type="text" name="amount"
				       placeholder="Amount"
				       required/>
			    </div>
			</div>

			<div class="form-row justify-content-center">
			    <button class="btn btn-primary"
				    type="submit"
				    id="pay_button"
				    onmouseover="trans2bluelog()"
				    onmouseout="blue2translog()">
				Pay
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
