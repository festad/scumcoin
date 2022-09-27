<!doctype html>
<html lang="en">
    <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" 
              href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">


	<title>Scumcoins</title>
    </head>


    <body>

	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark
		    arch" 
             id="scumcoin_navbar">
	    <div class="container-fluid">
		<a class="navbar-brand" href="/">
		    <img id="logo"
			 src="/s_circle_blue.png"
			 width="40" height="40" alt="">
		</a>

		<button class="navbar-toggler arch"
			type="button" data-bs-toggle="collapse" 
			       data-bs-target="#navbarCollapse"
			aria-controls="navbarCollapse" 
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
			@if(Auth::user()->power === "admin")
			    <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#"
				   role="button" data-toggle="dropdown"
				   aria-haspopup="true" aria-expanded="false">
				    Administration
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				    <a class="dropdown-item" href="/admin/dashboard">
					Dashboard
				    </a>
				    <div class="dropdown-divider"></div>
				    <a class="dropdown-item" href="/logout">
					Log out
				    </a>
				</div>
			    </li>
			@endif
		    </ul>
		    @endauth

		    @guest
		    <form class="d-flex ml-auto"
				 action="/login">
			@csrf
			<!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
			<button class="btn btn-outline-success arch" 
				type="submit" id="login_button">
			    Login
			</button>
			
			<button class="btn btn-outline-success arch" 
				       type="submit" id="register_button"
				       formaction="/register">
			    Register
			</button>
		    </form>
		    @endguest

		    
		</div>
	    </div>
	</nav>
	
	<div class="container-fluid">
	    <div class="row justify-content-center">
		<div class="col">
		    <table class="table">
			<thead>
			    <tr>
				<th scope="col">Public key</th>
				@if(Auth::check())
				    @if(Auth::user()->pubkey === $user->pubkey
					|| Auth::user()->power === "admin")
					<th scope="col">Email</th>
				    @endif
				@endif
				<th scope="col">Balance</th>
			    </tr>
			</thead>
			<tbody>
			    <tr>
				<td>
				    {{ $user->pubkey }}
				</td>
				@if(Auth::check())
				    @if(Auth::user()->pubkey === $user->pubkey
					|| Auth::user()->power === "admin")
					<td>
					    {{ $user->email }}
					</td>
				    @endif
				@endif
				<td>
				    {{ $user->balance }}
				</td>
			    </tr>
			</tbody>
		    </table>

		    <div class="row">

			<div class="col-2">

			    @if(Auth::check())
				<form action={{ sprintf("/user/%s/pay",
							Auth::user()->pubkey) }}
				      method="GET">

				@csrf

				<div class="form-row">
				    <!-- Name -->
				    <div class="form-group">

					<button id="pay_user_button"
						    class="btn btn-outline-success archfix"
						    type="submit">
					    Pay
					</button>
					
					<input type="hidden"
					       name="to_pubkey"
					       value={{ $user->pubkey }}>

					
				    </div>
				</div>
				</form>
			    @endif

			</div>
			
			<div class="col-2">

			    <form action="/delete/confirm"
				  method="POST">

				@csrf

				<div class="form-row">
				    <!-- Name -->
				    <div class="form-group">
					@if(Auth::check())
					    @if($user->pubkey === Auth::user()->pubkey
						|| Auth::user()->power === 'admin')
						
						<button id="delete_button"
							class="btn btn-outline-success archfix"
							type="submit">
						    Delete
						</button>
						
						<input type="hidden"
						       name="pubkey"
						       value={{ $user->pubkey }}>
					    @endif
					@endif

					
				    </div>
				</div>
			    </form>

			</div>

			
		    </div>
		    
		    <table class="table">
			<thead>
			    <th colspan="5">Transactions</th>
			</thead>
			<tbody>
			    @foreach($transactions as $transaction)
				<tr>
				    <td>
					<a href={{ sprintf("/user/%s", $user->pubkey) }}
					   class="link-secondary">
					    {{ sprintf("%32.32s ...", $user->pubkey) }}
					</a>
				    </td>
				    @if($transaction->sender == $user->pubkey)
					<td>
					    <svg xmlns="http://www.w3.org/2000/svg"
						 width="16" height="16"
						 fill="red" class="bi bi-arrow-right" viewBox="0 0 16 16">
						<path fill-rule="evenodd"
						      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
					    </svg>
					</td>
					<td>
					    <a href={{ sprintf("/user/%s", $transaction->receiver) }}
					       class="link-secondary">
						{{ sprintf("%32.32s ...", $transaction->receiver) }}
					    </a>
					</td>
					<td>
					    {{ sprintf("- %f", $transaction->amount) }}
					</td>
				    @else
					<td>
					    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
						 fill="green" class="bi bi-arrow-left" viewBox="0 0 16 16">
						<path fill-rule="evenodd"
						      d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
					    </svg>
					</td>
					<td>
					    <a href={{ sprintf("/user/%s", $transaction->sender) }}
					       class="link-secondary">
						{{ sprintf("%32.32s ...", $transaction->sender) }}
					    </a>
					</td>
					<td>
					    {{ sprintf("+ %f", $transaction->amount) }}
					</td>
				    @endif
				    <td>
					{{ $transaction->created_at }}
				    </td>
				</tr>
			    @endforeach
			</tbody>
		    </table>

		</div>
	    </div>
	</div>
	
	

	{{ $transactions->links() }}

	<script
	    src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">
	</script>

	<script>
	 $('body').css({
	     'padding-top': '100px'
	 });

	 $('nav').css({
	     'border-bottom': '5px',
	     'border-bottom-width': '5px',
	     'border-bottom-style': 'solid',
	     'border-bottom-color': '#08c',
	     'background-color': '#333333'
	 });

	 $('button').css({
	     'background-color': '#333333',
	     'border-color': '#08c',
	     'border': '3px solid',
	     'color': '#08c'
	 });

	 $('#login_button').css({
	     'margin-right': '10px'
	 });

	 $('#delete_button').css({
	     'border-color': 'red',
	     'color': 'red',
	     'margin-left': '10px'
	 });

	 $('#pay_user_button').css({
	     'border-color': 'green',
	     'color': 'green',	     
	     'margin-left': '40px'
	 });

	 $('#logo').on('mouseover', function() {
	     $(this).attr("src","/s_circle_red.png");
	     
	     $('.arch').css({
		 'background-color': 'red',
		 'border-color': 'red',
		 'color': 'white',
	     });
	     
	     $('#delete_button').css({
		 'background-color': 'red',
		 'border-color': 'red',
		 'color': 'white',
	     });
	     $('#pay_user_button').css({
		 'background-color': 'green',
		 'border-color': 'green',
		 'color': 'white',
	     });
	 });

	 $('button').on('mouseover', function() {
		 $(this).css({
		     'background-color': '#08c',
		     'border-color': '#08c',
		     'color': 'white'
		 });
	     });

	 $('button').on('mouseout', function() {
	     $(this).css({
		 'background-color': '#333333',
		 'border-color': '#08c',
		 'color': '#08c'
	     });
	 });

	 $('#logo').on('mouseout', function() {
	     $(this).attr("src","/s_circle_blue.png");

	     $('.arch').css({
		 'background-color': '#333333',
		 'border-color': '#08c',
		 'color': '#08c'
	     });
	     
	     $('#delete_button').css({
		 'background-color': '#333333',
		 'border-color': 'red',
		 'color': 'red',
	     });
	     $('#pay_user_button').css({
		 'background-color': '#333333',
		 'border-color': 'green',
		 'color': 'green'
	     });
	 });

	 $('#pay_user_button').on('mouseover', function() {
	     $(this).css({
		 'background-color': 'green',
		 'border-color': 'green',
		 'color': 'white'
	     });
	 });

	 $('#pay_user_button').on('mouseout', function() {
	     $(this).css({
		 'background-color': '#333333',
		 'border-color': 'green',
		 'color': 'green'
	     });
	 });

	 $('#delete_button').on('mouseover', function() {
	     color = $(this).css('border-color');
	     $(this).css({
		 'background-color': 'red',
		 'border-color': 'red',
		 'color': 'white'
	     });
	 });

	 $('#delete_button').on('mouseout', function() {
	     color = $(this).css('border-color');
	     $(this).css({
		 'background-color': '#333333',
		 'border-color': 'red',
		 'color': 'red'
	     });
	 });
	</script>
	

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->

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
