@extends('layouts.main')

@section('title', 'Confirm')

@section('content')

<div class="row h-50">
	<div class="col">
		<form method="POST" action="/pay">

			@csrf
			
			<div class="form-row justify-content-center">
				<div class="form row justify-content-center">
				<div class="alert alert-danger" role="alert">
					{{ sprintf(
					"%f scumcoins are going to be sent to %s",
					$amount, $pubkey_receiver) }}
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
						value={{ Auth::user()->pubkey }}>
				<input type="hidden"
						name="pubkey_receiver"
						value={{ $pubkey_receiver }}>
				<input type="hidden"
						name="amount"
						value={{ $amount }}>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection
