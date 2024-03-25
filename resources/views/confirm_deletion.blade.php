@extends('layouts.main')

@section('title', 'Confirm Deletion')

@section('content')

<div class="row h-50">
	<div class="col">
		<form method="POST" action="/delete">
			@csrf
			<div class="form-row justify-content-center">
				<div class="form row justify-content-center">
				<div class="alert alert-danger" role="alert">
					{{ sprintf(
					"User %s (%s) is going to be deleted",
					$pubkey, $email) }}
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
						name="pubkey"
						value={{ $pubkey }}>
				<input type="hidden"
						name="email"
						value={{ $email }}>
				</div>
			</div>
		</form>
	</div>
</div>