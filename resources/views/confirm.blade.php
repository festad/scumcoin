@extends('layouts.main')

@section('title', 'Confirm')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col">
			<form method="POST" action="/pay">

				@csrf
				
				<div class="form-row justify-content-center">
					<div class="form row justify-content-center">
					<div class="alert alert-danger" role="alert">
						{{ 
							sprintf("%f scumcoins are going to be sent to %s", $amount, $pubkey_receiver) 
						}}
					</div>
					</div>
				</div>
				
				<div class="form-row justify-content-center">
					<div class="form-group row">
					<button class="btn btn-primary arch"
						type="submit"
						id="cancel_button"
						style="margin-right: 10px;"
						formaction="/">
						Cancel
					</button>
					<button class="btn btn-primary arch"
						type="submit"
						id="confirm_button">
						Confirm
					</button>
					<input type="hidden"
							name="pubkey_sender"
							value="{{ Auth::user()->pubkey }}">
					<input type="hidden"
							name="pubkey_receiver"
							value="{{$pubkey_receiver}}">
					<input type="hidden"
							name="amount"
							value="{{$amount}}">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$('document').ready(function() {
	$('#confirm_button').click(function(event) {
		// prevent the form from submitting
		// event.preventDefault();

		console.log("confirm button clicked")

		// $.ajax({
		// 	url: '/pay',
		// 	type: 'POST',
		// 	data: {
		// 		_token: $('input[name="_token"]').val(),
		// 		pubkey_sender: $('input[name="pubkey_sender"]').val(),
		// 		pubkey_receiver: $('input[name="pubkey_receiver"]').val(),
		// 		amount: $('input[name="amount"]').val()
		// 	},
		// 	success: function(data) {
		// 		console.log(data);
		// 	},
		// 	error: function(data) {
		// 		console.log(data);
		// 	}
		// });
	});
});
</script>
@endpush
