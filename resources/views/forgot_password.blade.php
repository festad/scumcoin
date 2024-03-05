@extends('layouts.main')

@section('title', 'Forgot password')

@section('content')

<div class="row h-50">
	<div class="col">
		<form method="POST" action="/reset" id="reset_form">
			@csrf

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

			<div class="form-row justify-content-center">
				<button class="btn btn-primary arch"
						type="submit"
						id="reset_button">
					Reset
				</button>
			</div>
		</form>

		<!-- Display the new password -->
		<div class="form-row justify-content-center">
			<div class="alert alert-success"
				id="resetMessage"
				style="display: none;">
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/forgotpassword.js') }}"></script>
@endpush
