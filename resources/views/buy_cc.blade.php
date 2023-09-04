<!doctype html>
<html lang="en">
    <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" 
              href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">


	<title>Scumcoins</title>
    </head>


    <body>

	<script
	    src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">
	</script>

	<script src="https://www.paypal.com/sdk/js?client-id=Aak2gVw-TcN15REaBicCyY4q0GFTLG2bPN3D_fUnQQTULbMXwY8vhCBjLaMS2PF2sm1FIsjagVMBnr_T&components=buttons">
	</script>

	<x-nav></x-nav>
	
	<div class="container-fluid"
	     style="margin-top: 200px">
	    <div class="row justify-content-center"
		 id="paypal-content"></div>
	    
	    <form
		id="form_buy"
		action="/buy/complete"
		method="POST">

		@csrf

		<div class="form row justify-content-center">
		    <div class="alert alert-success" role="alert">
			{{ sprintf("%f scumcoins added to your wallet!", $amount) }}
		    </div>
		</div>
		
		<div class="form-row justify-content-center">
		    <!-- Name -->
		    <div class="form-group">
			<input id="amount"
			       class="form-control"
			       type="text" name="amount"
			       value={{ sprintf("%f",$amount) }}
			       placeholder="Amount"
			       hidden="true"
			       required/>
		    </div>
		</div>

		<div class="form-row justify-content-center">
		    <button class="btn btn-primary arch"
			    type="submit"
			    id="buy_button">
			Home
		    </button>
		</div>
	    </form>
	    
	    <script>
		$('#form_buy').hide();
	    </script>

	</div>

		    <script>		     
		     paypal.Buttons({
			 style: {
			     layout: 'vertical',
			     color:  'blue',
			     shape:  'rect',
			     label:  'paypal'
			 },
			 createOrder: function(data, actions) {
			     return actions.order.create({
				 purchase_units: [{
				     amount: {
					 value: {{ $amount }}
				     }
				 }]
			     });
			 },
			 onApprove: function(data, actions) {
			     return actions.order.capture().then(function(details) {
				 
				 $('#paypal-content').hide();
				 $('#form_buy').show();
				 $('a').attr("href", "#");
			     });
			 }
		     }).render('#paypal-content');
		     
		    </script>

	    
	    
	    <script>
	     $('body').css({
		 'padding': '100px'
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
