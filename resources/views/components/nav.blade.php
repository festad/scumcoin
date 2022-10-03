<div>
    <!-- When there is no desire, all things are at peace. - Laozi -->
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
			    <a class="dropdown-item" href={{ sprintf("/user/%s", Auth::user()->pubkey) }}>
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
			    <a class="dropdown-item"
			       href="/buy">
				Buy
			    </a>
			    <div class="dropdown-divider"></div>
			    <a class="dropdown-item" href="/change">Change password</a>
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
			    type="submit" id="login_button_nav"
			    style="margin-right: 10px">
			Login
		    </button>
		    
		    <button class="btn btn-outline-success arch" 
			    type="submit" id="register_button_nav"
			    formaction="/register">
			Register
		    </button>
		</form>
		@endguest

		
	    </div>
	</div>
    </nav>
</div>
