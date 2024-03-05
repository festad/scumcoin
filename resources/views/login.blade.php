@extends('layouts.main')

@section('title', 'Login')

@section('content')

<div class="row h-50">
	<div class="col">
		<form method="POST" action="/login">

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
				<!-- Email Address -->
				<div class="form-group">
					<a href="/reset"
						class="link-secondary">
						Forgot password?
					</a>
				</div>
			</div>

			<div class="form-row justify-content-center">
				<!-- Password -->
				<div class="form-group">
					<label for="name">Password</label>
					<input id="password"
						class="form-control"
						type="password" name="password"
						placeholder="Password"
						required/>
				</div>
			</div>

			<div class="form-row justify-content-center">
				<button class="btn btn-primary arch"
					type="submit"
					id="login_button">
					Login
				</button>
			</div>
	  	</form>
	</div>
</div>

@endsection
