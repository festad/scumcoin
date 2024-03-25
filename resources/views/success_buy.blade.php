@extends('layouts.main')

@section('title', 'Success Buy')

@section('content')

<div class="row h-50">
	<div class="col">
		<form method="POST" action="/">
			@csrf
			<div class="form row justify-content-center">
			<div class="alert alert-success" role="alert">
				{{ sprintf("%f scumcoins added to your wallet!", $amount) }}
			</div>
			</div>
			
			<div class="form-row justify-content-center">
				<button class="btn btn-primary arch"
							type="submit"
							id="back_home_button">
					Home
				</button>
			</div>
		</form>
	</div>
</div>

@endsection