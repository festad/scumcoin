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


	<title>Pay</title>

    </head>

    <body>


	<div class="container">

	    <x-nav></x-nav>

	    <div class="row h-50">
		
		<div class="col">

		    <form method="POST" action="/pay/confirm">

			@csrf

			<input type="hidden"
			       name="pubkey_sender"
			       value={{ Auth::user()->pubkey }}>

			<div class="form-row justify-content-center">
			
			    <div class="form-group">
				<label for="pubkey">Receiver</label>
				<input id="pubkey_receiver"
				       type="text"
				       name="pubkey_receiver"
				       class="form-control"
				       placeholder="Public key"
				       @if(!is_null($to_pubkey))
				       value={{ $to_pubkey }}
				       @endif
				       list="pubkeys"
				       id="pubkey">
				<datalist id="pubkeys">
				    @foreach ($otherUsers as $user)
					<option>{{ $user->pubkey }}</option>
				    @endforeach
				</datalist>
				</input>
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
			    <button class="btn btn-primary arch"
				    type="submit"
				    id="pay_button">
				Pay
			    </button>
			</div>
		    </form>
		</div>
	    </div>

	</div>

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
		 'background-color': 'rgba(0,0,0,0)',
		 'border-color': '#08c',
		 'border': '3px solid',
		 'color': '#08c'
	     });

	     $('#login_button').css({
		 'margin-right': '10px'
	     });

	     $('#logo').on('mouseover', function() {
		 $(this).attr("src","/s_circle_red.png");
		 $('.arch').css({
		     'background-color': 'red',
		     'border-color': 'red',
		     'color': 'white',
		 });
	     });

	     $('#logo').on('mouseout', function() {
		 $(this).attr("src","/s_circle_blue.png");
		 $('.arch').css({
		     'background-color': 'rgba(0,0,0,0)',
		     'border-color': '#08c',
		     'color': '#08c'
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
		     'background-color': 'rgba(0,0,0,0)',
		     'border-color': '#08c',
		     'color': '#08c'
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
