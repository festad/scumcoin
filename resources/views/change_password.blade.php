@extends('layouts.main')

@section('title', 'Change password')

@section('content')

	    <div class="row h-50">
		
		<div class="col">
		    
		    <form
			id="form_change"
			    action="/change"
			    method="POST">

			@csrf
			
			<div class="form-row justify-content-center">
			    <!-- Password -->
			    <div class="form-group">
				<label for="old_password">Current password</label>
				<input id="old_password"
				       class="form-control"
				       type="password" name="old_password"
				       placeholder="Current password"
				       required/>
			    </div>
			</div>

			<div class="form-row justify-content-center">
			    <!-- Password -->
			    <div class="form-group">
				<label for="password">New password</label>
				<input id="password"
				       class="form-control"
				       type="password" name="password"
				       placeholder="New password"
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
				    id="change_button">
				Change
			    </button>
			</div>
		    </form>

		    
		</div>
	    </div>

@endsection

@push('scripts')

<script src="{{ asset('js/changepassword.js') }}"></script>

@endpush