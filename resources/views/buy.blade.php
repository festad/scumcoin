@extends('layouts.main')

@section('title', 'Buy')

@section('content')

<div class="container-fluid">
	<div class="row justify-content-center">
	<div class="col">
		<div class="row justify-content-center">
		<a  href="/buy/cc/amount">
			<button class="btn btn-outline-success arch"
				style="margin-top: 100px">
			Buy with a credit card
			</button>
		</a>
		</div>
		
		<div class="row justify-content-center">
		<a  href="/buy/voucher">
			<button class="btn btn-outline-success arch"
				style="margin-top: 100px">
			Redeem your voucher
			</button>
		</a>
		</div>
	</div>
	</div>
</div>

@endsection

