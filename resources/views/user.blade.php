@extends('layouts.main')

@section('title', 'User')

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col">
			<table class="table">
				<thead>
					<tr>
					<th scope="col">Public key</th>
					@if(Auth::check())
						@if(Auth::user()->pubkey === $user->pubkey
						|| Auth::user()->power === "admin")
						<th scope="col">Email</th>
						@endif
					@endif
					<th scope="col">Balance</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<td>
						{{ $user->pubkey }}
					</td>
					@if(Auth::check())
						@if(Auth::user()->pubkey === $user->pubkey
						|| Auth::user()->power === "admin")
						<td>
							{{ $user->email }}
						</td>
						@endif
					@endif
					<td>
						{{ $user->balance }}
					</td>
					</tr>
				</tbody>
			</table>

			<div class="row">

			<div class="col-2">

				@if(Auth::check())
				<form action={{ sprintf("/user/%s/pay",
							Auth::user()->pubkey) }}
					method="GET">

					@csrf

					<div class="form-row">
					<!-- Name -->
					<div class="form-group">

						<button id="pay_user_button"
							class="btn btn-outline-success archfix"
							type="submit">
						Pay
						</button>
						
						<input type="hidden"
						name="to_pubkey"
						value={{ $user->pubkey }}>

						
					</div>
					</div>
				</form>
				@endif

			</div>
			
			<div class="col-2">

				<form action="/delete/confirm"
				method="POST">

				@csrf

				<div class="form-row">
					<!-- Name -->
					<div class="form-group">
					@if(Auth::check())
						@if($user->pubkey === Auth::user()->pubkey
						|| Auth::user()->power === 'admin')
						
						<button id="delete_button"
								class="btn btn-outline-success archfix"
								type="submit">
							Delete
						</button>
						
						<input type="hidden"
							name="pubkey"
							value={{ $user->pubkey }}>
						@endif
					@endif

					
					</div>
				</div>
				</form>

			</div>

			</div>
			
			<table class="table">
			<thead>
				<th colspan="5">Transactions</th>
			</thead>
			<tbody>
				@foreach($transactions as $transaction)
				<tr>
					<td>
					<a href='{{ sprintf("/user/%s", $user->pubkey) }}'
					class="link-secondary">
						{{ sprintf("%32.32s ...", $user->pubkey) }}
					</a>
					</td>
					@if($transaction->sender == $user->pubkey)
					<td>
						<svg xmlns="http://www.w3.org/2000/svg"
						width="16" height="16"
						fill="red" class="bi bi-arrow-right" viewBox="0 0 16 16">
						<path fill-rule="evenodd"
							d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
						</svg>
					</td>
					<td>
						<a href='{{ sprintf("/user/%s", $transaction->receiver) }}'
						class="link-secondary">
						{{ sprintf("%32.32s ...", $transaction->receiver) }}
						</a>
					</td>
					<td>
						{{ sprintf("- %f", $transaction->amount) }}
					</td>
					@else
					<td>
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
						fill="green" class="bi bi-arrow-left" viewBox="0 0 16 16">
						<path fill-rule="evenodd"
							d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
						</svg>
					</td>
					<td>
						<a href='{{ sprintf("/user/%s", $transaction->sender) }}'
						class="link-secondary">
						{{ sprintf("%32.32s ...", $transaction->sender) }}
						</a>
					</td>
					<td>
						{{ sprintf("+ %f", $transaction->amount) }}
					</td>
					@endif
					<td>
					{{ $transaction->created_at }}
					</td>
				</tr>
				@endforeach
			</tbody>
			</table>
			{{ $transactions->links() }}
		</div>
	</div>
</div>
@endsection