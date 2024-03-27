@extends('layouts.main')

@section('title', 'Buy')

@section('content')

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
			type="submit"
			id="buy_button">
		Buy
		</button>
	</div>
	</form>

</div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/buyccamount.js') }}"></script>
@endpush