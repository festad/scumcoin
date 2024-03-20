@extends('layouts.main')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">

		<div class="col">

			<input type="text" id="searchByPublicKey" placeholder="Filter by public key"
				class="form-control" style="width: auto; display: inline-block; margin-left: 10px;">
			<input type="text" id="searchByEmail" placeholder="Filter by email"
				class="form-control" style="width: auto; display: inline-block; margin-left: 10px;">

			<!-- horizontal space -->

			<table class="table table-bordered" style="margin-top: 10px;">
				<thead>
					<tr>
						<th scope="col">Public key</th>
						<th scope="col">Email</th>
						<th scope="col">Balance</th>
						<th scope="col">Registration date</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($users as $user)
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
				@endforeach
				</tbody>
			</table>
			{{ $users->links() }}
		</div>
	</div>
</div>
@endsection


@push('scripts')
<script>
$(document).ready(function() {
	$('#searchByPublicKey').on('keyup', function() {
		var value = $(this).val();
		$.ajax({
			url: '{{ route('admin.users.search.pubkey') }}',
			type: 'GET',
			data: {
				'public_key': value
			},
			success: function(response) {
				$('table tbody').html(response);
			}
		});
	});
});

$(document).ready(function() {
	$('#searchByEmail').on('input', function() {
		var value = $(this).val();
		$.ajax({
			url: '{{ route('admin.users.search.email') }}',
			type: 'GET',
			data: {
				'email': value
			},
			success: function(response) {
				$('table tbody').html(response);
			}
		});
	});
});
</script>
@endpush