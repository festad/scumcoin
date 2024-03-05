@extends('layouts.main')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">

		<div class="col">

			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">Public key</th>
						<th scope="col">Email</th>
						<th scope="col">Balance</th>
						<th scope="col">Registration date</th>
					</tr>
				</thead>
				@foreach ($users as $user)
				<tbody>
					<tr>
						<td>
							<a href={{ sprintf("/user/%s",
									$user->pubkey) }}
							class="link-secondary">
								{{ sprintf("%32.32s ...",
									$user->pubkey) }}
							</a>
						</td>
						<td>
						{{ sprintf("%32.32s",
							$user->email) }}
						</td>
						<td>
						{{ $user->balance }}
						</td>
						<td>
						{{ $user->created_at }}
						</td>
					</tr>
				</tbody>
				@endforeach
			</table>
			{{ $users->links() }}
		</div>
	</div>
</div>
@endsection