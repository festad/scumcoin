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
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Buy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pay</a>
            </li>
          </ul>
          <form class="d-flex ml-auto"
		action="/login">
	    @csrf
            <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
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
        </div>
      </div>
    </nav>

    
    <table class="table">
      <thead>
	<tr>
	  <th scope="col">Sender</th>
	  <th scope="col">Receiver</th>
	  <th scope="col">Amount</th>
	</tr>
      </thead>
      @foreach ($transactions as $transaction)
      <tbody>
	<tr>
	  <td>{{ $transaction->sender }}</td>
	  <td>{{ $transaction->receiver }}</td>
	  <td>{{ $transaction->amount }}</td>
	</tr>
      </tbody>
      @endforeach
    </table>
    

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
