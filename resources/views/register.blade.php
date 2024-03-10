@extends('layouts.main')

@section('title', 'Register')

@section('content')

<div class="row h-50">
	
	<div class="col">
		
		<form
			id="form_register"
			action="/register"
			method="POST">

			@csrf

			<div class="form-row justify-content-center">
				<!-- Name -->
				<div class="form-group">
				<label for="name">Name</label>
				<input id="name"
					class="form-control"
					type="text" name="name"
					placeholder="Name"
					required/>
				</div>
			</div>

			<div class="form-row justify-content-center notice-labels
					notice-labels-name">
				<div class="form-group">
				<label
					class="notice row"
					id="notice-name">
				</label>
				</div>
			</div>

			<div class="form-row justify-content-center">
				<!-- Email Address -->
				<div class="form-group">
				<label for="email">Email</label>
				<input id="email"
					class="form-control"
					type="email" name="email"
					placeholder="Email"
					required/>
				</div>
			</div>

			<div class="form-row justify-content-center notice-labels
					notice-labels-email">
				<div class="form-group">
				<label
					class="notice row"
					id="notice-email">
				</label>
				</div>
			</div>

			<!-- notice-email-existence hidden -->
			<div class="form-row justify-content-center notice-labels
					notice-labels-email-existence">
				<div class="form-group
						notice-labels-email-existence">
				<label
					class="notice row"
					id="notice-email-existence"
					text="not_available"
					hidden="true">
				</label>
				</div>
			</div>
			
			<div class="form-row justify-content-center">
				<!-- Password -->
				<div class="form-group">
				<label for="password">Password</label>
				<input id="password"
					class="form-control"
					type="password" name="password"
					placeholder="Password"
					required/>
				</div>
			</div>

			<div class="form-row justify-content-center
					notice-labels notice-labels-password">
				<div class="form-group">
				<label
					class="notice notice-password row"
					id="notice-password-nchar"></label>
				
				<label
					class="notice notice-password row"
					id="notice-password-digit"></label>

				<label
					class="notice notice-password row"
					id="notice-password-special"></label>

				<label
					class="notice notice-password row"
					id="notice-password-success"></label>
				</div>
			</div>

			<div class="form-row justify-content-center">
				<!-- Confirm Password -->
				<div class="form-group">
				<label for="password_confirmation">
					Confirm password
				</label>
				<input id="password_confirmation"
					class="form-control"
					type="password" name="password_confirmation"
					placeholder="Confirm password"
					required/>
				</div>
			</div>

			<div class="form-row justify-content-center notice-labels
					notice-labels-password_confirmation">
				<div class="form-group">
				<label
					class="notice row"
					id="notice-password_confirmation">
				</label>
				</div>
			</div>
			
			<div class="form-row justify-content-center">
				<button class="btn btn-primary arch"
					type="button"
					id="register_button">
				Register
				</button>
			</div>
		</form>

	</div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/register.js') }}"></script>
@endpush
