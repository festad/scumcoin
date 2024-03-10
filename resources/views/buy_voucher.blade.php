@extends('layouts.main')

@section('title', 'Buy voucher')

@section('content')

<div class="row h-50">

<div class="col">

	<form style="margin-top: 100px" method="POST" action="/buy/voucher/complete">

	@csrf
	
	<div class="form-row justify-content-center">
		
		<div class="form-group">
		<input id="code"
				class="form-control"
				type="text" name="code"
				placeholder="Enter the code"
				required/>
		</div>
	</div>

	<div class="form-row justify-content-center notice-labels
			notice-labels-code">
		<div class="form-group">
		<label
			class="notice row"
			id="notice_code">
		</label>
		</div>
	</div>

	<div class="form-row justify-content-center">
		<button class="btn btn-primary arch"
			type="button"
			id="buy_button">
			Redeem
		</button>
	</div>
	</form>
</div>
</div>
@endsection

@push('scripts')
	<script src="{{ asset('js/buyvoucher.js') }}"></script>
@endpush

@push('scripts')
<script>
	// the buy_button calls a function that sends a post request
	// to "/buy/voucher/complete"
	// and redirects to home in case of success or shows an alert
	// in case of error
	$('#buy_button').click(function() {
		event.preventDefault();

		$.ajax({
			url: '/buy/voucher/complete',
			type: 'POST',
			dataType: 'json',
			data: {
				_token: $('meta[name="csrf-token"]').attr('content'),
				code: $("#code").val(),
			},
			success: function(response) {
				console.log(response);
				console.log('SUCCESS CASE:')
				if (response.error) {
					console.log('Error in SUCCESS CASE:')
					alert(response.error);
					window.location.href = response.redirect;
					return;
				}
				alert('Voucher redeemed successfully.')
				window.location.href = response.redirect;
			},
			error: function(xhr, status, error) {
				// Handle error
				// window.location.href = response.redirect;
				console.log('ERROR CASE:')
				console.log(xhr);
				alert('Error handler: occurred while redeeming the voucher.');
				window.location.href = "{{ route('home') }}";
			}
		});
	});
</script>
@endpush
