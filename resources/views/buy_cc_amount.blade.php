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


	<title>Buy</title>

    </head>

    <body>


	<div class="container">

	    <x-nav></x-nav>
	    
	    <div class="row h-50">
		
		<div class="col">

		    <form method="POST" action="/buy/cc">

			@csrf
 
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

			<div class="form-row justify-content-center notice-labels
				    notice-labels-amount">
			    <div class="form-group">
				<label
				    class="notice row"
				    id="notice_amount">
				</label>
			    </div>
			</div>

			<div class="form-row justify-content-center">
			    <button class="btn btn-primary arch"
				    type="button"
				    id="buy_button">
				Buy
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

	 $('#buy_button').attr("type", "button");

	 $('#buy_button').css({
	     'background-color': 'rgba(0,0,0,0)',
	     'border-color': 'red',
	     'border': '3px solid',
	     'color': 'red',
	 });
	 
	 $('#buy_button').on('click', function() {
	     console.log('Complete the form!');
	 });

	 function amount_check(amount) {
	     return /^[0-9]+\.[0-9][0-9]$/.test(amount);
	 }

	 function check_and_abilitate() {
	     if (amount_check($('#amount').val())) {
		 $('#buy_button').attr("type","submit");
		 $('#buy_button').on('mouseover', function() {
		     $(this).css({
			 'background-color': '#08c',
			 'border-color': '#08c',
			 'color': 'white'
		     });
		 });

		 $('#buy_button').on('mouseout', function() {
		     $(this).css({
			 'background-color': 'rgba(0,0,0,0)',
			 'border-color': '#08c',
			 'color': '#08c'
		     });
		 });

		 
		 
	     } else {
		 $('#buy_button').attr("type", "button");
		 
		 $('#buy_button').on('mouseover', function() {
		     $(this).css({
			 'background-color': 'red',
			 'border-color': 'red',
			 'color': 'white'
		     });
		 });

		 $('#buy_button').on('mouseout', function() {
		     $(this).css({
			 'background-color': 'rgba(0,0,0,0)',
			 'border-color': 'red',
			 'color': 'red'
		     });
		 });
	     }
	 }

	 $('#buy_button').on('mouseover', function() {
	     $(this).css({
		 'background-color': 'red',
		 'border-color': 'red',
		 'color': 'white'
	     });
	     
	     check_and_abilitate();
	 });

	 $('#amount').on('keyup', function() {
	     res = amount_check($(this).val());
	     if (!res) {
		 $('#notice_amount').text("Invalid amount.");
		 $('#notice_amount').css({color: 'red'});
		 $('#buy_button').css({
		     'background-color': 'rgba(0,0,0,0)',
		     'border-color': 'red',
		     'color': 'red'
		 });
	     } else {
		 $('#notice_amount').text("Alright!");
		 $('#notice_amount').css({color: '#08c'});
		 $('#buy_button').css({
		     'background-color': 'rgba(0,0,0,0)',
		     'border-color': '#08c',
		     'color': '#08c'
		 });
	     }

	     check_and_abilitate();
	 })

	 
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
