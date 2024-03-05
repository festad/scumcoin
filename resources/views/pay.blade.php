@extends('layouts.main')

@section('title', 'Pay')

@section('content')

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
			type="submit"
			id="pay_button">
		Pay
		</button>
	</div>
	</form>
</div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/pay.js') }}"></script>
@endpush
