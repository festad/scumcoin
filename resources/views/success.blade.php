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

	<link rel="stylesheet"
              href="/css/arch_style.css">


	<title>Scumcoins</title>
    </head>


    <body>

	<script src="/js/arch_style.js"></script>


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

      <form action="/">
	  @csrf
	  
	<div class="form row justify-content-center">
	    <div class="alert alert-success" role="alert">
		{{ sprintf("%f scumcoins payed to %s", $amount, $pubkey ) }}
	    </div>
	</div>
	<div class="form-row justify-content-center">
	    <button class="btn btn-primary"
		    type="submit"
		    id="back_home_button"
		    onmouseover="trans2bluebh()"
		    onmouseout="blue2transbh()">
		Home
	    </button>
	</div>
      </form>
	

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
